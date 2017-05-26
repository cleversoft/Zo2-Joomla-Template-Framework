<?php
/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @link        http://www.zootemplate.com/zo2
 * @author      ZooTemplate <http://www.zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die;
if (empty($this->data['value']) && (isset($this->data['default'])))
    $this->data['value'] = $this->data['default'];
?>
<?php

if (empty($this->data['value']))
    $this->data['value'] = 1;
?>
 <div class="control-group">
    <label class="checkbox" for="<?php echo $this->data['id']; ?>">
        <input type="checkbox" value="" id="<?php echo $this->data['id']; ?>">
        <?php echo $this->label['label']; ?>
    </label>
    <div class="help-desc"><?php echo $this->label['description']; ?></div>
</div>
