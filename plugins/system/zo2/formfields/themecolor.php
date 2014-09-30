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

class JFormFieldThemeColor extends JFormField {

    protected $type = 'ThemeColor';

    /**
     * Get the html for input
     *
     * @return string
     */
    public function getInput() {
        $presetPath = Zo2Factory::getPath('templates://assets/presets.json');
        $presets = array();
        if ($presetPath) {
            $presets = json_decode(file_get_contents($presetPath), true);
            $path = Zo2Factory::getPath('html://zo2/themecolor.php');
            ob_start();
            include($path);
            $html = ob_get_contents();
            ob_end_clean();
            return $html;
        }
    }

    private function mapThemes($item) {
        return str_replace('.css', '', basename($item));
    }

}
