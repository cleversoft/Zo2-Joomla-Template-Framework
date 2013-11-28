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

class Divider extends Zo2Shortcode
{
    // set short code tag
    protected $tagname = 'divider';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */
    protected function body()
    {
        extract($this->shortcode_atts(array(
            "scroll_text" => ''
        ), $this->attrs));

        $divider = '<div class="divider"><div class="scroll-top">';
        $divider = $divider . $scroll_text . '</div></div>';

        return $divider;
    }

}


