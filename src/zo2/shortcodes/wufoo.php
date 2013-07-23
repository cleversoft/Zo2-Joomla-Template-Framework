<?php
/**
 * Zo2 Framework (http://zo2framework.org)
 *
 * @link         http://github.com/aploss/zo2
 * @package      Zo2
 * @author       Hiepvu
 * @copyright    Copyright ( c ) 2008 - 2013 APL Solutions
 * @license      http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */
//no direct accees
defined('_JEXEC') or die ('resticted aceess');

Zo2Framework::import2('core.shortcodes');

class Wufoo extends ZO2Shortcode
{
    // set short code tag
    protected $tagname = 'wufoo';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */

    protected function body()
    {
        // initializing variables for short code
        extract(shortcode_atts(array(
                'username' => '',
                'formhash' => '',
                'h' => 320,
            ),
            $this->attrs
        ));

        return '<iframe height="' . $h . '" allowTransparency="true" frameborder="0" scrolling="no" style="width:100%;border:none"  src="http://' . $username . '.wufoo.com/embed/' . $formhash . '/"><a href="http://' . $username . '.wufoo.com/forms/' . $formhash . '/">Fill out my Wufoo form!</a></iframe>';
    }

}
