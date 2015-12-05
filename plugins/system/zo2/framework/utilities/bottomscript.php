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
if (!class_exists('Zo2UtilityBottomscript'))
{
    require_once 'abstract.php';

    class Zo2UtilityBottomscript extends Zo2UtilityAbstract
    {

        /**
         *
         * @return string
         */
        public function render()
        {
            $template = new Zo2Template();
            return $template->fetch('html://utilities/bottomscript.php');
        }

    }

}