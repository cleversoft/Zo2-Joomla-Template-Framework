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
        <label
            class="control-label zo2-label <?php echo (isset($this->label['class'])) ? $this->label['class'] : ''; ?>"
            for="<?php echo $this->data['name']; ?>"
            >
            <?php echo $this->label['label'];
            ?>
        </label>
        <div class="label-desc"><?php echo $this->label['description']; ?></div>
    </div>
    <div class="controls">
        <div class="colorpicker-container">
            <input id="<?php echo $this->data['id'] ?>" name="<?php echo $this->data['name'] ?>" type="text" class="<?php echo $this->data['class'] ?>" value="<?php echo $this->data['value'] ?>">
            <span id="<?php echo $this->data['id'] ?>_preview" class="color-preview" style="background-color: <?php echo empty($this->data['value']) ? 'transparent' : $this->data['value'] ?>"></span>
        </div>
    </div>
</div>