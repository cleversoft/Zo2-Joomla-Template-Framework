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
$fields = $this->form->getFieldset('fonts');
?>
<div id="font_chooser">
<?php foreach ($fields as $field) : ?>
    <?php if ($field instanceof JFormFieldFont) : ?>
    <?php echo $field->input?>
    <?php else : ?>
    <div class="font-container">
        <div class="control-group font-deck-code" style="margin-top:20px">
            <div class="control-label">
                <div class="font-label"><?php echo $field->label; ?></div>
                <div class="font-desc"><?php echo $field->description?></div>
            </div>
            <div class="controls">
                <?php echo $field->input; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
<?php endforeach;?>
</div>