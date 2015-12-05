<?php

/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @version     1.4.3
 * @since       1.4.3
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
if (!class_exists('Zo2HtmlHeaderlogo'))
{

    /**
     * @since 1.4.3
     */
    class Zo2HtmlHeaderlogo
    {

        public function render()
        {
            $html = new Zo2Html();

            $logo['standard'] = Zo2Framework::getParam('standard_logo');
            $logo['retina'] = Zo2Framework::getParam('retina_logo');

            $html->set('logo', $logo);
            $html->set('slogan', Zo2Framework::getParam('site_slogan'));

            return $html->fetch('zo2/headerlogo.php');
        }

    }

}