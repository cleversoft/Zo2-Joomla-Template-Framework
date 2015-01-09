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
echo Zo2Assets::getInstance()->render();
?>

<div id="zo2-framework">
    <div class="tabbable tabs-left">
        <!-- Tab headers -->
        <ul id="zo2-tab" class="nav nav-tabs" role="tablist">
            <?php $index = 0; ?>
            <?php foreach ($form->getFieldsets('zo2') as $fieldsets => $fieldset): ?>           
                <li role="presentation" class="<?php echo $index == 0 ? 'active' : ''; ?>">
                    <a href="#<?php echo Zo2HelperString::getAlias($fieldset->name); ?>" 
                       id="<?php echo Zo2HelperString::getAlias($fieldset->name); ?>-tab" 
                       role="tab" 
                       data-toggle="tab" 
                       aria-controls="home" 
                       aria-expanded="true">
                           <?php echo JText::_($fieldset->name); ?>
                    </a>
                </li>
                <?php $index++; ?>
            <?php endforeach; ?>
        </ul>
        <!-- Tab contents -->
        <div id="zo2-tab-content" class="tab-content">
            <?php $index = 0; ?>
            <?php foreach ($form->getFieldsets('zo2') as $fieldsets => $fieldset): ?>
                <div role="tabpanel" class="tab-pane <?php echo $index == 0 ? 'active' : ''; ?>" id="<?php echo Zo2HelperString::getAlias($fieldset->name); ?>" aria-labelledby="home-tab">
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
                        <?php $index++; ?>
                    <?php endforeach; ?>         
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <input type="hidden" name="zo2_task" value="template.save" />
    <input type="hidden" name="zo2_scope" value="admin" />
</div>