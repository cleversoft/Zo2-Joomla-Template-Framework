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

class Plan extends Zo2Shortcode
{
    // set short code tag
    protected $tagname = 'plan';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */
    protected function body()
    {
        extract($this->shortcode_atts(array(
            "title" => '',
            "button_link" => '',
            "button_label" => '',
            "price" => '',
            "featured" => '',
            "per" => 'month',
        ), $this->attrs));

        return '<div class="pricing_box plan1-3' . (('true' == strtolower($featured)) ? ' featured' : '') . '">' .
        '<div class="header"><span>' . $title . '</span></div>' .
        '<h2>' . $price . '<span style="font-size: 14px;">/' . $per . '</span></h2>' .
        $this->do_shortcode(str_replace(array("<br/>", "<br>", "<br />"), " ", $this->content)) .
        '<a class="button" href="' . $button_link . '">' . $button_label . '</a>' .
        '</div>';
    }

}


