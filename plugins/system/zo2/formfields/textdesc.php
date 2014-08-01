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
