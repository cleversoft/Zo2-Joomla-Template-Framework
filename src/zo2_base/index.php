<?php
defined ('_JEXEC') or die ('resticted aceess');
/* @var $this JDocumentHTML */
if(!class_exists('Zo2Framework')) die('Zo2Framework not found');

$zo2 = Zo2Framework::getInstance();
$templateName = $this->template;
$layoutName = $zo2->getCurrentPage();
$layout = new Zo2Layout($templateName, $layoutName);

echo $layout->compile();
