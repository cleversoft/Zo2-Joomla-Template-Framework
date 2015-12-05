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
if (empty($this->data['value']) && (isset($this->data['default'])))
    $this->data['value'] = $this->data['default'];
?>
<div class="control-group">
    <div class="control-label">
        <label class="zo2-label <?php echo (isset($this->label['class'])) ? $this->label['class'] : ''; ?>" for="<?php echo $this->data['name']; ?>">
            <?php echo $this->label['label']; ?>
        </label>
        <div class="label-desc"><?php echo $this->label['description']; ?></div>
    </div>
    <div class="controls">
        <input 
            type="text"
            id="<?php echo $this->data['name']; ?>"        
            <?php foreach ($this->data as $key => $value) : ?>
                <?php if (!empty($value)) : ?>
                    <?php echo $key . '="' . $value . '"'; ?>
                <?php endif; ?>
            <?php endforeach; ?>
            />
    </div>
</div>