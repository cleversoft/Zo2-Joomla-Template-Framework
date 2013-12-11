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

class Social extends Zo2Shortcode
{
    // set short code tag
    protected $tagname = 'social';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */
    protected function body()
    {
        extract($this->shortcode_atts(array(
            "type" 		=> 'facebook',
            "opacity"	=> 'dark'
        ), $this->attrs));

        $social = '<div class="shortcode-social social-icon"><a target="_blank" title="' . $type . '" href="' . $this->content . '">';
        $social = $social . '<img class="no-preload" src="' . JURI::base() . 'plugins/system/zo2/addons/shortcodes/images/icon/' . $opacity . '/social/' . $type . '.png' . '" alt="' . $type . '" /></a></div>';

        return $social;
    }

}


