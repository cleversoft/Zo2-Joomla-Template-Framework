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
if (!class_exists('Zo2Imager')) {

    /**
     * @author Viet Vu <me@jooservices.com>
     */
    class Zo2Imager {

        private $_processor = null;

        /**
         *
         * @return \Zo2ImageImageMagick|\Zo2ImageImagick|\Zo2ImageGd
         */
        private function _getProcessor() {
            /* php module */
            //if (call_user_func(array('Zo2ImagerImagick', 'isInstalled'))) {
            //return new Zo2ImagerImagick();
            //}
//            /* imagemagick tool */
//            if (call_user_func(array('Zo2ImagerImagemagick', 'isInstalled'))) {
//                return new Zo2ImagerImageMagick();
//            }
            /* gd module */
            if (call_user_func(array('Zo2ImagerGd', 'isInstalled'))) {
                return new Zo2ImagerGd();
            }
        }

        /**
         *
         * @param type $name
         * @param type $arguments
         * @return type
         */
        public function __call($name, $arguments) {
            if ($this->_processor == null)
                $this->_processor = $this->_getProcessor();
            if (method_exists($this->_processor, $name)) {
                return call_user_func_array(array($this->_processor, $name), $arguments);
            }
        }

    }

}