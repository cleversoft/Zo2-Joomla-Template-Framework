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
if (!class_exists('Zo2VendorMinifyAutoloader')) {

    /**
     * @since 1.4.2
     */
    class Zo2VendorMinifyAutoloader {

        /**
         * 
         * @param type $name
         * @return boolean
         */
        public static function import($name) {
            $filePath = __DIR__ . '/' . $name . '.php';
            if (JFile::exists($filePath)) {
                return require_once $filePath;
            }
            return false;
        }

    }

}