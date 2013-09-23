<?php
/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      Duc Nguyen <ducntv@gmail.com>
 * @author      Phuoc Nguyen <phuoc@huuphuoc.me>
 * @author      Vu Hiep <vqhiep2010@gmail.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */

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
$layout = new Zo2Layout($templateName, 'homepage');
//echo $layout->compile();
?>
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