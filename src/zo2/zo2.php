<?php
/**
 * Zo2 Framework (http://zo2framework.org)
 *
 * @link     http://github.com/aploss/zo2
 * @package  Zo2
 * @author   http://zo2framework.org
 * @copyright  Copyright ( c ) 2008 - 2013 APL Solutions
 * @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */

defined('_JEXEC') or die ('Resticted aceess');

jimport('joomla.event.plugin');

class plgSystemZo2 extends JPlugin
{
    function onAfterInitialise()
    {
        include_once dirname(__FILE__) . '/core/defines.php';

        $frameworkPath = JPATH_PLUGINS . '/system/zo2/core/Zo2Framework.php';
        if (file_exists($frameworkPath)) {
            require_once($frameworkPath);
            Zo2Framework::init();
            Zo2Framework::getTemplateLayouts();
            Zo2Framework::getController();

        } else {
            echo JText::_('Zo2 framework not found.');
            die;
        }
    }

    function onBeforeRender()
    {

        $app = JFactory::getApplication();
        if ($app->isAdmin()) {
            // Load Bootstrap CSS
            //JHtml::_('bootstrap.loadCss');
            Zo2Framework::loadAdminAssets();
        }
    }

    function onRenderModule($module, $params)
    {

    }
}