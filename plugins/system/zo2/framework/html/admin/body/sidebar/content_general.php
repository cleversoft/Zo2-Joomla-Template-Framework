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
        <!-- Standard logo -->        
        <?php
        echo Zo2Html::field(
                'image', array(
            'label' => JText::_('ZO2_ADMIN_HEADER_LOGO_IMAGE'),
            'description' => JText::_('ZO2_ADMIN_HEADER_LOGO_IMAGE_DESC'),
            'class_wrap' => 'logo-image',
            'class' => 'logo-path'
                ), array(
            'id' => 'jform_params_header_logo_path',
            'name' => 'jform[params][header_logo_path]',
            'value' => Zo2Factory::get('header_logo_path')
        ));
        ?>
        <!-- Standard logo Text -->
        <?php
        echo Zo2Html::field(
                'text', array(
            'label' => JText::_('ZO2_ADMIN_HEADER_LOGO_TEXT'),
            'description' => JText::_('ZO2_ADMIN_HEADER_LOGO_TEXT_DESC')
                ), array(
            'name' => 'jform[params][header_logo_text]',
            'value' => Zo2Factory::get('header_logo_text')
        ));
        ?>    
        <!-- Retina logo -->       
        <?php
        echo Zo2Html::field(
                'image', array(
            'label' => JText::_('ZO2_ADMIN_HEADER_LOGO_RETINA_IMAGE'),
            'description' => JText::_('ZO2_ADMIN_HEADER_LOGO_RETINA_IMAGE_DESC'),
            'class_wrap' => 'logo-retina-image',
            'class' => 'logo-path'
                ), array(
            'id' => 'jform_params_header_retina_logo_path',
            'name' => 'jform[params][header_retina_logo_path]',
            'value' => Zo2Factory::get('header_retina_logo_path')
        ));
        ?>
        <!-- Retina logo Text -->
        <?php
        echo Zo2Html::field(
                'text', array(
            'label' => JText::_('ZO2_ADMIN_HEADER_LOGO_RETINA_TEXT'),
            'description' => JText::_('ZO2_ADMIN_HEADER_LOGO_RETINA_TEXT_DESC')
                ), array(
            'name' => 'jform[params][header_retina_logo_text]',
            'value' => Zo2Factory::get('header_retina_logo_text')
        ));
        ?>            
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