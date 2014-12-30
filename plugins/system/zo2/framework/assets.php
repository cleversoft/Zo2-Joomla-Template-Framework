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

        private function _prepareRender()
        {
            if (Zo2Framework::getInstance()->template->params->get('enable_scripts_minify'))
            {
                foreach ($this->_stylesheets as $path => $url)
                {
                    $assets[] = '<link rel="stylesheet" href="' . $url . '" type="text/css" />';
                }
                foreach ($this->_javascripts as $path => $url)
                {
                    $assets[] = '';
                }
            }
        }

        /**
         * Generate assets code
         * @return type
         */
        public function render()
        {
            $optimze = Zo2Framework::getInstance()->profile->get('enable_scripts_optimize', 'none');
            $assets = array();
            switch ($optimze)
            {
                case 'gzip':
                    $assets[] = '<link rel="stylesheet" href="' . Zo2Path::getInstance()->getUrl('Template://css/gzip.php') . '" type="text/css" />';
                    $assets[] = '<script src="' . Zo2Path::getInstance()->getUrl('Template://js/gzip.php') . '" type="text/javascript"></script>';
                    break;
                case 'files_combie':
                    $assets[] = '<link rel="stylesheet" href="' . Zo2Path::getInstance()->getUrl('Template://css/combined.css') . '" type="text/css" />';
                    $assets[] = '<script src="' . Zo2Path::getInstance()->getUrl('Template://js/combined.js') . '" type="text/javascript"></script>';
                    break;
                case 'none':
                default:
                    foreach ($this->_stylesheets as $path => $url)
                    {
                        $assets[] = '<link rel="stylesheet" href="' . $url . '" type="text/css" />';
                    }
                    foreach ($this->_javascripts as $path => $url)
                    {
                        $assets[] = '<script src="' . $url . '" type="text/javascript"></script>';
                    }
            }
            return implode(PHP_EOL, $assets);
        }

    }

}    