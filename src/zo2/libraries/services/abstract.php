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
            return $this->_configs->get($property, $default);
        }

        protected function _buildDataAttributes($config) {
            if (is_array($config)) {
                $config = array_merge($config, $this->_configs->getProperties());
            } elseif (is_object($config)) {
                $config = array_merge((array) $config, $this->_configs->getProperties());
            } else {
                $config = $this->_configs->getProperties();
            }
            $html = '';
            foreach ($config as $key => $value) {
                $html .= 'data-' . $key . '="' . $value . '" ';
            }
            return trim($html);
        }

        abstract protected function _init();
    }

}