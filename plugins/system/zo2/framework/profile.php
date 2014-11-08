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
if (!class_exists('Zo2Profile')) {

    /**
     * Zo2 profile object
     */
    class Zo2Profile extends JRegistry {

        /**
         * Profile file path
         * @var string
         */
        private $_profileFile;

        /**
         *
         * @var string
         */
        private $_profileName;

        /**
         * Profile directory path
         * @var string
         */
        private $_profileDir;

        /**
         * Default profile name
         */
        const DEFAULT_PROFILE_NAME = 'default';

        /**
         * 
         * @param object|array $data
         */
        public function __construct($data = null) {
            parent::__construct($data);
            $framework = Zo2Factory::getFramework();
            /* Init default profile root directory */
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
                $profileFile = Zo2Factory::getPath('assets://profiles/' . self::DEFAULT_PROFILE_NAME . '.json');
            }
            /* Profile file is existed */
            if ($profileFile) {
                Zo2Factory::addLog('Loading profile', $profileFile);
                /* Load profile data by use json file */
                $this->loadFile($profileFile);
                $this->set('theme', new JObject($this->get('theme')));
                return $this->isValid();
            }
            return false;
        }

        public function isValid() {
            return $this->_check();
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
                //return false;
            }
            if ($this->get('menuConfig') == '') {
                Zo2Factory::addLog('Invalid profile', 'menuConfig field is missed', 'error');
                return false;
            }
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

        /**
         * 
         * @param type $profileFile
         * @return bool
         */
        private function _save($profileFile) {
            if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
                $buffer = json_encode($this->toArray(), JSON_PRETTY_PRINT);
            } else {
                $buffer = json_encode($this->toArray());
            }
            Zo2Factory::addLog('Save profile', $profileFile, 'info');
            return JFile::write($profileFile, $buffer);
        }

        /**
         * 
         * @return type
         */
        public function save() {
            $framework = Zo2Factory::getFramework();
            $id = $framework->template->id;
            /* Save to template assets/profiles */
            $templatePath = rtrim(JPATH_ROOT . '/templates/' . $this->template, DIRECTORY_SEPARATOR);
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