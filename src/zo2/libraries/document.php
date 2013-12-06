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
        private $_scripts = array();
        private $_styleSheets = array();

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
         *
         * @param type $filePath
         * @param type $type
         * @param type $defer
         * @param type $async
         * @return \Zo2Document
         */
        public function addScript($filePath, $type = "text/javascript", $defer = false, $async = false) {
            $this->_scripts[$filePath]['mime'] = $type;
            $this->_scripts[$filePath]['defer'] = $defer;
            $this->_scripts[$filePath]['async'] = $async;
            return $this;
        }

        /**
         *
         * @param type $filePath
         * @param type $type
         * @param type $media
         * @param type $attribs
         * @return \Zo2Document
         */
        public function addStyleSheet($filePath, $type = 'text/css', $media = null, $attribs = array()) {
            $this->_styleSheets[$filePath]['mime'] = $type;
            $this->_styleSheets[$filePath]['media'] = $media;
            $this->_styleSheets[$filePath]['attribs'] = $attribs;
            return $this;
        }

        /**
         *
         * @param type $filePath
         * @return \Zo2Document
         */
        public function addLess($filePath) {
            $this->_styleSheets[$filePath]['mime'] = 'less';
            return $this;
        }

        /**
         * Do remove scripts in JDocument
         * @param type $urls
         */
        public function scriptRemove($urls) {
            $documents = JFactory::getDocument();
            if (!is_array($urls)) {
                if (isset($documents->_scripts[$urls]))
                    unset($documents->_scripts[$urls]);
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
            /**
             * @todo Checksum or last modified before process to improve performance
             */
            $javascriptFiles = array();
            $stylesheetFiles = array();
            $outputDir = JPATH_ROOT . '/cache/zo2';
            $outputDirCss = $outputDir . '/css';
            $outputDirJs = $outputDir . '/js';

            if (!JFolder::exists($outputDir)) {
                JFolder::create($outputDir);
            }
            if (!JFolder::exists($outputDirCss)) {
                JFolder::create($outputDirCss);
            }
            if (!JFolder::exists($outputDirJs)) {
                JFolder::create($outputDirJs);
            }

            /* Javascript process */
            foreach ($this->_scripts as $script => $data) {
                if (isset($data['mime'])) {
                    switch ($data['mime']) {
                        case 'text/javascript':
                            $pathInfo = pathinfo($script);
                            $outputFile = $outputDirJs . '/' . $pathInfo['filename'] . '.min.' . $pathInfo['extension'];
                            /* Do compress */
                            if (Zo2Framework::get('compress_javascript', 1)) {
                                Zo2HelperCompiler::javascript($script, $outputFile);
                                /* Replace original script file by compressed file */
                                $script = $outputFile; /* Full filePath of compressed file */
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
                            $outputFile = $outputDirCss . '/' . $pathInfo['filename'] . '.min.' . $pathInfo['extension'];
                            /* Do compress */
                            if (Zo2Framework::get('compress_css', 1)) {
                                /**
                                 * @todo Compress and save into /assets/zo2/css
                                 */
                                Zo2HelperCompiler::styleSheet($script, $outputFile);
                                /* Replace original script file by compressed file */
                                $script = $outputFile; /* Full filePath of compressed file */
                            }
                            $styleSheetFiles[] = $script;
                            break;
                        case 'less':
                            /* For less files we must do compile first */
                            $pathInfo = pathinfo($script);
                            $outputFile = $outputDirCss . '/' . $pathInfo['filename'] . '.min.css';

                            /* We don't do check bool return here because if less do not compile because file diff checking */
                            Zo2HelperCompiler::less($script, $outputFile);

                            /* And now do compress or merge */
                            if (Zo2Framework::get('compress_css', 1)) {
                                /**
                                 * @todo Compress and save into /assets/zo2/css
                                 */
                                Zo2HelperCompiler::styleSheet($script, $outputFile);
                                /* Replace original script file by compressed file */
                                $script = $outputFile; /* Full filePath of compressed file */
                            }
                            $styleSheetFiles[] = $script;

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
                if (!JFile::exists(JPATH_ROOT . '/cache/zo2/js/js.php')) {
                    JFile::copy(ZO2PATH_ASSETS . '/js.php', JPATH_ROOT . '/cache/zo2/js/js.php');
                }
                $document->addScript(rtrim(JUri::root(), '/') . '/cache/zo2/js/js.php');
            } else {
                /* No merging so let's load all scripts step by step */
                foreach ($javascriptFiles as $script) {
                    $pathInfo = pathinfo($script);
                    $document->addScript(rtrim(JUri::root(), '/') . '/cache/zo2/js/' . $pathInfo['filename'] . '.js');
                }
            }
            /* Do merge all stylesheet file
             * css.php. In this file we'll use JFile::read to load all javascipt file and also do gzip if possible */
            if (Zo2Framework::get('merge_css')) {
                if (!JFile::exists(JPATH_ROOT . '/cache/zo2/css/css.php')) {
                    JFile::copy(ZO2PATH_ASSETS . '/css.php', JPATH_ROOT . '/cache/zo2/css/css.php');
                }
                $document->addStyleSheet(rtrim(JUri::root(), '/') . '/cache/zo2/css/css.php');
            } else {
                /* No merging so let's load all scripts step by step */
                foreach ($styleSheetFiles as $script) {
                    $pathInfo = pathinfo($script);
                    $document->addStyleSheet(rtrim(JUri::root(), '/') . '/cache/zo2/css/' . $pathInfo['filename'] . '.css');
                }
            }
        }

    }

}