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
if (!class_exists('Zo2ServiceBufferbutton')) {

    /**
     * 
     */
    class Zo2ServiceBufferbutton extends Zo2ServiceAbstract {

        /**
         * 
         */
        protected function _init() {
            $this->_configs->def('url', JUri::getInstance()->toString());
            $this->_configs->def('count', 'none');
        }

        private function _button() {
            static $init = false;
            if ($init === false) {
                $init = true;
                return '<script type="text/javascript" src="http://static.bufferapp.com/js/button.js"></script>';
            }
        }

        public function buffer($text, $config = array()) {
            $html = '
                    <a href="http://bufferapp.com/add" class="buffer-add-button" ' . $this->_buildDataAttributes($config) . '>' . $text . '</a>' . $this->_button();
            return $html;
        }

    }

}