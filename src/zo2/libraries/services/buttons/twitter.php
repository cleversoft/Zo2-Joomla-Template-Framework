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
if (!class_exists('Zo2ServiceButtonTwitter')) {

    /**
     * 
     */
    class Zo2ServiceButtonTwitter extends Zo2ServiceButtonAbstract {

        public function __construct($properties = null) {
            parent::__construct($properties);
            $this->_script = '!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");';
        }

        /**
         * Get share button
         * @param type $text
         * @return string
         */
        public function share($text = 'Tweet') {
            $html = '<a href="https://twitter.com/share" class="twitter-share-button" ' . $this->toDataAttributes() . '>' . $text . '</a>';
            return $html;
        }

    }

}