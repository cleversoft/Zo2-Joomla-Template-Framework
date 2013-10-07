<?php
/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      Duc Nguyen <ducntv@gmail.com>
 * @author      Hiepvu <vqhiep2010@gmail.com>
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
        $themesPath = $zo2->getCurrentTemplateAbsolutePath() . '/assets/css/themes/';
        $imgUri = JURI::root(true) . '/templates/' . $zo2->getTemplateName() . '/assets/images/themes/';
        $themesFiles = glob($themesPath . '*.css');
        $defaultThemes = array('default');
        $themes = array_map(array($this, 'mapThemes'), $themesFiles);
        $themes = array_unique(array_merge($defaultThemes, $themes));
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