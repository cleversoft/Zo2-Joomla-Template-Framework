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
if (!class_exists('Zo2Path'))
{


    /**
     * Used to managed files & folders path by namespaces with override supported
     */
    class Zo2Path
    {

        /**
         * Array of registered namespaces
         * @var array
         */
        protected $_namespaces = array();

        /**
         * 
         * @staticvar Zo2Path $instances
         * @param string $name
         * @return \Zo2Path
         */
        public static function &getInstance($name = 'zo2')
        {
            static $instances;
            if (!isset($instances[$name]))
            {
                $instances[$name] = new Zo2Path();
            }
            return $instances[$name];
        }

        /**
         * Split classname
         * @param string $className
         * @return array
         */
        public function splitClassname($className)
        {
            return preg_split('/(?=[A-Z])/', $className, -1, PREG_SPLIT_NO_EMPTY);
        }

        /**
         * 
         * @param string $namespace
         * @param string $path
         * @return \Zo2Path
         */
        public function registerNamespace($namespace, $path)
        {
            if (!isset($this->_namespaces[$namespace]))
            {
                $this->_namespaces[$namespace] = array();
            }
            array_unshift($this->_namespaces[$namespace], $path);
            return $this;
        }

        /**
         * 
         * @param string $namespace
         * @return array
         */
        public function getNamespace($namespace)
        {
            if (isset($this->_namespaces[$namespace]))
            {
                return $this->_namespaces[$namespace];
            } else
            {
                return array();
            }
        }

        /**
         * 
         * @param string $namespace
         * @param string $path
         * @return boolean|string
         */
        protected function _getPath($namespace, $path)
        {
            /* Make sure this namespace is registered */
            if (isset($this->_namespaces[$namespace]))
            {
                /* Find first exists filePath */
                foreach ($this->_namespaces[$namespace] as $namespace)
                {
                    $physicalPath = $namespace . DIRECTORY_SEPARATOR . $path;
                    if (JFile::exists($physicalPath))
                    {
                        return rtrim(str_replace('/', DIRECTORY_SEPARATOR, $physicalPath), DIRECTORY_SEPARATOR);
                    } elseif (JFolder::exists($physicalPath))
                    {
                        return rtrim(str_replace('/', DIRECTORY_SEPARATOR, $physicalPath), DIRECTORY_SEPARATOR);
                    }
                }
            }
        }

        /**
         * 
         * @param string $className
         * @return string|boolean
         */
        public function getPathByClassname($className)
        {
            $array = $this->splitClassname($className);
            if (count($array) > 1)
            {
                $prefix = array_shift($array);
                return $this->_getPath($prefix, strtolower(implode(DIRECTORY_SEPARATOR, $array) . '.php'));
            }
            return false;
        }

        /**
         * Get physical path by key
         * @param string $key
         * @return string|boolean
         */
        public function getPath($key)
        {
            /* Extract key to get namespace and path */
            $parts = explode('://', $key);
            if (is_array($parts) && count($parts) == 2)
            {
                $namespace = $parts[0];
                $path = $parts[1];
                return $this->_getPath($namespace, $path);
            }
            return false;
        }

        /**
         * Get URL path by key
         * @param string $key
         * @return string|boolean
         */
        public function getUrl($key)
        {
            /* Extract key to get namespace and path */
            $parts = explode('://', $key);
            if (is_array($parts) && count($parts) == 2)
            {
                $namespace = $parts[0];
                $path = $parts[1];
                $filePath = $this->_getPath($namespace, $path);
                if ($filePath)
                {
                    return $this->toUrl($filePath);
                }
            }
            return false;
        }

        /**
         * Convert physical path to URL
         * @param string $path
         * @return string
         */
        public function toUrl($path, $pathOnly = false)
        {
            $relative = str_replace(JPATH_ROOT, '', $path);
            $relative = trim(JPath::clean($relative, '/'), '/');
            if ($pathOnly)
            {
                return rtrim(JUri::root(true), '/') . '/' . $relative;
            } else
            {
                return rtrim(JUri::root(), '/') . '/' . $relative;
            }
        }

    }

}