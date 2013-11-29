<?php
/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */
defined('_JEXEC') or die ('Restricted access');
/* @var $this JFormFieldLayout */
?>
<div id="layoutbuilder-container">
    <input type="text" value="<?php echo htmlspecialchars($this->value)?>" style="display: none" class="hfLayoutHtml" name="<?php echo $this->name?>" id="<?php echo $this->id?>" />
    <input type="hidden" id="hfTemplateName" value="<?php echo Zo2Framework::getTemplateName()?>" />
    <input type="hidden" id="hdLayoutBuilder" value="0" />
    <input type="hidden" id="hfLayoutName" value="homepage" />
    <div id="droppable-container">
        <div class="zo2-container">
            <?php $this->renderLayout($layoutData)?>
        </div>
    </div>

    <div id="rowSettingsModal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3>Row settings</h3>
            <ul class="zo2-tabs">
                <li><a class="active" href="#row-basic" data-toggle="tab">Basic</a></li>
                <li><a href="#row-responsive" data-toggle="tab">Responsive</a></li>
            </ul>
        </div>
        <div class="modal-body">
            <div class="form-horizontal">
                <div class="zo2-tabs-content">
                    <div class="active" id="row-basic">
                        <div class="control-group">
                            <label class="control-label" for="txtRowName">Name</label>
                            <div class="controls">
                                <input type="text" id="txtRowName" placeholder="Row's name">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="txtRowId">ID</label>
                            <div class="controls">
                                <input type="text" id="txtRowId" placeholder="Row's ID">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="txtRowCss">Custom CSS class</label>
                            <div class="controls">
                                <input type="text" id="txtRowCss" placeholder="Row's custom CSS class">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="control-label">
                                <div class="control-label">Full Width</div>
                            </div>
                            <div class="controls btn-group btn-group-onoff" id="btgFullWidth">
                                <button class="btn btn-on">On</button>
                                <button class="btn btn-off">Off</button>
                            </div>
                        </div>
                    </div>
                    <div id="row-responsive">
                        <div class="control-group">
                            <!--
                            <span class="switch_title">Phone</span>
                            <label class="switch_wrap" for="cbRowPhoneVisibility">
                                <input id="cbRowPhoneVisibility" type="checkbox" value="1" />
                                <div class="switch"><span class="bullet"></span></div>
                            </label>
                            -->
                            <div class="control-label">
                                <div class="control-label">Phone</div>
                            </div>
                            <div class="controls btn-group btn-group-onoff" id="btgRowPhone">
                                <button class="btn btn-on">On</button>
                                <button class="btn btn-off">Off</button>
                            </div>
                        </div>
                        <div class="control-group">
                            <!--
                            <span class="switch_title">Tablet</span>
                            <label class="switch_wrap" for="cbRowTabletVisibility">
                                <input id="cbRowTabletVisibility" type="checkbox" value="1" />
                                <div class="switch"><span class="bullet"></span></div>
                            </label>
                            -->
                            <div class="control-label">
                                <div class="control-label">Tablet</div>
                            </div>
                            <div class="controls btn-group btn-group-onoff" id="btgRowTablet">
                                <button class="btn btn-on">On</button>
                                <button class="btn btn-off">Off</button>
                            </div>
                        </div>
                        <div class="control-group">
                            <!--
                            <span class="switch_title">Desktop</span>
                            <label class="switch_wrap" for="cbRowDesktopVisibility">
                                <input id="cbRowDesktopVisibility" type="checkbox" value="1" />
                                <div class="switch"><span class="bullet"></span></div>
                            </label>
                            -->

                            <div class="control-label">
                                <div class="control-label">Desktop</div>
                            </div>
                            <div class="controls btn-group btn-group-onoff" id="btgRowDesktop">
                                <button class="btn btn-on">On</button>
                                <button class="btn btn-off">Off</button>
                            </div>
                        </div>
                        <div class="control-group">
                            <!--
                            <span class="switch_title">Large desktop</span>
                            <label class="switch_wrap" for="cbRowLargeDesktopVisibility">
                                <input id="cbRowLargeDesktopVisibility" type="checkbox" value="1" />
                                <div class="switch"><span class="bullet"></span></div>
                            </label>
                            -->

                            <div class="control-label">
                                <div class="control-label">Large desktop</div>
                            </div>
                            <div class="controls btn-group btn-group-onoff" id="btgRowLargeDesktop">
                                <button class="btn btn-on">On</button>
                                <button class="btn btn-off">Off</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn btn-primary" id="btnSaveRowSettings">Save changes</button>
        </div>
    </div>

    <div id="colSettingsModal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3>Column settings</h3>
            <ul class="zo2-tabs">
                <li><a class="active" href="#column-basic" data-toggle="tab">Basic</a></li>
                <li><a href="#column-responsive" data-toggle="tab">Responsive</a></li>
            </ul>
        </div>
        <div class="modal-body">
            <div class="form-horizontal">
                <div class="zo2-tabs-content">
                    <div class="active" id="column-basic">
                        <!-- begin -->
                        <div class="control-group">
                            <label class="control-label" for="dlColType">Position</label>
                            <div class="controls">
                                <select id="dlColPosition">
                                    <option value="">(none)</option>
                                    <option value="component">Component</option>
                                    <option value="message">Message</option>
                                    <option value="mega_menu">Mega Menu</option>
                                    <?php foreach($positions as $pos) : ?>
                                    <option value="<?php echo $pos?>"><?php echo $pos?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="dlColWidth">Width</label>
                            <div class="controls">
                                <select id="dlColWidth">
                                    <option value="1">span1</option>
                                    <option value="2">span2</option>
                                    <option value="3">span3</option>
                                    <option value="4">span4</option>
                                    <option value="5">span5</option>
                                    <option value="6">span6</option>
                                    <option value="7">span7</option>
                                    <option value="8">span8</option>
                                    <option value="9">span9</option>
                                    <option value="10">span10</option>
                                    <option value="11">span11</option>
                                    <option value="12">span12</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="ddlColOffset">Offset</label>
                            <div class="controls">
                                <select id="ddlColOffset">
                                    <option value="0">No offset</option>
                                    <option value="1">offset1</option>
                                    <option value="2">offset2</option>
                                    <option value="3">offset3</option>
                                    <option value="4">offset4</option>
                                    <option value="5">offset5</option>
                                    <option value="6">offset6</option>
                                    <option value="7">offset7</option>
                                    <option value="8">offset8</option>
                                    <option value="9">offset9</option>
                                    <option value="10">offset10</option>
                                    <option value="11">offset11</option>
                                    <option value="12">offset12</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="ddlColStyle">Style</label>
                            <div class="controls">
                                <select id="ddlColStyle">
                                    <option value="none">None</option>
                                    <?php foreach($customStyles as $cs) : ?>
                                        <option value="<?php echo $cs?>"><?php echo $cs?></option>
                                    <?php endforeach; ?>
                                    <option value="rounded">rounded</option>
                                    <option value="table">table</option>
                                    <option value="horz">horz</option>
                                    <option value="xhtml">xhtml</option>
                                    <option value="outline">outline</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="txtColId">ID</label>
                            <div class="controls">
                                <input type="text" id="txtColId" placeholder="Column's ID">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="txtColCss">Custom CSS class</label>
                            <div class="controls">
                                <input type="text" id="txtColCss" placeholder="Column's custom CSS class">
                            </div>
                        </div>
                        <!-- end -->
                    </div>
                    <div id="column-responsive">
                        <div class="control-group">
                            <!--
                            <span class="switch_title">Phone</span>
                            <label class="switch_wrap" for="cbColumnPhoneVisibility">
                                <input id="cbColumnPhoneVisibility" type="checkbox" value="1" />
                                <div class="switch"><span class="bullet"></span></div>
                            </label>
                            -->
                            <div class="control-label">
                                <div class="control-label">Phone</div>
                            </div>
                            <div class="controls btn-group btn-group-onoff" id="btgColPhone">
                                <button class="btn btn-on">On</button>
                                <button class="btn btn-off">Off</button>
                            </div>
                        </div>
                        <div class="control-group">
                            <!--
                            <span class="switch_title">Tablet</span>
                            <label class="switch_wrap" for="cbColumnTabletVisibility">
                                <input id="cbColumnTabletVisibility" type="checkbox" value="1" />
                                <div class="switch"><span class="bullet"></span></div>
                            </label>
                            -->
                            <div class="control-label">
                                <div class="control-label">Tablet</div>
                            </div>
                            <div class="controls btn-group btn-group-onoff" id="btgColTablet">
                                <button class="btn btn-on">On</button>
                                <button class="btn btn-off">Off</button>
                            </div>
                        </div>
                        <div class="control-group">
                            <!--
                            <span class="switch_title">Desktop</span>
                            <label class="switch_wrap" for="cbColumnDesktopVisibility">
                                <input id="cbColumnDesktopVisibility" type="checkbox" value="1" />
                                <div class="switch"><span class="bullet"></span></div>
                            </label>
                            -->
                            <div class="control-label">
                                <div class="control-label">Desktop</div>
                            </div>
                            <div class="controls btn-group btn-group-onoff" id="btgColDesktop">
                                <button class="btn btn-on">On</button>
                                <button class="btn btn-off">Off</button>
                            </div>
                        </div>
                        <div class="control-group">
                            <!--
                            <span class="switch_title">Large desktop</span>
                            <label class="switch_wrap" for="cbColumnLargeDesktopVisibility">
                                <input id="cbColumnLargeDesktopVisibility" type="checkbox" value="1" />
                                <div class="switch"><span class="bullet"></span></div>
                            </label>
                            -->
                            <div class="control-label">
                                <div class="control-label">Large desktop</div>
                            </div>
                            <div class="controls btn-group btn-group-onoff" id="btgColLargeDesktop">
                                <button class="btn btn-on">On</button>
                                <button class="btn btn-off">Off</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button id="btnSaveColSettings" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</div>

<input type="hidden" id="jQueryPath" value="<?php echo Zo2Framework::getSystemPluginPath() . '/vendor/jquery/jquery-1.9.1.min.js'?>" />
<input type="hidden" id="jQueryUIPath" value="<?php echo Zo2Framework::getSystemPluginPath() . '/vendor/jqueryui/js/jquery-ui-1.10.3.custom.min.js'?>" />