<?php
/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');
$standardLogo = Zo2Framework::getGlobalParam('standard_logo');
$retinaLogo = Zo2Framework::getGlobalParam('retina_logo');
$slogan = Zo2Framework::getGlobalParam('slogan');
?>
<!-- Standard logo -->
<?php if (!empty($standardLogo)) : ?>
    <header id="standard-logo" class="zo2-logo">
        <a class="standard-logo-link" 
           href="<?php echo JUri::root(); ?>" 
           title="<?php echo $slogan; ?>">
            <img alt="<?php echo $slogan; ?>" src="<?php echo rtrim(JUri::root(), '/') . '/' . $standardLogo; ?>"/>
        </a>
    </header>
<?php endif; ?>
<!-- Retina logo -->
<?php if (!empty($retinaLogo)) : ?>
    <header id="retina-logo" class="zo2-logo">
        <a class="retina-logo-link" 
           href="<?php echo JUri::root(); ?>" 
           title="<?php echo $slogan; ?>">
            <img alt="<?php echo $slogan; ?>" src="<?php echo rtrim(JUri::root(), '/') . '/' . $retinaLogo; ?>"/>
        </a>
    </header>
<?php endif; ?>
<!-- Without logo -->
<?php if (empty($standardLogo) && empty($retinaLogo)) : ?>
    <?php if ($slogan != '') : ?>
        <header id="logo-text">
            <a class="standard-logo-link" 
               href="<?php echo JUri::root(); ?>" 
               title="<?php echo $slogan; ?>">
                <h3><?php echo $slogan; ?></h3></a>
        </header>
    <?php endif; ?>
<?php endif; ?>