<!------------ Layout Builder -------------->
<div class="tab-pane" id="zo2-layout">
    <h2><?php echo JText::_('ZO2_ADMIN_LAYOUT_BUILDER'); ?></h2>
    <div class="zo2-divider"></div>
    <!-- Description -->
    <?php
    echo Zo2Html::field(
        'description', null, array(
            'text' => 'Short description about this page',
            'subtext' => '<a href="http://www.zootemplate.com/blog">Document</a>'
        ));
    ?>
    <?php echo Zo2Html::_('admin', 'builder'); ?>

    <?php
    defined('_JEXEC') or die;

    // Initiasile related data.
    require_once JPATH_ADMINISTRATOR . '/components/com_menus/helpers/menus.php';
    $menuTypes = MenusHelper::getMenuLinks();
    $framework = Zo2Factory::getFramework();
    $profileAssign = $framework->get('profile');
    $currentProfile = JFactory::getApplication()->input->get('profile', 'default');
    ?>
    <!-- Layout and Style -->
    <div class="zo2-divider"></div>
    <div class="zo2_themes_row clearfix">
        <h2><?php echo JText::_('ZO2_TEMPLATE_THEME_STYLE_BACKGROUND'); ?></h2>
        <div class="zo2-divider"></div>
        <div class="control-group">
            <div class="control-label">
                <label class="hasTooltip"><?php echo JText::_('ZO2_TEMPLATE_THEME_STYLE_CHOOSE_LAYOUT'); ?></label>
            </div>
            <div class="controls">
                <fieldset class="radio btn-group">
                    <input type="hidden" value="<?php echo $preset_data['boxed']; ?>" name="zo2_boxed_style" id="zo2_boxed_style" />
                    <label class="btn layout_style_choose boxed <?php if ($preset_data['boxed'] == 1) echo 'btn-success'; ?>"><?php echo JText::_('ZO2_YES'); ?></label>
                    <label class="btn first layout_style_choose <?php if ($preset_data['boxed'] == 0) echo 'btn-danger'; ?>"><?php echo JText::_('ZO2_NO'); ?></label>
                </fieldset>
            </div>
        </div>
        <div class="zo2_background_and_pattern" <?php if ($preset_data['boxed'] == 0) echo 'style="display:none"'; ?>>
            <div class="control-group">
                <div class="control-label">
                    <label class=""><?php echo JText::_('ZO2_TEMPLATE_THEME_BACKGROUND_IMAGE'); ?></label>
                </div>
                <div class="controls">
                    <div class="input-prepend input-append">
                        <div class="media-preview add-on">
                            <span class="hasTipPreview" title=""><i class="icon-eye-open"></i></span>
                        </div>
                        <input type="text" name="zo2_background_image" id="zo2_background_image" value="<?php echo $preset_data['bg_image']; ?>" readonly="readonly" class="input-small">
                        <a class="modal btn" data-toggle="modal" title="Select" data-target="index.php?option=com_media&view=images&tmpl=component&asset=com_templates&author=&fieldid=zo2_background_image&folder=" rel="{handler: 'iframe', size: {x: 800, y: 500}}">
                            <?php echo JText::_('ZO2_TEMPLATE_THEME_SELECT'); ?>
                        </a>
                        <a class="btn hasTooltip" title="" href="#" onclick="jInsertFieldValue('', 'zo2_background_image');
                                            return false;" data-original-title="Clear">
                            <i class="icon-remove"></i>
                        </a>
                    </div>
                </div>
            </div>
            <hr />
            <div class="zo2_themes_label">
                <?php echo JText::_('ZO2_TEMPLATE_THEME_PATTERN_BACKGROUND'); ?>
            </div>
            <div class="zo2_themes_form">
                <ul class="options background-select">
                    <?php
                    $zPath = Zo2Path::getInstance();
                    $backgroundsDir = Zo2Factory::getPath("templates://assets/zo2/images/background-patterns");
                    $bgPatterns = glob($backgroundsDir . '/*.*');
                    if (count($bgPatterns) > 0) {
                        foreach ($bgPatterns as $pattern) {
                            $selected = '';
                            $pattern_src = $zPath->toUrl($pattern);
                            $pattern_path = str_replace(JPATH_ROOT . DIRECTORY_SEPARATOR, '', $pattern);
                            if (isset($preset_data['bg_pattern']) && ($pattern_path == $preset_data['bg_pattern']))
                                $selected = 'selected';
                            echo '<li class="' . $selected . '"><img rel="' . $pattern_path . '" src="' . $pattern_src . '" /></li>';
                        }
                    }
                    ?>

                </ul>
            </div>
        </div>
    </div>
</div>