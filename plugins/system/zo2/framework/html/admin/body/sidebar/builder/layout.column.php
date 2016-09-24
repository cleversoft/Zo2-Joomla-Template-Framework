<?php $column = new JRegistry($column); ?>
<?php
if(count($column->get('children')) > 0 and $column->get('new_layout') ==  1) {

?>
<div class="sortable-col col-md-<?php echo $column->get('span'); ?>" data-new-layout="1"
     data-zo2-type="span"
     data-zo2-span="<?php echo $column->get('span'); ?>">

     <div class="col-control-header">
        <i title="Prepend to this column" class="row-control-icon prepend-column before fa fa-plus hasTooltip"></i>
        <i title="Column's settings" class="fa fa-cog col-control-icon settings hasTooltip" data-toggle="modal"></i>
        <i title="Remove column" class="row-control-icon delete fa fa-trash-o hasTooltip"></i>
    </div>
     <?php foreach($column->get('children') as $childs) : ?>
         <?php $childs = new JRegistry($childs) ?>
        <div class="col-wrap sortable-col-child" data-zo2-jdoc="<?php echo $childs->get('jdoc'); ?>"
             data-zo2-type="span"
             data-zo2-offset="<?php echo $childs->get('offset'); ?>"
             data-zo2-position="<?php echo $childs->get('position'); ?>"
             data-zo2-style="<?php echo $childs->get('style'); ?>"
             data-zo2-customClass="<?php echo $childs->get('customClass'); ?>"
             data-zo2-id="<?php echo $childs->get('id'); ?>"
             data-zo2-visibility-xs="<?php echo $childs->get('visibility')->xs ? 1 : 0 ?>"
             data-zo2-visibility-sm="<?php echo $childs->get('visibility')->sm ? 1 : 0 ?>"
             data-zo2-visibility-md="<?php echo $childs->get('visibility')->md ? 1 : 0 ?>"
             data-zo2-visibility-lg="<?php echo $childs->get('visibility')->lg ? 1 : 0 ?>">
        <div class="col-name"><?php echo $childs->get('name'); ?></div>
        <div class="col-control-buttons">
            <i title="Drag block" class="col-control-icon dragger fa fa-arrows hasTooltip"></i>
            <i title="Clone this block" class="col-control-icon add-row fa fa-clone hasTooltip"></i>
            <i title="Block's settings" class="fa fa-cog col-control-icon block-settings hasTooltip" data-toggle="modal"></i>
            <i title="Remove block" class="fa fa-remove col-control-icon delete hasTooltip"></i>
        </div>
        <div class="row-container">
           
        </div>
    </div>
    <?php endforeach; ?>

    <div class="col-prepend-after"><i title="Prepend to this column" class="row-control-icon prepend-column after fa fa-plus hasTooltip"></i></div>
</div>
<?php
} else {
    ?>
<div class="sortable-col col-md-<?php echo $column->get('span'); ?>" data-new-layout="1"
     data-zo2-type="span"
     data-zo2-span="<?php echo $column->get('span'); ?>">

     <div class="col-control-header">
        <i title="Prepend to this column" class="row-control-icon prepend-column before fa fa-plus hasTooltip"></i>
        <i title="Column's settings" class="fa fa-cog col-control-icon settings hasTooltip" data-toggle="modal"></i>
        <i title="Remove column" class="row-control-icon delete fa fa-trash-o hasTooltip"></i>
    </div>

    <div class="col-wrap sortable-col-child" data-zo2-jdoc="<?php echo $column->get('jdoc'); ?>"
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
         data-zo2-visibility-lg="<?php echo $column->get('visibility')->lg ? 1 : 0 ?>">
    <div class="col-name"><?php echo $column->get('name'); ?></div>
    <div class="col-control-buttons">
        <i title="Drag block" class="col-control-icon dragger fa fa-arrows hasTooltip"></i>
        <i title="Clone this block" class="col-control-icon add-row fa fa-clone hasTooltip"></i>
        <i title="Block's settings" class="fa fa-cog col-control-icon block-settings hasTooltip" data-toggle="modal"></i>
        <i title="Remove block" class="fa fa-remove col-control-icon delete hasTooltip"></i>
    </div>
    <div class="row-container">

    </div>
    </div>

    <div class="col-prepend-after"><i title="Prepend to this column" class="row-control-icon prepend-column after fa fa-plus hasTooltip"></i></div>
</div>
<?php
}

?>