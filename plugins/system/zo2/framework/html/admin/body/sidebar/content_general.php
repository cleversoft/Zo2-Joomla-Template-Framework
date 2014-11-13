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

                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Header Logo Image</label>
            <div class="logo-image ">
                <input type="hidden" class="basePath" value="/hallo142">
                <input type="hidden" class="logo-path" value="">
                <div class="btn-group">
                    <a href="#" class="btn btn-primary btn-select-logo modal" rel=""><?php echo JText::_('ZO2_ADMIN_SELECT'); ?></a>
                    <!--                                    <a href="#" class="btn btn-danger btn-remove-preview"><i class="icon-remove"></i></a>-->
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Header Logo Width</label>
            <input type="text" class="logo-width input-mini" value="">
        </div>
        <div class="control-group">
            <label class="control-label">Header Logo Height</label>
            <input type="text" class="logo-height input-mini" value="">
        </div>
        <div class="control-group">
            <label class="control-label">Header Logo Text</label>
            <div class="logo-text ">
                <input type="text" class="logo-text-input" value="">
            </div>
        </div>
        <div class="zo2-divider"></div>
        <!-- Header Retina logo -->
        <div class="control-group">
            <label class="control-label"><?php echo JText::_('ZO2_ADMIN_HEADER__RETINA_LOGO'); ?></label>
            <div class="controls">
                <div class="field-logo-container">
                    <input class="logoInput" type="hidden" value="<?php echo $this->params->get('header_retina_logo'); ?>" name="jform[params][header_retina_logo]" id="header_retina_logo">
                    <div class="radio btn-group logo-type-switcher">
                        <button class="btn logo-type-none "><?php echo JText::_('ZO2_ADMIN_NONE'); ?></button>
                        <button class="btn logo-type-image active btn-success"><?php echo JText::_('ZO2_ADMIN_IMAGE'); ?></button>
                        <button class="btn logo-type-text "><?php echo JText::_('ZO2_ADMIN_TEXT'); ?></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Header Retina Logo Image</label>
            <div class="logo-image show">
                <input type="hidden" class="basePath" value="/hallo142">
                <input type="hidden" class="logo-path" value="images/logo-retina.png">
                <div class="btn-group">
                    <span class="logo-preview"><img src="http://img.photobucket.com/albums/v710/bkirchner1/Screenshot2010-06-16at45413PM%7CJun16.jpg"></span><br />
                    <a href="#" class="btn btn-primary btn-select-logo modal" rel=""><?php echo JText::_('ZO2_ADMIN_SELECT'); ?></a>
                    <a href="#" class="btn btn-danger btn-remove-preview"><i class="icon-remove"></i></a>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Header Retina Logo Width</label>
            <input type="text" class="logo-width input-mini" value="424">
        </div>
        <div class="control-group">
            <label class="control-label">Header Retina Logo Height</label>
            <input type="text" class="logo-height input-mini" value="40">
        </div>
        <div class="control-group">
            <label class="control-label">Header Retina Logo Text</label>
            <div class="logo-text">
                <input type="text" class="logo-text-input" value="">
            </div>
        </div>

        <!-- Show "Go to top" -->
        <div class="control-group">
            <label class="control-label"><?php echo JText::_('ZO2_ADMIN_SHOW_GO_TO_TOP'); ?></label>
            <div class="controls">
                <fieldset class="radio btn-group">
                    <input name="jform[params][footer_gototop]" id="jform_params_footer_gototop1" type="radio" value="1" checked="checked" >
                    <label class="btn active btn-success"><?php echo JText::_('ZO2_YES'); ?></label>
                    <input name="jform[params][footer_gototop]" id="jform_params_footer_gototop0" type="radio" value="0" >
                    <label class="btn first"><?php echo JText::_('ZO2_NO'); ?></label>
                </fieldset>
            </div>
        </div>
        <!-- Show footer logo -->
        <div class="control-group">
            <label class="control-label hasTooltip" data-original-title="<?php echo JText::_('ZO2_ADMIN_SHOW_FOOTER_LOGO_TITLE'); ?>"><?php echo JText::_('ZO2_ADMIN_SHOW_FOOTER_LOGO'); ?></label>
            <div class="controls">
                <fieldset class="radio btn-group">
                    <input name="jform[params][footer_logo]" id="jform_params_footer_logo1" type="radio" value="1" checked="checked" >
                    <label class="btn active btn-success"><?php echo JText::_('ZO2_YES'); ?></label>
                    <input name="jform[params][footer_logo]" id="jform_params_footer_logo0" type="radio" value="0" >
                    <label class="btn first"><?php echo JText::_('ZO2_NO'); ?></label>
                </fieldset>
            </div>
        </div>
    </div>
</div>