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

class Zo2Layout {
    /* private */

    private
            $_layoutName, $_templatePath, $_layourDir, $_compiledLayoutPath, $_layoutContent, $_layoutPath, $_templateName,
            $_staticsPath, $_coreStaticsPath, $_templateUri = '';
    private $_output = '';
    private $_script = array();
    private $_style = array();
    private $_styleDeclaration = array();
    private $_scriptDeclaration = array();
    private $_components = array();

    const MEGAMENU_PLACEHOLDER = '<!-- zo2_megamenu_placeholder -->';

    /**
     * Construct a Zo2Layout object
     *
     * @param $templateName
     *
     * @throws Exception
     */
    public function __construct($templateName = '') {
        $app = JFactory::getApplication();

        if ($app->isSite()) {

            // assign values to private variables
            $this->_templatePath = JPATH_SITE . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $templateName . DIRECTORY_SEPARATOR;
            $this->_layourDir = JPATH_SITE . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $templateName . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR;
            $this->_layoutPath = $this->_layourDir . 'layout.json';
            $this->_templateName = $templateName;
            $this->_templateUri = JUri::base(true) . '/templates/' . $templateName;

            /**
             * Load components array by get list files under components directory
             * @todo Move these thing into template.json
             */
            $this->importComponents();

            Zo2Framework::import('vendor.minify.jsshrink');
            Zo2Framework::import('vendor.minify.css');
        }
    }

    /**
     * Read layout data from json
     *
     * @return string
     */
    public function getLayoutJson() {
        $path = $this->_templatePath . 'layouts' . DIRECTORY_SEPARATOR . $this->_layoutName . '.json';
        if (file_exists($path)) {
            return file_get_contents($path);
        } else
            return '';
    }

    /**
     * Generate body html
     * @return string
     */
    public function render() {
        $app = JFactory::getApplication();
        $menu = $app->getMenu();
        $menuItem = $menu->getActive();

        $zo2 = Zo2Framework::getInstance();

        $html = '';

        $cacheFile = null;
        $canCache = $zo2->get('debug_visibility', 0) == 0;

        if (isset($menuItem->id) && !empty($menuItem->id)) {
            $cacheFile = 'zo2_layout_' . $menuItem->id . '.php';
        } else {
            $cacheFile = 'zo2_layout_' . md5(json_encode($menuItem->params));
        }

        if ($canCache) {

            if ((filemtime(Zo2Template::getInstance()->getFile('cache://' . md5($cacheFile))) + $zo2->get('cache_interval', '3600')) < time()) {
                $canCache = false;
            } else {
                $html = Zo2Template::getInstance()->loadCache($cacheFile);
            }
        }

        if ($canCache === false || (isset($html) && $html === false)) {

            $layoutType = $zo2->get('layout_type');

            if ($layoutType == 'fixed')
                $layoutType = '-fixed';
            else
                $layoutType = '-fluid';

            $profile = new Zo2Profile();
            $profile->load(Zo2Framework::getTemplatePath() . '/assets/profiles/default.json');
            $layout = $profile->layout;

            if ($layout) {
                $data = $layout;

                foreach ($data as $item) {
                    $html .= $this->_buildItem($item, $layoutType);
                }

                if ($canCache) {
                    Zo2Template::getInstance()->saveCache($cacheFile, $html);
                }
            } else { /* Load from default */
                if (file_exists($this->_layoutPath)) {
                    $data = json_decode(file_get_contents($this->_layoutPath), true);

                    for ($i = 0, $total = count($data); $i < $total; $i++) {
                        $html .= $this->_buildItem($data[$i], $layoutType);
                    }

                    if ($canCache) {
                        Zo2Template::getInstance()->saveCache($cacheFile, $html);
                    }
                } else
                    return '';
            }
        }

        /**
         * @todo Does megamenu under caching or not ?
         */
        /* Insert megamenu */
        if (strpos($html, Zo2Layout::MEGAMENU_PLACEHOLDER) !== false) {
            $zo2 = Zo2Framework::getInstance();
            $megamenu = $zo2->displayMegaMenu($zo2->get('menutype', $zo2->get('menu_type')), $zo2->getTemplate());
            $html = str_replace(Zo2Layout::MEGAMENU_PLACEHOLDER, $megamenu, $html);
        }
        return $html;
    }

