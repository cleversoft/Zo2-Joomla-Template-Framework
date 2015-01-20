<?php

Zo2Framework::log('Load depends: ' . __FILE__);
JHtml::_('jquery.framework');
JHtml::_('jquery.ui', array('core', 'sortable'));
JHtml::_('bootstrap.framework');

$doc = JFactory::getDocument();

$replacedScripts = array();
foreach ($doc->_scripts as $key => $value)
{
    if ($key == JUri::root(true) . '/media/jui/js/bootstrap.min.js')
    {
        $replacedScripts[JUri::root(true) . '/plugins/system/zo2/framework/assets/vendor/bootstrap/js/bootstrap.min.js'] = $value;
    } else
    {
        $replacedScripts[$key] = $value;
    }
}
$doc->_scripts = $replacedScripts;

$zo2Assets = Zo2Path::getInstance()->getPath('Zo2://assets/admin.json');

if ($zo2Assets)
{
    $assets = Zo2Assets::getInstance();
    $zoAssets = json_decode(file_get_contents($zo2Assets));
    $assets->load($zoAssets);
}