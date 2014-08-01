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
if (!class_exists('Zo2Document')) {

    /**
     * @author Viet Vu <me@jooservices.com>
     */
    class Zo2Document {

        public static $instance;

        /**
         * 
         * @return boolean|Zo2Assets
         */
        public static function getInstance() {
            if (empty(self::$instance)) {
                self::$instance = new self ();
            }
            if (!empty(self::$instance))
                return self::$instance;
            return false;
        }

        public function addScript() {
            
        }

        public function addScriptDeclaration() {
            
        }

        public function addStyleSheet() {
            
        }

        public function addStyleDeclaration() {
            
        }

        public function addLess() {
            
        }

        public function addLessDeclaration() {
            
        }

    }

}