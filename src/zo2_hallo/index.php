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

/**
 * @todo Opengraph support
 * @todo Facebook & Twitter ... data attributes support
 */
?>
<!DOCTYPE html>
<html lang="<?php echo $this->zo2->template->getLanguage(); ?>" dir="<?php echo $this->zo2->template->getDirection(); ?>">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php echo $this->zo2->template->fetch('html://layouts/head.response.php'); ?>
        <?php echo $this->zo2->template->fetch('html://layouts/head.favicon.php'); ?>
    <jdoc:include type="head" />
</head>
<body class="<?php echo $this->zo2->layout->getBodyClass() ?> <?php echo $this->zo2->template->getDirection(); ?> <?php echo (( $this->zo2->framework->get('fullContainer') == 1) ? 'boxed' : ''); ?>">
    <?php echo $this->zo2->template->fetch('html://layouts/css.condition.php'); ?>
    <?php echo Zo2Framework::displayOffCanvasMenu() ?>
    <section class="wrapper <?php echo (($this->zo2->framework->get('fullContainer') == 1) ? 'boxed container' : ''); ?>">
        <!-- SocialShare -->
        <?php if (Zo2Framework::get('socialshare_floatbar', 1) == 1) { ?>
            <?php echo $this->zo2->utilities->socialshares->render('floatbar'); ?>
        <?php } ?>
        <?php echo $this->zo2->utilities->styleswitcher->render(); ?>
        <?php echo $this->zo2->layout->render(); ?>
    </section>
    <?php echo $this->zo2->template->fetch('html://layouts/joomla.debug.php'); ?>   
</body>
</html>