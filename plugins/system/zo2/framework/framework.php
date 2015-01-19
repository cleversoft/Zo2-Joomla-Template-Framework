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
     * @uses This class can use as main entry point for Zo2. It also provide method to get / set Framework global variables
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
         * Framework init
         * @staticvar boolean $inited
         * @param type $template
         */
        public function init($template)
        {
            static $inited;
            if (empty($inited))
            {
                $this->document = JFactory::getDocument();
                $this->template = new Zo2Template($template);
                $this->app = self::getApp();

                $inited = true;
            }
        }

        /**
         * 
         * @staticvar type $app
         * @return \Zo2AppSite|Zo2AppAdmin
         */
        public static function getApp()
        {
            static $app;
            if (empty($app))
            {
                if (JFactory::getApplication()->isAdmin())
                {
                    $app = new Zo2AppAdmin();
                } else
                {
                    $app = new Zo2AppSite();
                }
                $app->init();
            }
            return $app;
        }

        /**
         * Get global or profile params
         * @staticvar type $admin
         * @param type $name
         * @param type $default
         */
        public static function getParam($name, $default = null)
        {
            return self::getApp()->profile->get($name, $default);
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

        public static function log($title, $data = null)
        {
            if (self::isDevelopmentMode())
            {
                $html[] = '<i class="fa fa-bug"></i>';
                $html[] = '[' . JFactory::getDate()->toISO8601() . ']';
                $html[] = '[' . 'DEBUG' . ']';
                $html[] = '<strong>' . $title . '</strong>';
                if (!empty($data))
                {
                    ob_start();
                    print_r($data);
                    $data = ob_get_contents();
                    ob_end_clean();
                    $html[] = '<div class="zo2-debug-data"><pre><small>' . $data . '</small></div></pre>';
                }
                JFactory::getApplication()->enqueueMessage(implode(' ', $html), 'warning');
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
                self::log('Import vendor', $name);
                return require_once $path;
            }
            return false;
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
                    if (!self::isAdministrator())
                    {
                        return false;
                    }
                }


                if (call_user_func(array('Zo2Execute', $zo2Task)))
                {
                    if (self::isAjax())
                    {
                        Zo2Ajax::getInstance()->response();
                    }
                }
            }
        }

        /**
         * 
         * @return boolean
         */
        public static function isDevelopmentMode()
        {
            return self::getInstance()->template->params->get('enable_development_mode');
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