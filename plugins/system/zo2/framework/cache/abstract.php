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
if (!class_exists('Zo2CacheAbstract'))
{

    /**
     * Cache base abstract class
     */
    abstract class Zo2CacheAbstract extends JObject
    {

        /**
         * Responses data
         * @var array
         */
        protected $_responses = array();

        public function __construct($properties = null)
        {
            parent::__construct($properties);
            $config = JFactory::getConfig();
            $user = JFactory::getUser();
            $this->def('hash', md5($config->get('secret') . (int) $user->guest));
            $this->def('language', 'en-GB');
            $this->def('now', time());
        }

        /**
         * 
         * @staticvar Zo2Cache $instance
         * @return \Zo2Cache
         */
        public static function getInstance()
        {
            static $instance;
            if (!isset($instance))
            {
                $instance = new Zo2Cache();
            }
            return $instance;
        }

        protected function _getCacheId($id)
        {

            $name = md5($id . serialize($this->get('hash') . $this->get('language')));
            return 'zo2-cache-' . $name;
        }

        abstract public function getCached($id);

        abstract public function store($id, $data);

        abstract protected function _getCached($id);

        abstract protected function _isExpired($id);
    }

}       
