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
if (!class_exists('plgSystemZo2'))
{

    /**
     * Zo2 Framework entrypoint plugin
     */
    class plgSystemZo2 extends JPlugin
    {

        /**
         * 
         * @param type $subject
         * @param type $config
         */
        public function __construct(& $subject, $config)
        {
            parent::__construct($subject, $config);
            $language = JFactory::getLanguage();
            $language->load('plg_system_zo2', __DIR__ . '/framework');
        }

    }

}