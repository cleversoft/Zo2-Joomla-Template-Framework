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
defined('_JEXEC') or die('Restricted Access');

require_once __DIR__ . '/includes/bootstrap.php';

$zo2 = $this->zo2->framework;
$layout = $this->zo2->layout;

$responsive = $zo2->get('responsive_layout');
$favicon = $zo2->get('favicon');

$doc = JFactory::getDocument();
if ($zo2->get('fullContainer') == 1 && $zo2->get('enable_style_switcher') != 1) { //if style is boxed and style switcher is disable -> show background custom
    $background = $zo2->get('background', '');
    $background_color = $zo2->get('background_color');
    if ($background != '') {
        $doc->addStyleDeclaration('body.boxed {background: url("' . JUri::root(true) . '/' . $background . '") ' . $background_color . ' repeat;}');
    } else
        $doc->addStyleDeclaration('body.boxed {background: ' . $background_color . ' repeat;}');
}
?>
<!DOCTYPE html>
<html lang="<?php echo $this->zo2->template->getLanguage(); ?>" dir="<?php echo $this->zo2->template->getDirection(); ?>">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php if ($responsive) { ?>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php } ?>
        <?php if ($favicon) { ?>
            <link rel="icon" type="image/x-icon" href="<?php echo $favicon ?>" />
        <?php } ?>
    <jdoc:include type="head" />
</head>
<body class="<?php echo $layout->getBodyClass() ?> <?php echo $this->direction; ?> <?php echo (($zo2->get('fullContainer') == 1) ? 'boxed' : ''); ?>">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <?php echo Zo2Framework::displayOffCanvasMenu($zo2->get('menutype', 'mainmenu'), $zo2->getTemplate()) ?>
    <section class="wrapper <?php echo (($zo2->get('fullContainer') == 1) ? 'boxed container' : ''); ?>">
        <!-- SocialShare -->
        <?php if (Zo2Framework::get('socialshare_floatbar', 1) == 1) { ?>
            <?php echo $this->zo2->socialShares->getFloatbar(); ?>
        <?php } ?>
        <?php if (Zo2Framework::get('enable_style_switcher', 1) == 1) { ?>
            <?php $this->zo2->styleSwitcher->styleSwitcher(); ?>
        <?php } ?>
        <?php echo $layout->render(); ?>
    </section>
    <?php
    /**
     * @todo $debug must follow Joomla! config
     */
    ?>    
<jdoc:include type="modules" name="debug" />

</body>
</html>