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

    /** @var JRegistry */
    protected static $_registry = null;

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
        self::getInstance();
        $app = JFactory::getApplication();

        // JViewLegacy
        if (!class_exists('JViewLegacy', false))
            Zo2Framework::import('libraries.classes.legacy');

        if (!$app->isAdmin()) {
            //Zo2Framework::import('libraries.socialshare.Zo2Socialshare');
            //Zo2Framework::import('libraries.shortcodes.WPShortcode');
            Zo2Framework::getInstance()->ShortCode = new WPShortcode();
            Zo2Framework::getInstance()->zo2Social = new Zo2Socialshare(Zo2Framework::getParams());
            // JModuleHelper
            if (!class_exists('JModuleHelper', false))
                Zo2Framework::import('libraries.classes.helper');
        } else {
            
        }

        // set variable for env
        Zo2Framework::$_currentTemplatePath = JPATH_THEMES . '/' . Zo2Framework::getTemplateName();

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
            self::$_instance->document = self::getInstance()->getCurrentDocument();
            // attach Zo2Framework to current document
            self::getInstance()->getCurrentDocument()->zo2 = self::getInstance();
        }
        return self::$_instance;
    }

    /**
     * Get current JDocument
     *
     * @return JDocument
     */
    public static function getCurrentDocument() {
        return JFactory::getDocument();
    }

    /**
     * Add js script file to the document
     *
     * @param string $script Path to the js script
     * @return Zo2Framework
     */
    public static function addJsScript($script) {
        if (self::$_isAdmin)
            self::getInstance()->document->addScript($script);
        else
            self::$_scripts[] = $script;
        return self::getInstance();
    }

    /**
     * Add css stylesheet file to the document
     *
     * @param string $style Path to the css stylesheet
     * @return Zo2Framework
     */
    public static function addCssStylesheet($style) {
        if (self::$_isAdmin)
            self::getInstance()->document->addStyleSheet($style);
        else
            self::$_styles[] = $style;
        return self::getInstance();
    }

    /**
     * Add custom Less stylesheet file to the document
     * Will not work on backend
     *
     * @param $less
     * @return Zo2Framework
     */
    public static function addLessStyleSheet($less) {
        if (!self::$_isAdmin)
            self::$_styles[] = $less;
        //else
        return self::getInstance();
    }

    /**
     * Adds a script to the page
     * @param $script
     * @return Zo2Framework
     */
    public static function addScriptDeclaration($script) {
        if (self::$_isAdmin)
            self::getInstance()->document->addScriptDeclaration($script);
        else
            self::$_scriptDeclarations[] = $script;
        return self::getInstance();
    }

    /**
     * Add custom CSS style
     *
     * @param $style
     * @return Zo2Framework
     */
    public static function addStyleDeclaration($style) {
        if (self::$_isAdmin)
            self::getInstance()->document->addStyleDeclaration($style);
        else
            self::$_styleDeclarations[] = $style;
        return self::getInstance();
    }

    /**
     * Add custom LESS style
     *
     * @param $less
     */
    public static function addLessDeclaration($less) {
        if (!class_exists('lessc', false))
            Zo2Framework::import('vendor.less.lessc');
        $compiler = new lessc();
        $style = $compiler->compile($less);
        self::addStyleDeclaration($style);
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
        $path = ZO2PATH_ROOT . '/' . $filepath . '.php';
        if (JFile::exists($path)) {
            return require_once ($path);
        }
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
        }
        else
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
     * Set layout for output
     *
     * @param $layout Zo2Layout
     * @return bool
     */
    public static function setLayout($layout) {
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
        }
        else
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
        }
        else
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

        $params = Zo2Framework::getParams();
        $configs = json_decode($params->get('responsive_layout', ''), true);
        $mmconfig = ($configs && isset($configs[$menutype])) ? $configs[$menutype] : array();
        if (JFactory::getApplication()->isAdmin()) {
            $mmconfig['edit'] = true;
        }
        $menu = new Zo2MegaMenu($menutype, $mmconfig, $params);
        return $menu->renderMenu($isAdmin);
    }

    public static function displayOffCanvasMenu($menutype, $template, $isAdmin = false)
    {
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
            //Zo2Framework::import('core.Zo2Controller');
            Zo2Controller::exec($zo2controller);
        }
    }

    /**
     * Load Assets for admin
     */
    public static function loadAdminAssets() {
        if (Zo2Framework::allowOverrideAdminTemplate()) {
            $doc = JFactory::getDocument();
            $doc->addStyleSheet(JURI::root(true).'/plugins/system/zo2/assets/zo2/css/admin.css');
            //Zo2Framework::addCssStylesheet(ZO2_PLUGIN_URL . '/assets/css/admin.css');
            //JHtml::_('formbehavior.chosen', 'select');
        }
    }

    /**
     * Import all short codes file inside the short codes folder
     * @return short codes name array
     */
    public static function loadShortCodes() {

        $files = JFolder::files(ZO2PATH_ROOT . '/libraries/shortcodes', '.php', false, true);
        $shortcodes = array();

        if (is_array($files)) {
            foreach ($files as $path) {
                $ShortCodeName = substr(basename($path), 0, -4);
                array_push($shortcodes, $ShortCodeName);
            }
        }
        $shortcodes = array_unique($shortcodes);
        array_shift($shortcodes);

        foreach ($shortcodes as $shortcode) {
            if (Zo2Framework::import('libraries.shortcodes.' . $shortcode)) {
                $class = ucfirst($shortcode);
                if (class_exists($class)) {
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
        }
        else
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

    public static function isJoomla25() {
        $result = false;

        $jVer = new JVersion();
        $version = $jVer->getShortVersion();

        if (substr($version, 0, 2) == '3.')
            $result = false;
        else if (substr($version, 0, 4) == '2.5.')
            $result = true;
        return $result;
    }

    public static function allowOverrideAdminTemplate() {
        $app = JFactory::getApplication();

        if ($app->isAdmin()) {
            $templateName = Zo2Framework::getTemplateName();
            if (strpos(strtolower($templateName), 'zo2') !== false)
                return true;
            else
                return false;
        }
        else
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
        if (!self::$_registry) {
            $params = Zo2Framework::getTemplateParams(true);
            self::$_registry = new JRegistry();
            self::$_registry->loadArray($params);
        }
        return self::$_registry->get($property, $default);
    }

    /**
     * Set template param' property
     * @param string $property
     * @param mixed $value
     */
    public static function set($property, $value) {
        if (!self::$_registry) {
            $params = Zo2Framework::getTemplateParams(true);
            self::$_registry = new JRegistry();
            self::$_registry->loadArray($params);
        }

        self::$_registry->set($property, $value);
        self::updateTemplateParams();
    }

    /**
     * Get current template params
     *
     * @param bool $assocArray
     * @return mixed|string
     */
    public static function getTemplateParams($assocArray = true)
    {
        $app = JFactory::getApplication();
        $db = JFactory::getDBO();
        $templateId = false;
        $jinput = $app->input;
        if ($app->isAdmin()) $templateId = $jinput->getInt('id');
        else if ($app->isSite()) $templateId = $app->getTemplate('template')->id;

        if (!$templateId) return false;

        $sql = 'SELECT params FROM #__template_styles WHERE id = ' . $templateId;
        $db->setQuery($sql);
        return json_decode($db->loadResult(), $assocArray);
    }

    /**
     * Update current template's registry params to database
     *
     * @return bool
     */
    public static function updateTemplateParams()
    {
        $app = JFactory::getApplication();
        $db = JFactory::getDBO();
        $jinput = $app->input;
        $templateId = false;
        if ($app->isAdmin()) $templateId = $jinput->getInt('id');
        else if ($app->isSite()) $templateId = $app->getTemplate('template')->id;

        if (!$templateId) return false;

        $sql = 'UPDATE #__template_styles SET params = ' . $db->quote(self::$_registry->toString()) . ' WHERE id = ' . $templateId;
        $db->setQuery($sql);
        $db->execute();
        return true;
    }
}