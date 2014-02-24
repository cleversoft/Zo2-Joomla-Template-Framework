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
$templatePath = JUri::root(true) . '/templates/' . $zo2->getTemplateName();
if (!isset($presets))
    $presets = array();
if (!empty($this->value))
    $currentData = json_decode($this->value, true);
else {
    $defaultData = array();
    for ($i = 0; $i < count($presets); $i++) {
        if ($presets[$i]['default'])
            $defaultData = $presets[$i];
    }
    if (empty($defaultData) && count($presets) > 0)
        $defaultData = $presets[0];
    $currentData = array(
        'name' => $defaultData['name'],
        'css' => $defaultData['css'],
        'less' => $defaultData['less'],
        'background' => $defaultData['variables']['background'],
        'header' => $defaultData['variables']['header'],
        'header_top' => $defaultData['variables']['header_top'],
        'text' => $defaultData['variables']['text'],
        'link' => $defaultData['variables']['link'],
        'link_hover' => $defaultData['variables']['link_hover'],
        'bottom1' => $defaultData['variables']['bottom1'],
        'bottom2' => $defaultData['variables']['bottom2'],
        'footer' => $defaultData['variables']['footer'],
        'extra' => $defaultData['variables']['extra'],
    );
}
?>
<div id="zo2_themes_container">
    <input type="hidden" value="<?php echo htmlspecialchars($this->value) ?>" name="<?php echo $this->name ?>" id="<?php echo $this->id ?>" />
    <div class="zo2_themes_row clearfix">
        <div class="zo2_themes_label">
            Select Preset Styles
        </div>
        <div class="zo2_themes_form">
            <ul id="zo2_themes">
                <?php foreach ($presets as $p) : ?>
                    <li class="<?php echo $p['name'] == $currentData['name'] ? 'active' : '' ?>"
                        data-zo2-theme="<?php echo $p['name'] ?>" data-zo2-background="<?php echo $p['variables']['background'] ?>"
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
            <div class="control-group">
                <div class="control-label">
                    <label for="color_background">Background</label>
                </div>
                <div class="controls">
                    <div class="colorpicker-container">
                        <input id="color_background" type="text" class="txtColorPicker zo2_preset_variable" value="<?php echo $currentData['background'] ?>">
                        <span id="color_background_preview" class="color-preview" style="background-color: <?php echo empty($currentData['background']) ? 'transparent' : $currentData['background'] ?>"></span>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label for="color_header">Header</label>
                </div>
                <div class="controls">
                    <div class="colorpicker-container">
                        <input id="color_header" type="text" class="txtColorPicker zo2_preset_variable" value="<?php echo $currentData['header'] ?>">
                        <span id="color_header_preview" class="color-preview" style="background-color: <?php echo empty($currentData['header']) ? 'transparent' : $currentData['header'] ?>"></span>
                    </div>
                </div>
            </div>

            <div class="control-group">
                <div class="control-label">
                    <label for="color_link_hover">Header top</label>
                </div>
                <div class="controls">
                    <div class="colorpicker-container">
                        <input id="color_header_top" type="text" class="txtColorPicker zo2_preset_variable" value="<?php echo $currentData['header_top'] ?>">
                        <span id="color_header_top_preview" class="color-preview" style="background-color: <?php echo empty($currentData['header_top']) ? 'transparent' : $currentData['header_top'] ?>"></span>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label for="color_text">Text</label>
                </div>
                <div class="controls">
                    <div class="colorpicker-container">
                        <input id="color_text" type="text" class="txtColorPicker zo2_preset_variable" value="<?php echo $currentData['text'] ?>">
                        <span id="color_text_preview" class="color-preview" style="background-color: <?php echo empty($currentData['text']) ? 'transparent' : $currentData['text'] ?>"></span>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label for="color_link">Link</label>
                </div>
                <div class="controls">
                    <div class="colorpicker-container">
                        <input id="color_link" type="text" class="txtColorPicker zo2_preset_variable" value="<?php echo $currentData['link'] ?>">
                        <span id="color_link_preview" class="color-preview" style="background-color: <?php echo empty($currentData['link']) ? 'transparent' : $currentData['link'] ?>"></span>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label for="color_link_hover">Link hover</label>
                </div>
                <div class="controls">
                    <div class="colorpicker-container">
                        <input id="color_link_hover" type="text" class="txtColorPicker zo2_preset_variable" value="<?php echo $currentData['link_hover'] ?>">
                        <span id="color_link_hover_preview" class="color-preview" style="background-color: <?php echo empty($currentData['link_hover']) ? 'transparent' : $currentData['link_hover'] ?>"></span>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label for="color_link_hover">Bottom 1</label>
                </div>
                <div class="controls">
                    <div class="colorpicker-container">
                        <input id="color_bottom1" type="text" class="txtColorPicker zo2_preset_variable" value="<?php echo $currentData['bottom1'] ?>">
                        <span id="color_bottom1_preview" class="color-preview" style="background-color: <?php echo empty($currentData['bottom1']) ? 'transparent' : $currentData['bottom1'] ?>"></span>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label for="color_link_hover">Bottom 2</label>
                </div>
                <div class="controls">
                    <div class="colorpicker-container">
                        <input id="color_bottom2" type="text" class="txtColorPicker zo2_preset_variable" value="<?php echo $currentData['bottom2'] ?>">
                        <span id="color_bottom2_preview" class="color-preview" style="background-color: <?php echo empty($currentData['bottom2']) ? 'transparent' : $currentData['bottom2'] ?>"></span>
                    </div>
                </div>
            </div>

            <div class="control-group">
                <div class="control-label">
                    <label for="color_footer">Footer</label>
                </div>
                <div class="controls">
                    <div class="colorpicker-container">
                        <input id="color_footer" type="text" class="txtColorPicker zo2_preset_variable" value="<?php echo $currentData['footer'] ?>">
                        <span id="color_footer_preview" class="color-preview" style="background-color: <?php echo empty($currentData['footer']) ? 'transparent' : $currentData['footer'] ?>"></span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="zo2_themes_row clearfix">
        <div class="zo2_themes_label">
            Other Preset Settings
        </div>
        <div class="zo2_themes_form_container">
            <?php
            if(!empty($p['variables']['extra'])) {
                $extra = json_decode($p['variables']['extra']);
                if(count($extra) > 0) {
                    foreach($extra as $element => $color) {
                        ?>
                        <div class="zo2_themes_form">
                            <div class="control-group">
                                <div class="control-label">
                                    <label><input value="<?php echo $element;?>" class="zo2_other_preset_element zo2_other_preset"></label>
                                </div>
                                <div class="controls">
                                    <div class="colorpicker-container">
                                        <input id="extra_element_value" type="text" class="txtColorPicker zo2_other_preset zo2_other_preset_value" value="<?php echo $color ?>">
                                        <span id="extra_element_preview" class="color-preview" style="background-color: <?php echo empty($color) ? 'transparent' : $color ?>"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                }
            }else {
                ?>
                <div class="zo2_themes_form">
                    <div class="control-group">
                        <div class="control-label">
                            <label><input placeholder="ID or class of element" value="" class="zo2_other_preset_element zo2_other_preset"></label>
                        </div>
                        <div class="controls">
                            <div class="colorpicker-container">
                                <input id="extra_element_value" type="text" class="txtColorPicker zo2_other_preset zo2_other_preset_value" value="">
                                <span id="extra_element_preview" class="color-preview" style="background-color: 'transparent'"></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <br />
        <input type="hidden" id="extra_preset_value" value="">
        <input type="button" class="btn add_more_preset" value="Add more" />
    </div>

</div>