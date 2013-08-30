<?php /* @var $this JFormFieldLayout */ ?>
<textarea style="display: none" class="hfLayoutHtml" name="<?php echo $this->name?>" id="<?php echo $this->id?>"></textarea>
<input type="hidden" id="hfTemplateName" value="<?php echo Zo2Framework::getTemplateName()?>" />
<input type="hidden" id="hdLayoutBuilder" value="0" />
<input type="hidden" id="hfLayoutName" value="homepage" />
<div id="layoutbuilder-container">
    <div id="leftSidebar">
        <div>
            <button id="btSaveLayout" class="btn btn-success btn-large">Save layout</button>
        </div>
        <div id="workspace-tabs">
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#components-container" data-toggle="tab">Components</a></li>
                    <li><a href="#attributes-container" data-toggle="tab">Attributes</a></li>
                    <li><a href="#layouts-container" data-toggle="tab">Layouts</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="components-container">
                    </div>
                    <div class="tab-pane" id="attributes-container">
                        <div id="fixed-attributes">
                            <div class="control-group">
                                <label class="control-label" for="inputClass">Class</label>
                                <div class="controls">
                                    <input type="text" id="inputClass" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputId">ID</label>
                                <div class="controls">
                                    <input type="text" id="inputId">
                                </div>
                            </div>
                        </div>
                        <div id="dynamic-attributes">

                        </div>
                    </div>
                    <div class="tab-pane" id="layouts-container">
                        <select id="selectLayouts">
                        </select>
                        <button id="btLoadLayout" class="btn btn-info btn-large">Load layout</button>
                        <button id="btDuplicateLayout" class="btn btn-success btn-large" style="margin-left: 10px">Duplicate layout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="droppable-container">
        <div class="container-fluid">

        </div>
    </div>

    <div id="rowSettingsModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Row settings</h3>
        </div>
        <div class="modal-body">
            <div class="form-horizontal">
                <div class="control-group">
                    <label class="control-label" for="txtRowName">Name</label>
                    <div class="controls">
                        <input type="text" id="txtRowName" placeholder="Row's name">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="txtRowCss">Custom CSS class</label>
                    <div class="controls">
                        <input type="text" id="txtRowCss" placeholder="Row's custom CSS class">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn btn-primary" id="btnSaveRowSettings">Save changes</button>
        </div>
    </div>

    <div id="colSettingsModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Column settings</h3>
        </div>
        <div class="modal-body">
            <div class="form-horizontal">
                <div class="control-group">
                    <label class="control-label" for="dlColType">Position</label>
                    <div class="controls">
                        <select id="dlColPosition">
                            <option value="">(none)</option>
                            <option value="component">Component</option>
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
                    <label class="control-label" for="txtRowCss">Custom CSS class</label>
                    <div class="controls">
                        <input type="text" id="txtColCss" placeholder="Column's custom CSS class">
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