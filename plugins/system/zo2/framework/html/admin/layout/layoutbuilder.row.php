<?php
$jDoc = $row->getJdoc();
$blockName = $row->get('name');
$jDocName = $jDoc->get('name');
?>
<div class="sortable-row <?php echo $row->getClass(); ?> <?php echo $child ? 'child' : 'parent'; ?>"
     id="zo2-<?php echo $blockName; ?>"
     data-zo2="<?php echo htmlentities(Zo2HelperEncode::json($row->getProperties())); ?>"     
     >
    <div class="col-md-12 row-control well well-sm">
        <div class="parent-container">
            <div class="row-name pull-left"><span class="label label-default"><?php echo $row->get('name'); ?></span></div>
            <hr />
            <div class="row-controls pull-right">
                <i title="Drag row" class="fa fa-arrows row-control-icon dragger hasTooltip"></i>
                <i title="Row's settings" class="fa fa-cog row-control-icon settings hasTooltip"></i>
                <i title="Add new row" class="row-control-icon duplicate fa fa-align-justify hasTooltip"></i>
                <i title="Add new col" class="row-control-icon add-column fa fa-columns hasTooltip"></i>
                <i title="Remove row" class="row-control-icon delete fa fa-remove hasTooltip"></i>
            </div>
        </div>

        <div class="children-container sortable-row connectedSortable">
            <?php
            $children = $row->get('children');
            if (count($children) > 0) {
                foreach ($children as $child) {
                    $this->set('child', true);
                    $this->set('row', new Zo2LayoutbuilderRow($child));
                    $this->load('Zo2://html/admin/layout/layoutbuilder.row.php');
                }
            }
            ?>
        </div>
    </div>
</div>