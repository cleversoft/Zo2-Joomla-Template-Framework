<!------------ Layout Builder -------------->
<div class="tab-pane" id="zo2-themecolor">
    <h2><?php echo JText::_('ZO2_ADMIN_SIDEBAR_HEADER_THEMECOLOR'); ?></h2>
    <div class="zo2-divider"></div>

    <div class="profiles-pane">
        <!--<h3 class="title-profile">--><?php //echo JText::_('ZO2_TEMPLATE_THEME_LAYOUT');                       ?><!--</h3>-->

        <?php
        echo Zo2Html::field(
                'description', null, array(
            'text' => JText::_('ZO2_ADMIN_DESCRIPTION_THEMECOLOR'),
            'subtext' => '<a href="http://docs.zootemplate.com/category/zo2/themecolor">Document</a>'
        ));
        ?>


        <div id="theme">
            <div id="zo2_themes_container" class="profiles-pane-inner">

                <?php
                $presetPath = Zo2Factory::getPath('templates://assets/presets.json');
                $presets = array();
                if ($presetPath) {
                    $presets = json_decode(file_get_contents($presetPath), true);
                }
                $templatePath = Zo2Factory::getUrl('templates://');
                $profile = Zo2Factory::getProfile();
                $presetTheme = new JObject($profile->get('theme'));
                /**
                 * @todo Must use JRegistry
                 */
                $preset_data = array(
                    'name' => $presetTheme->get('name'),
                    'css' => $presetTheme->get('css'),
                    'less' => $presetTheme->get('less'),
                    'boxed' => $presetTheme->get('boxed', 0),
                    'background' => $presetTheme->get('background'),
                    'header' => $presetTheme->get('header'),
                    'header_top' => $presetTheme->get('header_top'),
                    'text' => $presetTheme->get('text'),
                    'link' => $presetTheme->get('link'),
                    'link_hover' => $presetTheme->get('link_hover'),
                    'bottom1' => $presetTheme->get('bottom1'),
                    'bottom2' => $presetTheme->get('bottom2'),
                    'footer' => $presetTheme->get('footer'),
                    'bg_image' => $presetTheme->get('bg_image'),
                    'bg_pattern' => $presetTheme->get('bg_pattern'),
                    'background' => $presetTheme->get('background'),
                );


                if (!isset($preset_data['name']))
                    $preset_data['name'] = 'custom';
                if (!isset($preset_data['boxed']))
                    $preset_data['boxed'] = 1;
                if (!isset($preset_data['bg_image']))
                    $preset_data['bg_image'] = '';
                $themeJson = htmlspecialchars(json_encode($profile->get('theme')), ENT_QUOTES, 'UTF-8');
                ?>
                <input type="hidden" name="jform[params][theme]" id="jform_params_theme" value='<?php echo $themeJson; ?>'>
                <div class="zo2_themes_row clearfix">
                    <div class="zo2_themes_form">
                        <ul id="zo2_themes">
                            <?php foreach ($presets as $p) : ?>
                                <li class="<?php echo $p['name'] == $preset_data['name'] ? 'active' : '' ?>"
                                    data-zo2-theme="<?php echo $p['name'] ?>"
                                    data-zo2-background="<?php echo $p['variables']['background'] ?>"
                                    data-zo2-header="<?php echo $p['variables']['header'] ?>"
                                    data-zo2-header-top="<?php echo $p['variables']['header_top'] ?>"
                                    data-zo2-link="<?php echo $p['variables']['link'] ?>"
                                    data-zo2-link-hover="<?php echo $p['variables']['link_hover'] ?>"
                                    data-zo2-text="<?php echo $p['variables']['text'] ?>"
                                    data-zo2-bottom1="<?php echo $p['variables']['bottom1'] ?>"
                                    data-zo2-bottom2="<?php echo $p['variables']['bottom2'] ?>"
                                    data-zo2-footer="<?php echo $p['variables']['footer'] ?>"
                                    data-zo2-css="<?php echo $p['css'] ?>" data-zo2-less="<?php echo $p['less'] ?>"
                                    >
                                    <div class="theme_title"><?php echo ucfirst($p['name']) ?></div>
                                    <div class="theme_thumbnail">
                                        <img src="<?php echo $templatePath . $p['thumbnail'] ?>">
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
                <div class="zo2_themes_row clearfix">
                    <div class="zo2_themes_label">
                        Preset Settings
                    </div>
                    <div class="zo2_themes_form">

                        <?php
                        echo Zo2Html::field(
                                'colorpicker', array(
                            'label' => JText::_('ZO2_TEMPLATE_THEME_BACKGROUND'),
                            'description' => JText::_('ZO2_TEMPLATE_THEME_BACKGROUND_DESC'),
                                ), array(
                            'name' => 'color_background',
                            'id' => 'color_background',
                            'class' => 'txtColorPicker zo2_preset_variable',
                            'value' => $preset_data['background']
                        ));
                        ?>

                        <?php
                        echo Zo2Html::field(
                                'colorpicker', array(
                            'label' => JText::_('ZO2_TEMPLATE_THEME_HEADER'),
                            'description' => JText::_('ZO2_TEMPLATE_THEME_HEADER_DESC'),
                                ), array(
                            'name' => 'color_header',
                            'id' => 'color_header',
                            'class' => 'txtColorPicker zo2_preset_variable',
                            'value' => $preset_data['header']
                        ));
                        ?>

                        <?php
                        echo Zo2Html::field(
                                'colorpicker', array(
                            'label' => JText::_('ZO2_TEMPLATE_THEME_HEADER_TOP'),
                            'description' => JText::_('ZO2_TEMPLATE_THEME_HEADER_TOP_DESC'),
                                ), array(
                            'name' => 'color_header_top',
                            'id' => 'color_header_top',
                            'class' => 'txtColorPicker zo2_preset_variable',
                            'value' => $preset_data['header_top']
                        ));
                        ?>

                        <?php
                        echo Zo2Html::field(
                                'colorpicker', array(
                            'label' => JText::_('ZO2_TEMPLATE_THEME_TEXT'),
                            'description' => JText::_('ZO2_TEMPLATE_THEME_TEXT_DESC'),
                                ), array(
                            'name' => 'color_text',
                            'id' => 'color_text',
                            'class' => 'txtColorPicker zo2_preset_variable',
                            'value' => $preset_data['text']
                        ));
                        ?>

                        <?php
                        echo Zo2Html::field(
                                'colorpicker', array(
                            'label' => JText::_('ZO2_TEMPLATE_THEME_LINK'),
                            'description' => JText::_('ZO2_TEMPLATE_THEME_LINK_DESC'),
                                ), array(
                            'name' => 'color_link',
                            'id' => 'color_link',
                            'class' => 'txtColorPicker zo2_preset_variable',
                            'value' => $preset_data['link']
                        ));
                        ?>

                        <?php
                        echo Zo2Html::field(
                                'colorpicker', array(
                            'label' => JText::_('ZO2_TEMPLATE_THEME_LINK_HOVER'),
                            'description' => JText::_('ZO2_TEMPLATE_THEME_LINK_HOVER_DESC'),
                                ), array(
                            'name' => 'color_link_hover',
                            'id' => 'color_link_hover',
                            'class' => 'txtColorPicker zo2_preset_variable',
                            'value' => $preset_data['link_hover']
                        ));
                        ?>

                        <?php
                        echo Zo2Html::field(
                                'colorpicker', array(
                            'label' => JText::_('ZO2_TEMPLATE_THEME_BOTTOM'),
                            'description' => JText::_('ZO2_TEMPLATE_THEME_BOTTOM_DESC'),
                                ), array(
                            'name' => 'color_bottom1',
                            'id' => 'color_bottom1',
                            'class' => 'txtColorPicker zo2_preset_variable',
                            'value' => $preset_data['bottom1']
                        ));
                        ?>

                        <?php
                        echo Zo2Html::field(
                                'colorpicker', array(
                            'label' => JText::_('ZO2_TEMPLATE_THEME_BOTTOM_2'),
                            'description' => JText::_('ZO2_TEMPLATE_THEME_BOTTOM_2_DESC'),
                                ), array(
                            'name' => 'color_bottom2',
                            'id' => 'color_bottom2',
                            'class' => 'txtColorPicker zo2_preset_variable',
                            'value' => $preset_data['bottom2']
                        ));
                        ?>
                        <?php
                        echo Zo2Html::field(
                                'colorpicker', array(
                            'label' => JText::_('ZO2_TEMPLATE_THEME_FOOTER'),
                            'description' => JText::_('ZO2_TEMPLATE_THEME_FOOTER_DESC'),
                                ), array(
                            'name' => 'color_footer',
                            'id' => 'color_footer',
                            'class' => 'txtColorPicker zo2_preset_variable',
                            'value' => $preset_data['footer']
                        ));
                        ?>

                    </div>
                    <div class="zo2_themes_row clearfix" id="background_image_wrapper">

                        <div class="zo2_themes_label">
                            <?php echo JText::_('ZO2_TEMPLATE_THEME_STYLE_BACKGROUND'); ?>
                        </div>
                        <?php
                        echo Zo2Html::field(
                                'radio', array(
                            'label' => JText::_('ZO2_ADMIN_GENERAL_LABEL_CHOOSE_LAYOUT'),
                            'description' => JText::_('ZO2_ADMIN_GENERAL_DESC_CHOOSE_LAYOUT'),
                                ), array(
                            'id' => 'zo2_boxed_style',
                            'name' => 'zo2_boxed_style',
                            'value' => $preset_data['boxed']
                        ));
                        ?>
                        <div id="background_image_selector" class="zo2_background_and_pattern" <?php if ($preset_data['boxed'] == 0) echo 'style="display:none"'; ?>>
                            <?php
                            echo Zo2Html::field(
                                    'image', array(
                                'label' => JText::_('ZO2_ADMIN_GENERAL_LABEL_BACKGROUND_IMAGE'),
                                'description' => JText::_('ZO2_ADMIN_GENERAL_DESC_BACKGROUND_IMAGE'),
                                'class_wrap' => 'zo2-background-image',
                                'class' => 'zo2-background-image'
                                    ), array(
                                'id' => 'zo2_background_image',
                                'name' => 'zo2_background_image',
                                'value' => $preset_data['bg_image']
                            ));
                            ?>
                            <hr />
                            <div class="zo2_themes_label">
                                <?php echo JText::_('ZO2_TEMPLATE_THEME_PATTERN_BACKGROUND'); ?>
                            </div>
                            <div class="zo2_themes_for">
                                <ul class="options background-select">
                                    <?php
                                    $zPath = Zo2Path::getInstance();
                                    $backgroundsDir = Zo2Factory::getPath("templates://assets/zo2/images/background-patterns");
                                    $bgPatterns = glob($backgroundsDir . '/*.*');
                                    if (count($bgPatterns) > 0) {
                                        foreach ($bgPatterns as $pattern) {
                                            if (is_array(getimagesize($pattern))) {
                                                $selected = '';
                                                $pattern_src = $zPath->toUrl($pattern);
                                                $pattern_path = str_replace(JPATH_ROOT . DIRECTORY_SEPARATOR, '', $pattern);
                                                if (isset($preset_data['bg_pattern']) && ($pattern_path == $preset_data['bg_pattern']))
                                                    $selected = 'selected';
                                                echo '<li class="' . $selected . '"><img rel="' . $pattern_path . '" src="' . $pattern_src . '" /></li>';
                                            }
                                        }
                                    }
                                    ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
