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
if (!class_exists('Zo2Logs')) {

    /**
     * Zo2 logging system
     * @uses For debugging
     */
    class Zo2Logs {

        public static $instance;

        /**
         *
         * @var array 
         */
        private $_logs = array(
            'warning' => array(),
            'notice' => array(),
            'error' => array(),
            'message' => array()
        );

        /**
         * 
         * @return \Zo2Logs
         */
        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new Zo2Logs();
            }
            if (isset(self::$instance)) {
                return self::$instance;
            }
        }

        /**
         * 
         * @param string $title
         * @param mixed $data
         * @param string $type
         */
        public function add($title, $data, $type = 'notice') {
            $html = '<strong>' . $title . '</strong>' . ' - ' . time();
            ob_start();
            print_r($data);
            $content = ob_get_contents();
            ob_end_clean();
            $html .= '<br />' . $content;
            $this->_logs[$type][] = $html;
        }

        /**
         * 
         * @param type $debug
         */
        public function flush($debug = null) {
            if ($debug === null)
                $debug = Zo2Factory::get('debug');
            if ($debug) {
                foreach ($this->_logs as $type => $messages) {
                    foreach ($messages as $message) {
                        JFactory::getApplication()->enqueueMessage($message, $type);
                    }
                }
            }
        }

    }

}