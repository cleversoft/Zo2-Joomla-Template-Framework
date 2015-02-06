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
if (!class_exists('Zo2Template'))
{

    /**
     *
     */
    class Zo2Template extends JObject
    {

        /**
         *
         * @var object 
         */
        public $_template = null;

        /**
         *
         * @var Zo2Path 
         */
        public $path = null;

        /**
         * Construction
         * @param type $properties
         */
        public function __construct($properties = null)
        {
            parent::__construct($properties);
            $this->path = Zo2Path::getInstance();
        }

        /**
         *
         * @return string
         */
        public function toDataAttributes()
        {
            $properties = $this->getProperties();
            $html = '';
            foreach ($properties as $key => $value)
            {

                $html .= 'data-' . $key . '="' . $value . '" ';
            }
            return trim($html);
        }

        /**
         *
         * @param type $tpl
         * @return type
         */
        public function fetch($key)
        {
            $tplFile = $this->path->getPath($key);
            if ($tplFile)
            {
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
        public function load($key)
        {
            $tplFile = $this->path->getPath($key);
            if (JFile::exists($tplFile))
            {
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
        public function addScript($key)
        {
            $url = $this->path->getUrl($key);
            if ($url)
            {
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
        public function addStyleSheet($scriptFile)
        {
            $url = $this->path->getUrl($key);
            if ($url)
            {
                $document = JFactory::getDocument();
                $document->addStyleSheet($url);
            }
            return $this;
        }

        /**
         * 
         * @return JRegistry
         */
        public function getTemplateParameters()
        {
            return $this->_config->params;
        }

        /**
         *
         * @param type $cacheFile
         * @param type $data
         * @return \Zo2Template
         */
        public function saveCache($cacheFile, $data)
        {
            $cacheFilename = md5($cacheFile);
            $cacheDir = $this->path->getDir('cache://');
            if (JFolder::exists($cacheDir))
            {
                JFile::write($cacheDir . '/' . $cacheFilename, $data);
            }
            return $this;
        }

        /**
         *
         * @param type $cacheFile
         * @return boolean
         */
        public function loadCache($cacheFile)
        {
            /**
             * @todo Check modified time with current time to force reload cache
             */
            $cacheFile = $this->path->getFile('cache://' . md5($cacheFile));
            if ($cacheFile)
            {
                $buffer = JFile::read($cacheFile);
                return $buffer;
            }
            return false;
        }

        /**
         * Save template
         */
        public function save()
        {
            
        }

        public function getLanguage()
        {
            return JFactory::getDocument()->getLanguage();
        }

        public function getDirection()
        {
            return JFactory::getDocument()->getDirection();
        }

        public function getUtilities()
        {
            
        }

    }

}