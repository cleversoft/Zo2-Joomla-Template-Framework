<!-- Tab Panel General -->
<div class="tab-pane fade in" id="general">
    <ul class="nav nav-pills">
        <li class="active"><a href="#general-basic">Basic</a></li>
        <li><a href="#">Advanced</a></li>
        <li><a href="#">Font</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="general-basic">
            <div class="row-fluid">
                <div class="span12">
                    <!-- Enable Style Switcher -->
                    <div class="control-group">
                        <div class="control-label">
                            <label>Enable Style Switcher</label>
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

                    <!-- Enable RTL -->
                    <div class="control-group">
                        <div class="control-label">
                            <label>Enable RTL</label>
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

                    <!-- Responsive Layout -->
                    <div class="control-group">
                        <div class="control-label">
                            <label class="hasTooltip" title="" data-original-title="Responsive Layout<br />Enable or disable responsive layout">Responsive Layout</label>
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

                    <!-- Enable Sticky Menu -->
                    <div class="control-group">
                        <div class="control-label">
                            <label class="">Enable Sticky Menu</label>
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
                    <!-- Show "Go to top" -->
                    <div class="control-group">
                        <div class="control-label">
                            <label class="">Show "Go to top"</label>
                        </div>
                        <div class="controls">
                            <fieldset class="radio btn-group"><input type="radio" value="0" style="display: none;">
                                <label class="btn first">No</label><input type="radio" value="1" checked="checked" style="display: none;">
                                <label class="btn active btn-success">Yes</label>
                            </fieldset>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <!-- Site Name -->
                    <div class="control-group">
                        <div class="control-label">
                            <label>Site name</label>
                        </div>
                        <div class="controls"><input type="text" value="Zo2 Hallo" class="input-text-option"></div>
                    </div>

                    <!-- Site Slogan -->
                    <div class="control-group">
                        <div class="control-label">
                            <label>Site slogan</label>
                        </div>
                        <div class="controls"><input type="text" value="" class="input-text-option"></div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label class="hasTooltip" title="" data-original-title="Show footer logo<br />Show Zo2 Framework footer logo">Show footer logo</label>
                        </div>
                        <div class="controls">
                            <fieldset class="radio btn-group"><input type="radio" value="0" style="display: none;">
                                <label class="btn first">No</label>
                                <input type="radio" value="1" checked="checked" style="display: none;">
                                <label class="btn active btn-success">Yes</label>
                            </fieldset>
                        </div>
                    </div>

                    <!-- Copyright -->
                    <div class="control-group">
                        <div class="control-label">
                            <label class="">Copyright</label>
                        </div>
                        <div class="controls">
                            <textarea>Copyright © 2008 - 2014 &lt;a href="http://www.zootemplate.com/" title="joomla templates"&gt;Joomla Templates&lt;/a&gt; by ZooTemplate.Com. All rights reserved.</textarea>
                        </div>
                    </div>
                </div>

                <div class="span6">
                    <!-- Favicon -->
                    <div class="control-group">
                        <div class="control-label">
                            <label class="">Favicon</label>
                        </div>
                        <div class="controls">
                            <div class="input-prepend input-append">
                                <div class="media-preview add-on"><span class="hasTipPreview" title=""><i class="icon-eye-open"></i></span></div>
                                <input type="text" value="templates/zo2_hallo/assets/zo2/images/favicon.ico" readonly="readonly" class="input-small">
                                <a class="modal btn" title="Select" href="#" rel="">Select</a>
                                <a class="btn hasTooltip" title="" href="#" data-original-title="Clear"><i class="icon-remove"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Header logo -->
                    <div class="control-group">
                        <div class="control-label">
                            <label class="">Header logo</label>
                        </div>
                        <div class="controls">
                            <div class="field-logo-container">
                                <input class="logoInput" type="hidden" value="">
                                <div class="radio btn-group logo-type-switcher">
                                    <button class="btn logo-type-none active btn-success">None</button>
                                    <button class="btn logo-type-image ">Image</button>
                                    <button class="btn logo-type-text ">Text</button>
                                </div>
                                <div class="logo-image ">
                                    <input type="hidden" class="basePath" value="/hallo142">
                                    <input type="hidden" class="logo-path" value="">
                                    <div class="btn-group">
                                        <span class="logo-preview">
                                        </span>
                                        <a href="" class="btn btn-primary btn-select-logo modal" rel="">Select</a>
                                        <a href="#" class="btn btn-danger btn-remove-preview"><i class="icon-remove"></i></a>
                                    </div>
                                    <label>Width</label> <input type="text" class="logo-width input-mini" value="">
                                    <label>Height</label> <input type="text" class="logo-height input-mini" value="">
                                </div>
                                <div class="logo-text ">
                                    <label>Text</label> <input type="text" class="logo-text-input" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Header Retina logo -->
                    <div class="control-group">
                        <div class="control-label">
                            <label class="">Header Retina logo</label>
                        </div>
                        <div class="controls">
                            <div class="field-logo-container">
                                <input class="logoInput" type="hidden" value="">
                                <div class="radio btn-group logo-type-switcher">
                                    <button class="btn logo-type-none ">None</button>
                                    <button class="btn logo-type-image active btn-success">Image</button>
                                    <button class="btn logo-type-text ">Text</button>
                                </div>
                                <div class="logo-image show">
                                    <input type="hidden" class="basePath" value="/hallo142">
                                    <input type="hidden" class="logo-path" value="images/logo-retina.png">
                                    <div class="btn-group">
                                        <span class="logo-preview">
                                            <img src="/hallo142/images/logo-retina.png">
                                        </span>
                                        <a href="" class="btn btn-primary btn-select-logo modal" rel="">Select</a>
                                        <a href="#" class="btn btn-danger btn-remove-preview"><i class="icon-remove"></i></a>
                                    </div>
                                    <label>Width</label> <input type="text" class="logo-width input-mini" value="424">
                                    <label>Height</label> <input type="text" class="logo-height input-mini" value="40">
                                </div>
                                <div class="logo-text ">
                                    <label>Text</label> <input type="text" class="logo-text-input" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



        </div>
        <div class="tab-pane" id="profile">...</div>
        <div class="tab-pane" id="messages">...</div>
        <div class="tab-pane" id="settings">...</div>
    </div>

</div>