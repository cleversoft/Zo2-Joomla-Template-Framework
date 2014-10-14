<!-- Tab Panel General -->
<div class="tab-pane" id="zo2-general">    
    <div class="tab-content">
        <!-- Sub navbar -->
        <ul id="myTabGeneral" class="nav nav-pills">
            <li class=""><a href="#general-global" data-toggle="tab"><?php echo JText::_('ZO2_ADMIN_GENERAL_GLOBAL'); ?></a></li>
            <li class=""><a href="#general-features" data-toggle="tab"><?php echo JText::_('ZO2_ADMIN_GENERAL_FEATURES'); ?></a></li>
        </ul>
        <div id="myTabGeneralContent" class="tab-content">
            <div class="tab-pane fade" id="general-global">
                <!-- Description -->
                <div class="well well-small">
                    <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <small>Someone famous <cite title="Source Title">Source Title</cite></small>
                    </blockquote>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <!-- Site Name -->
                        <div class="control-group">
                            <label class="control-label" for="jform_params_site_name"><?php echo JText::_('ZO2_ADMIN_SITENAME'); ?></label>
                            <div class="controls">
                                <input type="text" name="jform[params][site_name]" id="jform_params_site_name" value="<?php echo $this->params->get('site_name', JFactory::getConfig()->get('sitename')); ?>">
                            </div>
                        </div>
                        <!-- Site Slogan -->
                        <div class="control-group">                            
                            <label class="control-label" for="jform_params_site_slogan"><?php echo JText::_('ZO2_ADMIN_SLOGAN'); ?></label>                            
                            <div class="controls">
                                <input type="text" name="jform[params][site_slogan]" id="jform_params_site_slogan" value="<?php echo $this->params->get('site_slogan'); ?>">
                            </div>
                        </div>
                        <!-- Copyright -->
                        <div class="control-group">
                            <label class="control-label"><?php echo JText::_('ZO2_ADMIN_COPYRIGHT'); ?></label>
                            <div class="controls">
<!--                                --><?php
//                                $editor = JFactory::getEditor();
//                                $params = array('smilies' => '0',
//                                    'style' => '1',
//                                    'layer' => '0',
//                                    'table' => '0',
//                                    'clear_entities' => '0'
//                                );
//                                echo $editor->display('desc', $this->params->get('copyright'), '400', '200', '20', '10', false, null, null, null, $params);
//                                ?><!--                                -->
                                <textarea class="mce_editable" rows="10" cols="20" id="desc" name="desc"></textarea>
                            </div>
                        </div>
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
            <div class="tab-pane fade" id="general-features">
                <!-- Common options -->
                <div class="row-fluid">
                    <div class="span4">
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
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane active" id="general-basic">


        </div>
        <div class="tab-pane" id="profile">...</div>
        <div class="tab-pane" id="messages">...</div>
        <div class="tab-pane" id="settings">...</div>
    </div>

</div>