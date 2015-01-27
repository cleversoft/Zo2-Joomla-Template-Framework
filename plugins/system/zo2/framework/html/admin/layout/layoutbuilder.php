<?php
/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');
?>
<!-- Layout builder entry point -->
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
    <div id="zo2-layoutbuilder">
        <?php foreach ($layout as $row) : ?>
            <?php $this->set('child', false); ?>
            <?php $this->set('row', new Zo2LayoutbuilderRow($row)); ?>
            <?php $this->load('Zo2://html/admin/layout/layoutbuilder.row.php'); ?>
        <?php endforeach; ?>
    </div>
</div>
