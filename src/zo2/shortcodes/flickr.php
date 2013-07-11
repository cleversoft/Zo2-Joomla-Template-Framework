<?php
/**
 * Zo2 Framework (http://zo2framework.org)
 *
 * @link         http://github.com/aploss/zo2
 * @package      Zo2
 * @author       Hiepvu
 * @copyright    Copyright ( c ) 2008 - 2013 APL Solutions
 * @license      http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */
//no direct accees
defined('_JEXEC') or die ('resticted aceess');

if (!function_exists('flickr')) {

    function flickr($atts, $content = "")
    {

        extract(shortcode_atts(array(
            'id' => '',
            'url' => '',
            'w' => 300,
            'h' => 100,
        ), $atts));

        if ( ! is_array( $atts ) ) {
            return '<!-- Flickr shortcode passed invalid attributes -->';
        }

        $http = JHttpFactory::getHttp();

        if (!empty($id)) {
//            $response = $http->get('http://api.flickr.com/services/rest/?method=flickr.photos.getInfo&api_key=babacb7f133ab7e95846cedce9b03698&photo_id='.$id.'&format=json');
//            $body = $response->body;
//            $info = json_decode($body);
            //$url = 'http://flickr.com/services/oembed?url=http://www.flickr.com/photo.gne?id='. $id .'&format=json';
        } elseif (!empty($url)) {
            $url = 'http://flickr.com/services/oembed?url='. $url .'&format=json&maxwidth='.$w.'&maxheight=' . $h;
        }

        $response = $http->get($url);
        $body = $response->body;
        $info = json_decode($body);

        if (isset($info->html)) {
            return $info->html;
        }

    }


    add_shortcode('flickr', 'flickr');
}