    /**
     * Generate html for an item such as a row or a column.
     * @param type $item
     * @return type
     */
    private function _buildItem($item) {
        $html = '';
        if ($item['type'] == 'row')
            $html .= $this->_generateRow($item);
        else if ($item['type'] == 'col')
            $html .= $this->_generateColumn($item);

        return $html;
    }

    /**
     * Generate html from a row item
     * @param type $item
     * @return string
     */
    private function _generateRow($item) {
        //$class = $layoutType == 'fluid' ? 'container' : 'container-fixed';
        $class = $item['fullwidth'] ? '' : 'container';
        $class .= ' ' . self::_generateVisibilityClass($item['visibility']);
        $html = '';
        if (!empty($item['id']))
            $html .= '<section id="' . $item['id'] . '" class="' . $item['customClass'] . '">';
        else
            $html .= '<section class="' . $item['customClass'] . '">';
        $html .= '<section class="' . $class . '">'; // start of container
        $html .= '<section class="row">'; // start of row
        // count column and remove empty module here
        $exceptPos = array('header_logo', 'logo', 'menu', 'mega_menu', 'footer_logo', 'footer_copyright', 'component', 'debug', 'message');
        $doc = JFactory::getDocument();
        $freeSpace = 0;
        $totalTakenSpace = 0;
        $offsetSpace = 0;
        for ($i = 0, $total = count($item['children']); $i < $total; $i++) {
            $col = $item['children'][$i];
            $modulesInPosition = $doc->countModules($col['position']);
            if (in_array($col['position'], $exceptPos))
                $modulesInPosition = max($modulesInPosition, 1);
            if ($modulesInPosition == 0) {
                $freeSpace += $col['span'];
                unset($item['children'][$i]);
                continue;
            } else if ($modulesInPosition > 0 && $freeSpace > 0) {
                $item['children'][$i]['span'] += $freeSpace;
                $freeSpace = 0;
            }

            $totalTakenSpace += $item['children'][$i]['span'];
            $offsetSpace += $item['children'][$i]['offset'];
        }

        if ($totalTakenSpace <= 0)
            return !empty($item['name']) ? '<!-- empty row: ' . $item['name'] . ' -->' : '';

        $tempChildren = array();
        foreach ($item['children'] as $c) {
            $tempChildren[] = $c;
        }
        $item['children'] = $tempChildren;

        if ($totalTakenSpace < 12) {
            $remainingSpace = 12 - $totalTakenSpace - $offsetSpace;
            $totalChildren = count($item['children']);
            $index = $totalChildren - 1;
            if ($index < 0)
                $index = 0;
            if (isset($item['children'][$index]))
                $item['children'][$index]['span'] += $remainingSpace;
        }

        for ($i = 0, $total = count($item['children']); $i < $total; $i++) {
            $html .= self::_buildItem($item['children'][$i]);
        }
        $html .= '</section>'; // end of row
        $html .= '</section>'; // end of container
        $html .= '</section>'; // end of wrapper
        return $html;
    }

