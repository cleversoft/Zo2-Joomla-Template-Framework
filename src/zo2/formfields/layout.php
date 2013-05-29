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

        // Load jQuery framework
        JHtml::_('jquery.framework', false);
        // Load jQueryUI with sortable
        JHtml::_('jquery.ui', array('core', 'sortable'));
        // Load Bootstrap JS framework
        JHtml::_('bootstrap.framework');
        // Load Bootstrap CSS
        JHtml::_('bootstrap.loadCss');

        // Load custom js and css
        $doc->addScript($jsPath . 'admin.js');
        $doc->addStyleSheet($cssPath . 'style.css');

        $positionSettings = array();

        return $this->generateLayoutBuilder($positionSettings);
    }

    /**
     * Return this form label.
     * In this case, label is empty
     *
     * @return string
     */
    public function getLabel()
    {
        return '<b>This is a label</b>';
    }


    /**
     * Get html for layout builder
     *
     * @param $positionSettings
     * @return string
     */
    private function generateLayoutBuilder($positionSettings){
        $path = JPATH_SITE.'/plugins/system/zo2/templates/layoutbuilder.php';
        $html = '';
        ob_start();
        include_once($path);
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }
}