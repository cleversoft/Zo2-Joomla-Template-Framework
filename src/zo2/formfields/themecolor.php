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
defined('_JEXEC') or die;

class JFormFieldThemeColor extends JFormField
{
    protected $type = 'ThemeColor';

    /**
     * Get the html for input
     *
     * @return string
     */
    public function getInput()
    {
        $zo2 = Zo2Framework::getInstance();
        $presetPath = $zo2->getCurrentTemplateAbsolutePath() . '/layouts/presets.json';
        $presets = array();
        if (file_exists($presetPath)) {
            $presets = json_decode(file_get_contents($presetPath), true);
        }
        $path = JPATH_SITE.'/plugins/system/zo2/templates/themecolor.php';
        ob_start();
        include($path);
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }

    private function mapThemes($item)
    {
        return str_replace('.css', '', basename($item));
    }
}