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
if (!class_exists('Zo2ServicePinterestbutton')) {

    /**
     * 
     */
    class Zo2ServicePinterestbutton extends Zo2ServiceAbstract {

        /**
         * 
         */
        protected function _init() {
            $this->_configs->def('href', JUri::getInstance()->toString());
        }

        private function _button() {
            static $init = false;
            if ($init === false) {
                $html = '<script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>';
                $init = true;
            } else {
                $html = '';
            }
            return $html;
        }

        public function pinit($config = array()) {
            $html = '<a href="//www.pinterest.com/pin/create/button/" ' . $this->_buildDataAttributes($config) . ' ><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" /></a>' . $this->_button();
            return $html;
        }

    }

}