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

if (!class_exists('Zo2ModelSiteMegamenu'))
{
    Zo2Framework::importVendor('t3');

    class Zo2ModelSiteMegamenu
    {

        /**
         * @todo Move addStylesheet & addScript into this function
         * @param type $menuType
         * @param type $configs
         * @param type $params
         * @return type
         */
        public function render($menuType = 'mainmenu', $configs = array(), $params = array())
        {
            $megamenu = new T3MenuMegamenu($menuType, $configs, $params);
            return $megamenu->render(true);
        }

    }

}