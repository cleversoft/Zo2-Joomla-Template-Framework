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
defined('_JEXEC') or die('Restricted access');
?>

<div id="zo2-extends">
    <?php foreach ($form->getFieldsets('zo2') as $fieldsets => $fieldset): ?>       
        <div class="page-header">
            <h3><?php echo $fieldset->name; ?><small>Subtext for header</small></h3>
        </div>
        <?php foreach ($form->getFieldset($fieldset->name) as $field): ?>
            <?php
            // If the field is hidden, only use the input.
            if ($field->hidden):
                echo $field->input;
            else:
                ?>
                <div class="control-group">
                    <div class="control-label">
                        <?php echo $field->label; ?>
                    </div>
                    <div class="controls">
                        <?php echo $field->input ?>
                    </div>
                </div>
            <?php
            endif;
            ?>
        <?php endforeach; ?>         
    <?php endforeach; ?>
</div>