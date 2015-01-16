<?php
$menuHoverType = trim(Zo2Framework::getParam('menu_hover_type'));
$menuAnimation = trim(Zo2Framework::getParam('menu_animation'));
?>
<!-- Mega Menu Tab Pane -->
<div class="tab-pane" id="zo2-menu">
    <h2><?php echo JText::_('ZO2_ADMIN_SIDEBAR_HEADER_MENU'); ?></h2>
    <div class="zo2-divider"></div>

    <?php
    echo Zo2Html::field(
            'description', null, array(
        'text' => JText::_('ZO2_ADMIN_DESCRIPTION_MENU'),
        'subtext' => '<a href="http://docs.zootemplate.com/post/mega-menu-setting">Document</a>'
    ));
    ?>

    <div class="profiles-pane">
        <!--        <h3 class="title-profile">--><?php //echo JText::_('ZO2_ADMIN_MEGA_MENU');                                       ?><!--</h3>-->
        <div class="profiles-pane-inner">

            <!-- Hover type -->
            <div class="control-group">
                <div class="control-label">
                    <label class="zo2-label"><?php echo JText::_('ZO2_ADMIN_LABEL_MEGA_MENU_HOVER_TYPE'); ?></label>
                    <div class="label-desc"><?php echo JText::_('ZO2_ADMIN_DESC_MEGA_MENU_HOVER_TYPE_DESC'); ?></div>
                </div>
                <div class="controls">
                    <select name="jform[params][menu_hover_type]" id="jform_params_menu_hover_type">
                        <option value="hover" 
                                <?php echo ($menuHoverType == 'hover') ? 'selected="selected"' : ''; ?> >
                            <?php echo JText::_('ZO2_ADMIN_MEGA_MENU_MOUSE_HOVER'); ?></option>
                        <option value="click"
                                <?php echo ($menuHoverType == 'click') ? 'selected="selected"' : ''; ?> >
                            <?php echo JText::_('ZO2_ADMIN_MEGA_MENU_MOUSE_CLICK'); ?></option>
                    </select>
                </div>
            </div>           
            <!-- Animation -->
            <div class="control-group">
                <div class="control-label">
                    <label class="zo2-label"><?php echo JText::_('ZO2_ADMIN_MEGA_MENU_ANIMATION'); ?></label>
                    <div class="label-desc"><?php echo JText::_('ZO2_ADMIN_MEGA_MENU_ANIMATION_DESC'); ?></div>
                </div>
                <div class="controls">                    
                    <select  name="jform[params][menu_animation]" id="jform_params_menu_animation">
                        <option value=""
                                <?php echo ($menuAnimation == '') ? 'selected="selected"' : ''; ?> >
                                    <?php echo JText::_('ZO2_ADMIN_MEGA_MENU_ANIMATION_NONE'); ?>
                        </option>
                        <option value="fading"
                                <?php echo ($menuAnimation == 'fading') ? 'selected="selected"' : ''; ?> >
                            <?php echo JText::_('ZO2_ADMIN_MEGA_MENU_ANIMATION_FADING'); ?></option>
                        <option value="slide"
                                <?php echo ($menuAnimation == 'slide') ? 'selected="selected"' : ''; ?> >
                            <?php echo JText::_('ZO2_ADMIN_MEGA_MENU_ANIMATION_SLIDE'); ?></option>
                        <option value="zoom" 
                                <?php echo ($menuAnimation == 'zoom') ? 'selected="selected"' : ''; ?> >
                            <?php echo JText::_('ZO2_ADMIN_MEGA_MENU_ANIMATION_ZOOM'); ?></option>                        
                        <option value="elastic"
                                <?php echo ($menuAnimation == 'elastic') ? 'selected="selected"' : ''; ?> >
                            <?php echo JText::_('ZO2_ADMIN_MEGA_MENU_ANIMATION_ELASTIC'); ?></option>
                    </select>
                </div>
            </div>

            <!-- Duration -->
            <?php
            echo Zo2Html::field(
                    'text', array(
                'label' => JText::_('ZO2_ADMIN_MEGA_MENU_DURATION'),
                'description' => JText::_('ZO2_ADMIN_MEGA_MENU_DURATION_DESC')
                    ), array(
                'name' => 'jform[params][menu_duration]',
                'value' => Zo2Framework::getParam('menu_duration', 300),
                'default' => 300
            ));
            ?>

            <!-- Menu type -->           
            <?php
            $model = new Zo2ModelJoomla();
            echo Zo2Html::field(
                    'megamenu', array(), array(
                'id' => 'jform_params_menu_type',
                'name' => 'jform[params][menu_type]',
                'value' => Zo2Framework::getParam('menu_type', 'mainmenu'),
                'modules' => $model->getModules()
            ));
            ?>

        </div>
    </div>
</div>