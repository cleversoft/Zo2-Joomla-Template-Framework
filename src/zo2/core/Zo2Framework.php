<?php

/**
 *
 * Zo2Framework class serves as helper for all basic functionalyties of Zo2Framework system
 *
 * @package Zo2 Framework
 * @author JoomShaper http://www.joomvision.com
 * @copyright Copyright (c) 2010 - 2013 JoomVision
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

    public static function addScript($script){}

    public static function addStyle($style){}
}