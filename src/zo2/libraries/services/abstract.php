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
if (!class_exists('Zo2ServiceAbstract')) {

    /**
     * 
     */
    abstract class Zo2ServiceAbstract {

        protected $_configs = null;

        public function __construct($properties) {
            $this->_configs = new JObject($properties);
            $this->_init();
        }

        public function setConfig($property, $value) {
            $this->_configs->set($property, $value);
        }

        public function getConfig($property, $default = null) {
            return $this->_configs->get($property, $value);
        }

        protected function _generateConfigAttributes() {
            $html = '';
            $properties = $this->_configs->getProperties();
            foreach ($properties as $key => $value) {
                $html .= 'data-' . $key . '="' . $value . '" ';
            }
            return trim($html);
        }

        abstract protected function _init();
    }

}