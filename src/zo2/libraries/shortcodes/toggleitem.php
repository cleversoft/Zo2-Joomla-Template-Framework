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

class Toggleitem extends Zo2Shortcode
{
    // set short code tag
    protected $tagname = 'toggle_item';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */
    protected function body()
    {
        extract($this->shortcode_atts(array(
            "title" => ''
        ), $this->attrs));

        $toggle_item = "<li class='zt-divider'>";
        $toggle_item = $toggle_item . "<h3 class='toggle-box-head title-color zt-title'>";
        $toggle_item = $toggle_item . "<span class='toggle-box-head-image'></span>";
        $toggle_item = $toggle_item . $title . "</h3>";
        $toggle_item = $toggle_item . "<div class='toggle-box-content'>" . $this->do_shortcode($this->content) . "</div>";
        $toggle_item = $toggle_item . "</li>";

        return $toggle_item;
    }

}


