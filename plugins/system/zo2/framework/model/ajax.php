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

        private $_ajax;

        public function __construct() {
            $this->_ajax = Zo2Ajax::getInstance();
        }

        /**
         * 
         */
        public function clearCache() {
            if (JFolder::delete(ZO2PATH_CACHE)) {
                $this->_ajax->addMessage('Clear cleared', 'success');
            } else {
                $this->_ajax->addMessage('Something wrong', 'error');
            }
            $this->_ajax->response();
        }

        public function buildAssets() {
            $assets = Zo2Assets::getInstance();
            $assets->buildAssets();
            $this->_ajax->addMessage('Build success', 'success');
            $this->_ajax->response();
        }

        public function renderAdmin() {
            $this->_ajax->addHtml(Zo2Html::_('admin', 'render'));
            $this->_ajax->response();
        }

    }

}