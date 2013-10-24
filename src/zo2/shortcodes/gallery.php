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

class Gallery extends Zo2Shortcode
{
    // set short code tag
    protected $tagname = 'gallery';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */
    protected function body()
    {
        global $gwidth, $gheight;

        extract($this->shortcode_atts(array(
            "title" 	=> 'Photo Gallery',
            "width"		=> 100,
            "height"	=> 100,
            "columns"	=> 3
        ), $this->attrs));


        $gwidth  = $width;
        $gheight = $height;

        $gallery  = '<div class="highslide-gallery">';
        $gallery .= '<h3>' . $title . '</h3>';
        $gallery .= '<ul>' . $this->do_shortcode(str_replace(array("<br/>", "<br>", "<br />"), " ", $this->content)) . '</ul>';
        $gallery .= '</div>';

        return $gallery;
    }

}


