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

class Togglebox extends Zo2Shortcode
{
    // set short code tag
    protected $tagname = 'toggle_box';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */
    protected function body()
    {
        $toggle_box = "<ul class='zt-toggle-box'>";
        $toggle_box = $toggle_box . $this->do_shortcode(str_replace(array("<br/>", "<br>", "<br />"), " ", $this->content));
        $toggle_box = $toggle_box . "</ul>";

        return $toggle_box;
    }

}


