<!-- Tab Fonts -->
<div class="tab-pane" id="zo2-fonts">
    <!-- Sub navbar -->
    <ul id="myTabGeneral" class="nav nav-pills">
        <li class=""><a href="#fonts-options" data-toggle="tab"><?php echo JText::_('ZO2_ADMIN_FONT_OPTION'); ?></a></li>        
    </ul>
    <!-- Sub navbar content -->
    <div id="myTabFontsContent" class="tab-content">
        <!-- Options -->
        <div class="tab-pane active" id="fonts-options">
            <!-- Description -->
            <?php
            echo Zo2Html::field(
                    'description', null, array(
                'text' => 'Short description about this page',
                'subtext' => '<a href="http://www.zootemplate.com/blog">Document</a>'
            ));
            ?>
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
                <!--            <h3>--><?php //echo JText::_('ZO2_ADMIN_FONT_OPTION');        ?><!--</h3>-->
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
                        </div>
                        <div class="controls">
                            <div class="btn-group font-types" data-toggle="buttons-radio">
                                <button type="button" class="btn btnStandardFonts <?php echo $data['type'] == 'standard' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_ADMIN_FONT_STANDARD'); ?></button>
                                <button type="button" class="btn btnGoogleFonts <?php echo $data['type'] == 'googlefonts' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_ADMIN_FONT_GOOGLE'); ?></button>
                                <button type="button" class="btn btnFontDeck <?php echo $data['type'] == 'fontdeck' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_ADMIN_FONT_FONTDECK'); ?></button>
                            </div>
                            <div class="font-desc"><?php echo JText::_('ZO2_ADMIN_FONT_TYPE_DESC'); ?><?php //echo strtolower($this->getLabel())        ?></div>
                        </div>
                    </div>

                    <div class="font-options-standard control-group" <?php echo $data['type'] == 'standard' ? 'style="display:block"' : '' ?>>
                        <div class="control-label">
                            <div class="font-label"><?php echo JText::_('ZO2_ADMIN_FONT_STANDARD'); ?></div>
                        </div>
                        <div class="controls">
                            <select class="ddlStandardFont show">
                                <?php foreach ($standardFonts as $font) : ?>
                                    <option <?php echo $data['family'] == $font ? 'selected' : '' ?> value="<?php echo htmlspecialchars($font) ?>"><?php echo htmlspecialchars($font) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="font-desc"><?php echo JText::_('ZO2_ADMIN_FONT_STANDARD_DESCRIPTION'); ?><?php //echo strtolower($this->getLabel())        ?></div>
                        </div>
                    </div>

                    <div class="font-options-google hide control-group" <?php echo $data['type'] == 'googlefonts' ? 'style="display:block"' : '' ?>>
                        <div class="control-label">
                            <div class="font-label"><?php echo JText::_('ZO2_ADMIN_FONT_GOOGLE'); ?></div>
                        </div>
                        <div class="controls">
                            <input type="text" class="txtGoogleFontSelect" value="<?php echo $data['type'] == 'googlefonts' ? $data['family'] : '' ?>" />
                            <div class="font-desc"><?php echo JText::_('ZO2_ADMIN_FONT_GOOGLE_DESCRIPTION'); ?><?php //echo strtolower($this->getLabel())        ?></div>
                        </div>
                    </div>

                    <div class="font-options-fontdeck hide control-group" <?php echo $data['type'] == 'fontdeck' ? 'style="display:block"' : '' ?>>
                        <div class="control-label">
                            <div class="font-label"><?php echo JText::_('ZO2_ADMIN_FONT_FONTDECK'); ?></div>
                        </div>
                        <div class="controls">
                            <textarea class="txtFontDeckCss"><?php echo $data['type'] == 'fontdeck' ? $data['family'] : '' ?></textarea>
                            <div class="font-desc"><?php echo JText::_('ZO2_ADMIN_FONT_FONTDECK_DESCRIPTION'); ?></div>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="control-label">
                            <div class="font-label"><?php echo JText::_('ZO2_ADMIN_FONT_SIZE_OPTION'); ?></div>
                        </div>
                        <div class="controls floatdiv clearfix">
                            <div><input type="text" class="txtFontSize" value="<?php echo $data['size'] ?>" /></div>
                            <div class="font-desc"><?php echo JText::_('ZO2_ADMIN_FONT_SIZE_DESCRIPTION'); ?></div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <div class="font-label"><?php echo JText::_('ZO2_ADMIN_FONT_COLOR_OPTION'); ?></div>
                        </div>
                        <div class="controls clearfix">
                            <div class="colorpicker-container">
                                <input type="text" class="txtColorPicker" value="<?php echo $data['color'] ?>" />
                                <span class="color-preview" style="background-color: <?php echo empty($data['color']) ? 'transparent' : $data['color'] ?>"></span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <div class="font-label"><?php echo JText::_('ZO2_ADMIN_FONT_WEIGHT_OPTION'); ?></div>
                        </div>
                        <div class="controls clearfix">
                            <select class="ddlFontStyle">
                                <?php foreach ($fontStyles as $style => $title) { ?>
                                    <?php $selected = trim($data['style']) == trim($style); ?>
                                    <option <?php echo ($selected) ? 'selected' : '' ?> value="<?php echo $style ?>"><?php echo $title ?></option>
                                <?php } ?>
                            </select>
                            <div class="font-desc">Specify the <?php //echo strtolower($this->getLabel())        ?> font properties</div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="font-container">
                <div class="control-group font-deck-code" style="margin-top:20px">
                    <?php
                    echo Zo2Html::field(
                            'textarea', array(
                        'label' => JText::_('ZO2_ADMIN_FONT_FONTDESK_CODE'),
                            ), array(
                        'name' => 'jform[params][fontdeck_code]',
                        'rows' => 10,
                        'cols' => 20,
                        'value' => Zo2Factory::get('fontdeck_code')
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
