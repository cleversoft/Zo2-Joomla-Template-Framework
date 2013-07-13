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

if (!function_exists('instagram')) {

    function instagram($atts, $content = "")
    {

        extract(shortcode_atts(array(
            'url' => '',
            'w' => 720,
            'h' => 320,
        ), $atts));

        if ( ! is_array( $atts ) ) {
            return '<!-- Instagram shortcode passed invalid attributes -->';
        }

        if (!empty($url)) {

            $video_json = 'http://api.instagram.com/oembed?url=' . $url;
            $http = JHttpFactory::getHttp();
            $response = $http->get($video_json);
            $body = $response->body;
            $info = json_decode($body);
            return '<img class="photo" src="' . $info->url . '" alt="' . $info->title . '" title="' . $info->title . '">';
        }
    }

    add_shortcode('instagram', 'instagram');
}

