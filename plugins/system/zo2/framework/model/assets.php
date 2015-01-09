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
if (!class_exists('Zo2ModelAssets'))
{

    /**
     * @uses This class used for managed ALL asset stuffs
     * @rule
     * All asset stuffs must be save under <core>|<template>/assets directory
     */
    class Zo2ModelAssets
    {

        /**
         * 
         * @param type $assetsFile
         */
        public function build($assetsFile = 'Zo2://assets/build.json')
        {
            $assetsFilePath = Zo2Path::getInstance()->getPath($assetsFile);
            $assets = Zo2HelperFile::loadJsonFile($assetsFilePath);
            $this->_buildLess($assets);
            $this->_minifyJs($assets);
        }

        /**
         * 
         * @param type $cssFiles
         * @return boolean|string
         */
        public function combineCss($cssFiles)
        {
            // Generate hash file based on configured
            $cssData[] = JFactory::getApplication()->isSite();
            $cssData[] = $cssFiles;
            $cssFileName = Zo2HelperEncode::md5($cssData) . '.css';

            $cssFile = ZO2PATH_CACHE . '/' . $cssFileName;

            $flag = !JFile::exists($cssFile) || Zo2Framework::isDevelopmentMode();
            if ($flag)
            {
                // Combine css
                foreach ($cssFiles as $cssKey => $stylesheet)
                {
                    if (JFile::exists($cssKey))
                    {
                        $cssBuffer [] = Zo2HelperAssets::load($cssKey, $cssFile);
                    }
                }
                if (!empty($cssBuffer))
                {
                    $cssBuffer = implode(PHP_EOL, $cssBuffer);
                    // Minify buffer
                    $cssBuffer = Zo2HelperMinify::css($cssBuffer);
                    JFile::write($cssFile, $cssBuffer);
                }
            }
            if (JFile::exists($cssFile))
            {
                return $cssFileName;
            }
            return false;
        }

        /**
         * 
         * @param type $jsFiles
         * @return boolean|string
         */
        public function combineJs($jsFiles)
        {
            $jsData[] = JFactory::getApplication()->isSite();
            $jsData[] = $jsFiles;
            $jsFileName = Zo2HelperEncode::md5($jsData) . '.js';

            $jsFile = ZO2PATH_CACHE . '/' . $jsFileName;

            $flag = !JFile::exists($jsFile) || Zo2Framework::isDevelopmentMode();
            if ($flag)
            {
                // Combine js
                foreach ($jsFiles as $jsKey => $js)
                {
                    if (JFile::exists($jsKey))
                    {
                        $jsBuffer [] = file_get_contents($jsKey);
                    }
                }
                if (!empty($jsBuffer))
                {
                    $jsBuffer = implode(PHP_EOL, $jsBuffer);
                    // Minify buffer
                    $jsBuffer = Zo2HelperMinify::js($jsBuffer);
                    JFile::write($jsFile, $jsBuffer);
                }
            }
            if (JFile::exists($jsFile))
            {
                return $jsFileName;
            }
            return false;
        }

        /**
         * 
         * @param type $assets
         * @return boolean
         */
        private function _buildLess($assets)
        {
            if (isset($assets->less))
            {
                Zo2Framework::importVendor('lessphp');
                Zo2Framework::importVendor('cssmin');
                foreach ($assets->less as $lessFile)
                {
                    $less = new lessc ();
                    $lessFile = Zo2Path::getInstance()->getPath($lessFile);
                    $pathinfo = pathinfo($lessFile);
                    $cssDir = realpath($pathinfo['dirname'] . '/../css');
                    $cssFile = $pathinfo['filename'] . '.css';
                    $cssMinFile = $pathinfo['filename'] . '.min.css';
                    $cssFilePath = $cssDir . '/' . $cssFile;
                    $cssMinFilePath = $cssDir . '/' . $cssMinFile;
                    $less->addImportDir($pathinfo['dirname'] . '/admin');
                    if ($less->compileFile($lessFile, $cssFilePath))
                    {
                        /* Generate min file */
                        $cssMin = new CSSmin();
                        $buffer = $cssMin->run(file_get_contents($cssFilePath));
                        if (JFile::write($cssMinFilePath, $buffer))
                        {
                            if (Zo2Framework::isDevelopmentMode())
                            {
                                Zo2Framework::message('Minifed file: ' . $cssMinFilePath);
                            }
                        }
                    }
                }
            }
        }

        /**
         * 
         * @param type $assets
         */
        private function _minifyJs($assets)
        {
            if (isset($assets->js))
            {
                foreach ($assets->js as $jsFile)
                {
                    $jsFile = Zo2Path::getInstance()->getPath($jsFile);
                    $pathinfo = pathinfo($jsFile);
                    $jsDir = realpath($pathinfo['dirname']);
                    $jsMinFile = $pathinfo['filename'] . '.min.js';
                    $jsMinFilePath = $jsDir . '/' . $jsMinFile;
                    $buffer = Zo2HelperMinify::jsFile($jsFile);
                    if (JFile::write($jsMinFilePath, $buffer))
                    {
                        if (Zo2Framework::isDevelopmentMode())
                        {
                            Zo2Framework::message('Minifed file: ' . $jsMinFilePath);
                        }
                        return true;
                    }
                }
            }
        }

    }

}