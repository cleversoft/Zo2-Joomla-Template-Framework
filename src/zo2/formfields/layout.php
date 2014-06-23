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

class JFormFieldLayout extends JFormField {

    protected $type = 'Layout';

    /**
     * Get the html for input
     *
     * @return string
     */
    public function getInput() {

        $template = $this->form->getValue('template');
        $templateDir = JPATH_SITE . '/templates/' . $template . '/';
        $layoutsDir = $templateDir . 'layouts/';
        $layoutFile = $layoutsDir . 'layout.json';

        $layoutCachePattern = $layoutsDir . 'cache/layout_*.php';
        $caches = glob($layoutCachePattern);

        $caches[] = $layoutsDir . 'header.php';
        $caches[] = $layoutsDir . 'footer.php';

        // don't write new layout setting when exist
        if (!empty($this->value) && file_get_contents($layoutFile) == '') {
            // write new layout settings
            file_put_contents($layoutFile, $this->value);

            // remove cache
            foreach ($caches as $file) {
                if (file_exists($file))
                    unlink($file);
            }
        }

        $pluginPath = JURI::root(true) . '/plugins/system/zo2/';
        $assetsPath = $pluginPath . 'assets/';
        $cssPath = $assetsPath . 'css/';
        $jsPath = $assetsPath . 'js/';
        $vendorPath = $pluginPath . 'assets/vendor/';

        // load jquery & jqueryui newest version, cause joomla's jquery is plain old
        // Load custom js and css
        $assets = Zo2Assets::getInstance();
        /* jQueryUI */
        $assets->addScript('vendor/jqueryui/js/jquery-ui-1.10.3.custom.min.js');
        $assets->addStyleSheet('vendor/jqueryui/css/jquery-ui-1.10.3.custom.min.css');

        $assets->addScript('vendor/bootbox-3.3.0.min.js');
        $assets->addScript('zo2/js/adminlayout.min.js');

        $assets->addStyleSheet('vendor/bootstrap/core/css/bootstrap.gridsystem.css');

        return $this->_build();
    }

    /**
     * Return this form label.
     * In this case, label is empty
     *
     * @return string
     */
    public function getLabel() {
        return '';
    }

    /**
     * Get html for layout builder
     * @return type
     */
    protected function _build() {
        $zo2 = Zo2Framework::getInstance();
        $jinput = JFactory::getApplication()->input;
        $path = Zo2Path::getInstance();

        $positions = Zo2Framework::getTemplatePositions();

        $templatePath = Zo2Framework::getTemplatePath();

        $profile = new Zo2Profile();
        $profileName = $jinput->get('profile', 'default');
        $profile->load($profileName);
        $layout = $profile->layout;

        $layoutData = $layout;

        $layoutFile = $path->getFile('html://layouts/formfield.layout.php');

        // generate list of custom module style
        $customModuleStylePath = $templatePath . '/html/modules.php';
        if (file_exists($customModuleStylePath))
            include_once $customModuleStylePath;
        $definedFunctions = get_defined_functions();
        $definedUserFunctions = $definedFunctions['user'];
        $customStyles = array();

        for ($i = 0, $total = count($definedUserFunctions); $i < $total; $i++) {
            if (strpos(strtolower($definedUserFunctions[$i]), 'modchrome_') !== false) {
                $customStyles[] = substr($definedUserFunctions[$i], 10);
            }
        }

        // generate the html for layout builder
        ob_start();
        include($layoutFile);
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }

    /**
     * Generate layout
     *
     * @param $data
     */
    public function renderLayout($data) {
        for ($i = 0, $total = count($data); $i < $total; $i++) {
            $this->renderRow($data[$i]);
        }
    }

    private function renderRow($item) {
        if (!isset($item['visibility'])) {
            $item['visibility']['xs'] = true;
            $item['visibility']['sm'] = true;
            $item['visibility']['md'] = true;
            $item['visibility']['lg'] = true;
        }
        ?>
        <div class="zo2-row sortable-row" data-zo2-type="row" data-zo2-customClass="<?php echo $item['customClass'] ?>"
             data-zo2-id="<?php echo $item['id'] ?>"
             data-zo2-visibility-xs="<?php echo $item['visibility']['xs'] ? 1 : 0 ?>"
             data-zo2-visibility-sm="<?php echo $item['visibility']['sm'] ? 1 : 0 ?>"
             data-zo2-visibility-md="<?php echo $item['visibility']['md'] ? 1 : 0 ?>"
             data-zo2-visibility-lg="<?php echo $item['visibility']['lg'] ? 1 : 0 ?>"
             data-zo2-fullwidth="<?php echo $item['fullwidth'] ? 1 : 0 ?>"
             >
            <div class="col-md-12 row-control">
                <div class="row-control-container">
                    <div class="row-name"><?php echo $item['name'] ?></div>
                    <div class="row-control-buttons">
                        <i title="Drag row" class="icon-move row-control-icon dragger hasTooltip"></i>
                        <i title="Row's settings" class="icon-cogs row-control-icon settings hasTooltip"></i>
                        <i title="Duplicate row" class="row-control-icon duplicate icon-align-justify hasTooltip"></i>
                        <i title="Split row" class="row-control-icon split icon-columns hasTooltip"></i>
                        <i title="Remove row" class="row-control-icon delete icon-remove hasTooltip"></i>
                    </div>
                </div>

                <div class="col-container">
                    <?php
                    for ($i = 0, $total = count($item['children']); $i < $total; $i++) {
                        $this->renderColumn($item['children'][$i]);
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }

    /**
     * 
     * @param type $item
     */
    private function renderColumn($item) {
        if (!isset($item['visibility'])) {
            $item['visibility']['xs'] = true;
            $item['visibility']['sm'] = true;
            $item['visibility']['md'] = true;
            $item['visibility']['lg'] = true;
        }
        ?>
        <div class="sortable-col col-md-<?php echo $item['span'] ?> col-md-offset-<?php echo $item['offset'] ?>" data-zo2-type="span"
             data-zo2-span="<?php echo $item['span'] ?>" data-zo2-offset="<?php echo $item['offset'] ?>"
             data-zo2-position="<?php echo $item['position'] ?>" data-zo2-style="<?php echo (isset($item['style'])) ? $item['style'] : ''; ?>"
             data-zo2-customClass="<?php echo $item['customClass'] ?>" data-zo2-id="<?php echo $item['id'] ?>"
             data-zo2-visibility-xs="<?php echo $item['visibility']['xs'] ? 1 : 0 ?>"
             data-zo2-visibility-sm="<?php echo $item['visibility']['sm'] ? 1 : 0 ?>"
             data-zo2-visibility-md="<?php echo $item['visibility']['md'] ? 1 : 0 ?>"
             data-zo2-visibility-lg="<?php echo $item['visibility']['lg'] ? 1 : 0 ?>"
             >
            <div class="col-wrap">
                <div class="col-name"><?php echo $item['name'] ?></div>
                <div class="col-control-buttons">
                    <i title="Drag column" class="col-control-icon dragger icon-move hasTooltip"></i>
                    <i title="Column's settings" class="icon-cog col-control-icon settings hasTooltip"></i>
                    <i title="Append new row" class="col-control-icon add-row icon-align-justify hasTooltip"></i>
                    <i title="Remove column" class="icon-remove col-control-icon delete hasTooltip"></i>
                </div>

                <div class="row-container">
                    <?php
                    for ($i = 0, $total = count($item['children']); $i < $total; $i++) {
                        $this->renderRow($item['children'][$i]);
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }

}
