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
                $instances[$name]->_init();
            }
            return $instances[$name];
        }

        protected function _init() {
            /**
             * Zo2 paths
             */
            /* Zo2 root dir */
            $this->registerNamespace('zo2', ZO2PATH_ROOT);
            /* Zo2 html */
            $this->registerNamespace('html', ZO2PATH_ROOT . '/html');
            /* Zo2 assets */
            $this->registerNamespace('assets', ZO2PATH_ROOT . '/assets');
            /**
             * Joomla! paths
             */
            /* Zo2 profile dir */
            $this->registerNamespace('cache', JPATH_ROOT . '/cache');

            $templateName = Zo2Factory::getTemplateName();
            /**
             * Zo2 template
             */
            $this->registerNamespace('assets', JPATH_ROOT . '/templates/' . $templateName . '/assets');
            /* Current */
            $this->registerNamespace('templates', JPATH_ROOT . '/templates/' . $templateName);
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
         * Get file path registered by namespace & path
         * @param type $key
         * @return string|boolean
         */
        public function getFile($key, $showError = false) {
            /* Extract key to get namespace and path */
            $parts = explode('://', $key);
            if (is_array($parts) && count($parts) == 2) {
                $namespace = $parts[0];
                $path = $parts[1];
                /* Make sure this namespace is registered */
                if (isset($this->_namespaces[$namespace])) {
                    /* Find first exists filePath */
                    foreach ($this->_namespaces[$namespace] as $namespace) {
                        $filePath = $namespace . '/' . $path;
                        if (JFile::exists($filePath)) {
                            return str_replace('/', DIRECTORY_SEPARATOR, $filePath);
                        }
                    }
                }
            }
            if ($showError)
                JFactory::getApplication()->enqueueMessage('File not found: ' . $key, 'error');
            return false;
        }

        /**
         *
         * @param type $key
         * @return string|boolean
         */
        public function getDir($key, $showError = false) {
            $parts = explode('://', $key);
            if (is_array($parts) && count($parts) >= 2) {
                $namespace = $parts[0];
                if (isset($parts[1]))
                    $path = $parts[1];
                if (isset($this->_namespaces[$namespace])) {
                    foreach ($this->_namespaces[$namespace] as $namespace) {
                        if (isset($path))
                            $dirPath = $namespace . '/' . $path;
                        else
                            $dirPath = $namespace;
                        if (JFolder::exists($dirPath)) {
                            return str_replace('/', DIRECTORY_SEPARATOR, $dirPath);
                        }
                    }
                }
            }
            if ($showError)
                JFactory::getApplication()->enqueueMessage('Directory not found: ' . $key, 'error');

            return false;
        }

        /**
         * Get physical path ( folder or file )
         * @param type $key
         * @param type $showError
         * @return boolean|string
         */
        public function getPath($key, $showError = false) {
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
            if ($showError)
                JFactory::getApplication()->enqueueMessage('Path not found: ' . $key, 'error');
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

        public function getConfigFile($key, $assoc = false) {
            $configFile = $this->getFile($key);
            if ($configFile) {
                $buffer = JFile::read($configFile);
                return json_decode($buffer, $assoc);
            }
            return null;
        }

    }

}