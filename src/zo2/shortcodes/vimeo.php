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

Zo2Framework::import2('core.Zo2Shortcode');

class Vimeo extends ZO2Shortcode
{
    // set short code tag
    protected $tagname = 'vimeo';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */

    protected function body()
    {
        // initializing variables for short code
        extract(shortcode_atts(array(
                'id' => 69445362,
                'w' => 720,
                'h' => 320,
                'autoplay' => 0
            ),
            $this->attrs
        ));


        return '<iframe width="' . $w . '" height="' . $h . '" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://player.vimeo.com/video/' . $id . '?badge=0&amp;autoplay=' . $autoplay . '" webkitAllowFullScreen mozallowfullscreen allowfullscreen=""></iframe>';
    }

}

