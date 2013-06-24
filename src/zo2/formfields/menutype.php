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
defined ('_JEXEC') or die ('resticted aceess');

JFormHelper::loadFieldClass('list');

require_once realpath(JPATH_ADMINISTRATOR . '/components/com_menus/helpers/menus.php');


class JFormFieldMenutype extends JFormFieldMenu
{
    /**
     * The form field type.
     *
     * @var    string
     * @since  1.6
     */
    public $type = 'Menutype';

    /**
     * Method to get the field input markup for a generic list.
     * Use the multiple attribute to enable multiselect.
     *
     * @return  string  The field input markup.
     *
     * @since   11.1
     */
    protected function getInput()
    {


        $html = array();
        $vars = array();
        $calls = array();

        $input = JFactory::getApplication()->input;
        if($input->getCmd('option') == 'com_templates' &&
            (preg_match('/style\./', $input->getCmd('task')) || $input->getCmd('view') == 'style' || $input->getCmd('view') == 'template')
        ){
            $vars['url'] = JUri::root() . 'index.php?zo2controller=menu&task=display';
        }
        $calls[] = 'Assets.ajax(\''.$this->getName('menu_type').'\', ' . json_encode($vars) . ');';

        $html[] = '<script type="text/javascript">';
        $html[] = '         jQuery(window).on(\'load\', function(){';
        $html[] = '             '.implode("\n", $calls).'';
        $html[] = '         })';
        $html[] = '</script>';

        $attr = '';

        // Initialize some field attributes.
        $attr .= $this->element['class'] ? ' class="' . (string) $this->element['class'] . '"' : '';

        // To avoid user's confusion, readonly="true" should imply disabled="true".
        if ((string) $this->element['readonly'] == 'true' || (string) $this->element['disabled'] == 'true')
        {
            $attr .= ' disabled="disabled"';
        }

        $attr .= $this->element['size'] ? ' size="' . (int) $this->element['size'] . '"' : '';
        $attr .= $this->multiple ? ' multiple="multiple"' : '';
        $attr .= $this->required ? ' required="required" aria-required="true"' : '';

        // Initialize JavaScript field attributes.
        $attr .= $this->element['onchange'] ? ' onchange="' . (string) $this->element['onchange'] . '"' : '';

        // Get the field options.
        $options = (array) $this->getOptions();

        // Create a read-only list (no name) with a hidden input to store the value.
        if ((string) $this->element['readonly'] == 'true')
        {
            $html[] = JHtml::_('select.genericlist', $options, '', trim($attr), 'value', 'text', $this->value, $this->id);
            $html[] = '<input type="hidden" name="' . $this->name . '" value="' . $this->value . '"/>';
        }
        // Create a regular list.
        else
        {
            $html[] = JHtml::_('select.genericlist', $options, $this->name, trim($attr), 'value', 'text', $this->value, $this->id);
        }

        return implode($html);
    }

}