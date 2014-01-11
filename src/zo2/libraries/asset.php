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
if (!class_exists('Zo2Asset')) {


    /**
     * Base asset object
     */
    class Zo2Asset extends JObject {

        /**
         * Load asset into assets list
         */
        public function load() {
            $application = JFactory::getApplication();
            if (isset($this->loadIn['frontend'])) {
                $loadInFrontend = $this->loadIn['frontend'];
            }
            if (isset($this->loadIn['backend'])) {
                $loadInBackend = $this->loadIn['backend'];
            }
            /* Frontend */
            if ($application->isSite()) {
                if (isset($loadInFrontend)) {
                    foreach ($loadInFrontend as $version) {
                        if ($this->_isMatchJVersion($version)) {
                            $this->_add($this->path, $this->type);
                            $this->_loadDependencies();
                        }
                    }
                }
            } else { /* Backend */
                if (isset($loadInBackend)) {
                    foreach ($loadInBackend as $version) {
                        if ($this->_isMatchJVersion($version)) {
                            $this->_add($this->path, $this->type);
                            $this->_loadDependencies();
                        }
                    }
                }
            }
        }

        /**
         * 
         * @param type $path
         * @param type $type
         */
        private function _add($path, $type) {
            $assets = Zo2Assets::getInstance();
            if ($type == 'css') {
                $assets->addStyleSheet($path);
            } else {
                $assets->addScript($path);
            }
        }

        private function _loadDependencies() {
            foreach ($this->dependencies as $dependency) {
                foreach ($dependency as $item) {
                    $this->_add($item['path'], $item['type']);
                }
            }
        }

        private function _isMatchJVersion($version) {
            $jVer = new JVersion();
            $jVer = explode('.', $jVer->RELEASE);
            $version = explode('.', $version);
            /* Match major version */
            if ($version[0] == '*')
                return true;
            if ($jVer[0] == $version[0]) {
                if ($version[1] == '*')
                    return true;
                else {
                    return $jVer[1] >= $version[1];
                }
            }
            return false;
        }

    }

}