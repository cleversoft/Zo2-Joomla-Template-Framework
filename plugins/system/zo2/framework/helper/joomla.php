<?php

/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 * 
 * @since       2.0.0
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
if (!class_exists('Zo2HelperJoomla'))
{

    class Zo2HelperJoomla
    {

        /**
         * 
         * @param string $position
         * @return int
         */
        public function countModules($position)
        {
            return count(JModuleHelper::getModules($position));
        }

        /**
         * Check if module is avaiable to render
         * @staticvar type $modules
         * @param type $modName
         * @return boolean
         */
        public function isModuleAvaiable($modName)
        {
            static $modules;
            if (!isset($modules[$modName]))
            {
                $modules[$modName] = JModuleHelper::getModule($modName);
            }
            if ($modules[$modName]->id != 0)
            {
                return true;
            } else
            {
                return false;
            }
        }

    }

}