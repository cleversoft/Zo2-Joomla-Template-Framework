<?php

/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @version     1.4.3
 * @since       1.4.3
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
if (!class_exists('Zo2HtmlAdmin')) {

    /**
     * @uses    Render HTML for backend template administration
     * @since 1.4.3
     */
    class Zo2HtmlAdmin {

        public function render() {
            /**
             * @uses    Anything need prepred for display will put here. Do not put process code insite layout template file
             */
            $html = new Zo2Html();
            $params = Zo2Factory::getFramework()->template->params;
            $html->set('params', $params);
            return $html->fetch('admin/default.php');
        }

        /**
         * Admin layout builder
         * @return type
         */
        public function builder() {
            $assets = Zo2Assets::getInstance();
            /* jQueryUI */
            $assets->addScript('vendor/jqueryui/js/jquery-ui-1.10.3.custom.min.js');
            $assets->addStyleSheet('vendor/jqueryui/css/jquery-ui-1.10.3.custom.min.css');

            $assets->addScript('vendor/bootbox-3.3.0.min.js');
            $assets->addScript('zo2/js/adminlayout.min.js');

            $assets->addStyleSheet('vendor/bootstrap/core/css/bootstrap.gridsystem.css');
            /**
             * @uses    Anything need prepred for display will put here. Do not put process code insite layout template file
             */
            $html = new Zo2Html();

            $params = Zo2Factory::getFramework()->template->params;
            $profile = Zo2Factory::getProfile();
            if (is_object($profile->layout)) {
                $layoutData = $profile->layout->layout;
            } else {
                $layoutData = $profile->layout;
            }

            $html->set('params', $params);
            $html->set('layoutData', $layoutData);
            return $html->fetch('admin/body/sidebar/builder/layout.php');
        }

    }

}