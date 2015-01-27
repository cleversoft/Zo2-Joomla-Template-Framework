<?php
$jDoc = $row->get('jdoc');
$blockName = $row->get('name');
$jDocName = $jDoc->get('name');
$children = $row->get('children', array());
$properties = $row->getProperties();
$className[] = (!$row->isRoot()) ? 'row-child' : 'row-parent';
$className[] = $row->getClass();
$className = implode(' ', $className);
// we wil not generate children property into data attribute
if (isset($properties['children']))
{
    unset($properties['children']);
}
?>

<div class="sortable-row <?php echo $className; ?>"
     id="zo2-<?php echo $blockName; ?>"
     data-zo2="<?php echo htmlentities(Zo2HelperEncode::json($properties)); ?>"
     >
    <div class="row-control">

        <?php $this->load('Zo2://html/admin/layout/layoutbuilder/controls.php'); ?>

        <div id="zo2-row-setting-container" style="display: none"></div>
        <div class="children-container row-fluid connectedSortable">
            <?php
            if (count($children) > 0) :
                {
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