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
if (!class_exists('Zo2HtmlAdmin'))
{

    /**
     * @uses    Render HTML for backend template administration
     * @since 1.4.3
     */
    class Zo2HtmlAdmin
    {

        /**
         * @uses    Anything need prepred for display will put here. Do not put process code insite layout template file
         */
        public function config()
        {
            $html = new Zo2Html();
            $params = Zo2Framework::getInstance()->template->params;
            $html->set('params', $params);
            return $html->fetch('admin/default.php');
        }

        /**
         * @uses    Anything need prepred for display will put here. Do not put process code insite layout template file
         */
        public function about()
        {
            $html = new Zo2Html();
            $params = Zo2Framework::getInstance()->template->params;
            $html->set('params', $params);
            return $html->fetch('admin/about.php');
        }

        /**
         * Admin layout builder
         * @return type
         */
        public function builder()
        {
            $assets = Zo2Assets::getInstance();

            $assets->addScript('vendor/bootbox-3.3.0.min.js');
            $assets->addScript('zo2/js/adminlayout.min.js');

            $assets->addStyleSheet('vendor/bootstrap/core/css/bootstrap.gridsystem.css');
            /**
             * @uses    Anything need prepred for display will put here. Do not put process code insite layout template file
             */
            $html = new Zo2Html();

            $params = Zo2Framework::getInstance()->template->params;
            $profile = Zo2Factory::getProfile();

            if (is_object($profile->layout))
            {
                $layoutData = $profile->layout->layout;
            } else
            {
                $layoutData = $profile->layout;
            }

            $html->set('params', $params);
            $html->set('layoutData', $layoutData);
            return $html->fetch('admin/body/sidebar/builder/layout.php');
        }

    }

}