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
if (!class_exists('Zo2HelperAssets'))
{

    class Zo2HelperAssets
    {

        /**
         * @var string
         */
        protected static $_srcPath;
        protected static $_pattern = '/url\(\s*[\'"]?(?![a-z]+:|\/+)([^\'")]+)[\'"]?\s*\)/i';

        /**
         * 
         * @param type $cssFile
         * @return type
         */
        public static function load($cssFile)
        {
            self::$_srcPath = dirname($cssFile);

            $buffer = preg_replace_callback(self::$_pattern, array('self', 'rewrite'), file_get_contents($cssFile));
            return $buffer;
        }

        /**
         * 
         * @param type $matches
         * @return type
         */
        public static function rewrite($matches)
        {
            if (isset($matches[1]))
            {
                $correctRelativeUrl = explode('/', self::toRelativeUrl(self::$_srcPath));
                // External link
                if (strpos($matches[1], '://'))
                    return $matches[0];
                $parts = explode('/', $matches[1]);
                $newUrl = array();
                foreach ($parts as $part)
                {
                    if ($part == '..')
                    {
                        array_pop($correctRelativeUrl);
                    } else
                    {
                        $newUrl[] = $part;
                    }
                }
                $newUrl = implode('/', $newUrl);
                $correctRelativeUrl = implode('/', $correctRelativeUrl);
                $newUrl = $correctRelativeUrl . '/' . $newUrl;
                return 'url(' . $newUrl . ')';
            }
        }

        /**
         * 
         * @param type $physical
         * @return type
         */
        public static function toRelativeUrl($physical)
        {
            return Zo2Path::getInstance()->toUrl($physical, true);
        }

    }

}