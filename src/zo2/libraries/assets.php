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
if (!class_exists('Zo2Assets')) {

    /**
     * Provide methods to work with Zo2 Framework & Zo2 Template paths
     */
    class Zo2Assets extends Zo2Path {

        public static $instance;
        private $_less = array();
        private $_stylesheets = array();
        private $_stylesheetDeclarations = array();
        private $_javascripts = array();
        private $_javascriptDeclarations = array();

        /**
         * 
         * @return Zo2Assets
         */
        public function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            if (isset(self::$instance)) {
                return self::$instance;
            }
        }

        /**
         * Get asset file path or url
         * @param type $file         
         * @return string
         */
        public function getAssetFile($file) {
            $paths[] = $this->get('zo2Root') . '/assets/' . $file;
            $paths[] = $this->get('siteTemplate') . '/assets/' . $file;
            foreach ($paths as $path) {
                $physicalPath = $this->getPath($path);
                if (JFile::exists($physicalPath)) {
                    break;
                }
            }
            if (isset($path)) {
                return $path;
            } else {
                return false;
            }
        }

        /**
         * 
         * @param type $file
         * @return \Zo2Assets
         */
        public function addLess($file) {
            $assetFile = $this->getAssetFile($file);
            if ($assetFile != false) {
                $this->_less[$assetFile] = $this->getPath($assetFile);
            }
            return $this;
        }

        /**
         * 
         * @param type $file
         * @return \Zo2Assets
         */
        public function addStyleSheet($file) {
            $assetFile = $this->getAssetFile($file);
            if ($assetFile != false) {
                $this->_stylesheets[$assetFile] = $this->getPath($assetFile);
            }
            return $this;
        }

        /**
         * 
         * @param type $script
         * @return \Zo2Assets
         */
        public function addStyleSheetDeclaration($script) {
            $this->_stylesheetDeclarations[] = $script;
            return $this;
        }

        /**
         * 
         * @return \Zo2Assets
         */
        public function addScript() {
            $assetFile = $this->getAssetFile($file);
            if ($assetFile != false) {
                $this->_javascripts[$assetFile] = $this->getPath($assetFile);
            }
            return $this;
        }

        /**
         * 
         * @param type $script
         * @return \Zo2Assets
         */
        public function addScriptDeclaration($script) {
            $this->_javascriptDeclarations[] = $script;
            return $this;
        }

        public function buildFrameworkProduction() {
            $developmentDir = $lessFiles[] = 'admin';
            $lessFiles[] = 'adminmegamenu';
            $lessFiles[] = 'megamenu-responsive';
            $lessFiles[] = 'megamenu';
            $lessFiles[] = 'shortcodes';
            $lessFiles[] = 'social';
            $jsFiles[] = 'adminlayout';
            $jsFiles[] = 'adminmegamenu';
            $jsFiles[] = 'adminsocial';
            $jsFiles[] = 'assets';
            $jsFiles[] = 'megamenu';
            $jsFiles[] = 'shortcodes';
            $jsFiles[] = 'social';
            $jsFiles[] = 'socialshare';

            $buildProduction = Zo2Framework::get('build_production', 0);
            switch ($buildProduction) {
                case 1: /* Clear cache and rebuild everything */
                    /* Do build less */
                    foreach ($lessFiles as $lessFile) {
                        $lessFilePath = $this->getPath($this->get('zo2Root') . '/assets/zo2/development/less/' . $lessFile . '.less');
                        $cssFilePath = $this->getPath($this->get('zo2Root') . '/assets/zo2/css/' . $lessFile . '.css');
                        Zo2HelperCompiler::less($lessFilePath, $cssFilePath);
                        /**
                         * @todo css compress
                         */
                    }
                    /* Do build js */
                    foreach ($jsFiles as $jsFile) {
                        $jsFilePath = $this->getPath($this->get('zo2Root') . '/assets/zo2/development/js/' . $jsFile . '.js');
                        $jsFilePathOutput = $this->getPath($this->get('zo2Root') . '/assets/zo2/js/' . $jsFile . '.js');
                        Zo2HelperCompiler::javascript($jsFilePath, $jsFilePathOutput);
                    }
                    break;
                case 2: /* Smart check, only build for missed or file updated */
                    /* Do build less */
                    foreach ($lessFiles as $lessFile) {
                        $lessFilePath = $this->getPath($this->get('zo2Root') . '/assets/zo2/development/less/' . $lessFile . '.less');
                        $cssFilePath = $this->getPath($this->get('zo2Root') . '/assets/zo2/css/' . $lessFile . '.css');
                        if (!is_file($cssFilePath) || filemtime($lessFilePath) > filemtime($cssFilePath)) {
                            Zo2HelperCompiler::less($lessFilePath, $cssFilePath);
                        }

                        /**
                         * @todo css compress
                         */
                    }
                    /* Do build js */
                    foreach ($jsFiles as $jsFile) {
                        $jsFilePath = $this->getPath($this->get('zo2Root') . '/assets/zo2/development/js/' . $jsFile . '.js');
                        $jsFilePathOutput = $this->getPath($this->get('zo2Root') . '/assets/zo2/js/' . $jsFile . '.js');
                        if (!is_file($jsFilePathOutput) || filemtime($jsFilePath) > filemtime($jsFilePathOutput)) {
                            Zo2HelperCompiler::javascript($jsFilePath, $jsFilePathOutput);
                        }
                    }
                    break;
            }
        }

    }

}