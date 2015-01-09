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
if (!class_exists('Zo2HelperString'))
{

    class Zo2HelperString
    {

        public static function getAlias($string)
        {
            $string = JText::_($string);
            $string = JApplicationHelper::stringURLSafe($string);
            return $string;
        }

    }

}