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

class JFormFieldHeader extends JFormField
{
    /**
     * The form field type.
     *
     * @var    string
     */
    protected $type = 'Header';

    /**
     * Method to get the field input markup for a header.
     * The header does not have accept input.
     *
     * @return  string  The field input markup.
     *
     */
    protected function getInput()
    {
        return ' ';
    }

    /**
     * Method to get the field label markup for a header.
     * Use the label text or name from the XML element as the header or
     *
     * @return  string  The field label markup.
     */
    protected function getLabel()
    {
        $html = array();
        $class = $this->element['class'] ? (string) $this->element['class'] : '';
        $style = $this->element['style'] ? (string) $this->element['style'] : '';

        $html[] = '<span class="' . $class . '">';

        $label = '';

        // Get the label text from the XML element, defaulting to the element name.
        $text = $this->element['label'] ? (string) $this->element['label'] : (string) $this->element['name'];
        $text = $this->translateLabel ? JText::_($text) : $text;

        // Build the class for the label.
        $class = !empty($this->description) ? 'hasTip' : '';
        $class = $this->required == true ? $class . ' required' : $class;

        // Add the opening label tag and main attributes attributes.
        $label .= '<label id="' . $this->id . '-lbl" class="' . $class . '"';

        // If a description is specified, use it to build a tooltip.
        if (!empty($this->description))
        {
            $label .= ' title="'
                . htmlspecialchars(
                    trim($text, ':') . '::' . ($this->translateDescription ? JText::_($this->description) : $this->description),
                    ENT_COMPAT, 'UTF-8'
                ) . '"';
        }

        // Add the label text and closing tag.
        $label .= '>' . $text . '</label>';
        $html[] = $label;

        $html[] = '</span>';

        return implode('', $html);
    }

    /**
     * Method to get the field title.
     *
     * @return  string  The field title.
     */
    protected function getTitle()
    {
        return $this->getLabel();
    }
}
