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
if (!class_exists('Zo2Path')) {

    /**
     *
     */
    class Zo2Path extends JObject {

        /**
         *
         * @var array
         */
        protected $_namespaces = array();

        /**
         * 
         * @staticvar Zo2Template $instances
         * @param type $name default is common
         * @return \Zo2Template
         */
        public static function &getInstance($name = 'zo2') {
            static $instances;
            if (!isset($instances[$name])) {
                $instances[$name] = new Zo2Path();
            }
            return $instances[$name];
        }

        /**
         * Register namespace and path
         * @param type $namespace
         * @param type $path
         * @return \Zo2Path
         */
        public function registerNamespace($namespace, $path) {
            if (!isset($this->_namespaces[$namespace])) {
                $this->_namespaces[$namespace] = array();
            }
            array_unshift($this->_namespaces[$namespace], $path);
            return $this;
        }

        /**
         * Get physical path ( folder or file )
         * @param type $key
         * @param type $showError
         * @return boolean|string
         */
        public function getPath($key) {
            /* Extract key to get namespace and path */            
            $parts = explode('://', $key);
            if (is_array($parts) && count($parts) == 2) {
                $namespace = $parts[0];
                $path = $parts[1];
                /* Make sure this namespace is registered */
                if (isset($this->_namespaces[$namespace])) {
                    /* Find first exists filePath */
                    foreach ($this->_namespaces[$namespace] as $namespace) {
                        $physicalPath = $namespace . '/' . $path;
                        if (JFile::exists($physicalPath)) {
                            return str_replace('/', DIRECTORY_SEPARATOR, $physicalPath);
                        } elseif (JFolder::exists($physicalPath)) {
                            return str_replace('/', DIRECTORY_SEPARATOR, $physicalPath);
                        }
                    }
                }
            }
            return false;
        }

        /**
         *
         * @param type $key
         * @return string|boolean
         */
        public function getUrl($key) {
            /* Extract key to get namespace and path */
            $parts = explode('://', $key);
            if (is_array($parts) && count($parts) == 2) {
                $namespace = $parts[0];
                $path = $parts[1];
                /* Make sure this namespace is registered */
                if (isset($this->_namespaces[$namespace])) {
                    /* Find first exists filePath */
                    foreach ($this->_namespaces[$namespace] as $namespace) {
                        $realPath = $namespace . '/' . $path;
                        if (JFile::exists($realPath)) {
                            return $this->toUrl($realPath);
                        } elseif (JFolder::exists($realPath)) {
                            return $this->toUrl($realPath);
                        }
                    }
                }
            }
            return false;
        }

        /**
         * A simple wrapped to convert physicalPath to offset/url/path
         * We need this to remove further conflict
         * @param string $physicalPath
         * @param string $pathType
         * @return string
         */
        public function pathConvert($physicalPath, $pathType = null) {
            //Offset path
            if ($pathType === null) {
                return str_replace(JPATH_ROOT . '/', '', $physicalPath);
            } elseif ($pathType === 'url') {
                return $this->toUrl($physicalPath);
            } else {
                return $physicalPath;
            }
        }

        /**
         * A simple wrapped to convert key to offset/url/path
         * @param string $key
         * @param string $pathType
         * @return string
         */
        public function keyConvert($key, $pathType = null) {
            return $this->pathConvert($this->getPath($key), $pathType);
        }

        /**
         * Convert physical path to URL
         * @param string $path
         * @return string
         */
        public function toUrl($path) {
            /* Fix / is missing in url */
            $path = (substr($path, 0, 1) == '/') ? $path : '/' . $path;
            return str_replace('\\', '/', rtrim(JUri::root(), '/') . str_replace(JPATH_ROOT, '', $path));
        }

    }

}