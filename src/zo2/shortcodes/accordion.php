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

class Accordion extends Zo2Shortcode
{
    // set short code tag
    protected $tagname = 'accordion';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */
    protected function body()
    {
        $this->attrs = null;

        $accordion = "<ul class='zt-accordion'>";
        $accordion = $accordion . $this->do_shortcode(str_replace(array("<br/>", "<br>", "<br />"), " ", $this->content));
        $accordion = $accordion . "</ul>";

        return $accordion;
    }

}


