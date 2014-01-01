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
         * Get button
         * @return string
         */
        public static function button() {
            $args = func_get_args();
            $service = array_shift($args);
            $button = array_shift($args);

            $instance = self::getInstance(ucfirst($service) . 'Button');
            if ($instance) {
                if (method_exists($instance, $button)) {
                    $html = call_user_func_array(array($instance, $button), $args);
                    $html = '<div class="zo2-service-' . $service . ' ' . $button . '">' . $html . '</div>';
                    return $html;
                }
            }
        }

    }

}