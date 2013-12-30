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
defined('_JEXEC') or die('Restricted Access');
if (!class_exists('Zo2Framework'))
    die('Zo2Framework not found');
//access zo2 framework
/** @var Zo2Framework $zo2 */
$zo2 = Zo2Framework::getInstance();
$doc = JFactory::getDocument();
$debug = $zo2->getParams('debug_visibility');
$responsive = $zo2->getParams('responsive_layout');
$favicon = $zo2->getParams('favicon');
$this->language = $doc->language;
$this->direction = $doc->direction;

$layout = Zo2Framework::getInstance()->getLayout();
// init body
$body = $layout->generateHtml();

/**
 * 
 */
$serviceButtons = new Zo2Services();
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
    <head>
        <?php if ($responsive) { ?>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php } ?>
        <?php if ($favicon) { ?>
            <link rel="icon" type="image/x-icon" href="<?php echo $favicon ?>" />
        <?php } ?>
    <jdoc:include type="head" />
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="<?php echo $layout->getBodyClass() ?>">        
    <?php echo Zo2Framework::displayOffCanvasMenu($zo2->getParams('menutype', 'mainmenu'), $zo2->getTemplate()) ?>    
    <section class="wrapper">
        <!-- SocialShare -->
        <?php if (Zo2Framework::get('socialshare') == 1) { ?>
            <div id="zo2-socialshare" class="<?php Zo2Framework::get('socialshare_position', 'floatbar'); ?>">
                <?php
                if (Zo2Framework::get('socialshare_twitter') == 1)
                    echo $serviceButtons->getButton('twitter', 'share');
                if (Zo2Framework::get('socialshare_facebook') == 1)
                    echo $serviceButtons->getButton('facebook', 'share');
                ?>
            </div>
        <?php } ?>
        <?php echo $body;
        ?>
    </section>    
    <?php if ($debug == 1) : ?>
    <jdoc:include type="modules" name="debug" />
<?php endif; ?>
</body>
</html>