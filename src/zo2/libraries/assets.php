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
        public function addStyleSheet($file)
        {
            $assetFile = $this->getAssetFile($file);
            if ($assetFile != false) {
                $this->_stylesheets[$assetFile] = $this->getPath($assetFile);
            }
            return $this;
        }

        /**
         * 
         * @param type $style
         * @param bool $less
         * @return \Zo2Assets
         */
        public function addStyleSheetDeclaration($style, $less = false)
        {
            if ($less) {
                $style = Zo2HelperCompiler::lessStyle($style);
            }
            $this->_stylesheetDeclarations[] = $style;
            return $this;
        }

        /**
         * @param type $file
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
                $cssFiles['core'] = array();
                $cssFiles['template'] = array();

                /* Template */
                $templateAssetsPath = $this->getPath($this->get('siteTemplate') . '/layouts/assets.json');
                $templatePresetsPath = $this->getPath($this->get('siteTemplate') . '/layouts/presets.json');
                $templateAssets = json_decode(file_get_contents($templateAssetsPath), true);
                $templatePresets = json_decode(file_get_contents($templatePresetsPath), true);

                foreach ($templateAssets as $asset) {
                    if ($asset['type'] == 'js') $jsFiles['template'][] = $asset['path'];
                    else if ($asset['type'] == 'less') $lessFiles['template'][] = $asset['path'];
                    else if ($asset['type'] == 'css') $cssFiles['template'][] = $asset['path'];
                }

                foreach ($templatePresets as $preset) {
                    if (isset($preset['less']) && !empty($preset['less'])) $lessFiles['template'][] = $preset['less'];
                }

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

                        /* Do build core css */
                        foreach ($cssFiles['core'] as $cssFile) {
                            $input = $this->getPath($this->get('zo2Root') . '/assets/zo2/development/css/' . $cssFile . '.css');
                            $output = $this->getPath($this->get('zo2Root') . '/assets/zo2/css/' . $cssFile . '.css');
                            $this->_buildCss($input, $output);
                        }
                        if (isset($cssFiles['template']) && is_array($cssFiles['template'])) {
                            /* Do build template less */
                            foreach ($cssFiles['template'] as $cssFile) {
                                $input = $this->getPath($this->get('siteTemplate') . '/assets/zo2/development/css/' . $cssFile . '.css');
                                $output = $this->getPath($this->get('siteTemplate') . '/assets/zo2/css/' . $cssFile . '.css');
                                $this->_buildCss($input, $output);
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
            $cleanProduction = Zo2Framework::get('clean_production', 1);
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
            $cleanProduction = Zo2Framework::get('clean_production', 1);
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

        private function _buildCss($input, $output) {
            $cleanProduction = Zo2Framework::get('clean_production', 1);
            if (JFile::exists($output) && $cleanProduction)
                JFile::delete($output);
            if (!is_file($output) || filemtime($input) > filemtime($output)) {
                if (Zo2HelperCompiler::styleSheet($input, $output)) {
                    //JFactory::getApplication()->enqueueMessage('Success: ' . $jsFilePathOutput);
                }
            } else {
                //JError::raiseNotice(100, 'File exists: ' . $jsFilePathOutput);
            }
        }

        public function generateAssets($type)
        {
            $combineJs = Zo2Framework::get('combine_js');
            $combineCss = Zo2Framework::get('combine_css');
            /* For backend we'll replace $body with our adding scripts */
            if ($type == 'js') {
                $jsHtml = '';
                if ($combineJs) {
                    $jsName = 'cache/script.combined.js';
                    $jsFile = $this->get('siteTemplate') . '/assets/' . $jsName;
                    $jsFilePath = $this->getPath($jsFile);
                    $jsContent = '';
                    if (!file_exists($jsFilePath)) {
                        foreach ($this->_javascripts as $javascript => $path) {
                            $jsContent .= file_get_contents($path) . "\n";
                        }
                        file_put_contents($jsFilePath, $jsContent);
                    }
                    $jsHtml .='<script type="text/javascript" src="' . $this->get('siteUrlRelative') . '/' . $jsFile . '"></script>';
                }
                else {
                    foreach ($this->_javascripts as $javascript => $path) {
                        $jsHtml .='<script type="text/javascript" src="' . $this->get('siteUrlRelative') . '/' . $javascript . '"></script>';
                    }
                }
                $jsDeclarationHtml = '<script>';
                foreach ($this->_javascriptDeclarations as $javascriptDeclaration) {
                    $jsDeclarationHtml .= $javascriptDeclaration;
                }
                $jsDeclarationHtml .= '</script>';
                return $jsHtml . "\n" . $jsDeclarationHtml;
            } else {
                $cssHtml = '';
                if ($combineCss) {
                    $cssName = 'cache/style.combined.css';
                    $cssFile = $this->get('siteTemplate') . '/assets/' . $cssName;
                    $cssFilePath = $this->getPath($cssFile);
                    $cssUri = $this->get('siteUrlRelative') . '/' . $cssFile;
                    if (!file_exists($cssFilePath)) {
                        $cssContent = '';
                        foreach ($this->_stylesheets as $styleSheets => $path) {
                            $currentCssContent = file_get_contents($path);
                            $currentCssContent = CssMinifier::minify($currentCssContent);
                            $currentCssContent = Zo2HelperAssets::fixCssUrl($currentCssContent, $cssUri, '/' . $styleSheets);
                            $cssContent .= $currentCssContent . "\n";
                        }
                        $cssContent = Zo2HelperAssets::moveCssImportToBeginning($cssContent);
                        file_put_contents($cssFilePath, $cssContent);
                    }
                    $cssHtml .='<link rel="stylesheet" href="' . $cssUri . '"></script>';
                }
                else {
                    foreach ($this->_stylesheets as $styleSheets => $path) {
                        $cssHtml .= '<link rel="stylesheet" href="' . $this->get('siteUrlRelative') . '/' . $styleSheets . '">';
                    }
                }
                $cssDeclarationHtml = '<style>';
                foreach ($this->_stylesheetDeclarations as $stylesheetDeclaration) {
                    $cssDeclarationHtml .= $stylesheetDeclaration;
                }
                $cssDeclarationHtml .= '</style>';
                return $cssHtml . "\n" . $cssDeclarationHtml;
            }
        }
    }
}