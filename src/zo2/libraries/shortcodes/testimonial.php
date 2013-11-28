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

class Testimonial extends Zo2Shortcode
{
    // set short code tag
    protected $tagname = 'testimonial';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */
    protected function body()
    {
        extract($this->shortcode_atts(array(
            "author" => '',
            "position" => ''
        ), $this->attrs));

        $testimonial = '<div class="testimonial-content">';
        $testimonial .= '<div class="testimonial-icon"></div>';
        $testimonial .= $this->content;
        $testimonial .= '</div>';
        $testimonial .= '<div class="testimonial-author zt-divider">';
        $testimonial .= '<span class="testimonial-author-name">' . $author . ', </span>';
        $testimonial .= '<span class="testimonial-author-position">' . $position . '</span>';
        $testimonial .= '</div>';

        return $testimonial;
    }

}


