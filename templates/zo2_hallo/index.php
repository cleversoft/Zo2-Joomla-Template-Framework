<?php
/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @version     1.4.4
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2015 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted Access');

require_once __DIR__ . '/includes/bootstrap.php';

?>

<!DOCTYPE html>
<html lang="<?php echo $this->zo2->template->getLanguage(); ?>" dir="<?php echo $this->zo2->template->getDirection(); ?>">
    <head>
        <?php unset($this->_scripts[JURI::root(true) . '/media/jui/js/bootstrap.min.js']); ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Enable responsive -->
        <?php if (!$this->zo2->framework->get('non_responsive_layout')) : ?>
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php endif; ?>

        <!--[if !IE 8]> -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <!-- <![endif]-->
    <jdoc:include type="head" />
</head>
<body class="<?php echo $this->zo2->layout->getBodyClass(); ?> <?php echo $this->zo2->template->getDirection(); ?> <?php echo $this->zo2->framework->isBoxed() ? 'boxed' : ''; ?>">
    <?php echo $this->zo2->template->fetch('html://layouts/css.condition.php'); ?>        
    <!-- Main wrapper -->
    <section class="zo2-wrapper<?php echo $this->zo2->framework->isBoxed() ? ' boxed container' : ''; ?>">        
        <?php echo $this->zo2->utilities->styleswitcher->render(); ?>
        <?php echo $this->zo2->layout->render(); ?>               
    </section>
    <?php echo $this->zo2->layout->renderOut(); ?>               
    <?php echo $this->zo2->template->fetch('html://layouts/joomla.debug.php'); ?>
    <script type="text/javascript">
		<?php echo $this->zo2->utilities->bottomscript->render(); ?>
    </script>
</body>
</html>
