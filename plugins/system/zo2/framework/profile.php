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
if (!class_exists('Zo2Profile'))
{

    /**
     * Zo2 profile object
     */
    class Zo2Profile extends JRegistry
    {

        private $_filePath;

        public function loadFile($file, $format = 'JSON', $options = array())
        {
            parent::loadFile($file, $format = 'JSON', $options = array());
            $this->_filePath = $file;
            // Display message to know which profile file was loaded
            Zo2Framework::log('Load profile: ' . $this->_filePath);
        }

        /**
         * Save profile
         */
        public function save()
        {
            $buffer = $this->toString();
            if (JFile::write($this->_filePath, $buffer))
            {
                Zo2Framework::log('Save profile: ' . $this->_filePath);
                return true;
            }
            return false;
        }

    }

}