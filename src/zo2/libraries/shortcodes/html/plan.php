<?php
/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');

$featured = ( strtolower($params->get('featured') == 'true') ) ? 'featured' : '';
?>
<div class="pricing_box plan1-3 <?php echo $featured; ?> ">
    <div class="header"><span>. <?php echo $params->get('title'); ?> </span></div>
    <h2><?php echo $params->get('price'); ?><span style="font-size: 14px;">/<?php echo $params->get('percent'); ?></span></h2>
    <?php echo $params->get('content'); ?>
    <a class="button" href="<?php echo $params->get('button_link'); ?>"><?php echo $params->get('button_label'); ?></a>
</div>