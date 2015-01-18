<?php

Zo2Framework::log('Load depends: ' . __FILE__);
JHtml::_('jquery.framework');
JHtml::_('jquery.ui', array('core', 'sortable'));

$zo2Assets = Zo2Path::getInstance()->getPath('Zo2://assets/admin.json');

if ($zo2Assets)
{
    $assets = Zo2Assets::getInstance();
    $zoAssets = json_decode(file_get_contents($zo2Assets));
    $assets->load($zoAssets);
}