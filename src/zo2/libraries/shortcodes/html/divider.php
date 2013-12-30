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
<p><?php echo $this->get('content'); ?></p>
<div class="divider">
    <div class="scroll-top">
        <?php echo $this->get('scroll_text'); ?>
    </div>
</div>
<script>
    /* Divider Block */
    jQuery(document).ready(function() {
        jQuery("div.scroll-top").click(function() {
            jQuery("body,html").animate({
                scrollTop: 0
            }, 800);
        });
    });
</script>