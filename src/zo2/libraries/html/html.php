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
defined('_JEXEC') or die;

/**
 * Class exists checking
 */
if (!class_exists('Zo2Html')) {

    /**
     * 
     */
    class Zo2Html {

        /**
         * Zo2Document instance
         * @var \Zo2Html
         */
        public static $instance;
        private $_buttons = array();

        protected function __construct() {
            ;
        }

        /**
         * Get singleton instance of class
         * @return \Zo2Document
         */
        public static function getInstance() {
            if (empty(self::$instance)) {
                self::$instance = new Zo2Html();
            }

            if (isset(self::$instance))
                return self::$instance;
        }

        private function _htmlDataAttrib($attribute, $value) {
            return 'data-' . $attribute . '="' . $value . '"';
        }

        /**
         * 
         * @param type $name
         * @param type $args
         * @return string
         */
        public function socialButton($name, $args = array()) {
            ob_start();
            include ZO2URL_ROOT . '/libraries/html/socialbuttons/' . $name . '.php';
            $buffer = ob_get_contents();
            ob_end_flush();
            $this->_buttons[] = $name;
            return $buffer;
        }

        public function load() {
            static $loaded = false;
            if ($loaded === false) {
                foreach ($this->_buttons as $button) {
                    include ZO2URL_ROOT . '/libraries/html/socialbuttons/' . $button . '.script.php';
                }
            }
        }

    }

}