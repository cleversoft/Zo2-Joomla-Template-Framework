<?php
$jDoc = $row->getJdoc();
$blockName = $row->get('name');
$jDocName = $jDoc->get('name');
$children = $row->get('children', array());
?>

<div class="sortable-row <?php echo $row->getClass(); ?> <?php echo $child ? 'row-child' : 'row-parent'; ?>"
     id="zo2-<?php echo $blockName; ?>"
     data-zo2="<?php echo htmlentities(Zo2HelperEncode::json($row->getProperties())); ?>"
    >
    <div class="row-control">
        <div class="parent-container clearfix">
            <div class="row-name pull-left">
                <span class="label label-default"><?php echo $row->get('name'); ?></span>
            </div>
            <div class="row-controls pull-right">
                <?php echo $row->getControls(); ?>
            </div>
        </div>
        <hr/>
        <?php if (count($children) > 0) : ?>
            <div class="children-container row sortable-row connectedSortable">
                <?php
                {
                    foreach ($children as $child) {
                        $this->set('child', true);
                        $this->set('row', new Zo2LayoutbuilderRow($child));
                        $this->load('Zo2://html/admin/layout/layoutbuilder.row.php');
                    }
                }
                ?>
            </div>
        <?php endif; ?>
    </div>
</div>