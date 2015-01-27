<div class="parent-container clearfix">
    <?php if (!$row->isRoot()): ?>
        <div class="row-size">
            <a title="Decrease width" onclick="zo2.layoutbuilder.resize(this, 'decrease');" class="row-decrease"><i data-original-title="Decrease width" class="hasTooltip fa fa-angle-double-left"></i></a>
            <span class="row-width"><?php echo $row->getWidth(); ?>/12</span>
            <a title="Increase width" onclick="zo2.layoutbuilder.resize(this, 'increase');" class="row-increase"><i data-original-title="Increase width" class="hasTooltip fa fa-angle-double-right"></i></a>
        </div>
    <?php endif; ?>
    <div class="row-name">
        <span><?php echo $row->get('name'); ?></span>
    </div>
    <div class="row-controls">
        <?php echo $row->getControls(); ?>
    </div>
</div>