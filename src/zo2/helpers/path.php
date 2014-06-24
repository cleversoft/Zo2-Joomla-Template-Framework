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

jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

/**
 * Class exists checking
 */
if (!class_exists('Zo2HelperPath')) {

    /**
     * 
     */
    class Zo2HelperPath {

        /**
         * Get full physical path of input
         * @param type $filePath
         * @return type
         */
        public static function getPath($filePath) {
            return JPATH_ROOT . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $filePath);
        }

        /**
         * Get full url path of input
         * @param type $filePath
         * @return type
         */
        public static function getUrl($filePath) {
            return rtrim(JUri::root(), '/') . '/' . $filePath;
        }

        public static function toUrl($path) {
            return rtrim(JUri::root(), '/') . str_replace(JPATH_ROOT, '', $path);
        }

        /**
         * Get relative path of Zo2 Framework dir
         * @return type
         */
        public static function getZo2RootPath() {
            return 'plugins/system/' . ZO2;
        }

    }

}
    