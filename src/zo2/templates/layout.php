<?php /* @var $this JFormFieldLayout */ ?>
<textarea style="display: none" class="hfLayoutHtml" name="<?php echo $this->name?>" id="<?php echo $this->id?>"></textarea>
<input type="hidden" id="hfTemplateName" value="<?php echo Zo2Framework::getTemplateName()?>" />
<input type="hidden" id="hdLayoutBuilder" value="0" />
<input type="hidden" id="hfLayoutName" value="homepage" />
<div id="layoutbuilder-container">
    <div id="top-controls" class="container-fluid">
        <select id="selectLayouts">
            <option value="homepage">homepage</option>
        </select>
        <button id="btLoadLayout" class="btn btn-info">Load layout</button>
        <button id="btSaveLayout" class="btn btn-success">Save layout</button>
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
                <div class="control-group">
                    <label class="control-label" for="ddlRowLayout">Row layout</label>
                    <div class="controls">
                        <select id="ddlRowLayout">
                            <option value="fixed">Fixed</option>
                            <option value="fluid">Fluid</option>
                        </select>
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
                            <option value="rounded">rounded</option>
                            <option value="table">table</option>
                            <option value="horz">horz</option>
                            <option value="xhtml">xhtml</option>
                            <option value="outline">outline</option>
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