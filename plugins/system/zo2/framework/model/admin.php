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
if (!class_exists('Zo2ModelAjax')) {

    /**
     * 
     */
    class Zo2ModelAjax {

        private $_ajax;

        public function __construct() {
            $this->_ajax = Zo2Ajax::getInstance();
        }

        /**
         * 
         */
        public function clearCache() {
            if ($this->_isAuthorized()) {
                if (JFolder::exists(ZO2PATH_CACHE)) {
                    if (JFolder::delete(ZO2PATH_CACHE)) {
                        $this->_ajax->addMessage(JText::_('ZO2_ADMIN_CLEAR_CACHE_SUCCESS'), 'success');
                    } else {
                        $this->_ajax->addMessage(JText::_('ZO2_ADMIN_CLEAR_CACHE_FAILED'), 'error');
                    }
                } else {
                    $this->_ajax->addMessage(JText::_('ZO2_ADMIN_NO_CACHED'), 'info');
                }
            }
            $this->_ajax->response();
        }

        /**
         * 
         */
        public function buildAssets() {
            if ($this->_isAuthorized()) {
                $assets = Zo2Assets::getInstance();
                if ($assets->buildAssets()) {
                    $this->_ajax->addMessage(JText::_('ZO2_ADMIN_BUILD_ASSETS_SUCCESS'), 'success');
                }
            }
            $this->_ajax->response();
        }

        /**
         * 
         */
        public function render() {
            if ($this->_isAuthorized()) {
                $this->_ajax->addHtml(Zo2Html::_('admin', 'config'));
            }
            $this->_ajax->response();
        }

        /**
         * 
         */
        public function renameProfile() {
            if ($this->_isAuthorized()) {
                $jinput = JFactory::getApplication()->input;
                $newProfileName = $jinput->get('newProfileName');
                $profile = Zo2Factory::getProfile();
                if ($profile->rename($newProfileName)) {
                    $this->_ajax->addMessage('Build success', 'success');
                } else {
                    
                }
            }
            $this->_ajax->response();
        }

        public function removeProfile() {
            if ($this->_isAuthorized()) {
                $profile = JFactory::getApplication()->input->getString('profile');
                $templateId = JFactory::getApplication()->input->getInt('templateId');
                $template = Zo2Factory::getTemplate($templateId);
                if ($template) {
                    $profile = JPATH_ROOT . '/templates/' . $template->template . '/assets/profiles/' . $templateId . '/' . $profile . '.json';
                    JFile::delete($profile);
                }
            }
        }

        public function downloadBackup() {
            if ($this->_isAuthorized()) {
                $attachment_location = $this->_getBackupProfiles();
                if (file_exists($attachment_location)) {
                    header("Cache-Control: public"); // needed for i.e.
                    header("Content-Type: application/zip");
                    header("Content-Transfer-Encoding: Binary");
                    header("Content-Length:" . filesize($attachment_location));
                    header("Content-Disposition: attachment; filename=zo2_profiles.zip");
                    readfile($attachment_location);
                    die();
                } else {
                    die("Error: File not found.");
                }
            }
        }

        private function _getBackupProfiles() {
            if ($this->_isAuthorized()) {
                $folder_path = JPATH_ROOT . '/templates/' . Zo2Factory::getTemplateName() . '/assets/profiles';
                $new_folder_name_final = $folder_path . '/../backup.zip';

                $zip = new ZipArchive();

                if ($zip->open($new_folder_name_final, ZIPARCHIVE::CREATE) !== TRUE) {
                    return false;
                }

                $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folder_path));

                foreach ($iterator as $key => $value) {
                    $key = str_replace('\\', '/', $key);
                    if (!is_dir($key)) {
                        if (!$zip->addFile(realpath($key), substr($key, strlen($folder_path) - strlen(basename($folder_path))))) {
                            return false;
                        }
                    }
                }

                return $new_folder_name_final;
            }
        }

        private function _isAuthorized() {
            $app = JFactory::getApplication();
            return ( $app->isAdmin());
        }

    }

}
    