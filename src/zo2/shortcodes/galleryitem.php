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

class Galleryitem extends Zo2Shortcode
{
    // set short code tag
    protected $tagname = 'gallery_item';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */
    protected function body()
    {
        global $gwidth, $gheight;

        extract($this->shortcode_atts(array(
            "title" => '',
            "src"	=> ''
        ), $this->attrs));

        $src    = (strpos($src, "http://") === false) ? JURI::base() . $src : $src;
        $simage = JURI::base() . "plugins/system/zo2/addons/timthumb.php?w=".$gwidth."&amp;h=".$gheight."&amp;src=" . $src;
        $gallery_item = "<li class='gallery-item'>";
        $gallery_item .= "<a title='" . $title . "' href='" . $src . "' data-rel='prettyPhoto[bkpGallery]'>";
        $gallery_item .= "<img src='" . $simage . "' title='" . $title . "' alt='" . $title . "' />";
        $gallery_item .= "</a>";
        $gallery_item .= "</li>";

        return str_replace("<br/>", " ", $gallery_item);

    }

}


