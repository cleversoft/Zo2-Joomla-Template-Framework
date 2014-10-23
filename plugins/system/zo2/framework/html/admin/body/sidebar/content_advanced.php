<!-- Advanced Tab Pane -->
<div class="tab-pane" id="zo2-advanced">
    <blockquote>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        <small>Someone famous <cite title="Source Title">Source Title</cite></small>
    </blockquote>
    <div class="profiles-pane">
        <h3 class="title-profile"><?php echo JText::_('ZO2_ADMIN_ADVANCED_OPTION'); ?></h3>
        <button class="btn btn-danger" id="btnClearCache" onClick="zo2.admin.ajax.clearCache(); return false;">Clear cache</button>
        <button class="btn btn-primary" id="btnClearCache">Compile</button>
        <div class="profiles-pane-inner">
            <div class="accordion" id="advanced-accordion">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-google"><?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?></a>
                    </div>
                    <div id="advanced-google" class="accordion-body collapse in">
                        <div class="accordion-inner">
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_GOOGLE_AUTHORSHIP'); ?>"><?php echo JText::_('ZO2_ADMIN_GOOGLE_AUTHORSHIP'); ?></label>
                                </div>
                                <div class="controls">
                                    <fieldset class="radio btn-group">
                                        <input name="jform[params][zo2_enable_googleauthorship]" type="radio" value="0" checked="checked" >
                                        <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
                                        <input name="jform[params][zo2_enable_googleauthorship]"  type="radio" value="1" >
                                        <label class="btn"><?php echo JText::_('ZO2_YES'); ?></label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_GOOGLE_PROFILE_URL'); ?>"><?php echo JText::_('ZO2_ADMIN_GOOGLE_PROFILE_URL'); ?></label>
                                </div>
                                <div class="controls">
                                    <input name="jform[params][zo2_google_profile_url]" type="text" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-comments"><?php echo JText::_('ZO2_ADMIN_COMMENTS'); ?></a>
                    </div>
                    <div id="advanced-comments" class="accordion-body collapse">
                        <div class="accordion-inner">
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="Enable Comments"><?php echo JText::_('ZO2_ADMIN_ENABLE_COMMENTS'); ?></label>
                                </div>
                                <div class="controls">
                                    <fieldset class="radio btn-group">
                                        <input name="jform[params][zo2_enable_comments]" type="radio" value="1" >
                                        <label class="btn"><?php echo JText::_('ZO2_YES'); ?></label>
                                        <input name="jform[params][zo2_enable_comments]" type="radio" value="0" checked="checked" >
                                        <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_TABS_ORDER_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_TABS_ORDER'); ?></label>
                                </div>
                                <div class="controls">
                                    <input name="jform[params][zo2_tab_order]" type="text" value="facebook,gplus,disqus">
                                    <div style="margin: 5px 0;">
                                        <?php echo JText::_('ZO2_ADMIN_TABS_ORDER_DESCRIPTION'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_DISQUS_SHORTNAME_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_DISQUS_SHORTNAME'); ?></label>
                                </div>
                                <div class="controls">
                                    <input name="jform[params][zo_disqus_shortname]" type="text" value="zootemplates">
                                    <div style="margin: 5px 0;">
                                        <?php echo JText::_('ZO2_ADMIN_DISQUS_SHORTNAME_DESCRIPTION'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="control-label">
                                    <label class=""><?php echo JText::_('ZO2_ADMIN_FACEBOOK_LABEL'); ?></label>
                                </div>
                                <div class="controls">
                                    <input name="jform[params][zo2_facebook_label]" type="text" value="Facebook">
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="control-label">
                                    <label class=""><?php echo JText::_('ZO2_ADMIN_GOOGLE_LABEL'); ?></label>
                                </div>
                                <div class="controls">
                                    <input name="jform[params][zo2_gplus_label]" type="text" value="Google+">
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="control-label">
                                    <label class=""><?php echo JText::_('ZO2_ADMIN_DISQUS_LABEL'); ?></label>
                                </div>
                                <div class="controls">
                                    <input name="jform[params][zo2_disqus_label]" type="text" value="Disqus">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-advanced"><?php echo JText::_('ZO2_ADMIN_ADVANCED_OPTION'); ?></a>
                    </div>
                    <div id="advanced-advanced" class="accordion-body collapse">
                        <div class="accordion-inner">
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_GOOGLE_TRACKING_CODE_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_GOOGLE_TRACKING_CODE'); ?></label>
                                </div>
                                <div class="controls">
                                    <textarea  name="jform[params][zo2_ga_code]" id="zo2_ga_code"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_HIDE_COMPONENT_AREA_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_HIDE_COMPONENT_AREA'); ?></label>
                                </div>
                                <div class="controls">
                                    <fieldset class="radio btn-group">
                                        <input name="jform[params][zo2_component_area]" type="radio" value="0" checked="checked" >
                                        <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
                                        <input name="jform[params][zo2_component_area]" type="radio" value="1" >
                                        <label class="btn"><?php echo JText::_('ZO2_YES'); ?></label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_COMBINE_CSS_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_COMBINE_CSS'); ?></label>
                                </div>
                                <div class="controls">
                                    <fieldset class="radio btn-group">
                                        <input name="jform[params][zo2_combine_css]" type="radio" value="0" checked="checked" >
                                        <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
                                        <input  name="jform[params][zo2_combine_css]" type="radio" value="1" >
                                        <label class="btn"><?php echo JText::_('ZO2_YES'); ?></label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_COMBINE_JS_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_COMBINE_JS'); ?></label>
                                </div>
                                <div class="controls">
                                    <fieldset class="radio btn-group">
                                        <input name="jform[params][zo2_combine_js]" type="radio" value="0" checked="checked" >
                                        <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
                                        <input name="jform[params][zo2_combine_js]" type="radio" value="1" >
                                        <label class="btn"><?php echo JText::_('ZO2_YES'); ?></label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_LOAD_JQUERY_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_LOAD_JQUERY'); ?></label>
                                </div>
                                <div class="controls">
                                    <fieldset class="radio btn-group">
                                        <input name="jform[params][zo2_load_jquery]" type="radio" value="0" checked="checked" >
                                        <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
                                        <input name="jform[params][zo2_load_jquery]" type="radio" value="1" >
                                        <label class="btn"><?php echo JText::_('ZO2_YES'); ?></label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-label"></div>
                                <div class="controls">
                                    <button class="btn btn-danger btn-large" id="btnClearCache" style="width: 300px"><?php echo JText::_('ZO2_ADMIN_CLEAR_LAYOUT_CACHE'); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-dev"><?php echo JText::_('ZO2_ADMIN_DEVELOPMENT_OPTION'); ?></a>
                    </div>
                    <div id="advanced-dev" class="accordion-body collapse">
                        <div class="accordion-inner">
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_DEBUG_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_DEBUG'); ?></label>
                                </div>
                                <div class="controls">
                                    <fieldset class="radio btn-group">
                                        <input name="jform[params][zo2_debug_visibility]" type="radio" value="0" checked="checked" >
                                        <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
                                        <input name="jform[params][zo2_debug_visibility]" type="radio" value="1" >
                                        <label class="btn"><?php echo JText::_('ZO2_YES'); ?></label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_DISABLE_MOOTOOLS_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_DISABLE_MOOTOOLS'); ?></label>
                                </div>
                                <div class="controls">
                                    <fieldset class="radio btn-group">
                                        <input name="jform[params][zo2_disable_mootools]" type="radio" value="0" >
                                        <label class="btn first"><?php echo JText::_('ZO2_NO'); ?></label>
                                        <input name="jform[params][zo2_disable_mootools]" type="radio" value="1" checked="checked" >
                                        <label class="btn active btn-success"><?php echo JText::_('ZO2_YES'); ?></label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
