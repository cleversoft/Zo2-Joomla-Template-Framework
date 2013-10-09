<?php
/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      Duc Nguyen <ducntv@gmail.com>
 * @author      Hiepvu <vqhiep2010@gmail.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */

// Do all the preparation
defined ('_JEXEC') or die ('Restricted Access');
if(!class_exists('Zo2Framework')) die('Zo2Framework not found');
//access zo2 framework
/** @var Zo2Framework $zo2 */
$zo2 = Zo2Framework::getInstance();
$doc = JFactory::getDocument();
$debug = $zo2->getParams('debug_visibility');
$responsive = $zo2->getParams('responsive_layout');
$favicon = $zo2->getParams('favicon');
$this->language = $doc->language;
$this->direction = $doc->direction;
if(!class_exists('Zo2Framework')) die('Zo2Framework not found');
$templateName = $this->template;

// Init layout
$layout = new Zo2Layout($templateName);
$zo2->setLayout($layout);

// init body
$body = $layout->generateHtml();

// init header assets
$header = $layout->insertHeaderAssets();

// init footer assets
$footer = $layout->insertFooterAssets();
?>
<!DOCTYPE html>
<html>
<head>
    <?php if ($responsive) : ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php endif;?>
    <?php if($favicon) : ?>
    <link rel="icon" type="image/x-icon" href="<?php echo $favicon?>" />
    <?php endif; ?>
    <jdoc:include type="head" />
    <?php echo $header?>
</head>
<body class="<?php echo $layout->getBodyClass()?>">
<section class="wrapper">
    <?php echo $body;?>
</section>
<?php if ($debug == 1) : ?>
<jdoc:include type="modules" name="debug" />
<?php endif; ?>
<?php echo $footer ?>
</body>
</html>