<!-- Mega Menu Tab Pane -->
<div class="tab-pane" id="zo2-menu">
    <blockquote>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        <small>Someone famous <cite title="Source Title">Source Title</cite></small>
    </blockquote>
    <div class="profiles-pane">
        <h3 class="title-profile"><?php echo JText::_('ZO2_ADMIN_MEGA_MENU'); ?></h3>
        <div class="profiles-pane-inner">
            <div class="control-group">
                <div class="control-label"></div>
                <div class="controls"></div>
            </div>

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
                <div class="control-label">
                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_MEGA_MENU_DURATION'); ?>"><?php echo JText::_('ZO2_ADMIN_MEGA_MENU_DURATION'); ?></label>
                </div>
                <div class="controls">
                    <input name="jform[params][menu_duration]" type="text" value="<?php echo $this->params->get('menu_duration'); ?>">
                </div>
            </div>

            <!-- Show submenu -->
            <div class="control-group">
                <div class="control-label">
                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_MEGA_MENU_SHOW_SUBMENU'); ?>"><?php echo JText::_('ZO2_ADMIN_MEGA_MENU_SHOW_SUBMENU'); ?></label>
                </div>
                <div class="controls">
                    <fieldset class="radio btn-group">
                        <input name="jform[params][menu_show_submenu]" id="jform_params_menu_show_submenu0" type="radio" value="0" >
                        <label class="btn first"><?php echo JText::_('ZO2_NO'); ?></label>
                        <input name="jform[params][menu_show_submenu]" id="jform_params_menu_show_submenu1" type="radio" value="1" checked="checked" >
                        <label class="btn active btn-success"><?php echo JText::_('ZO2_YES'); ?></label>
                    </fieldset>
                </div>
            </div>

            <!-- Menu type -->
            <div class="control-group">
                <div class="control-label">
                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_MEGA_MENU_TYPE'); ?>"><?php echo JText::_('ZO2_ADMIN_MEGA_MENU_TYPE'); ?></label>
                </div>
                <div class="controls">
                    <select name="jform[params][menu_type]" id="jform_params_menu_type">
                        <?php
                        $menu_types = Zo2Megamenu::getMenuTypes();
                        if ($menu_types) {
                            foreach ($menu_types as $menu_type) {
                                echo '<option value="' . $menu_type->menutype . '" selected="selected">' . $menu_type->title . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <div class="progress progress-striped zo2-progress active" style="display: none;"><div class="bar" style="width: 100%"></div></div>
                </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label class=""></label>
                </div>

                <!-- Megamenu Toolbox -->
                <div class="controls">
                    <?php echo Zo2Html::_('admin', 'megamenu'); ?>
                </div>
            </div>
        </div>
    </div>
</div>