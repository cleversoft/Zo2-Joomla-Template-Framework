<?php /* @var $this JFormFieldLayout */ ?>
<input type="hidden" name="<?php echo $this->name?>" id="<?php echo $this->id?>" value="<?php echo $this->value?>" />
<input type="hidden" id="hdLayoutBuilder" value="0" />

<div id="layoutbuilder-container">
    <div class="components-container"></div>
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