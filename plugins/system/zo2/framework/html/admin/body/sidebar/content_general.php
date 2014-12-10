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
            'text' => JText::_('ZO2_ADMIN_DESCRIPTION_GENERAL'),
            'subtext' => '<a href="http://docs.zootemplate.com/category/zo2/general">Document</a>'
        ));
        ?>

        <!-- Site Name -->
        <?php
        echo Zo2Html::field(
                'text', array(
            'label' => JText::_('ZO2_ADMIN_SITENAME'),
            'description' => JText::_('ZO2_ADMIN_SITENAME_DESC')
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
            'description' => JText::_('ZO2_ADMIN_SLOGAN_DESC')
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
            'description' => JText::_('ZO2_ADMIN_COPYRIGHT_DESC')
                ), array(
            'name' => 'jform[params][footer_copyright]',
            'rows' => 10,
            'cols' => 20,
            'value' => Zo2Factory::get('footer_copyright')
        ));
        ?>        
        <?php
        $header_logo_setting = json_decode($this->params->get('header_logo'));
        ?>
        <!-- Header logo -->
        <div class="control-group">
            <div class="control-label">
                <label class="zo2-label"><?php echo JText::_('ZO2_ADMIN_HEADER_LOGO'); ?></label>
                <div class="label-desc"><?php echo JText::_('ZO2_ADMIN_HEADER_LOGO_DESC'); ?></div>
            </div>
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
        <div class="control-group header-logo-settings">
            <!-- Standard logo -->
            <?php
            $header_logo_setting_path = $this->params->get('header_logo_path');
            echo Zo2Html::field(
                    'image', array(
                'label' => JText::_('ZO2_ADMIN_HEADER_LOGO_IMAGE'),
                'description' => JText::_('ZO2_ADMIN_HEADER_LOGO_IMAGE_DESC'),
                'class_wrap' => 'logo-image',
                'class' => 'logo-path'
                    ), array(
                'name' => '',
                'value' => JUri::root(true) . '/' . $header_logo_setting_path
            ));
            ?>
        </div>
        <!-- Logo Text -->
        <div class="control-group logo-text">
            <div class="control-label">
                <label class="zo2-label"><?php echo JText::_('ZO2_ADMIN_HEADER_LOGO_TEXT'); ?></label>
                <div class="label-desc"><?php echo JText::_('ZO2_ADMIN_HEADER_LOGO_TEXT_DESC'); ?></div>
            </div>
            <div class="controls">
                <input type="text" class="logo-text-input" value="<?php echo $this->params->get('header_logo_path'); ?>">
            </div>
        </div>


        <!-- Retina logo -->
        <div class="control-group">
            <div class="control-label">
                <label class="zo2-label"><?php echo JText::_('ZO2_ADMIN_HEADER_LOGO_RETINA'); ?></label>
                <div class="label-desc"><?php echo JText::_('ZO2_ADMIN_HEADER_LOGO_RETINA_DESC'); ?></div>
            </div>
            <div class="controls">
                <div class="field-logo-container" data-name="header_logo">
                    <div class="radio btn-group logo-type-switcher" >
                        <button class="btn logo-type-none <?php echo $this->params->get('header_logo_retina', 'none') == 'none' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_ADMIN_NONE'); ?></button>
                        <button class="btn logo-type-image <?php echo $this->params->get('header_logo_retina', 'none') == 'image' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_ADMIN_IMAGE'); ?></button>
                        <button class="btn logo-type-text <?php echo $this->params->get('header_logo_retina', 'none') == 'text' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_ADMIN_TEXT'); ?></button>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $header_logo_setting_path = $this->params->get('header_logo_retina_path');
        echo Zo2Html::field(
                'image', array(
            'label' => JText::_('ZO2_ADMIN_HEADER_LOGO_RETINA_IMAGE'),
            'description' => JText::_('ZO2_ADMIN_HEADER_LOGO_RETINA_IMAGE_DESC'),
            'class_wrap' => 'logo-retina-image',
            'class' => 'logo-path'
                ), array(
            'name' => '',
            'value' => JUri::root(true) . '/' . $header_logo_setting_path
        ));
        ?>

        <!-- Logo Retina Text -->
        <div class="control-group logo-text">
            <div class="control-label">
                <label class="zo2-label"><?php echo JText::_('ZO2_ADMIN_HEADER_LOGO_RETINA_TEXT'); ?></label>
                <div class="label-desc"><?php echo JText::_('ZO2_ADMIN_HEADER_LOGO_RETINA_TEXT_DESC'); ?></div>
            </div>
            <div class="controls">
                <input type="text" class="logo-text-input" value="<?php echo $this->params->get('header_logo_retina_path'); ?>">
            </div>
        </div>

        <div class="zo2-divider"></div>     
        <!-- Show "Go to top" -->
        <?php
        echo Zo2Html::field(
                'radio', array(
            'label' => JText::_('ZO2_ADMIN_SHOW_GO_TO_TOP'),
            'description' => JText::_('ZO2_ADMIN_SHOW_GO_TO_TOP_DESC')
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
            'description' => JText::_('ZO2_ADMIN_SHOW_FOOTER_LOGO_DESC')
                ), array(
            'name' => 'jform[params][footer_logo]',
            'value' => Zo2Factory::get('footer_logo')
        ));
        ?>
    </div>
</div>