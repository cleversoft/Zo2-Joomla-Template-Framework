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
if (!class_exists('Zo2ServiceTwitterbutton')) {

    /**
     * 
     */
    class Zo2ServiceTwitterbutton extends Zo2ServiceAbstract {

        /**
         * 
         */
        protected function _init() {
            Zo2Assets::getInstance()->addScriptDeclaration('!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");');
            $this->_configs->def('url', JUri::getInstance()->toString());
        }

        /**
         * Get share button
         * @param type $text
         * @return string
         */
        public function share($text = 'Tweet', $config = array()) {
            $html = '<a href="https://twitter.com/share" class="twitter-share-button" ' . $this->_buildDataAttributes($config) . '>' . $text . '</a>';
            return $html;
        }

        public function hashtag($text = 'Tweet', $config = array()) {
            $html = '<a href="https://twitter.com/share" class="twitter-hashtag-button" ' . $this->_buildDataAttributes($config) . '>' . $text . '</a>';
            return $html;
        }

        public function tweetTo($screenName, $text = 'Tweet', $config = array()) {
            $html = '<a href="https://twitter.com/intent/tweet?screen_name=' . $screenName . '" class="twitter-mention-button" ' . $this->_buildDataAttributes($config) . '>' . $text . '</a>';
            return $html;
        }

    }

}