<?php
defined ('_JEXEC') or die ('Resticted aceess');

jimport('joomla.event.plugin');

class Zo2System extends JPlugin
{
    function onAfterInitialise()
    {
        echo 'we all got to here';die();
        $frameworkPath = JPATH_PLUGINS.'/system/zo2/core/Zo2Framework.php';
        if (file_exists($frameworkPath)) {
            require_once($frameworkPath);
            /*
            Helix::getInstance();
            Helix::getInstance()->loadHelixOverwrite();
            */

        } else {
            echo JText::_('Zo2 framework not found.');
            die;
        }
    }
}