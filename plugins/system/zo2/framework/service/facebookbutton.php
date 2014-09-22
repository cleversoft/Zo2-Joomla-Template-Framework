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
if (!class_exists('Zo2ServiceFacebookbutton')) {

    /**
     * 
     */
    class Zo2ServiceFacebookbutton extends Zo2ServiceAbstract {

        /**
         * 
         */
        protected function _init() {
            $this->_configs->def('href', JUri::getInstance()->toString());
            $this->_configs->def('appId', '129458053806961');            
            /**
             * @todo language support
             */
            Zo2Assets::getInstance()->addScriptDeclaration('
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=' . $this->getConfig('appId') . '";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));');
        }

        private function _button() {
            static $init = false;
            if ($init === false) {
                $html = '<div id="fb-root"></div>';
                $init = true;
            } else {
                $html = '';
            }
            return $html;
        }

        public function like($config = array()) {
            return $this->_button() . '<div class="fb-like" ' . $this->_buildDataAttributes($config) . '></div>';
        }

        public function share($config = array()) {
            return $this->_button() . '<div class="fb-share-button" ' . $this->_buildDataAttributes($config) . '></div>';
        }

    }

}