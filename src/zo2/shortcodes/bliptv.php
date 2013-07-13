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

if (!function_exists('bliptv')) {

    function bliptv($atts, $content = "")
    {

        extract(shortcode_atts(array(
            'id' => 6608034,
            'w' => 720,
            'h' => 320,
            'autoplay' => false
        ), $atts));

        if ( ! is_array( $atts ) ) {
            return '<!-- Bliptv shortcode passed invalid attributes -->';
        }

        return '<iframe width="' . $w . '" height="' . $h . '" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://blip.tv/players/xplayer?id=' . $id . '&amp;autoplay=' . $autoplay . '&amp;onsite=true&amp;no_postroll=true" webkitAllowFullScreen mozallowfullscreen allowfullscreen=""></iframe>';
    }

    add_shortcode('blip.tv', 'bliptv');
}

