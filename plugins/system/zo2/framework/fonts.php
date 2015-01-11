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

/**
 * Class exists checking
 */
if (!class_exists('Zo2Fonts'))
{

    /**
     * 
     */
    class Zo2Fonts extends JObject
    {

        /**
         * 
         * @return \Zo2Fonts
         */
        public static function getInstance()
        {
            static $instance;
            if (!isset($instance))
            {
                $instance = new Zo2Fonts();
            }
            if (isset($instance))
            {
                return $instance;
            }
        }

        public function addGoogle($name, $value)
        {
            $this->def('google', new JObject());
            return $this->google->set($name, $value);
        }

        /**
         * 
         * @return string
         */
        public function render()
        {
            $properties = $this->getProperties();
            $config = new stdClass();
            foreach ($properties as $key => $value)
            {
                $config->$key = $value;
            }
            if (!empty($properties))
            {
                $html [] = '<script src="//ajax.googleapis.com/ajax/libs/webfont/1/webfont.js"></script>';
                $html [] = '<script>';
                $html [] = ' WebFont.load(' . Zo2HelperEncode::json($config) . ');';
                $html [] = " (function () {
                var wf = document.createElement('script');
                wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                        '://" . ZO2URL_WEBFONT . "';
                wf.type = 'text/javascript';
                wf.async = 'true';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(wf, s);
            })();";
                $html [] = '</script>';
                $html = implode(PHP_EOL, $html);
                return $html;
            }
            return '';
        }

    }

}