<?php
$bodyClasses [] = 'direction-' . $framework->document->getDirection();
$bodyClasses = trim(implode(' ', $bodyClasses));
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $framework->document->getLanguage(); ?>" lang="<?php echo $framework->document->getLanguage(); ?>" dir="<?php echo $framework->document->getDirection(); ?>">
    <head>              
        <jdoc:include type="head" />        
        <!-- built with zo2 framework: http://www.zootemplate.com/zo2 -->
        <?php require_once Zo2Path::getInstance()->getPath('Zo2://assets/js/zo2.php'); ?>
        <?php echo Zo2Assets::getInstance()->render(); ?>
        <?php if ($framework->profile->get('enable_responsive', true)) : ?>
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <?php endif; ?>
    </head>
    <body id="zo2-framework-wrapper" class="<?php echo $bodyClasses; ?>"
          j-option="<?php echo JFactory::getApplication()->input->getCmd('option'); ?>"
          j-view="<?php echo JFactory::getApplication()->input->getCmd('view'); ?>"
          j-task="<?php echo JFactory::getApplication()->input->getCmd('task'); ?>"
          j-itemid="<?php echo JFactory::getApplication()->input->getInt('Itemid'); ?>"
          zo2-template="<?php echo $framework->template->get('template'); ?>"
          zo2-profile="<?php echo $framework->profile->get('name'); ?>"
          >       
              <?php echo $layout->render(); ?>
    </body>
</html>