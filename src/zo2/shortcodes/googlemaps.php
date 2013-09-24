<?php
/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      Duc Nguyen <ducntv@gmail.com>
 * @author      Hiepvu <vqhiep2010@gmail.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */
//no direct accees
defined('_JEXEC') or die ('resticted aceess');

Zo2Framework::import2('core.Zo2Shortcode');

class Googlemaps extends Zo2Shortcode
{
    // set short code tag
    protected $tagname = 'googlemaps';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */
    protected function body()
    {

        // initializing variables for short code
        extract($this->shortcode_atts(array(
                'lat' => -34.397,
                'lng' => 150.644,
                'zoom' => 11,
                'w' => 100,
                'h' => 400
            ),
            $this->attrs
        ));

        $w = ($w == '100%') ? $w : $w . 'px';

        Zo2Framework::addJsScript('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false');

        $script = '

            var map;

            function initialize() {
              var myLatlng = new google.maps.LatLng(' . $lat . ', ' . $lng . ');
              var mapOptions = {
                zoom: ' . $zoom . ',
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
              };
              map = new google.maps.Map(document.getElementById(\'map-canvas\'), mapOptions);
              var marker = new google.maps.Marker({
                            position: myLatlng,
                            title: "' . $this->content . '"
                           });
              marker.setMap(map);
            }

            google.maps.event.addDomListener(window, \'load\', initialize);

        ';
        Zo2Framework::addScriptDeclaration($script);

        return '<div id="map-canvas" style="width: ' . $w . '; height: ' . $h . 'px;"></div>';
    }

}
