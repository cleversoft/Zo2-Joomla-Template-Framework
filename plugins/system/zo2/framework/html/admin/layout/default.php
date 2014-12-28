<?php echo Zo2Assets::getInstance()->render(); ?>
<div id="zo2-framework">
    <div class="tabbable tabs-left">
        <ul id="zo2-tab" class="nav nav-tabs" role="tablist">
            <?php $index = 0; ?>
            <?php foreach ($form->getFieldsets('zo2') as $fieldsets => $fieldset): ?>           
                <li role="presentation" class="<?php echo $index == 0 ? 'active' : ''; ?>">
                    <a href="#<?php echo $fieldset->name; ?>" 
                       id="<?php echo $fieldset->name; ?>-tab" 
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
        <div id="zo2-tab-content" class="tab-content">
            <?php foreach ($form->getFieldsets('zo2') as $fieldsets => $fieldset): ?>
                <div role="tabpanel" class="tab-pane fade in" id="<?php echo $fieldset->name; ?>" aria-labelledby="home-tab">
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
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>