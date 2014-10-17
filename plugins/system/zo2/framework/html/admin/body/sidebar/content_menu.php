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
                    <select name="zo2_menu_hover_type" id="zo2_menu_hover_type">
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
                    <select name="zo2_menu_nav_type" id="zo2_menu_nav_type">
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
                    <select  name="zo2_menu_animation" id="zo2_menu_animation">
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
                    <input name="zo2_menu_duration" id="" type="text" value="400">
                </div>
            </div>

            <!-- Show submenu -->
            <div class="control-group">
                <div class="control-label">
                    <label class="hasTooltip" title="" data-original-title="<?php echo JText::_('ZO2_ADMIN_MEGA_MENU_SHOW_SUBMENU'); ?>"><?php echo JText::_('ZO2_ADMIN_MEGA_MENU_SHOW_SUBMENU'); ?></label>
                </div>
                <div class="controls">
                    <fieldset class="radio btn-group">
                        <input name="zo2_menu_show_submenu" id="" type="radio" value="0" style="display: none;">
                        <label class="btn first"><?php echo JText::_('ZO2_NO'); ?></label>
                        <input name="zo2_menu_show_submenu" id="" type="radio" value="1" checked="checked" style="display: none;">
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
                    <select name="zo2_menu_type" id="zo2_menu_type">
                        <?php
                            $menu_types = Zo2Megamenu::getMenuTypes();
                            if($menu_types) {
                                foreach($menu_types as  $menu_type) {
                                    echo '<option value="'.$menu_type->menutype.'" selected="selected">'.$menu_type->title.'</option>';
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
                <?php
                    if (!defined('ZO_MEGAMENU_ASSET')) {
                    define('ZO_MEGAMENU_ASSET', 1);
                    $assets = Zo2Assets::getInstance();
                    $assets->addStylesheet('zo2/css/megamenu.css');
                    $assets->addStyleSheet('zo2/css/adminmegamenu.css');
                    $assets->addScript('zo2/js/adminmegamenu.min.js');
                    }

                    $modules = Zo2Megamenu::getModules();
                ?>
                <div id="zo2-admin-megamenu" class="hidden zo2-admin-megamenu">
                <div class="admin-inline-toolbox clearfix">
                    <div class="zo2-admin-mm-row clearfix">

                        <div id="zo2-admin-mm-intro" class="pull-left">
                            <h3><?php echo JTexT::_('ZO2_NAVIGATION_MM_TOOLBOX') ?></h3>
                            <p><?php echo JTexT::_('ZO2_NAVIGATION_MM_TOOLBOX_DESC') ?></p>
                        </div>

                        <div id="zo2-admin-mm-tb">
                            <div id="zo2-admin-mm-toolitem" class="admin-toolbox">
                                <h3><?php echo JTexT::_('ZO2_NAVIGATION_MM_ITEM_CONF') ?></h3>
                                <ul>
                                    <li>
                                        <label class="hasTip" title="<?php echo JTexT::_('ZO2_NAVIGATION_MM_SUBMENU'), '::', JTexT::_('ZO2_NAVIGATION_MM_SUBMENU_DESC') ?>"><?php echo JTexT::_('ZO2_NAVIGATION_MM_SUBMENU') ?></label>
                                        <fieldset class="radio btn-group toolitem-sub">
                                            <input type="radio" id="toggleSub0" class="toolbox-toggle" data-action="toggleSub" name="toggleSub" value="0"/>
                                            <label for="toggleSub0"><?php echo JTexT::_('JNO') ?></label>
                                            <input type="radio" id="toggleSub1" class="toolbox-toggle" data-action="toggleSub" name="toggleSub" value="1" checked="checked"/>
                                            <label for="toggleSub1"><?php echo JTexT::_('JYES') ?></label>
                                        </fieldset>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <label class="hasTip" title="<?php echo JTexT::_('ZO2_NAVIGATION_MM_GROUP'), '::', JTexT::_('ZO2_NAVIGATION_MM_GROUP_DESC') ?>"><?php echo JTexT::_('ZO2_NAVIGATION_MM_GROUP') ?></label>
                                        <fieldset class="radio btn-group toolitem-group">
                                            <input type="radio" id="toggleGroup0" class="toolbox-toggle" data-action="toggleGroup" name="toggleGroup" value="0"/>
                                            <label for="toggleGroup0"><?php echo JTexT::_('JNO') ?></label>
                                            <input type="radio" id="toggleGroup1" class="toolbox-toggle" data-action="toggleGroup" name="toggleGroup" value="1" checked="checked"/>
                                            <label for="toggleGroup1"><?php echo JTexT::_('JYES') ?></label>
                                        </fieldset>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <label class="hasTip" title="<?php echo JTexT::_('ZO2_NAVIGATION_MM_POSITIONS'), '::', JTexT::_('ZO2_NAVIGATION_MM_POSITIONS_DESC') ?>"><?php echo JTexT::_('ZO2_NAVIGATION_MM_POSITIONS') ?></label>
                                        <fieldset class="btn-group">
                                            <a href="" class="btn toolitem-moveleft toolbox-action" data-action="moveItemsLeft" title="<?php echo JTexT::_('ZO2_NAVIGATION_MM_MOVE_LEFT') ?>"><i class="icon-arrow-left"></i></a>
                                            <a href="" class="btn toolitem-moveright toolbox-action" data-action="moveItemsRight" title="<?php echo JTexT::_('ZO2_NAVIGATION_MM_MOVE_RIGHT') ?>"><i class="icon-arrow-right"></i></a>
                                        </fieldset>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <label class="hasTip" title="<?php echo JTexT::_('ZO2_NAVIGATION_MM_EX_CLASS'), '::', JTexT::_('ZO2_NAVIGATION_MM_EX_CLASS_DESC') ?>"><?php echo JTexT::_('ZO2_NAVIGATION_MM_EX_CLASS') ?></label>
                                        <fieldset class="">
                                            <input type="text" class="input-medium toolitem-exclass toolbox-input" name="toolitem-exclass" data-name="class" value="" />
                                        </fieldset>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <label class="hasTip" title="<?php echo JTexT::_('ZO2_NAVIGATION_MM_ICON'), '::', JTexT::_('ZO2_NAVIGATION_MM_ICON_DESC') ?>">
                                            <a href="http://fortawesome.github.io/Font-Awesome/#icons-web-app" target="_blank"><i class="icon-search"></i><?php echo JTexT::_('ZO2_NAVIGATION_MM_ICON') ?></a>
                                        </label>
                                        <fieldset class="">
                                            <input type="text" class="input-medium toolitem-xicon toolbox-input" name="toolitem-xicon" data-name="xicon" value="" />
                                        </fieldset>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <label class="hasTip" title="<?php echo JTexT::_('ZO2_NAVIGATION_MM_CAPTION'), '::', JTexT::_('ZO2_NAVIGATION_MM_CAPTION_DESC') ?>">
                                            <?php echo JTexT::_('ZO2_NAVIGATION_MM_CAPTION') ?>
                                        </label>
                                        <fieldset class="">
                                            <input type="text" class="input-large toolitem-caption toolbox-input" name="toolitem-caption" data-name="caption" value="" />
                                        </fieldset>
                                    </li>
                                </ul>
                            </div>

                            <div id="zo2-admin-mm-toolsub" class="admin-toolbox">
                                <h3><?php echo JTexT::_('ZO2_NAVIGATION_MM_SUBMNEU_CONF') ?></h3>
                                <ul>
                                    <li>
                                        <label class="hasTip" title="<?php echo JTexT::_('ZO2_NAVIGATION_MM_SUBMNEU_GRID'), '::', JTexT::_('ZO2_NAVIGATION_MM_SUBMNEU_GRID_DESC') ?>"><?php echo JTexT::_('ZO2_NAVIGATION_MM_SUBMNEU_GRID') ?></label>
                                        <fieldset class="btn-group">
                                            <a href="" class="btn toolsub-addrow toolbox-action" data-action="addRow"><i class="icon-plus"></i></a>
                                        </fieldset>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <label class="hasTip" title="<?php echo JTexT::_('ZO2_NAVIGATION_MM_HIDE_COLLAPSE'), '::', JTexT::_('ZO2_NAVIGATION_MM_HIDE_COLLAPSE_DESC') ?>"><?php echo JTexT::_('ZO2_NAVIGATION_MM_HIDE_COLLAPSE') ?></label>
                                        <fieldset class="radio btn-group toolsub-hidewhencollapse">
                                            <input type="radio" id="togglesubHideWhenCollapse0" class="toolbox-toggle" data-action="hideWhenCollapse" name="togglesubHideWhenCollapse" value="0" checked="checked"/>
                                            <label for="togglesubHideWhenCollapse0"><?php echo JTexT::_('JNO') ?></label>
                                            <input type="radio" id="togglesubHideWhenCollapse1" class="toolbox-toggle" data-action="hideWhenCollapse" name="togglesubHideWhenCollapse" value="1"/>
                                            <label for="togglesubHideWhenCollapse1"><?php echo JTexT::_('JYES') ?></label>
                                        </fieldset>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <label class="hasTip" title="<?php echo JTexT::_('ZO2_NAVIGATION_MM_SUBMNEU_WIDTH_PX'), '::', JTexT::_('ZO2_NAVIGATION_MM_SUBMNEU_WIDTH_PX_DESC') ?>"><?php echo JTexT::_('ZO2_NAVIGATION_MM_SUBMNEU_WIDTH_PX') ?></label>
                                        <fieldset class="">
                                            <input type="text" class="toolsub-width toolbox-input input-small" name="toolsub-width" data-name="width" value="" />
                                        </fieldset>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <label class="hasTip" title="<?php echo JTexT::_('ZO2_NAVIGATION_MM_ALIGN'), '::', JTexT::_('ZO2_NAVIGATION_MM_ALIGN_DESC') ?>"><?php echo JTexT::_('ZO2_NAVIGATION_MM_ALIGN') ?></label>
                                        <fieldset class="toolsub-alignment">
                                            <div class="btn-group">
                                                <a class="btn toolsub-align-left toolbox-action" href="#" data-action="alignment" data-align="left" title="<?php echo JTexT::_('ZO2_NAVIGATION_MM_ALIGN_LEFT') ?>"><i class="icon-align-left"></i></a>
                                                <a class="btn toolsub-align-right toolbox-action" href="#" data-action="alignment" data-align="right" title="<?php echo JTexT::_('ZO2_NAVIGATION_MM_ALIGN_RIGHT') ?>"><i class="icon-align-right"></i></a>
                                                <a class="btn toolsub-align-center toolbox-action" href="#" data-action="alignment" data-align="center" title="<?php echo JTexT::_('ZO2_NAVIGATION_MM_ALIGN_CENTER') ?>"><i class="icon-align-center"></i></a>
                                                <a class="btn toolsub-align-justify toolbox-action" href="#" data-action="alignment" data-align="justify" title="<?php echo JTexT::_('ZO2_NAVIGATION_MM_ALIGN_JUSTIFY') ?>"><i class="icon-align-justify"></i></a>
                                            </div>
                                        </fieldset>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <label class="hasTip" title="<?php echo JTexT::_('ZO2_NAVIGATION_MM_EX_CLASS'), '::', JTexT::_('ZO2_NAVIGATION_MM_EX_CLASS_DESC') ?>"><?php echo JTexT::_('ZO2_NAVIGATION_MM_EX_CLASS') ?></label>
                                        <fieldset class="">
                                            <input type="text" class="toolsub-exclass toolbox-input input-medium" name="toolsub-exclass" data-name="class" value="" />
                                        </fieldset>
                                    </li>
                                </ul>
                            </div>

                            <div id="zo2-admin-mm-toolcol" class="admin-toolbox">
                                <h3><?php echo JTexT::_('ZO2_NAVIGATION_MM_COLUMN_CONF') ?></h3>
                                <ul>
                                    <li>
                                        <label class="hasTip" title="<?php echo JTexT::_('ZO2_NAVIGATION_MM_ADD_REMOVE_COLUMN'), '::', JTexT::_('ZO2_NAVIGATION_MM_ADD_REMOVE_COLUMN_DESC') ?>"><?php echo JTexT::_('ZO2_NAVIGATION_MM_ADD_REMOVE_COLUMN') ?></label>
                                        <fieldset class="btn-group">
                                            <a href="" class="btn toolcol-addcol toolbox-action" data-action="addColumn"><i class="icon-plus"></i></a>
                                            <a href="" class="btn toolcol-removecol toolbox-action" data-action="removeColumn"><i class="icon-minus"></i></a>
                                        </fieldset>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <label class="hasTip" title="<?php echo JTexT::_('ZO2_NAVIGATION_MM_HIDE_COLLAPSE'), '::', JTexT::_('ZO2_NAVIGATION_MM_HIDE_COLLAPSE_DESC') ?>"><?php echo JTexT::_('ZO2_NAVIGATION_MM_HIDE_COLLAPSE') ?></label>
                                        <fieldset class="radio btn-group toolcol-hidewhencollapse">
                                            <input type="radio" id="toggleHideWhenCollapse0" class="toolbox-toggle" data-action="hideWhenCollapse" name="toggleHideWhenCollapse" value="0" checked="checked"/>
                                            <label for="toggleHideWhenCollapse0"><?php echo JTexT::_('JNO') ?></label>
                                            <input type="radio" id="toggleHideWhenCollapse1" class="toolbox-toggle" data-action="hideWhenCollapse" name="toggleHideWhenCollapse" value="1"/>
                                            <label for="toggleHideWhenCollapse1"><?php echo JTexT::_('JYES') ?></label>
                                        </fieldset>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <label class="hasTip" title="<?php echo JTexT::_('ZO2_NAVIGATION_MM_WIDTH_SPAN'), '::', JTexT::_('ZO2_NAVIGATION_MM_WIDTH_SPAN_DESC') ?>"><?php echo JTexT::_('ZO2_NAVIGATION_MM_WIDTH_SPAN') ?></label>
                                        <fieldset class="">
                                            <select class="toolcol-width toolbox-input toolbox-select input-mini" name="toolcol-width" data-name="width">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </fieldset>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <label class="hasTip" title="<?php echo JTexT::_('ZO2_NAVIGATION_MM_MODULE'), '::', JTexT::_('ZO2_NAVIGATION_MM_MODULE_DESC') ?>"><?php echo JTexT::_('ZO2_NAVIGATION_MM_MODULE') ?></label>
                                        <fieldset class="">
                                            <select class="toolcol-module toolbox-input toolbox-select input-medium" name="toolcol-module" data-name="module_id" data-placeholder="<?php echo JTexT::_('ZO2_NAVIGATION_MM_SELECT_MODULE') ?>">
                                                <option value=""></option>
                                                <?php
                                                foreach ($modules as $module) {
                                                    echo "<option value=\"{$module->id}\">{$module->title}</option>\n";
                                                }
                                                ?>
                                            </select>
                                        </fieldset>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <label class="hasTip" title="<?php echo JTexT::_('ZO2_NAVIGATION_MM_EX_CLASS'), '::', JTexT::_('ZO2_NAVIGATION_MM_EX_CLASS_DESC') ?>"><?php echo JTexT::_('ZO2_NAVIGATION_MM_EX_CLASS') ?></label>
                                        <fieldset class="">
                                            <input type="text" class="input-medium toolcol-exclass toolbox-input" name="toolcol-exclass" data-name="class" value="" />
                                        </fieldset>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="toolbox-actions-group">
                            <button class="btn btn-success toolbox-action toolbox-saveConfig hide" data-action="saveConfig"><i class="icon-save"></i><?php echo JTexT::_('ZO2_NAVIGATION_MM_SAVE') ?></button>
                        </div>

                    </div>
                </div>

                <div id="zo2-admin-mm-container" class="navbar clearfix"></div>
                </div>
                </div>
            </div>
    </div>
</div>