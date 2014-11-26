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

        <!-- Header logo -->
        <div class="control-group">
            <label class="control-label"><?php echo JText::_('ZO2_ADMIN_HEADER_LOGO'); ?></label>
            <div class="controls">
                <div class="field-logo-container" data-name="header_logo">
                    <input class="logoInput" type="hidden" value="<?php echo $this->params->get('header_logo'); ?>" name="jform[params][header_logo]" id="header_logo">
                    <div class="radio btn-group logo-type-switcher" >
                        <button class="btn logo-type-none "><?php echo JText::_('ZO2_ADMIN_NONE'); ?></button>
                        <button class="btn logo-type-image active btn-success"><?php echo JText::_('ZO2_ADMIN_IMAGE'); ?></button>
                        <button class="btn logo-type-text "><?php echo JText::_('ZO2_ADMIN_TEXT'); ?></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_logo_setting">
            <?php
            echo Zo2Html::field(
                'image', array(
                'label' => JText::_('ZO2_ADMIN_HEADER_LOGO'),
                'class_wrap'=> 'logo-image',
            ), array(
                'name' => 'jform[params][header_logo]',
                'value' => Zo2Factory::get('header_logo')
            ));
            ?>
            <div class="control-group  ">
                <label class="control-label">Header Logo Text</label>
                <div class="logo-text ">
                    <input type="text" class="logo-text-input" value="">
                </div>
            </div>
            <div class="control-group ">
                <label class="control-label">Header Logo Width</label>
                <input type="text" class="logo-width" value="">
            </div>
            <div class="control-group">
                <label class="control-label">Header Logo Height</label>
                <input type="text" class="logo-height" value="">
            </div>
        </div>
        <div class="zo2-divider"></div>
        <!-- Header Retina logo -->

        <div class="control-group">
            <label class="control-label"><?php echo JText::_('ZO2_ADMIN_HEADER__RETINA_LOGO'); ?></label>
            <div class="controls">
                <div class="field-logo-container" data-name="header_retina_logo">
                    <input class="logoInput" type="hidden" value="<?php echo $this->params->get('header_retina_logo'); ?>" name="jform[params][header_retina_logo]" id="header_retina_logo">
                    <div class="radio btn-group logo-type-switcher">
                        <button class="btn logo-type-none "><?php echo JText::_('ZO2_ADMIN_NONE'); ?></button>
                        <button class="btn logo-type-image active btn-success"><?php echo JText::_('ZO2_ADMIN_IMAGE'); ?></button>
                        <button class="btn logo-type-text "><?php echo JText::_('ZO2_ADMIN_TEXT'); ?></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_retina_logo_setting">
            <?php
            echo Zo2Html::field(
                'image', array(
                'label' => JText::_('ZO2_ADMIN_HEADER__RETINA_LOGO'),
                'class_wrap'=> 'logo-image',
            ), array(
                'name' => 'jform[params][header_retina_logo]',
                'value' => Zo2Factory::get('header_retina_logo')
            ));
            ?>
            <div class="control-group logo-text">
                <label class="control-label">Header Retina Logo Text</label>
                <input type="text" class="logo-text-input" value="">
            </div>
            <div class="control-group">
                <label class="control-label">Header Retina Logo Width</label>
                <input type="text" class="logo-width" value="424">
            </div>
            <div class="control-group">
                <label class="control-label">Header Retina Logo Height</label>
                <input type="text" class="logo-height" value="40">
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