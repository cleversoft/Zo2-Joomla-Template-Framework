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
JHtml::_('behavior.modal', 'a.modal');
$element_id = str_replace(']_', '_',str_replace('[', '_',substr($this->data['name'],0, -1)));
?>
<div class="control-group  <?php echo (isset($this->label['class_wrap'])) ? $this->label['class_wrap'] : ''; ?>">
    <div class="control-label">
        <label class="control-label zo2-label <?php echo (isset($this->label['class'])) ? $this->label['class'] : ''; ?>" for="<?php echo $this->data['name']; ?>">
            <?php echo $this->label['label'];?>
        </label>
        <div class="label-desc"><?php echo $this->label['description'];?></div>
    </div>
    <div class="controls">
        <div class="input-prepend input-append">
            <div class="media-preview add-on">
                <span class="hasTipPreview" title=""><i class="fa fa-eye"></i></span>
            </div>
            <input type="text" name="<?php echo $this->data['name']; ?>" id="<?php echo $element_id;?>" value="<?php echo $this->data['value']; ?>" readonly="readonly" class="input-small">
            <a class="modal btn" title="Select" href="index.php?option=com_media&view=images&tmpl=component&asset=com_templates&author=&fieldid=<?php echo $element_id;?>&folder=" rel="{handler: 'iframe', size: {x: 800, y: 500}}">
                <?php echo JText::_('ZO2_TEMPLATE_THEME_SELECT'); ?>
            </a>
            <a class="btn hasTooltip" title="" href="#" onclick="jInsertFieldValue('', '<?php echo $element_id;?>');
                                    return false;" data-original-title="Clear">
                <i class="fa fa-remove"></i>
            </a>
        </div>
    </div>
</div>
