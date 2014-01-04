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
if (!class_exists('Zo2ServicePinterestbutton')) {

    /**
     * 
     */
    class Zo2ServicePinterestbutton extends Zo2ServiceAbstract {

        /**
         * 
         */
        protected function _init() {
            JFactory::getDocument()->addScript('https://assets.pinterest.com/js/pinit.js');
            $this->_configs->def('href', JUri::getInstance()->toString());
        }

        public function pinit($config = array()) {
            $html = '<a href="//www.pinterest.com/pin/create/button/" ' . $this->_buildDataAttributes($config) . ' ><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" /></a>';
            return $html;
        }

    }

}