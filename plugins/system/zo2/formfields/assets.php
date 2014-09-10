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
            $assets = Zo2Assets::getInstance();
            //$jdoc = JFactory::getDocument();
            
            //JHtml::_('jquery.framework');
            // remove because of empty css
            //$jdoc->addStyleSheet(ZO2URL_ROOT . '/css/assets.css');
            $assets->addScript('zo2/js/assets.min.js');
            $assets->addScriptDeclaration('
            jQuery.extend(Assets, {
                url: \'' . JFactory::getURI()->toString() . '\',
                root: \'' . JURI::root() . '\'
            });
        ');
        }
    }


}