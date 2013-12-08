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
defined('_JEXEC') or die;

jimport('joomla.filesystem.folder');

/**
 * Class exists checking
 */
if (!class_exists('Zo2Document')) {

    /**
     * Zo2 Document class
     * @uses This class used to wrapper JDocument with adding features like addLess & do compress before render
     */
    class Zo2Document {

        /**
         * Zo2Document instance
         * @var \Zo2Document
         */
        public static $instance;

        /**
         * Array of added javascripts
         * @var array 
         */
        private $_scripts = array();

        /**
         * Array of added stylesheets or less
         * @var array 
         */
        private $_styleSheets = array();

        /**
         * JDocument instance
         * @var object
         */
        private $_document;

        /**
         * Construct method
         * Do not allow call from outside. Use ::getInstance to get singleton
         */
        protected function __construct() {
            $this->_document = JFactory::getDocument();
        }

        /**
         * Get singleton instance of class
         * @return \Zo2Document
         */
        public static function getInstance() {
            if (empty(self::$instance)) {
                self::$instance = new Zo2Document();
            }

            if (isset(self::$instance))
                return self::$instance;
        }

        /**
         * Wrap magic call to JDocument
         * @param type $name
         * @param type $arguments
         * @return null
         */
        public function __call($name, $arguments) {
            if (method_exists($this->_document, $name)) {
                return call_user_func_array(array($this->_document, $name), $arguments);
            }
            return null;
        }

        /**
         * Relative path
         * @param str $path
         * @return bool
         */
        private static function _isRelativePath($path) {
            return (substr($path, 0, 1) == '/' || substr($path, 1, 1) == ':' || strtolower(substr($path, 0, 7)) == 'http://' || strtolower(substr($path, 0, 8)) == 'https://' ) ? false : true;
        }

        /**
         * Add javascript file
         * @param type $url
         * @param type $type
         * @param type $defer
         * @param type $async
         * @return \Zo2Document
         */
        public function addScript($url, $type = "text/javascript", $defer = false, $async = false) {

            if (self::_isRelativePath($url)) {
                $this->_scripts[$url]['mime'] = $type;
                $this->_scripts[$url]['defer'] = $defer;
                $this->_scripts[$url]['async'] = $async;
            } else {
                /* For external path then we pass it to JDocument */
                $this->_document->addScript($url, $type, $defer, $async);
            }
            return $this;
        }

        /**
         * Add css file
         * @param type $url
         * @param type $type
         * @param type $media
         * @param type $attribs
         * @return \Zo2Document
         */
        public function addStyleSheet($url, $type = "text/css", $media = null, $attribs = array()) {
            if (self::_isRelativePath($url)) {
                $this->_styleSheets[$url]['mime'] = $type;
                $this->_styleSheets[$url]['media'] = $media;
                $this->_styleSheets[$url]['attribs'] = $attribs;
            } else {
                /* For external path then we pass it to JDocument */
                $this->_document->addStyleSheet($url, $type, $media, $attribs);
            }
            return $this;
        }

        /**
         * Add less file
         * @param type $url
         * @return \Zo2Document
         */
        public function addLess($url) {
            if (self::_isRelativePath($url)) {
                $this->_styleSheets[$url]['mime'] = 'less';
            } else {
                /* Woh ! Now we don't support load less from external */
            }
            return $this;
        }

        /**
         * Do remove scripts in JDocument
         * @param type $urls
         */
        public function scriptRemove($urls) {
            if (!is_array($urls)) {
                if (isset($this->_documents->_scripts[$urls]))
                    unset($this->_documents->_scripts[$urls]);
            } else {
                foreach ($urls as $url) {
                    if (isset($documents->_scripts[$url]))
                        unset($documents->_scripts[$url]);
                }
            }
        }

        /**
         * Flush all script into document
         */
        public function load() {
            /* One time locker */
            static $locker = false;
            if ($locker === true)
                return;

            $locker = true;

            $javascriptFiles = array();
            /* Javascript process */
            foreach ($this->_scripts as $script => $data) {
                if (isset($data['mime'])) {
                    switch ($data['mime']) {
                        case 'text/javascript':
                            $pathInfo = pathinfo($script);
                            /* Generate physical full path for input script file */
                            $inputFile = JPATH_ROOT . '/' . $script;
                            /* Generate physical full path for output file */
                            $outputFile = JPATH_ROOT . '/' . ZO2RTP_ASSETS_ZO2 . '/js/' . $pathInfo['filename'] . '.min.js';
                            /* Do compress. By default compress mode is enabled */
                            if (Zo2Framework::get('compress_javascript', 1)) {
                                Zo2HelperCompiler::javascript($inputFile, $outputFile);
                                /* Replace original script file by compressed file */
                                $script = ZO2RTP_ASSETS_ZO2 . '/js/' . $pathInfo['filename'] . '.min.js';
                            }
                            $javascriptFiles[] = $script;
                            break;
                        default:
                            /* For now we have nothing to do with another mime */
                            break;
                    }
                }
            }

            /* Stylesheet process */
            $styleSheetFiles = array();
            foreach ($this->_styleSheets as $script => $data) {
                if (isset($data['mime'])) {
                    switch ($data['mime']) {
                        case 'text/css':
                            $pathInfo = pathinfo($script);
                            /* Generate physical full path for input script file */
                            $inputFile = JPATH_ROOT . '/' . $script;
                            /* Generate physical full path for output file */
                            $outputFile = JPATH_ROOT . '/' . ZO2RTP_ASSETS_ZO2 . '/css/' . $pathInfo['filename'] . '.min.css';
                            /* Do compress. By default compress mode is enabled */
                            if (Zo2Framework::get('compress_css', 1)) {
                                Zo2HelperCompiler::styleSheet($inputFile, $outputFile);
                                /* Replace original script file by compressed file */
                                $script = ZO2RTP_ASSETS_ZO2 . '/css/' . $pathInfo['filename'] . '.min.css';
                            }
                            $styleSheetFiles[] = $script;
                            break;
                        case 'less':
                            /* For less files we must do compile first */
                            $pathInfo = pathinfo($script);
                            /* Generate physical full path for input script file */
                            $inputFile = JPATH_ROOT . '/' . $script;
                            /* Generate physical full path for output file */
                            $outputFile = JPATH_ROOT . '/' . ZO2RTP_ASSETS_ZO2 . '/css/' . $pathInfo['filename'] . '.min.css';

                            /* We don't do check bool return here because if less do not compile because file diff checking */
                            Zo2HelperCompiler::less($script, $outputFile);
                            /* For less file we do compress while compile */
                            $styleSheetFiles[] = ZO2RTP_ASSETS_ZO2 . '/css/' . $pathInfo['filename'] . '.min.css';
                            break;
                        default:
                            /* For now we have nothing to do with another mime */
                            break;
                    }
                }
            }

            $document = JFactory::getDocument();
            /* Do merge all javascript file
             * js.php. In this file we'll use JFile::read to load all javascipt file and also do gzip if possible */
            if (Zo2Framework::get('merge_javascript')) {
                /* Do base64 encode */
                $files = array();
                foreach ($javascriptFiles as $script) {
                    $files[] = base64_encode(JPATH_ROOT . '/' . $script);
                }
                /* Than add it into file params */
                if (!JFile::exists(ZO2PATH_ASSETS . '/js.php')) {
                    $document->addScript(ZO2URL_ASSETS . '/js.php?files=' . implode(';', $files));
                }
            } else {
                /* No merging so let's load all scripts step by step */
                foreach ($javascriptFiles as $script) {
                    $document->addScript(rtrim(JUri::root(), '/') . '/' . $script);
                }
            }
            /* Do merge all stylesheet file
             * css.php. In this file we'll use JFile::read to load all javascipt file and also do gzip if possible */
            if (Zo2Framework::get('merge_css')) {
                /* Do base64 encode */
                $files = array();
                foreach ($styleSheetFiles as $script) {
                    $files[] = base64_encode(JPATH_ROOT . '/' . $script);
                }
                /* Than add it into file params */
                if (!JFile::exists(ZO2PATH_ASSETS . '/css.php')) {
                    $document->addStyleSheet(ZO2URL_ASSETS . '/css.php?files=' . implode(';', $files));
                }
            } else {
                /* No merging so let's load all scripts step by step */
                foreach ($styleSheetFiles as $script) {
                    $document->addStyleSheet(rtrim(JUri::root(), '/') . '/' . $script);
                }
            }
        }

    }

}

