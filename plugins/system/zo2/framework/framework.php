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
        private $_vars = array();

        /**
         *
         * @var Zo2Profile
         */
        public $profile;

        public static function getInstance()
        {
            static $instance;
            if (!isset($instance))
            {
                $instance = new Zo2Framework();
            }
            return $instance;
        }

        public static function getGlobalParam($name, $default = null)
        {

            return self::getInstance()->template->params->get($name, $default);
        }

        public static function getProfileParams($name, $default = null)
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
            JFactory::getApplication()->enqueueMessage($message, $type);
        }

        public static function importVendor($name)
        {
            $path = Zo2Path::getInstance()->getPath('Zo2://vendor/' . $name . '/autoloader.php');
            if ($path)
            {
                require_once $path;
            }
        }

        public static function execute()
        {
            $jinput = JFactory::getApplication()->input;
            $task = $jinput->getCmd('zo2_task');
            $task = explode('.', $task);
            if (count($task) == 2)
            {
                $modelClass = 'Zo2Model' . ucfirst($task[0]);
                $model = new $modelClass ();
                $func = $task[1];
                $respond = call_user_func_array(array($model, $func), array());
            }
            if ($jinput->getInt('zo2_ajax'))
            {
                echo Zo2Ajax::getInstance()->response();
            }
        }

        public static function set($name, $value)
        {
            self::getInstance()->_vars[$name] = $value;
        }

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
         * @return boolean
         */
        public static function isDevelopmentMode()
        {
            return self::getInstance()->template->params->get('enable_development_mode', ZO2DEVELOPMENT_MODE);
        }

        /**
         * This func will hook into Joomla process before it's dispatched to component
         */
        public static function joomlaHook()
        {
            $jinput = JFactory::getApplication()->input;
            if ($jinput->get('option') == 'com_templates')
            {
                $task = $jinput->get('task');
                $zo2Data = $jinput->get('zo2', array(), 'array');
                $joomlaData = $jinput->get('jform', array(), 'array');
                $joomlaModel = new Zo2ModelJoomla();
                $joomlaModel->saveTemplateParams($zo2Data, $joomlaData);
                // Get Zo2 data. It's already modified after bindTemplateParams above                
                switch ($task)
                {
                    // Save data to current profile
                    case 'style.apply':
                        $admin = new Zo2Admin();
                        $profile = Zo2Framework::getInstance()->profile;
                        $profile->loadArray($zo2Data);
                        $profile->save();
                }
            }
        }

    }

}