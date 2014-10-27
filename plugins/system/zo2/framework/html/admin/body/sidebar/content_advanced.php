<!-- Advanced Tab Pane -->
<div class="tab-pane" id="zo2-advanced">
    <blockquote>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        <small>Someone famous <cite title="Source Title">Source Title</cite></small>
    </blockquote>
    <div class="profiles-pane">
        <h3 class="title-profile"><?php echo JText::_('ZO2_ADMIN_ADVANCED_OPTION'); ?></h3>

        <div class="profiles-pane-inner">

            <button class="btn btn-danger" id="btnClearCache" onClick="zo2.admin.ajax.clearCache();
                    return false;" data-toggle="button" data-loading-text="Processing..." >Clear cache</button>
            <button class="btn btn-primary" id="btnBuildAssets" onClick="zo2.admin.ajax.buildAssets();
                    return false;" data-toggle="button" data-loading-text="Processing...">Compile</button>

            <!-- Tab Panel Advance -->
            <ul class="nav nav-pills" id="myTabAdvance">
                <li class=""><a data-toggle="tab" href="#advance-google"><?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?></a></li>
                <li class=""><a data-toggle="tab" href="#advance-comments"><?php echo JText::_('ZO2_ADMIN_COMMENTS'); ?></a></li>
                <li class=""><a data-toggle="tab" href="#advance-option"><?php echo JText::_('ZO2_ADMIN_ADVANCED_OPTION'); ?></a></li>
                <li class=""><a data-toggle="tab" href="#advance-developer"><?php echo JText::_('ZO2_ADMIN_DEVELOPMENT_OPTION'); ?></a></li>
            </ul>
            <div id="myTabAdvanceContent" class="tab-content">
                <div id="advance-google" class="tab-pane">
                    <div class="control-group">
                        <div class="control-label">
                            <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_GOOGLE_AUTHORSHIP'); ?>"><?php echo JText::_('ZO2_ADMIN_GOOGLE_AUTHORSHIP'); ?></label>
                        </div>
                        <div class="controls">
                            <fieldset class="radio btn-group">
                                <input name="jform[params][enable_googleauthorship]" type="radio" value="0" checked="checked" >
                                <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
                                <input name="jform[params][enable_googleauthorship]"  type="radio" value="1" >
                                <label class="btn"><?php echo JText::_('ZO2_YES'); ?></label>
                            </fieldset>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_GOOGLE_PROFILE_URL'); ?>"><?php echo JText::_('ZO2_ADMIN_GOOGLE_PROFILE_URL'); ?></label>
                        </div>
                        <div class="controls">
                            <input name="jform[params][google_profile_url]" type="text" value="<?php echo $this->params->get('google_profile_url'); ?>">
                        </div>
                    </div>
                </div>
                <div id="advance-comments" class="tab-pane">
                    <div class="control-group">
                        <div class="control-label">
                            <label class="hasTooltip" title="" data-original-title="Enable Comments"><?php echo JText::_('ZO2_ADMIN_ENABLE_COMMENTS'); ?></label>
                        </div>
                        <div class="controls">
                            <fieldset class="radio btn-group">
                                <input name="jform[params][enable_comments]" type="radio" value="1" >
                                <label class="btn"><?php echo JText::_('ZO2_YES'); ?></label>
                                <input name="jform[params][enable_comments]" type="radio" value="0" checked="checked" >
                                <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
                            </fieldset>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="control-label">
                            <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_TABS_ORDER_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_TABS_ORDER'); ?></label>
                        </div>
                        <div class="controls">
                            <input name="jform[params][tab_order]" type="text" value="<?php echo $this->params->get('tab_order'); ?>">
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
                            <input name="jform[params][disqus_shortname]" type="text" value="<?php echo $this->params->get('disqus_shortname'); ?>">
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
                            <input name="jform[params][facebook_label]" type="text" value="<?php echo $this->params->get('facebook_label'); ?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="control-label">
                            <label class=""><?php echo JText::_('ZO2_ADMIN_GOOGLE_LABEL'); ?></label>
                        </div>
                        <div class="controls">
                            <input name="jform[params][gplus_label]" type="text" value="<?php echo $this->params->get('gplus_label'); ?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="control-label">
                            <label class=""><?php echo JText::_('ZO2_ADMIN_DISQUS_LABEL'); ?></label>
                        </div>
                        <div class="controls">
                            <input name="jform[params][disqus_label]" type="text" value="<?php echo $this->params->get('disqus_label'); ?>">
                        </div>
                    </div>
                </div>
                <div id="advance-option" class="tab-pane">
                    <div class="control-group">
                        <div class="control-label">
                            <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_GOOGLE_TRACKING_CODE_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_GOOGLE_TRACKING_CODE'); ?></label>
                        </div>
                        <div class="controls">
                            <textarea  name="jform[params][ga_code]" id="zo2_ga_code"><?php echo $this->params->get('ga_code'); ?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_HIDE_COMPONENT_AREA_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_HIDE_COMPONENT_AREA'); ?></label>
                        </div>
                        <div class="controls">
                            <fieldset class="radio btn-group">
                                <input name="jform[params][component_area]" type="radio" value="0" checked="checked" >
                                <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
                                <input name="jform[params][component_area]" type="radio" value="1" >
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
                                <input name="jform[params][combine_css]" type="radio" value="0" checked="checked" >
                                <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
                                <input  name="jform[params][combine_css]" type="radio" value="1" >
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
                                <input name="jform[params][combine_js]" type="radio" value="0" checked="checked" >
                                <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
                                <input name="jform[params][combine_js]" type="radio" value="1" >
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
                                <input name="jform[params][load_jquery]" type="radio" value="0" checked="checked" >
                                <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
                                <input name="jform[params][load_jquery]" type="radio" value="1" >
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
                <div id="advance-developer" class="tab-pane">
                    <div class="control-group">
                        <div class="control-label">
                            <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_DEBUG_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_DEBUG'); ?></label>
                        </div>
                        <div class="controls">
                            <fieldset class="radio btn-group">
                                <input name="jform[params][debug_visibility]" type="radio" value="0" checked="checked" >
                                <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
                                <input name="jform[params][debug_visibility]" type="radio" value="1" >
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
                                <input name="jform[params][disable_mootools]" type="radio" value="0" >
                                <label class="btn first"><?php echo JText::_('ZO2_NO'); ?></label>
                                <input name="jform[params][disable_mootools]" type="radio" value="1" checked="checked" >
                                <label class="btn active btn-success"><?php echo JText::_('ZO2_YES'); ?></label>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
