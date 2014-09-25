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
if (!class_exists('Zo2HtmlAdminprofile')) {

    /**
     * Display list of profiles
     * @since 1.4.3
     */
    class Zo2HtmlAdminprofile {

        public function render() {
            $profiles = Zo2Factory::getFramework()->getProfiles();
            $currentProfileName = Zo2Factory::getProfile()->name;
            $html = '<select id="zo2-profile">';
            foreach ($profiles as $key => $profile) {
                if ($key == $currentProfileName) {
                    $html .= '<option value="' . $key . '" selected>' . $key . '</option>';
                } else {
                    $html .= '<option value="' . $key . '">' . $key . '</option>';
                }
            }
            $html .= '</select>';
            return $html;
        }

    }

}