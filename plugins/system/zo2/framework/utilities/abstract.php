<?php

/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @link        http://www.zootemplate.com/zo2
 * @author      ZooTemplate <http://www.zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');

if (!class_exists('Zo2UtilityAbstract'))
{

    abstract class Zo2UtilityAbstract extends JObject
    {

        /**
         * Render HTML
         */
        abstract public function render();
    }

}