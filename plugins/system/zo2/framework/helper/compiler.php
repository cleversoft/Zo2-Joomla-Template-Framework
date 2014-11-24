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
defined('_JEXEC') or die;
Zo2Factory::import('vendor.less.lessc');
Zo2Factory::import('vendor.minify.css');
Zo2Factory::import('vendor.minify.minifier');
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
                $less->setImportDir(array(dirname($inputFile)));
                return $less->compileFile($inputFile, $outputFile);
            }
            return false;
        }

        public static function lessStyle($input) {
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
        public static function javascript($js) {
           return \JShrink\Minifier::minify($js);
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