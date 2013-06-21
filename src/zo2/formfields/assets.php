<?php
/**
 * @package Zo2 Framework
 * @author Hiepvu
 * @copyright Copyright (c) 2008 - 2013 JoomVision.com
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */
 //no direct accees
defined ('_JEXEC') or die ('resticted aceess');

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

class JFormFieldAssets extends JFormField {

    protected $type = 'Assets';

    /**
     * Get the html for input
     *
     * @return string
     */
    public function getInput(){

        if (!defined ('ZO2_ASSET')) {
            define ('ZO2_ASSET', 1);
            $jdoc = JFactory::getDocument();
            JFactory::getLanguage()->load(ZO2_SYSTEM_PLUGIN, JPATH_ADMINISTRATOR);
            //JHtml::_('jquery.framework');
            $jdoc->addStyleSheet(ZO2_ADMIN_PLUGIN_URL . '/css/assets.css');
            $jdoc->addScript(ZO2_ADMIN_PLUGIN_URL . '/js/assets.js');
            JFactory::getDocument()->addScriptDeclaration ( '

            jQuery.extend(Assets, {
                url: \'' . JFactory::getURI()->toString() . '\',
                root: \'' . JURI::root() . '\'
            });
        ');
        }
    }


}