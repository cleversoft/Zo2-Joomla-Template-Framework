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
$content = $this->get('content');
$shortcodes = Zo2Shortcodes::getInstance();
$shortcodes->set('width', $this->get('width'));
$shortcodes->set('height', $this->get('height'));
?>
<div id="carousel-<?php echo $this->get('name'); ?>" class="carousel slide">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php echo $shortcodes->execute($content); ?>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-<?php echo $this->get('name'); ?>" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-<?php echo $this->get('name'); ?>" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>
<script>

    jQuery(document).ready(function() {
        jQuery('#carousel-<?php echo $this->get("name"); ?>').carousel();
    })
</script>
