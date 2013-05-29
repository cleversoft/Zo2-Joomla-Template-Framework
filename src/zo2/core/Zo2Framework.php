<?php

/**
 *
 * Zo2Framework class serves as helper for all basic functionalyties of Zo2Framework system
 *
 * @package Zo2 Framework
 * @author JoomShaper http://www.joomvision.com
 * @author Duc Nguyen <ducntq@gmail.com>
 * @author Vu Hiep
 * @copyright Copyright (c) 2008 - 2013 JoomVision
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */

defined ('_JEXEC') or die('Resticted aceess');

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

    public function __construct(){}

    /**
     * Init Zo2Framework
     */
    public static function init(){
        self::getInstance();
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
     * Get Zo2 Framework plugin path
     *
     * @return string
     */
    public static function getSystemPluginPath(){
        return JURI::root(true) . '/plugins/system/zo2';
    }


    public static function getPluginPath(){
        return JPATH_SITE . '/system/zo2';
    }

    /**
     * Import file from Zo2Framework plugin directory
     *
     * @param string $filepath File's path, base directory is Zo2Framework plugin directory
     * @param bool $once Require this file only once
     * @return bool
     */
    public static function import($filepath, $once = true) {
        $path = Zo2Framework::getPluginPath() . '/' . $filepath;
        if(file_exists($path) && !is_dir($path)){
            $once ? require_once $path : require $path;
            return true;
        }
        else return false;
    }

    /**
     * Get Template name
     *
     * @return string
     */
    public static function getTemplateName()
    {
        if(!isset($_GET['id'])) return '';
        $db  = JFactory::getDBO();
        $sql = 'SELECT template
                FROM #__template_styles
                WHERE id = ' . $_GET['id'] ;
        $db->setQuery($sql);
        return $db->loadResult();
    }

    /**
     * Get template params
     *
     * @param bool $assocArray
     * @return mixed|string
     */
    public static function getTemplateParams($assocArray = true){
        if(!isset($_GET['id'])) return '';
        $db  = JFactory::getDBO();
        $sql = 'SELECT params
                FROM #__template_styles
                WHERE id = ' . $_GET['id'] ;
        $db->setQuery($sql);
        return json_decode($db->loadResult(), $assocArray);
    }
}