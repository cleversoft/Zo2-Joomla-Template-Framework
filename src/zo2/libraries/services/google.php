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
if (!class_exists('Zo2ServiceGoogle')) {

    /**
     * 
     */
    class Zo2ServiceGoogle {

        /**
         * 
         * @staticvar boolean $loaded
         * @param type $name
         * @param type $lat
         * @param type $lng
         * @param type $title
         * @param type $zoom
         * @return type
         */
        public function getMap($name, $lat, $lng, $title, $zoom) {
            static $loaded = false;
            if ($loaded === false) {
                Zo2Assets::getInstance()->addScript('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true');
                Zo2Assets::getInstance()->addScript('https://maps.gstatic.com/intl/en_us/mapfiles/api-3/15/5/main.js');
            }

            $style = '#' . $name . ' { height: 100%; width: 100%; }';
            $script = '
                function initialize() {
                    var location = new google.maps.LatLng(' . $lat . ',' . $lng . ');
                    var mapOptions = {
                        center: location,
                        zoom: ' . (int) $zoom . '
                    };
                    var ' . $name . ' = new google.maps.Map(document.getElementById("' . $name . '"),mapOptions);
                    var marker = new google.maps.Marker ({
                        position: location,
                        title: "' . $title . '"
                    });
                    marker.setMap(' . $name . ');
                };                                
                google.maps.event.addDomListener(window, \'load\', initialize);
                ';
            $html = '<div id="' . $name . '"></div>';
            return '<style type="text/css">' . $style . '</style>' . $html . '<script type="text/javascript">' . $script . '</script>';
        }

    }

}
?>