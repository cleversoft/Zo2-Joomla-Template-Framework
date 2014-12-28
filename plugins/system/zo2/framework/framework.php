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
 * 
 */
if (!class_exists('Zo2Framework')) {

    class Zo2Framework {

        /**
         *
         * @var Zo2Template
         */
        public $template;

        /**
         *
         * @var Zo2Profile
         */
        public $profile;

        public static function getInstance() {
            static $instance;
            if (!isset($instance)) {
                $instance = new Zo2Framework();
            }
            return $instance;
        }

        public static function importVendor($name) {
            $path = Zo2Path::getInstance()->getPath('Zo2://vendor/' . $name . '/autoloader.php');
            if ($path) {
                require_once $path;
            }
        }

        public static function execute() {
            $jinput = JFactory::getApplication()->input;
            $task = $jinput->getCmd('zo2_task');
            $task = explode('.', $task);
            if (count($task) == 2) {
                $modelClass = 'Zo2Model' . ucfirst($task[0]);
                $model = new $modelClass ();
                $func = $task[1];
                $respond = call_user_func_array(array($model, $func), array());
            }
            if ($jinput->getInt('zo2_ajax')) {
                echo Zo2Ajax::getInstance()->response();
            }
        }
        
        /**
         * 
         * @return boolean
         */
        public static function isDevelopmentMode () {
            return self::getInstance()->template->get('enable_development_mode');
        }

    }

}