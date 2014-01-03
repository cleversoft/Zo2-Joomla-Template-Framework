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
if (!class_exists('Zo2ServiceGooglebutton')) {

    /**
     * 
     */
    class Zo2ServiceGooglebutton extends Zo2ServiceAbstract {

        /**
         * 
         */
        protected function _init() {
            JFactory::getDocument()->addScript('https://apis.google.com/js/plusone.js');
            $this->_configs->def('url', JUri::getInstance()->toString());
        }

        public function plus($config = array()) {
            $html = '<div class="g-plusone" ' . $this->_buildDataAttributes($config) . '></div>';
            return $html;
        }

    }

}