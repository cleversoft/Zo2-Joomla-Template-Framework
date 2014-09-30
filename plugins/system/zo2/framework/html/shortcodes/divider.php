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