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
    class Zo2Profile extends JObject {

        /**
         * 
         * @param type $file
         * @return boolean
         */
        public function load($name) {
            $profileFile = Zo2Framework::getPath()->getFile('assets://profiles/' . $name . '.json');
            if ($profileFile == false) {
                $profileFile = Zo2Framework::getPath()->getFile('assets://profiles/default.json');
            }
            if ($profileFile) {
                $this->name = JFile::stripExt(JFile::getName($profileFile));
                $this->layout = json_decode(JFile::read($profileFile), true);
                return true;
            }
            return false;
        }

        /**
         * 
         * @return type
         */
        public function save() {
            $templatePath = rtrim(JPATH_ROOT . '/templates/' . $this->template, DIRECTORY_SEPARATOR);
            $filePath = $templatePath . '/assets/profiles/' . $this->name . '.json';

            if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
                $buffer = json_encode($this->layout, JSON_PRETTY_PRINT);
            } else {
                $buffer = json_encode($this->layout);
            }

            return JFile::write($filePath, $buffer);
        }

    }

}