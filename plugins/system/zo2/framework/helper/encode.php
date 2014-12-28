<?php

/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @version     1.4.3
 * @since       1.4.3
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');

if (!class_exists('Zo2HelperEncode')) {

    class Zo2HelperEncode {

        /**
         * @link http://php.net/manual/en/json.constants.php
         * @param mixed $data
         * @return string
         */
        public static function json($data) {
            if (version_compare(PHP_VERSION, '5.3.10', '<')) {
                return json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
            } else {
                return json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            }
        }

        /**
         * 
         * @param type $data
         * @return string
         */
        public static function md5($data) {
            if (!is_string($data)) {
                $data = serialize($data);
            }
            return md5($data);
        }

        public static function md5File($file) {
            if (JFile::exists($file)) {
                return md5_file($filename);
            }
            return false;
        }

    }

}