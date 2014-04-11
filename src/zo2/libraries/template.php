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
if (!class_exists('Zo2Template')) {

    /**
     *
     */
    class Zo2Template extends JObject {

        /**
         * Template object
         * @var stdClass
         */
        protected $_config = null;

        /**
         *
         * @var array
         */
        protected $_namespaces = array();

        /**
         * Construction
         * @param type $properties
         */
        public function __construct($properties = null) {
            parent::__construct($properties);

            $this->set('jinput', JFactory::getApplication()->input);
        }

        /**
         *
         * @staticvar Zo2Template $instances
         * @param type $id
         * @return boolean|\Zo2Template
         */
        public static function &getInstance($id = null) {
            static $instances;

            /* Get specific template id */
            if ($id !== null) {
                if (isset($instances[$id])) {
                    return $instances[$id];
                }

                $query = ' SELECT * FROM ' . $db->quoteName('#__template_styles') .
                    ' WHERE ' . $db->quoteName('id') . ' = ' . (int) $id;
                $db->setQuery($query);
                $template = $db->loadObject();
                if ($template) {
                    $template->params = new JRegistry($template->params);
                }
            } else {
                /* Get current template */
                if (JFactory::getApplication()->isSite()) {
                    $template = JFactory::getApplication()->getTemplate(true);
                    $id = $template->id;
                } else {
                    /* Get requesting template */
                    $id = JFactory::getApplication()->input->get('id');
                    if ($id) {
                        $db = JFactory::getDBO();
                        $query = ' SELECT * FROM ' . $db->quoteName('#__template_styles') .
                            ' WHERE ' . $db->quoteName('id') . ' = ' . (int) $id;
                        $db->setQuery($query);
                        $template = $db->loadObject();
                        if ($template) {
                            $template->params = new JRegistry($template->params);
                        }
                    }
                }
            }
            if ($id !== null && isset($template)) {
                $instances[$id] = new Zo2Template();
                $instances[$id]->_config = $template;
                /* Zo2 root dir */
                $instances[$id]->registerNamespace('zo2', Zo2Framework::getZo2Path());
                /* Zo2 profile dir */
                $instances[$id]->registerNamespace('profile', Zo2Framework::getZo2Path() . '/profiles');
                /* Zo2 profile dir */
                $instances[$id]->registerNamespace('cache', JPATH_ROOT . '/cache');
                /* Zo2 html */
                $instances[$id]->registerNamespace('html', Zo2Framework::getZo2Path() . '/html');
                /* Joomla! template */
                $instances[$id]->registerNamespace('template', JPATH_ROOT . '/templates/' . $instances[$id]->_config->template);
            }
            return $instances[$id];
        }

        /**
         *
         * @return stdClass
         */
        public function getConfig() {
            return $this->_config;
        }

        /**
         * Register namespace and path
         * @param type $namespace
         * @param type $path
         * @return \Zo2Template
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
        public function getFile($key) {
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
            return false;
        }

        /**
         *
         * @param type $key
         * @return string|boolean
         */
        public function getDir($key) {
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
                            return Zo2HelperPath::toUrl($realPath);
                        } elseif (JFolder::exists($realPath)) {
                            return Zo2HelperPath::toUrl($realPath);
                        }
                    }
                }
            }
            return false;
        }

        /**
         *
         * @return string
         */
        public function toDataAttributes() {
            $properties = $this->getProperties();
            $html = '';
            foreach ($properties as $key => $value) {

                $html .= 'data-' . $key . '="' . $value . '" ';
            }
            return trim($html);
        }

        /**
         *
         * @param type $tpl
         * @return type
         */
        public function fetch($key) {
            $tplFile = $this->getFile($key);
            if ($tplFile) {
                $properties = $this->getProperties();
                ob_start();
                extract($properties, EXTR_REFS);
                include($tplFile);
                $content = ob_get_contents();
                ob_end_clean();
                return $content;
            }
        }

        /**
         *
         * @param type $tpl
         * @return \CsTemplate
         */
        public function load($key) {

            $tplFile = $this->getFile($tpl);
            if (JFile::exists($tplFile)) {
                $properties = $this->getProperties();
                extract($properties, EXTR_REFS);
                include($tplFile);
            }
            return $this;
        }

        public function addScript($key) {
            $url = $this->getUrl($key);
            if ($url) {
                $document = JFactory::getDocument();
                $document->addScript($url);
            }
            return $this;
        }

        public function addStyleSheet($scriptFile) {
            $url = $this->getUrl($key);
            if ($url) {
                $document = JFactory::getDocument();
                $document->addStyleSheet($url);
            }
            return $this;
        }

        public function saveProfile($profileName = null, $data) {
            if ($profileName === null) {
                $profileName = $this->getConfig()->template;
            }
            $profileName = md5($this->getConfig()->id . '_' . $profileName);
            $profileDir = $this->getDir('profile://');
            if (JFolder::exists($profileDir)) {
                JFile::write($profileDir . '/' . $profileName, json_encode($data));
            }
            return $this;
        }

        public function loadProfile($profileName = null) {
            if ($profileName === null) {
                $profileName = $this->getConfig()->template;
            }
            $profileName = md5($this->getConfig()->id . '_' . $profileName);
            $profileFile = $this->getFile('profile://' . $profileName);
            if ($profileFile) {
                $buffer = JFile::read($profileFile);
                if ($buffer) {
                    return json_decode($buffer);
                }
            }
            return false;
        }

        public function getParams() {
            $template = JFactory::getApplication()->getTemplate(true);
            return $template->params;
        }

        /**
         *
         * @param type $cacheFile
         * @param type $data
         * @return \Zo2Template
         */
        public function saveCache($cacheFile, $data) {
            $cacheFilename = md5($cacheFile);
            $cacheDir = $this->getDir('cache://');
            if (JFolder::exists($cacheDir)) {
                JFile::write($cacheDir . '/' . $cacheFilename, $data);
            }
            return $this;
        }

        /**
         *
         * @param type $cacheFile
         * @return boolean
         */
        public function loadCache($cacheFile) {
            $cacheFile = $this->getFile('cache://' . md5($cacheFile));
            if ($cacheFile) {
                $buffer = JFile::read($cacheFile);
                return $buffer;
            }
            return false;
        }

        /**
         * Save template
         */
        public function save() {

        }

    }

}