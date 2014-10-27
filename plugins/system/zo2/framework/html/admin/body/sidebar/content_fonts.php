<!-- Tab Fonts -->
<div class="tab-pane" id="zo2-fonts">
    <blockquote>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        <small>Someone famous <cite title="Source Title">Source Title</cite></small>
    </blockquote>
    <div class="profiles-pane">
        <h3 class="title-profile"><?php echo JText::_('ZO2_ADMIN_FONT_OPTION'); ?></h3>
        <?php
            $data = null;
            $enable = false;
            $value = $this->params->get('fonts');
            if (!empty($value)) {
                $data = json_decode($value, true);
                $enable = true;
            }
            /**
             * Init default data
             */
            if (!isset($data['type']))
                $data['type'] = 'standard';
            if (!isset($data['size']))
                $data['size'] = null;
            if (!isset($data['color']))
                $data['color'] = null;
            if (!isset($data['style']))
                $data['style'] = null;
            if (!isset($data['family']))
                $data['family'] = null;

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
<!--            <h3>--><?php //echo JText::_('ZO2_ADMIN_FONT_OPTION'); ?><!--</h3>-->
            <div class="control-group">
                <div class="control-label">
                    <div class="font-label"><?php echo JText::_('ZO2_ADMIN_ENABLE'); ?></div>
                </div>
                <div class="controls btn-group btn-group-onoff cbEnableFont">
                    <button class="btn btn-on <?php echo $enable ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_ON'); ?></button>
                    <button class="btn btn-off <?php echo!$enable ? 'active btn-danger' : '' ?>"><?php echo JText::_('ZO2_OFF'); ?></button>
                </div>
            </div>
            <div class="font_options" <?php echo $data ? 'style="display:block"' : 'style="display:none"' ?>>
                <div class="control-group">
                    <div class="control-label">
                        <div class="font-label"><?php echo JText::_('ZO2_ADMIN_FONT_TYPE'); ?></div>
                        <div class="font-desc"><?php echo JText::_('ZO2_ADMIN_FONT_TYPE_DESC'); ?><?php //echo strtolower($this->getLabel()) ?></div>
                    </div>
                    <div class="controls">
                        <div class="btn-group font-types" data-toggle="buttons-radio">
                            <button type="button" class="btn btnStandardFonts <?php echo $data['type'] == 'standard' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_ADMIN_FONT_STANDARD'); ?></button>
                            <button type="button" class="btn btnGoogleFonts <?php echo $data['type'] == 'googlefonts' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_ADMIN_FONT_GOOGLE'); ?></button>
                            <button type="button" class="btn btnFontDeck <?php echo $data['type'] == 'fontdeck' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_ADMIN_FONT_FONTDECK'); ?></button>
                        </div>
                    </div>
                </div>

                <div class="font-options-standard control-group" <?php echo $data['type'] == 'standard' ? 'style="display:block"' : '' ?>>
                    <div class="control-label">
                        <div class="font-label"><?php echo JText::_('ZO2_ADMIN_FONT_STANDARD'); ?></div>
                        <div class="font-desc"><?php echo JText::_('ZO2_ADMIN_FONT_STANDARD_DESCRIPTION'); ?><?php //echo strtolower($this->getLabel()) ?></div>
                    </div>
                    <div class="controls">
                        <select class="ddlStandardFont show">
                            <?php foreach ($standardFonts as $font) : ?>
                                <option <?php echo $data['family'] == $font ? 'selected' : '' ?> value="<?php echo htmlspecialchars($font) ?>"><?php echo htmlspecialchars($font) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="font-options-google hide control-group" <?php echo $data['type'] == 'googlefonts' ? 'style="display:block"' : '' ?>>
                    <div class="control-label">
                        <div class="font-label"><?php echo JText::_('ZO2_ADMIN_FONT_GOOGLE'); ?></div>
                        <div class="font-desc"><?php echo JText::_('ZO2_ADMIN_FONT_GOOGLE_DESCRIPTION'); ?><?php //echo strtolower($this->getLabel()) ?></div>
                    </div>
                    <div class="controls">
                        <input type="text" class="txtGoogleFontSelect" value="<?php echo $data['type'] == 'googlefonts' ? $data['family'] : '' ?>" />
                    </div>
                </div>

                <div class="font-options-fontdeck hide control-group" <?php echo $data['type'] == 'fontdeck' ? 'style="display:block"' : '' ?>>
                    <div class="control-label">
                        <div class="font-label"><?php echo JText::_('ZO2_ADMIN_FONT_FONTDECK'); ?></div>
                        <div class="font-desc"><?php echo JText::_('ZO2_ADMIN_FONT_FONTDECK_DESCRIPTION'); ?></div>
                    </div>
                    <div class="controls">
                        <textarea class="txtFontDeckCss"><?php echo $data['type'] == 'fontdeck' ? $data['family'] : '' ?></textarea>
                    </div>
                </div>

                <div class="control-group">
                    <div class="control-label">
                        <div class="font-label"><?php echo JText::_('ZO2_ADMIN_FONT_OPTION'); ?></div>
                        <div class="font-desc">Specify the <?php //echo strtolower($this->getLabel()) ?> font properties</div>
                    </div>
                    <div class="controls floatdiv clearfix">
                        <div><input type="text" class="txtFontSize" value="<?php echo $data['size'] ?>" /> px</div>

                        <div class="colorpicker-container">
                            <input type="text" class="txtColorPicker" value="<?php echo $data['color'] ?>" />
                            <span class="color-preview" style="background-color: <?php echo empty($data['color']) ? 'transparent' : $data['color'] ?>"></span>
                        </div>

                        <div>
                            <select class="ddlFontStyle">
                                <?php foreach ($fontStyles as $style => $title) { ?>
                                    <?php $selected = trim($data['style']) == trim($style); ?>
                                    <option <?php echo ($selected) ? 'selected' : '' ?> value="<?php echo $style ?>"><?php echo $title ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
