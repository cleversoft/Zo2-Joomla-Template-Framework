<!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
<button type="button" class="btn btn-primary">New row</button>
<div id="layoutbuilder-container">
    <?php foreach ($layout as $row) : ?>
        <?php $this->set('child', false); ?>
        <?php $this->set('row', new Zo2LayoutbuilderRow($row)); ?>
        <?php $this->load('Zo2://html/admin/layout/layoutbuilder.row.php'); ?>
    <?php endforeach; ?>        
</div>
<script>
    jQuery("#layoutbuilder-container").sortable({
        placeholder: "ui-state-highlight"
    });
    jQuery(".children-container").sortable({
        placeholder: "ui-state-highlight",
        connectWith: ".connectedSortable"
    });
</script>
