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
            return $html->fetch('admin/default.php');
        }

    }

}