<?php $row = new JRegistry($row); ?>
<div class="zo2-row sortable-row"
     data-zo2-type="row"
     data-zo2-customClass="<?php echo $row->get('customClass'); ?>"
     data-zo2-id="<?php echo $row->get('id'); ?>"
     data-zo2-visibility-xs="<?php echo $row->get('visibility')->xs ? 1 : 0 ?>"
     data-zo2-visibility-sm="<?php echo $row->get('visibility')->sm ? 1 : 0 ?>"
     data-zo2-visibility-md="<?php echo $row->get('visibility')->md ? 1 : 0 ?>"
     data-zo2-visibility-lg="<?php echo $row->get('visibility')->lg ? 1 : 0 ?>"
     data-zo2-fluidwidth="<?php echo $row->get('fluidwidth') ? 1 : 0 ?>"
     >
    <div class="col-md-12 row-control">
        <div class="row-control-container">
            <div class="row-control-buttons row-name">
        	    <i title="<?php echo JText::_('ZO2_DRAG_ROW') ?>" class="fa fa-arrows row-control-icon dragger hasTooltip"></i>
    	    	<i title="<?php echo JText::_('ZO2_ADD_NEW_COLUMN') ?>" class="row-control-icon add-column fa fa-plus hasTooltip"></i>
	            <?php echo $row->get('name'); ?>
            </div>
            <div class="row-control-buttons">
                <i title="<?php echo JText::_('ZO2_ROW_SETTING') ?>" class="fa fa-cog row-control-icon settings hasTooltip"></i>
                <i title="<?php echo JText::_('ZO2_CLONE_THIS_ROW') ?>" class="row-control-icon add-row fa fa-clone hasTooltip"></i>
                <i title="<?php echo JText::_('ZO2_REMOVE_ROW') ?>Remove row" class="row-control-icon delete fa fa-trash-o hasTooltip"></i>
            </div>
        </div>

        <div class="col-container zo2-row">
            <?php
            $columns = $row->get('children');
            if (count($columns) > 0)

                foreach ($columns as $column) {

                    require 'layout.column.php';
                }

            ?>
        </div>
    </div>
</div>
<script>
    var drag_row = "<?php echo JText::_('ZO2_DRAG_ROW') ?>";
    var add_nc = "<?php echo JText::_('ZO2_ADD_NEW_COLUMN') ?>";
    var row_setting = "<?php echo JText::_('ZO2_ROW_SETTING') ?>";
    var clone_this_row = "<?php echo JText::_('ZO2_CLONE_THIS_ROW') ?>";
    var remove_row = "<?php echo JText::_('ZO2_REMOVE_ROW') ?>";
</script>