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
if (!class_exists('Zo2Services')) {

    /**
     * 
     */
    class Zo2Services {

        /**
         *
         * @var array
         */
        public static $instances = array();

        /**
         * Get singleton instance of service class
         * @param type $serviceName
         * @param type $configs
         * @return boolean
         */
        public static function getInstance($serviceName, $configs = array()) {
            if (empty(self::$instances[$serviceName])) {
                $className = 'Zo2Service' . ucfirst($serviceName);
                self::$instances[$serviceName] = new $className($configs);
            }
            if (!empty(self::$instances[$serviceName]))
                return self::$instances[$serviceName];
            else
                return false;
        }

        /**
         * Get services button
         * @return string
         */
        public static function button() {
            $args = func_get_args();
            /* First arg used for service name */
            $service = array_shift($args);
            /* Second arg used for name of button - function name will use to get button */
            $button = array_shift($args);

            /* Get instance of service button class */
            $instance = self::getInstance(ucfirst($service) . 'Button');
            if ($instance) {
                if (method_exists($instance, $button)) {
                    $html = call_user_func_array(array($instance, $button), $args);
                    /* Wrapper HTML */
                    $html = '<div class="zo2-service-' . $service . ' zo2-button-' . $service . '-' . $button . '">' . $html . '</div>';
                    return $html;
                }
            } else {
                echo 'File not found';
            }
        }

    }

}