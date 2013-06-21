<?php /* @var $this JFormFieldLayout */ ?>
<input type="hidden" name="<?php echo $this->name?>" id="<?php echo $this->id?>" value="<?php echo $this->value?>" />
<input type="hidden" id="hdLayoutBuilder" value="0" />

<div id="layoutbuilder-container">
    <div class="components-container" id="components-container"></div>
    <div id="droppable-container">
        <iframe id="layoutframe"></iframe>

        <div id="layoutbuilder-droppable">
            <div class="relative"></div>
        </div>
    </div>
</div>

<script id="jsTemplate" type="text/template">
<?php echo $layout->compile(true, true) ?>
</script>
<input type="hidden" id="jQueryPath" value="<?php echo Zo2Framework::getSystemPluginPath() . '/vendor/jquery/jquery-1.9.1.min.js'?>" />
<input type="hidden" id="jQueryUIPath" value="<?php echo Zo2Framework::getSystemPluginPath() . '/vendor/jqueryui/js/jquery-ui-1.10.3.custom.min.js'?>" />