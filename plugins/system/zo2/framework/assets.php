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
     * Zo2 assets management class
     */
    class Zo2Assets
    {

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
            static $instance;
            if (!isset($instance))
            {
                $instance = new Zo2Assets();
                if (JFactory::getApplication()->isSite())
                {
                    if (!Zo2Framework::getParam('enable_responsive'))
                    {
                        $this->addStyleSheet('Zo2://assets/css/non.responsive.css');
                    }
                    if (Zo2Framework::getParam('enable_rtl'))
                    {
                        $this->addStyleSheet('Zo2://assets/css/rtl.css');
                    }
                }
            }
            if (isset($instance))
            {
                return $instance;
            }
        }

        /**
         * Load assets file
         * @param type $assets
         */
        public function load($assets)
        {
            // Load css
            if (isset($assets->css))
            {
                foreach ($assets->css as $css)
                {
                    $this->addStyleSheet($css);
                }
            }
            // Load js
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
         * @param string $key
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
         * 
         * @param string $style
         * @return \Zo2Assets
         */
        public function addStyleSheetDeclaration($style)
        {
            $this->_stylesheetDeclarations[] = $style;
            return $this;
        }

        /**
         * 
         * @param string $key
         * @return \Zo2Assets
         */
        public function addScript($key)
        {
            $assetFile = Zo2Path::getInstance()->getPath($key);
            if ($assetFile)
            {
                $this->_javascripts[$assetFile] = Zo2Path::getInstance()->getUrl($key);
            }
            return $this;
        }

        /**
         *
         * @param string $script
         * @return \Zo2Assets
         */
        public function addScriptDeclaration($script)
        {
            $this->_javascriptDeclarations[] = $script;
            return $this;
        }

        /**
         * Build assets
         */
        public function build()
        {
            $model = new Zo2ModelAssets();
            $model->build();
        }

        /**
         * 
         */
        private function _prepareRender()
        {

            // CSS optimize
            switch (Zo2Framework::getGlobalParam('enable_combine_css') && (!Zo2Framework::isDevelopmentMode()))
            {
                // Combine to one css file
                case 'file':
                    $model = new Zo2ModelAssets();
                    $cssFileName = $model->combineCss($this->_stylesheets);
                    if ($cssFileName)
                    {
                        // Reset all old stylesheet and replace by combined file 

                        $this->_stylesheets = array();
                        $this->_stylesheets[] = ZO2URL_CACHE . '/' . $cssFileName;
                    }

                    break;
                case 'gzip':
                    $model = new Zo2ModelAssets();
                    $cssFileName = $model->combineCss($this->_stylesheets);
                    // Reset all old stylesheet and replace by combined file 
                    if ($cssFileName)
                    {
                        $this->_stylesheets = array();
                        $this->_stylesheets[] = ZO2URL_ROOT . '/framework/assets/css/gzip.php?cssFile=' . $cssFileName;
                    }
                    break;
            }

            // JS optimize
            switch (Zo2Framework::getGlobalParam('enable_combine_js') && (!Zo2Framework::isDevelopmentMode()))
            {
                case 'file':

                    $model = new Zo2ModelAssets();
                    $jsFileName = $model->combineJs($this->_javascripts);
                    if ($jsFileName)
                    {
                        // Reset all old scripts and replace by combined file 
                        $this->_javascripts = array();
                        $this->_javascripts[] = ZO2URL_CACHE . '/' . $jsFileName;
                    }
                    break;
                case 'gzip':
                    $model = new Zo2ModelAssets();
                    $jsFileName = $model->combineJs($this->_javascripts);
                    // Reset all old stylesheet and replace by combined file 
                    if ($jsFileName)
                    {
                        $this->_javascripts = array();
                        $this->_javascripts[] = ZO2URL_ROOT . '/framework/assets/js/gzip.php?jsFile=' . $jsFileName;
                    }
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
                // Fonts generate
                $fonts = Zo2Fonts::getInstance();
                $assets[] = $fonts->render();
                return implode(PHP_EOL, $assets);
            }
        }

    }

}    