<?php
/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */
 //no direct accees
defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

class JFormFieldAssets extends JFormField {

    protected $type = 'Assets';


    protected function getLabel() {

    }
    /**
     * Get the html for input
     *
     * @return string
     */
    public function getInput(){

        if (!defined ('ZO2_ASSET')) {
            define ('ZO2_ASSET', 1);
            $jdoc = JFactory::getDocument();
            
            //JHtml::_('jquery.framework');
            // remove because of empty css
            //$jdoc->addStyleSheet(ZO2URL_ROOT . '/css/assets.css');
            $jdoc->addScript(ZO2RTP_ASSETS_ZO2 . '/js/assets.min.js');
            JFactory::getDocument()->addScriptDeclaration ( '

            jQuery.extend(Assets, {
                url: \'' . JFactory::getURI()->toString() . '\',
                root: \'' . JURI::root() . '\'
            });
        ');
        }
    }


}