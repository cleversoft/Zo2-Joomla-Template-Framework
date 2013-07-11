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

if (!function_exists('dailymotion')) {
    /**
     * @param $atts
     * @param string $content
     * @return string
     */
    function dailymotion($atts, $url = "")
    {

        extract(shortcode_atts(array(
            'id' => 'xuj8os',
            'w' => 720,
            'h' => 320,
            'autoplay' => 0
        ), $atts));

        if ( ! is_array( $atts ) ) {
            return '<!-- Dailymotion shortcode passed invalid attributes -->';
        }

        if (!empty($url)) {

            $parse = parse_url($url);
            $path = str_replace('/video/','', $parse['path']);
            $array = explode('_', $path);
            $id = $array[0];

        }
        return '<iframe width="' . $w . '" height="' . $h . '" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.dailymotion.com/embed/video/'.$id.'?autoPlay='.$autoplay.'" webkitAllowFullScreen mozallowfullscreen allowfullscreen=""></iframe>';
    }

    add_shortcode('dailymotion', 'dailymotion');
}

