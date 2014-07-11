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

class JFormFieldFont extends JFormField
{
    protected $type = 'Font';

    /**
     * Get the html for input
     *
     * @return string
     */
    public function getInput()
    {
        $path = JPATH_SITE.'/plugins/system/zo2/templates/font.php';
        ob_start();
        include($path);
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }

    public function getLabel()
    {
        switch($this->fieldname)
        {
            case 'body_font': return JText::_('ZO2_FORMFIELD_FONT_BODY');
            case 'h1_font': return JText::_('ZO2_FORMFIELD_FONT_H1');
            case 'h2_font': return JText::_('ZO2_FORMFIELD_FONT_H2');
            case 'h3_font': return JText::_('ZO2_FORMFIELD_FONT_H3');
            case 'h4_font': return JText::_('ZO2_FORMFIELD_FONT_H4');
            case 'h5_font': return JText::_('ZO2_FORMFIELD_FONT_H5');
            case 'h6_font': return JText::_('ZO2_FORMFIELD_FONT_H6');
            default: return '';
        }
    }
}
