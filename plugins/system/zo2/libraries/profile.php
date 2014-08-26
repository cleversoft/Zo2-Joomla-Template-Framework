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

if (!class_exists('Zo2Profile')) {

    /**
     * Zo2 profile object
     */
    class Zo2Profile extends JRegistry {

        private $_profileFile;
        private $_profileName;

        public function __get($name) {
            return $this->get($name);
        }

        public function __set($name, $value) {
            return $this->set($name, $value);
        }

        /**
         * 
         * @param type $file
         * @return boolean
         */
        public function load($name) {
            $framework = Zo2Factory::getFramework();
            $id = $framework->template->id;
            /* Load profile by id */
            $profileFile = Zo2Factory::getPath('assets://profiles/' . $id . '/' . $name . '.json');
            if (!$profileFile) {
                /* Load from profiles directory of assets namespace */
                $profileFile = Zo2Factory::getPath('assets://profiles/' . $name . '.json');
            }
            /* If asked file is not exists than load default */
            if ($profileFile == false) {
                $profileFile = Zo2Factory::getPath('assets://profiles/default.json');
            }
            if ($profileFile) {
                $this->loadFile($profileFile);
                $this->_profileFile = $profileFile;
                $this->_profileName = $name;
                return true;
            }
            return false;
        }

        /**
         * 
         * @return \JObject
         */
        public function getTheme() {
            return new JObject($this->get('theme'));
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
         * @return type
         */
        public function save() {
            $framework = Zo2Factory::getFramework();
            $id = $framework->template->id;
            /* Save to template assets/profiles */
            $templatePath = rtrim(JPATH_ROOT . '/templates/' . $this->template, DIRECTORY_SEPARATOR);
            $filePath = $templatePath . '/assets/profiles/' . $id . '/' . $this->name . '.json';
            if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
                $buffer = json_encode($this->toArray(), JSON_PRETTY_PRINT);
            } else {
                $buffer = json_encode($this->toArray());
            }

            return JFile::write($filePath, $buffer);
        }

        /**
         * 
         * @return boolean
         */
        public function delete() {
            if (strpos($this->_profileFile, 'default.json') === false) {
                /* Get table */
                $table = JTable::getInstance('Style', 'TemplatesTable');
                $framework = Zo2Factory::getFramework();
                $id = $framework->template->id;
                /* Do clean up in database */
                if ($table->load($id)) {
                    $table->params = new JRegistry($table->params);
                    /* Update profile assign list */
                    $list = $table->params->get('profile', array());

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
                JFactory::getApplication()->enqueueMessage('You can not delete default profile');
            }
            return false;
        }

        public function rename($newName) {
            $originalInfo = pathinfo($this->_profileFile);
            $oldProfileName = $originalInfo['basename'];
            $newFilePath = $originalInfo['dirname'] . '/' . $newName . '.json';
            if (JFile::exists($newFilePath)) {
                JFactory::getApplication()->enqueueMessage('Profile file existed', 'error');
            } else {
                JFile::move($this->_profileFile, $newFilePath);
                /* Database update */

                /* Get table */
                $table = JTable::getInstance('Style', 'TemplatesTable');
                $framework = Zo2Factory::getFramework();
                $id = $framework->template->id;
                if ($table->load($id)) {
                    $table->params = new JRegistry($table->params);
                    /* Update profile assign list */
                    $list = $table->params->get('profile', array());

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