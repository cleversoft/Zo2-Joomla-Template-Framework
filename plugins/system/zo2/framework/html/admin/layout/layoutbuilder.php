<!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
<div id="zo2-layoutbuilder-container" class="row">
    <input type="hidden" id="zo2-layoutbuilder-json" name="zo2[layout]">
    <div id="zo2-empty-parent-row" style="display: none">
        <?php
        $blankRow = new Zo2LayoutbuilderRow();
        $this->set('child', false);
        $this->set('row', $blankRow);
        $this->load('Zo2://html/admin/layout/layoutbuilder.row.php');
        ?>
    </div>
    <div id="zo2-empty-child-row" style="display: none">
        <?php
        $blankRow = new Zo2LayoutbuilderRow();
        $this->set('child', true);
        $this->set('row', $blankRow);
        $this->load('Zo2://html/admin/layout/layoutbuilder.row.php');
        ?>
    </div>
    <?php $this->load('Zo2://html/admin/layout/layoutbuilder.settings.php'); ?>
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
