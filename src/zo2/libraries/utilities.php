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