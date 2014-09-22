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
defined('_JEXEC') or die;

class JFormFieldFont extends JFormField {

    protected $type = 'Font';

    /**
     * Get the html for input
     *
     * @return string
     */
    public function getInput() {
        $path = ZO2URL_ROOT . '/html/zo2/font.php';
        ob_start();
        include($path);
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }

    public function getLabel() {
        switch ($this->fieldname) {
            case 'body_font': return 'Body';
            case 'h1_font': return 'Headline H1';
            case 'h2_font': return 'Headline H2';
            case 'h3_font': return 'Headline H3';
            case 'h4_font': return 'Headline H4';
            case 'h5_font': return 'Headline H5';
            case 'h6_font': return 'Headline H6';
            default: return '';
        }
    }

}
