<?php

JHtml::_('jquery.framework');
JHtml::_('jquery.ui', array('core', 'sortable'));
require_once Zo2Path::getInstance()->getPath('Zo2://assets/js/zo2.php');
$zo2Assets = Zo2Path::getInstance()->getPath('Zo2://assets/admin.json');
if ($zo2Assets) {
    $assets = Zo2Assets::getInstance();
    $zoAssets = json_decode(file_get_contents($zo2Assets));
    $assets->load($zoAssets);
}
?>