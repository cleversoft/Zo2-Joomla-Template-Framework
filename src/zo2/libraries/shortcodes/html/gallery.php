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
$content = $this->get('content');
$shortcodes = Zo2Shortcodes::getInstance();
$shortcodes->set('width', $this->get('width'));
$shortcodes->set('height', $this->get('height'));
?>
<style>
    div.itemFullText > div{
        height: <?php echo $this->get('height')?>px !important;
    }

    div.itemFullText > div.carousel_height{
        height: 20px !important;
    }

    div.itemFullText #carousel-name{
        margin-top: 0px !important;
    }
</style>
<div id="carousel-<?php echo $this->get('name'); ?>" class="carousel slide" data-ride="carousel">
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
        jQuery('#carousel-<?php echo $this->get("name"); ?>').next().next().addClass('carousel_height');
    })
</script>