    /**
     * Generate html from a column item
     * @param $item
     * @return string
     */
    private function _generateColumn($item) {
        /**
         * @todo move to layouts/html and use Zo2Template to fetch
         */
        $html = '';
        $class = 'col-md-' . $item['span'];
        if ($item['offset'] != 0) {
            $class .= ' col-md-offset-' . $item['offset'];
        }
        $class .= ' ' . $this->_generateVisibilityClass($item['visibility']);
        //$class = 'col-xs-' . $item['span'] . ' col-md-' . $item['span'] . ' col-lg-' . $item['span'];
        if (!empty($item['customClass']))
            $class .= ' ' . $item['customClass'];
        if (!empty($item['id']))
            $html .= '<section id="' . $item['id'] . '" class="' . $class . '">';
        else
            $html .= '<section class="' . $class . '">';

        if (!empty($item['position'])) {

            if (($item['position'] == 'component') && (!$this->hideComponent()))
                $html .= '<jdoc:include type="component" />';
            else if (($item['position'] == 'message') && (!$this->hideComponent()))
                $html .= '<jdoc:include type="message" />';
            else if ($item['position'] == 'mega_menu') {
                //$html .= $zo2->displayMegaMenu($zo2->getParams('menutype', 'mainmenu'), $zo2->getTemplate());
                $html .= Zo2Layout::MEGAMENU_PLACEHOLDER;
            } else {
                $moduleJdoc = '<jdoc:include type="modules" name="' . $item['position'] . '"  style="' . $item['style'] . '" />';
                $componentHtml = '';
                if (isset($this->_components[$item['position']]) && $componentPath = $this->_components[$item['position']]) {
                    $componentClassName = "Zo2Component_" . $item['position'];
                    if (file_exists($componentPath))
                        require_once $componentPath;
                    if (class_exists($componentClassName)) {
                        $component = new $componentClassName();
                        if ($component instanceof Zo2Component) {
                            $componentHtml = $component->render();

                            if ($component->position == Zo2Component::RENDER_BEFORE)
                                $html .= $componentHtml . "\n" . $moduleJdoc;
                            else if ($component->position == Zo2Component::RENDER_AFTER)
                                $html .= $moduleJdoc . "\n" . $componentHtml;
                        }
                    }
                }

                if (empty($componentHtml))
                    $html .= $moduleJdoc;
            }
        }

        if ($total = count($item['children']) > 0) {
            for ($i = 0; $i < $total; $i++) {
                $html .= self::_buildItem($item['children'][$i]);
            }
        }

        $html .= '</section>';
        return $html;
    }

    private function _generateVisibilityClass($visibilityData) {
        $classes = array();
        $classes[] = $visibilityData['xs'] ? 'visible-xs' : 'hidden-xs';
        $classes[] = $visibilityData['sm'] ? 'visible-sm' : 'hidden-sm';
        $classes[] = $visibilityData['md'] ? 'visible-md' : 'hidden-md';
        $classes[] = $visibilityData['lg'] ? 'visible-lg' : 'hidden-lg';
        return implode(' ', $classes);
    }

    /**
     * Remove whitespace, tab, new line from input
     *
     * @param $input
     * @return mixed
     */
    public static function compressHtml($input) {
        $input = str_replace("\n\n", "\n", $input);
        $input = str_replace("\r\r", "\r", $input);
        return $input;
    }

    /**
     * Import components
     */
    public function importComponents() {

        $pluginComponentsPath = Zo2Framework::getZo2Path() . '/components/*.php';
        $templateComponentsPath = $this->_templatePath . 'components/*.php';

        $pluginComponents = glob($pluginComponentsPath);
        $templateComponents = glob($templateComponentsPath);

        foreach ($pluginComponents as $comp) {
            $compName = JFILE::stripExt(basename($comp));
            $this->_components[$compName] = $comp;
        }

        foreach ($templateComponents as $comp) {
            $compName = JFILE::stripExt(basename($comp));
            $this->_components[$compName] = $comp;
        }
    }

    public function getBodyClass($customClass = '') {
        //$jinput = JFactory::getApplication()->input;
        $classes = array();
        //$classes[] = $jinput->get('view');
        $classes[] = Zo2Framework::getCurrentPage();

        return trim(implode(' ', $classes) . ' ' . $customClass);
    }

    /**
     * Hide component from frontpage
     * @return bool
     */
    private static function hideComponent() {
        $params = Zo2Framework::getTemplate()->getConfig()->params;
        $isFrontPage = Zo2Framework::isFrontPage();
        if ((int) $params->get('component_area', 0) && $isFrontPage) {
            return true;
        } else {
            return false;
        }
    }

    public function addStyleSheet($url, $type = 'text/css') {
        $this->_style[] = array('path' => $url, 'mime' => $type);
    }

    public function addStyleDeclaration($content, $type = 'text/css') {
        $this->_styleDeclaration[] = array('content' => $content, 'mime' => $type);
    }

    public function addScriptDeclaration($content, $type = 'text/javascript') {
        $this->_scriptDeclaration[] = array('content' => $content, 'mime' => $type);
    }

    public function addScript($url, $type = 'text/javascript') {
        $this->_script[] = array('path' => $url, 'mime' => $type);
    }

    public function getTemplateUri() {
        return $this->_templateUri;
    }

}
