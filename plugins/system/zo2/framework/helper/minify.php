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
if (!class_exists('Zo2HelperMinify'))
{

    class Zo2HelperMinify
    {

        public static function css($css)
        {
            Zo2Framework::importVendor('cssmin');
            $cssMin = new CSSmin();
            return $cssMin->run($css);
        }

        public static function cssFile($cssFile)
        {
            self::css(file_get_contents($cssFile));
        }

        public static function js($js)
        {
            Zo2Framework::importVendor('jshrink');
            $minifier = new \JShrink\Minifier();
            return $minifier->minify($js);
        }

        public static function jsFile($jsFile)
        {
            return self::js(file_get_contents($jsFile));
        }

    }

}