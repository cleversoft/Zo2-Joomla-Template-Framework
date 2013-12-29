<?php

/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');

if (!class_exists('Zo2Services')) {

    class Zo2Services {

        public function getButton() {
            $args = func_get_args();
            $service = array_shift($args);
            $button = array_shift($args);

            $className = 'Zo2ServiceButton' . ucfirst($service);
            $buttonClass = new $className();
            if (method_exists($buttonClass, $button)) {
                $buttonClass->loadScript();
                $html = call_user_func_array(array($buttonClass, $button), $args);
                $html = '<div class="zo2-service-' . $service . ' ' . $button . '">' . $html . '</div>';
                return $html;
            }
        }

    }

}