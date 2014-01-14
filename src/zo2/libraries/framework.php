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
defined('_JEXEC') or die('Restricted access');

jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

if (!class_exists('Zo2Framework')) {

    class Zo2Framework {

        /**
         * @var JDocument
         */
        public $document;

        /* private */

        /**
         * @var Zo2Framework
         */
        private static $_instance;

        /**
         * @var Zo2Layout
         */
        private $_layout = null;
        private static $_scripts = array();
        private static $_scriptDeclarations = array();
        private static $_styles = array();
        private static $_styleDeclarations = array();

        public function __construct() {
            
        }

        /**
         * Return current template object
         * @staticvar null $template
         * @param type $id
         * @return type
         */
        public static function getTemplate($id = null) {
            static $template = null;
            if (empty($template)) {
                if (self::isSite()) {
                    $template = JFactory::getApplication()->getTemplate(true);
                } else {
                    $template = false;
                    if ($id === null)
                        $id = self::getRequest('id');
                    if ($id) {
                        $db = JFactory::getDBO();
                        $query = ' SELECT * FROM ' . $db->quoteName('#__template_styles') .
                                ' WHERE ' . $db->quoteName('id') . ' = ' . (int) $id;
                        $db->setQuery($query);
                        $template = $db->loadObject();
                        if ($template) {
                            $template->params = new JRegistry($template->params);
                        }
                    }
                }
            }
            return $template;
        }

        /**
         * Get template params' property
         * @param string $property
         * @param mixed $default
         *
         * @return mixed
         */
        public static function get($property, $default = null) {
            if (self::getTemplate()) {
                return self::getTemplate()->params->get($property, $default);
            }
            return $default;
        }

        /**
         * Get template name
         * @return string
         */
        public static function getTemplateName() {
            $template = self::getTemplate();
            if ($template)
                return self::getTemplate()->template;
        }

        /**
         * Get template physical path
         * @return string
         */
        public static function getTemplatePath() {
            return JPATH_THEMES . DIRECTORY_SEPARATOR . self::getTemplateName();
        }

        /**
         * Determine if we'r using Zo2 Template
         * @return boolean
         */
        public static function isZo2Template() {
            $templatePath = self::getTemplatePath();
            $templateName = self::getTemplateName();
            if (JFile::exists($templatePath . '/assets/template.json')) {
                return (strpos($templateName, 'zo2') !== false || strpos($templateName, 'zt') !== false);
            }
            return false;
        }

        /**
         * 
         * @return boolean
         */
        public static function getTemplateAssets() {
            $templatePath = self::getTemplatePath();
            $templateName = self::getTemplateName();
            if (JFile::exists($templatePath . '/assets/template.json')) {
                return json_decode(file_get_contents($templatePath . '/assets/template.json'));
            }
            return false;
        }

        public static function getTemplatePositions() {
            $path = self::getTemplatePath() . '/templateDetails.xml';
            $positions = array();
            if (JFile::exists($path)) {
                $xml = simplexml_load_file($path);
                $positions = (array) $xml->positions;
                if (isset($positions['position']))
                    $positions = $positions['position'];
                else
                    $positions = array();
            }
            return $positions;
        }

        /**
         * 
         * @return type
         */
        public static function isSite() {
            return JFactory::getApplication()->isSite();
        }

        /**
         * 
         * @return boolean
         */
        public static function isJoomla25() {
            $jVer = new JVersion();
            return $jVer->RELEASE == '2.5';
        }

        /**
         * Wrapper for JInput get
         * @param type $name
         * @param type $default
         * @param type $filter
         * @return type
         */
        public static function getRequest($name, $default = null, $filter = 'cmd') {
            $jinput = JFactory::getApplication()->input;
            return $jinput->get($name, $default, $filter);
        }

        /**
         * Get current Zo2Framework Instance
         *
         * @return Zo2Framework
         */
        public static function getInstance() {
            if (!self::$_instance) {
                self::$_instance = new self();
                self::$_instance->document = JFactory::getDocument();
                // attach Zo2Framework to current document
                self::$_instance->document->zo2 = self::getInstance();
            }
            return self::$_instance;
        }

        public static function prepareTemplateAssets() {
            $assets = Zo2Assets::getInstance();
            $assetsJsonPath = $assets->getPath($assets->get('siteTemplate') . '/layouts/assets.json');
            if (file_exists($assetsJsonPath)) {
                $assetsData = json_decode(file_get_contents($assetsJsonPath), true);
                foreach ($assetsData as $data) {
                    if ($data['type'] == 'js')
                        $assets->addScript('zo2/js/' . $data['path'] . '.js');
                    else if ($data['type'] == 'css')
                        $assets->addStyleSheet('zo2/css/' . $data['path'] . '.css');
                    else if ($data['type'] == 'less')
                        $assets->addStyleSheet('zo2/css/' . $data['path'] . '.css');
                }
            }
        }

        public static function prepareCustomFonts() {
            $selectors = array('body_font' => 'body', 'h1_font' => 'h1',
                'h2_font' => 'h2', 'h3_font' => 'h3', 'h4_font' => 'h4',
                'h5_font' => 'h5', 'h6_font' => 'h6'
            );

            foreach ($selectors as $param => $selector) {
                $value = Zo2Framework::get($param);

                if (!empty($value)) {
                    $data = json_decode($value, true);
                    if (isset($data['type']) && !empty($data['type'])) {
                        switch ($data['type']) {
                            case 'standard':
                                self::buildStandardFontStyle($data, $selector);
                                break;
                            case 'googlefonts':
                                self::buildGoogleFontsStyle($data, $selector);
                                break;
                            case 'fontdeck':
                                self::buildFontDeckStyle($data, $selector);
                                break;
                            default:
                                break;
                        }
                    }
                }
            }
        }

        /**
         * Generate custom CSS style for Standard Font option
         *
         * @param $data
         * @param $selector
         */
        public static function buildStandardFontStyle($data, $selector) {
            $assets = Zo2Assets::getInstance();
            $style = '';
            if (!empty($data['family']))
                $style .= 'font-family:' . $data['family'] . ';';
            if (!empty($data['size']) && $data['size'] > 0)
                $style .= 'font-size:' . $data['size'] . 'px;';
            if (!empty($data['color']))
                $style .= 'color:' . $data['color'] . ';';
            if (!empty($data['style'])) {
                switch ($data['style']) {
                    case 'b': $style .= 'font-weight:bold;';
                        break;
                    case 'i': $style .= 'font-style:italic;';
                        break;
                    case 'bi':
                    case 'ib':
                        $style .= 'font-weight:bold;font-style:italic;';
                        break;
                    default:
                        break;
                }
            }

            if (!empty($style)) {
                $style = $selector . '{' . $style . '}' . "\n";

                $assets->addStyleSheetDeclaration($style);
            }
        }

        /**
         * @param $data
         * @param $selector
         */
        public static function buildGoogleFontsStyle($data, $selector) {
            $assets = Zo2Assets::getInstance();
            $api = 'http://fonts.googleapis.com/css?family=';
            $url = '';
            $style = '';
            if (!empty($data['family'])) {
                $style .= 'font-family:' . $data['family'] . ';';
                $url = $api . urlencode($data['family']);
            }
            if (!empty($data['size']) && $data['size'] > 0)
                $style .= 'font-size:' . $data['size'] . 'px;';
            if (!empty($data['color']))
                $style .= 'color:' . $data['color'] . ';';
            if (!empty($data['style'])) {
                switch ($data['style']) {
                    case 'b':
                        $style .= 'font-weight:bold;';
                        $url .= ':700';
                        break;
                    case 'i':
                        $style .= 'font-style:italic;';
                        $url .= ':400italic';
                        break;
                    case 'bi':
                    case 'ib':
                        $style .= 'font-weight:bold;font-style:italic;';
                        $url .= ':700italic';
                        break;
                    default:
                        break;
                }
            }

            if (!empty($style)) {
                $doc = JFactory::getDocument();
                $doc->addStyleSheet($url);
                //$this->addStyleSheet($url);
                $style = $selector . '{' . $style . '}' . "\n";
                $assets->addStyleSheetDeclaration($style);
            }
        }

        /**
         * Generate custom CSS style for FontDeck option
         *
         * @param $data
         * @param $selector
         */
        public static function buildFontDeckStyle($data, $selector) {
            $fontdeckCode = Zo2Framework::get('fontdeck_code');
            $assets = Zo2Assets::getInstance();

            if (!empty($fontdeckCode)) {
                $assets->addScriptDeclaration($fontdeckCode);
            }

            $style = '';
            if (!empty($data['family']))
                $style .= 'font-family:' . $data['family'] . ';';
            if (!empty($data['size']) && $data['size'] > 0)
                $style .= 'font-size:' . $data['size'] . 'px;';
            if (!empty($data['color']))
                $style .= 'color:' . $data['color'] . ';';
            if (!empty($data['style'])) {
                switch ($data['style']) {
                    case 'b': $style .= 'font-weight:bold;';
                        break;
                    case 'i': $style .= 'font-style:italic;';
                        break;
                    case 'bi':
                    case 'ib':
                        $style .= 'font-weight:bold;font-style:italic;';
                        break;
                    default:
                        break;
                }
            }

            if (!empty($style)) {
                $style = $selector . '{' . $style . '}' . "\n";
                $assets->addStyleSheetDeclaration($style);
            }
        }

        public static function preparePresets() {
            $preset = Zo2Framework::get('theme');
            //$zo2 = Zo2Framework::getInstance();
            $assets = Zo2Assets::getInstance();
            if (empty($preset)) {

                $presetPath = Zo2HelperPath::getTemplateFilePath('layouts/presets.json', 'path');
                $presets = array();
                if (file_exists($presetPath)) {
                    $presets = json_decode(file_get_contents($presetPath), true);
                }
                $defaultData = array();
                for ($i = 0; $i < count($presets); $i++) {
                    if ($presets[$i]['default'])
                        $defaultData = $presets[$i];
                }
                if (empty($defaultData) && count($presets) > 0)
                    $presetData = $presets[0];
                else
                    $presetData = array(
                        'name' => isset($defaultData['name']) ? $defaultData['name'] : '',
                        'css' => isset($defaultData['css']) ? $defaultData['css'] : '',
                        'less' => isset($defaultData['less']) ? $defaultData['less'] : '',
                        'background' => isset($defaultData['variables']['background']) ? $defaultData['variables']['background'] : '',
                        'header' => isset($defaultData['variables']['header']) ? $defaultData['variables']['header'] : '',
                        'header_top' => isset($defaultData['variables']['header_top']) ? $defaultData['variables']['header_top'] : '',
                        'text' => isset($defaultData['variables']['text']) ? $defaultData['variables']['text'] : '',
                        'link' => isset($defaultData['variables']['link']) ? $defaultData['variables']['link'] : '',
                        'link_hover' => isset($defaultData['variables']['link_hover']) ? $defaultData['variables']['link_hover'] : '',
                        'bottom1' => isset($defaultData['variables']['bottom1']) ? $defaultData['variables']['bottom1'] : '',
                        'bottom2' => isset($defaultData['variables']['bottom2']) ? $defaultData['variables']['bottom2'] : '',
                        'footer' => isset($defaultData['variables']['footer']) ? $defaultData['variables']['footer'] : ''
                    );
            }
            if (!empty($preset))
                $presetData = json_decode($preset, true);
            $style = '';
            if (!empty($presetData['background']))
                $style .= 'body{background-color:' . $presetData['background'] . '}';
            if (!empty($presetData['header']))
                $style .= '#zo2-header{background-color:' . $presetData['header'] . '}';
            if (!empty($presetData['header_top']))
                $style .= '#zo2-header-top{background-color:' . $presetData['header_top'] . '}';
            if (!empty($presetData['text']))
                $style .= 'body{color:' . $presetData['text'] . '}';
            if (!empty($presetData['link']))
                $style .= 'a{color:' . $presetData['link'] . '}';
            if (!empty($presetData['link_hover']))
                $style .= 'a:hover{color:' . $presetData['link_hover'] . '}';
            if (!empty($presetData['bottom1']))
                $style .= '#zo2-bottom1{background-color:' . $presetData['bottom1'] . '}';
            if (!empty($presetData['bottom2']))
                $style .= '#zo2-bottom2{background-color:' . $presetData['bottom2'] . '}';
            if (!empty($presetData['footer']))
                $style .= '#zo2-footer{background-color:' . $presetData['footer'] . '}';

            if (!empty($presetData['css']))
                $assets->addStyleSheet('zo2/css/' . $presetData['css'] . '.css');

            $assets->addStyleSheetDeclaration($style);
        }

        public static function compileLess($lessPath, $templateName = '') {
            $filename = md5($lessPath) . '.css';
            $absPath = JPATH_SITE . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $templateName .
                    DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . $filename;
            $relPath = 'assets/cache/' . $filename;
            if (!file_exists($absPath)) {
                if (!class_exists('lessc', false))
                    Zo2Framework::import('vendor.less.lessc');
                $absLessPath = JPATH_SITE . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $templateName . $lessPath;

                $compiler = new lessc();
                $style = $compiler->compileFile($absLessPath);

                Zo2HelperAssets::forcePutContent($absPath, $style);
            }
            return $relPath;
        }

        /**
         * Get list of data components of current template. Usable from backend only.
         *
         * @param string $templateName
         * @return string
         */
        public static function getComponents($templateName) {
            if (!empty($templateName)) {
                $path = JPATH_SITE . '/templates/' . $templateName . '/data/components.json';
                if (file_exists($path)) {
                    $content = file_get_contents($path);
                    echo $content;
                }
            }

            return '';
        }

        /**
         * Set layout for output
         *
         * @param $layout Zo2Layout
         * @return bool
         */
        public static function setLayout($layout) {
            /*
              foreach (self::$_scripts as $s) {
              $layout->insertJs($s);
              }
              foreach (self::$_scriptDeclarations as $sd) {
              $layout->insertJsDeclaration($sd);
              }
              foreach (self::$_styles as $s) {
              if (strpos($s, '.less') !== false)
              $layout->insertLess($s);
              else
              $layout->insertCss($s);
              }
              foreach (self::$_styleDeclarations as $sd) {
              $layout->insertCssDeclaration($sd);
              }
             */
            self::getInstance()->_layout = $layout;
            return self::getInstance();
        }

        public static function getLayout() {
            return self::getInstance()->_layout;
        }

        /**
         * Get list of layouts from this template
         *
         * @param int $templateId If pass null, or 0, templateId will get from $_GET['id']
         * @return array
         */
        public static function getTemplateLayouts($templateId = 0) {
            $templateName = self::getTemplateName($templateId);

            if (!empty($templateName)) {
                $templatePath = JPATH_SITE . '/templates/' . $templateName . '/layouts/*.php';
                $layoutFiles = glob($templatePath);
                return array_map('basename', $layoutFiles, array('.php'));
            } else
                return array();
        }

        public static function getTemplateLayoutsName($templateName) {
            if (!empty($templateName)) {
                $templatePath = JPATH_SITE . '/templates/' . $templateName . '/layouts/*.json';
                $layoutFiles = glob($templatePath);

                $result = array();

                for ($i = 0, $total = count($layoutFiles); $i < $total; $i++) {
                    $layoutFiles[$i] = basename($layoutFiles[$i]);
                    if ($layoutFiles[$i] !== 'core.json' && $layoutFiles[$i] !== 'megamenu.json') {
                        $result[] = str_replace('.json', '', $layoutFiles[$i]);
                    }
                }

                return json_encode($result);
            } else
                return json_encode(array());
        }

        /**
         * Return current page.
         *
         * @return string
         */
        public static function getCurrentPage() {
            $app = JFactory::getApplication();
            $menu = $app->getMenu();
            if (isset($menu)) {
                $activeMenu = $menu->getActive();
                if (isset($activeMenu) && $activeMenu->home)
                    return 'homepage';
            }

            return $app->input->getString('view', 'homepage');
        }

        /**
         * @param $menutype
         * @param $template
         * @param bool $isAdmin
         * @return string
         */
        public static function displayMegaMenu($menutype, $template, $isAdmin = false) {

            Zo2Framework::import('core.Zo2Megamenu');
            $params = Zo2Framework::getTemplate()->params;
            $configs = json_decode($params->get('menu_config', ''), true);
            $mmconfig = ($configs && isset($configs[$menutype])) ? $configs[$menutype] : array();
            if (JFactory::getApplication()->isAdmin()) {
                $mmconfig['edit'] = true;
            }
            $menu = new Zo2MegaMenu($menutype, $mmconfig, $params);
            return $menu->renderMenu($isAdmin);
        }

        public static function displayOffCanvasMenu($menutype, $template, $isAdmin = false) {
            Zo2Framework::import('core.Zo2Megamenu');
            $params = Zo2Framework::getTemplate()->params;
            $configs = json_decode($params->get('menu_config', ''), true);
            $mmconfig = ($configs && isset($configs[$menutype])) ? $configs[$menutype] : array();
            if (JFactory::getApplication()->isAdmin()) {
                $mmconfig['edit'] = true;
            }
            $menu = new Zo2MegaMenu($menutype, $mmconfig, $params);
            return $menu->renderOffCanvasMenu($isAdmin);
        }

        /**
         * Execute an action of the controller
         */
        public static function getController() {
            if ($zo2controller = JFactory::getApplication()->input->getCmd('zo2controller')) {
                Zo2Framework::import('core.Zo2Controller');
                Zo2Controller::exec($zo2controller);
            }
        }

        /**
         * @return bool
         */
        public static function isFrontPage() {

            $app = JFactory::getApplication();
            $menu = $app->getMenu();
            $tag = JFactory::getLanguage()->getTag();

            if ($menu->getActive() == $menu->getDefault($tag)) {
                return true;
            } else {
                return false;
            }
        }

        public static function getAsset($name, $data = array()) {
            static $assets = array();
            if (empty($assets[$name])) {
                $assets[$name] = new Zo2Asset($data);
            }
            return $assets[$name];
        }

        public static function getZo2Path() {
            return realpath(__DIR__ . '/../');
        }

        /**
         * Import file from Zo2Framework plugin directory
         *
         * @param string $filepath Dot syntax file path
         * @param bool $once Require this file only once
         * @return bool
         */
        public static function import($filePath, $once = true) {
            $path = self::getZo2Path() . DIRECTORY_SEPARATOR . str_replace('.', DIRECTORY_SEPARATOR, $filePath) . '.php';
            if (JFile::exists($path)) {
                return $once ? include_once $path : include $path;
            }
            return false;
        }

    }

}