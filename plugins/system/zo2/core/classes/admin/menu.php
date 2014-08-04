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
        return Zo2Factory::getFramework()->displayMegaMenu($menutype, true);
    }

    public static function save() {
        
    }

}
