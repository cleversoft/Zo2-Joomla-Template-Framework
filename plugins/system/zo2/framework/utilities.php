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

if (!class_exists('Zo2Utilities')) {

    class Zo2Utilities {

        public static function &getInstance() {
            static $instance;
            if (!isset($instance)) {
                $instance = new Zo2Utilities();
            }
            return $instance;
        }

        public function __get($name) {
            return $this->getUtility($name);
        }

        public function getUtility($name) {
            static $utilities = array();
            if (!isset($utilities[$name])) {
                if (JFile::exists(__DIR__ . '/utilities/' . $name . '.php')) {
                    require_once __DIR__ . '/utilities/' . $name . '.php';
                }
                $className = 'Zo2Utility' . ucfirst($name);

                if (class_exists($className)) {
                    $utilities[$name] = new $className();
                }
            }
            if (!empty($utilities[$name]))
                return $utilities[$name];
        }

    }

}