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
if (!class_exists('Zo2ModelTemplate'))
{

    /**
     * 
     */
    class Zo2ModelTemplate
    {

        /**
         * Do not allow create new instance directly
         */
        protected function __construct()
        {
            JModelLegacy::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_templates/models');
            JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_templates/tables');
        }

        /**
         * 
         * @staticvar Zo2ModelTemplate $instance
         * @return \Zo2ModelTemplate
         */
        public static function getInstance()
        {
            static $instance;
            if (empty($instance))
            {
                $instance = new Zo2ModelTemplate();
            }
            return $instance;
        }

        /**
         * Save template
         */
        public function save()
        {
            $this->_save();
        }

        /**
         * Profile remove
         */
        public function remove()
        {
            $framework = Zo2Factory::getFramework();
            $id = $framework->template->id;
            $profile = Zo2Factory::getProfile();
            if ($profile->delete())
            {
                $this->_redirect(JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . $id, false), JText::_('PLG_ZO2_PROFILE_DELETED'));
            }
        }

        /**
         * 
         */
        private function _save()
        {
            $application = JFactory::getApplication();
            $jinput = JFactory::getApplication()->input;
            /* Zo2 data */
            $zo2 = $jinput->post->get('zo2', array(), 'array');
            // Joomla! form data
            $formData = $jinput->post->get('jform', array(), 'array');
            $formData['params']['layout'] = json_decode($formData['params']['layout']);
            $formData['params']['theme'] = json_decode($formData['params']['theme']);
            $formData['params']['menu_config'] = json_decode($formData['params']['menu_config']);
            /* Request profileName */
            $profileName = (isset($zo2['newProfile']) ? $zo2['newProfile'] : $zo2['profiles'] );
            if ($profileName != $zo2['profiles'])
            {
                JFactory::getApplication()->enqueueMessage('Added new profile: ' . $profileName, 'notice');
            }
            // Save Joomla! data            
            $model = JModelLegacy::getInstance('Style', 'TemplatesModel');
            $model->save($formData);

            /**
             * Save profile
             */
            $profile = new Zo2Profile();
            $profile->loadArray($formData['params']);
            $profile->template = Zo2Framework::getInstance()->template->template;
            $profile->name = $profileName;

            if ($profile->save())
            {
                /* Save Zo2 data */
                $zo2Data = $jinput->post->get('zo2', array(), 'array');
                $templateDir = JPATH_ROOT . '/templates/' . Zo2Framework::getInstance()->template->template;
                $customCssFile = $templateDir . '/assets/zo2/css/custom.css';
                $customCss = trim($zo2Data['custom_css']);
                JFile::write($customCssFile, $customCss);
                $customJsFile = $templateDir . '/assets/zo2/js/custom.js';
                $customJs = trim($zo2Data['custom_js']);
                JFile::write($customJsFile, $customJs);

                $application->enqueueMessage('Style successfully saved');

                if ($jinput->get('task') == 'style.apply')
                {
                    $application->redirect(JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . $jinput->get('id') . '&profile=' . $profileName, false));
                } else
                {
                    $application->redirect(JRoute::_('index.php?option=com_templates&view=styles', false));
                }
            }

            JFactory::getApplication()->enqueueMessage('Style save error', 'error');
            $application->redirect(JRoute::_('index.php?option=com_templates&view=styles', false));
        }

        private function _redirect($url, $message = null)
        {
            if ($message !== NULL)
            {
                JFactory::getApplication()->enqueueMessage($message);
            }
            JFactory::getApplication()->redirect($url);
        }

    }

}