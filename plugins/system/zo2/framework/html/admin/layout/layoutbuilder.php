<!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
<div id="layoutbuilder-container" class="row">
    <div class="empty-row">
        <?php
        $blankRow = new Zo2LayoutbuilderRow();
        $this->set('child', false);
        $this->set('row', $blankRow);
        $this->load('Zo2://html/admin/layout/layoutbuilder.row.php');
        ?>
    </div>
    <div id="zo2-layoutbuilder-controls">
        <button onclick="zo2.layoutbuilder.addParentRow();" type="button" class="btn btn-primary">New row</button>
    </div>
    <div id="zo2-layoutbuilder">
        <?php foreach ($layout as $row) : ?>
            <?php $this->set('child', false); ?>
            <?php $this->set('row', new Zo2LayoutbuilderRow($row)); ?>
            <?php $this->load('Zo2://html/admin/layout/layoutbuilder.row.php'); ?>
        <?php endforeach; ?>
    </div>
</div>
