<div class="zo2-row sortable-row" data-zo2-type="row" data-zo2-customClass="<?php echo $row['customClass'] ?>"
     data-zo2-id="<?php echo $row['id'] ?>"
     data-zo2-visibility-xs="<?php echo $row['visibility']['xs'] ? 1 : 0 ?>"
     data-zo2-visibility-sm="<?php echo $row['visibility']['sm'] ? 1 : 0 ?>"
     data-zo2-visibility-md="<?php echo $row['visibility']['md'] ? 1 : 0 ?>"
     data-zo2-visibility-lg="<?php echo $row['visibility']['lg'] ? 1 : 0 ?>"
     data-zo2-fullwidth="<?php echo $row['fullwidth'] ? 1 : 0 ?>"
     >
    <div class="col-md-12 row-control">
        <div class="row-control-container">
            <div class="row-name"><?php echo $row['name'] ?></div>
            <div class="row-control-buttons">
                <i title="Drag row" class="icon-move row-control-icon dragger hasTooltip"></i>
                <i title="Row's settings" class="icon-cogs row-control-icon settings hasTooltip"></i>
                <i title="Duplicate row" class="row-control-icon duplicate icon-align-justify hasTooltip"></i>
                <i title="Split row" class="row-control-icon split icon-columns hasTooltip"></i>
                <i title="Remove row" class="row-control-icon delete icon-remove hasTooltip"></i>
            </div>
        </div>

        <div class="col-container">
            <?php foreach ($row['children'] as $column) { ?>                
                <?php require_once 'formfield.layout.column.php'; ?>
            <?php } ?>            
        </div>
    </div>
</div>