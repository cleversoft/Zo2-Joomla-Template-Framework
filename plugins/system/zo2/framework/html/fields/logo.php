<?php
/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die;
?>
<div class="control-group">
    <label
        class="control-label zo2-label <?php echo (isset($this->label['class'])) ? $this->label['class'] : ''; ?>"
        for="<?php echo $this->data['name']; ?>"
        >
        <?php echo $this->label['label'];
        ?>
    </label>
<div class="controls">
    <div class="field-logo-container">
        <input class="logoInput" type="hidden" value="<?php echo $this->params->get('header_logo'); ?>" name="jform[params][header_logo]" id="header_logo" />
        <div class="radio btn-group logo-type-switcher">
            <button class="btn logo-type-none active btn-success"><?php echo JText::_('ZO2_ADMIN_NONE'); ?></button>
            <button class="btn logo-type-image "><?php echo JText::_('ZO2_ADMIN_IMAGE'); ?></button>
            <button class="btn logo-type-text "><?php echo JText::_('ZO2_ADMIN_TEXT'); ?></button>
        </div>
    </div>
</div>
</div>
<div class="control-group">
    <label class="control-label">Header Logo Image</label>
    <div class="logo-image ">
        <input type="hidden" class="basePath" value="/hallo142">
        <input type="hidden" class="logo-path" value="">
        <div class="btn-group">
            <a href="#" class="btn btn-primary btn-select-logo modal" rel=""><?php echo JText::_('ZO2_ADMIN_SELECT'); ?></a>
            <!--                                    <a href="#" class="btn btn-danger btn-remove-preview"><i class="icon-remove"></i></a>-->
        </div>
    </div>
</div>
<div class="control-group">
    <label class="control-label">Header Logo Width</label>
    <input type="text" class="logo-width input-mini" value="">
</div>
<div class="control-group">
    <label class="control-label">Header Logo Height</label>
    <input type="text" class="logo-height input-mini" value="">
</div>
<div class="control-group">
    <label class="control-label">Header Logo Text</label>
    <div class="logo-text ">
        <input type="text" class="logo-text-input" value="">
    </div>
</div>