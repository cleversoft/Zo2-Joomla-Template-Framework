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
if (!class_exists('Zo2Socialshares')) {

    /**
     * 
     */
    class Zo2Socialshares {

        private $_url;

        public function __construct() {
            $this->_url = JUri::getInstance()->toString();
        }

        private function _twitterButton() {
            return Zo2Services::button('twitter', 'share');
        }

        private function _redditButton() {
            $template = new Zo2Template();
            $template->set('url', $this->_url);
            $template->set('icon', 'spreddit7.gif');
            return $template->fetch('plugins/system/zo2/libraries/socialshares/reddit.php');
        }

        private function _facebookLikeButton() {
            return Zo2Services::button('facebook', 'like');
        }

        private function _facebookShareButton() {
            return Zo2Services::button('facebook', 'share');
        }

        private function _bufferButton() {
            return Zo2Services::button('buffer', 'buffer', 'Buffer');
        }

        private function _tumblrButton() {
            return Zo2Services::button('tumblr', 'follow');
        }

        public function getFloatbar() {
            return '<div class="zo2-socialshare-floatbar">' .
                    $this->_twitterButton() .
                    $this->_redditButton() .
                    $this->_facebookLikeButton() .
                    $this->_facebookShareButton() .
                    $this->_bufferButton() .
                    $this->_tumblrButton() .
                    '</div>';
        }

    }

}