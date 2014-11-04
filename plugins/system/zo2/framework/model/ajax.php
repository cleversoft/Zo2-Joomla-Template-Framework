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
if (!class_exists('Zo2ModelAjax')) {

    /**
     * 
     */
    class Zo2ModelAjax {

        /**
         * 
         */
        public function clearCache() {
            if (JFolder::delete(ZO2PATH_CACHE)) {
                $this->_respond('Cache deleted');
            } else {
                $this->_respond('Something wrong');
            }
        }

        public function buildAssets() {
            $assets = Zo2Assets::getInstance();
            $assets->buildAssets();
            $this->_respond('Build success');
        }

        public function renderAdmin() {
            $this->_respond(Zo2Html::_('admin', 'render'));
        }

        private function _respond($data) {
            echo json_encode($data);
        }

    }

}