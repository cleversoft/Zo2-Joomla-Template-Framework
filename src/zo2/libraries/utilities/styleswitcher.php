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

/**
 * Class exists checking
 */
if (!class_exists('Zo2UtilityStyleSwitcher')) {
    require_once 'abstract.php';

    class Zo2UtilityStyleSwitcher extends Zo2UtilityAbstract {

        /**
         * 
         * @return string
         */
        public function render() {
            if (Zo2Framework::get('enable_style_switcher', 1) == 1) {
                $template = new Zo2Template();
                return $template->fetch('html://utilities/styleswitcher.php');
            }
            return '';
        }

    }

}