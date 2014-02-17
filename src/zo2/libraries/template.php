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

        protected $_dirs = array();

        public function __construct($properties = null) {
            parent::__construct($properties);
            $this->registerDir(Zo2Framework::getZo2Path());
            $this->registerDir(Zo2Framework::getTemplatePath());
            $this->set('jinput', JFactory::getApplication()->input);
        }

        /**
         * 
         * @param string $path
         * @return boolean
         */
        public function registerDir($path) {
            if (JFolder::exists($path))
                return array_unshift($this->_dirs, $path);
            return false;
        }

        /**
         * 
         * @param type $file
         * @param type $type
         * @return boolean
         */
        public function getFile($file, $type = null) {
            foreach ($this->_dirs as $dir) {
                if (JFile::exists($dir . '/' . $file)) {
                    if ($type == 'url')
                        return Zo2HelperPath::toUrl($dir . '/' . $file);
                    else
                        return $dir . '/' . $file;
                }
            }
            return false;
        }

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
        public function fetch($tpl) {
            $tplFile = $this->getFile($tpl);
            if ($tplFile) {
                $properties = $this->getProperties();
                ob_start();
                extract($properties, EXTR_REFS);
                include ($tplFile);
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
                include ($tplFile);
            }
            return $this;
        }

        public function addScript($scriptFile) {
            $document = JFactory::getDocument();
            $document->addScript($this->getFile($scriptFile, 'url'));
        }

        public function addStyleSheet($scriptFile) {
            $document = JFactory::getDocument();
            $document->addStyleSheet($this->getFile($scriptFile, 'url'));
        }

    }

}