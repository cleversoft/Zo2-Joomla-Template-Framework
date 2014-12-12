<?php
/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @version     1.4.3
 * @since       1.4.3
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');
?>
<!-- Standard logo -->
<?php if (isset($logo['path']) && $logo['path'] != '') : ?>
    <header id="header-standard-logo">
        <a class="standard-logo" href="<?php echo JUri::root(); ?>" title="<?php echo $logo['text']; ?>"><img alt="<?php echo $logo['text']; ?>" src="<?php echo $logo['path']; ?>"/></a>
    </header>
<?php else : ?>
    <!-- Without logo -->
    <?php if (isset($logo['text']) && $logo['text'] != '') : ?>
        <header id="header-logo-text">
            <a class="standard-logo" href="<?php echo JUri::root(); ?>" title="<?php echo $logo['text']; ?>"><h3><?php echo $logo['text']; ?></h3></a>
        </header>
    <?php endif; ?>
<?php endif; ?>
<!-- Retina logo -->
<?php if (isset($retinaLogo['path']) && $retinaLogo['path'] != '') : ?>
    <header id="header-retina-logo">
        <a class="retina-logo" href="<?php echo JUri::root(); ?>" title="<?php echo $logo['text']; ?>"><img alt="<?php echo $retinaLogo['text']; ?>" src="<?php echo $retinaLogo['path']; ?>"/></a>
    </header>
<?php else : ?>
    <!-- Without logo -->
    <?php if (isset($retinaLogo['text']) && $retinaLogo['text'] != '') : ?>
        <header id="header-retina-logo-text">
            <a class="retina-logo" href="<?php echo JUri::root(); ?>" title="<?php echo $logo['text']; ?>"><h3><?php echo $retinaLogo['text']; ?></h3></a>
        </header>
    <?php endif; ?>
<?php endif; ?>