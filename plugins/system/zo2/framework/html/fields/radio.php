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
if (!class_exists('Zo2HtmlFieldRadio')) {

    /**
     * @uses    Render radio group buttons
     * @since 1.4.3
     */
    class Zo2HtmlFieldRadio {

        public function render($name, $value) {
            $html[] = '<fieldset id="' . $name . '" class="radio btn-group">';
            $html[] = '<option>ddd</option>';
            $html[] = '</fieldset>';
            return implode('', $html);
        }

    }

}