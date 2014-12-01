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
                    <input class="logoInput" type="hidden" value="<?php echo htmlspecialchars($header_logo_setting); ?>" name="jform[params][header_logo]" id="jform_params_header_logo">
                    <div class="radio btn-group logo-type-switcher" >
                        <button class="btn logo-type-none <?php echo $header_logo_setting->type == 'none' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_ADMIN_NONE'); ?></button>
                        <button class="btn logo-type-image <?php echo $header_logo_setting->type == 'image' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_ADMIN_IMAGE'); ?></button>
                        <button class="btn logo-type-text <?php echo $header_logo_setting->type == 'text' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_ADMIN_TEXT'); ?></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_logo_setting">
            <?php
            $header_logo_setting_path = isset($header_logo_setting->path) ? $header_logo_setting->path : '';
            echo Zo2Html::field(
                'image', array(
                'label' => JText::_('ZO2_ADMIN_HEADER_LOGO'),
                'class_wrap'=> 'logo-image',
                'class' => 'logo-path'
            ), array(
                'name' => '',
                'value' => JUri::root(true) . '/' . $header_logo_setting_path
            ));
            ?>
            <div class="control-group  logo-text ">
                <label class="control-label">Header Logo Text</label>
                <input type="text" class="logo-text-input" value="<?php echo isset($header_logo_setting->text) ? $header_logo_setting->text : '' ?>">
            </div>
            <div class="control-group ">
                <label class="control-label">Header Logo Width</label>
                <input type="text" class="logo-width" value="<?php echo isset($header_logo_setting->width) ? $header_logo_setting->width : '' ?>">
            </div>
            <div class="control-group">
                <label class="control-label">Header Logo Height</label>
                <input type="text" class="logo-height" value="<?php echo isset($header_logo_setting->height) ? $header_logo_setting->height : '' ?>">
            </div>
        </div>
        <div class="zo2-divider"></div>
        <!-- Header Retina logo -->

        <?php
        $header_logo_retina_setting = json_decode($this->params->get('header_logo'));
        ?>
        <div class="control-group">
            <label class="control-label"><?php echo JText::_('ZO2_ADMIN_HEADER__RETINA_LOGO'); ?></label>
            <div class="controls">
                <div class="field-logo-container" data-name="header_retina_logo">
                    <input class="logoInput" type="hidden" value="<?php echo htmlspecialchars($header_logo_retina_setting); ?>" name="jform[params][header_retina_logo]" id="jform_params_header_retina_logo">
                    <div class="radio btn-group logo-type-switcher">
                        <button class="btn logo-type-none <?php echo $header_logo_retina_setting->type == 'none' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_ADMIN_NONE'); ?></button>
                        <button class="btn logo-type-image <?php echo $header_logo_retina_setting->type == 'image' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_ADMIN_IMAGE'); ?></button>
                        <button class="btn logo-type-text <?php echo $header_logo_retina_setting->type == 'text' ? 'active btn-success' : '' ?>"><?php echo JText::_('ZO2_ADMIN_TEXT'); ?></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_retina_logo_setting">
            <?php
            $header_logo_retina_setting_path = isset($header_logo_retina_setting->path) ? $header_logo_retina_setting->path : '';
            echo Zo2Html::field(
                'image', array(
                'label' => JText::_('ZO2_ADMIN_HEADER__RETINA_LOGO'),
                'class_wrap'=> 'logo-image',
                'class' => 'logo-path'
            ), array(
                'name' => 'header_retina_logo',
                'value' => JUri::root(true) . '/' . $header_logo_retina_setting_path
            ));
            ?>
            <div class="control-group logo-text">
                <label class="control-label">Header Retina Logo Text</label>
                <input type="text" class="logo-text-input" value="<?php echo isset($header_logo_setting->text) ? $header_logo_setting->text : '' ?>">
            </div>
            <div class="control-group">
                <label class="control-label">Header Retina Logo Width</label>
                <input type="text" class="logo-width" value="<?php echo isset($header_logo_setting->width) ? $header_logo_setting->width : '' ?>">
            </div>
            <div class="control-group">
                <label class="control-label">Header Retina Logo Height</label>
                <input type="text" class="logo-height" value="<?php echo isset($header_logo_setting->height) ? $header_logo_setting->height : '' ?>">
            </div>
        </div>

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