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

if (!function_exists('wufoo')) {

    function wufoo($atts, $content = "")
    {

        extract(shortcode_atts(array(
            'username' => '',
            'formhash' => '',
            'h' => 320,
        ), $atts));

        if ( ! is_array( $atts ) ) {
            return '<!-- Wufoo shortcode passed invalid attributes -->';
        }

        return '<iframe height="'.$h.'" allowTransparency="true" frameborder="0" scrolling="no" style="width:100%;border:none"  src="http://'.$username.'.wufoo.com/embed/'.$formhash.'/"><a href="http://'.$username.'.wufoo.com/forms/'.$formhash.'/">Fill out my Wufoo form!</a></iframe>';
    }

    add_shortcode('wufoo', 'wufoo');
}

