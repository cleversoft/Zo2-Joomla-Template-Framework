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
?>
<div class="message-box-wrapper <?php echo $params->get('color'); ?>">
    <div class="message-box-head">
        <div class="message-box-title">
            <?php echo $params->get('title'); ?>
            <?php if (strtolower($params->get('show_close', 'No')) == 'yes') { ?>
                <div class="message-box-close"><a href="javascript: void(0);" onClick="closeMessage(this);">X</a></div>
            <?php } ?>
            <div class="message-box-content">
                <?php echo $params->get('content'); ?>
            </div>
        </div>
    </div>
</div>