<div class="sortable-col col-md-<?php echo $column['span'] ?> col-md-offset-<?php echo $column['offset'] ?>" data-zo2-type="span"
     data-zo2-span="<?php echo $column['span'] ?>" data-zo2-offset="<?php echo $column['offset'] ?>"
     data-zo2-position="<?php echo $column['position'] ?>" data-zo2-style="<?php echo (isset($column['style'])) ? $column['style'] : ''; ?>"
     data-zo2-customClass="<?php echo $column['customClass'] ?>" data-zo2-id="<?php echo $column['id'] ?>"
     data-zo2-visibility-xs="<?php echo $column['visibility']['xs'] ? 1 : 0 ?>"
     data-zo2-visibility-sm="<?php echo $column['visibility']['sm'] ? 1 : 0 ?>"
     data-zo2-visibility-md="<?php echo $column['visibility']['md'] ? 1 : 0 ?>"
     data-zo2-visibility-lg="<?php echo $column['visibility']['lg'] ? 1 : 0 ?>"
     >
    <div class="col-wrap">
        <div class="col-name"><?php echo $column['name'] ?></div>
        <div class="col-control-buttons">
            <i title="Drag column" class="col-control-icon dragger icon-move hasTooltip"></i>
            <i title="Column's settings" class="icon-cog col-control-icon settings hasTooltip"></i>
            <i title="Append new row" class="col-control-icon add-row icon-align-justify hasTooltip"></i>
            <i title="Remove column" class="icon-remove col-control-icon delete hasTooltip"></i>
        </div>

        <div class="row-container">
            <?php foreach ($column['children'] as $row) { ?>
                <?php require 'formfield.layout.row.php'; ?>
            <?php } ?>              
        </div>
    </div>
</div>