<div id="zo2-row-setting" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_ROW_SETTINGS'); ?></h4>
            </div>
            <div class="modal-body">
                <!-- begin -->
                <div class="control-group">
                    <label class="control-label" for="zo2-setting-jdoc"><?php echo JText::_('ZO2_ADMIN_COMMON_JDOC'); ?></label>
                    <div class="controls">
                        <!-- http://docs.joomla.org/Jdoc_statements -->
                        <select id="dlColJDoc">
                            <optgroup label="Joomla! Document">
                                <option value="component"><?php echo JText::_('ZO2_ADMIN_COMMON_COMPONENT'); ?></option>
                                <option value="modules"><?php echo JText::_('ZO2_ADMIN_COMMON_MODULES'); ?></option>
                                <option value="messsge"><?php echo JText::_('ZO2_ADMIN_COMMON_MESSAGE'); ?></option>
                            </optgroup>
                            <!-- These are extended for 3rd parties -->
                            <optgroup label="Menu">
                                <option value="canvasmenu"><?php echo JText::_('ZO2_ADMIN_COMMON_CANVAS'); ?></option>
                                <option value="megamenu"><?php echo JText::_('ZO2_ADMIN_COMMON_MEGA'); ?></option>
                            </optgroup>
                            <!-- These are extended for 3rd parties -->
                            <optgroup label="3rd parties">
                                <!-- Foreach 3rd -->
                            </optgroup>
                        </select>
                    </div>
                </div>
                <!-- begin -->
                <div class="control-group">
                    <label class="control-label" for="zo2-setting-type"><?php echo JText::_('ZO2_ADMIN_COMMON_POSITION'); ?></label>
                    <div class="controls">
                        <select id="dlColPosition">
                            <option value="component"><?php echo JText::_('ZO2_ADMIN_COMMON_COMPONENT'); ?></option>
                            <option value="message"><?php echo JText::_('ZO2_ADMIN_COMMON_MESSAGE'); ?></option>
                            <option value="mega_menu"><?php echo JText::_('ZO2_ADMIN_COMMON_MEGA_MENU'); ?></option>
                            <!-- Foreach Postion -->
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="zo2-setting-offset"><?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_OFFSET'); ?></label>
                    <div class="controls">
                        <select id="ddlColOffset">
                            <option value="0"><?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_NO_OFFSET'); ?></option>
                            <option value="1"><?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_OFFSET_LB'); ?>1</option>
                            <option value="2"><?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_OFFSET_LB'); ?>2</option>
                            <option value="3"><?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_OFFSET_LB'); ?>3</option>
                            <option value="4"><?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_OFFSET_LB'); ?>4</option>
                            <option value="5"><?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_OFFSET_LB'); ?>5</option>
                            <option value="6"><?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_OFFSET_LB'); ?>6</option>
                            <option value="7"><?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_OFFSET_LB'); ?>7</option>
                            <option value="8"><?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_OFFSET_LB'); ?>8</option>
                            <option value="9"><?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_OFFSET_LB'); ?>9</option>
                            <option value="10"><?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_OFFSET_LB'); ?>10</option>
                            <option value="11"><?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_OFFSET_LB'); ?>11</option>
                            <option value="12"><?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_OFFSET_LB'); ?>12</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="zo2-setting-style"><?php echo JText::_('ZO2_ADMIN_STYLEEDIT_STYLE'); ?></label>
                    <div class="controls">
                        <select id="ddlColStyle">
                            <!-- Foreach XHTML Style -->
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="zo2-setting-css"><?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_CUSTOM_CSS'); ?></label>
                    <div class="controls">
                        <input type="text" id="txtColCss" placeholder="<?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_CUSTOM_COLCSS'); ?>">
                    </div>
                </div>
                <div id="column-responsive">
                    <div class="control-group">
                        <div class="control-label">
                            <label><?php echo JText::_('ZO2_ADMIN_ENABLE_RESPONSIVE_MOBILE'); ?></label>
                        </div>
                        <div class="controls">
                            <fieldset class="radio" id="zo2-enable-responsive-mobile">
                                <input type="radio" value="0">
                                <label>No</label>
                                <input type="radio" checked="checked" value="1">
                                <label>Yes</label>
                            </fieldset>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label><?php echo JText::_('ZO2_ADMIN_ENABLE_RESPONSIVE_TABLET'); ?></label>
                        </div>
                        <div class="controls">
                            <fieldset class="radio" id="zo2-enable-responsive-tablet">
                                <input type="radio" value="0">
                                <label>No</label>
                                <input type="radio" checked="checked" value="1">
                                <label>Yes</label>
                            </fieldset>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label><?php echo JText::_('ZO2_ADMIN_ENABLE_RESPONSIVE_DESTOP'); ?></label>
                        </div>
                        <div class="controls">
                            <fieldset class="radio" id="zo2-enable-responsive-desktop">
                                <input type="radio" value="0">
                                <label>No</label>
                                <input type="radio" checked="checked" value="1">
                                <label>Yes</label>
                            </fieldset>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label><?php echo JText::_('ZO2_ADMIN_ENABLE_RESPONSIVE_LARGEDESTOP'); ?></label>
                        </div>
                        <div class="controls">
                            <fieldset class="radio" id="zo2-enable-responsive-largedesktop">
                                <input type="radio" value="0">
                                <label>No</label>
                                <input type="radio" checked="checked" value="1">
                                <label>Yes</label>
                            </fieldset>
                        </div>
                    </div>

                </div>
                <!-- end -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>