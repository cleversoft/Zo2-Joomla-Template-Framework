<!-- Mega Menu Tab Pane -->
<div class="tab-pane" id="zo2-menu">
    <h2><?php echo JText::_('ZO2_ADMIN_SIDEBAR_HEADER_MENU'); ?></h2>
    <div class="zo2-divider"></div>
    <blockquote>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        <small>Someone famous <cite title="Source Title">Source Title</cite></small>
    </blockquote>
    <div class="profiles-pane">
        <!--        <h3 class="title-profile">--><?php //echo JText::_('ZO2_ADMIN_MEGA_MENU');         ?><!--</h3>-->
        <div class="profiles-pane-inner">

            <!-- Hover type -->
            <div class="control-group">
                <div class="control-label">
                    <label class="hasTooltip" title="" data-original-title="Hover type"><?php echo JText::_('ZO2_ADMIN_MEGA_MENU_HOVER_TYPE'); ?></label>
                </div>
                <div class="controls">
                    <select name="jform[params][menu_hover_type]" id="jform_params_menu_hover_type">
                        <option value="hover" selected="selected"><?php echo JText::_('ZO2_ADMIN_MEGA_MENU_MOUSE_HOVER'); ?></option>
                        <option value="click"><?php echo JText::_('ZO2_ADMIN_MEGA_MENU_MOUSE_CLICK'); ?></option>
                    </select>
                </div>
            </div>

            <!-- Navigation type -->
            <div class="control-group">
                <div class="control-label">
                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_MEGA_MENU_NAVIGATION_TYPE'); ?>"><?php echo JText::_('ZO2_ADMIN_MEGA_MENU_NAVIGATION_TYPE'); ?></label>
                </div>
                <div class="controls">
                    <select name="jform[params][menu_nav_type]" id="jform_params_menu_nav_type">
                        <option value="megamenu" selected="selected"><?php echo JText::_('ZO2_ADMIN_MEGA_MENU'); ?></option>
                    </select>
                </div>
            </div>

            <!-- Animation -->
            <div class="control-group">
                <div class="control-label">
                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_MEGA_MENU_ANIMATION'); ?>"><?php echo JText::_('ZO2_ADMIN_MEGA_MENU_ANIMATION'); ?></label>
                </div>
                <div class="controls">
                    <select  name="jform[params][menu_animation]" id="jform_params_menu_animation">
                        <option value=""><?php echo JText::_('ZO2_ADMIN_MEGA_MENU_ANIMATION_NONE'); ?></option>
                        <option value="fading"><?php echo JText::_('ZO2_ADMIN_MEGA_MENU_ANIMATION_FADING'); ?></option>
                        <option value="slide"><?php echo JText::_('ZO2_ADMIN_MEGA_MENU_ANIMATION_SLIDE'); ?></option>
                        <option value="zoom" selected="selected"><?php echo JText::_('ZO2_ADMIN_MEGA_MENU_ANIMATION_ZOOM'); ?></option>
                        <option value="elastic"><?php echo JText::_('ZO2_ADMIN_MEGA_MENU_ANIMATION_ELASTIC'); ?></option>
                    </select>
                </div>
            </div>

            <!-- Duration -->
            <div class="control-group">
                <?php
                echo Zo2Html::field(
                        'text', array(
                    'label' => JText::_('ZO2_ADMIN_MEGA_MENU_DURATION'),
                        ), array(
                    'name' => 'jform[params][menu_duration]',
                    'value' => Zo2Factory::get('menu_duration')
                ));
                ?>                 
            </div>

            <!-- Show submenu -->
            <?php
                echo Zo2Html::field(
                    'radio', array(
                    'label' => JText::_('ZO2_ADMIN_MEGA_MENU_SHOW_SUBMENU'),
                ), array(
                    'name' => 'jform[params][menu_show_submenu]',
                    'value' => Zo2Factory::get('menu_show_submenu')
                ));
            ?>

            <!-- Menu type -->
            <div class="control-group">
                <div class="control-label">
                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_MEGA_MENU_TYPE'); ?>"><?php echo JText::_('ZO2_ADMIN_MEGA_MENU_TYPE'); ?></label>
                </div>
                <?php
                echo Zo2Html::field(
                        'megamenu', array(), array(
                    'id' => 'jform_params_menu_type',
                    'name' => 'jform[params][menu_type]',
                    'value' => Zo2Factory::get('menu_type')
                ));
                ?>
            </div>
            <?php
            $model = new Zo2ModelJoomla();
            echo Zo2Html::field(
                    'megamenu', array(), array(
                'id' => 'jform_params_menu_type',
                'name' => 'jform[params][menu_type]',
                'value' => Zo2Factory::get('menu_type'),
                'modules' => $model->getModules()
            ));
            ?>            
        </div>
    </div>
</div>