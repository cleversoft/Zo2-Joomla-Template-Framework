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
if (!class_exists('Zo2Ajax'))
{

    /**
     * Zo2 ajax class
     */
    class Zo2Ajax
    {

        /**
         * Responses data
         * @var array
         */
        protected $_responses = array();

        /**
         * 
         * @staticvar Zo2Ajax $instance
         * @return \Zo2Ajax
         */
        public static function getInstance()
        {
            static $instance;
            if (!isset($instance))
            {
                $instance = new Zo2Ajax();
            }
            return $instance;
        }

        /**
         * Add response data
         * @param mixed $data
         * @param string $key
         * @return \Zo2Ajax
         */
        public function add($data, $key = 'global')
        {
            $this->_responses[$key][] = $data;
            return $this;
        }

        /**
         * Add HTML to client side
         * @param type $html
         * @param type $target
         * @return \Zo2Ajax
         */
        public function addHtml($html, $target = '')
        {
            $data = new stdClass();
            $data->html = $html;
            $data->target = $target;
            return $this->add($data, 'html');
        }

        /**
         * Append HTML to client side
         * @param type $html
         * @param type $target
         * @return \Zo2Ajax
         */
        public function appendHtml($html, $target = '')
        {
            $data = new stdClass();
            $data->html = $html;
            $data->target = $target;
            return $this->add($data, 'appendHtml');
        }

        /**
         * Add notice message
         * @param type $message
         * @param type $type
         * @return \Zo2Ajax
         */
        public function addMessage($message, $header = '', $type = 'info')
        {
            switch ($type)
            {
                case 'error':
                case 'danger':
                case 'alert':
                    $messageType = 'error';
                    break;
                case 'warning':
                    $messageType = 'warning';
                    break;
                case 'success':
                case 'message':
                case '':
                    $messageType = 'success';
                    break;
                default:
                    $messageType = 'info';
                    break;
            }
            $template = new Zo2Html();
            $template->set('header', $header);
            $template->set('message', $message);
            $template->set('type', $messageType);
            $data = new stdClass();
            $data->message = $template->fetch('zo2/message.php');
            $this->add($data, 'message');
            return $this;
        }

        /**
         * Add execute script
         * @param string $script
         * @return \Zo2Ajax
         */
        public function addExecute($script)
        {
            return $this->add($script, 'execute');
        }

        /**
         * Do response json data
         */
        public function response()
        {
            header('Content-type: text/html; charset=utf-8');
            echo json_encode($this->_responses);
            exit();
        }

        /**
         * Response empty object and exit
         */
        public function breakResponse()
        {
            echo CrexHelperEncode::jsonEncode(array());
            exit();
        }

    }

}       