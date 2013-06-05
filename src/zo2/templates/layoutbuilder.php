<?php /* @var $this JFormFieldLayout */ ?>
<input type="hidden" name="<?php echo $this->name?>" id="<?php echo $this->id?>" value="<?php echo $this->value?>" />
<input type="hidden" id="hdLayoutBuilder" value="0" />

<div id="layoutbuilder-container">
    <div class="draggable-container">
        <div class="draggable-item"></div>
    </div>
    <div id="droppable-container">
        <iframe id="layoutframe" src="<?php echo Zo2Framework::getSystemPluginPath() . '/layoutiframe.php'?>"></iframe>
        <div id="layoutbuilder-droppable">
            <div class="relative"></div>
        </div>
    </div>
</div>