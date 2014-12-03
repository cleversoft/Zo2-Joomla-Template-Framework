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
if (!class_exists('Zo2Autoloader')) {

    /**
     * @since 1.4.2
     */
    class Zo2Autoloader {

        /**
         * Split classname
         * @param type $className
         * @return type
         */
        public function splitClassname($className) {
            return preg_split('/(?=[A-Z])/', $className, -1, PREG_SPLIT_NO_EMPTY);
        }

        /**
         * 
         * @param string $className
         */
        public function autoloadByPsr2($className) {
            $parts = $this->splitClassname($className);
            $prefix = array_shift($parts);
            /* Joomla prefix */
            if ($prefix != 'J') {
                $key = strtolower($prefix . '://' . implode('/', $parts)) . '.php';
                $path = Zo2Path::getInstance();
                $filePath = $path->getPath($key);
                if ($filePath) {
                    require_once $filePath;
                }
            }
        }

    }

}