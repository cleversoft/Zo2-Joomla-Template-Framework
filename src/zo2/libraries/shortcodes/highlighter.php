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

class Highlighter extends Zo2Shortcode
{
    // set short code tag
    protected $tagname = 'highlighter';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */
    protected function body()
    {
        $text    = '';
        $script  = '';

        if(!defined('ZO2_HIGHLIGHT_CODE')) {
            $script = '<script type="text/javascript">$ZO2(document).ready(function() {prettyPrint();});</script>';
            define('ZO2_HIGHLIGHT_CODE', 1);
        }

        extract($this->shortcode_atts(array(
            "lang"		=> '',
            "linenums" 	=> 'true',
            "startnums" => 0
        ), $this->attrs));

        $text = '<pre class="prettyprint'.(($lang != '') ? ' lang-' . $lang : '').(($linenums == 'true') ? ' linenums' : '')
            . (($startnums && $linenums == 'true') ? ':' . $startnums : '').'">'
            . $this->content
            . '</pre>'
            . $script;

        return $text;
    }

}


