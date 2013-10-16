<?php
$templatePath = JUri::root(true) . '/templates/' . $zo2->getTemplateName();
if (!isset($presets)) $presets = array();
if (!empty($this->value)) $currentData = json_decode($this->value, true);
else $currentData = array('name' => 'default');
?>
<div id="zo2_themes_container">
    <input type="hidden" value="<?php echo htmlspecialchars($this->value)?>" name="<?php echo $this->name?>" id="<?php echo $this->id?>" />
    <ul id="zo2_themes">
        <?php foreach ($presets as $p) : ?>
        <li class="<?php echo $p['name'] == $currentData['name'] ? 'active' : ''?>"
            data-zo2-theme="<?php echo $p['name']?>" data-zo2-background="<?php echo $p['variables']['background']?>"
            data-zo2-header="<?php echo $p['variables']['header']?>"
            data-zo2-link="<?php echo $p['variables']['link']?>"
            data-zo2-link-hover="<?php echo $p['variables']['link_hover']?>"
            data-zo2-text="<?php echo $p['variables']['text']?>"
            data-zo2-css="<?php echo $p['css']?>" data-zo2-less="<?php echo $p['less']?>"
        >
            <div class="theme_title"><?php echo ucfirst($p->name)?></div>
            <div class="theme_thumbnail">
                <img src="<?php echo $templatePath . $p['thumbnail']?>">
            </div>
        </li>
        <?php endforeach ?>
    </ul>

    <div class="control-group">
        <div class="control-label">
            <label for="color_background">Background</label>
        </div>
        <div class="controls">
            <div class="colorpicker-container">
                <input id="color_background" type="text" class="txtColorPicker zo2_preset_variable" value="<?php echo $currentData['background']?>">
                <span id="color_background_preview" class="color-preview" style="background-color: <?php echo empty($currentData['background']) ? 'transparent' : $currentData['background']?>"></span>
            </div>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
            <label for="color_header">Header</label>
        </div>
        <div class="controls">
            <div class="colorpicker-container">
                <input id="color_header" type="text" class="txtColorPicker zo2_preset_variable" value="<?php echo $currentData['header']?>">
                <span id="color_header_preview" class="color-preview" style="background-color: <?php echo empty($currentData['header']) ? 'transparent' : $currentData['header']?>"></span>
            </div>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
            <label for="color_text">Text</label>
        </div>
        <div class="controls">
            <div class="colorpicker-container">
                <input id="color_text" type="text" class="txtColorPicker zo2_preset_variable" value="<?php echo $currentData['text']?>">
                <span id="color_text_preview" class="color-preview" style="background-color: <?php echo empty($currentData['text']) ? 'transparent' : $currentData['text']?>"></span>
            </div>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
            <label for="color_link">Link</label>
        </div>
        <div class="controls">
            <div class="colorpicker-container">
                <input id="color_link" type="text" class="txtColorPicker zo2_preset_variable" value="<?php echo $currentData['link']?>">
                <span id="color_link_preview" class="color-preview" style="background-color: <?php echo empty($currentData['link']) ? 'transparent' : $currentData['link']?>"></span>
            </div>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
            <label for="color_link_hover">Link hover</label>
        </div>
        <div class="controls">
            <div class="colorpicker-container">
                <input id="color_link_hover" type="text" class="txtColorPicker zo2_preset_variable" value="<?php echo $currentData['link_hover']?>">
                <span id="color_link_hover_preview" class="color-preview" style="background-color: <?php echo empty($currentData['link_hover']) ? 'transparent' : $currentData['link_hover']?>"></span>
            </div>
        </div>
    </div>
</div>