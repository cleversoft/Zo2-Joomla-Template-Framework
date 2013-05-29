<?php /* @var $this JFormFieldLayout */ ?>
<input type="hidden" name="<?php echo $this->name?>" id="<?php echo $this->id?>" value="<?php echo $this->value?>" />
<input type="hidden" id="hdLayoutBuilder" value="0" />

<iframe src="<?php echo Zo2Framework::getSystemPluginPath() . '/layoutiframe.php'?>"></iframe>