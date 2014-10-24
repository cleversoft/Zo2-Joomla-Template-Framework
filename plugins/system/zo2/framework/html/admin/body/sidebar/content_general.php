<!-- Tab Panel General -->
<div class="tab-pane" id="zo2-general">    
    <div class="tab-content">
        <!-- Sub navbar -->
        <ul id="myTabGeneral" class="nav nav-pills">
            <li class=""><a href="#general-global" data-toggle="tab"><?php echo JText::_('ZO2_ADMIN_GENERAL_GLOBAL'); ?></a></li>
            <li class=""><a href="#general-features" data-toggle="tab"><?php echo JText::_('ZO2_ADMIN_GENERAL_FEATURES'); ?></a></li>
        </ul>
        <!-- Sub navbar content -->
        <div id="myTabGeneralContent" class="tab-content">
            <!-- Global -->
            <div class="tab-pane fade" id="general-global">
                <!-- Description -->
                <div class="well well-small">
                    <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <small></small>
                    </blockquote>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <!-- Site Name -->
                        <div class="control-group">
                            <label class="control-label"><?php echo JText::_('ZO2_ADMIN_SITENAME'); ?></label>
                            <div class="controls">
                                <input type="text" name="jform[params][site_name]" value="<?php echo $this->params->get('site_name', JFactory::getConfig()->get('sitename')); ?>">
                            </div>
                        </div>
                        <!-- Site Slogan -->
                        <div class="control-group">                            
                            <label class="control-label"><?php echo JText::_('ZO2_ADMIN_SLOGAN'); ?></label>
                            <div class="controls">
                                <input type="text" name="jform[params][site_slogan]" value="<?php echo $this->params->get('site_slogan'); ?>">
                            </div>
                        </div>
                        <!-- Copyright -->
                        <div class="control-group">
                            <label class="control-label"><?php echo JText::_('ZO2_ADMIN_COPYRIGHT'); ?></label>
                            <div class="controls">
                                <textarea class="mce_editable" rows="10" cols="20" name="jform[params][footer_copyright]"><?php echo $this->params->get('footer_copyright'); ?></textarea>
                            </div>
                        </div>
                        <!-- Favicon -->
                        <div class="control-group">
                            <label class="control-label"><?php echo JText::_('ZO2_ADMIN_FAVICON'); ?></label>
                            <div class="controls">
                                <div class="input-prepend input-append">
                                    <div class="media-preview add-on">
                                        <span class="hasTipPreview"><i class="icon-eye-open"></i></span>
                                    </div>
                                    <input type="text" name="jform[params][favicon]" id="favicon" value="<?php echo $this->params->get('favicon'); ?>" readonly="readonly" class="input-small">
                                    <a class="modal btn" title="<?php echo JText::_('ZO2_ADMIN_SELECT'); ?>" href="#" rel=""><?php echo JText::_('ZO2_ADMIN_SELECT'); ?></a>
                                    <a class="btn hasTooltip" href="#" data-original-title="Clear"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Header logo -->
                        <div class="control-group">
                            <label class="control-label"><?php echo JText::_('ZO2_ADMIN_HEADER_LOGO'); ?></label>                            
                            <div class="controls">
                                <div class="field-logo-container">
                                    <input class="logoInput" type="hidden" value="<?php echo $this->params->get('header_logo'); ?>" name="jform[params][header_logo]" id="header_logo" />
                                    <div class="radio btn-group logo-type-switcher">
                                        <button class="btn logo-type-none active btn-success"><?php echo JText::_('ZO2_ADMIN_NONE'); ?></button>
                                        <button class="btn logo-type-image "><?php echo JText::_('ZO2_ADMIN_IMAGE'); ?></button>
                                        <button class="btn logo-type-text "><?php echo JText::_('ZO2_ADMIN_TEXT'); ?></button>
                                    </div>
                                    <div class="logo-image ">
                                        <input type="hidden" class="basePath" value="/hallo142">
                                        <input type="hidden" class="logo-path" value="">
                                        <div class="btn-group">
                                            <span class="logo-preview"></span>
                                            <a href="#" class="btn btn-primary btn-select-logo modal" rel=""><?php echo JText::_('ZO2_ADMIN_SELECT'); ?></a>
                                            <a href="#" class="btn btn-danger btn-remove-preview"><i class="icon-remove"></i></a>
                                        </div>
                                        <label>Width</label>
                                        <input type="text" class="logo-width input-mini" value="">
                                        <label>Height</label>
                                        <input type="text" class="logo-height input-mini" value="">
                                    </div>
                                    <div class="logo-text ">
                                        <label>Text</label>
                                        <input type="text" class="logo-text-input" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Header Retina logo -->
                        <div class="control-group">
                            <label class="control-label"><?php echo JText::_('ZO2_ADMIN_HEADER__RETINA_LOGO'); ?></label>                            
                            <div class="controls">
                                <div class="field-logo-container">
                                    <input class="logoInput" type="hidden" value="<?php echo $this->params->get('header_retina_logo'); ?>" name="jform[params][header_retina_logo]" id="header_retina_logo">
                                    <div class="radio btn-group logo-type-switcher">
                                        <button class="btn logo-type-none "><?php echo JText::_('ZO2_ADMIN_NONE'); ?></button>
                                        <button class="btn logo-type-image active btn-success"><?php echo JText::_('ZO2_ADMIN_NONE_IMAGE'); ?></button>
                                        <button class="btn logo-type-text "><?php echo JText::_('ZO2_ADMIN_TEXT'); ?></button>
                                    </div>
                                    <div class="logo-image show">
                                        <input type="hidden" class="basePath" value="/hallo142">
                                        <input type="hidden" class="logo-path" value="images/logo-retina.png">
                                        <div class="btn-group">
                                            <span class="logo-preview">
                                                <img src="/hallo142/images/logo-retina.png">
                                            </span>
                                            <a href="#" class="btn btn-primary btn-select-logo modal" rel=""><?php echo JText::_('ZO2_ADMIN_SELECT'); ?></a>
                                            <a href="#" class="btn btn-danger btn-remove-preview"><i class="icon-remove"></i></a>
                                        </div>
                                        <label>Width</label> <input type="text" class="logo-width input-mini" value="424">
                                        <label>Height</label> <input type="text" class="logo-height input-mini" value="40">
                                    </div>
                                    <div class="logo-text">
                                        <label>Text</label>
                                        <input type="text" class="logo-text-input" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Features -->
            <div class="tab-pane fade" id="general-features">
                <!-- Common options -->
                <div class="row-fluid">
                    <div class="span12">
                        <!-- Enable RTL -->
                        <div class="control-group">                           
                            <label class="control-label"><?php echo JText::_('ZO2_ADMIN_ENABLE_RTL'); ?></label>                            
                            <div class="controls">
                                <fieldset class="radio btn-group">
                                    <input name="jform[params][enable_rtl]" id="jform_params_enable_rtl0" type="radio" value="0" >
                                    <label class="btn first"><?php echo JText::_('ZO2_NO'); ?></label>
                                    <input name="jform[params][enable_rtl]" id="jform_params_enable_rtl1" type="radio" value="1" checked="checked" >
                                    <label class="btn active btn-success"><?php echo JText::_('ZO2_YES'); ?></label>
                                </fieldset>
                            </div>
                        </div>
                        <!-- Responsive Layout -->
                        <div class="control-group">
                            <label class="control-label hasTooltip" data-original-title="<?php echo JText::_('ZO2_ADMIN_RESPONSIVE_LAYOUT_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_RESPONSIVE_LAYOUT'); ?></label>
                            <div class="controls">
                                <fieldset class="radio btn-group">
                                    <input name="jform[params][responsive_layout]" id="jform_params_responsive_layout0" type="radio" value="0" >
                                    <label class="btn first"><?php echo JText::_('ZO2_NO'); ?></label>
                                    <input name="jform[params][responsive_layout]" id="jform_params_responsive_layout1" type="radio" value="1" checked="checked" >
                                    <label class="btn active btn-success"><?php echo JText::_('ZO2_YES'); ?></label>
                                </fieldset>
                            </div>
                        </div>
                        <!-- Enable Style Switcher -->
                        <div class="control-group">
                            <label class="control-label"><?php echo JText::_('ZO2_ADMIN_ENABLE_STYLE_SWITCHER'); ?></label>
                            <div class="controls">
                                <fieldset class="radio btn-group">
                                    <input name="jform[params][enable_style_switcher]" id="jform_params_enable_style_switcher0" type="radio" value="0" >
                                    <label class="btn first"><?php echo JText::_('ZO2_NO'); ?></label>
                                    <input name="jform[params][enable_style_switcher]" id="jform_params_enable_style_switcher1" type="radio" value="1" checked="checked" >
                                    <label class="btn active btn-success"><?php echo JText::_('ZO2_YES'); ?></label>
                                </fieldset>
                            </div>
                        </div>
                        <!-- Enable Sticky Menu -->
                        <div class="control-group">
                            <label class="control-label"><?php echo JText::_('ZO2_ADMIN_ENABLE_STICKY_MENU'); ?></label>                            
                            <div class="controls">
                                <fieldset class="radio btn-group">
                                    <input name="jform[params][enable_sticky_menu]" id="jform_params_enable_sticky_menu0" type="radio" value="0" >
                                    <label class="btn first"><?php echo JText::_('ZO2_NO'); ?></label>
                                    <input name="jform[params][enable_sticky_menu]" id="jform_params_enable_sticky_menu1" type="radio" value="1" checked="checked" >
                                    <label class="btn active btn-success"><?php echo JText::_('ZO2_YES'); ?></label>
                                </fieldset>
                            </div>
                        </div>
                        <!-- Show "Go to top" -->
                        <div class="control-group">
                            <label class="control-label"><?php echo JText::_('ZO2_ADMIN_SHOW_GO_TO_TOP'); ?></label>                            
                            <div class="controls">
                                <fieldset class="radio btn-group">
                                    <input name="jform[params][footer_gototop]" id="jform_params_footer_gototop0" type="radio" value="0" >
                                    <label class="btn first"><?php echo JText::_('ZO2_NO'); ?></label>
                                    <input name="jform[params][footer_gototop]" id="jform_params_footer_gototop1" type="radio" value="1" checked="checked" >
                                    <label class="btn active btn-success"><?php echo JText::_('ZO2_YES'); ?></label>
                                </fieldset>
                            </div>
                        </div>
                        <!-- Show footer logo -->
                        <div class="control-group">                           
                            <label class="control-label hasTooltip" data-original-title="<?php echo JText::_('ZO2_ADMIN_SHOW_FOOTER_LOGO_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_SHOW_FOOTER_LOGO'); ?></label>                            
                            <div class="controls">
                                <fieldset class="radio btn-group">
                                    <input name="jform[params][footer_logo]" id="jform_params_footer_logo0" type="radio" value="0" >
                                    <label class="btn first"><?php echo JText::_('ZO2_NO'); ?></label>
                                    <input name="jform[params][footer_logo]" id="jform_params_footer_logo1" type="radio" value="1" checked="checked" >
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