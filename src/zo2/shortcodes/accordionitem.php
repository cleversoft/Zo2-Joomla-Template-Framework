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

class Accordionitem extends Zo2Shortcode
{
    // set short code tag
    protected $tagname = 'acc_item';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */
    protected function body()
    {
        extract($this->shortcode_atts(array(
            "title" => ''
        ), $this->attrs));

        $acc_item = "<li class='zt-divider'>";
        $acc_item = $acc_item . "<h3 class='accordion-head title-color zt-title'>";
        $acc_item = $acc_item . "<span class='accordion-head-image'></span>";
        $acc_item = $acc_item . $title . "</h3>";
        $acc_item = $acc_item . "<div class='accordion-content'>" . $this->do_shortcode($this->content) . "</div>";
        $acc_item = $acc_item . "</li>";

        return $acc_item;
    }

}


