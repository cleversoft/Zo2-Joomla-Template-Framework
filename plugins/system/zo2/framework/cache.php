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
if (!class_exists('Zo2Cache'))
{

    /**
     * Caching class
     * Provide method to work with universal cache storage
     */
    class Zo2Cache
    {

        protected $_storage;
        protected $_options = array();

        /**
         * 
         * @param type $options
         */
        protected function __construct($options = array())
        {
            $conf = JFactory::getConfig();
            $_default = array(
                'cachebase' => $conf->get('cache_path', JPATH_CACHE),
                'lifetime' => (int) $conf->get('cachetime'),
                'language' => $conf->get('language', 'en-GB'),
                'storage' => $conf->get('cache_handler', ''),
                'defaultgroup' => 'default',
                'locking' => true,
                'locktime' => 15,
                'checkTime' => true,
                'caching' => ($conf->get('caching') >= 1) ? true : false
            );
            $this->_options = array_merge($_default, $options);
            // No storage provided
            if (empty($this->_options['storage']))
            {
                $this->_options['caching'] = false;
            } else
            {
                // Create storage
                $className = 'Zo2Cache' . ucfirst($this->_options['storage']);
                $this->_storage = new $className($this->_options);
            }
        }

        /**
         * Get cache instance
         * @staticvar Zo2Cache $instances
         * @param type $storage
         * @param type $options
         * @return \Zo2Cache
         */
        public static function getInstance($options = array())
        {
            static $instances;

            $id = md5(serialize($options));
            if (!isset($instances[$id]))
            {
                $instances[$id] = new Zo2Cache($options);
            }
            return $instances[$id];
        }

        /**
         * 
         * @return type
         */
        protected function &_getStorage()
        {
            return $this->_storage;
        }

        /**
         * Magic method to call cache storage methods
         * @param type $name
         * @param type $arguments
         * @return type
         */
        public function __call($name, $arguments)
        {
            if (method_exists($this->_storage, $name))
            {
                return call_user_func_array(array($this->_storage, $name), $arguments);
            }
        }

        /**
         * Shortcode method to get cache and store it if needed
         * @param type $id
         * @param type $callback
         * @return type
         */
        public function get($id, $callback)
        {
            // Cache is enabled
            if ($this->_options['caching'])
            {
                // Get cached data
                $cached = $this->getCached($id);
                // There is no cached yet
                if ($cached === false)
                {
                    // Call callback to get data
                    $cached = call_user_func($callback);
                    $this->store($id, $cached);
                }
                return $cached;
            } else
            {
                // Cache is disabled than just call callback to get data
                $data = call_user_func($callback);
                return $data;
            }
        }

    }

}       
