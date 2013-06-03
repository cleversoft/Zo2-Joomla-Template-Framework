<?php
/**
 *
 * Zo2Layout class serves as helper for all layout funcionalities
 *
 * @package Zo2 Framework
 * @author JoomShaper http://www.joomvision.com
 * @author Duc Nguyen <ducntq@gmail.com>
 * @copyright Copyright (c) 2008 - 2013 JoomVision
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */


class Zo2Layout {
    /* private */
    private $_layoutName, $_layoutContent, $_layoutPath, $_templateName, $_settingsPath, $_templateUri = '';
    private $_output = '';
    private $_layoutSettings = null;

    /**
     * Construct a Zo2Layout object
     *
     * @param $templateName
     * @param $layoutName
     */
    public function __construct($templateName, $layoutName){
        $this->_layoutPath = JPATH_SITE . '/templates/' . $templateName . '/layouts/' . $layoutName . '.php';
        $this->_settingsPath = JPATH_SITE . '/templates/' . $templateName . '/layouts/' . $layoutName . '.json';
        $this->_templateName = $templateName;
        $this->_layoutName = $layoutName;
        $this->_templateUri = JUri::root() . 'templates/' . $templateName;

        if(!file_exists($this->_layoutPath) || !file_exists($this->_settingsPath)){
            $this->_layoutPath = JPATH_SITE . '/templates/' . $templateName . '/layouts/homepage.php';
            $this->_settingsPath = JPATH_SITE . '/templates/' . $templateName . '/layouts/homepage.json';

        }
        $this->_layoutContent = file_get_contents($this->_layoutPath);
        $settingsJson = file_get_contents($this->_settingsPath);
        $this->_layoutSettings = json_decode($settingsJson);
    }

    /**
     * Get current layout content
     *
     * @return string
     */
    public function getLayoutContent(){
        return $this->_layoutContent;
    }

    private function insertStatics(){
        $footer = "";
        $header = "";
        if($this->_layoutSettings != null){
            foreach($this->_layoutSettings->header as $item){
                if($item->type == 'css') $header .= $this->generateCssTag($item);
                elseif($item->type == 'js') $header .= $this->generateJsTag($item);
            }
            foreach($this->_layoutSettings->footer as $item){
                if($item->type == 'css') $footer .= $this->generateCssTag($item);
                elseif($item->type == 'js') $footer .= $this->generateJsTag($item);
            }
        }

        if(!empty($header)){
            $this->_output = str_replace('</head>', $header . '</head>' , $this->_output);
        }

        if(!empty($header)){
            $this->_output = str_replace('</body>', $footer . '</body>' , $this->_output);
        }
        return $this->_output;
    }

    private function generateJsTag($item){
        $async = "";
        if(isset($item->options->async)) $async = " async=\"" . $item->options->async . "\"";
        return "<script " . $async . " type=\"text/javascript\" src=\"" . $this->_templateUri . $item->path . "\"></script>\n";
    }

    private function generateCssTag($item){
        $rel = isset($item->options->rel) ? $item->options->rel : "stylesheet";
        return "<link rel=\"" . $rel . "\" href=\"" . $this->_templateUri . $item->path . "\" type=\"text/css\" />\n";
    }

    public function compile(){
        $this->_output = $this->_layoutContent;
        $this->insertStatics();
        return $this->_output;
    }
}