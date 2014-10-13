<!-- Advanced Tab Pane -->
<div class="tab-pane" id="zo2-advanced">
    <blockquote>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        <small>Someone famous <cite title="Source Title">Source Title</cite></small>
    </blockquote>
    <div class="profiles-pane">        
        <div class="profiles-pane-inner">
            <div class="accordion" id="advanced-accordion">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-google">Google</a>
                    </div>
                    <div id="advanced-google" class="accordion-body collapse in">
                        <div class="accordion-inner">
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="Google Authorship">Google Authorship</label>
                                </div>
                                <div class="controls">
                                    <fieldset class="radio btn-group"><input type="radio" value="0" checked="checked" style="display: none;">
                                        <label class="btn active btn-danger first">No</label>
                                        <input type="radio" value="1" style="display: none;">
                                        <label class="btn">Yes</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="Google Profile URL">Google Profile URL</label>
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
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-comments">Comments</a>
                    </div>
                    <div id="advanced-comments" class="accordion-body collapse">
                        <div class="accordion-inner">
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="Enable Comments">Enable Comments</label>
                                </div>
                                <div class="controls">
                                    <fieldset class="radio btn-group">
                                        <input type="radio" value="1" style="display: none;">
                                        <label class="btn">Yes</label>
                                        <input type="radio" value="0" checked="checked" style="display: none;">
                                        <label class="btn active btn-danger first">No</label>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="Tabs Order<br />Only tabs listed will be showed">Tabs Order</label>
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
                                    <label class="hasTooltip" title="" data-original-title="Disqus Shortname<br />Required if showing the disqus tab">Disqus Shortname</label>
                                </div>
                                <div class="controls">
                                    <input type="text" value="zootemplates">
                                    <div style="margin: 5px 0;">
                                        <strong>Notes </strong>: Required if showing the Disqus Tab
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="control-label">
                                    <label class="">Facebook Label</label>
                                </div>
                                <div class="controls">
                                    <input type="text" value="Facebook">
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="control-label">
                                    <label class="">Google+ Label</label>
                                </div>
                                <div class="controls">
                                    <input type="text" value="Google+">
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="control-label">
                                    <label class="">Disqus Label</label>
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
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-advanced">Advanced Options</a>
                    </div>
                    <div id="advanced-advanced" class="accordion-body collapse">
                        <div class="accordion-inner">
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="Tracking code<br />Include the tracking code">Tracking code</label>
                                </div>
                                <div class="controls">
                                    <textarea></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="Hide Component Area<br />Show component area from front page">Hide Component Area</label>                </div>
                                <div class="controls">
                                    <fieldset class="radio btn-group"><input type="radio" value="0" checked="checked" style="display: none;">
                                        <label class="btn active btn-danger first">No</label>
                                        <input type="radio" value="1" style="display: none;">
                                        <label class="btn">Yes</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="Combine CSS<br />Combine CSS files into one file">Combine CSS</label>
                                </div>
                                <div class="controls">
                                    <fieldset class="radio btn-group"><input type="radio" value="0" checked="checked" style="display: none;">
                                        <label class="btn active btn-danger first">No</label>
                                        <input type="radio" value="1" style="display: none;">
                                        <label class="btn">Yes</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="Combine JS<br />Combine JS files into one file">Combine JS</label>
                                </div>
                                <div class="controls">
                                    <fieldset class="radio btn-group">
                                        <input type="radio" value="0" checked="checked" style="display: none;">
                                        <label class="btn active btn-danger first">No</label>
                                        <input type="radio" value="1" style="display: none;">
                                        <label class="btn">Yes</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="Load jQuery<br />Force load jQuery">Load jQuery</label>
                                </div>
                                <div class="controls">
                                    <fieldset class="radio btn-group"><input type="radio" value="0" checked="checked" style="display: none;">
                                        <label class="btn active btn-danger first">No</label>
                                        <input type="radio" value="1" style="display: none;">
                                        <label class="btn">Yes</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-label"></div>
                                <div class="controls">
                                    <button class="btn btn-danger btn-large" id="btnClearCache" style="width: 300px">Clear layout cache</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-dev">Developer Options</a>
                    </div>
                    <div id="advanced-dev" class="accordion-body collapse">
                        <div class="accordion-inner">
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="Debug<br />Allow Developer to rebuild the cache. ONLY use this feature if you are developer">Debug</label>
                                </div>
                                <div class="controls">
                                    <fieldset class="radio btn-group">
                                        <input type="radio" value="0" checked="checked" style="display: none;">
                                        <label class="btn active btn-danger first">No</label>
                                        <input type="radio" value="1" style="display: none;">
                                        <label class="btn">Yes</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-label">
                                    <label class="hasTooltip" title="" data-original-title="Disable mootools<br />Disable mootools to avoid script conflict">Disable mootools</label>
                                </div>
                                <div class="controls">
                                    <fieldset class="radio btn-group">
                                        <input type="radio" value="0" style="display: none;">
                                        <label class="btn first">No</label>
                                        <input type="radio" value="1" checked="checked" style="display: none;">
                                        <label class="btn active btn-success">Yes</label>
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
