<?php $column = new JRegistry($column); ?>
<?php
if(count($column->get('children')) > 0 and $column->get('new_layout') ==  1) {
if (empty($column->get('visibility',''))) $column->set('visibility',$column->get('children')[0]->visibility) ;
?>
<div class="sortable-col col-md-<?php echo $column->get('span'); ?>" data-new-layout="1"
     data-zo2-type="span"
     data-zo2-offset="<?php echo $column->get('offset',0); ?>"
     data-zo2-customClass="<?php echo $column->get('customClass',''); ?>"
     data-zo2-span="<?php echo $column->get('span'); ?>"
     data-zo2-visibility-xs="<?php echo $column->get('visibility')->xs ? 1 : 0 ?>"
     data-zo2-visibility-sm="<?php echo $column->get('visibility')->sm ? 1 : 0 ?>"
     data-zo2-visibility-md="<?php echo $column->get('visibility')->md ? 1 : 0 ?>"
     data-zo2-visibility-lg="<?php echo $column->get('visibility')->lg ? 1 : 0 ?>"
     >

     <div class="col-control-header">
        <i title="<?php echo JText::_('ZO2_PREPEND_TO_THIS_COLUMN') ?>" class="row-control-icon prepend-column before fa fa-plus hasTooltip"></i>
        <i title="<?php echo JText::_('ZO2_COLUMN_SETTING') ?>" class="fa fa-cog col-control-icon settings hasTooltip" data-toggle="modal"></i>
        <i title="<?php echo JText::_('ZO2_REMOVE_COLUMN') ?>" class="row-control-icon delete fa fa-trash-o hasTooltip"></i>
    </div>
     <?php foreach($column->get('children') as $childs) : ?>
         <?php $childs = new JRegistry($childs) ?>
        <div class="col-wrap sortable-col-child" data-zo2-jdoc="<?php echo $childs->get('jdoc'); ?>"
             data-zo2-type="span"
             data-zo2-position="<?php echo $childs->get('position'); ?>"
             data-zo2-style="<?php echo $childs->get('style'); ?>"
             data-zo2-id="<?php echo $childs->get('id'); ?>"
             >
        <div class="col-name"><?php echo $childs->get('name'); ?></div>
        <div class="col-control-buttons">
            <i title="<?php echo JText::_('ZO2_DRAG_BLOCK') ?>" class="col-control-icon dragger fa fa-arrows hasTooltip"></i>
            <i title="<?php echo JText::_('ZO2_CLONE_THIS_BLOCK') ?>" class="col-control-icon add-row fa fa-clone hasTooltip"></i>
            <i title="<?php echo JText::_('ZO2_BLOCK_SETTING') ?>" class="fa fa-cog col-control-icon block-settings hasTooltip" data-toggle="modal"></i>
            <i title="<?php echo JText::_('ZO2_REMOVE_BLOCK') ?>" class="fa fa-remove col-control-icon delete hasTooltip"></i>
        </div>
        <div class="row-container">
           
        </div>
    </div>
    <?php endforeach; ?>

    <div class="col-prepend-after"><i title="<?php echo JText::_('ZO2_PREPEND_TO_THIS_COLUMN') ?>" class="row-control-icon prepend-column after fa fa-plus hasTooltip"></i></div>
</div>
<?php
} else {
if (empty($column->get('visibility',''))) $column->set('visibility',$column->get('children')[0]->visibility) ;
    ?>
<div class="sortable-col col-md-<?php echo $column->get('span'); ?>" data-new-layout="1"
     data-zo2-type="span"
     data-zo2-offset="<?php echo $column->get('offset',0); ?>"
     data-zo2-customClass="<?php echo $column->get('customClass',''); ?>"
     data-zo2-span="<?php echo $column->get('span'); ?>"
     data-zo2-visibility-xs="<?php echo $column->get('visibility')->xs ? 1 : 0 ?>"
     data-zo2-visibility-sm="<?php echo $column->get('visibility')->sm ? 1 : 0 ?>"
     data-zo2-visibility-md="<?php echo $column->get('visibility')->md ? 1 : 0 ?>"
     data-zo2-visibility-lg="<?php echo $column->get('visibility')->lg ? 1 : 0 ?>">

     <div class="col-control-header">
        <i title="<?php echo JText::_('ZO2_PREPEND_TO_THIS_COLUMN') ?>" class="row-control-icon prepend-column before fa fa-plus hasTooltip"></i>
        <i title="<?php echo JText::_('ZO2_COLUMN_SETTING') ?>" class="fa fa-cog col-control-icon settings hasTooltip" data-toggle="modal"></i>
        <i title="<?php echo JText::_('ZO2_REMOVE_COLUMN') ?>" class="row-control-icon delete fa fa-trash-o hasTooltip"></i>
    </div>

    <div class="col-wrap sortable-col-child" data-zo2-jdoc="<?php echo $column->get('jdoc'); ?>"
         data-zo2-type="span"
         data-zo2-span="<?php echo $column->get('span'); ?>"
         data-zo2-position="<?php echo $column->get('position'); ?>"
         data-zo2-style="<?php echo $column->get('style'); ?>"
         data-zo2-id="<?php echo $column->get('id'); ?>">
    <div class="col-name"><?php echo $column->get('name'); ?></div>
    <div class="col-control-buttons">
        <i title="<?php echo JText::_('ZO2_DRAG_BLOCK') ?>" class="col-control-icon dragger fa fa-arrows hasTooltip"></i>
        <i title="<?php echo JText::_('ZO2_CLONE_THIS_BLOCK') ?>" class="col-control-icon add-row fa fa-clone hasTooltip"></i>
        <i title="<?php echo JText::_('ZO2_BLOCK_SETTING') ?>" class="fa fa-cog col-control-icon block-settings hasTooltip" data-toggle="modal"></i>
        <i title="<?php echo JText::_('ZO2_REMOVE_BLOCK') ?>" class="fa fa-remove col-control-icon delete hasTooltip"></i>
    </div>
    <div class="row-container">

    </div>
    </div>

    <div class="col-prepend-after"><i title="<?php echo JText::_('ZO2_PREPEND_TO_THIS_COLUMN') ?>" class="row-control-icon prepend-column after fa fa-plus hasTooltip"></i></div>
</div>
<?php } ?>
<script>
    var prepend_this_column = "<?php echo JText::_('ZO2_PREPEND_TO_THIS_COLUMN') ?>";
    var col_setting = "<?php echo JText::_('ZO2_COLUMN_SETTING') ?>";
    var remove_col = "<?php echo JText::_('ZO2_REMOVE_COLUMN') ?>";
    var drag_block = "<?php echo JText::_('ZO2_DRAG_BLOCK') ?>";
    var clone_block = "<?php echo JText::_('ZO2_CLONE_THIS_BLOCK') ?>";
    var block_setting = "<?php echo JText::_('ZO2_BLOCK_SETTING') ?>";
    var remove_block = "<?php echo JText::_('ZO2_REMOVE_BLOCK') ?>";
    var confirmc = "<?php echo JText::_('ZO2_CONFIRM_DELELTE_COLUMN') ?>" ;//Are you sure want to delete this column? ?>
    var confirmr = "<?php echo JText::_('ZO2_CONFIRM_DELELTE_ROW')?>" ;//Are you sure want to delete this row? ?>
</script>
