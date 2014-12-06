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
if (!class_exists('Zo2ModelTemplate')) {

    /**
     * 
     */
    class Zo2ModelTemplate {

        /**
         * Do not allow create new instance directly
         */
        protected function __construct() {
            JModelLegacy::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_templates/models');
            JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_templates/tables');
        }

        /**
         * 
         * @staticvar Zo2ModelTemplate $instance
         * @return \Zo2ModelTemplate
         */
        public static function getInstance() {
            static $instance;
            if (empty($instance)) {
                $instance = new Zo2ModelTemplate();
            }
            return $instance;
        }

        /**
         * Profile remove
         */
        public function remove() {
            $framework = Zo2Factory::getFramework();
            $id = $framework->template->id;
            $profile = Zo2Factory::getProfile();
            if ($profile->delete()) {
                $this->_redirect(JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . $id, false), JText::_('PLG_ZO2_PROFILE_DELETED'));
            }
        }

        /**
         * Save template
         */
        public function save() {
            $this->_save();
        }

        /**
         * Build template
         */
        public function build() {
            /* Do build process when template update */
            $assets = Zo2Assets::getInstance();
            $assets->buildAssets();
        }

        /**
         * 
         */
        private function _save() {
            $application = JFactory::getApplication();
            $jinput = JFactory::getApplication()->input;
            /* Get table */
            $table = JTable::getInstance('Style', 'TemplatesTable');
            /* Form data */
            $data = $jinput->post->get('jform', array(), 'array');
            /* Zo2 data */
            $zo2 = $jinput->post->get('zo2', array(), 'array');

            /* Load table record */
            if ($table->load($jinput->get('id'))) {
                /* Save to database */
                $table->params = new JRegistry($table->params);
                $formData = $jinput->post->get('jform', array(), 'array');
                /* Save template with data */
                $model = JModelLegacy::getInstance('Style', 'TemplatesModel');
                $model->save($formData);
                /* Request profileName */
                $profileName = (isset($zo2['newProfile']) ? $zo2['newProfile'] : $zo2['profiles'] );
                if ($profileName != $zo2['profiles']) {
                    JFactory::getApplication()->enqueueMessage('Added new profile: ' . $profileName, 'notice');
                }
                /* Update profile assign list */
                $list = $table->params->get('profile', array());
                if (count($list) == 0) {
                    $list = array();
                }
                if (is_object($list)) {
                    foreach ($list as $key => $value) {
                        $tList[$key] = $value;
                    }
                    $list = $tList;
                }
                /* Remove old checked menu */
                /**
                 * @todo Code is not optimized need improve
                 */
                if (is_array($list)) {
                    foreach ($list as $index => $value) {
                        if ($value == $profileName) {
                            if (!isset($formData['profile-menu'][$value])) {
                                unset($list[$index]);
                            }
                        }
                    }
                }

                if (isset($formData['profile-menu'])) {
                    foreach ($formData['profile-menu'] as $menuId) {
                        $list[$menuId] = $profileName;
                    }
                }

                /* Store assigned menu and profile name for each one */
                $formData['params']['profile'] = $list;
                $params = new JRegistry($formData['params']);
                $table->params = $params->toString();
                /* Save back into database */
                if ($table->check()) {
                    if ($table->store()) {
                        /**
                         * Save profile
                         */
                        $profile = new Zo2Profile();
                        $profile->template = $formData['template'];
                        $profile->name = $profileName;
                        $profile->layout = json_decode($params->get('layout'));
                        $profile->theme = json_decode($params->get('theme'));

                        $menu['hover_type'] = $params->get('hover_type');
                        $menu['nav_type'] = $params->get('nav_type');
                        $menu['animation'] = $params->get('animation');
                        $menu['duration'] = $params->get('duration');
                        $menu['show_submenu'] = $params->get('show_submenu');
                        $menu['menu_type'] = $params->get('menu_type');
                        $menu['mega_config'] = $params->get('menu_config');

                        $profile->menuConfig = $menu;

                        if ($profile->save()) {
                            /* Save Zo2 data */
                            $zo2Data = $jinput->post->get('zo2', array(), 'array');
                            $templateDir = JPATH_ROOT . '/templates/' . $table->template;
                            $customCssFile = $templateDir . '/assets/zo2/css/custom.css';
                            $customCss = trim($zo2Data['custom_css']);
                            JFile::write($customCssFile, $customCss);
                            $customJsFile = $templateDir . '/assets/zo2/js/custom.js';
                            $customJs = trim($zo2Data['custom_js']);
                            JFile::write($customJsFile, $customJs);

                            $application->enqueueMessage('Style successfully saved');

                            if ($jinput->get('task') == 'style.apply') {
                                $application->redirect(JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . $table->id . '&profile=' . $profileName, false));
                            } else {
                                $application->redirect(JRoute::_('index.php?option=com_templates&view=styles', false));
                            }
                        }
                    }
                }
            }
            JFactory::getApplication()->enqueueMessage('Style save error', 'error');
            $application->redirect(JRoute::_('index.php?option=com_templates&view=styles', false));
        }

        private function _redirect($url, $message = null) {
            if ($message !== NULL) {
                JFactory::getApplication()->enqueueMessage($message);
            }
            JFactory::getApplication()->redirect($url);
        }

        /**
         * Get template_styles table
         * @return JTable
         */
        private function _getTable() {
            return JTable::getInstance('Style', 'TemplatesTable');
        }

    }

}