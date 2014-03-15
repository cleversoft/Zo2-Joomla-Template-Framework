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
if (!class_exists('Zo2Ajax')) {

    /**
     * Zo2 ajax class
     */
    class Zo2Ajax {

        /**
         * Registered class & func allow to use in ajax
         * @var array 
         */
        protected $_registeredClass = array();

        /**
         * Responses data
         * @var array
         */
        protected $_responses = array();

        /**
         * 
         */
        public function __construct() {
            
        }

        /**
         * Get singleton instance
         * @staticvar self $instance
         * @return \self
         */
        public static function getInstance() {
            static $instance;
            if (!isset($instance)) {
                $instance = new self();
            }
            return $instance;
        }

        /**
         * Do process ajax request
         */
        public function process() {
            $jinput = JFactory::getApplication()->input;
            /* Is ajax request */
            if ($jinput->get('zo2Ajax')) {
                $func = $jinput->get('func');
                /* Do process ajax request */
                if ($func) {
                    if (strpos($func, '.') !== false)
                        $parts = explode('.', $func);
                    else
                        $parts = explode(',', $func);
                    $className = 'Zo2' . ucfirst($parts[0]);
                    /* Make sure this class is registered before */
                    if (isset($this->_registeredClass[$className])) {
                        /* And also this function is registered before */
                        if (isset($this->_registeredClass[$className][$parts[1]])) {
                            /**
                             * Do declare class
                             * @todo Should we allow custom path use for class include
                             */
                            /* This class allow singleton */
                            if (method_exists($parts[0], 'getInstance')) {
                                $class = call_user_func(array($className, 'getInstance'));
                            } else {
                                /* Declare new class instance */
                                $class = new $className;
                            }
                            /* Call method to execute */
                            if (method_exists($class, $parts[1])) {
                                //$args = $jinput->get('args');                                
                                $response = call_user_func_array(array($class, $parts[1]), array());
                                self::addResponse($response);
                            } else {
                                
                            }
                        }
                    }
                }
                /**
                 * Do response by json format
                 * Javascript will do json_decode and process it
                 */
                $this->response();
            }
        }

        /**
         * @todo Should we add some alias methods for some cases of responses ?
         * @param mixed $data
         */
        public function addResponse($data) {
            if (is_object($data)) {
                $vars = get_object_vars($object);
            } else {
                if (is_array($data)) {
                    $vars = $data;
                }
            }
            if (isset($vars))
                $this->_responses[] = $vars;
        }

        public function addMessage($message, $type) {
            $data = array(
                'func' => 'zo2.document.message',
                'args' => array('message' => $message, 'type' => $type)
            );
            self::addResponse($data);
        }

        /**
         * Do response json data
         */
        public function response() {
            header('Content-type: text/html; charset=utf-8');
            echo json_encode($this->_responses);
            exit();
        }

        /**
         * Do register class & func that will use for ajax
         * @param type $class
         * @param type $func
         */
        public function register($class, $func) {
            $this->_registeredClass[$class][$func] = 1;
        }

    }

}