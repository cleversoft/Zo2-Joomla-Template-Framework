<!-- Advanced Tab Pane -->
<div class="tab-pane" id="zo2-advanced">
    <blockquote>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        <small>Someone famous <cite title="Source Title">Source Title</cite></small>
    </blockquote>
    <div class="profiles-pane">
        <h3 class="title-profile"><?php echo JText::_('ZO2_ADMIN_ADVANCED_OPTION'); ?></h3>
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
                                    <fieldset class="radio btn-group"><input type="radio" value="0" checked="checked" style="display: none;">
                                        <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
                                        <input type="radio" value="1" style="display: none;">
                                        <label class="btn"><?php echo JText::_('ZO2_YES'); ?></label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_GOOGLE_PROFILE_URL'); ?>"><?php echo JText::_('ZO2_ADMIN_GOOGLE_PROFILE_URL'); ?></label>
                                </div>
                                <div class="controls">
                                    <input type="text" value="">
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
                                        <input type="radio" value="1" style="display: none;">
                                        <label class="btn"><?php echo JText::_('ZO2_YES'); ?></label>
                                        <input type="radio" value="0" checked="checked" style="display: none;">
                                        <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_TABS_ORDER_TITLE '); ?>"><?php echo JText::_('ZO2_ADMIN_TABS_ORDER'); ?></label>
                                </div>
                                <div class="controls">
                                    <input type="text" value="facebook,gplus,disqus">
                                    <div style="margin: 5px 0;">
                                        <strong>Notes</strong>: Comma Separated List, First listed is the default, If left empty it will use default value below, only tabs listed will be shown. <br>
                                        <strong>Possible Values </strong>: gplus,facebook,disqus <br>
                                        <strong>Default Value </strong>: gplus,facebook <br>
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_DISQUS_SHORTNAME_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_DISQUS_SHORTNAME'); ?></label>
                                </div>
                                <div class="controls">
                                    <input type="text" value="zootemplates">
                                    <div style="margin: 5px 0;">
                                        <?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?><strong>Notes </strong>: Required if showing the Disqus Tab
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="control-label">
                                    <label class=""><?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?>Facebook Label</label>
                                </div>
                                <div class="controls">
                                    <input type="text" value="Facebook">
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="control-label">
                                    <label class=""><?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?>Google+ Label</label>
                                </div>
                                <div class="controls">
                                    <input type="text" value="Google+">
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="control-label">
                                    <label class=""><?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?>Disqus Label</label>
                                </div>
                                <div class="controls">
                                    <input type="text" value="Disqus">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-advanced"><?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?>Advanced Options</a>
                    </div>
                    <div id="advanced-advanced" class="accordion-body collapse">
                        <div class="accordion-inner">
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?>Tracking code<br />Include the tracking code"><?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?>Tracking code</label>
                                </div>
                                <div class="controls">
                                    <textarea></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?>Hide Component Area<br />Show component area from front page"><?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?>Hide Component Area</label>                </div>
                                <div class="controls">
                                    <fieldset class="radio btn-group"><input type="radio" value="0" checked="checked" style="display: none;">
                                        <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
                                        <input type="radio" value="1" style="display: none;">
                                        <label class="btn"><?php echo JText::_('ZO2_YES'); ?></label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?>Combine CSS<br />Combine CSS files into one file"><?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?>Combine CSS</label>
                                </div>
                                <div class="controls">
                                    <fieldset class="radio btn-group"><input type="radio" value="0" checked="checked" style="display: none;">
                                        <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
                                        <input type="radio" value="1" style="display: none;">
                                        <label class="btn"><?php echo JText::_('ZO2_YES'); ?></label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?>Combine JS<br />Combine JS files into one file"><?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?>Combine JS</label>
                                </div>
                                <div class="controls">
                                    <fieldset class="radio btn-group">
                                        <input type="radio" value="0" checked="checked" style="display: none;">
                                        <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
                                        <input type="radio" value="1" style="display: none;">
                                        <label class="btn"><?php echo JText::_('ZO2_YES'); ?></label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?>Load jQuery<br />Force load jQuery"><?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?>Load jQuery</label>
                                </div>
                                <div class="controls">
                                    <fieldset class="radio btn-group"><input type="radio" value="0" checked="checked" style="display: none;">
                                        <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
                                        <input type="radio" value="1" style="display: none;">
                                        <label class="btn"><?php echo JText::_('ZO2_YES'); ?></label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-label"></div>
                                <div class="controls">
                                    <button class="btn btn-danger btn-large" id="btnClearCache" style="width: 300px"><?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?>Clear layout cache</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-dev"><?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?>Developer Options</a>
                    </div>
                    <div id="advanced-dev" class="accordion-body collapse">
                        <div class="accordion-inner">
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?>Debug<br />Allow Developer to rebuild the cache. ONLY use this feature if you are developer"><?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?>Debug</label>
                                </div>
                                <div class="controls">
                                    <fieldset class="radio btn-group">
                                        <input type="radio" value="0" checked="checked" style="display: none;">
                                        <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
                                        <input type="radio" value="1" style="display: none;">
                                        <label class="btn"><?php echo JText::_('ZO2_YES'); ?></label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?>Disable mootools<br />Disable mootools to avoid script conflict"><?php echo JText::_('ZO2_ADMIN_GOOGLE'); ?>Disable mootools</label>
                                </div>
                                <div class="controls">
                                    <fieldset class="radio btn-group">
                                        <input type="radio" value="0" style="display: none;">
                                        <label class="btn first"><?php echo JText::_('ZO2_NO'); ?></label>
                                        <input type="radio" value="1" checked="checked" style="display: none;">
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
