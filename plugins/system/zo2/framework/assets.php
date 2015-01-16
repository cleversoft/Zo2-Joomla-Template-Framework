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
if (!class_exists('Zo2Assets'))
{

    /**
     * @uses This class used for managed ALL asset stuffs
     * @rule
     * All asset stuffs must be save under <core>|<template>/assets directory
     */
    class Zo2Assets
    {

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
         * Constructor method
         * We do not allow create new instance directly. Must go via getInstance
         */
        protected function __construct()
        {
            
        }

        /**
         * Get instance of Zo2Assets
         * @return \Zo2Assets
         */
        public static function getInstance()
        {
            if (!isset(self::$instance))
            {
                self::$instance = new Zo2Assets();
            }
            if (isset(self::$instance))
            {
                return self::$instance;
            }
        }

        /**
         * Load assets file
         * @param type $assets
         */
        public function load($assets)
        {
            if (isset($assets->css))
            {
                foreach ($assets->css as $css)
                {
                    $this->addStyleSheet($css);
                }
            }
            if (isset($assets->js))
            {
                foreach ($assets->js as $js)
                {
                    $this->addScript($js);
                }
            }
        }

        /**
         * Get asset file with relative path
         * @param string $key File location    
         * @return boolean|string
         */
        public function getAssetFile($key)
        {
            return Zo2Factory::getPath('assets://' . $key);
        }

        /**
         * Function build all development assets file into Zo2Assets class
         */
        public function buildAssets()
        {
            $assetsFile = $this->getAssetFile('build.json');
            if ($assetsFile)
            {
                $assets = json_decode(file_get_contents($assetsFile));
                if (isset($assets->core->less))
                    $this->_buildAssets($assets->core->less, CORE, 'less');
                if (isset($assets->core->js))
                    $this->_buildAssets($assets->core->js, CORE, 'js');
                if (isset($assets->template->less))
                    $this->_buildAssets($assets->template->less, TEMPLATE, 'less');
                if (isset($assets->template->js))
                    $this->_buildAssets($assets->template->js, TEMPLATE, 'js');
                return true;
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
            if ($assetFile)
            {
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
        public function addStyleSheetDeclaration($style, $less = false)
        {
            if ($less)
            {
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
        public function addScript($file)
        {
            $assetFile = $this->getAssetFile($file);
            if ($assetFile != false)
            {
                $this->_javascripts[$assetFile] = $assetFile;
            }
            return $this;
        }

        /**
         *
         * @param type $script
         * @return \Zo2Assets
         */
        public function addScriptDeclaration($script)
        {
            $this->_javascriptDeclarations[] = $script;
            return $this;
        }

        /**
         * @todo Move all these process to backend. Frontend just load only
         * @param type $type
         * @return string
         */
        public function generateAssets($type)
        {
            if ($type == 'css')
            {
                return $this->_generateStylesheets();
            } elseif ($type == 'js')
            {
                return $this->_generateJavascripts();
            }
        }

        /**
         * Do build asset file
         * @param type $assets
         * @param type $position
         * @param type $type
         */
        private function _buildAssets($assets, $position, $type)
        {
            if (count($assets) > 0)
            {
                foreach ($assets as $inputName)
                {
                    /* Zo2 assets */
                    if ($position == CORE)
                    {
                        $inputFile = Zo2Factory::getPath('zo2://assets/zo2/development/' . $type . '/' . $inputName, 'path');
                    } elseif ($position == TEMPLATE)
                    { /* Template assets */
                        $inputFile = Zo2Factory::getPath('templates://assets/zo2/development/' . $type . '/' . $inputName, 'path');
                    } if ($inputFile)
                    {
                        if ($type == 'less')
                        {
                            $this->_compileLess($inputFile);
                        } elseif ($type == 'js')
                        {
                            $this->_compileJs($inputFile);
                        }
                    }
                }
            }
        }

        /**
         * Compile less to css
         * @param type $lessFile
         * @return boolean
         */
        private function _compileLess($lessFile)
        {
            $pathinfo = pathinfo($lessFile);
            $cssDir = realpath($pathinfo['dirname'] . '/../../css');
            $cssFile = $pathinfo['filename'] . '.css';
            $cssFilePath = $cssDir . '/' . $cssFile;
            /* Complie */
            if (Zo2HelperCompiler::less($lessFile, $cssFilePath))
            {
                $optimizeMode = Zo2Framework::getParam('optimize_css', 0);
                $developmentMode = Zo2Framework::getParam('development_mode', 0);
                /**
                 * @todo Try to provide more minify options
                 */ if (($optimizeMode == 1) && ( $developmentMode == 0))
                {
                    $buffer = file_get_contents($cssFilePath);
                    $buffer = CssMinifier::minify($buffer);
                    if (is_writable($cssFilePath))
                    {
                        return JFile::write($cssFilePath, $buffer);
                    }
                }
            }
            return false;
        }

        /**
         * 
         * @param string $jsFile
         * @return boolean
         */
        private function _compileJs($jsFile)
        {
            $sourceFile = $jsFile;
            $pathinfo = pathinfo($jsFile);
            $jsDir = realpath($pathinfo['dirname'] . '/../../js');
            $jsFile = $pathinfo['filename'] . '.js';
            $jsFilePath = $jsDir . '/' . $jsFile;
            /**
             * @todo Try to provide more minify options
             */
            $optimizeMode = Zo2Framework::getParam('optimize_js', 0);
            $developmentMode = Zo2Framework::getParam('development_mode', 0);
            if (($optimizeMode == 1) && ( $developmentMode == 0))
            {
                $buffer = file_get_contents($sourceFile);
                $buffer = Zo2HelperCompiler::javascript($buffer);
                if (is_writable($jsFilePath))
                {
                    return JFile::write($jsFilePath, $buffer);
                }
            } else
            {
                /* Just copy if we don't use optimzie */
                return JFile::copy($sourceFile, $jsFilePath);
            }
            return false;
        }

        /**
         * 
         * @return string
         */
        private function _generateStylesheets()
        {
            $combineCss = Zo2Framework::getParam('combine_css', 0);
            $developmentMode = Zo2Framework::getParam('development_mode', 0);
            $cssHtml = array();
            /**
             * Only do combine when asked and not in development mode
             */
            if (( $combineCss == 1) && ($developmentMode == 0))
            {
                $cssName = 'cache/zo2_' . md5(serialize($this->_stylesheets)) . '.css';
                $cssFilePath = JPATH_ROOT . '/' . $cssName;
                $cssUri = rtrim(JUri::root(true), '/') . '/' . $cssName;
                $cssContent = array();
                foreach ($this->_stylesheets as $styleSheets => $path)
                {
                    /* Do not combine vendor stylesheets */
                    if (strpos($path, 'vendor') !== false)
                    {
                        $cssHtml[] = '<link rel="stylesheet" href="' . Zo2Path::getInstance()->toUrl($styleSheets) . '">';
                    } else
                    { /* Combine Zo2 stylesheets */
                        /* Optimize ouput css content */
                        if (Zo2Framework::getParam('optimzie_css', 0) == 1)
                        {
                            $currentCssContent = CssMinifier::minify(file_get_contents($path));
                        } else
                        {
                            $currentCssContent = file_get_contents($path);
                        }
                        $currentCssContent = Zo2HelperAssets::fixCssUrl($currentCssContent, $cssUri, '/' . $styleSheets);
                        $cssContent[] = $currentCssContent;
                    }
                }
                $cssContent = implode(PHP_EOL, $cssContent);
                $cssContent = Zo2HelperAssets::moveCssImportToBeginning($cssContent);
                /* Save to combined css file */
                file_put_contents($cssFilePath, $cssContent);
                $cssHtml[] = '<link rel="stylesheet" href="' . $cssUri . '"></script>';
            } else
            {
                foreach ($this->_stylesheets as $styleSheets => $path)
                {
                    $cssHtml[] = '<link rel="stylesheet" href="' . Zo2Path::getInstance()->toUrl($styleSheets) . '">';
                }
            }
            /* Custom stylesheets */
            $cssDeclarationHtml [] = '<style>';
            foreach ($this->_stylesheetDeclarations as $stylesheetDeclaration)
            {
                if ((Zo2Framework::getParam('optimzie_css', 0) == 1 ) && ($developmentMode == 0))
                {
                    $cssDeclarationHtml [] = CssMinifier::minify($stylesheetDeclaration) . PHP_EOL;
                } else
                {
                    $cssDeclarationHtml [] = ($stylesheetDeclaration ) . PHP_EOL;
                }
            }
            $cssDeclarationHtml [] = '</style>';
            return trim(implode(PHP_EOL, $cssHtml) . PHP_EOL . implode(PHP_EOL, $cssDeclarationHtml));
        }

        /**
         * 
         * @return string
         */
        private function _generateJavascripts()
        {
            $combineJs = Zo2Framework::getParam('combine_js', 0);
            $developmentMode = Zo2Framework::getParam('development_mode', 0);
            $jsHtml = array();
            /**
             * Only do combine when asked and not in development mode
             */
            if (( $combineJs == 1 ) && ($developmentMode == 0))
            {
                $jsFile = 'cache/zo2_' . md5(serialize($this->_javascripts)) . '.js';
                $jsFilePath = JPATH_ROOT . '/' . $jsFile;
                $jsContent = array();
                /**
                 * @todo Cache combined file instead generate it everytimes
                 */
                foreach ($this->_javascripts as $javascript => $path)
                {
                    /* Optimize output javascripts content */
                    if ((Zo2Framework::getParam('optimzie_js', 0) == 1))
                    {
                        $jsContent [] = Zo2HelperCompiler::javascript(file_get_contents($path));
                    } else
                    {
                        $jsContent [] = file_get_contents($path);
                    }
                }
                /* Save to combined file */
                file_put_contents($jsFilePath, implode(PHP_EOL, $jsContent));
                /* Generate HTML to load it */
                $jsHtml[] = '<script type="text/javascript" src="' . rtrim(JUri::root(true), '/') . '/' . $jsFile . '"></script>';
            } else
            {
                /* Just load js files without touching */
                foreach ($this->_javascripts as $javascript => $path)
                {
                    $jsHtml[] = '<script type="text/javascript" src="' . Zo2Path::getInstance()->toUrl($javascript) . '"></script>';
                }
            }
            /* Custom javascripts code */
            $jsDeclarationHtml [] = '<script>jQuery(document).ready( function () {';
            foreach ($this->_javascriptDeclarations as $javascriptDeclaration)
            {
                /* Optimize output javascripts content */
                if ((Zo2Framework::getParam('optimzie_js', 0) == 1))
                {
                    $jsDeclarationHtml[] = Zo2HelperCompiler::javascript($javascriptDeclaration);
                } else
                {
                    $jsDeclarationHtml[] = $javascriptDeclaration;
                }
            }
            $jsDeclarationHtml [] = ' }); </script>';
            return trim(implode(PHP_EOL, $jsHtml) . PHP_EOL . implode(PHP_EOL, $jsDeclarationHtml));
        }

    }

}    