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

if (!class_exists('Zo2JTemplate')) {

    class Zo2JTemplate {

        private $_jinput;

        public function __construct() {
            $this->_jinput = JFactory::getApplication()->input;
            JModelLegacy::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_templates/models');
            JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_templates/tables');
        }

        public function process() {
            if ($this->_jinput->get('option') == 'com_templates') {
                switch ($this->_jinput->get('task')) {
                    case 'style.save':
                        $this->save();
                        break;
                    case 'style.apply':
                        $this->save();
                        break;
                    case 'remove':
                        $this->remove();
                        break;
                    case 'rename':
                        $this->rename();
                        break;
                }
            }
        }

        /**
         * Profile rename
         */
        public function rename() {
            $newProfileName = $this->_jinput->get('newName');
            $profile = Zo2Factory::getProfile();
            $framework = Zo2Factory::getFramework();
            $id = $framework->template->id;
            if ($profile->rename($newProfileName)) {
                JFactory::getApplication()->redirect(JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . $id . '&profile=' . $newProfileName, false));
            } else {
                JFactory::getApplication()->redirect(JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . $id . '&profile=default', false));
            }
        }

        /**
         * Profile remove
         */
        public function remove() {
            $framework = Zo2Factory::getFramework();
            $id = $framework->template->id;
            $profile = Zo2Factory::getProfile();
            if ($profile->delete()) {
                JFactory::getApplication()->redirect(JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . $id . '&profile=default', false));
            }
        }

        /**
         * Hook and replace Joomla! style save
         */
        public function save() {
            /* Load language */
            $lang = JFactory::getLanguage();
            $extension = 'com_templates';
            $base_dir = JPATH_ADMINISTRATOR;
            $language_tag = 'en-GB';
            $reload = true;
            $lang->load($extension, $base_dir, $language_tag, $reload);
            /* Do build process when template update */
            $assets = Zo2Assets::getInstance();
            $assets->buildAssets();

            /* Get table */
            $table = JTable::getInstance('Style', 'TemplatesTable');

            /* Load table record */
            if ($table->load($this->_jinput->get('id'))) {
                $table->params = new JRegistry($table->params);
                /* Do never use $_REQUEST */
                $formData = $this->_jinput->post->get('jform', array(), 'array');
                /* Save template with data */
                $model = JModelLegacy::getInstance('Style', 'TemplatesModel');
                $model->save($formData);

                /* Request profileName */
                $formData['profile-select'] = isset($formData['profile-select']) ? $formData['profile-select'] : 'default';
                $profileName = $this->_jinput->get('profile-name', $formData['profile-select']);
                if ($profileName == '')
                    $profileName = $formData['profile-select'];

                /* Update profile assign list */
                $list = $table->params->get('profile', array());

                if (count ($list) == 0 ) {
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

                        $profile->save();

                        $application = JFactory::getApplication();
                        $application->enqueueMessage('Style successfully saved');

                        if ($this->_jinput->get('task') == 'style.apply') {
                            $application->redirect(JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . $table->id . '&profile=' . $profileName, false));
                        } else {
                            $application->redirect(JRoute::_('index.php?option=com_templates&view=styles', false));
                        }
                    }
                }
            } else {
                JFactory::getApplication()->enqueueMessage('Style save error');
            }
        }

    }

}