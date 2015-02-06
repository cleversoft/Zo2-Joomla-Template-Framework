<!-- Tab Panel General -->
<div class="tab-pane active" id="zo2-general">
    <div class="tab-content">
        <!-- Global -->        
        <h2><?php echo JText::_('ZO2_ADMIN_HEADER_GENERAL'); ?></h2>     
        <div class="zo2-divider"></div>
        <!-- Description -->
        <?php
        echo Zo2Html::field(
                'description', null, array(
            'text' => JText::_('ZO2_ADMIN_GENERAL_DESC'),
            'subtext' => '<a href="http://docs.zootemplate.com/category/zo2/general">Document</a>'
        ));
        ?>

        <!-- Site Name -->
        <?php
        echo Zo2Html::field(
                'text', array(
            'label' => JText::_('ZO2_ADMIN_GENERAL_LABEL_SITENAME'),
            'description' => JText::_('ZO2_ADMIN_GENERAL_DESC_SITENAME')
                ), array(
            'name' => 'jform[params][site_name]',
            'value' => Zo2Framework::getParam('site_name'),
            'placeholder' => JFactory::getConfig()->get('sitename')
        ));
        ?>
        <!-- Site Slogan -->
        <?php
        echo Zo2Html::field(
                'text', array(
            'label' => JText::_('ZO2_ADMIN_GENERAL_LABEL_SLOGAN'),
            'description' => JText::_('ZO2_ADMIN_GENERAL_DESC_SLOGAN')
                ), array(
            'name' => 'jform[params][site_slogan]',
            'value' => Zo2Framework::getParam('site_slogan'),
            'placeholder' => 'Zo2 Framework'
        ));
        ?>
        <!-- Copyright -->        
        <?php
        /**
         * @todo Use JEditor
         */
        echo Zo2Html::field(
                'textarea', array(
            'label' => JText::_('ZO2_ADMIN_GENERAL_LABEL_COPYRIGHT'),
            'description' => JText::_('ZO2_ADMIN_GENERAL_DESC_COPYRIGHT')
                ), array(
            'name' => 'jform[params][footer_copyright]',
            'rows' => 10,
            'cols' => 20,
            'value' => Zo2Framework::getParam('footer_copyright')
        ));
        ?>                        
        <!-- Standard logo -->        
        <?php
        echo Zo2Html::field(
                'image', array(
            'label' => JText::_('ZO2_ADMIN_GENERAL_LABEL_STANDARD_LOGO'),
            'description' => JText::_('ZO2_ADMIN_GENERAL_DESC_STANDARD_LOGO'),
            'class_wrap' => 'logo-image',
            'class' => 'logo-path'
                ), array(
            'id' => 'jform_params_standard_logo',
            'name' => 'jform[params][standard_logo]',
            'value' => Zo2Framework::getParam('standard_logo')
        ));
        ?>  
        <!-- Retina logo -->       
        <?php
        echo Zo2Html::field(
                'image', array(
            'label' => JText::_('ZO2_ADMIN_GENERAL_LABEL_RETINA_LOGO'),
            'description' => JText::_('ZO2_ADMIN_GENERAL_DESC_RETINA_LOGO'),
            'class_wrap' => 'logo-retina-image',
            'class' => 'logo-path'
                ), array(
            'id' => 'jform_params_retina_logo',
            'name' => 'jform[params][retina_logo]',
            'value' => Zo2Framework::getParam('retina_logo')
        ));
        ?>               
        <div class="zo2-divider"></div>     
        <!-- Show "Go to top" -->
        <?php
        echo Zo2Html::field(
                'radio', array(
            'label' => JText::_('ZO2_ADMIN_GENERAL_LABEL_ENABLE_GOTOTOP'),
            'description' => JText::_('ZO2_ADMIN_GENERAL_DESC_ENABLE_GOTOTOP')
                ), array(
            'name' => 'jform[params][footer_gototop]',
            'value' => Zo2Framework::getParam('footer_gototop')
        ));
        ?>
        <!-- Show footer logo -->
        <?php
        echo Zo2Html::field(
                'radio', array(
            'label' => JText::_('ZO2_ADMIN_GENERAL_LABEL_ENABLE_FOOTER_LOGO'),
            'description' => JText::_('ZO2_ADMIN_GENERAL_DESC_ENABLE_FOOTER_LOGO')
                ), array(
            'name' => 'jform[params][footer_logo]',
            'value' => Zo2Framework::getParam('footer_logo')
        ));
        ?>
    </div>
</div>