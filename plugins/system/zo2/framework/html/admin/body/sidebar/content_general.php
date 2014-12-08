<!-- Tab Panel General -->
<div class="tab-pane active" id="zo2-general">
    <div class="tab-content">
        <!-- Global -->
        <!-- Description -->
        <h2><?php echo JText::_('ZO2_ADMIN_SIDEBAR_HEADER_GENERAL'); ?></h2>
        <div class="zo2-divider"></div>

        <?php
        echo Zo2Html::field(
                'description', null, array(
            'text' => 'These are the general options for the templates',
            'subtext' => '<a href="http://www.zootemplate.com/blog">Document</a>'
        ));
        ?>

        <!-- Site Name -->
        <?php
        echo Zo2Html::field(
                'text', array(
            'label' => JText::_('ZO2_ADMIN_SITENAME'),
                ), array(
            'name' => 'jform[params][site_name]',
            'value' => Zo2Factory::get('site_name')
        ));
        ?>
        <!-- Site Slogan -->
        <?php
        echo Zo2Html::field(
                'text', array(
            'label' => JText::_('ZO2_ADMIN_SLOGAN'),
                ), array(
            'name' => 'jform[params][site_slogan]',
            'value' => Zo2Factory::get('site_slogan')
        ));
        ?>
        <!-- Copyright -->
        <?php
        echo Zo2Html::field(
                'textarea', array(
            'label' => JText::_('ZO2_ADMIN_COPYRIGHT'),
                ), array(
            'name' => 'jform[params][footer_copyright]',
            'rows' => 10,
            'cols' => 20,
            'value' => Zo2Factory::get('footer_copyright')
        ));
        ?>
        <!-- Favicon -->
        <?php
        echo Zo2Html::field(
                'image', array(
            'label' => JText::_('ZO2_ADMIN_FAVICON'),
                ), array(
            'name' => 'jform[params][favicon]',
            'value' => Zo2Factory::get('favicon')
        ));
        ?>
        <?php
        $header_logo_setting = json_decode($this->params->get('header_logo'));
        ?>
        <!-- Header logo -->
        <div class="control-group">
            <label class="control-label"><?php echo JText::_('ZO2_ADMIN_HEADER_LOGO'); ?></label>
            <div class="controls">
                <div class="field-logo-container" data-name="header_logo">
                    <div class="radio btn-group logo-type-switcher" >
                        <button class="btn logo-type-none <?php echo $this->params->get('header_logo', 'none') == 'none' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_ADMIN_NONE'); ?></button>
                        <button class="btn logo-type-image <?php echo $this->params->get('header_logo', 'none') == 'image' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_ADMIN_IMAGE'); ?></button>
                        <button class="btn logo-type-text <?php echo $this->params->get('header_logo', 'none') == 'text' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_ADMIN_TEXT'); ?></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-logo-settings">
            <!-- Standard logo -->
            <div id="header-logo">
                <?php
                $header_logo_setting_path = $this->params->get('header_logo_path');
                echo Zo2Html::field(
                        'image', array(
                    'label' => JText::_('ZO2_ADMIN_HEADER_LOGO'),
                    'class_wrap' => 'logo-image',
                    'class' => 'logo-path'
                        ), array(
                    'name' => '',
                    'value' => JUri::root(true) . '/' . $header_logo_setting_path
                ));
                ?>
                <div class="control-group  logo-text ">
                    <label class="control-label">Header Logo Text</label>
                    <input type="text" class="logo-text-input" value="<?php echo $this->params->get('header_logo_path'); ?>">
                </div>
                <div class="control-group ">
                    <label class="control-label">Header Logo Width</label>
                    <input type="text" class="logo-width" value="<?php echo $this->params->get('header_logo_width'); ?>">
                </div>
                <div class="control-group">
                    <label class="control-label">Header Logo Height</label>
                    <input type="text" class="logo-height" value="<?php echo $this->params->get('header_logo_height'); ?>">
                </div>
            </div>
            <!-- Retina logo -->
            <div id="header-logo-retina">
                <?php
                $header_logo_setting_path = $this->params->get('header_logo_retina_path');
                echo Zo2Html::field(
                        'image', array(
                    'label' => JText::_('ZO2_ADMIN_HEADER_LOGO_RETINA'),
                    'class_wrap' => 'logo-image',
                    'class' => 'logo-path'
                        ), array(
                    'name' => '',
                    'value' => JUri::root(true) . '/' . $header_logo_setting_path
                ));
                ?>
                <div class="control-group  logo-text ">
                    <label class="control-label">Header Logo Text</label>
                    <input type="text" class="logo-text-input" value="<?php echo $this->params->get('header_logo_retina_path'); ?>">
                </div>
                <div class="control-group ">
                    <label class="control-label">Header Logo Width</label>
                    <input type="text" class="logo-width" value="<?php echo $this->params->get('header_logo_retina_width'); ?>">
                </div>
                <div class="control-group">
                    <label class="control-label">Header Logo Height</label>
                    <input type="text" class="logo-height" value="<?php echo $this->params->get('header_logo_retina_height'); ?>">
                </div>
            </div>
        </div>
        <div class="zo2-divider"></div>     
        <!-- Show "Go to top" -->
        <?php
        echo Zo2Html::field(
                'radio', array(
            'label' => JText::_('ZO2_ADMIN_SHOW_GO_TO_TOP'),
                ), array(
            'name' => 'jform[params][footer_gototop]',
            'value' => Zo2Factory::get('footer_gototop')
        ));
        ?>
        <!-- Show footer logo -->
        <?php
        echo Zo2Html::field(
                'radio', array(
            'label' => JText::_('ZO2_ADMIN_SHOW_FOOTER_LOGO'),
                ), array(
            'name' => 'jform[params][footer_logo]',
            'value' => Zo2Factory::get('footer_logo')
        ));
        ?>
    </div>
</div>