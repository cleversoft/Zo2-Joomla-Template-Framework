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

defined('_JEXEC') or die ('Restricted access');

class JFormFieldLayout extends JFormField
{
    protected $type = 'Layout';

    /**
     * Get the html for input
     *
     * @return string
     */
    public function getInput()
    {
        $doc = JFactory::getDocument();

        $template = $this->form->getValue('template');
        $theme_path = JPATH_SITE.'/templates/'.$template.'/';
        $theme_layout_path = $theme_path . 'layouts/';
        $current_layout_path = $theme_layout_path . 'layout.json';
        $caches = array(
            $theme_layout_path . 'layout.php', $theme_layout_path . 'header.php', $theme_layout_path . 'footer.php'
        );

        if (!empty($this->value)) {
            file_put_contents($current_layout_path, $this->value);

            foreach ($caches as $file) {
                if (file_exists($file)) unlink($file);
            }
        }

        $pluginPath = JURI::root(true).'/plugins/system/zo2/';
        $assetsPath = $pluginPath . 'assets/';
        $cssPath = $assetsPath . 'css/';
        $jsPath = $assetsPath . 'js/';
        $vendorPath = $pluginPath . 'assets/vendor/';

        // load jquery & jqueryui newest version, cause joomla's jquery is plain old
        // Load custom js and css
        $doc->addScript($vendorPath . 'jqueryui/js/jquery-ui-1.10.3.custom.min.js');
        $doc->addScript($vendorPath . 'underscorejs/underscore-min.js');
        $doc->addScript($vendorPath . 'backbonejs/backbone-min.js');
        $doc->addScript($vendorPath . 'bootbox/bootbox-3.3.0.min.js');
        //$doc->addScript($jsPath . 'layoutbuildermodels.js');
        $doc->addScript($jsPath . 'adminlayout.js');
        //$doc->addStyleSheet($vendorPath . 'bootstrap/css/bootstrap.min.css');
        //$doc->addStyleSheet($vendorPath . 'bootstrap/css/bootstrap-responsive.min.css');
        $doc->addStyleSheet($vendorPath . 'jqueryui/css/jquery-ui-1.10.3.custom.min.css');
        $doc->addStyleSheet($cssPath . 'bootstrap.gridsystem.css');
        //$doc->addStyleSheet($cssPath . 'style.css');
        //$doc->addScript($jsPath . 'admin.js');

        // Load Bootstrap JS framework
        //JHtml::_('bootstrap.framework');
        // Load Bootstrap CSS
        //JHtml::_('bootstrap.loadCss');

        return $this->generateLayoutBuilder();
    }

    /**
     * Return this form label.
     * In this case, label is empty
     *
     * @return string
     */
    public function getLabel()
    {
        return '';
    }


    /**
     * Get html for layout builder
     *
     * @return string
     */
    private function generateLayoutBuilder()
    {
        $templateName = $template = $this->form->getValue('template');
        $positions = Zo2Framework::getAvailablePositions($templateName);
        //$layout = new Zo2Layout(Zo2Framework::getTemplateName(), 'homepage');
        $templatePath = JPATH_SITE . '/templates/' . Zo2Framework::getTemplateName();
        $layoutPath = $templatePath . '/layouts/layout.json';
        $layoutData = json_decode(file_get_contents($layoutPath), true);
        //$path = JPATH_SITE.'/plugins/system/zo2/templates/layoutbuilder.php';
        $path = JPATH_SITE.'/plugins/system/zo2/templates/layout.php';

        // generate list of custom module style
        $customModuleStylePath = $templatePath . '/html/modules.php';
        if (file_exists($customModuleStylePath)) include_once $customModuleStylePath;
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
        include($path);
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }

    /**
     * Generate layout
     *
     * @param $data
     */
    public function renderLayout($data)
    {
        for($i = 0, $total = count($data); $i < $total; $i++) {
            $this->renderRow($data[$i]);
        }
    }

    private function renderRow($item)
    {
        ?>
        <div class="zo2-row sortable-row" data-zo2-type="row" data-zo2-customClass="<?php echo $item['customClass']?>"
             data-zo2-layout="fixed" data-zo2-id="<?php echo $item['id']?>">
            <div class="col-md-12 row-control">
                <div class="row-control-container">
                    <div class="row-name"><?php echo $item['name']?></div>
                    <div class="row-control-buttons">
                        <i class="icon-move row-control-icon dragger"></i>
                        <i class="icon-cogs row-control-icon settings"></i>
                        <i class="row-control-icon duplicate icon-align-justify"></i>
                        <i class="row-control-icon split icon-columns"></i>
                        <i class="row-control-icon delete icon-remove"></i>
                    </div>
                </div>

                <div class="col-container">
                    <?php
                    for($i = 0, $total = count($item['children']); $i < $total; $i++) {
                        $this->renderColumn($item['children'][$i]);
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }

    private function renderColumn($item)
    {
        ?>
        <div class="sortable-col col-md-<?php echo $item['span']?> col-md-offset-<?php echo $item['offset']?>" data-zo2-type="span"
             data-zo2-span="<?php echo $item['span']?>" data-zo2-offset="<?php echo $item['offset']?>"
             data-zo2-position="<?php echo $item['position']?>" data-zo2-style="<?php echo $item['style']?>"
             data-zo2-customClass="<?php echo $item['customClass']?>" data-zo2-id="<?php echo $item['id']?>"
        >
            <div class="col-wrap">
                <div class="col-name"><?php echo $item['name']?></div>
                <div class="col-control-buttons">
                    <i class="col-control-icon dragger icon-move"></i>
                    <i class="icon-cog col-control-icon settings"></i>
                    <i class="col-control-icon add-row icon-align-justify"></i>
                    <i class="icon-remove col-control-icon delete"></i>
                </div>

                <div class="row-container">
                    <?php
                    for($i = 0, $total = count($item['children']); $i < $total; $i++) {
                        $this->renderRow($item['children'][$i]);
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
}