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

            $logo['path'] = Zo2Factory::get('header_logo_path');
            $logo['text'] = Zo2Factory::get('header_logo_text');
            $retinaLogo['path'] = Zo2Factory::get('header_retina_logo_path');
            $retinaLogo['text'] = Zo2Factory::get('header_retina_logo_text');

            $html->set('logo', $logo);
            $html->set('retinaLogo', $retinaLogo);

            return $html->fetch('zo2/headerlogo.php');
        }

    }

}