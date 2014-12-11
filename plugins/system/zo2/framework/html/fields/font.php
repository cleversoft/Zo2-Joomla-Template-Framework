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
/* @var $this JFormFieldFont */

/**
 * default data
 */
$default_setting = array();


if (!empty($this->data['value'])) {

    echo '<pre>';
    print_r($this->data['value']);
    echo '</pre>';


    $data = $this->data['value'];

}
else {
    $data = $default_setting;
}


/*
if (!isset($font_setting['type']))
    $font_setting['type'] = 'standard';
if (!isset($font_setting['size']))
    $font_setting['size'] = '14';
if (!isset($font_setting['style']))
    $font_setting['style'] = null;
if (!isset($font_setting['family']))
    $font_setting['family'] = null;
if (!isset($font_setting['font_line_height']))
    $font_setting['font_line_height'] = '30';
*/

/**
* List Standard font
*/
$standard_fonts = array(
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
<div class="font-container">
    <h3><?php echo $this->label['label']; ?></h3>
    <div class="font_options">
        <div class="control-group">
            <div class="control-label">
                <label class="zo2-label"><?php echo JText::_('ZO2_TEMPLATE_FONT_TYPE'); ?></label>
                <div class="label-desc"><?php echo JText::_('ZO2_TEMPLATE_FONT_TYPE_DESC'); ?> <?php echo $this->label['label']; ?></div>
            </div>
            <div class="controls">
                <input type="hidden" name="jform[params][<?php echo $this->data['name']; ?>][type]" value="<?php echo isset($data->type) ? $data->type : 'standard'; ?>" />
                <div class="btn-group font-types" data-toggle="buttons-radio">
                    <button type="button" class="btn btn-standard-fonts <?php echo $data->type == 'standard' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_TEMPLATE_FONT_STANDARD'); ?></button>
                    <button type="button" class="btn btn-google-fonts <?php echo $data->type == 'googlefonts' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_TEMPLATE_FONT_GOOGLE'); ?></button>
                    <button type="button" class="btn btn-font-deck <?php echo $data->type == 'fontdeck' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_TEMPLATE_FONT_FONTDECK'); ?></button>
                </div>
            </div>
        </div>
        <input name="jform[params][<?php echo $this->data['name']; ?>][family]" class="zo2_font_family" value="">
        <div class="font-options-standard control-group" <?php echo $data->type == 'standard' ? 'style="display:block"' : ''; ?>>
            <div class="control-label">
                <label class="zo2-label"><?php echo JText::_('ZO2_TEMPLATE_FONT_STANDARD'); ?></label>
                <div class="label-desc"<?php echo JText::_('ZO2_TEMPLATE_FONT_STANDARD_DESC'); ?>> <?php echo $this->label['label']; ?></div>
            </div>
            <div class="controls">
                <select class="ddl-standard-font show">
                    <?php foreach ($standard_fonts as $font) : ?>
                        <option <?php echo $data->family == $font ? 'selected' : '' ?> value="<?php echo htmlspecialchars($font) ?>"><?php echo htmlspecialchars($font); ?></option>
                    <?php endforeach; ?>
                </select>
                <h3 class="example" style="font-family: <?php echo $data->type == 'googlefonts' ? $data->family : ''; ?>"><?php echo JText::_('ZO2_ADMIN_FONT_EXAMPLE'); ?></h3>
            </div>
        </div>

        <div class="font-options-google hide control-group" <?php echo $data->type == 'googlefonts' ? 'style="display:block"' : ''; ?>>
            <div class="control-label">
                <label class="zo2-label"><?php echo JText::_('ZO2_TEMPLATE_FONT_GOOGLE'); ?></label>
                <div class="label-desc"><?php echo JText::_('ZO2_TEMPLATE_FONT_GOOGLE_DESC'); ?> <?php echo $this->label['label']; ?></div>
            </div>
            <div class="controls">
                <input type="text" name="" class="txt-googlefont-select" value="<?php echo $data->type == 'googlefonts' ? $data->family : ''; ?>" />
                <h3 class="example" id="<?php echo $this->data['name'] ?>_font_family_example" style="font-family: <?php echo $data->type == 'googlefonts' ? $data->family : ''; ?>"><?php echo JText::_('ZO2_ADMIN_FONT_EXAMPLE'); ?></h3>
            </div>
        </div>

        <div class="font-options-fontdeck hide control-group" <?php echo $data->type == 'fontdeck' ? 'style="display:block"' : ''; ?>>
            <div class="control-label">
                <label class="zo2-label"><?php echo JText::_('ZO2_TEMPLATE_FONT_FONTDECK'); ?></label>
                <div class="label-desc"><?php echo JText::_('ZO2_ADMIN_FONT_FONTDECK_DESCRIPTION'); ?></div>
            </div>
            <div class="controls">
                <textarea class="txt-fontdeck-css"><?php echo $data->type == 'fontdeck' ? $data->family : ''; ?></textarea>
            </div>
        </div>

        <div class="control-group">
            <div class="control-label">
                <label class="zo2-label"><?php echo JText::_('ZO2_ADMIN_FONT_SIZE'); ?></label>
                <div class="label-desc"><?php echo JText::_('ZO2_ADMIN_FONT_SIZE_DESC', $this->label['label']); ?></div>
            </div>
            <div class="controls clearfix">
                <input type="hidden" class="txt-font-size font_single_slider" value="<?php echo $data->size; ?>">
            </div>
        </div>
        <div class="control-group">
            <div class="control-label">
                <label class="zo2-label"><?php echo JText::_('ZO2_ADMIN_FONT_LINE_HEIGHT'); ?></label>
                <div class="label-desc"><?php echo JText::_('ZO2_ADMIN_FONT_LINE_HEIGHT_DESC'); ?></div>
            </div>
            <div class="controls clearfix">
                <input type="hidden" class="txt-font-line-height font_single_slider" value="<?php echo $data->font_line_height; ?>">
            </div>
        </div>

    </div>
</div>