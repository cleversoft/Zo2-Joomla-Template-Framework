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
    <!-- Init blank html -->
    <div id="zo2-empty-parent-row" style="display: none">
        <?php
        $blankRow = new Zo2LayoutbuilderRow();
        $blankRow->isRoot(true);
        $this->set('row', $blankRow);
        $this->load('Zo2://html/admin/layout/layoutbuilder.row.php');
        ?>
    </div>
    <div id="zo2-empty-child-row" style="display: none">
        <?php
        $blankRow = new Zo2LayoutbuilderRow();
        $blankRow->isRoot(false);
        $this->set('row', $blankRow);
        $this->load('Zo2://html/admin/layout/layoutbuilder.row.php');
        ?>
    </div>
    <!-- Modals -->
    <?php $this->load('Zo2://html/admin/layout/layoutbuilder/modals.php'); ?>   
    <div id="zo2-layoutbuilder-controls">
        <button onclick="zo2.layoutbuilder.addParentRow();" type="button" class="btn btn-primary">New row</button>
    </div>
    <div id="zo2-layoutbuilder" class="row-fluid">
        <?php foreach ($layout as $row) : ?>
            <?php $row = new Zo2LayoutbuilderRow($row); ?>
            <?php $row->setRoot(true); ?>            
            <?php $this->set('row', $row); ?>
            <?php $this->load('Zo2://html/admin/layout/layoutbuilder.row.php'); ?>
        <?php endforeach; ?>
    </div>
</div>
