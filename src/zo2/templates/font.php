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
/* @var $this JFormFieldFont */
$data = null;
if (!empty($this->value)) $data = json_decode($this->value, true);

$standardFonts = array(
    '\'Helvetica Neue\', Helvetica',
    'Arial',
    'Tahoma',
    'Verdana',
    '\'Myriad Pro\''
);

$fontStyles = array(
    'n' => 'Normal',
    'b' => 'Bold',
    'i' => 'Italic',
    'bi' => 'Bold Italic'
);
?>
<div class="font-container">
    <input type="hidden" value="<?php echo htmlspecialchars($this->value)?>" name="<?php echo $this->name?>" id="<?php echo $this->id?>" />
    <h3><?php echo $this->getLabel()?></h3>
    <div class="control-group">
        <div class="control-label">
            <div class="font-label">Enable</div>
        </div>
        <!--
        <div class="controls">
            <label class="switch_wrap enable_type" for="cb<?php echo $this->fieldname?>">
                <input id="cb<?php echo $this->fieldname?>" class="cbEnableFont" type="checkbox" <?php echo $data ? 'checked' : '' ?> />
                <div class="switch"><span class="bullet"></span></div>
            </label>
        </div>
        -->
        <div class="controls btn-group btn-group-onoff cbEnableFont">
            <button class="btn btn-on <?php echo $data ? 'active btn-success' : ''?>">On</button>
            <button class="btn btn-off <?php echo !$data ? 'active btn-danger' : ''?>">Off</button>
        </div>
    </div>
    <div class="font_options" <?php echo $data ? 'style="display:block"' : 'style="display:none"' ?>>
        <div class="control-group">
            <div class="control-label">
                <div class="font-label">Font type</div>
                <div class="font-desc">Choose the type of font you want to use for <?php echo strtolower($this->getLabel())?></div>
            </div>
            <div class="controls">
                <div class="btn-group font-types" data-toggle="buttons-radio">
                    <button type="button" class="btn btnStandardFonts <?php echo $data['type'] == 'standard' ? 'active btn-success' : ''?>">Standard Fonts</button>
                    <button type="button" class="btn btnGoogleFonts <?php echo $data['type'] == 'googlefonts' ? 'active btn-success' : ''?>">Google Fonts</button>
                    <button type="button" class="btn btnFontDeck <?php echo $data['type'] == 'fontdeck' ? 'active btn-success' : ''?>">FontDeck</button>
                </div>
            </div>
        </div>

        <div class="font-options-standard control-group" <?php echo $data['type'] == 'standard' ? 'style="display:block"' : ''?>>
            <div class="control-label">
                <div class="font-label">Standard Font</div>
                <div class="font-desc">Choose the font face that is used for <?php echo strtolower($this->getLabel())?></div>
            </div>
            <div class="controls">
                <select class="ddlStandardFont show">
                    <?php foreach($standardFonts as $font) : ?>
                    <option <?php echo $data['family'] == $font ? 'selected' : ''?> value="<?php echo htmlspecialchars($font)?>"><?php echo htmlspecialchars($font)?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="font-options-google hide control-group" <?php echo $data['type'] == 'googlefonts' ? 'style="display:block"' : ''?>>
            <div class="control-label">
                <div class="font-label">Google Font</div>
                <div class="font-desc">Choose the type of font you want to use for <?php echo strtolower($this->getLabel())?></div>
            </div>
            <div class="controls">
                <input type="text" class="txtGoogleFontSelect" value="<?php echo $data['type'] == 'googlefonts' ? $data['family'] : ''?>" />
            </div>
        </div>

        <div class="font-options-fontdeck hide control-group" <?php echo $data['type'] == 'fontdeck' ? 'style="display:block"' : ''?>>
            <div class="control-label">
                <div class="font-label">FontDeck Name</div>
                <div class="font-desc">Paste the font family attribute from CSS code in Step 2 of FontDeck website here</div>
            </div>
            <div class="controls">
                <textarea class="txtFontDeckCss"><?php echo $data['type'] == 'fontdeck' ? $data['family'] : ''?></textarea>
            </div>
        </div>

        <div class="control-group">
            <div class="control-label">
                <div class="font-label">Font options</div>
                <div class="font-desc">Specify the <?php echo strtolower($this->getLabel())?> font properties</div>
            </div>
            <div class="controls floatdiv clearfix">
                <div><input type="number" class="txtFontSize" value="<?php echo $data['size']?>" /> px</div>

                <div class="colorpicker-container">
                    <input type="text" class="txtColorPicker" value="<?php echo $data['color']?>" />
                    <span class="color-preview" style="background-color: <?php echo empty($data['color']) ? 'transparent' : $data['color']?>"></span>
                </div>

                <div>
                    <select class="ddlFontStyle">
                        <?php foreach ($fontStyles as $style => $title) : ?>
                        <option <?php $data['style'] == $style ? 'selected' : ''?> value="<?php echo $style?>"><?php echo $title?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>