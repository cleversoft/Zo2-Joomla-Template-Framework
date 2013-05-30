<?php
defined ('_JEXEC') or die ('Resticted aceess');

jimport('joomla.event.plugin');

class plgSystemZo2 extends JPlugin
{
    function onAfterInitialise()
    {
        $frameworkPath = JPATH_PLUGINS.'/system/zo2/core/Zo2Framework.php';
        if (file_exists($frameworkPath)) {
            require_once($frameworkPath);
            Zo2Framework::init();
            Zo2Framework::getTemplateLayouts();

        } else {
            echo JText::_('Zo2 framework not found.');
            die;
        }
    }
}