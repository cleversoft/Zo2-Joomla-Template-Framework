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

        private function _twitterButton($config) {
            return Zo2Services::button('twitter', 'share', $config->text, $config->default);
        }

        private function _redditButton($config) {
            $template = new Zo2Template($config->default);
            $template->set('url', $this->_url);
            return $template->fetch('plugins/system/zo2/libraries/socialshares/reddit.php');
        }

        private function _deliciousButton($config) {
            $template = new Zo2Template($config);
            $template->set('url', $this->_url);
            $template->set('company', 'Zo2 Framework');
            $template->set('title', 'Zo2 Framework');
            return $template->fetch('plugins/system/zo2/libraries/socialshares/delicious.php');
        }

        private function _stumbleuponButton($config) {
            $template = new Zo2Template($config);
            $template->set('layout', 1);
            return $template->fetch('plugins/system/zo2/libraries/socialshares/stumbleupon.php');
        }

        private function _facebookLikeButton($config) {
            return Zo2Services::button('facebook', 'like', $config);
        }

        private function _facebookShareButton($config) {
            return Zo2Services::button('facebook', 'share', $config);
        }

        private function _bufferButton($config) {
            return Zo2Services::button('buffer', 'buffer', $config->text, $config->default);
        }

        private function _tumblrButton($config) {
            return Zo2Services::button('tumblr', 'follow', $config);
        }

        public function getSocials() {
            $file = Zo2Assets::getInstance()->getAssetFile('zo2/socialshares.json');
            $socialshares = json_decode(JFile::read($file));
            foreach ($socialshares as $socialshare) {
                $list[$socialshare->ordering] = $socialshare;
            }
            return $list;
        }

        public function getFloatbar() {
            $html = '';
            $list = $this->getSocials();
            foreach ($list as $social) {
                $html .= call_user_func_array(array($this, $social->func), array($social));
            }
            $html = '<div class="zo2-socialshares-floatbar">' . $html . '</div>';
            return $html;
        }

    }

}