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

class Button extends Zo2Shortcode
{
    // set short code tag
    protected $tagname = 'button';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */
    protected function body()
    {
        extract($this->shortcode_atts(array(
            "type"	=> '',
            "size" 	=> '',
            "state" => 'enable',
        ), $this->attrs));


        return '<button class="btn'.
        (($type != '') ? ' btn-' . $type : '').
        (($size != '') ? ' btn-' . $size : '') .
        (($state == 'disabled') ? ' disabled' : '') .
        '">Primary</button>';

    }

}


