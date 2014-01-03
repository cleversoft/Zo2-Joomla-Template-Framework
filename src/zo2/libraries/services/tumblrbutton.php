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
if (!class_exists('Zo2ServiceTumblrbutton')) {

    /**
     * 
     */
    class Zo2ServiceTumblrbutton extends Zo2ServiceAbstract {

        /**
         * 
         */
        protected function _init() {
            Zo2Assets::getInstance()->addScript('http://platform.tumblr.com/v1/share.js');
            $this->_configs->def('url', JUri::getInstance()->toString());
        }

        /**
         * 
         * @param type $type
         * @param type $scheme
         * @return string
         */
        public function follow($type = 1, $scheme = 'dark') {
            switch ($type) {
                case 1:
                    $width = 119;
                    break;
                case 2:
                    $width = 113;
                    break;
                case 3:
                    $width = 18;
                    break;
                default:
                    $width = 18;
                    break;
            }
            $html = '<iframe class="btn" frameborder="0" border="0" scrolling="no" allowtransparency="true" height="25" width="' . $width . '" src="http://platform.tumblr.com/v1/follow_button.html?button_type=' . $type . '&tumblelog=staff&color_scheme="' . $scheme . '></iframe>';
            return $html;
        }

    }

}