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

if (!class_exists('JFormFieldLayout')) {

    class JFormFieldLayout extends JFormField {

        protected $type = 'Layout';

        /**
         * Get the html for input
         *
         * @return string
         */
        public function getInput() {

            $assets = Zo2Assets::getInstance();
            /* jQueryUI */
            $assets->addScript('vendor/jqueryui/js/jquery-ui-1.10.3.custom.min.js');
            $assets->addStyleSheet('vendor/jqueryui/css/jquery-ui-1.10.3.custom.min.css');

            $assets->addScript('vendor/bootbox-3.3.0.min.js');
            $assets->addScript('zo2/js/adminlayout.min.js');

            $assets->addStyleSheet('vendor/bootstrap/core/css/bootstrap.gridsystem.css');

            return $this->_build();
        }

        /**
         * Return this form label.
         * In this case, label is empty
         *
         * @return string
         */
        public function getLabel() {
            return '';
        }

        /**
         * Get html for layout builder
         * @return type
         */
        protected function _build() {
            $framework = Zo2Factory::getFramework();
            $jinput = JFactory::getApplication()->input;
            $path = Zo2Path::getInstance();

            $positions = $framework->getTemplatePositions();

            $templatePath = Zo2Factory::getPath('templates://');

            $profile = Zo2Factory::getProfile();
            if (is_object($profile->layout)) {
                $layoutData = $profile->layout->layout;
            } else {
                $layoutData = $profile->layout;
            }

            $layoutFile = $path->getPath('html://layouts/formfield.layout.php');

            // generate list of custom module style
            $customModuleStylePath = $templatePath . '/html/modules.php';
            if (file_exists($customModuleStylePath))
                include_once $customModuleStylePath;
            $definedFunctions = get_defined_functions();
            $definedUserFunctions = $definedFunctions['user'];
            $customStyles = array();

            for ($i = 0, $total = count($definedUserFunctions); $i < $total; $i++) {
                if (strpos(strtolower($definedUserFunctions[$i]), 'modchrome_') !== false) {
                    $customStyles[] = substr($definedUserFunctions[$i], 10);
                }
            }

            // generate the html for layout builder
            ob_start();
            include($layoutFile);
            $html = ob_get_contents();
            ob_end_clean();
            return $html;
        }

        /**
         * Generate layout
         *
         * @param $data
         */
        public function renderLayout($data) {
            $template = new Zo2Template();
            foreach ($data as $row) {
                $template->set('row', $row);
                echo $template->fetch('html://layouts/formfield.layout.row.php');
            }
        }

    }

}