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

/**
 * Class exists checking
 */
if (!class_exists('Zo2ServiceYoutubebutton')) {

    /**
     * 
     */
    class Zo2ServiceYoutubebutton extends Zo2ServiceAbstract {

        /**
         * 
         */
        protected function _init() {
            JFactory::getDocument()->addScript('https://apis.google.com/js/platform.js');
            $this->_configs->def('url', JUri::getInstance()->toString());
        }

        public function subscribe($config = array()) {
            $html = '<div class="g-ytsubscribe" ' . $this->_buildDataAttributes($config) . '></div>';
            return $html;
        }

    }

}