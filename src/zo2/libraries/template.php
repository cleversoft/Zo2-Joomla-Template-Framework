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
                /* Zo2 html */
                $instances[$id]->registerNamespace('html', Zo2Framework::getZo2Path() . '/html');
                /* Joomla! template */
                $instances[$id]->registerNamespace('template', JPATH_ROOT . '/templates/' . $instances[$id]->_config->template);

                return $instances[$id];
            }
            return false;
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
            array_unshift($this->_namespaces[$namespace], (array) $path);
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
                    $filePath = $namespace . '/' . $path;
                    foreach ($this->_namespaces[$namespace] as $namespace) {

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
            if (is_array($parts) && count($parts) == 2) {
                $namespace = $parts[0];
                $path = $parts[1];
                if (isset($this->_namespaces[$namespace])) {
                    foreach ($this->_namespaces[$namespace] as $namespace) {

                        $dirPath = $namespace . '/' . $path;
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
                    $realPath = $namespace . '/' . $path;
                    foreach ($this->_namespaces[$namespace] as $namespace) {

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
        public function toDataAttributes
        () {
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
        public function fetch($tpl) {

            $tplFile = $this->getFile($tpl);
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
        public function load($tpl) {

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

        public function save() {
            
        }

    }

}