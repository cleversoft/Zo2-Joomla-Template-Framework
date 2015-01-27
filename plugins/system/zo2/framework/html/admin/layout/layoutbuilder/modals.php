<?php
/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 * 
 * @since       2.0.0
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');
?>
<!-- Settings -->
<div id="zo2-row-setting" class="modal hide fade in">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_ROW_SETTINGS'); ?></h4>
            </div>
            <!-- Body -->
            <div class="modal-body">
                <!-- Name -->
                <div class="control-group">
                    <label class="control-label" for="zo2-setting-name"><?php echo JText::_('ZO2_ADMIN_LAYOUTBUILDER_LABEL_NAME'); ?></label>
                    <div class="controls">
                        <input type="text" id="zo2-setting-name" placeholder="<?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_CUSTOM_NAME'); ?>">
                    </div>
                </div>                   
                <!-- Jdoc statements -->
                <div class="control-group">
                    <label class="control-label" for="zo2-setting-jdoc"><?php echo JText::_('ZO2_ADMIN_LAYOUTBUILDER_LABEL_JDOC'); ?></label>
                    <div class="controls">
                        <!-- http://docs.joomla.org/Jdoc_statements -->
                        <select id="zo2-setting-jdoc" onchange="zo2.layoutbuilder.onJdocChange(this);">             
                            <option value="none"><?php echo JText::_('ZO2_ADMIN_LAYOUTBUILDER_SETTINGS_JDOC_NONE'); ?></option>
                            <optgroup label="Joomla! Document">
                                <option value="component"><?php echo JText::_('ZO2_ADMIN_LAYOUTBUILDER_SETTINGS_JDOC_COMPONENT'); ?></option>
                                <option value="messsge"><?php echo JText::_('ZO2_ADMIN_LAYOUTBUILDER_SETTINGS_JDOC_MESSAGE'); ?></option>
                                <option value="modules"><?php echo JText::_('ZO2_ADMIN_LAYOUTBUILDER_SETTINGS_JDOC_MODULES'); ?></option>                                
                                <option value="module"><?php echo JText::_('ZO2_ADMIN_LAYOUTBUILDER_SETTINGS_JDOC_MODULE'); ?></option>
                            </optgroup>
                            <!-- These are extended for 3rd parties -->
                            <optgroup label="Zo2">
                                <?php $zo2DocStatements = Zo2HelperLayoutbuilder::getZo2Statements(); ?>
                                <?php foreach ($zo2DocStatements as $key => $value) : ?>
                                    <option value="<?php echo $key; ?>"><?php echo JText::_($value); ?></option>
                                <?php endforeach; ?>
                            </optgroup>                            
                        </select>
                    </div>
                </div>

                <!--
                @todo Fix this hard code
                JDoc position
                -->
                <div class="control-group">
                    <label class="control-label" for="zo2-setting-position">Position</label>
                    <div class="controls">
                        <select id="zo2-setting-position" aria-invalid="false">                                    
                            <option value="component">Component</option>
                            <option value="message">Message</option>
                            <option value="mega_menu">Mega Menu</option>
                            <option value="canvas-menu">canvas-menu</option>
                            <option value="feature">feature</option>
                            <option value="footer-copyright">footer-copyright</option>
                            <option value="header-logo">header-logo</option>
                            <option value="mega-menu">mega-menu</option>
                            <option value="news">news</option>
                            <option value="position-0">position-0</option>
                            <option value="position-1">position-1</option>
                            <option value="position-2">position-2</option>
                            <option value="position-3">position-3</option>
                            <option value="position-4">position-4</option>
                            <option value="position-7">position-7</option>
                            <option value="position-8">position-8</option>
                            <option value="position-9">position-9</option>
                            <option value="position-10">position-10</option>
                            <option value="position-11">position-11</option>
                            <option value="slide">slide</option>
                            <option value="search">search</option>
                            <option value="syndicateload">syndicateload</option>
                            <option value="bottom1">bottom1</option>
                            <option value="top-menu">top-menu</option>
                            <option value="top-social">top-social</option>
                            <option value="bottom2">bottom2</option>
                            <option value="bottom3">bottom3</option>
                            <option value="bottom4">bottom4</option>
                            <option value="videomenu">videomenu</option>
                            <option value="left">left</option>
                            <option value="right">right</option>
                            <option value="demo1">demo1</option>
                            <option value="demo2">demo2</option>
                            <option value="demo3">demo3</option>
                            <option value="custom4">custom4</option>
                            <option value="breadcrumb">breadcrumb</option>
                        </select>
                    </div>
                </div>
                <!-- Styles -->
                <div class="control-group">
                    <label class="control-label" for="zo2-setting-style"><?php echo JText::_('ZO2_ADMIN_STYLEEDIT_STYLE'); ?></label>
                    <div class="controls">
                        <select id="zo2-setting-style">
                            <?php $styles = Zo2HelperLayoutbuilder::getModuleStyles(); ?>
                            <?php foreach ($styles as $key => $value) : ?>
                                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="zo2-setting-offset"><?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_OFFSET'); ?></label>
                    <div class="controls">
                        <select id="zo2-setting-offset">
                            <?php foreach (Zo2HelperLayoutbuilder::getOffsets() as $key => $value) : ?>
                                <option value="<?php echo $key; ?>"><?php echo JText::_($value) . ' ' . $key ?></option>
                            <?php endforeach; ?>                           
                        </select>
                    </div>
                </div>
                <!-- Custom css -->
                <div class="control-group">
                    <label class="control-label" for="zo2-setting-css"><?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_CUSTOM_CSS'); ?></label>
                    <div class="controls">
                        <input type="text" id="zo2-setting-css" placeholder="<?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_CUSTOM_ROWCSS'); ?>">
                    </div>
                </div>
                <div id="column-responsive">
                    <div class="control-group">
                        <div class="control-label">
                            <label><?php echo JText::_('ZO2_ADMIN_ENABLE_RESPONSIVE_MOBILE'); ?></label>
                        </div>
                        <div class="controls">
                            <fieldset class="radio btn-group" id="zo2-enable-responsive-mobile">
                                <input type="radio" checked="checked" value="0" name="zo2[enable-responsive-mobile]" id="zo2-enable-responsive-mobile0">
                                <label for="zo2-enable-responsive-mobile0" class="btn">No</label>
                                <input type="radio" value="1" name="zo2[enable-responsive-mobile]" id="zo2-enable-responsive-mobile1">
                                <label for="zo2-enable-responsive-mobile1" class="btn">Yes</label>
                            </fieldset>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label><?php echo JText::_('ZO2_ADMIN_ENABLE_RESPONSIVE_TABLET'); ?></label>
                        </div>
                        <div class="controls">
                            <fieldset class="radio btn-group" id="zo2-enable-responsive-tablet">
                                <input type="radio" checked="checked" value="0" name="zo2[enable-responsive-tablet]" id="zo2-enable-responsive-tablet0">
                                <label for="zo2-enable-responsive-tablet0" class="btn">No</label>
                                <input type="radio" value="1" name="zo2[enable-responsive-tablet]" id="zo2-enable-responsive-tablet1">
                                <label for="zo2-enable-responsive-tablet1" class="btn">Yes</label>
                            </fieldset>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label><?php echo JText::_('ZO2_ADMIN_ENABLE_RESPONSIVE_DESTOP'); ?></label>
                        </div>
                        <div class="controls">
                            <fieldset class="radio btn-group" id="zo2-enable-responsive-desktop">
                                <input type="radio" checked="checked" value="0" name="zo2[enable-responsive-desktop]" id="zo2-enable-responsive-desktop0">
                                <label for="zo2-enable-responsive-desktop0" class="btn">No</label>
                                <input type="radio" value="1" name="zo2[enable-responsive-desktop]" id="zo2-enable-responsive-desktop1">
                                <label for="zo2-enable-responsive-desktop1" class="btn">Yes</label>
                            </fieldset>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label><?php echo JText::_('ZO2_ADMIN_ENABLE_RESPONSIVE_LARGEDESTOP'); ?></label>
                        </div>
                        <div class="controls">
                            <fieldset class="radio btn-group" id="zo2-enable-responsive-largedesktop">
                                <input type="radio" checked="checked" value="0" name="zo2[enable-responsive-largedesktop]" id="zo2-enable-responsive-largedesktop0">
                                <label for="zo2-enable-responsive-largedesktop0" class="btn">No</label>
                                <input type="radio" value="1" name="zo2[enable-responsive-largedesktop]" id="zo2-enable-responsive-largedesktop1">
                                <label for="zo2-enable-responsive-largedesktop1" class="btn">Yes</label>
                            </fieldset>
                        </div>
                    </div>

                </div>
                <!-- end -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" onclick="zo2.layoutbuilder.saveSetting();" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Delete confirm -->
<div class="modal fade" id="zo2-delete-confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo(JText::_('ZO2_ADMIN_LAYOUTBUILDER_MODAL_DELETE_CONFIRM_TITLE')); ?></h4>
            </div>
            <div class="modal-body">
                <p><?php echo(JText::_('ZO2_ADMIN_LAYOUTBUILDER_MODAL_DELETE_CONFIRM_CONTENT')); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="zo2.layoutbuilder.deleteRow();"><?php echo(JText::_('ZO2_ADMIN_LAYOUTBUILDER_MODAL_DELETE_CONFIRM_CONFIRM')); ?></button>
                <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo(JText::_('ZO2_ADMIN_LAYOUTBUILDER_MODAL_DELETE_CONFIRM_CANCEL')); ?></button>
            </div>
        </div>
    </div>
</div>