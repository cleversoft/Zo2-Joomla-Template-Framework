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
        /* public */

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
        private static $_currentTemplatePath;

        public function __construct() {
            
        }

        private static $_scripts = array();
        private static $_scriptDeclarations = array();
        private static $_styles = array();
        private static $_styleDeclarations = array();
        private static $_isAdmin = false;

        /**
         * Init Zo2Framework
         */
        public static function init() {
            $zo2 = self::getInstance();
            Zo2Framework::import('core.Zo2Layout');
            Zo2Framework::import('core.Zo2Component');
            Zo2Framework::import('core.Zo2AssetsManager');

            $app = JFactory::getApplication();
            /* temporary fix for Joomla! 3.2 */
            if (!Zo2Framework::isJoomla25()) {
                $app->loadLanguage();
            }

            $templateName = $app->getTemplate();
            $layout = new Zo2Layout($templateName);
            $zo2->setLayout($layout);

            // JViewLegacy
            if (!class_exists('JViewLegacy', false))
                Zo2Framework::import('core.classes.legacy');

            if (!$app->isAdmin()) {

                // JModuleHelper
                if (!class_exists('JModuleHelper', false))
                    Zo2Framework::import('core.classes.helper');
            } else {
                
            }

            // set variable for env
            Zo2Framework::$_currentTemplatePath = JPATH_SITE . '/templates/' . Zo2Framework::getTemplateName();

            self::$_isAdmin = $app->isAdmin();
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

        /**
         * Load scripts assets for both frontend & backend
         */
        public static function loadAssets() {
            $application = JFactory::getApplication();
            $assets = Zo2Assets::getInstance();

            /* Backend loading */
            if ($application->isAdmin()) {
                /* Only work in Zo2 Template */
                if (self::allowOverrideAdminTemplate()) {
                    /* Only for Joomla! 2.5 */
                    if (self::isJoomla25()) {
                        /* jQuery: Only for backend. In frontend we include that into template index.php */
                        $assets->addScript('vendor/jquery/jquery-1.9.1.min.js');
                        $assets->addScript('vendor/jquery/jquery.noConflict.js');
                        /* For Joomla! 2.5 we need load Bootstrap 2.x */
                        $assets->addScript('vendor/bootstrap/core/2.3.2/js/bootstrap.min.js');
                        $assets->addStyleSheet('vendor/bootstrap/core/2.3.2/css/bootstrap.min.css');
                    }
                    /**
                     * For both Joomla! 2.5 & 3.x
                     */
                    /* Extra Bootstrap addons */
                    $assets->addStyleSheet('vendor/bootstrap/addons/font-awesome/css/font-awesome.min.css');
                    $assets->addScript('vendor/bootstrap/addons/bootstrap-colorpicker/js/bootstrap-colorpicker.js');
                    $assets->addStyleSheet('vendor/bootstrap/addons/bootstrap-colorpicker/css/bootstrap-colorpicker.css');
                    /* Fonts */
                    $assets->addScript('vendor/fontselect/jquery.fontselect.js');
                    $assets->addStyleSheet('vendor/fontselect/fontselect.css');
                    $assets->addStyleSheet('vendor/fontello/css/fontello.css');

                    /* Our script */
                    $assets->addStyleSheet('zo2/css/admin.css');
                }
            } else {
                if (self::isJoomla25() && self::get('load_jquery')) {
                    $assets->addScript('vendor/jquery/jquery-1.9.1.min.js');
                    $assets->addScript('vendor/jquery/jquery.noConflict.js');
                }
                if (self::get('enable_rtl') == 1)
                    $assets->addAsset('vendor/bootstrap/addons/bootstrap-rtl/css/bootstrap-rtl.css');
            }
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

                file_put_contents($absPath, $style);
            }
            return $relPath;
        }

        /**
         * Get Zo2 Framework plugin path
         *
         * @return string
         */
        public static function getSystemPluginPath() {
            return JURI::root(true) . '/plugins/system/zo2';
        }

        public static function getPluginPath() {
            return JPATH_SITE . '/plugins/system/zo2';
        }

        /**
         * Import file from Zo2Framework plugin directory
         *
         * @param string $filepath Dot syntax file path
         * @param bool $once Require this file only once
         * @return bool
         */
        public static function import($filepath, $once = true) {
            $filepath = str_replace('.', '/', $filepath);
            $path = Zo2Framework::getPluginPath() . '/' . $filepath . '.php';
            if (file_exists($path) && !is_dir($path)) {
                $once ? require_once $path : require $path;
                return true;
            } else
                return false;
        }

        /**
         * Get template name
         *
         * Use from backend
         *
         * @param int $templateId
         * @return string
         */
        public static function getTemplateName($templateId = 0) {
            $app = JFactory::getApplication();
            if ($app->isAdmin()) {
                $jinput = JFactory::getApplication()->input;
                if ($templateId == 0 && !isset($_GET['id']))
                    return '';
                if ($templateId == 0 && isset($_GET['id']))
                    $templateId = $jinput->getInt('id');

                //if(!isset($_GET['id'])) return '';
                $db = JFactory::getDBO();
                $sql = 'SELECT template
                    FROM #__template_styles
                    WHERE id = ' . $templateId;
                $db->setQuery($sql);
                return $db->loadResult();
            }
            else if ($app->isSite()) {
                return $app->getTemplate();
            } else
                return '';
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
         * Get template params
         *
         * Use from backend
         *
         * @param bool $assocArray
         * @return mixed|string
         */
        public static function getTemplateParams($assocArray = true) {
            $jinput = JFactory::getApplication()->input;
            $templateId = $jinput->getInt('id');

            if (!isset($_GET['id']))
                return '';
            $db = JFactory::getDBO();
            $sql = 'SELECT params
                FROM #__template_styles
                WHERE id = ' . $templateId;
            $db->setQuery($sql);
            return json_decode($db->loadResult(), $assocArray);
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
            if ($app->getMenu()->getActive()->home)
                return 'homepage';
            else
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
            $params = Zo2Framework::getParams();
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
            $params = Zo2Framework::getParams();
            $configs = json_decode($params->get('menu_config', ''), true);
            $mmconfig = ($configs && isset($configs[$menutype])) ? $configs[$menutype] : array();
            if (JFactory::getApplication()->isAdmin()) {
                $mmconfig['edit'] = true;
            }
            $menu = new Zo2MegaMenu($menutype, $mmconfig, $params);
            return $menu->renderOffCanvasMenu($isAdmin);
        }

        /**
         * Get current template object
         * @return array|string
         */
        public static function getTemplate() {
            $template = JFactory::getApplication()->getTemplate(true);
            if ($template) {
                return $template;
            } else {
                return array();
            }
        }

        /**
         * Get current template params
         * @param null $name
         * @param null $default
         * @return mixed
         */
        public static function getParams($name = null, $default = null) {

            if ($name) {
                return JFactory::getApplication()->getTemplate(true)->params->get($name, $default);
            } else {
                return JFactory::getApplication()->getTemplate(true)->params;
            }
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
         * Import all short codes file inside the short codes folder
         * @return short codes name array
         */
        public static function loadShortCodes() {

            $files = JFolder::files(ZO2PATH_ROOT . '/libraries/shortcodes', '.php', false, true);
            $shortcodes = array();
            foreach ($files as $path) {
                $ShortCodeName = substr(basename($path), 0, -4);
                array_push($shortcodes, $ShortCodeName);
            }
            $shortcodes = array_unique($shortcodes);

            foreach ($shortcodes as $shortcode) {

                if (Zo2Framework::import('shortcodes.' . $shortcode)) {
                    if (JFile::exists(ZO2PATH_ROOT . '/libraries/shortcodes/' . $shortcode . '.php')) {
                        $class = ucfirst($shortcode);
                        $shortcode = new $class;
                        $shortcode->run();
                    }
                }
            }
            return $shortcodes;
        }

        /**
         * Get available positions of the current template.
         * Use only from backend.
         *
         * @param $templateName
         * @return string[]
         */
        public static function getAvailablePositions($templateName) {
            $path = JPath::clean(JPATH_SITE . '/templates/' . $templateName . '/templateDetails.xml');

            if (file_exists($path) && is_file($path)) {
                $xml = simplexml_load_file($path);
                $positions = (array) $xml->positions;
                if (isset($positions['position']))
                    $positions = $positions['position'];
                else
                    $positions = array();
                return $positions;
            } else
                return array();
        }

        /**
         * Get current template absolute local path.
         * Use only from backend
         *
         * @return string
         */
        public static function getCurrentTemplateAbsolutePath() {
            return Zo2Framework::$_currentTemplatePath;
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

        /**
         * 
         * @return boolean
         */
        public static function isJoomla25() {
            $jVer = new JVersion();
            return $jVer->RELEASE == '2.5';
        }

        public static function allowOverrideAdminTemplate() {
            $app = JFactory::getApplication();

            if ($app->isAdmin()) {
                $templateName = Zo2Framework::getTemplateName();
                if (strpos(strtolower($templateName), 'zo2') !== false)
                    return true;
                else
                    return false;
            } else
                return true;
        }

        /**
         * Get template param' property
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
         * @param $property
         * @param $value
         * @return mixed
         */
        public static function set($property, $value) {
            if (self::getTemplate()) {
                return self::getTemplate()->params->set($property, $value);
            }
            return false;
        }

    }

}