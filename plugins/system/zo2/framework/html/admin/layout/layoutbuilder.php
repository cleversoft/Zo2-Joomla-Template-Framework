<!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
<div id="zo2-layoutbuilder-container">
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
    <div class="modal fade" id="zo2-delete-confirm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><?php echo(JText::_('ZO2_ADMIN_LAYOUTBUILDER_MODAL_DELETE_CONFIRM_TITLE')); ?></h4>
                </div>
                <div class="modal-body">
                    <p><?php echo(JText::_('ZO2_ADMIN_LAYOUTBUILDER_MODAL_DELETE_CONFIRM_CONTENT')); ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onclick="zo2.layoutbuilder.deleteRow();"><?php echo(JText::_('ZO2_ADMIN_LAYOUTBUILDER_MODAL_DELETE_CONFIRM_CONFIRM')); ?></button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo(JText::_('ZO2_ADMIN_LAYOUTBUILDER_MODAL_DELETE_CONFIRM_CANCEL')); ?></button>
                </div>
            </div>
        </div>
    </div>
    <div id="zo2-layoutbuilder-controls">
        <button onclick="zo2.layoutbuilder.addParentRow();" type="button" class="btn btn-primary">New row</button>
    </div>
    <div id="zo2-layoutbuilder" class="row-fluid">
        <?php foreach ($layout as $row) : ?>
            <?php $this->set('child', false); ?>
            <?php $this->set('row', new Zo2LayoutbuilderRow($row)); ?>
            <?php $this->load('Zo2://html/admin/layout/layoutbuilder.row.php'); ?>
        <?php endforeach; ?>
    </div>
</div>
