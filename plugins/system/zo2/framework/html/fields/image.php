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
    <div class="control-label">
        <label class="control-label zo2-label <?php echo (isset($this->label['class'])) ? $this->label['class'] : ''; ?>" for="<?php echo $this->data['name']; ?>">
            <?php echo $this->label['label'];?>
        </label>
    </div>
    <div class="controls">
        <div class="input-prepend input-append">
            <input type="text" name="<?php echo $this->data['name']; ?>" id="<?php echo $this->data['name']; ?>" value="<?php echo $this->data['value'];?>" readonly="readonly" class="input-small">
            <a class="modal btn" title="Select" href="index.php?option=com_media&view=images&tmpl=component&asset=com_templates&author=&fieldid=zo2_background_image&folder=" rel="{handler: 'iframe', size: {x: 800, y: 500}}">
                <?php echo JText::_('ZO2_TEMPLATE_THEME_SELECT'); ?>
            </a>
            <a class="btn hasTooltip" title="" href="#" onclick="jInsertFieldValue('', '<?php echo $this->data['name']; ?>');return false;" data-original-title="Clear">
                <i class="icon-remove"></i>
            </a>
        </div>
    </div>
</div>