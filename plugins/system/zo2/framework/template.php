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

if (!class_exists('Zo2Template')) {

    class Zo2Template extends JObject {

        public function __construct($properties = null) {
            parent::__construct($properties);
            /* Register Zo2 namespaces */
            Zo2Path::getInstance()->registerNamespace('Zo2', $this->getPath() . '/zo2');
            Zo2Path::getInstance()->registerNamespace('Zo2', $this->getPath() . '/local/zo2');
            Zo2Path::getInstance()->registerNamespace('Template', $this->getPath());
            Zo2Path::getInstance()->registerNamespace('Template', $this->getPath() . '/local/template');
        }

        public function getPath() {
            return JPATH_ROOT . '/templates/' . $this->get('template');
        }
        
    }

}