//$document = Zo2Document::getInstance();
/* Local */
//$document->addLess(ZO2RTP_ASSETS_ZO2 . '/development/less/admin.less');
//$document->addLess(ZO2RTP_ASSETS_ZO2 . '/development/less/adminmegamenu.less');
//$document->addLess(ZO2RTP_ASSETS_ZO2 . '/development/less/megamenu-responsive.less');
//$document->addLess(ZO2RTP_ASSETS_ZO2 . '/development/less/megamenu.less');
//$document->addLess(ZO2RTP_ASSETS_ZO2 . '/development/less/shortcodes.less');
//$document->addLess(ZO2RTP_ASSETS_ZO2 . '/development/less/social.less');
//$document->addScript(ZO2RTP_ASSETS_VENDOR . '/bootstrap/core/js/bootstrap.min.js');
///* Local */
//$document->addScript(ZO2RTP_ASSETS_ZO2 . '/development/js/adminlayout.js');
//$document->addScript(ZO2RTP_ASSETS_ZO2 . '/development/js/adminmegamenu.js');
//$document->addScript(ZO2RTP_ASSETS_ZO2 . '/development/js/adminsocial.js');
///* External */
//$document->addScript('http://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular.min.js');
///* Local */
//$document->addStyleSheet('http://gooogle.com/bootstrap/core/css/bootstrap.min.css');
//$document->addStyleSheet(ZO2RTP_ASSETS_VENDOR . '/bootstrap/core/css/bootstrap.min.css');



