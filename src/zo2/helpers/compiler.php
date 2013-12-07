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
                return $less->checkedCompile($inputFile, $outputFile);
            }
            return false;
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
                $content = preg_replace('#\s+#', ' ', $content);
                $content = preg_replace('#/\*.*?\*/#s', '', $content);
                $content = str_replace('; ', ';', $content);
                $content = str_replace(': ', ':', $content);
                $content = str_replace(' {', '{', $content);
                $content = str_replace('{ ', '{', $content);
                $content = str_replace(', ', ',', $content);
                $content = str_replace('} ', '}', $content);
                $content = str_replace(';}', '}', $content);
                $pattern = '#url\([\'"]?([a-zA-Z/.-]+)[\'"]?\)#';
                $content = preg_replace($pattern, 'url($1)', $content);
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
                $content = str_replace('; ', ';', str_replace(' }', '}', str_replace('{ ', '{', str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), "", preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', JFile::read($inputFile))))));
                return JFile::write($outputFile, $content);
            }
            return false;
        }

    }

}