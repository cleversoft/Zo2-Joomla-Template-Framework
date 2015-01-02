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
         *
         * @param type $file
         * @return \Zo2Assets
         */
        public function addStyleSheet($key)
        {
            $assetFile = Zo2Path::getInstance()->getPath($key);
            if ($assetFile)
            {
                $this->_stylesheets[$assetFile] = Zo2Path::getInstance()->getUrl($key);
            }
            return $this;
        }

        /**
         * @todo Should we allow add less ?
         * @param type $style
         * @param bool $less
         * @return \Zo2Assets
         */
        public function addStyleSheetDeclaration($style)
        {
            $this->_stylesheetDeclarations[] = $style;
            return $this;
        }

        /**
         * @param type $file
         *
         * @return \Zo2Assets
         */
        public function addScript($key)
        {
            $assetFile = Zo2Path::getInstance()->getPath($key);
            if ($assetFile != false)
            {
                $this->_javascripts[$assetFile] = Zo2Path::getInstance()->getUrl($key);
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

        public function build()
        {
            $model = new Zo2ModelAssets();
            $model->build();
        }

        private function _prepareRender()
        {

            switch (Zo2Framework::getGlobalParam('enable_combine_css'))
            {
                // Combine to one css file
                case 'file':
                    // Generate hash file based on configured
                    $cssData[] = JFactory::getApplication()->isSite();
                    $cssData[] = Zo2Framework::getGlobalParam('enable_minify_css');
                    $cssData[] = $this->_stylesheets;
                    $cssFileName = Zo2HelperEncode::md5($cssData) . '.css';
                    $jsData[] = JFactory::getApplication()->isSite();
                    $jsData[] = Zo2Framework::getGlobalParam('enable_minify_js');
                    $jsData[] = $this->_javascripts;
                    $jsFileName = Zo2HelperEncode::md5($jsData) . '.js';

                    $cssFile = ZO2PATH_CACHE . '/' . $cssFileName;
                    $jsFile = ZO2PATH_CACHE . '/' . $jsFileName;

                    $flag = !JFile::exists($cssFile) || Zo2Framework::isDevelopmentMode();
                    if ($flag)
                    {
                        // Combine css
                        foreach ($this->_stylesheets as $cssKey => $stylesheet)
                        {
                            if (JFile::exists($cssKey))
                            {
                                $cssBuffer [] = file_get_contents($cssKey);
                            }
                        }
                        if (!empty($cssBuffer))
                        {
                            $cssBuffer = implode(PHP_EOL, $cssBuffer);
                            if (Zo2Framework::getGlobalParam('enable_minify_css'))
                            {
                                $cssBuffer = Zo2HelperMinify::css($cssBuffer);
                            }
                            JFile::write($cssFile, $cssBuffer);
                        }
                        // Combine js
                        foreach ($this->_javascripts as $jsKey => $js)
                        {
                            if (JFile::exists($jsKey))
                            {
                                $jsBuffer [] = file_get_contents($jsKey);
                            }
                        }
                        if (!empty($jsBuffer))
                        {
                            $jsBuffer = implode(PHP_EOL, $jsBuffer);
                            if (Zo2Framework::getGlobalParam('enable_minify_js'))
                            {
                                $jsBuffer = Zo2HelperMinify::css($jsBuffer);
                            }
                            JFile::write($jsFile, $jsBuffer);
                        }
                    }
// Reset all old stylesheet and replace by combined file 
                    $this->_stylesheets = array();
                    $this->_stylesheets[] = ZO2URL_CACHE . '/' . $cssFileName;
                    $this->_javascripts = array();
                    $this->_javascripts[] = ZO2URL_CACHE . '/' . $jsFileName;
                    break;
            }
        }

        /**
         * Generate assets code
         * @return type
         */
        public function render()
        {
            $this->_prepareRender();
            {

                foreach ($this->_stylesheets as $url)
                {
                    $assets[] = '<link rel="stylesheet" href="' . $url . '" type="text/css" />';
                }
                foreach ($this->_javascripts as $url)
                {
                    $assets[] = '<script src="' . $url . '" type="text/javascript"></script>';
                }

                return implode(PHP_EOL, $assets);
            }
        }

    }

}    