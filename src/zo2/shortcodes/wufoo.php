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

class Wufoo extends Zo2Shortcode
{
    // set short code tag
    protected $tagname = 'wufoo';

    protected $embed = true;

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */

    protected function body()
    {
        // initializing variables for short code
        extract($this->shortcode_atts(array(
                'username' => '',
                'formhash' => '',
                'h' => 320,
            ),
            $this->attrs
        ));

        return '<iframe height="' . $h . '" allowTransparency="true" frameborder="0" scrolling="no" style="width:100%;border:none"  src="http://' . $username . '.wufoo.com/embed/' . $formhash . '/"><a href="http://' . $username . '.wufoo.com/forms/' . $formhash . '/">Fill out my Wufoo form!</a></iframe>';
    }

}
