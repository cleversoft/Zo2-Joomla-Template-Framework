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

if (!class_exists('Zo2HelperClasses'))
{

    class Zo2HelperClasses
    {

        public static function extract($class)
        {
            $classes = explode(' ', $class);
            $array = array();
            foreach ($classes as $class)
            {
                if (strpos($class, '-') !== false)
                {
                    $parts = explode('-', $class);
                    $array[$parts[0]] = $parts[1];
                } else
                {
                    $array['classes'][] = $class;
                }
            }
            return $array;
        }

    }

}