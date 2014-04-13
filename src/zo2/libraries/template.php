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
            /* Singleton instances of Zo2Template */
            static $instances;

            /* Get specific template id */
            if ($id !== null) {
                if (isset($instances[$id])) {
                    return $instances[$id];
                }
                /* Get request template record */
                $template = self::getTemplate($id);
            } else {

                /* Get current template */
                if (JFactory::getApplication()->isSite()) {
                    /**
                     * Somehow we can't use getActiveMenu here
                     * @todo Need to improve process
                     */
                    $itemId = JFactory::getApplication()->input->get('Itemid');
                    $db = JFactory::getDbo();
                    $query = ' SELECT ' . $db->quoteName('template_style_id');
                    $query .= ' FROM ' . $db->quoteName('#__menu');
                    $query .= ' WHERE ' . $db->quoteName('id') . ' = ' . (int) $itemId;
                    $db->setQuery($query);
                    $templateSiteId = $db->loadResult();
                    if ($templateSiteId && $templateSiteId != 0) {
                        /* Get request template record */
                        $id = $templateSiteId;
                        $template = self::getTemplate($templateSiteId);
                    } else {
                        $template = JFactory::getApplication()->getTemplate(true);
                        $id = $template->id;
                    }
                } else {
                    /* Get requesting template */
                    $id = JFactory::getApplication()->input->get('id');
                    if ($id) {
                        /* Get request template record */
                        $template = self::getTemplate($id);
                    }
                }
            }
            if ($id !== null && isset($template)) {
                $instances[$id] = new Zo2Template();
                $instances[$id]->_config = $template;

                /**
                 * Register Zo2 namespaces
                 */
                /* Zo2 root dir */
                $instances[$id]->registerNamespace('zo2', Zo2Framework::getZo2Path());
                /* Zo2 html */
                $instances[$id]->registerNamespace('html', Zo2Framework::getZo2Path() . '/html');
                /* Zo2 assets */
                $instances[$id]->registerNamespace('assets', Zo2Framework::getZo2Path() . '/assets');
                /* Zo2 profile dir */
                $instances[$id]->registerNamespace('cache', JPATH_ROOT . '/cache');
                /* Zo2 profile dir */
                $instances[$id]->registerNamespace('assets', JPATH_ROOT . '/cache');

                /* Joomla! template */
                $instances[$id]->registerNamespace('template', JPATH_ROOT . '/templates/' . $instances[$id]->_config->template);
                /* Template assets */
                $instances[$id]->registerNamespace('assets', JPATH_ROOT . '/templates/' . $instances[$id]->_config->template . '/assets');
            }
            return $instances[$id];
        }

        /**
         * Get template from database
         * @param type $id
         * @return stdClass
         */
        public static function getTemplate($id) {
            $db = JFactory::getDBO();
            $query = ' SELECT * FROM ' . $db->quoteName('#__template_styles') .
                    ' WHERE ' . $db->quoteName('id') . ' = ' . (int) $id;
            $db->setQuery($query);
            $template = $db->loadObject();
            if ($template) {
                $template->params = new JRegistry($template->params);
            }
            return $template;
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

        /**
         * 
         * @param type $key
         * @return \Zo2Template
         */
        public function addScript($key) {
            $url = $this->getUrl($key);
            if ($url) {
                $document = JFactory::getDocument();
                $document->addScript($url);
            }
            return $this;
        }

        /**
         * 
         * @param type $scriptFile
         * @return \Zo2Template
         */
        public function addStyleSheet($scriptFile) {
            $url = $this->getUrl($key);
            if ($url) {
                $document = JFactory::getDocument();
                $document->addStyleSheet($url);
            }
            return $this;
        }

        /**
         * 
         * @return JRegistry
         */
        public function getTemplateParameters() {
            return $this->_config->params;
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
            /**
             * @todo Check modified time with current time to force reload cache
             */
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

        public function getLanguage() {
            return JFactory::getDocument()->getLanguage();
        }

        public function getDirection() {
            return JFactory::getDocument()->getDirection();
        }

        public function getUtilities() {
            
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