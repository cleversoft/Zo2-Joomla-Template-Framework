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
//no direct accees
defined('JPATH_BASE') or die;
?>
<!-- Row control buttons -->
<div class="parent-container clearfix">
    <?php if (!$row->isRoot()): ?>
        <div class="row-size">
            <a title="Decrease width" onclick="zo2.layoutbuilder.resize(this, 'decrease');" class="row-decrease"><i data-original-title="Decrease width" class="hasTooltip fa fa-minus"></i></a>
            <span class="row-width"><?php echo $row->getWidth(); ?>/12</span>
            <a title="Increase width" onclick="zo2.layoutbuilder.resize(this, 'increase');" class="row-increase"><i data-original-title="Increase width" class="hasTooltip fa fa-plus"></i></a>
        </div>
    <?php endif; ?>
    <div class="row-name pull-left">
        <span><?php echo $row->get('name'); ?></span>
    </div>
    <div class="row-controls pull-right">
        <?php echo $row->getControls(); ?>
    </div>
</div>