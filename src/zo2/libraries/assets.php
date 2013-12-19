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
if (!class_exists('Zo2Assets')) {

    /**
     * Provide methods to work with Zo2 Framework & Zo2 Template paths
     */
    class Zo2Assets extends Zo2Path {

        /**
         * Get asset file path or url
         * @param type $file
         * @param type $type
         * @return string
         */
        public function getAssetFile($file, $type = 'file') {
            $paths[] = $this->get('zo2Root') . '/assets/' . $file;
            $paths[] = $this->get('siteTemplate') . '/assets/' . $file;
            foreach ($paths as $path) {
                $physicalPath = $this->getPath($path);
                if (JFile::exists($physicalPath)) {
                    break;
                }
            }
            if ($type === 'file') {
                return $this->getPath($path);
            } else {
                return $this->getUrl($path);
            }
        }

    }

}