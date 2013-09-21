<?php
defined ('_JEXEC') or die ('Restricted Access');
//access zo2 framework
/** @var Zo2Framework $zo2 */
$zo2 = $this->zo2;
$doc = JFactory::getDocument();
$params = $zo2->getParams('debug_visibility');
$this->language = $doc->language;
$this->direction = $doc->direction;
/* @var $this JDocumentHTML */
if(!class_exists('Zo2Framework')) die('Zo2Framework not found');
$zo2 = Zo2Framework::getInstance();
$templateName = $this->template;
$layoutName = $zo2->getCurrentPage();
$layout = new Zo2Layout($templateName, $layoutName);
//echo $layout->compile();
?>
<!-- <?php echo $zo2->getCurrentPage();?> -->
<!DOCTYPE html>
<html>
<head>
    <jdoc:include type="head" />
    <?php echo $layout->insertHeaderAssets()?>
</head>
<body>
<div class="wrapper">
    <?php echo $layout->generateHtml();?>
    <?php echo $layout->insertFooterAssets()?>
</div>
<?php if ($params['debug_visibility'] == 1) : ?>
<jdoc:include type="modules" name="debug" />
<?php endif; ?>
</body>
</html>