<?php $column = new JRegistry($column); ?>
<div class="sortable-col col-md-<?php echo $column->get('span'); ?> col-md-offset-<?php echo $column->get('offset'); ?>"
     data-zo2-jdoc="<?php echo $column->get('jdoc'); ?>"
     data-zo2-type="span"
     data-zo2-span="<?php echo $column->get('span'); ?>"
     data-zo2-offset="<?php echo $column->get('offset'); ?>"
     data-zo2-position="<?php echo $column->get('position'); ?>"
     data-zo2-style="<?php echo $column->get('style'); ?>"
     data-zo2-customClass="<?php echo $column->get('customClass'); ?>"
     data-zo2-id="<?php echo $column->get('id'); ?>"
     data-zo2-visibility-xs="<?php echo $column->get('visibility')->xs ? 1 : 0 ?>"
     data-zo2-visibility-sm="<?php echo $column->get('visibility')->sm ? 1 : 0 ?>"
     data-zo2-visibility-md="<?php echo $column->get('visibility')->md ? 1 : 0 ?>"
     data-zo2-visibility-lg="<?php echo $column->get('visibility')->lg ? 1 : 0 ?>"
    >
    <div class="col-wrap">
        <div class="col-name"><?php echo $column->get('name'); ?></div>
        <div class="col-grid-button">
            <i title="Column decrease" class="col-grid-icon col-decrease fa fa-minus-square-o"></i>
            <span class="col-size"><?php echo $column->get('span'); ?>/12</span>
            <i title="Column increase" class="col-grid-icon col-increase fa fa-plus-square-o"></i>
        </div>
        <div class="col-control-buttons">
            <i title="Drag column" class="col-control-icon dragger fa fa-arrows hasTooltip"></i>
            <i title="Column's settings" class="fa fa-cog col-control-icon settings hasTooltip" data-toggle="modal"></i>
            <i title="Add new row" class="col-control-icon add-row fa fa-align-justify hasTooltip"></i>
            <i title="Remove column" class="fa fa-remove col-control-icon delete hasTooltip"></i>
        </div>

        <div class="row-container">
            <?php foreach ($column->get('children') as $row) { ?>
                <?php require 'layout.row.php'; ?>
            <?php } ?>
        </div>
    </div>
</div>