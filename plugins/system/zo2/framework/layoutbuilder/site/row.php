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
if (!class_exists('Zo2LayoutbuilderSiteRow'))
{

    /**
     * Class object for each row
     */
    class Zo2LayoutbuilderSiteRow extends Zo2LayoutbuilderRow
    {

        /**
         *
         * @param type $default
         * @return string
         */
        public function getClass($default = array())
        {
            $class = $default;
            $class [] = '';
            if ($this->get('class') != '')
                $class [] = $this->get('class');
            // Only generate grid class for children
            if (!$this->isRoot())
            {
                $class [] = $this->_getGridClass();
            } else
            {
                // Add more class for root
            }

            return implode(' ', $class);
        }

        /**
         * 
         * @return string
         */
        public function render($rootDir = 'Zo2://html/site/layout/layoutbuilder')
        {
            return parent::render($rootDir);
        }

    }

}