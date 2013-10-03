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

class Tabs extends Zo2Shortcode
{
    // set short code tag
    protected $tagname = 'tabs';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */
    protected function body()
    {
        global $tab_array;
        $tab_array = array();

        $this->do_shortcode($this->content);

        $num = count($tab_array);

        $tab = "<ul class='tabs'>";

        for($i = 0; $i < $num; $i ++) {
            $active = ($i == 0) ? 'active' : '';
            $tab_id = str_replace(' ', '-', $tab_array[$i]["title"]);

            $tab = $tab . '<li><a href="#' . $tab_id  . '" class="zt-title ';
            $tab = $tab . $active . '" >' . $tab_array[$i]["title"] . '</a></li>';
        }

        $tab = $tab . "</ul>";
        $tab = $tab . "<ul class='tabs-content'>";

        for($i = 0; $i < $num; $i ++) {
            $active = ($i == 0) ? 'active' : '';
            $tab_id = str_replace(' ', '-', $tab_array[$i]["title"]);

            $tab = $tab . '<li id="' . $tab_id . '" class="';
            $tab = $tab . $active . '" >' . $tab_array[$i]["content"] . '</li>';
        }

        $tab = $tab . "</ul>";

        return $tab;
    }

}


