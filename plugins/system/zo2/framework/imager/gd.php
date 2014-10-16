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
if (!class_exists('Zo2ImagerGd')) {

    /**
     * Imager with PHP GD
     * @package
     * @subpackage
     * @since       0.5
     */
    class Zo2ImagerGd extends Zo2ImagerAbstract {

        /**
         * @var type Image resource
         */
        private $_resource = null;

        /**
         * Check gd is installed
         * @return boolean
         */
        public static function isInstalled() {
            return extension_loaded('gd') && function_exists('gd_info');
        }

        /**
         * Open image from file
         * @return \Zo2ImagerGd
         */
        public function open() {
            /* Set error */
            $this->set('error', true);
            /* Get image  type and file */
            $imageType = $this->get('imageType', 'undefined');
            $imageFile = $this->get('imageFile', 'undefined');
            /* Type and filename is valid */
            if ($imageType != 'undefined' && $imageFile != 'undefined') {
                /* Callback function list */
                $callback = array('jpg' => 'imagecreatefromjpeg',
                    'jpeg' => 'imagecreatefromjpeg',
                    'gif' => 'imagecreatefromgif',
                    'bmp' => 'imagecreatefromwbmp',
                    'png' => 'imagecreatefrompng'
                );
                /* File type isn't supported */
                if (isset($callback[$imageType]) && function_exists($callback[$imageType])) {
                    $this->_resource = $callback[$imageType]($imageFile);
                    /* Resource is valid */
                    if (is_resource($this->_resource)) {
                        /* Get image widh height */
                        $imageInfo = getimagesize($imageFile);
                        $width = $imageInfo[0];
                        $height = $imageInfo[1];
                        $this->set('width', $width);
                        $this->set('height', $height);
                        $this->set('imageMIME', $imageInfo['mime']);
                        /* Check valid image */
                        if (is_numeric($width) && is_numeric($height) && $width > 0 && $height > 0)
                            $this->set('error', false);
                    }
                }
            }
            return $this;
        }

        /**
         * Release resource
         */
        public function close() {
            if (is_resource($this->_resource)) {
                imagedestroy($this->_resource);
            }
            /* Reset all fields */
            $this->set('width', 0);
            $this->set('height', 0);
            $this->set('imageMIME', '');
            $this->set('imageType', '');
            $this->set('imageFile', '');
            $this->set('error', false);
        }

        /**
         * Resize image to newsize, if one param equal null or 0, keep image ratio.
         * @param int $newWidth
         * @param int $newHeight
         * @return \Zo2ImagerGd
         */
        public function resize($newWidth = null, $newHeight = null) {
            /* Set error */
            $this->set('error', true);
            /* Invalid size */
            if (($newWidth <= 0 && $newHeight <= 0) || ( $newWidth == null && $newHeight == null ))
                return $this;
            /* Keep image raito if need */
            if ($newWidth <= 0 || $newWidth == null)
                $newWidth = round(($newHeight * $this->getWidth()) / $this->getHeight());
            if ($newHeight <= 0 || $newHeight == null)
                $newHeight = round(($newWidth * $this->getHeight()) / $this->getWidth());
            /* Resouce is valid */
            if (is_resource($this->_resource)) {
                /* Create an empty image */
                $tmpResouce = imagecreatetruecolor($newWidth, $newHeight);
                /* Check resource valid */
                if (is_resource($tmpResouce)) {
                    /* Resize image */
                    if (imagecopyresized($tmpResouce, $this->_resource, 0, 0, 0, 0, $newWidth, $newHeight, $this->getWidth(), $this->getHeight())) {
                        if ($this->_updateResouce($tmpResouce)) {
                            $this->set('width', $newWidth);
                            $this->set('height', $newHeight);
                            $this->set('error', false);
                        }
                    }
                }
            }
            return $this;
        }

        /**
         * Crop image from loaded image
         * @param int $width
         * @param int $height
         * @param string $cord Support center, left, right, bottom, customize "X:Y"
         * @return \Zo2ImagerGd
         */
        public function crop($width = 64, $height = 64, $cord = 'center') {
            /* Set error */
            $this->set('error', true);
            /* Get crop area from string */
            $cropArea = $this->getCordFromString($width, $height, $cord);
            /* Check crop area valid */
            if (is_array($cropArea) && is_resource($this->_resource) && $cropArea['w'] > 0 && $cropArea['h'] > 0) {
                /* Create an empty image */
                $tmpResource = imagecreatetruecolor($cropArea['w'], $cropArea['h']);
                /* Check image valid */
                if (is_resource($tmpResource)) {
                    /* Crop image */
                    if (imagecopy($tmpResource, $this->_resource, 0, 0, $cropArea['x'], $cropArea['y'], $cropArea['w'], $cropArea['h'])) {
                        if ($this->_updateResouce($tmpResource)) {
                            $this->set('width', $cropArea['w']);
                            $this->set('height', $cropArea['h']);
                            $this->set('error', false);
                        }
                    }
                }
            }
            return $this;
        }

        /**
         * Add water mark to image
         * @param string $watermark
         * @param string $cord
         * @return \Zo2ImagerGd
         */
        public function addWatermark($watermark, $cord = 'center') {
            /* Set error */
            $this->set('error', true);
            /* Callback function list */
            $callback = array('jpg' => 'imagecreatefromjpeg',
                'jpeg' => 'imagecreatefromjpeg',
                'gif' => 'imagecreatefromgif',
                'bmp' => 'imagecreatefromwbmp',
                'png' => 'imagecreatefrompng'
            );
            if (is_resource($watermark)) {
                $wmWidth = imagesx($watermark);
                $wmHeight = imagesy($watermark);
                $watermarkResource = $watermark;
            } else {
                if (is_string($watermark) && file_exists($watermark)) {
                    list($wmWidth, $wmHeight) = getimagesize($watermark);
                    $fileType = strtolower(JFile::getExt($watermark));
                    if (isset($callback[$fileType]) && function_exists($callback[$fileType])) {
                        $watermarkResource = $callback[$fileType]($watermark);
                    }
                } else {
                    return $this;
                }
            }
            /* Limit watermark size */
            if (($wmWidth + 10) < $this->getWidth() && ($wmHeight + 10) < $this->getHeight()) {
                /* Get cord from string */
                $postWM = $this->getCordFromString($wmWidth, $wmHeight, $cord);
                /* Check valid postision */
                if (is_array($postWM) && is_resource($this->_resource) && $postWM['w'] > 0 && $postWM['h'] > 0) {
                    /* Create an image */
                    $tmpResource = imagecreatetruecolor($this->getWidth(), $this->getHeight());
                    /* Create fail */
                    if (is_resource($tmpResource)) {
                        /* Create output */
                        if (imagecopy($tmpResource, $this->_resource, 0, 0, 0, 0, $this->getWidth(), $this->getHeight())) {
                            $postX = ($postWM['x'] == 0) ? 10 : $postWM['x'];
                            $postY = ($postWM['y'] == 0) ? 10 : $postWM['y'];
                            /* Add water mark */
                            if (imagecopy($tmpResource, $watermarkResource, $postX, $postY, 0, 0, $wmWidth, $wmHeight)) {
                                $this->_updateResouce($tmpResource);
                                $this->set('error', false);
                            }
                        }
                    }
                }
            }
            return $this;
        }

        /**
         * Get image resource
         */
        public function getResource() {
            return $this->_resource;
        }

        /**
         * Save output to file
         * @param string $saveFile
         * @return boolean
         */
        public function saveToFile($saveFile) {
            return $this->render($saveFile);
        }

        /**
         * Render image directly
         * @param string $filename
         * @return boolean
         */
        public function render($filename = null) {
            /* Get image  type */
            $imageType = $this->get('imageType', 'undefined');
            /* Callback function list */
            $callback = array('jpg' => 'imagejpeg',
                'jpeg' => 'imagejpeg',
                'gif' => 'imagegif',
                'bmp' => 'imagewbmp',
                'png' => 'imagepng'
            );
            $retVal = false;
            /* Callback isn't existed */
            if (isset($callback[$imageType]) && is_resource($this->_resource) && function_exists($callback[$imageType])) {
                /* Change header field */
                if ($filename == null)
                    header("Content-Type: " . $this->get('imageMIME', 'image/jpeg'));
                /* Image quality */
                if ($imageType == 'jpg' || $imageType == 'jpeg') {
                    $retVal = $callback[$imageType]($this->_resource, $filename, 100);
                } else {
                    $retVal = $callback[$imageType]($this->_resource, $filename);
                }
                /* Exit if render only */
                if ($filename == null) {
                    /* Release resource */
                    $this->close();
                    /* Make sure we are exit */
                    exit();
                }
            }
            return $retVal;
        }

        /**
         * Update resource
         * @param imageresource $resource
         * @return boolean
         */
        private function _updateResouce($resource) {
            /* Check resouce valid */
            if (is_resource($resource)) {
                /* Release old resource */
                if (is_resource($this->_resource))
                    imagedestroy($this->_resource);
                /* Assign new resource */
                $this->_resource = $resource;
                return true;
            }
            return false;
        }

    }

}