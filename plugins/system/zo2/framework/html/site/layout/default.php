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

$framework = Zo2Framework::getInstance();
$browser = Zo2EnvironmentBrowser::getInstance();
$bodyClasses [] = 'language-' . $framework->document->getLanguage();
$bodyClasses [] = 'direction-' . $framework->document->getDirection();
$bodyClasses[] = 'browser-' . strtolower($browser->getBrowser());
$bodyClasses[] = 'platform-' . strtolower($browser->getPlatform());
$bodyClasses = trim(implode(' ', $bodyClasses));
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $framework->document->getLanguage(); ?>" lang="<?php echo $framework->document->getLanguage(); ?>" dir="<?php echo $framework->document->getDirection(); ?>">
    <head>       
        <?php echo Zo2Framework::getParam('custom_code_after_open_head'); ?>
        <jdoc:include type="head" />        
        <!-- built with zo2 framework: http://www.zootemplate.com/zo2 -->
        <?php require_once Zo2Path::getInstance()->getPath('Zo2://assets/js/zo2.php'); ?>               
        <?php echo Zo2Assets::getInstance()->render(); ?>        
        <?php if (Zo2Framework::getApp()->profile->get('enable_responsive', true)) : ?>
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <?php endif; ?>
        <?php echo Zo2Framework::getParam('custom_code_before_close_head'); ?>
    </head>
    <body id="zo2-framework-wrapper" class="<?php echo $bodyClasses; ?>">       
        <?php echo Zo2Framework::getParam('custom_code_after_open_body'); ?>
        <!-- BEGIN Off canvas content -->
        <?php if ($framework->document->countModules('zo2-offcanvas')) : ?>
            <div id="zo2-offcanvas-content">
                <jdoc:include type="modules" name="zo2-offcanvas" style="offcanvas" />
            </div>
        <?php endif; ?>
        <!-- END Off canvas content -->
        <?php foreach ($rows as $row) : ?>
            <?php $row = new Zo2LayoutbuilderRow($row); ?>            
            <?php echo $row->render('Zo2://html/site/layout/layoutbuilder'); ?>
        <?php endforeach; ?>
        <?php echo Zo2Framework::getParam('custom_code_before_close_body'); ?>
    </body>
</html>