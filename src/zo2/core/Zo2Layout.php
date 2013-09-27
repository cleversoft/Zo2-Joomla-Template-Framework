<?php
/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      Duc Nguyen <ducntv@gmail.com>
 * @author      Hiepvu <vqhiep2010@gmail.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */
defined('_JEXEC') or die;

class Zo2Layout {
    /* private */
    private $_layoutName, $_templatePath, $_layourDir, $_compiledLayoutPath, $_layoutContent, $_layoutPath, $_templateName,
        $_staticsPath, $_coreStaticsPath, $_templateUri = '';
    private $_output = '';
    private $_layoutStatics = array();

    private $_styleDeclaration = array();
    private $_jsDeclaration = array();

    /**
     * Construct a Zo2Layout object
     *
     * @param $templateName
     *
     * @throws Exception
     */
    public function __construct($templateName)
    {
        // assign values to private variables
        $this->_templatePath = JPATH_SITE . '/templates/' . $templateName . '/';
        $this->_layourDir = JPATH_SITE . '/templates/' . $templateName . '/layouts/';
        $this->_layoutPath = $this->_layourDir . 'layout.json';
        //$this->_compiledLayoutPath = $this->_layourDir . 'layout.php';
        //$this->_staticsPath = $this->_layourDir . $layoutName . '.json';
        $this->_coreStaticsPath = $this->_layourDir . 'assets.json';
        $this->_templateName = $templateName;
        $this->_templateUri = JUri::root() . 'templates/' . $templateName;

        // check layout existence, if layout not existed, get default layout, which is homepage.php
        if(!file_exists($this->_layoutPath)) throw new Exception('Layout find cannot be found!');

        // get template content
        $this->_layoutStatics = array();
        $this->_layoutContent = file_get_contents($this->_layoutPath);
        $coreStaticsJson = file_get_contents($this->_coreStaticsPath);
        //$staticsJson = file_exists($this->_staticsPath) ? file_get_contents($this->_staticsPath) : array();
        $coreStatics = json_decode($coreStaticsJson, true);
        //$statics = json_decode($staticsJson, true);

        // combine layout statics
        $this->_layoutStatics = $coreStatics;
    }

    /**
     * Read layout data from json
     *
     * @return string
     */
    public function getLayoutJson()
    {
        $path = $this->_templatePath . 'layouts/' . $this->_layoutName . '.json';
        if (file_exists($path)) {
            return file_get_contents($path);
        }
        else return '';
    }

    /**
     * Insert a static file into output
     *
     * @param $path
     * @param $type
     * @param array $options
     * @param $position string Must be 'footer' or 'header'
     */
    public function insertStatic($path, $type, array $options = array(), $position)
    {
        $this->_layoutStatics[] = array('path' => $path, 'type' => $type, 'options' => $options, 'position' => $position);
    }

    /**
     * Insert a JS file into output
     *
     * @param $path
     * @param array $options
     * @param string $position
     */
    public function insertJs($path, array $options = array(), $position = 'footer')
    {
        $this->insertStatic($path, 'js', $options, $position);
    }

    /**
     * Insert a CSS file into output
     *
     * @param $path
     * @param array $options
     * @param string $position
     */
    public function insertCss($path, array $options = array(), $position = 'header')
    {
        $this->insertStatic($path, 'css', $options, $position);
    }

    /**
     * Get current layout content
     *
     * @return string
     */
    public function getLayoutContent()
    {
        return $this->_layoutContent;
    }

