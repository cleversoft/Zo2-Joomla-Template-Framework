<!-- Advanced Tab Pane -->
<div class="tab-pane" id="zo2-advanced">
    <!-- Header -->
    <h2><?php echo JText::_('ZO2_ADMIN_SIDEBAR_HEADER_ADVANCED'); ?></h2>
    <div class="zo2-divider"></div>
    <?php
    echo Zo2Html::field(
            'description', null, array(
        'text' => JText::_('ZO2_ADMIN_DESCRIPTION_ADVANCED'),
        'subtext' => '<a href="http://docs.zootemplate.com/category/zo2/profile">Document</a>'
    ));
    ?>
    <!-- Enable RTL -->
    <?php
    echo Zo2Html::field(
            'radio', array(
        'label' => JText::_('ZO2_ADMIN_ENABLE_RTL'),
        'description' => JText::_('ZO2_ADMIN_ENABLE_RTL_DESC')
            ), array(
        'name' => 'jform[params][enable_rtl]',
        'value' => Zo2Framework::getParam('enable_rtl')
    ));
    ?>
    <!-- Hide frontpage component -->
    <?php
    echo Zo2Html::field(
            'radio', array(
        'label' => JText::_('ZO2_ADMIN_HIDE_FRONTPAGE_COMPONENT'),
        'description' => JText::_('ZO2_ADMIN_HIDE_FRONTPAGE_COMPONENT_DESC')
            ), array(
        'name' => 'jform[params][component_area]',
        'value' => Zo2Framework::getParam('component_area')
    ));
    ?>
    <!-- Responsive Layout -->
    <?php
    echo Zo2Html::field(
            'radio', array(
        'label' => JText::_('ZO2_ADMIN_LABEL_DISABLE_RESPONSIVE_LAYOUT'),
        'description' => JText::_('ZO2_ADMIN_DESC_DISABLE_RESPONSIVE_LAYOUT')
            ), array(
        'name' => 'jform[params][non_responsive_layout]',
        'value' => Zo2Framework::getParam('non_responsive_layout', 0)
    ));
    ?>
    <!-- Enable Style Switcher -->
    <?php
    echo Zo2Html::field(
            'radio', array(
        'label' => JText::_('ZO2_ADMIN_ENABLE_STYLE_SWITCHER'),
        'description' => JText::_('ZO2_ADMIN_ENABLE_STYLE_SWITCHER_DESC')
            ), array(
        'name' => 'jform[params][enable_style_switcher]',
        'value' => Zo2Framework::getParam('enable_style_switcher')
    ));
    ?>
    <!-- Enable Sticky Menu -->
    <?php
    echo Zo2Html::field(
            'radio', array(
        'label' => JText::_('ZO2_ADMIN_ENABLE_STICKY_MENU'),
        'description' => JText::_('ZO2_ADMIN_ENABLE_STICKY_MENU_DESC')
            ), array(
        'name' => 'jform[params][enable_sticky_menu]',
        'value' => Zo2Framework::getParam('enable_sticky_menu')
    ));
    ?>
    <div class="zo2-divider"></div>
    <h2><?php echo JText::_('ZO2_ADMIN_CUSTOM_CSS_JS'); ?></h2>
    <div class="zo2-divider"></div>
    <div class="control-group no-margin no-label">
        <?php
        $value = Zo2Framework::getInstance()->getAssetsFile('zo2/css/custom.css');
        if (strpos($value, '/* Here you can include your additional CSS Styles */') === false)
        {
            $value = '/* Here you can include your additional CSS Styles */' . PHP_EOL . $value;
        }
        echo Zo2Html::field(
                'textarea', array(
            'label' => JText::_('ZO2_ADMIN_CUSTOM_CSS_STYLE'),
            'description' => JText::_('ZO2_ADMIN_CUSTOM_CSS_STYLE_DESC')
                ), array(
            'name' => 'zo2[custom_css]',
            'rows' => 10,
            'cols' => 20,
            'value' => $value
        ));
        ?>
        <span>Here you can include your additional CSS styles</span>
    </div>
    <div class="control-group no-margin no-label">
        <?php
        $value = Zo2Framework::getInstance()->getAssetsFile('zo2/js/custom.js');
        if (strpos($value, '/* Here you can include your additional Javascript code */') === false)
        {
            $value = '/* Here you can include your additional Javascript code */' . PHP_EOL . $value;
        }
        echo Zo2Html::field(
                'textarea', array(
            'label' => JText::_('ZO2_ADMIN_CUSTOM_JAVASCRIPT_CODE'),
            'description' => JText::_('ZO2_ADMIN_CUSTOM_JAVASCRIPT_CODE_DESC')
                ), array(
            'name' => 'zo2[custom_js]',
            'rows' => 10,
            'cols' => 20,
            'value' => $value
        ));
        ?>
        <span>Here you can include your additional JavaScript code</span>
    </div>
    <!-- Tracking Cocde -->
    <div class="zo2-divider"></div>
    <h2><?php echo JText::_('ZO2_ADMIN_GOOGLE_TRACKING_CODE'); ?></h2>
    <div class="zo2-divider"></div>
    <div class="control-group no-margin no-label">
        <?php
        echo Zo2Html::field(
                'textarea', array(
            'label' => JText::_('ZO2_ADMIN_GOOGLE_TRACKING_CODE'),
            'description' => JText::_('ZO2_ADMIN_GOOGLE_TRACKING_CODE_DESC')
                ), array(
            'name' => 'jform[params][tracking_code]',
            'rows' => 10,
            'cols' => 20,
            'value' => Zo2Framework::getParam('tracking_code')
        ));
        ?>
        <span>Paste your Google Analytics (or other) tracking code here.<br /> This will be added before the closing body tag in the template. <br/> This should be something like<br /> &#60;script&#62;<br />....<br />&#60;/script&#62;</span>
    </div>
    <!-- Optmization Option -->
    <div class="zo2-divider"></div>
    <h2><?php echo JText::_('ZO2_ADMIN_OPTIMIZATION_OPTION'); ?></h2>
    <div class="zo2-divider"></div>    
    <p>Enable compress CSS/JS. These options only available when Development Mode is off</p>
    <!-- Combine css -->
    <?php
    echo Zo2Html::field(
            'radio', array(
        'label' => JText::_('ZO2_ADMIN_COMBINE_CSS'),
        'description' => JText::_('ZO2_ADMIN_COMBINE_CSS_DESC')
            ), array(
        'name' => 'jform[params][combine_css]',
        'value' => Zo2Framework::getParam('combine_css'),
        'options' => array(
            array(
                'label' => JText::_('ZO2_YES')
            ),
            array(
                'label' => JText::_('ZO2_NO')
            )
        )
    ));
    ?>
    <!-- Combine js -->
    <?php
    echo Zo2Html::field(
            'radio', array(
        'label' => JText::_('ZO2_ADMIN_COMBINE_JS'),
        'description' => JText::_('ZO2_ADMIN_COMBINE_JS_DESC')
            ), array(
        'value' => Zo2Framework::getParam('combine_js'),
        'name' => 'jform[params][combine_js]',
        'options' => array(
            array(
                'label' => JText::_('ZO2_YES')
            ),
            array(
                'label' => JText::_('ZO2_NO')
            )
        )
    ));
    ?>   
    <!-- Development mode -->
    <div class="zo2-divider"></div>  
    <h2><?php echo JText::_('ZO2_ADMIN_DEVELOPMENT_OPTION'); ?></h2>    
    <div class="zo2-divider"></div>   
    <?php
    echo Zo2Html::field(
            'radio', array(
        'label' => JText::_('ZO2_ADMIN_ADVANCED_LABEL_DEVELOPMENT_MODE'),
        'description' => JText::_('ZO2_ADMIN_ADVANCED_DESC_DEVELOPMENT_MODE')
            ), array(
        'name' => 'jform[params][development_mode]',
        'value' => Zo2Framework::getParam('development_mode')
    ));
    ?>
</div>