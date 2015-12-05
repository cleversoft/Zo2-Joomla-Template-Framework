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
<?php if ($logo['standard'] != '') : ?>
    <header id="standard-logo" class="zo2-logo">
        <a class="standard-logo-link" 
           href="<?php echo JUri::root(); ?>" 
           title="<?php echo $slogan; ?>">
            <img alt="<?php echo $slogan; ?>" src="<?php echo $logo['standard']; ?>"/>
        </a>
    </header>
<?php endif; ?>
<!-- Retina logo -->
<?php if ($logo['retina'] != '') : ?>
<?php endif; ?>
<header id="retina-logo" class="zo2-logo">
    <a class="retina-logo-link" 
       href="<?php echo JUri::root(); ?>" 
       title="<?php echo $slogan; ?>">
        <img alt="<?php echo $slogan; ?>" src="<?php echo $logo['standard']; ?>"/>
    </a>
</header>
<!-- Without logo -->
<?php if ($logo['standard'] == '' && $logo['retina'] == '') : ?>
    <?php if ($slogan != '') : ?>
        <header id="logo-text">
            <a class="standard-logo-link" 
               href="<?php echo JUri::root(); ?>" 
               title="<?php echo $slogan; ?>">
                <h3><?php echo $slogan; ?></h3></a>
        </header>
    <?php endif; ?>
<?php endif; ?>