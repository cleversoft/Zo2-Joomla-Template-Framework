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

/**
 * Class exists checking
 */
if (!class_exists('Zo2HelperCompiler')) {

    /**
     * 
     */
    class Zo2HelperCompiler {

        /**
         * 
         * @param type $inputFile
         * @param type $outputFile
         * @return boolean
         */
        public static function less($inputFile, $outputFile) {
            Zo2Framework::import('vendor.less.lessc');
            if (JFile::exists($inputFile)) {
                $less = new lessc();
                return $less->checkedCompile($inputFile, $outputFile);
            }
            return false;
        }

        public static function javascript() {
            
        }

        public static function styleSheet() {
            
        }

    }

}