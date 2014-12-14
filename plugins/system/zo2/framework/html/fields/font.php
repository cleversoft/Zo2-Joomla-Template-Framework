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
defined('_JEXEC') or die('Restricted access');
$name = $this->data['name'];
$dataValue = new JObject($this->data['value']);
$dataValue->def('type', 'none');
$dataValue->def('size', 14);
$dataValue->def('font_line_height', 30);
$fontFamily = new JObject($dataValue->get('family'));
$fontType = $dataValue->get('type');
$noneFont = $fontFamily->get('none');
$standardFont = $fontFamily->get('standard');
$googleFont = $fontFamily->get('googlefonts');
$fontdeckFont = $fontFamily->get('fontdeck');

/**
 * List Standard font
 */
$standardFonts = array(
    'Arial' => 'Arial',
    'Courier New' => 'Courier New',
    'Georgia' => 'Georgia',
    'Helvetica' => 'Helvetica',
    'Lucida Sans' => 'Lucida Sans',
    'Lucida Sans Unicode' => 'Lucida Sans Unicode',
    'Myriad Pro' => 'Myriad Pro',
    'Palatino Linotype' => 'Palatino Linotype',
    'Tahoma' => 'Tahoma',
    'Times New Roman' => 'Times New Roman',
    'Trebuchet MS' => 'Trebuchet MS',
    'Verdana' => 'Verdana'
);
?>
<div class="zo2-font-container">
    <h3><?php echo $this->label['label']; ?></h3>
    <div class="font_options">
        <!-- Font type -->
        <div class="control-group">
            <div class="control-label">
                <label class="zo2-label"><?php echo JText::_('ZO2_TEMPLATE_FONT_TYPE'); ?></label>
                <div class="label-desc"><?php echo JText::_('ZO2_TEMPLATE_FONT_TYPE_DESC'); ?> <?php echo $this->label['label']; ?></div>
            </div>
            <div class="controls">
                <div class="btn-group font-types" data-toggle="buttons-radio">
                    <input type="hidden" class="zo2-font-type" name="jform[params][<?php echo $name; ?>][type]" value="<?php echo $fontType; ?>" />
                    <button type="button"
                            data-target="none"
                            class="btn btn-none-fonts <?php echo ( $fontType == 'none' ) ? 'active btn-default' : '' ?>">
                                <?php echo JText::_('ZO2_ADMIN_NONE'); ?>
                    </button>
                    <button type="button" 
                            data-target="standard" 
                            class="btn btn-standard-fonts <?php echo ( $fontType == 'standard' ) ? 'active btn-success' : '' ?>">
                                <?php echo JText::_('ZO2_TEMPLATE_FONT_STANDARD'); ?>
                    </button>
                    <button type="button" 
                            data-target="googlefonts" 
                            class="btn btn-google-fonts <?php echo ( $fontType == 'googlefonts' ) ? 'active btn-success' : '' ?>">
                                <?php echo JText::_('ZO2_TEMPLATE_FONT_GOOGLE'); ?>
                    </button>
                    <button type="button" 
                            data-target="fontdeck" 
                            class="btn btn-font-deck <?php echo ( $fontType == 'fontdeck' ) ? 'active btn-success' : '' ?>">
                                <?php echo JText::_('ZO2_TEMPLATE_FONT_FONTDECK'); ?>
                    </button>
                </div>
            </div>
        </div>
        <!-- Standard font -->
        <div class="zo2-font-options zo2-font-options-standard control-group hide">
            <div class="control-label">
                <label class="zo2-label"><?php echo JText::_('ZO2_TEMPLATE_FONT_STANDARD'); ?></label>
                <div class="label-desc"<?php echo JText::_('ZO2_TEMPLATE_FONT_STANDARD_DESC'); ?>> <?php echo $this->label['label']; ?></div>
            </div>
            <div class="controls">
                <!-- Standard fonts list -->
                <select class="ddl-standard-font show" name="jform[params][<?php echo $name; ?>][family][standard]">
                    <?php foreach ($standardFonts as $font) : ?>
                        <option <?php echo $standardFont == $font ? 'selected="selected"' : '' ?> value="<?php echo htmlspecialchars($font) ?>">
                            <?php echo htmlspecialchars($font); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <!-- Preview -->
                <h3 class="example" style="font-family: <?php echo ( $fontType == 'standard' ) ? $standardFont : ''; ?>"><?php echo JText::_('ZO2_ADMIN_FONT_EXAMPLE'); ?></h3>
            </div>
        </div>
        <!-- Google font -->
        <div class="zo2-font-options zo2-font-options-googlefonts control-group hide">
            <div class="control-label">
                <label class="zo2-label"><?php echo JText::_('ZO2_TEMPLATE_FONT_GOOGLE'); ?></label>
                <div class="label-desc"><?php echo JText::_('ZO2_TEMPLATE_FONT_GOOGLE_DESC'); ?> <?php echo $this->label['label']; ?></div>
            </div>
            <div class="controls">
                <input type="text" name="jform[params][<?php echo $name; ?>][family][googlefonts]" class="txt-googlefont-select" value="<?php echo $googleFont; ?>" />
                <!-- Preview -->
                <h3 class="example" id="<?php echo $name ?>_font_family_example" style="font-family: <?php echo $googleFont; ?>"><?php echo JText::_('ZO2_ADMIN_FONT_EXAMPLE'); ?></h3>
            </div>
        </div>
        <!-- Fontdeck -->
        <div class="zo2-font-options zo2-font-options-fontdeck control-group hide">
            <div class="control-label">
                <label class="zo2-label"><?php echo JText::_('ZO2_TEMPLATE_FONT_FONTDECK'); ?></label>
                <div class="label-desc"><?php echo JText::_('ZO2_ADMIN_FONT_FONTDECK_DESCRIPTION'); ?></div>
            </div>
            <div class="controls">
                <textarea name="jform[params][<?php echo $name; ?>][family][fontdeck]" class="txt-fontdeck-css"><?php echo $fontdeckFont; ?></textarea>
            </div>
        </div>
        <!-- Font size -->
        <div class="control-group zo2-font-size-option hide">
            <div class="control-label">
                <label class="zo2-label"><?php echo JText::_('ZO2_ADMIN_FONT_SIZE'); ?></label>
                <div class="label-desc"><?php echo JText::_('ZO2_ADMIN_FONT_SIZE_DESC', $this->label['label']); ?></div>
            </div>
            <div class="controls clearfix">
                <input type="hidden" name="jform[params][<?php echo $name; ?>][size]" class="txt-font-size font_single_slider" value="<?php echo $dataValue->get('size'); ?>">
            </div>
        </div>
        <!-- Font line height -->
        <div class="control-group zo2-font-lineheight-option hide">
            <div class="control-label">
                <label class="zo2-label"><?php echo JText::_('ZO2_ADMIN_FONT_LINE_HEIGHT'); ?></label>
                <div class="label-desc"><?php echo JText::_('ZO2_ADMIN_FONT_LINE_HEIGHT_DESC'); ?></div>
            </div>
            <div class="controls clearfix">
                <input type="hidden" name="jform[params][<?php echo $name; ?>][font_line_height]" class="txt-font-line-height font_single_slider" value="<?php echo $dataValue->get('font_line_height'); ?>">
            </div>
        </div>
    </div>
</div>