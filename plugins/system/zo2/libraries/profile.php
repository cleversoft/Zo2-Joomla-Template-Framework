<?php

/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');

/**
 * Class exists checking
 */
if (!class_exists('Zo2Profile')) {

    /**
     * Zo2 profile object
     */
    class Zo2Profile extends \Joomla\Registry\Registry {

        private $_profileFile;
        private $_profileName;
        private $_profileDir;

        public function __construct($data = null) {
            parent::__construct($data);
            $framework = Zo2Factory::getFramework();
            $this->_profileDir = JPATH_ROOT . '/templates/' . $framework->template->template . '/assets/profiles';
        }

        /**
         * 
         * @param string $name
         * @return mixed
         */
        public function __get($name) {
            return $this->get($name);
        }

        /**
         * 
         * @param string $name
         * @param mixed $value
         * @return mixed
         */
        public function __set($name, $value) {
            return $this->set($name, $value);
        }

        /**
         * Load profile by name
         * @param string $file
         * @return boolean
         */
        public function load($name) {
            $framework = Zo2Factory::getFramework();
            $id = $framework->template->id;
            /* Load profile under template id dir */
            $profileFile = Zo2Factory::getPath('assets://profiles/' . $id . '/' . $name . '.json');
            /* Load profile under profiles root dir */
            if (!$profileFile) {
                /* Load from profiles directory of assets namespace */
                $profileFile = Zo2Factory::getPath('assets://profiles/' . $name . '.json');
            }
            /* If asked file is not exists than load default */
            if ($profileFile == false) {
                $profileFile = Zo2Factory::getPath('assets://profiles/default.json');
            }
            /* Profile file is existed */
            if ($profileFile) {
                Zo2Factory::addLog('Loading profile', $profileFile);
                $this->loadFile($profileFile);
                /* Profile exists but this's old format */
                if (!$this->_check()) {
                    /* Load and migrate into new format */
                    $this->_loadFromOldProfile($profileFile);
                    $this->_profileFile = $this->_profileDir . '/default.json';
                    $this->_profileName = 'default';
                    return $this->_save($this->_profileFile);
                } else {
                    /* Load profile corrected */
                    $this->_profileFile = $profileFile;
                    $this->_profileName = $name;
                }
            } else { /* Profile file is not existed */
                $this->_loadFromDatabase();
                $this->_profileFile = $this->_profileDir . '/default.json';
                $this->_profileName = 'default';
                return $this->_save($this->_profileFile);
            }
            return false;
        }

        /**
         * Load profile from old profile format
         * @param string $profileFile
         */
        private function _loadFromOldProfile($profileFile) {
            Zo2Factory::addLog('Load old profile', $profileFile, 'notice');
            $framework = Zo2Factory::getFramework();
            $this->template = $framework->template->template;
            $this->name = 'default';
            $this->layout = json_decode(file_get_contents($profileFile));
            $this->theme = new JObject(json_decode($framework->template->params->get('theme')));
            $this->menuConfig = new JObject();
            $this->menuConfig->hover_type = $framework->template->params->get('hover_type');
            $this->menuConfig->nav_type = $framework->template->params->get('nav_type');
            $this->menuConfig->animation = $framework->template->params->get('animation');
            $this->menuConfig->duration = $framework->template->params->get('duration');
            $this->menuConfig->menu_type = $framework->template->params->get('menu_type');
            $this->menuConfig->mega_config = $framework->template->params->get('menu_config');
        }

        /**
         * Load profile from database
         */
        private function _loadFromDatabase() {
            Zo2Factory::addLog('Load database profile', '', 'info');
            $framework = Zo2Factory::getFramework();
            $this->template = $framework->template->template;
            $this->name = 'default';
            $this->layout = json_decode($framework->template->params->get('layout'));
            $this->theme = new JObject(json_decode($framework->template->params->get('theme')));
            $this->menuConfig = new JObject();
            $this->menuConfig->hover_type = $framework->template->params->get('hover_type');
            $this->menuConfig->nav_type = $framework->template->params->get('nav_type');
            $this->menuConfig->animation = $framework->template->params->get('animation');
            $this->menuConfig->duration = $framework->template->params->get('duration');
            $this->menuConfig->menu_type = $framework->template->params->get('menu_type');
            $this->menuConfig->mega_config = $framework->template->params->get('menu_config');
        }

        /**
         * Valid profile checking
         * @return boolean
         */
        private function _check() {
            if ($this->get('template') == '') {
                Zo2Factory::addLog('Invalid profile', 'Template field is missed', 'error');
                return false;
            }
            if ($this->get('name') == '') {
                Zo2Factory::addLog('Invalid profile', 'Name field is missed', 'error');
                return false;
            }
            if ($this->get('layout') == '') {
                Zo2Factory::addLog('Invalid profile', 'Layout field is missed', 'error');
                return false;
            }
            if ($this->get('theme') == '') {
                Zo2Factory::addLog('Invalid profile', 'Theme field is missed', 'error');
                return false;
            }
            if ($this->get('menuConfig') == '') {
                Zo2Factory::addLog('Invalid profile', 'menuConfig field is missed', 'error');
                return false;
            }
            $this->set('theme', new JObject($this->get('theme')));
            Zo2Factory::addLog('Loaded profile', $this->_profileFile, 'error');
            return true;
        }

        /**
         * 
         * @return \JRegistry
         */
        public function getMenuConfig() {
            $menuConfig = new JRegistry($this->get('menuConfig'));
            $megaConfig = json_decode($menuConfig->get('mega_config'), true);
            $menuConfig->set('mega_config', $megaConfig);
            return $menuConfig;
        }

        /**
         * 
         * @param type $menuType
         * @return type
         */
        public function getMegaMenuConfig($menuType = 'mainmenu') {
            $menuConfig = $this->getMenuConfig()->get('mega_config');
            if (isset($menuConfig[$menuType])) {
                return $menuConfig[$menuType];
            }
            return;
        }

        private function _save($profileFile) {
            if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
                $buffer = json_encode($this->toArray(), JSON_PRETTY_PRINT);
            } else {
                $buffer = json_encode($this->toArray());
            }
            Zo2Factory::addLog('Save profile', $profileFile, 'info');
            echo '<pre>';
            print_r ($this);
            echo '</pre>';
            return JFile::write($profileFile, $buffer);
        }

        /**
         * 
         * @return type
         */
        public function save() {
            $framework = Zo2Factory::getFramework();
            $id = $framework->template->id;
            /* Save to template assets/profiles */ $templatePath = rtrim(JPATH_ROOT . '/templates/' . $this->template, DIRECTORY_SEPARATOR);
            $filePath = $templatePath . '/assets/profiles/' . $id . '/' . $this->name . '.json';
            return $this->_save($filePath);
        }

        /**
         * 
         * @return boolean
         */
        public function delete() {
            if (strpos($this->_profileFile, 'default.json') === false) {
                /* Get table */ $table = JTable::getInstance('Style', 'TemplatesTable');
                $framework = Zo2Factory::getFramework();
                $id = $framework->template->id;
                /* Do clean up in database */
                if ($table->load($id)) {
                    $table->params = new JRegistry($table->params);
                    /* Update profile assign list */ $list = $table->params->get('profile', array());

                    if (is_object($list)) {
                        foreach ($list as $key => $value) {
                            $tList[$key] = $value;
                        }
                        $list = $tList;
                    }
                    foreach ($list as $index => $value) {
                        if ($value == $this->_profileName) {
                            unset($list[$index]);
                        }
                    }
                    $table->params->set('profile', $list);
                    $table->params = (string) $table->params;
                    if ($table->check()) {
                        $table->store();
                    }
                }
                /* Do file delete */
                if (JFile::exists($this->_profileFile)) {
                    return JFile::delete($this->_profileFile);
                }
            } else {
                JFactory::getApplication()->enqueueMessage('You can not delete default profile'
                );
            }
            return false;
        }

        public function rename($newName) {
            $originalInfo = pathinfo($this->_profileFile);
            $oldProfileName = $originalInfo ['basename'];
            $newFilePath = $originalInfo['dirname'] . '/' . $newName . '.json';
            if (JFile::exists($newFilePath)) {
                JFactory::getApplication()->enqueueMessage('Profile file existed', 'error');
            } else {
                JFile::move($this->_profileFile, $newFilePath);
                /* Database update */

                /* Get table */ $table = JTable::getInstance('Style', 'TemplatesTable');
                $framework = Zo2Factory::getFramework();
                $id = $framework->template->id;
                if ($table->load($id)) {
                    $table->params = new JRegistry($table->params);
                    /* Update profile assign list */ $list = $table->params->get('profile', array());

                    if (is_object($list)) {
                        foreach ($list as $key => $value) {
                            $tList[$key] = $value;
                        }
                        $list = $tList;
                    }
                    foreach ($list as $index => $value) {
                        if ($value == $oldProfileName) {
                            $list[$index] = $newName;
                        }
                    }
                    $table->params->set('profile', $list);
                    $table->params = (string) $table->params;
                    if ($table->check()) {
                        return $table->store();
                    }
                }
            }
            return false;
        }

    }

}