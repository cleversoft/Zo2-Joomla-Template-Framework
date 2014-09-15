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
if (!class_exists('Zo2ServiceLinkedinbutton')) {

    /**
     * 
     */
    class Zo2ServiceLinkedinbutton extends Zo2ServiceAbstract {

        /**
         * 
         */
        protected function _init() {
            $this->_configs->def('url', JUri::getInstance()->toString());
        }

        private function _button() {
            static $init = false;
            if ($init === false) {
                $html = '<script src="//platform.linkedin.com/in.js" type="text/javascript">
 lang: en_US
</script>';
                $init = true;
            } else {
                $html = '';
            }
            return $html;
        }

        public function share($config) {
            return $this->_button() . '<script type="IN/Share" ' . $this->_buildDataAttributes($config) . '></script>';
        }

    }

}