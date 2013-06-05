<?php
/**
 * Zo2 Framework (http://zo2framework.org)
 *
 * @link         http://github.com/aploss/zo2
 * @package      Zo2
 * @author       Duc Nguyen <ducntq@gmail.com>
 * @author       Vu Hiep
 * @copyright    Copyright ( c ) 2008 - 2013 APL Solutions
 * @license      http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */


class Zo2Layout {
    /* private */
    private $_layoutName, $_layoutContent, $_layoutPath, $_templateName, $_settingsPath, $_coreSettingsPath, $_templateUri = '';
    private $_output = '';
    private $_layoutSettings = null;

    /**
     * Construct a Zo2Layout object
     *
     * @param $templateName
     * @param $layoutName
     */
    public function __construct($templateName, $layoutName){
        // assign values to private variables
        $layoutDir = JPATH_SITE . '/templates/' . $templateName . '/layouts/';
        $this->_layoutPath = $layoutDir . $layoutName . '.php';
        $this->_settingsPath = $layoutDir . $layoutName . '.json';
        $this->_coreSettingsPath = $layoutDir . 'core.json';
        $this->_templateName = $templateName;
        $this->_layoutName = $layoutName;
        $this->_templateUri = JUri::root() . 'templates/' . $templateName;

        // check layout existence, if layout not existed, get default layout, which is homepage.php
        if(!file_exists($this->_layoutPath) || !file_exists($this->_settingsPath)){
            $this->_layoutPath = JPATH_SITE . '/templates/' . $templateName . '/layouts/homepage.php';
            $this->_settingsPath = JPATH_SITE . '/templates/' . $templateName . '/layouts/homepage.json';
        }

        // get template content
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

    /**
     * Insert javascript and css into document
     *
     * @return string
     */
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


    /**
     * Insert script tag for js
     *
     * @param $item
     * @return string
     */
    private function generateJsTag($item){
        $async = "";
        if(isset($item->options->async)) $async = " async=\"" . $item->options->async . "\"";
        return "<script" . $async . " type=\"text/javascript\" src=\"" . $this->_templateUri . $item->path . "\"></script>\n";
    }

    /**
     * Insert link tag for css
     *
     * @param $item
     * @return string
     */
    private function generateCssTag($item){
        $rel = isset($item->options->rel) ? $item->options->rel : "stylesheet";
        return "<link rel=\"" . $rel . "\" href=\"" . $this->_templateUri . $item->path . "\" type=\"text/css\" />\n";
    }

    /**
     * Compile everything into HTML string
     *
     * @return string
     */
    public function compile(){
        $this->_output = $this->_layoutContent;
        $this->insertStatics();
        return $this->_output;
    }
}