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
//no direct accees
defined('_JEXEC') or die ('resticted aceess');


Zo2Framework::import2('core.Zo2Shortcode');

class Lightbox extends Zo2Shortcode
{
    // set short code tag
    protected $tagname = 'lightbox';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */
    protected function body()
    {
        extract($this->shortcode_atts(array(
            "src"		=> '#',
            "width"		=> 'auto',
            "height"	=> 'auto',
            "title"		=> '',
            'align'		=> 'none',
            'lightbox'	=> 'on'
        ), $this->attrs));

        $width  = ($width  == "auto") ? "auto" : $width  . 'px';
        $height = ($height == "auto") ? "auto" : $height . 'px';

        $src   = (strpos($src, "http://") === false) ? JURI::base() . $src : $src;

        if($width != "auto" && $height != "auto") {
            $isrc = JURI::base() . "plugins/system/zo2/addons/timthumb.php?w=" . $width . "&amp;h=" . $height . "&amp;src=" . $src;
        }

        $frame = "<img src='" . $isrc . "' style='width:" . $width . "; height:" . $height . ";' alt='" . $title . "' />";

        if($lightbox == 'on') {
            $frame = "<a href='" . $src . "' class='modal' title='" . $title . "' >" . $frame . "</a>";
        }

        $frame = "<div class='zt-image-frame shortcode-image-" . $align . "' style='max-width: 100%; float: " . $align . "; width: " . $width . "; height: " . $height . "; '>" . $frame . "</div>";

        return $frame;
    }

}


