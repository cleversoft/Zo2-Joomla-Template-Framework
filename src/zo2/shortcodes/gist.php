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

if (!function_exists('gist')) {

    function gist($atts, $content = "")
    {

        extract(shortcode_atts(array(
            'id' => '',
            'username' => '',
            'url' => ''
        ), $atts));

        if (!is_array($atts)) {
            return '<!-- Gist shortcode passed invalid attributes -->';
        }

        if (!empty($url)) {

            $url = JString::parse_url($url);
            $path = $url['path'];
            $info = explode('/', trim($path, '/'));
            $id = $info[1];
            $username = $info[0];

        }

        if (!empty($username)) {

            $gist_url = sprintf('https://gist.github.com/%s/%s.js', $username, $id);
            return '<script src="' . $gist_url . '"></script>';

        }

    }

    add_shortcode('gist', 'gist');
}

