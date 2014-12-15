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
 * */
defined('_JEXEC') or die('resticted aceess');

class AdminMenu {

    /**
     * @todo Move to libraries
     * @return type
     */
    public static function display() {
        $input = JFactory::getApplication()->input;
        $menutype = $input->get('menutype', 'mainmenu');
        $ajax = Zo2Ajax::getInstance();
        $ajax->addHtml(Zo2Factory::getFramework()->displayMegaMenu($menutype, true), '#zo2-admin-mm-container');
        $ajax->response();
    }

    public static function save() {
        
    }

}
