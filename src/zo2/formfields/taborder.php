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

class JFormFieldTaborder extends JFormFieldText
{
    protected $type = 'Taborder';

    /**
     * Get the html for input
     *
     * @return string
     */
    public function getInput()
    {
        $html = '<div style="margin: 5px 0;">
                    <strong>' . JText::_('ZO2_FORMFIELD_TABORDER_NOTE') . ' </strong>: ' . JText::_('ZO2_FORMFIELD_TABORDER_NOTE_DETAIL') . '<br />
                    <strong>' . JText::_('ZO2_FORMFIELD_TABORDER_POSSIBLE_VALUE') . ' </strong>: ' . JText::_('ZO2_FORMFIELD_TABORDER_NETWORKSOCIAL_LIST_ALL') . ' <br />
                    <strong>' . JText::_('ZO2_FORMFIELD_TABORDER_DEFAULT_VALUE') . ' </strong>: ' . JText::_('ZO2_FORMFIELD_TABORDER_NETWORKSOCIAL_LIST_DEFAULT') . ' <br />
                </div>';

        return parent::getInput() . $html ;
    }
}
