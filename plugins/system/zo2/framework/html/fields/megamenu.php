<?php

$html = array();
$vars = array();
$calls = array();
$attr = '';

$input = JFactory::getApplication()->input;
if ($input->getCmd('option') == 'com_templates' &&
        (preg_match('/style\./', $input->getCmd('task')) || $input->getCmd('view') == 'style' || $input->getCmd('view') == 'template')
) {
    $vars['url'] = JUri::root() . 'index.php?zo2controller=menu&task=display';
}
$calls[] = 'Assets.ajax(\'' . $this->data['name'] . '\', ' . json_encode($vars) . ');';

$html[] = '<script type="text/javascript">';
$html[] = '         jQuery(window).on(\'load\', function(){';
$html[] = '             ' . implode("\n", $calls) . '';
$html[] = '         })';
$html[] = '</script>';


// Get the field options.
$options = (array) JHtml::_('menu.menus');

$html[] = JHtml::_('select.genericlist', $options, $this->data['name'], trim($attr), 'value', 'text', $this->data['value'], $this->data['id']);
echo implode("\n", $html);
?>
