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
if (!class_exists('Zo2UtilityStyleSwitcher'))
{
    require_once 'abstract.php';

    class Zo2UtilityStyleSwitcher extends Zo2UtilityAbstract
    {

        /**
         * 
         * @return string
         */
        public function render()
        {
            if (Zo2Framework::getParam('enable_style_switcher', 1) == 1)
            {
                $template = new Zo2Template();
                return $template->fetch('html://utilities/styleswitcher.php');
            }
            return '';
        }

    }

}