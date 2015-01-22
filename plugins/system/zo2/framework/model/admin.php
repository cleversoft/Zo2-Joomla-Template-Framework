<?php

/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');

/**
 * Class exists checking
 */
if (!class_exists('Zo2ModelAdmin'))
{

    /**
     * 
     */
    class Zo2ModelAdmin
    {

        /**
         *
         * @var \Zo2Ajax
         */
        private $_ajax;

        /**
         * 
         */
        public function __construct()
        {
            $this->_ajax = Zo2Ajax::getInstance();
        }

        /**
         * Clear Zo2 cached files
         */
        public function clearCache()
        {
            if ($this->_isAuthorized())
            {
                if (JFolder::exists(ZO2PATH_CACHE))
                {
                    if (JFolder::delete(ZO2PATH_CACHE))
                    {
                        $this->_ajax->addMessage(JText::_('ZO2_ADMIN_MESSAGE_CLEAR_CACHE_SUCCESS'), 'success');
                    } else
                    {
                        $this->_ajax->addMessage(JText::_('ZO2_ADMIN_MESSAGE_CLEAR_CACHE_FAILED'), 'error');
                    }
                } else
                {
                    $this->_ajax->addMessage(JText::_('ZO2_ADMIN_MESSAGE_NO_CACHED'), 'info');
                }
            }
            $this->_ajax->response();
        }

        /**
         * Build assets data
         */
        public function buildAssets()
        {
            if ($this->_isAuthorized())
            {
                $assets = Zo2Assets::getInstance();
                if ($assets->buildAssets())
                {
                    $this->_ajax->addMessage(JText::_('ZO2_ADMIN_MESSAGE_BUILD_ASSETS_SUCCESS'), 'success');
                } else
                {
                    $this->_ajax->addMessage(JText::_('ZO2_ADMIN_MESSAGE_BUILD_ASSETS_FAILED'), 'error');
                }
            }
            $this->_ajax->response();
        }

        /**
         * Render backend
         */
        public function render()
        {
            if ($this->_isAuthorized())
            {
                $this->_ajax->addHtml(Zo2Html::_('admin', 'config'), '#zo2-framework');
                $this->_ajax->addExecute('zo2.admin.reInit();');
            }
            $this->_ajax->response();
        }

        /**
         * 
         */
        public function modalCreateProfile()
        {
            $modalId = Zo2Factory::getRandomId();
            $modal = new Zo2HtmlModal(
                    $modalId, 'Save as Copy', '<div class="input-prepend">
  <span class="add-on">Profile name</span>
  <input id="prependedInput" name="zo2[newProfile]" type="text" placeholder="Enter new profile name">
</div>'
            );
            $modal->addButton(array(
                'class' => 'btn',
                'data-dismiss' => 'modal',
                'aria-hidden' => 'hidden',
                'text' => 'Close'
            ));
            $modal->addButton(array(
                'class' => 'btn btn-primary',
                'text' => 'Save',
                'onClick' => 'zo2.admin.profile.saveAs(); return false;'
            ));
            $this->_ajax->appendHtml($modal->render(), '#zo2-framework');
            $this->_ajax->addExecute('jQuery(\'#' . $modalId . '\').modal({})');
            $this->_ajax->response();
        }

        public function modalRenameProfile()
        {
            $modal = new Zo2HtmlModal(
                    'modal-profile-rename', 'Rename', '<div class="input-prepend">
  <span class="add-on">Profile name</span>
  <input id="zo2-new-profile" name="zo2[newProfile]" type="text" placeholder="Enter new profile name">
</div>'
            );
            $modal->addButton(array(
                'class' => 'btn',
                'data-dismiss' => 'modal',
                'aria-hidden' => 'hidden',
                'text' => 'Close'
            ));
            $modal->addButton(array(
                'class' => 'btn btn-primary',
                'text' => 'Save',
                'onClick' => 'zo2.admin.profile.rename(); return false;'
            ));
            $this->_ajax->appendHtml($modal->render(), '#zo2-framework');
            $this->_ajax->addExecute('jQuery(\'#modal-profile-rename\').modal({});');
            $this->_ajax->response();
        }

        /**
         * 
         */
        public function renameProfile()
        {
            if ($this->_isAuthorized())
            {
                /* Zo2 data */
                $profile = JFactory::getApplication()->input->get('profile');
                $newProfileName = JFactory::getApplication()->input->get('newProfile');
                if ($profile != '' && $newProfileName != '')
                {
                    $profile = Zo2Factory::getProfile($profile);

                    if ($profile->rename($newProfileName))
                    {
                        $this->_ajax->addExecute('zo2.admin.profile.load(\'' . $newProfileName . '\');');
                    } else
                    {
                        
                    }
                }
                $this->_ajax->addExecute('jQuery(\'#modal-profile-rename\').modal("hide");');
            }
            $this->_ajax->response();
        }

        public function deleteProfile()
        {
            if ($this->_isAuthorized())
            {
                $profile = JFactory::getApplication()->input->getString('profile');
                $templateId = JFactory::getApplication()->input->getInt('id');
                $template = Zo2Factory::getTemplate($templateId);
                if ($template)
                {
                    $profile = JPATH_ROOT . '/templates/' . $template->template . '/assets/profiles/' . $profile . '.json';
                    if (JFile::delete($profile))
                    {
                        $this->_ajax->addExecute('location.reload();');
                    }
                }
            }
            $this->_ajax->response();
        }

        public function renderMegamenu()
        {
            $input = JFactory::getApplication()->input;
            $menutype = $input->get('menutype', 'mainmenu');
            $megamenu = new Zo2Megamenu($menutype);
            $this->_ajax->addHtml($megamenu->renderMenu(true), '#zo2-admin-mm-container');
            $this->_ajax->response();
        }

        public function megamenuGetModule()
        {
            $input = JFactory::getApplication()->input;
            $module_id = $input->getInt('module_id');
            $module = null;
            if ($module_id)
            {

                $db = JFactory::getDbo();
                $query = $db->getQuery(true);
                $query->select('m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params');
                $query->from('#__modules AS m');
                $query->where('m.id = ' . $module_id);
                $query->where('m.client_id = 0'); /* Frontend module only */
                $query->where('m.published = 1');
                $db->setQuery($query);
                $module = $db->loadObject();
            }

            if (!empty($module))
            {
                $style = $input->getCmd('style', 'ZO2Xhtml');
                $html = JModuleHelper::renderModule($module, array('style' => $style));
                $this->_ajax->addHtml($html, '$currentActiveElement');
            }
            $this->_ajax->response();
        }

        /**
         * Authorise request for administrator
         * @return boolean
         */
        private function _isAuthorized()
        {
            $app = JFactory::getApplication();
            return ( $app->isAdmin() && JFactory::getSession()->checkToken());
        }

    }

}
    