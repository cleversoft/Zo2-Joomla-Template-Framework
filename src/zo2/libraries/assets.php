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
     * @uses This class used for managed ALL asset stuffs
     * @rule
     * All asset stuffs must be save under <core>|<template>/assets directory
     */
    class Zo2Assets {

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
         * @var object
         */
        private $_assets = array();

        /**
         * Constructor method
         * We do not allow create new instance directly. Must go via getInstance
         */
        protected function __construct() {
            $framework = Zo2Factory::getFramework();
            /* Get specific core assets */
            if (Zo2Factory::isJoomla25()) {
                $assetsFile = 'assets.joomla25.json';
            } else {
                $assetsFile = 'assets.default.json';
            }
            $assetsFile = $this->getAssetFile($assetsFile, 'path');
            if ($assetsFile) {
                $this->_assets = json_decode(file_get_contents($assetsFile));
            }
            /* Site loading */
            if (Zo2Factory::isSite()) {
                /* Load core assets */
                $this->load($this->_assets->frontend);
                /* Responsive */
                if ($framework->get('responsive_layout'))
                    $this->addStyleSheet('zo2/css/non-responsive.css');
                /* Custom css */
                if ($framework->get('enable_custom_css', 1) == 1)
                    $this->addStyleSheet('zo2/css/custom.css');
                /* Template side */
                $assetsFile = $this->getAssetFile('template.json', 'path');
                if ($assetsFile) {
                    $assets = json_decode(file_get_contents($assetsFile));
                    if (isset($assets->assets)) {
                        $this->load($assets->assets);
                    }
                }
            } else {
                /* Backend loading */
                if (Zo2Factory::isZo2Template()) {
                    /* Load core assets */
                    $this->load($this->_assets->backend);
                }
            }
        }

        /**
         * 
         * @return \Zo2Assets
         */
        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new Zo2Assets();
            }
            if (isset(self::$instance)) {
                return self::$instance;
            }
        }

        /**
         * Load assets
         * @param type $assets
         */
        public function load($assets) {
            if (isset($assets->css)) {
                foreach ($assets->css as $css) {
                    $this->addStyleSheet($css);
                }
            }
            if (isset($assets->js)) {
                foreach ($assets->js as $js) {
                    $this->addScript($js);
                }
            }
        }

        /**
         * Get asset file with relative path
         * @param string $file File location
         * @param null|string $pathType Path type offset(default is null)/path/url
         * @return boolean|string
         */
        public function getAssetFile($file, $pathType = null) {
            $tempAssets = Zo2Factory::getPath('templates://assets/' . $file, null);
            if ($tempAssets === false)
                $tempAssets = Zo2Factory::getPath('zo2://assets/' . $file, null);


            return ($tempAssets === false) ? false : Zo2Path::getInstance()->pathConvert($tempAssets, $pathType);
        }

        /**
         * Function build all development assets file into Zo2Assets class
         */
        public function buildAssets() {
            $assetsFile = ZO2PATH_ROOT . '/assets/build.json';
            if (JFile::exists($assetsFile)) {
                $assets = json_decode(file_get_contents($assetsFile));
                if (isset($assets->build->core->less))
                    $this->_buildAssets($assets->build->core->less, CORE, 'less');
                if (isset($assets->build->core->js))
                    $this->_buildAssets($assets->build->core->js, CORE, 'js');
                if (isset($assets->build->template->less))
                    $this->_buildAssets($assets->build->template->less, TEMPLATE, 'less');
                if (isset($assets->build->template->js))
                    $this->_buildAssets($assets->build->template->js, TEMPLATE, 'js');
            }
        }

        /**
         * @param $assets
         * @param $position
         * @param $type
         *
         * Do build asset file
         */
        private function _buildAssets($assets, $position, $type) {
            $zPath = Zo2Path::getInstance();
            if (count($assets) > 0) {
                foreach ($assets as $inputName => $outputName) {
                    $typePath = $type;
                    if ($type == 'less') {
                        $typePath = 'css';
                    }
                    if ($position == CORE) {
                        $inputFile = $zPath->keyConvert('zo2://assets/zo2/development/' . $type . '/' . $inputName, 'path');
                        $outputFile = $zPath->keyConvert('zo2://assets/zo2/', 'path') . $typePath . '/' . $outputName;
                    } elseif ($position == TEMPLATE) {
                        $inputFile = $zPath->keyConvert('templates://assets/zo2/development/' . $type . '/' . $inputName, 'path');
                        $outputFile = $zPath->keyConvert('templates://assets/zo2/', 'path') . $typePath . '/' . $outputName;
                    }
                    if ($inputFile) {
                        if ($type == 'less') {
                            Zo2HelperCompiler::less($inputFile, $outputFile);
                        } elseif ($type == 'js') {
                            Zo2HelperCompiler::javascript($inputFile, $outputFile);
                        }
                    }
                }
            }
        }

        /**
         *
         * @param type $file
         * @return \Zo2Assets
         */
        public function addStyleSheet($file) {
            $assetFile = $this->getAssetFile($file);
            if ($assetFile) {
                $this->_stylesheets[$assetFile] = $assetFile;
            }
            return $this;
        }

        /**
         * @todo Should we allow add less ?
         * @param type $style
         * @param bool $less
         * @return \Zo2Assets
         */
        public function addStyleSheetDeclaration($style, $less = false) {
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
                $this->_javascripts[$assetFile] = $assetFile;
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
            $zPath = Zo2Path::getInstance();
            /* This method only need call one time */
            static $called = false;
            $templateName = Zo2Factory::getTemplateName();
            if ($called === false && !empty($templateName) && Zo2Factory::isZo2Template()) {
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
                $templateAssetsPath = $zPath->keyConvert('templates://layouts/assets.json');
                $templatePresetsPath = $zPath->keyConvert('templates://layouts/presets.json');

                $templateAssets = json_decode(file_get_contents($templateAssetsPath), true);
                $templatePresets = json_decode(file_get_contents($templatePresetsPath), true);

                foreach ($templateAssets as $asset) {
                    if ($asset['type'] == 'js')
                        $jsFiles['template'][] = $asset['path'];
                    else if ($asset['type'] == 'less')
                        $lessFiles['template'][] = $asset['path'];
                    else if ($asset['type'] == 'css')
                        $cssFiles['template'][] = $asset['path'];
                }

                foreach ($templatePresets as $preset) {
                    if (isset($preset['less']) && !empty($preset['less']))
                        $lessFiles['template'][] = $preset['less'];
                }

                //$lessFiles['template'] = '';
                //$jsFiles['template'] = '';

                $buildProduction = Zo2Factory::getFramework()->get('build_production', 1);


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
            $cleanProduction = Zo2Factory::getFramework()->get('clean_production', 1);
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
            $cleanProduction = Zo2Factory::getFramework()->get('clean_production', 1);
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
            $cleanProduction = Zo2Factory::getFramework()->get('clean_production', 1);
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

        /**
         * 
         * @param type $type
         * @return string
         */
        public function generateAssets($type) {
            $zPath = Zo2Path::getInstance();
            /* Get Zo2Framework */
            $framework = Zo2Framework::getInstance();
            $combineJs = $framework->get('combine_js');
            $combineCss = $framework->get('combine_css');
            /* Generate javascript */
            if ($type == 'js') {
                $jsHtml = '';
                /* Do compress */
                if ($combineJs) {
                    $jsName = 'cache/script.combined.js';
                    $jsFilePath = $zPath->keyConvert('templates://assets/' . $jsName);
                    $jsContent = '';
                    if (!file_exists($jsFilePath)) {
                        foreach ($this->_javascripts as $javascript => $path) {
                            $jsContent .= file_get_contents($path) . "\n";
                        }
                        file_put_contents($jsFilePath, $jsContent);
                    }
                    $jsHtml .='<script type="text/javascript" src="' . rtrim(JUri::root(true), '/') . '/' . $jsFile . '"></script>';
                } else {
                    foreach ($this->_javascripts as $javascript => $path) {
                        $jsHtml .='<script type="text/javascript" src="' . $zPath->toUrl($javascript) . '"></script>';
                    }
                }
                $jsDeclarationHtml = '<script>jQuery(document).ready( function () {';
                foreach ($this->_javascriptDeclarations as $javascriptDeclaration) {
                    $jsDeclarationHtml .= $javascriptDeclaration;
                }
                $jsDeclarationHtml .= ' }); </script>';
                return $jsHtml . "\n" . $jsDeclarationHtml;
            } else {
                $cssHtml = '';
                if ($combineCss) {
                    $cssName = 'cache/style.combined.css';
                    $cssFilePath = $zPath->keyConvert('templates://assets/' . $cssName);
                    $cssUri = rtrim(JUri::root(true), '/') . '/' . $cssFile;
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
                } else {
                    foreach ($this->_stylesheets as $styleSheets => $path) {
                        $cssHtml .= '<link rel="stylesheet" href="' . $zPath->toUrl($styleSheets) . '">';
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