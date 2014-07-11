<?php $row = new JRegistry($row); ?>
<div class="zo2-row sortable-row" 
     data-zo2-type="row" 
     data-zo2-customClass="<?php echo $row->get('customClass'); ?>"
     data-zo2-id="<?php echo $row->get('id'); ?>"
     data-zo2-visibility-xs="<?php echo $row->get('visibility')->xs ? 1 : 0 ?>"
     data-zo2-visibility-sm="<?php echo $row->get('visibility')->sm ? 1 : 0 ?>"
     data-zo2-visibility-md="<?php echo $row->get('visibility')->md ? 1 : 0 ?>"
     data-zo2-visibility-lg="<?php echo $row->get('visibility')->lg ? 1 : 0 ?>"
     data-zo2-fullwidth="<?php echo $row->get('fullwidth') ? 1 : 0 ?>"
     >
    <div class="col-md-12 row-control">
        <div class="row-control-container">
            <div class="row-name"><?php echo $row->get('name'); ?></div>
            <div class="row-control-buttons">
                <i title="<?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_DRAGROW'); ?>" class="icon-move row-control-icon dragger hasTooltip"></i>
                <i title="<?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_ROW_SETTINGS'); ?>" class="icon-cogs row-control-icon settings hasTooltip"></i>
                <i title="<?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_DUPLICATEROW'); ?>" class="row-control-icon duplicate icon-align-justify hasTooltip"></i>
                <i title="<?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_SPLIT'); ?>" class="row-control-icon split icon-columns hasTooltip"></i>
                <i title="<?php echo JText::_('ZO2_ADMIN_FORMFIELD_LAYOUT_REMOVEROW'); ?>" class="row-control-icon delete icon-remove hasTooltip"></i>
            </div>
        </div>

        <div class="col-container">
            <?php foreach ($row->get('children') as $column) { ?>            
                <?php require 'formfield.layout.column.php'; ?>
            <?php } ?>            
        </div>
    </div>
</div>