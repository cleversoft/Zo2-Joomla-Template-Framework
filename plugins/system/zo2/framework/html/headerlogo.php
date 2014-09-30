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
if (!class_exists('Zo2HtmlHeaderlogo')) {

    /**
     * @since 1.4.3
     */
    class Zo2HtmlHeaderlogo {

        public function render() {
            $html = new Zo2Html();
            $framework = Zo2Factory::getFramework();

            $logo = $framework->get('header_logo');
            $logoRetina = $framework->get('header_retina_logo');
            $sitename = $framework->get('site_name');
            $slogan = $framework->get('site_slogan');

            $html->set('logo', json_decode($logo, true));
            $html->set('logoRetine', json_decode($logoRetina, true));
            $html->set('sitename', $sitename);
            $html->set('slogan', $slogan);

            return $html->fetch('zo2/headerlogo.php');
        }

    }

}