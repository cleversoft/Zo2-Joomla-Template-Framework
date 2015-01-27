<?php
$jDoc = $row->getJdoc();
$blockName = $row->get('name');
$jDocName = $jDoc->get('name');
$children = $row->get('children', array());
$properties = $row->getProperties();
if (isset($properties['children']))
{
    unset($properties['childrent']);
}
?>

<div class="sortable-row <?php echo $child ? 'row-child ' : 'row-parent'; echo(' '. $row->getClass()); ?> "
     id="zo2-<?php echo $blockName; ?>"
     data-zo2="<?php echo htmlentities(Zo2HelperEncode::json($properties)); ?>"
     >
    <div class="row-control">
        <div class="parent-container clearfix">
            <div class="row-size">
                <a title="Decrease width" onclick="zo2.layoutbuilder.resize(this, 'decrease');" class="row-decrease"><i data-original-title="Decrease width" class="hasTooltip fa fa-angle-double-left"></i></a>
                <span class="row-width"><?php echo $row->getWidth(); ?>/12</span>
                <a title="Increase width" onclick="zo2.layoutbuilder.resize(this, 'increase');" class="row-increase"><i data-original-title="Increase width" class="hasTooltip fa fa-angle-double-right"></i></a>
            </div>
            <div class="row-name">
                <span><?php echo $row->get('name'); ?></span>
            </div>
            <div class="row-controls">
<?php echo $row->getControls(); ?>
            </div>
        </div>
        <div id="zo2-row-setting-container" style="display: none"></div>
        <div class="children-container row-fluid connectedSortable">
            <?php
            if (count($children) > 0) : {
                    foreach ($children as $child)
                    {
                        $this->set('child', true);
                        $this->set('row', new Zo2LayoutbuilderRow($child));
                        $this->load('Zo2://html/admin/layout/layoutbuilder.row.php');
                    }
                }
            endif;
            ?>
        </div>
    </div>
</div>