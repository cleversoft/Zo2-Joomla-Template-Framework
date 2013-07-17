<?php /* @var $this JFormFieldLayout */ ?>
<textarea style="display: none" class="hfLayoutHtml" name="<?php echo $this->name?>" id="<?php echo $this->id?>"></textarea>
<input type="hidden" id="hfLayoutName" value="<?php echo Zo2Framework::getTemplateName()?>" />
<input type="hidden" id="hdLayoutBuilder" value="0" />
<div id="layoutbuilder-container">
    <button id="btSaveLayout" class="btn btn-success btn-large">Save layout</button>
    <div id="workspace-tabs">
        <ul>
            <li><a href="#components-container">Components List</a></li>
            <li><a href="#attributes-container">Attributes</a></li>
        </ul>
        <div class="components-container form-horizontal" id="components-container">
        </div>
        <div id="attributes-container">
            <div id="fixed-attributes">
                <div class="control-group">
                    <label class="control-label" for="inputClass">Class</label>
                    <div class="controls">
                        <input type="text" id="inputClass">
                    </div>
                </div>
            </div>
            <div id="dynamic-attributes">

            </div>
        </div>
    </div>
    <div id="droppable-container">
        <iframe id="layoutframe"></iframe>

        <div id="layoutbuilder-droppable">
            <div class="relative">
                <div id="layoutbuilder-toolbar">
                    <a href="#" class="icon settings"></a>
                    <a href="#" class="icon delete"></a>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="jQueryPath" value="<?php echo Zo2Framework::getSystemPluginPath() . '/vendor/jquery/jquery-1.9.1.min.js'?>" />
<input type="hidden" id="jQueryUIPath" value="<?php echo Zo2Framework::getSystemPluginPath() . '/vendor/jqueryui/js/jquery-ui-1.10.3.custom.min.js'?>" />