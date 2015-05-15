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
if (!class_exists('Zo2CacheFile'))
{


    class Zo2CacheFile extends Zo2CacheAbstract
    {

        public function getCached($id)
        {
            $cached = $this->_getCached($id);
            if ($cached !== false)
            {
                return $cached;
            }
            return false;
        }

        public function store($id, $data)
        {
            $cacheFilePath = $this->_getCacheFile($id);
            $die = '<?php die("Access Denied"); ?>#x#';

            // Prepend a die string
            $data = $die . $data;

            $_fileopen = @fopen($cacheFilePath, "wb");

            if ($_fileopen)
            {
                $len = strlen($data);
                @fwrite($_fileopen, $data, $len);
                $written = true;
            }

            // Data integrity check
            if ($written && ($data == file_get_contents($cacheFilePath)))
            {
                return true;
            } else
            {
                return false;
            }
        }

        private function _getCacheFile($id)
        {
            $cacheDir = $this->get('cachebase', JPATH_CACHE) . '/zo2';
            $cacheFilename = $this->_getCacheId($id);
            $cacheFilePath = $cacheDir . '/' . $cacheFilename . '.php';
            if (!is_dir($cacheDir))
            {
                JFolder::create($cacheDir);
                return false;
            }
            return $cacheFilePath;
        }

        protected function _getCached($id)
        {
            $cacheFilePath = $this->_getCacheFile($id);
            if ($cacheFilePath)
            {
                if (is_file($cacheFilePath))
                {
                    // Cache expired
                    if ($this->_isExpired($cacheFilePath))
                    {
                        return false;
                    } else
                    {
                        $data = file_get_contents($cacheFilePath);
                        // Remove the initial die() statement
                        $data = str_replace('<?php die("Access Denied"); ?>#x#', '', $data);
                        return $data;
                    }
                }
            }
            return false;
        }

        protected function _isExpired($id)
        {
            if (file_exists($id))
            {
                $time = @filemtime($id);

                // If modified time + lifetime not yet over current time or have no modified time than it's not expired yet
                if (($time + $this->get('lifetime')) < $this->get('now') || empty($time))
                {
                    return false;
                }
                return true;
            }
            return false;
        }

    }

}       
