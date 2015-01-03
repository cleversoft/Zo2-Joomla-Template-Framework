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
         * Build all assets
         */
        public function build()
        {
            $assets = Zo2Path::getInstance()->getPath('Zo2://assets/build.json');
            $assets = json_decode(file_get_contents($assets));
            $this->_buildLess($assets);
            $this->_minifyJs($assets);
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
                            return true;
                        }
                    }
                }
            }
            return false;
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