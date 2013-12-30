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
defined('_JEXEC') or die;
Zo2Framework::import('vendor.less.lessc');
Zo2Framework::import('vendor.minify.css');
/**
 * Class exists checking
 */
if (!class_exists('Zo2HelperCompiler')) {

    /**
     *
     */
    class Zo2HelperCompiler {

        /**
         * Compile less -> css 
         * @param str $inputFile
         * @param str $outputFile
         * @return boolean
         */
        public static function less($inputFile, $outputFile) {
            if (JFile::exists($inputFile)) {
                $less = new lessc();
                return $less->compileFile($inputFile, $outputFile);
            }
            return false;
        }

        public static function lessStyle($input)
        {
            $less = new lessc();
            return $less->compile($input);
        }

        /**
         * Compress javascript
         * @param string $inputFile
         * @param string $outputFile
         * @todo Remove warnning
         * @return boolean
         */
        public static function javascript($inputFile, $outputFile) {
            if (JFile::exists($inputFile) && (!is_file($outputFile) || filemtime($inputFile) > filemtime($outputFile))) {
                $content = JFile::read($inputFile);
                /**
                 * @todo apply javascript compress method here
                 */
                return JFile::write($outputFile, $content);
            }
            return false;
        }

        /**
         * Compress style styleSheet
         * @param str $inputFile
         * @param str $outputFile
         * @todo Make it easier to read and upgrade
         * @return boolean
         */
        public static function styleSheet($inputFile, $outputFile) {
            if (JFile::exists($inputFile) && (!is_file($outputFile) || filemtime($inputFile) > filemtime($outputFile))) {
                $content = file_get_contents($inputFile);
                $content = CssMinifier::minify($content);
                return JFile::write($outputFile, $content);
            }
            return false;
        }

    }

}