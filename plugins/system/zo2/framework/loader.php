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

if (!class_exists('Zo2Loader'))
{

    class Zo2Loader
    {

        /**
         * 
         * @param string $className
         */
        public static function autoloadZo2Psr2($className)
        {
            if (substr($className, 0, 1) != 'J')
            {
                $path = Zo2Path::getInstance();
                $filePath = $path->getPathByClassname($className);
                if ($filePath)
                {
                    require_once $filePath;
                }
            }
        }

    }

}