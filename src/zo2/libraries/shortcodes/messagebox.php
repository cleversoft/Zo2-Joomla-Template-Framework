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

class Messagebox extends Zo2Shortcode
{
    // set short code tag
    protected $tagname = 'message_box';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */
    protected function body()
    {
        extract($this->shortcode_atts(array(
            "title" =>'',
            "color" =>'red',
            "show_close" => "No",
        ), $this->attrs));

        $message_box = '<div class="message-box-wrapper ' . $color . '">';
        $message_box = $message_box . '<div class="message-box-head">';
        $message_box = $message_box . '<div class="message-box-title">' . $title . '</div>';
        $message_box .= ($show_close == "Yes" || $show_close == "yes")
            ? '<div class="message-box-close"><a href="javascript: void(0);" onClick="closeMessage(this);">X</a></div>'
            : "";
        $message_box = $message_box . '</div>';
        $message_box = $message_box . '<div class="message-box-content">' . $this->content . '</div>';
        $message_box = $message_box . '</div>';

        return $message_box;
    }

}


