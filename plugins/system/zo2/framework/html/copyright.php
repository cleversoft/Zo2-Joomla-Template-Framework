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
if (!class_exists('Zo2HtmlCopyright'))
{

    /**
     * @since 1.4.3
     */
    class Zo2HtmlCopyright
    {

        public function render()
        {
            $html = new Zo2Html();
            $html->set('showLogo', Zo2Framework::getParam('footer_logo'));
            $html->set('logoUrl', JUri::root(true) . '/plugins/system/zo2/framework/assets/zo2/images/zo2_logo_32x32.png');
            $html->set('copyright', Zo2Framework::getParam('footer_copyright'));
            $html->set('title', 'Zo2 Framework');
            $html->set('link', 'http://www.zootemplate.com/zo2');
            $html->set('gototop', Zo2Framework::getParam('footer_gototop'));
            return $html->fetch('zo2/copyright.php');
        }

    }

}