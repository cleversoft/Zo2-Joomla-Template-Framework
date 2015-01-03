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
if (!class_exists('Zo2HelperFile'))
{

    class Zo2HelperFile
    {

        /**
         * 
         * @param type $jsonFile
         * @param type $jObject
         * @return \JObject
         */
        public static function loadJsonFile($jsonFile, $jObject = false)
        {
            if (JFile::exists($jsonFile))
            {
                $buffer = file_get_contents($jsonFile);
            }
            if ($jObject)
            {
                return new JObject(Zo2HelperEncode::jsonDecode($buffer));
            } else
            {
                return Zo2HelperEncode::jsonDecode($buffer);
            }
        }

    }

}