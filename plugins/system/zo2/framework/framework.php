<?php

/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');

/**
 * Class exists checking
 */
if (!class_exists('Zo2Framework'))
{

    /**
     * Zo2 Framework class
     */
    class Zo2Framework
    {

        /**
         *
         * @var Zo2Template
         */
        public $template;

        /**
         * Global variables
         * @var array
         */
        private $_vars = array();

        /**
         *
         * @var Zo2Profile
         */
        public $profile;

        /**
         * 
         * @staticvar Zo2Framework $instance
         * @return \Zo2Framework
         */
        public static function getInstance()
        {
            static $instance;
            if (!isset($instance))
            {
                $instance = new Zo2Framework();
            }
            return $instance;
        }

        /**
         * Get global or profile params
         * @staticvar type $admin
         * @param type $name
         * @param type $default
         */
        public static function getParam($name, $default = null)
        {
            static $admin;
            if (empty($admin))
            {
                $joomlaFile = Zo2Path::getInstance()->getPath('Zo2://assets/joomla.json');
                $admin = Zo2HelperFile::loadJsonFile($joomlaFile);
            }
            if (in_array($name, $admin))
            {
                self::getGlobalParam($name);
            } else
            {
                self::getProfileParam($name);
            }
        }

        /**
         * 
         * @param type $name
         * @param type $default
         * @return type
         */
        public static function getGlobalParam($name, $default = null)
        {

            return self::getInstance()->template->params->get($name, $default);
        }

        /**
         * 
         * @param type $name
         * @param type $default
         * @return type
         */
        public static function getProfileParam($name, $default = null)
        {
            return self::getInstance()->profile->get($name, $default);
        }

        /**
         * 
         * @param type $message
         * @param type $type
         */
        public static function message($message, $type = 'message')
        {
            if (self::isAjax())
            {
                $ajax = Zo2Ajax::getInstance();
                $ajax->addMessage($message, '', $type);
            } else
            {
                JFactory::getApplication()->enqueueMessage($message, $type);
            }
        }

        /**
         * 
         * @param type $name
         * @return boolean
         */
        public static function importVendor($name)
        {
            $path = Zo2Path::getInstance()->getPath('Zo2://vendor/' . $name . '/autoloader.php');
            if ($path)
            {
                return require_once $path;
            }
            return false;
        }

        /**
         * Set gloval variables
         * @param type $name
         * @param type $value
         */
        public static function set($name, $value)
        {
            self::getInstance()->_vars[$name] = $value;
        }

        /**
         * Get gloval variables
         * @param type $name
         * @param type $default
         * @return type
         */
        public static function get($name, $default = null)
        {
            $framework = self::getInstance();
            if (isset($framework->_vars[$name]))
            {
                return $framework->_vars[$name];
            }
            return $default;
        }

        /**
         * This func will hook into Joomla process after the framework has loaded and initialised and the router has routed the client request.
         */
        public static function joomlaHook()
        {
            $jinput = JFactory::getApplication()->input;
            $zo2Task = $jinput->getCmd('zo2_task');
            $zo2Scope = $jinput->getWord('zo2_scope');

            if ($zo2Task)
            {
                // Admin request
                if ($zo2Scope == 'admin')
                {
                    Zo2Admin::init();
                    if (!self::isAdministrator())
                    {
                        return false;
                    }
                } else // Site request
                {
                    Zo2Site::init();
                }
                $parts = explode('.', $zo2Task);
                $task = array_shift($parts);
                $func = array_shift($parts);
                // Adding prefix ajax into func for ajax request
                if (self::isAjax())
                {
                    $func = 'ajax' . ucfirst($func);
                }
                $className = 'Zo2Model' . ucfirst($zo2Scope) . ucfirst($task);
                $modelClass = new $className();
                // Execute
                if (method_exists($modelClass, $func))
                {
                    call_user_func_array(array($modelClass, $func), array());
                }
                if (self::isAjax())
                {
                    Zo2Ajax::getInstance()->response();
                }
            }
        }

        /**
         * 
         * @return boolean
         */
        public static function isDevelopmentMode()
        {
            return self::getInstance()->template->params->get('enable_development_mode', ZO2DEVELOPMENT_MODE);
        }

        /**
         * 
         * @return boolean
         */
        public static function isAjax()
        {
            $jinput = JFactory::getApplication()->input;
            return (bool) $jinput->getInt('zo2_ajax');
        }

        /**
         * 
         * @return boolean
         */
        public static function isAdministrator()
        {
            $user = JFactory::getUser();
            if ($user->authorise('core.edit', 'com_content'))
            {
                return true;
            } else
            {
                return false;
            }
        }

    }

}