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
if (!class_exists('Zo2HelperLayoutbuilder'))
{

    class Zo2HelperLayoutbuilder
    {

        public static function getZo2Statements()
        {
            $dir = Zo2Path::getInstance()->getPath('Zo2://html/site/jdoc');
            $files = JFolder::files($dir);
            $list = array();
            foreach ($files as $file)
            {
                $name = JFile::stripExt(basename($file));
                $list[$name] = 'ZO2_ADMIN_LAYOUTBUILDER_SETTINGS_JDOC_' . strtoupper($name);
            }
            return $list;
        }

        public static function getModuleStyles()
        {
            $array = array(
                'none', 'html5', 'table', 'horz', 'xhtml', 'rounded', 'outline', 'zo2', 'offcanvas'
            );
            return $array;
        }

        public static function getOffsets()
        {
            return array(
                'none' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                'auto' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '1' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '2' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '3' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '4' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '5' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '6' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '7' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '8' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '9' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '10' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '11' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '12' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
            );
        }

    }

}