<!-- Advanced Tab Pane -->
<div class="tab-pane" id="zo2-advanced">
    <h2><?php echo JText::_('ZO2_ADMIN_SIDEBAR_HEADER_ADVANCED'); ?></h2>
    <div class="zo2-divider"></div>

    <!-- Enable RTL -->
    <?php
        echo Zo2Html::field(
            'radio', array(
            'label' => JText::_('ZO2_ADMIN_ENABLE_RTL'),
        ), array(
            'name' => 'jform[params][enable_rtl]',
        ));
    ?>
    <!-- Responsive Layout -->
    <?php
        echo Zo2Html::field(
            'radio', array(
            'label' => JText::_('ZO2_ADMIN_RESPONSIVE_LAYOUT'),
        ), array(
            'name' => 'jform[params][responsive_layout]',
        ));
    ?>
    <!-- Enable Style Switcher -->
    <?php
        echo Zo2Html::field(
            'radio', array(
            'label' => JText::_('ZO2_ADMIN_ENABLE_STYLE_SWITCHER'),
        ), array(
            'name' => 'jform[params][enable_style_switcher]',
        ));
    ?>
    <!-- Enable Sticky Menu -->
    <?php
        echo Zo2Html::field(
            'radio', array(
            'label' => JText::_('ZO2_ADMIN_ENABLE_STICKY_MENU'),
        ), array(
            'name' => 'jform[params][enable_sticky_menu]',
        ));
    ?>

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

    <?php
        echo Zo2Html::field(
            'radio', array(
            'label' => JText::_('ZO2_ADMIN_COMBINE_CSS'),
        ), array(
            'name' => 'jform[params][combine_css]',
        ));
    ?>

    <?php
        echo Zo2Html::field(
            'radio', array(
            'label' => JText::_('ZO2_ADMIN_COMBINE_JS'),
        ), array(
            'name' => 'jform[params][combine_js]',
        ));
    ?>


    <?php
        echo Zo2Html::field(
            'radio', array(
            'label' => JText::_('ZO2_ADMIN_LOAD_JQUERY'),
        ), array(
            'name' => 'jform[params][load_jquery]',
        ));
    ?>


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
    </div>

    <?php
        echo Zo2Html::field(
            'radio', array(
            'label' => JText::_('ZO2_ADMIN_DEBUG'),
        ), array(
            'name' => 'jform[params][debug]',
        ));
    ?>

    <?php
        echo Zo2Html::field(
            'radio', array(
            'label' => JText::_('ZO2_ADMIN_DISABLE_MOOTOOLS'),
        ), array(
            'name' => 'jform[params][disable_mootools]',
        ));
    ?>

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
