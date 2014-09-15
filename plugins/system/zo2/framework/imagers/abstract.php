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
if (!class_exists('Zo2ImagerAbstract')) {

    /**
     * @package
     * @subpackage
     * @since       0.5
     */
    abstract class Zo2ImagerAbstract extends JObject {

        /**
         * Class destruction
         */
        public function __destruct() {
            $this->close();
        }

        /**
         * Load image from file
         * @param string $filename
         * @return boolean
         */
        public function load($filename) {
            /* Split allow extension to array */
            $allowedExt = array('png', 'jpg', 'jpeg');
            /* Get extension from file name */
            $this->set('imageType', strtolower(JFile::getExt($filename)));
            /* Check extension is allowed */
            if (in_array($this->get('imageType', 'undefined'), $allowedExt)) {
                $this->set('imageFile', $filename);
                $this->set('error', false);
                return $this->open();
            } else {
                $this->set('imageFile', 'undefined');
                $this->set('error', true);
                return $this;
            }
        }

        /**
         * Open image file
         */
        abstract public function open();

        /**
         * Release resource
         */
        abstract public function close();

        /**
         * Resize an image
         */
        abstract public function resize($newWidth = null, $newHeight = null);

        /**
         * Crop an image
         */
        abstract public function crop($width = 64, $height = 64, $cord = 'center');

        /**
         * Get cord from string
         * @param int $width
         * @param int $height
         * @param string $cord
         * @return array
         */
        public function getCordFromString($width = 64, $height = 64, $cord = 'center') {
            /* Return array */
            $retArea = array();
            /* Get mid */
            $midleWidth = (int) round(($this->getWidth() - $width) / 2);
            $midleHeight = (int) round(($this->getHeight() - $height) / 2);
            $retArea['w'] = (int) $width;
            $retArea['h'] = (int) $height;
            switch ($cord) {
                case 'left':
                    $retArea['x'] = 0;
                    $retArea['y'] = $midleHeight;
                    break;
                case 'top':
                    $retArea['x'] = $midleWidth;
                    $retArea['y'] = 0;
                    break;
                case 'bottom':
                    $retArea['x'] = $midleWidth;
                    $retArea['y'] = $this->getHeight() - $height;
                    break;
                case 'right':
                    $retArea['x'] = $this->getWidth() - $width;
                    $retArea['y'] = $midleHeight;
                    break;
                case 'center':
                    $retArea['x'] = $midleWidth;
                    $retArea['y'] = $midleHeight;
                    break;
                default :
                    $arrayArea = explode(':', $cord);
                    if (count($arrayArea) == 2) {
                        $retArea['x'] = (int) trim($arrayArea[0]);
                        $retArea['y'] = (int) trim($arrayArea[1]);
                    } else {
                        $retArea['x'] = $midleWidth;
                        $retArea['y'] = $midleHeight;
                    }
                    break;
            }

            /* Crop area width is biger than original */
            if ($retArea['x'] < 0) {
                $retArea['x'] = 0;
                $retArea['w'] = (int) $this->getWidth();
            }
            /* Crop area height is biger than original */
            if ($retArea['y'] < 0) {
                $retArea['y'] = 0;
                $retArea['h'] = (int) $this->getHeight();
            }
            return $retArea;
        }

        /**
         * Save image form memmory to file
         */
        abstract public function saveToFile($saveFile);

        /**
         * Render image without saving
         */
        abstract public function render();

        /**
         * Add watermark to loaded image
         */
        abstract public function addWatermark($watermark, $cord = 'center');

        /**
         * Get image resource
         */
        abstract public function getResource();

        /**
         * Get original width
         * @return int
         */
        public function getWidth() {
            return $this->get('width', 0);
        }

        /**
         * Get original height
         * @return int
         */
        public function getHeight() {
            return $this->get('height', 0);
        }

        public function isError() {
            return $this->get('error', true);
        }

    }

}