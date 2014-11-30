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
$font_setting = null;
$enable = false;
if (!empty($this->data['value'])) {
    $font_setting = json_decode($this->data['value'], true);
    $enable = true;
}
/**
 * Init default data
 */
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
<div class="font-container">
    <input type="hidden" value="" name="jform[params][<?php echo $this->data['name'] ?>]" id="jform_params_<?php echo $this->data['name'] ?>">

    <h3><?php echo $this->label['label']; ?></h3>
    <div class="font_options" <?php echo $font_setting ? 'style="display:block"' : 'style="display:none"' ?>>
        <div class="control-group">
            <div class="control-label">
                <div class="font-label"><?php echo JText::_('ZO2_TEMPLATE_FONT_TYPE'); ?></div>
                <div class="font-desc"><?php echo JText::_('ZO2_TEMPLATE_FONT_TYPE_DESC'); ?> <?php echo $this->label['label']; ?></div>
            </div>
            <div class="controls">
                <div class="btn-group font-types" data-toggle="buttons-radio">
                    <button type="button" class="btn btnStandardFonts <?php echo $font_setting['type'] == 'standard' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_TEMPLATE_FONT_STANDARD'); ?></button>
                    <button type="button" class="btn btnGoogleFonts <?php echo $font_setting['type'] == 'googlefonts' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_TEMPLATE_FONT_GOOGLE'); ?></button>
                    <button type="button" class="btn btnFontDeck <?php echo $font_setting['type'] == 'fontdeck' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_TEMPLATE_FONT_FONTDECK'); ?></button>
                </div>
            </div>
        </div>

        <div class="font-options-standard control-group" <?php echo $font_setting['type'] == 'standard' ? 'style="display:block"' : '' ?>>
            <div class="control-label">
                <div class="font-label"><?php echo JText::_('ZO2_TEMPLATE_FONT_STANDARD'); ?></div>
                <div class="font-desc"<?php echo JText::_('ZO2_TEMPLATE_FONT_STANDARD_DESC'); ?>> <?php echo $this->label['label']; ?></div>
            </div>
            <div class="controls">
                <select class="ddlStandardFont show">
                    <?php foreach ($standardFonts as $font) : ?>
                        <option <?php echo $font_setting['family'] == $font ? 'selected' : '' ?> value="<?php echo htmlspecialchars($font) ?>"><?php echo htmlspecialchars($font) ?></option>
                    <?php endforeach; ?>
                </select>
                <h3 class="example" style="font-family: <?php echo $font_setting['type'] == 'googlefonts' ? $font_setting['family'] : '' ?>"><?php echo JText::_('ZO2_ADMIN_FONT_EXAMPLE'); ?></h3>
            </div>
        </div>

        <div class="font-options-google hide control-group" <?php echo $font_setting['type'] == 'googlefonts' ? 'style="display:block"' : '' ?>>
            <div class="control-label">
                <div class="font-label"><?php echo JText::_('ZO2_TEMPLATE_FONT_GOOGLE'); ?></div>
                <div class="font-desc"><?php echo JText::_('ZO2_TEMPLATE_FONT_GOOGLE_DESC'); ?> <?php echo $this->label['label']; ?></div>
            </div>
            <div class="controls">
                <input type="text" id="<?php echo $this->data['name'] ?>_font_family" class="txtGoogleFontSelect" value="<?php echo $font_setting['type'] == 'googlefonts' ? $font_setting['family'] : '' ?>" />
                <h3 class="example" id="<?php echo $this->data['name'] ?>_font_family_example" style="font-family: <?php echo $font_setting['type'] == 'googlefonts' ? $font_setting['family'] : '' ?>"><?php echo JText::_('ZO2_ADMIN_FONT_EXAMPLE'); ?></h3>
            </div>
        </div>

        <div class="font-options-fontdeck hide control-group" <?php echo $font_setting['type'] == 'fontdeck' ? 'style="display:block"' : '' ?>>
            <div class="control-label">
                <div class="font-label"><?php echo JText::_('ZO2_TEMPLATE_FONT_FONTDECK'); ?></div>
                <div class="font-desc"><?php echo JText::_('ZO2_TEMPLATE_FONT_FONTDECK_DESC '); ?></div>
            </div>
            <div class="controls">
                <textarea class="txtFontDeckCss"><?php echo $font_setting['type'] == 'fontdeck' ? $font_setting['family'] : '' ?></textarea>
            </div>
        </div>

        <div class="control-group">
            <div class="control-label">
                <div class="font-label"><?php echo JText::_('ZO2_ADMIN_FONT_SIZE'); ?></div>
                <div class="font-desc"><?php echo JText::_('ZO2_ADMIN_FONT_SIZE_DESC', $this->label['label']); ?></div>
            </div>
            <div class="controls clearfix">
                <input type="hidden" class="txtFontSize font_single_slider" value="<?php echo $font_setting['size'] ?>">
            </div>
        </div>
        <div class="control-group">
            <div class="control-label">
                <div class="font-label"><?php echo JText::_('ZO2_ADMIN_FONT_LINE_HEIGHT'); ?></div>
                <div class="font-desc"><?php echo JText::_('ZO2_ADMIN_FONT_LINE_HEIGHT_DESC'); ?></div>
            </div>
            <div class="controls clearfix">
                <input type="hidden" class="txtFontLineHeight font_single_slider" value="<?php echo $font_setting['font_line_height'] ?>">
            </div>
        </div>

    </div>
</div>