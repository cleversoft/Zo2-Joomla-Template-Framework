<?php
/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die;

class JFormFieldTextdesc extends JFormFieldText
{
    protected $type = 'Textdesc';

    /**
     * Get the html for input
     *
     * @return string
     */
    public function getInput()
    {
        $desc = ($this->element['description']) ? $this->element['description'] : '';

        return parent::getInput() .'<div class="clearfix"></div><span class="zo2-field-desc pull-left">'. $desc .'</span>' ;
    }
}