    /**
     * Process javascript and css, then insert into document.
     * Combine and minify if needed.
     *
     * @return string
     */
    private function processStatics()
    {
        $footer = "";
        $header = "";
        if ($this->_layoutStatics != null) {
            foreach($this->_layoutStatics as $item) {
                if ($item['position'] == 'header') {
                    if ($item['type'] == 'css') $header .= $this->generateCssTag($item);
                    elseif ($item['type'] == 'js') $header .= $this->generateJsTag($item);
                }
                elseif ($item['position'] == 'footer') {
                    if ($item['type'] == 'css') $footer .= $this->generateCssTag($item);
                    elseif ($item['type'] == 'js') $footer .= $this->generateJsTag($item);
                }
            }
        }

        if (count($this->_styleDeclaration) > 0) {
            $styles = '';
            foreach ($this->_styleDeclaration as $style) {
                $styles .= $style . "\n";
            }

            $styles = '<style type="text/css">' . $styles . '</style>';
            $header .= "\n" . $styles;
        }

        if (count($this->_jsDeclaration) > 0) {
            $scripts = '';

            foreach ($this->_jsDeclaration as $js) {
                $scripts .= $js . "\n";
            }

            $scripts = '<script type="text\javascript">' . $scripts . '</script>';

            $footer .= $scripts;
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
    private function generateJsTag($item) {
        $basePath = '';
        if (isset($item['base']) && $item['base'] == 'template') $basePath = $this->_templateUri;
        else $basePath = Zo2Framework::getSystemPluginPath();
        $path = strpos($item['path'], 'http://') !== false ? $item['path'] : $basePath . $item['path'];
        $async = "";
        if (isset($item['options']['async'])) $async = " async=\"" . $item['options']['async'] . "\"";
        $result = "<script" . $async . " type=\"text/javascript\" src=\"" . $path . "\"></script>\n";
        if (isset($item['condition']) && !empty($item['condition'])) {
            $result = '<!--[' . $item['condition'] . ']>' . $result . '<![endif]-->';
        }
        return $result;
    }

    /**
     * Insert link tag for css
     *
     * @param $item
     * @return string
     */
    private function generateCssTag($item) {
        $basePath = '';
        if (isset($item['base']) && $item['base'] == 'template') $basePath = $this->_templateUri;
        else $basePath = Zo2Framework::getSystemPluginPath();
        $path = strpos($item['path'], 'http://') !== false ? $item['path'] : $basePath . $item['path'];
        $rel = isset($item['options']['rel']) ? $item['options']['rel'] : "stylesheet";
        return "<link rel=\"" . $rel . "\" href=\"" . $path . "\" type=\"text/css\" />\n";
    }

    /**
     * Generate body html
     *
     * @return string
     */
    public function generateHtml()
    {
        $html = '';
        if (file_exists($this->_compiledLayoutPath)) {
            $html = file_get_contents($this->_compiledLayoutPath);
            return $html;
        }
        else {
            $app = JFactory::getApplication();
            $template = $app->getTemplate(true);
            $params = $template->params;
            $layoutType = $params->get('layout_type');
            if ($layoutType == 'fixed') $layoutType = '';
            else $layoutType = '-fluid';

            if (file_exists($this->_layoutPath))
            {
                $data = json_decode(file_get_contents($this->_layoutPath), true);

                for ($i = 0, $total = count($data); $i < $total; $i++) {
                    $html .= self::generateHtmlFromItem($data[$i], $layoutType);
                }

                file_put_contents($this->_compiledLayoutPath, $html);

                return $html;
            }
            else return '';
        }
    }

    /**
     * Generate html for an item such as a row or a column.
     *
     * @param $item
     * @param $layoutType
     * @return string
     */
    private static function generateHtmlFromItem($item, $layoutType)
    {
        $html = '';
        if ($item['type'] == 'row') $html .= self::generateRow($item, $layoutType);
        else if ($item['type'] == 'col') $html .= self::generateColumn($item, $layoutType);

        return $html;
    }

    /**
     * Generate html from a row item
     *
     * @param $item
     * @param $layoutType
     * @return string
     */
    private static function generateRow($item, $layoutType)
    {
        //$class = $layoutType == 'fluid' ? 'container' : 'container-fixed';
        $class = 'container';
        $html = '';
        if (!empty($item['id'])) $html .= '<section id="' . $item['id'] . '" class="' . $item['customClass'] . '">';
        else $html .= '<section class="' . $item['customClass'] . '">';
        $html .= '<section class="' . $class . '">'; // start of container
        $html .= '<section class="row">'; // start of row

        for ($i = 0, $total = count($item['children']); $i < $total; $i++) {
            $html .= self::generateHtmlFromItem($item['children'][$i], $layoutType);
        }
        $html .= '</section>'; // end of row
        $html .= '</section>'; // end of container
        $html .= '</section>'; // end of wrapper
        return $html;
    }

    /**
     * Generate html from a column item
     *
     * @param $item
     * @param $layoutType
     * @return string
     */
    private static function generateColumn($item, $layoutType)
    {
        $html = '';
        $class = 'col-md-' . $item['span'];
        //$class = 'col-xs-' . $item['span'] . ' col-md-' . $item['span'] . ' col-lg-' . $item['span'];
        if (!empty($item['customClass'])) $class .= ' ' . $item['customClass'];
        if (!empty($item['id'])) $html .= '<section id="' . $item['id'] . '" class="' . $class . '">';
        else $html .= '<section class="' . $class . '">';

        if (!empty($item['position'])) {
            if ($item['position'] == 'component') $html .= '<jdoc:include type="component" />';
            else if ($item['position'] == 'message') $html .= '<jdoc:include type="message" />';
            else if($item['position'] == 'mega_menu') {
                $zo2 = Zo2Framework::getInstance();
                $html .= $zo2->displayMegaMenu($zo2->getParams('menutype', 'mainmenu'), $zo2->getTemplate());
            }
            else {
                //$html .= '<!-- module pos: ' . $item['position'] . ' - ' . $item['style'] . ' -->';
                $html .= '<jdoc:include type="modules" name="' . $item['position'] . '"  style="' . $item['style'] . '" />';
                //$html .= '<!-- /module pos: ' . $item['position'] . ' -->';
            }
        }

        if ($total = count($item['children']) > 0) {
            for ($i = 0; $i < $total; $i++) {
                $html .= self::generateHtmlFromItem($item['children'][$i], $layoutType);
            }
        }

        $html .= '</section>';
        return $html;
    }

    /**
     * Generate header assets html. Usable from frontend.
     *
     * Cache result into PHP file, create on the first time
     *
     * @return string
     */
    public function insertHeaderAssets()
    {
        $cache = 'header.php';
        $path = $this->_layourDir . $cache;
        if (file_exists($path)) return file_get_contents($path);
        else {
            $html = '';
            foreach($this->_layoutStatics as $item) {
                if ($item['position'] == 'header') {
                    if ($item['type'] == 'css') $html .= $this->generateCssTag($item);
                    elseif ($item['type'] == 'js') $html .= $this->generateJsTag($item);
                }
            }

            if (count($this->_styleDeclaration) > 0) {
                $styles = '';
                foreach ($this->_styleDeclaration as $style) {
                    $styles .= $style . "\n";
                }

                $styles = '<style type="text/css">' . $styles . '</style>';
                $html .= "\n" . $styles;
            }

            file_put_contents($path, $html);

            return $html;
        }
    }

    /**
     * Generate footer assets html. Usable from frontend.
     *
     * Cache result into PHP file, create on the first time
     *
     * @return string
     */
    public function insertFooterAssets()
    {
        $cache = 'footer.php';
        $path = $this->_layourDir . $cache;
        if (file_exists($path)) return file_get_contents($path);
        else {
            $html = '';

            foreach($this->_layoutStatics as $item) {
                if ($item['position'] == 'footer') {
                    if ($item['type'] == 'css') $html .= $this->generateCssTag($item);
                    elseif ($item['type'] == 'js') $html .= $this->generateJsTag($item);
                }
            }

            if (count($this->_jsDeclaration) > 0) {
                $scripts = '';

                foreach ($this->_jsDeclaration as $js) {
                    $scripts .= $js . "\n";
                }

                $scripts = '<script type="text\javascript">' . $scripts . '</script>';

                $html .= $scripts;
            }
            file_put_contents($path, $html);

            return $html;
        }
    }

    /**
     * Combine and minify statics assets.
     *
     * Level 1: combine only.
     * Level 2: combine then minify.
     *
     * Level 2 is facing some issues, such as url value in background is pointing to the wrong path
     *
     * @param int $level
     */
    private function combine($level = 1) {
        $style = '';
        $script = '';

        $state = $this->getState();

        $jsFileName = 'script.' . $this->_layoutName . '.js';
        $cssFileName = 'style.' . $this->_layoutName . '.css';

        $assetDir = $this->_templatePath . 'assets' . DIRECTORY_SEPARATOR . $state;

        if (!is_dir($assetDir)) mkdir($assetDir, 0755);

        $jsPath = $assetDir . DIRECTORY_SEPARATOR . $jsFileName;
        $cssPath = $assetDir . DIRECTORY_SEPARATOR . $cssFileName;

        if (!file_exists($jsPath) || !file_exists($cssPath)) {
            foreach ($this->_layoutStatics as $item) {
                $path = $this->_templatePath . $item['path'];
                $path = str_replace('//', '/', $path);

                if ($item['type'] == 'css') $style .= file_get_contents($path) . "\n";
                elseif ($item['type'] == 'js') $script .= file_get_contents($path) . "\n";
                elseif ($item['type'] == 'less') {
                    $lessContent = file_get_contents($path);
                    $style .= $this->processLess($lessContent) . "\n";
                }
            }

            Zo2Framework::import('vendor.minify.jsshrink');
            Zo2Framework::import('vendor.minify.css');

            // minify js first
            if ($level == '2') {
                $script = Minifier::minify($script);
                $style = CssMinifier::minify($style);
            }

            file_put_contents($jsPath, $script);
            file_put_contents($cssPath, $style);
        }

        $jsUri = '/assets/' . $state . '/' . $jsFileName;
        $cssUri = '/assets/' . $state . '/' . $cssFileName;

        $scriptTag = $this->generateJsTag(array('path' => $jsUri, 'type' => 'js', 'position' => 'footer'));
        $cssTag = $this->generateCssTag(array('path' => $cssUri, 'type' => 'css', 'position' => 'header', 'options' => array('rel' => 'stylesheet')));

        if (count($this->_styleDeclaration) > 0) {
            $styles = '';
            foreach ($this->_styleDeclaration as $style) {
                $styles .= $style . "\n";
            }

            $styles = '<style type="text/css">' . $styles . '</style>';
            $cssTag .= "\n" . $styles;
        }

        if (count($this->_jsDeclaration) > 0) {
            $scripts = '';

            foreach ($this->_jsDeclaration as $js) {
                $scripts .= $js . "\n";
            }

            $scripts = '<script type="text\javascript">' . $scripts . '</script>';

            $scriptTag .= "\n" . $scripts;
        }

        $this->_output = str_replace('</head>', $cssTag . '</head>' , $this->_output);
        $this->_output = str_replace('</body>', $scriptTag . '</body>' , $this->_output);
    }

    /**
     * Generate CSS from LESS
     *
     * @param $content
     * @return string
     */
    private function processLess($content) {
        if (!class_exists('lessc', false)) Zo2Framework::import('vendor.less.lessc');

        $compiler = new lessc();

        return $compiler->compile($content);
    }

    /**
     * Remove whitespace, tab, new line from input
     *
     * @param $input
     * @return mixed
     */
    public static function compressHtml($input) {
        $input = str_replace("\n\n", "\n", $input);
        $input = str_replace("\r\r", "\r", $input);
        return $input;
    }

    /**
     * Compress JS with Google Closure. Work in progress.
     */
    public function combineJS() {
        if(!class_exists('PhpClosure', false)) {
            Zo2Framework::import('vendor.minify.closure');
        }
    }

    /**
     * Set Google fonts for some font element.
     *
     * @param $fontname
     */
    public function setGoogleFont($fontname) {
        $fontname = explode('|', $fontname);

        if (count($fontname) != 2) return;

        $fontPath = 'http://fonts.googleapis.com/css?family=' . $fontname[1];
        $this->insertCss($fontPath);
        $selectors = 'body, input, button, select, textarea, .navbar-search .search-query';
        $options = "\n";
        $options .= $selectors . '{';
        $options .= 'font-family:\'' . $fontname[0] . '\', Helvetica, Arial, sans-serif';
        $options .= '}';
        $options .= "\n";

        $this->_styleDeclaration[] = $options;
    }

    /**
     * Get template state
     * Work in progress
     *
     * @return string
     */
    private function getState() {
        $path = $this->_templatePath . 'runtime' . DIRECTORY_SEPARATOR . 'state.php';

        if (!file_exists($path)) {
            $state = uniqid();
            file_put_contents($path, $state);
            return $state;
        }
        else {
            $state = file_get_contents($path);
            if (empty($state)) {
                $state = uniqid();
                file_put_contents($path, $state);
                return $state;
            }
            else return $state;
        }
    }

    /**
     * Set template state
     * Work in progress
     *
     * @param null $state
     */
    private function setState($state = null) {
        if (!isset($state)) $state = uniqid();

        $path = $this->_templatePath . 'runtime' . DIRECTORY_SEPARATOR . 'state.php';

        file_put_contents($path, $state);
    }
}