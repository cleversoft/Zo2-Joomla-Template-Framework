<!-- Advanced Tab Pane -->
<div class="tab-pane" id="zo2-advanced">
    <h2><?php echo JText::_('ZO2_ADMIN_SIDEBAR_HEADER_ADVANCED'); ?></h2>
    <div class="zo2-divider"></div>

    <!-- Enable RTL -->
    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_HIDE_COMPONENT_AREA_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_HIDE_COMPONENT_AREA'); ?></label>
        </div>
        <div class="controls">
            <fieldset class="radio btn-group">
                <input name="jform[params][component_area]" type="radio" value="1" >
                <label class="btn"><?php echo JText::_('ZO2_YES'); ?></label>
                <input name="jform[params][component_area]" type="radio" value="0" checked="checked" >
                <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
            </fieldset>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label"><?php echo JText::_('ZO2_ADMIN_ENABLE_RTL'); ?></label>
        <div class="controls">
            <fieldset class="radio btn-group">
                <input name="jform[params][enable_rtl]" id="jform_params_enable_rtl1" type="radio" value="1" checked="checked" >
                <label class="btn active btn-success"><?php echo JText::_('ZO2_YES'); ?></label>
                <input name="jform[params][enable_rtl]" id="jform_params_enable_rtl0" type="radio" value="0" >
                <label class="btn first"><?php echo JText::_('ZO2_NO'); ?></label>
            </fieldset>
        </div>
    </div>
    <!-- Responsive Layout -->
    <div class="control-group">
        <label class="control-label hasTooltip" data-original-title="<?php echo JText::_('ZO2_ADMIN_RESPONSIVE_LAYOUT_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_RESPONSIVE_LAYOUT'); ?></label>
        <div class="controls">
            <fieldset class="radio btn-group">
                <input name="jform[params][responsive_layout]" id="jform_params_responsive_layout1" type="radio" value="1" checked="checked" >
                <label class="btn active btn-success"><?php echo JText::_('ZO2_YES'); ?></label>
                <input name="jform[params][responsive_layout]" id="jform_params_responsive_layout0" type="radio" value="0" >
                <label class="btn first"><?php echo JText::_('ZO2_NO'); ?></label>
            </fieldset>
        </div>
    </div>
    <!-- Enable Style Switcher -->
    <div class="control-group">
        <label class="control-label"><?php echo JText::_('ZO2_ADMIN_ENABLE_STYLE_SWITCHER'); ?></label>
        <div class="controls">
            <fieldset class="radio btn-group">
                <input name="jform[params][enable_style_switcher]" id="jform_params_enable_style_switcher1" type="radio" value="1" checked="checked" >
                <label class="btn active btn-success"><?php echo JText::_('ZO2_YES'); ?></label>
                <input name="jform[params][enable_style_switcher]" id="jform_params_enable_style_switcher0" type="radio" value="0" >
                <label class="btn first"><?php echo JText::_('ZO2_NO'); ?></label>
            </fieldset>
        </div>
    </div>
    <!-- Enable Sticky Menu -->
    <div class="control-group">
        <label class="control-label"><?php echo JText::_('ZO2_ADMIN_ENABLE_STICKY_MENU'); ?></label>
        <div class="controls">
            <fieldset class="radio btn-group">
                <input name="jform[params][enable_sticky_menu]" id="jform_params_enable_sticky_menu1" type="radio" value="1" checked="checked" >
                <label class="btn active btn-success"><?php echo JText::_('ZO2_YES'); ?></label>
                <input name="jform[params][enable_sticky_menu]" id="jform_params_enable_sticky_menu0" type="radio" value="0" >
                <label class="btn first"><?php echo JText::_('ZO2_NO'); ?></label>
            </fieldset>
        </div>
    </div>

    <!-- Tracking Cocde -->
    <div class="zo2-divider"></div>
    <h2><?php echo JText::_('ZO2_ADMIN_GOOGLE_TRACKING_CODE'); ?></h2>
    <div class="zo2-divider"></div>
    <div class="control-group no-margin no-label">
        <?php
        echo Zo2Html::field(
                'textarea', array(
            'label' => '',
                ), array(
            'name' => 'jform[params][footer_copyright]',
            'rows' => 10,
            'cols' => 20,
            'value' => Zo2Factory::get('ga_code')
        ));
        ?>
        <span>Paste your Google Analytics (or other) tracking code here.<br /> This will be added before the closing body tag in the template. <br/> This should be something like<br /> &#60;script&#62;<br />....<br />&#60;/script&#62;</span>
    </div>

    <!-- Advanced Option -->
    <div class="zo2-divider"></div>
    <h2><?php echo JText::_('ZO2_ADMIN_ADVANCED_OPTION'); ?></h2>
    <div class="zo2-divider"></div>

    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_COMBINE_CSS_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_COMBINE_CSS'); ?></label>
        </div>
        <div class="controls">
            <fieldset class="radio btn-group">
                <input  name="jform[params][combine_css]" type="radio" value="1" >
                <label class="btn"><?php echo JText::_('ZO2_YES'); ?></label>
                <input name="jform[params][combine_css]" type="radio" value="0" checked="checked" >
                <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
            </fieldset>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_COMBINE_JS_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_COMBINE_JS'); ?></label>
        </div>
        <div class="controls">
            <fieldset class="radio btn-group">
                <input name="jform[params][combine_js]" type="radio" value="1" >
                <label class="btn"><?php echo JText::_('ZO2_YES'); ?></label>
                <input name="jform[params][combine_js]" type="radio" value="0" checked="checked" >
                <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
            </fieldset>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_LOAD_JQUERY_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_LOAD_JQUERY'); ?></label>
        </div>
        <div class="controls">
            <fieldset class="radio btn-group">
                <input name="jform[params][load_jquery]" type="radio" value="1" >
                <label class="btn"><?php echo JText::_('ZO2_YES'); ?></label>
                <input name="jform[params][load_jquery]" type="radio" value="0" checked="checked" >
                <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
            </fieldset>
        </div>
    </div>

    <!-- Developer Option -->
    <div class="zo2-divider"></div>
    <h2><?php echo JText::_('ZO2_ADMIN_DEVELOPMENT_OPTION'); ?></h2>
    <div class="zo2-divider"></div>
    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip" title="" data-original-title=""></label>
        </div>
        <div class="controls">
            <button class="btn btn-danger" id="btnClearCache" onClick="zo2.admin.ajax.clearCache();
                    return false;" data-toggle="button" data-loading-text="Processing..." >Clear cache</button>
            <button class="btn btn-primary" id="btnBuildAssets" onClick="zo2.admin.ajax.buildAssets();
                    return false;" data-toggle="button" data-loading-text="Processing...">Compile</button>
        </div>
    </div><div class="control-group">
        <div class="control-label">
            <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_DEBUG_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_DEBUG'); ?></label>
        </div>
        <div class="controls">
            <fieldset class="radio btn-group">
                <input name="jform[params][debug]" type="radio" value="1" >
                <label class="btn"><?php echo JText::_('ZO2_YES'); ?></label>
                <input name="jform[params][debug]" type="radio" value="0" checked="checked" >
                <label class="btn active btn-danger first"><?php echo JText::_('ZO2_NO'); ?></label>
            </fieldset>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
            <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_DISABLE_MOOTOOLS_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_DISABLE_MOOTOOLS'); ?></label>
        </div>
        <div class="controls">
            <fieldset class="radio btn-group">
                <input name="jform[params][disable_mootools]" type="radio" value="1" checked="checked" >
                <label class="btn active btn-success"><?php echo JText::_('ZO2_YES'); ?></label>
                <input name="jform[params][disable_mootools]" type="radio" value="0" >
                <label class="btn first"><?php echo JText::_('ZO2_NO'); ?></label>
            </fieldset>
        </div>
    </div>
    <div class="zo2-divider"></div>
    <div class="control-group no-margin no-label">
        <?php
        echo Zo2Html::field(
                'textarea', array(
            'label' => 'Custom CSS',
                ), array(
            'name' => 'zo2[custom_css]',
            'rows' => 10,
            'cols' => 20,
            'value' => Zo2Factory::getFramework()->getAssetsFile('zo2/css/custom.css')
        ));
        ?>
        <span>Here you can include your additional CSS styles</span>
    </div>    
    <div class="control-group no-margin no-label">
        <?php
        echo Zo2Html::field(
                'textarea', array(
            'label' => 'Custom JS',
                ), array(
            'name' => 'zo2[custom_js]',
            'rows' => 10,
            'cols' => 20,
            'value' => Zo2Factory::getFramework()->getAssetsFile('zo2/js/custom.js')
        ));
        ?>
        <span>Here you can include your additional JavaScript code</span>
    </div>
    <!-- Features -->

</div>
