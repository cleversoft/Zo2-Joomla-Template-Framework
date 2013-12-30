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
defined('_JEXEC') or die('Restricted access');

/**
 * Class exists checking
 */
if (!class_exists('Zo2Template')) {

    /**
     * 
     */
    class Zo2Template extends Zo2Path {

        public function toDataAttributes() {
            $properties = $this->getProperties();
            $html = '';
            foreach ($properties as $key => $value) {
                $html .= 'data-' . $key . '="' . $value . '" ';
            }
            return trim($html);
        }

        /**
         * 
         * @param type $tmplFile
         * @return string
         */
        public function fetch($tmplFile) {
            $tmplFilePath = $this->getPath($tmplFile);
            if (JFile::exists($tmplFile)) {
                ob_start();
                include $tmplFile;
                $buffer = ob_get_contents();
                ob_end_clean();
                return $buffer;
            } else {
                return 'File not found: ' . $tmplFilePath;
            }
        }

    }

}