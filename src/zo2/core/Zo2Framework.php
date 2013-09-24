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

defined('_JEXEC') or die ('Restricted access');

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

    private static $_currentTemplatePath;

    public function __construct(){}

    /**
     * Init Zo2Framework
     */
    public static function init(){
        self::getInstance();
        Zo2Framework::import('core.Zo2Layout');
        Zo2Framework::import('core.Zo2Component');

        $app = JFactory::getApplication();

        if (!$app->isAdmin()) {
            Zo2Framework::import2('addons.shortcodes.WPShortcode');
            Zo2Framework::getInstance()->ShortCode = new WPShortcode();
            // JViewLegacy
            if (!class_exists('JViewLegacy', false)) Zo2Framework::import2('core.classes.legacy');
            // JModuleHelper
            if (!class_exists('JModuleHelper', false)) Zo2Framework::import2('core.classes.helper');
        }

        // set variable for env
        Zo2Framework::$_currentTemplatePath = JPATH_BASE .  '/templates/' . $app->getTemplate();

        JFactory::getLanguage()->load(ZO2_SYSTEM_PLUGIN, JPATH_ADMINISTRATOR);
    }

    /**
     * Get current Zo2Framework Instance
     *
     * @return Zo2Framework
     */
    public static function getInstance(){
        if(!self::$_instance) {
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
    public static function getCurrentDocument(){
        return JFactory::getDocument();
    }

    /**
     * Add js script file to the document
     *
     * @param string $script Path to the js script
     * @return Zo2Framework
     */
    public static function addJsScript($script){
        self::getInstance()->document->addScript($script);
        return self::getInstance();
    }

    /**
     * Add css stylesheet file to the document
     *
     * @param string $style Path to the css stylesheet
     * @return Zo2Framework
     */
    public static function addCssStylesheet($style){
        self::getInstance()->document->addStyleSheet($style);
        return self::getInstance();
    }

    /**
     * Adds a script to the page
     * @param $script
     * @return Zo2Framework
     */
    public static function addScriptDeclaration($script){
        self::getInstance()->document->addScriptDeclaration($script);
        return self::getInstance();
    }

    /**
     * Get Zo2 Framework plugin path
     *
     * @return string
     */
    public static function getSystemPluginPath(){
        return JURI::root(true) . '/plugins/system/zo2';
    }

    public static function getPluginPath(){
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
        if(file_exists($path) && !is_dir($path)){
            $once ? require_once $path : require $path;
            return true;
        }
        else return false;
    }

    /**
     * Get template name
     *
     * Use from backend
     *
     * @param int $templateId
     * @return string
     */
    public static function getTemplateName($templateId = 0)
    {
        $jinput = JFactory::getApplication()->input;
        if($templateId == 0 && !isset($_GET['id'])) return '';
        if($templateId == 0 && isset($_GET['id'])) $templateId = $jinput->getInt('id');

        //if(!isset($_GET['id'])) return '';
        $db  = JFactory::getDBO();
        $sql = 'SELECT template
                FROM #__template_styles
                WHERE id = ' . $templateId;
        $db->setQuery($sql);
        return $db->loadResult();
    }

    /**
     * Get list of data components of current template. Usable from backend only.
     *
     * @param string $templateName
     * @return string
     */
    public static function getComponents($templateName)
    {
        if(!empty($templateName)){
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
    public static function getTemplateParams($assocArray = true){
        $jinput = JFactory::getApplication()->input;
        $templateId = $jinput->getInt('id');

        if(!isset($_GET['id'])) return '';
        $db  = JFactory::getDBO();
        $sql = 'SELECT params
                FROM #__template_styles
                WHERE id = ' . $templateId ;
        $db->setQuery($sql);
        return json_decode($db->loadResult(), $assocArray);
    }

    /**
     * Set layout for output
     *
     * @param $layoutName
     * @return bool
     */
    public static function setLayout($layoutName){
        return true;
    }

    /**
     * Get list of layouts from this template
     *
     * @param int $templateId If pass null, or 0, templateId will get from $_GET['id']
     * @return array
     */
    public static function getTemplateLayouts($templateId = 0){
        $templateName = self::getTemplateName($templateId);

        if(!empty($templateName)){
            $templatePath = JPATH_SITE . '/templates/' . $templateName . '/layouts/*.php';
            $layoutFiles = glob($templatePath);
            return array_map('basename', $layoutFiles, array('.php'));
        }
        else return array();
    }

    public static function getTemplateLayoutsName($templateName) {
        if(!empty($templateName)) {
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
        else return json_encode(array());
    }

    /**
     * File importer
     * @param $filePath string A dot syntax path
     * @return bool Return True on success
     */
    public static function import2 ($filePath) {

        static $paths;

        if (!isset($paths)) {
            $paths = array();
        }
        // Only import the library if not already attempted.
        if (!isset($paths[$filePath]))
        {
            $success = false;
            $path = str_replace('.', DIRECTORY_SEPARATOR, $filePath);
            // If the file exists attempt to include it.
            if (is_file(ZO2_ADMIN_BASE . '/' . $path . '.php'))
            {
                $success = (bool) include_once ZO2_ADMIN_BASE . '/' . $path . '.php';
            }
            $paths[$filePath] = $success;
        }

        return $paths[$filePath];
    }

    /**
     * Return current page.
     *
     * @return string
     */
    public static function getCurrentPage(){
        $app = JFactory::getApplication();
        if($app->getMenu()->getActive()->home) return 'home';
        else return $app->input->getString('view', 'home');
    }

    /**
     * Display megamenu
     * @param $menutype
     * @param $template
     */
    public static function displayMegaMenu($menutype, $template, $isAdmin = false) {
        Zo2Framework::import2('core.Zo2Megamenu');
        $params = Zo2Framework::getParams();
//        $file = JPATH_ROOT . '/templates/'.$template.'/layouts/megamenu.json';
//        $configs = json_decode(JFile::read($file), true);
        $configs = json_decode($params->get('menu_config', ''), true);
        $mmconfig = ($configs && isset($configs[$menutype])) ? $configs[$menutype] : array();
        if (JFactory::getApplication()->isAdmin()) {
            $mmconfig['edit'] = true;
        }
        $menu = new Zo2MegaMenu ($menutype, $mmconfig, $params);

        //Zo2Framework::addCssStylesheet(ZO2_ADMIN_PLUGIN_URL . '/css/megamenu.css');
//        Zo2Framework::addCssStylesheet(ZO2_ADMIN_PLUGIN_URL.'/css/megamenu-responsive.css');
        //Zo2Framework::addJsScript(ZO2_ADMIN_PLUGIN_URL.'/js/megamenu.js');

        return $menu->renderMenu($isAdmin);
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
    public static function getController () {
        if ($zo2controller = JFactory::getApplication()->input->getCmd ('zo2controller')) {
            Zo2Framework::import2 ('core.Zo2Controller');
            Zo2Controller::exec($zo2controller);
        }
    }

    /**
     * Load Assets for admin
     */
    public static function loadAdminAssets() {

        Zo2Framework::addCssStylesheet(ZO2_ADMIN_PLUGIN_URL . '/css/admin.css');
        JHtml::_('formbehavior.chosen', 'select');

    }

    /**
     * Import all short codes file inside the short codes folder
     * @return short codes name array
     */
    public static function loadShortCodes() {

        $files = JFolder::files(ZO2_ADMIN_BASE . DIRECTORY_SEPARATOR .'shortcodes', '.php', false, true);
        $shortcodes = array();
        foreach ($files as $path) {
            $ShortCodeName = substr(basename($path), 0, -4);
            array_push($shortcodes, $ShortCodeName);
        }
        $shortcodes = array_unique($shortcodes);

        foreach ($shortcodes as $shortcode) {

            if (Zo2Framework::import2('shortcodes.' . $shortcode)) {
                if (JFile::exists(ZO2_ADMIN_BASE . '/shortcodes/'.$shortcode.'.php')) {
                    $class = ucfirst($shortcode);
                    $shortcode = new $class;
                    $shortcode->run();
                }
            }

        }
        return $shortcodes;
    }

    /**
     * Add head
     *
     * Use from frontend
     */
    public static function addHead() {
        JHtml::_('jquery.framework');
        Zo2Framework::addJsScript(ZO2_ADMIN_PLUGIN_URL.'/vendor/bootstrap/js/bootstrap.min.js');
        Zo2Framework::addCssStylesheet(ZO2_ADMIN_PLUGIN_URL.'/vendor/bootstrap/css/bootstrap.min.css');
        // Add Stylesheets
        // Load optional RTL Bootstrap CSS
        Zo2Framework::addCssStylesheet('templates/'.Zo2Framework::getTemplate()->template.'/vendor/font-awesome/css/font-awesome.min.css');
        Zo2Framework::addCssStylesheet('templates/'.Zo2Framework::getTemplate()->template.'/css/template.css');
        //Zo2Framework::addCssStylesheet('templates/'.Zo2Framework::getTemplate()->template.'/css/style.css');

    }

    /**
     * Get available positions of the current template.
     * Use only from backend.
     *
     * @param $templateName
     * @return string[]
     */
    public static function getAvailablePositions($templateName)
    {
        $path = JPath::clean(JPATH_SITE . '/templates/' . $templateName . '/templateDetails.xml');

        if (file_exists($path) && is_file($path))
        {
            $xml = simplexml_load_file($path);
            $positions = (array) $xml->positions;
            if (isset($positions['position']))  $positions = $positions['position'];
            else $positions = array();
            return $positions;
        }
        else return array();
    }

    /**
     * Get current template absolute local path.
     * Use only from backend
     *
     * @return string
     */
    public static function getCurrentTemplateAbsolutePath()
    {
        return Zo2Framework::$_currentTemplatePath;
    }

    public static function addBody() {

    }

    public static function addFooter() {

    }
}