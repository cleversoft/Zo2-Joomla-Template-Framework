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

if (!empty($this->data['value'])) {
    $data = $this->data['value'];
}
else {
    /**
     * default data
     */
    $data = new stdClass();
    $data->type = 'standard';
    $data->family = null;
    $data->size = 14;
    $data->font_line_height = 30;
}

$standard_font = isset($data->family->standard) ? $data->family->standard : null;
$googlefonts_font = isset($data->family->googlefonts) ? $data->family->googlefonts : null;
$fontdeck_font = isset($data->family->fontdeck) ? $data->family->fontdeck : null;
/**
 * List Standard font
 */
$standard_fonts_list = array(
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
        <div class="control-group">
            <div class="control-label">
                <label class="zo2-label"><?php echo JText::_('ZO2_TEMPLATE_FONT_TYPE'); ?></label>
                <div class="label-desc"><?php echo JText::_('ZO2_TEMPLATE_FONT_TYPE_DESC'); ?> <?php echo $this->label['label']; ?></div>
            </div>
            <div class="controls">
                <div class="btn-group font-types" data-toggle="buttons-radio">
                    <input type="hidden" class="zo2-font-type" name="jform[params][<?php echo $this->data['name']; ?>][type]" value="<?php echo $data->type; ?>" />
                    <button type="button" data-target="standard" class="btn btn-standard-fonts <?php echo $data->type == 'standard' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_TEMPLATE_FONT_STANDARD'); ?></button>
                    <button type="button" data-target="googlefonts" class="btn btn-google-fonts <?php echo $data->type == 'googlefonts' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_TEMPLATE_FONT_GOOGLE'); ?></button>
                    <button type="button" data-target="fontdeck" class="btn btn-font-deck <?php echo $data->type == 'fontdeck' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_TEMPLATE_FONT_FONTDECK'); ?></button>
                </div>
            </div>
        </div>
        <div class="zo2-font-options zo2-font-options-standard control-group">
            <div class="control-label">
                <label class="zo2-label"><?php echo JText::_('ZO2_TEMPLATE_FONT_STANDARD'); ?></label>
                <div class="label-desc"<?php echo JText::_('ZO2_TEMPLATE_FONT_STANDARD_DESC'); ?>> <?php echo $this->label['label']; ?></div>
            </div>
            <div class="controls">
                <select class="ddl-standard-font show" name="jform[params][<?php echo $this->data['name']; ?>][family][standard]">
                    <?php foreach ($standard_fonts_list as $font) : ?>
                        <option <?php echo $standard_font == $font ? 'selected="selected"' : '' ?> value="<?php echo htmlspecialchars($font) ?>"><?php echo htmlspecialchars($font); ?></option>
                    <?php endforeach; ?>
                </select>
                <h3 class="example" style="font-family: <?php echo $data->type == 'standard' ? $standard_font : ''; ?>"><?php echo JText::_('ZO2_ADMIN_FONT_EXAMPLE'); ?></h3>
            </div>
        </div>

        <div class="zo2-font-options zo2-font-options-googlefonts  control-group">
            <div class="control-label">
                <label class="zo2-label"><?php echo JText::_('ZO2_TEMPLATE_FONT_GOOGLE'); ?></label>
                <div class="label-desc"><?php echo JText::_('ZO2_TEMPLATE_FONT_GOOGLE_DESC'); ?> <?php echo $this->label['label']; ?></div>
            </div>
            <div class="controls">
                <input type="text" name="jform[params][<?php echo $this->data['name']; ?>][family][googlefonts]" class="txt-googlefont-select" value="<?php echo $googlefonts_font; ?>" />
                <h3 class="example" id="<?php echo $this->data['name'] ?>_font_family_example" style="font-family: <?php echo $googlefonts_font; ?>"><?php echo JText::_('ZO2_ADMIN_FONT_EXAMPLE'); ?></h3>
            </div>
        </div>

        <div class="zo2-font-options zo2-font-options-fontdeck control-group">
            <div class="control-label">
                <label class="zo2-label"><?php echo JText::_('ZO2_TEMPLATE_FONT_FONTDECK'); ?></label>
                <div class="label-desc"><?php echo JText::_('ZO2_ADMIN_FONT_FONTDECK_DESCRIPTION'); ?></div>
            </div>
            <div class="controls">
                <textarea name="jform[params][<?php echo $this->data['name']; ?>][family][fontdeck]" class="txt-fontdeck-css"><?php echo $fontdeck_font; ?></textarea>
            </div>
        </div>

        <div class="control-group">
            <div class="control-label">
                <label class="zo2-label"><?php echo JText::_('ZO2_ADMIN_FONT_SIZE'); ?></label>
                <div class="label-desc"><?php echo JText::_('ZO2_ADMIN_FONT_SIZE_DESC', $this->label['label']); ?></div>
            </div>
            <div class="controls clearfix">
                <input type="hidden" name="jform[params][<?php echo $this->data['name']; ?>][size]" class="txt-font-size font_single_slider" value="<?php echo !empty($data->size) ? $data->size : 14; ?>">
            </div>
        </div>
        <div class="control-group">
            <div class="control-label">
                <label class="zo2-label"><?php echo JText::_('ZO2_ADMIN_FONT_LINE_HEIGHT'); ?></label>
                <div class="label-desc"><?php echo JText::_('ZO2_ADMIN_FONT_LINE_HEIGHT_DESC'); ?></div>
            </div>
            <div class="controls clearfix">
                <input type="hidden" name="jform[params][<?php echo $this->data['name']; ?>][font_line_height]" class="txt-font-line-height font_single_slider" value="<?php echo !empty($data->font_line_height) ? $data->font_line_height : 30; ?>">
            </div>
        </div>
    </div>
</div>