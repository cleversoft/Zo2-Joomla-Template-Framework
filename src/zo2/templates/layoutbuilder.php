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
                                    <input type="text" id="inputClass">
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
        <iframe id="layoutframe"></iframe>

        <div id="layoutbuilder-droppable">
            <div class="relative">
                <div id="layoutbuilder-toolbar">
                    <a href="#" class="icon duplicate"></a>
                    <a href="#" class="icon settings"></a>
                    <a href="#" class="icon delete"></a>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="jQueryPath" value="<?php echo Zo2Framework::getSystemPluginPath() . '/vendor/jquery/jquery-1.9.1.min.js'?>" />
<input type="hidden" id="jQueryUIPath" value="<?php echo Zo2Framework::getSystemPluginPath() . '/vendor/jqueryui/js/jquery-ui-1.10.3.custom.min.js'?>" />