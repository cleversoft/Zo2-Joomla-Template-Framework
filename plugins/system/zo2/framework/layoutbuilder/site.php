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

if (!class_exists('Zo2LayoutbuilderSite'))
{

    class Zo2LayoutbuilderSite extends Zo2LayoutbuilderAbstract
    {

        /**
         * Render all rows
         * @return type
         */
        public function render()
        {
            return $this->_render($this->getProperties());
        }

    }

}