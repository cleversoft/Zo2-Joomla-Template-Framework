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

        /**
         * Get relative path of template dir
         * @return type
         */
        public static function getSiteTemplatePath() {
            return 'templates/' . Zo2Framework::getTemplateName();
        }

        /**
         * Get relative path of Zo2 Framework dir
         * @return type
         */
        public static function getZo2RootPath() {
            return 'plugins/system/' . ZO2;
        }

        /**
         * 
         * @param type $file
         * @param type $type
         * @return type
         */
        public static function getTemplateFilePath($file, $type) {
            if ($type === 'path') {
                return self::getPath(self::getSiteTemplatePath() . '/' . $file);
            } elseif ($type === 'url') {
                return self::getUrl(self::getSiteTemplatePath() . '/' . $file);
            } elseif ($type === null) {
                return self::getSiteTemplatePath() . '/' . $file;
            }
        }

        /**
         * 
         * @param type $file
         * @param type $type
         * @return type
         */
        public static function getZo2FilePath($file, $type = 'path') {
            if ($type == 'path') {
                return self::getPath(self::getZo2RootPath() . '/' . $file);
            } elseif ($type == 'url') {
                return self::getUrl(self::getZo2RootPath() . '/' . $file);
            } elseif ($type === null) {
                return self::getZo2RootPath() . '/' . $file;
            }
        }

    }

}
    