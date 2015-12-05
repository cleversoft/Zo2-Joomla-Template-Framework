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
if (!class_exists('Zo2Logs'))
{

    /**
     * Zo2 logging system
     * @uses For debugging
     */
    class Zo2Logs
    {

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
        public static function getInstance()
        {
            if (!isset(self::$instance))
            {
                self::$instance = new Zo2Logs();
            }
            if (isset(self::$instance))
            {
                return self::$instance;
            }
        }

        /**
         * 
         * @param string $title
         * @param mixed $data
         * @param string $type
         */
        public function add($title, $data, $type = 'notice')
        {
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
        public function flush($debug = null)
        {
            if ($debug === null)
                $debug = Zo2Framework::getParam('development_mode');
            if ($debug)
            {
                foreach ($this->_logs as $type => $messages)
                {
                    foreach ($messages as $message)
                    {
                        JFactory::getApplication()->enqueueMessage($message, $type);
                    }
                }
            }
        }

    }

}