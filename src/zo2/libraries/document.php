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
     * 
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

        public function addScript($filePath, $type = "text/javascript", $defer = false, $async = false) {
            $this->_scripts[$filePath]['mime'] = $type;
            $this->_scripts[$filePath]['defer'] = $defer;
            $this->_scripts[$filePath]['async'] = $async;
            return $this;
        }

        public function addStyleSheet($filePath, $type = 'text/css', $media = null, $attribs = array()) {
            $this->_styleSheets[$filePath]['mime'] = $type;
            $this->_styleSheets[$filePath]['media'] = $media;
            $this->_styleSheets[$filePath]['attribs'] = $attribs;
            return $this;
        }

        public function addLess($filePath) {
            $this->_styleSheets[$filePath]['mime'] = 'less';
            return $this;
        }

        public function load() {
            /**
             * @todo Checksum or last modified before process to improve performance
             */
            $javascriptFiles = array();
            /* Javascript process */
            foreach ($this->_scripts as $script => $data) {
                if (isset($data['mime'])) {
                    switch ($data['mime']) {
                        case 'text/javascript':
                            $pathInfo = pathinfo($script);
                            $outputFile = ZO2PATH_ROOT . '/assets/zo2/js/' . $pathInfo['filename'] . '.' . $pathInfo['extension'];
                            if (Zo2Framework::get('compress_javascript')) {
                                /**
                                 * @todo Compress and save into /assets/zo2/js
                                 */
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

            /* StyleSheet process */
            $styleSheetFiles = array();
            foreach ($this->_styleSheets as $script => $data) {
                if (isset($data['mime'])) {
                    switch ($data['mime']) {
                        case 'text/css':
                            $pathInfo = pathinfo($script);
                            $outputFile = ZO2PATH_ROOT . '/assets/zo2/css/' . $pathInfo['filename'] . '.css';
                            if (Zo2Framework::get('compress_css')) {
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
                            $outputFile = ZO2PATH_ROOT . '/assets/zo2/css/' . $pathInfo['filename'] . '.css';

                            /* We don't do check bool return here because if less do not compile because file diff checking */
                            Zo2HelperCompiler::less($script, $outputFile);

                            /* And now do compress or merge */
                            if (Zo2Framework::get('compress_css')) {
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
                $document->addScript(rtrim(JUri::root(), '/') . '/cache/zo2/js.php');
            } else {
                /* No merging so let's load all scripts step by step */
                foreach ($javascriptFiles as $script) {
                    $pathInfo = pathinfo($script);
                    $document->addScript(ZO2URL_ASSETS_ZO2 . '/js/' . $pathInfo['filename'] . '.js');
                }
            }
            /* Do merge all stylesheet file
             * css.php. In this file we'll use JFile::read to load all javascipt file and also do gzip if possible */
            if (Zo2Framework::get('merge_css')) {
                $document->addStyleSheet(rtrim(JUri::root(), '/') . '/cache/zo2/css.php');
            } else {
                /* No merging so let's load all scripts step by step */
                foreach ($styleSheetFiles as $script) {
                    $pathInfo = pathinfo($script);
                    $document->addStyleSheet(ZO2URL_ASSETS_ZO2 . '/css/' . $pathInfo['filename'] . '.css');
                }
            }
        }

    }

}