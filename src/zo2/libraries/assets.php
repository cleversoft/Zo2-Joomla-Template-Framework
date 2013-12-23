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

        /**
         * Singleton instance
         * @var Zo2Assets 
         */
        public static $instance;

        /**
         * Array of added css files
         * @var array 
         */
        private $_stylesheets = array();

        /**
         * Array of added custom stylesheet scripts
         * @var array 
         */
        private $_stylesheetDeclarations = array();

        /**
         * Array of added js files
         * @var array
         */
        private $_javascripts = array();

        /**
         * Array of added custom javascripts
         * @var array
         */
        private $_javascriptDeclarations = array();

        /**
         * 
         * @return Zo2Assets
         */
        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            if (isset(self::$instance)) {
                return self::$instance;
            }
        }

        /**
         * Get asset file with relative path
         * @param type $file         
         * @return string
         */
        public function getAssetFile($file) {
            /* Template override */
            $paths[] = $this->get('siteTemplate') . '/assets/' . $file;
            /* Core assets */
            $paths[] = $this->get('zo2Root') . '/assets/' . $file;
            /* Find in array which the first exists file */
            foreach ($paths as $path) {
                $physicalPath = $this->getPath($path);
                if (JFile::exists($physicalPath)) {
                    return $path;
                }
            }
            return false;
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
        public function addScript($file) {
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

        /**
         * Do build development script into production
         */
        public function buildFrameworkProduction() {
            /* This method only need call one time */
            static $called = false;
            if ($called === false) {
                /**
                 * @todo move these list into config file
                 */
                $lessFiles['core'][] = 'adminmegamenu';
                $lessFiles['core'][] = 'megamenu-responsive';
                $lessFiles['core'][] = 'megamenu';
                $lessFiles['core'][] = 'shortcodes';
                $lessFiles['core'][] = 'social';
                $jsFiles['core'][] = 'adminlayout';
                $jsFiles['core'][] = 'adminmegamenu';
                $jsFiles['core'][] = 'adminsocial';
                $jsFiles['core'][] = 'assets';
                $jsFiles['core'][] = 'megamenu';
                $jsFiles['core'][] = 'shortcodes';
                $jsFiles['core'][] = 'social';
                $jsFiles['core'][] = 'socialshare';

                /* Template */
                //$lessFiles['template'] = '';
                //$jsFiles['template'] = '';
                        
                $buildProduction = Zo2Framework::get('build_production', 1);


                switch ($buildProduction) {
                    case 1: /* Clear cache and rebuild everything */
                        /* Do build core less */
                        foreach ($lessFiles['core'] as $lessFile) {
                            $input = $this->getPath($this->get('zo2Root') . '/assets/zo2/development/less/' . $lessFile . '.less');
                            $output = $this->getPath($this->get('zo2Root') . '/assets/zo2/css/' . $lessFile . '.css');
                            $this->_buildLess($input, $output);
                        }
                        if (isset($lessFiles['template']) && is_array($lessFiles['template'])) {
                            /* Do build template less */
                            foreach ($lessFiles['template'] as $lessFile) {
                                $input = $this->getPath($this->get('siteTemplate') . '/assets/zo2/development/less/' . $lessFile . '.less');
                                $output = $this->getPath($this->get('siteTemplate') . '/assets/zo2/css/' . $lessFile . '.css');
                                $this->_buildLess($input, $output);
                            }
                        }
                        /* Do build core js */
                        foreach ($jsFiles['core'] as $jsFile) {
                            $input = $this->getPath($this->get('zo2Root') . '/assets/zo2/development/js/' . $jsFile . '.js');
                            $output = $this->getPath($this->get('zo2Root') . '/assets/zo2/js/' . $jsFile . '.js');
                            $this->_buildJs($input, $output);
                            //JFactory::getApplication()->enqueueMessage('Working: ' . $jsFilePath);
                        }
                        if (isset($jsFiles['template']) && is_array($jsFiles['template'])) {
                            /* Do build template js */
                            foreach ($jsFiles['template'] as $jsFile) {
                                $input = $this->getPath($this->get('siteTemplate') . '/assets/zo2/development/js/' . $jsFile . '.js');
                                $output = $this->getPath($this->get('siteTemplate') . '/assets/zo2/js/' . $jsFile . '.js');
                                $this->_buildJs($input, $output);
                                //JFactory::getApplication()->enqueueMessage('Working: ' . $jsFilePath);
                            }
                        }
                        break;
                }
                $called = true;
            }
        }

        private function _buildLess($input, $output) {
            $cleanProduction = Zo2Framework::get('clean_production', 0);
            /* Do clean old files */
            if (JFile::exists($output) && $cleanProduction)
                JFile::delete($output);
            if (!is_file($output) || filemtime($input) > filemtime($output)) {
                if (Zo2HelperCompiler::less($input, $output)) {
                    //JFactory::getApplication()->enqueueMessage('Success: ' . $cssFilePath);
                }
            } else {
                //JError::raiseNotice(100, 'File exists: ' . $cssFilePath);
            }
            /**
             * @todo css compress
             */
        }

        private function _buildJs($input, $output) {
            $cleanProduction = Zo2Framework::get('clean_production', 0);
            if (JFile::exists($output) && $cleanProduction)
                JFile::delete($output);
            if (!is_file($output) || filemtime($input) > filemtime($output)) {
                if (Zo2HelperCompiler::javascript($input, $output)) {
                    //JFactory::getApplication()->enqueueMessage('Success: ' . $jsFilePathOutput);
                }
            } else {
                //JError::raiseNotice(100, 'File exists: ' . $jsFilePathOutput);
            }
        }

        public function generateAssets($type) {

            /* For backend we'll replace $body with our adding scripts */
            if ($type == 'js') {
                $jsHtml = '';
                foreach ($this->_javascripts as $javascript => $path) {
                    $jsHtml .='<script type="text/javascript" async="" src="' . $this->get('siteUrl') . '/' . $javascript . '"></script>';
                }
                $jsDeclarationHtml = '<script>';
                foreach ($this->_javascriptDeclarations as $javascriptDeclaration) {
                    $jsDeclarationHtml .= $javascriptDeclaration;
                }
                $jsDeclarationHtml .= '</script>';
                return $jsHtml . $jsDeclarationHtml;
            } else {
                $cssHtml = '';
                foreach ($this->_stylesheets as $styleSheets => $path) {
                    $cssHtml .= '<link rel="stylesheet" href="' . $this->get('siteUrl') . '/' . $styleSheets . '">';
                }
                $cssDeclarationHtml = '<style>';
                foreach ($this->_stylesheetDeclarations as $stylesheetDeclaration) {
                    $cssDeclarationHtml .= $stylesheetDeclaration;
                }
                $cssDeclarationHtml = '</style>';
                return $cssHtml . $cssDeclarationHtml;
            }
        }

    }

}