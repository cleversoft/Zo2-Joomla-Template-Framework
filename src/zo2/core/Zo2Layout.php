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
    private $_layoutName, $_templatePath, $_layoutContent, $_layoutPath, $_templateName, $_staticsPath, $_coreStaticsPath, $_templateUri = '';
    private $_output = '';
    private $_layoutStatics = array();

    private $_styleDeclaration = array();
    private $_jsDeclaration = array();

    /**
     * Construct a Zo2Layout object
     *
     * @param $templateName
     * @param $layoutName
     */
    public function __construct($templateName, $layoutName)
    {
        // assign values to private variables
        $this->_templatePath = JPATH_SITE . '/templates/' . $templateName . '/';
        $layoutDir = JPATH_SITE . '/templates/' . $templateName . '/layouts/';
        $this->_layoutPath = $layoutDir . $layoutName . '.json';
        //$this->_staticsPath = $layoutDir . $layoutName . '.json';
        $this->_coreStaticsPath = $layoutDir . 'core.json';
        $this->_templateName = $templateName;
        $this->_layoutName = $layoutName;
        $this->_templateUri = JUri::root() . 'templates/' . $templateName;

        // check layout existence, if layout not existed, get default layout, which is homepage.php
        if(!file_exists($this->_layoutPath)) {
            $this->_layoutPath = JPATH_SITE . '/templates/' . $templateName . '/layouts/homepage.json';
            //$this->_staticsPath = JPATH_SITE . '/templates/' . $templateName . '/layouts/homepage.json';
        }

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

    public function getLayoutJson()
    {
        $path = $this->_templatePath . 'layouts/' . $this->_layoutName . '.json';
        if (file_exists($path)) {
            return file_get_contents($path);
        }
        else return '';
    }

    public function insertStatic($path, $type, array $options = array(), $position) {
        $this->_layoutStatics[] = array('path' => $path, 'type' => $type, 'options' => $options, 'position' => $position);
    }

    public function insertJs($path, array $options = array(), $position = 'footer') {
        $this->insertStatic($path, 'js', $options, $position);
    }

    public function insertCss($path, array $options = array(), $position = 'header') {
        $this->insertStatic($path, 'css', $options, $position);
    }

    /**
     * Get current layout content
     *
     * @return string
     */
    public function getLayoutContent() {
        return $this->_layoutContent;
    }

    /**
     * Process javascript and css, then insert into document
     *
     * @return string
     */
    private function processStatics(){
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
        if (isset($item['base']) && $item['base'] == 'theme') $basePath = $this->_templateUri;
        else $basePath = Zo2Framework::getSystemPluginPath();
        $path = strpos($item['path'], 'http://') !== false ? $item['path'] : $basePath . $item['path'];
        $async = "";
        if(isset($item['options']['async'])) $async = " async=\"" . $item['options']['async'] . "\"";
        return "<script" . $async . " type=\"text/javascript\" src=\"" . $path . "\"></script>\n";
    }

    /**
     * Insert link tag for css
     *
     * @param $item
     * @return string
     */
    private function generateCssTag($item) {
        $basePath = '';
        if (isset($item['base']) && $item['base'] == 'theme') $basePath = $this->_templateUri;
        else $basePath = Zo2Framework::getSystemPluginPath();
        $path = strpos($item['path'], 'http://') !== false ? $item['path'] : $basePath . $item['path'];
        $rel = isset($item['options']['rel']) ? $item['options']['rel'] : "stylesheet";
        return "<link rel=\"" . $rel . "\" href=\"" . $path . "\" type=\"text/css\" />\n";
    }

    /**
     * Compile layout into Html Template
     *
     * @param bool $removeJdoc
     * @param bool $layoutBuilder Add necessary CSS for layoutbuilder
     * @return string
     */
    public function compile($removeJdoc = false, $layoutBuilder = false) {
        $this->_output = $this->_layoutContent;

        $app = JFactory::getApplication();
        $template = $app->getTemplate(true);
        $params = $template->params;

        // check google fonts
        $googleFont = $params->get('google_fonts');

        if (isset($googleFont) && !empty($googleFont) && $googleFont != '0') {
            $this->setGoogleFont($googleFont);
        }

        // check font awesome
        $fontAwesome = $params->get('font_awesome');

        if (isset($fontAwesome) && !empty($fontAwesome) && $fontAwesome == '1') {
            $this->insertCss('/vendor/font-awesome/css/font-awesome.min.css');
        }

        // check combine level
        $combineLevel = $params->get('combine_statics');

        if (!isset($combineLevel) || $combineLevel == '0') $this->processStatics();
        else $this->combine($combineLevel);
        if($removeJdoc) {
            $this->_output = preg_replace('#<jdoc:include\ type="([^"]+)" (.*)\/>#iU', '', $this->_output);
        }
        if ($layoutBuilder) $this->insertLayoutBuilderCss();
        else{
            $this->_output = preg_replace('#<head>#', '<head><jdoc:include type="head" />', $this->_output);
            $this->_output = $this->parseDataComponent($this->_output);
        }

        return $this->_output;
    }

    public function generateHtml()
    {
        $html = '';
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

            return $html;
        }
        else return '';
    }

    private static function generateHtmlFromItem($item, $layoutType)
    {
        $html = '';
        if ($item['type'] == 'row') $html .= self::generateRow($item, $layoutType);
        else if ($item['type'] == 'col') $html .= self::generateColumn($item, $layoutType);

        return $html;
    }

    private static function generateRow($item, $layoutType)
    {
        //$class = $layoutType == 'fluid' ? 'container' : 'container-fixed';
        $class = 'container';
        $html = '';
        $html .= '<div class="' . $class . '">'; // start of container
        $html .= '<div class="row">'; // start of row

        for ($i = 0, $total = count($item['children']); $i < $total; $i++) {
            $html .= self::generateHtmlFromItem($item['children'][$i], $layoutType);
        }
        $html .= '</div>'; // end of row
        $html .= '</div>'; // end of container
        return $html;
    }

    private static function generateColumn($item, $layoutType)
    {
        $html = '';
        $class = 'col-md-' . $item['span'];
        //$class = 'col-xs-' . $item['span'] . ' col-md-' . $item['span'] . ' col-lg-' . $item['span'];
        if (!empty($item['customClass'])) $class .= ' ' . $item['customClass'];
        $html .= '<div class="' . $class . '">';

        if (!empty($item['position'])) {
            if ($item['position'] == 'component') $html .= '<jdoc:include type="component" />';
            else if ($item['position'] == 'message') $html .= '<jdoc:include type="message" />';
            else if($item['position'] == 'mega_menu') {
                $zo2 = Zo2Framework::getInstance();
                $html .= $zo2->displayMegaMenu($zo2->getParams('menutype', 'mainmenu'), $zo2->getTemplate());
            }
            else {
                $html .= '<!-- module pos: ' . $item['position'] . ' - ' . $item['style'] . ' -->';
                $html .= '<jdoc:include type="modules" name="' . $item['position'] . '"  style="' . $item['style'] . '" />';
                $html .= '<!-- /module pos: ' . $item['position'] . ' -->';
            }
        }

        if ($total = count($item['children']) > 0) {
            for ($i = 0; $i < $total; $i++) {
                $html .= self::generateHtmlFromItem($item['children'][$i], $layoutType);
            }
        }

        $html .= '</div>';
        return $html;
    }

    public function insertHeaderAssets()
    {
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

        return $html;
    }

    public function insertFooterAssets()
    {
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

        return $html;
    }

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

            Zo2Framework::import('core.class.minify.jsshrink');
            Zo2Framework::import('core.class.minify.css');

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

    private function processLess($content) {
        if (!class_exists('lessc', false)) Zo2Framework::import('core.class.less.lessc');

        $compiler = new lessc();

        return $compiler->compile($content);
    }

    private function insertLayoutBuilderCss() {
        $pluginPath = Zo2Framework::getSystemPluginPath();
        $layoutBuilderPath = $pluginPath . '/css/layoutbuilder.css';
        $jQueryUICssPath = $pluginPath . '/css/layoutbuilder.css';
        $cssFormat = '<link rel="stylesheet" id="%s" type="text/css" href="%s" />';
        $result = sprintf($cssFormat, 'cssLayoutBuilder', $layoutBuilderPath);
        $result .= sprintf($cssFormat, 'cssJqueryUI', $jQueryUICssPath);
        $result .= '</head>';
        $this->_output = str_replace('</head>', $result, $this->_output);
    }

    public function parseDataComponent($input)
    {
        $pattern = '#<div[^>]+data-zo2componenttype="data-component"[^>]+></div>#';

        return preg_replace_callback($pattern, 'Zo2Layout::embedDataComponent', $input);
    }

    public static function embedDataComponent($matches)
    {
        if($matches[0]) {
            $html = $matches[0];
            $attrPattern = '#data-zo2[a-zA-Z0-9-]+=["\']?[a-zA-Z0-9-_]+["\']?#';

            preg_match_all($attrPattern, $html, $attrMatches);

            // extract attribute
            $attributes = array();
            if($attrMatches[0]) {
                foreach($attrMatches[0] as $attr) {
                    $attr = str_replace('data-zo2', '', $attr);
                    $limiterPos = strpos($attr, '=');
                    $key = substr($attr, 0, $limiterPos);
                    $value = substr($attr, $limiterPos + 2, strlen($attr) - $limiterPos - 3);
                    $attributes[$key] = $value;
                }
            }

            if(count($attributes) > 0 && isset($attributes['componentid'])) {
                $componentName = $attributes['componentid'];

                // exclusively render megamenu
                if ($componentName == 'megamenu') {
                    $doc = JFactory::getDocument();
                    $zo2 = Zo2Framework::getInstance();
                    return $zo2->displayMegaMenu($zo2->getParams('menutype', 'mainmenu'), $zo2->getTemplate());
                }

                if ($componentName == 'include_component') {
                    return '<jdoc:include type="component" />';
                }

                $classname = 'zo2com_' . $componentName;

                if (!class_exists($classname, false)){
                    // as good as include from frontend, may not work on backend
                    $componentPath = Zo2Framework::getCurrentTemplateAbsolutePath() . '/components/' . $componentName . '.php';
                    if (file_exists($componentPath)) require_once($componentPath);
                    else return '';
                }

                $component = new $classname();

                if ($component instanceof Zo2Component) {
                    $component->loadAttributes($attributes);
                    return $component->render();
                }
            }
        }

        return '';
    }

    public static function compressHtml($input) {
        $input = str_replace("\n\n", "\n", $input);
        $input = str_replace("\r\r", "\r", $input);
        return $input;
    }

    public function combineJS() {
        if(!class_exists('PhpClosure', false)) {
            Zo2Framework::import('core.class.minify.closure');
        }
    }

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

    private function setState($state = null) {
        if (!isset($state)) $state = uniqid();

        $path = $this->_templatePath . 'runtime' . DIRECTORY_SEPARATOR . 'state.php';

        file_put_contents($path, $state);
    }

    public function getComponents()
    {
        $path = $this->_templatePath . 'data' . DIRECTORY_SEPARATOR . 'components.json';

        if (file_exists($path)) {
            $content = file_get_contents($path);
            return json_decode($content, true);
        }
        else return null;
    }
}