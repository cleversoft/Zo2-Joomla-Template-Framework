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
if (!class_exists('Zo2ServiceGooglemap')) {

    /**
     * 
     */
    class Zo2ServiceGooglemap extends Zo2ServiceAbstract {

        private $_apiUrl = array();
        private $_markers = array();

        protected function _init() {
            $this->_apiUrl = 'https://maps.googleapis.com/maps/api/js';
            //JFactory::getDocument()->addScript($this->_apiUrl . '?v=3.exp&sensor=true');
            /**
             * Default configs
             */
            $this->_configs->def('zoom', 14);
            $this->_configs->def('center.lat', '10.78565');
            $this->_configs->def('center.lng', '106.69466');
        }

        public function addMarker($lat = '10.78565', $lng = '106.69466', $title = 'My WorkPlace') {
            $marker = new JObject();
            $marker->set('lat', $lat);
            $marker->set('lng', $lng);
            $marker->set('title', $title);
            $this->_markers[] = $marker;
        }

        public function getMap($name) {
            $template = new Zo2Template($this->_configs->getProperties());
            $template->registerDir(ZO2PATH_ROOT . '/libraries/services/js');
            $template->set('name', $name);
            $template->set('markers', $this->_markers);
            return $template->fetch('googlemap.php');
        }

    }

}