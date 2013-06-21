<?php
/**
 *
 * JFormFieldLayout class serves as form input for layout builder
 *
 * @package Zo2 Framework
 * @author JoomShaper http://www.joomvision.com
 * @author Duc Nguyen <ducntq@gmail.com>
 * @copyright Copyright (c) 2008 - 2013 JoomVision
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

class JFormFieldLayout extends JFormField {
    protected $type = 'Layout';

    /**
     * Get the html for input
     *
     * @return string
     */
    public function getInput(){
        $doc = JFactory::getDocument();

        $pluginPath = JURI::root(true).'/plugins/system/zo2/';
        $cssPath = $pluginPath . 'css/';
        $jsPath = $pluginPath . 'js/';
        $vendorPath = $pluginPath . 'vendor/';

        // load jquery & jqueryui newest version, cause joomla's jquery is plain old
        // Load custom js and css
        $doc->addScript($vendorPath . 'jqueryui/js/jquery-ui-1.10.3.custom.min.js');
        $doc->addScript($vendorPath . 'underscorejs/underscore-min.js');
        $doc->addScript($vendorPath . 'backbonejs/backbone-min.js');
        $doc->addScript($jsPath . 'layoutbuildermodels.js');
        $doc->addStyleSheet($vendorPath . 'jqueryui/css/jquery-ui-1.10.3.custom.min.css');
        $doc->addStyleSheet($cssPath . 'style.css');
        $doc->addScript($jsPath . 'admin.js');

        // Load Bootstrap JS framework
        JHtml::_('bootstrap.framework');
        // Load Bootstrap CSS
        JHtml::_('bootstrap.loadCss');

        return $this->generateLayoutBuilder();
    }

    /**
     * Return this form label.
     * In this case, label is empty
     *
     * @return string
     */
    public function getLabel()
    {
        return '';
    }


    /**
     * Get html for layout builder
     *
     * @return string
     */
    private function generateLayoutBuilder(){
        $layout = new Zo2Layout(Zo2Framework::getTemplateName(), 'homepage');
        $path = JPATH_SITE.'/plugins/system/zo2/templates/layoutbuilder.php';
        ob_start();
        include($path);
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }
}