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
if (!class_exists('Zo2Path')) {

    /**
     * Provide methods to work with Zo2 Framework & Zo2 Template paths
     */
    class Zo2Path extends JObject {

        public function __construct($properties = null) {
            parent::__construct($properties);
            $this->init();
        }

        /**
         * Init default properties
         */
        public function init() {
            $this->def('siteUrl', rtrim(JUri::root(), '/'));
            $this->def('siteUrlRelative', rtrim(JUri::root(true), '/'));
            $this->def('sitePath', JPATH_ROOT);
            $this->def('zo2Root', 'plugins/system/' . ZO2);
            $this->def('siteTemplate', 'templates/' . Zo2Framework::getTemplateName());            
        }

        /**
         * Return physical file path
         * @param type $filePath
         * @return type
         */
        public function getPath($filePath) {
            return $this->get('sitePath') . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $filePath);
        }

        /**
         * Return URL
         * @param type $filePath
         * @return type
         */
        public function getUrl($filePath) {
            return $this->get('siteUrl') . '/' . $filePath;
        }

    }

}