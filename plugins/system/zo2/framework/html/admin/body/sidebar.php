<?php
/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @version     1.4.3
 * @since       1.4.3
 * @uses        For Joomla! 3.x
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');
?>
<!-- Sidebar header -->
<ul class="nav nav-pills nav-stacked" id="myTabZo2Sidebar" role="tablist" style="float:left;">
    <!-- Default active tab -->    
    <li class="active">
        <a href="#general" role="tab" data-toggle="tab">
            <i class="icon-cog fa-lg"></i> <?php echo JText::_('ZO2_ADMIN_SIDEBAR_HEADER_GENERAL'); ?>
        </a>
    </li>
    <li class="">
        <a href="#layout" role="tab" data-toggle="tab">
            <i class="fa fa-sitemap"></i> <?php echo JText::_('ZO2_ADMIN_SIDEBAR_HEADER_LAYOUT'); ?>
        </a>
    </li>
    <li class="">
        <a href="#advanced" role="tab" data-toggle="tab">
            <i class="fa fa-wrench"></i> <?php echo JText::_('ZO2_ADMIN_SIDEBAR_HEADER_ADVANCED'); ?>
        </a>
    </li>
    <li class="">
        <a href="#about" role="tab" data-toggle="tab">
            <i class="fa fa-info"></i> <?php echo JText::_('ZO2_ADMIN_SIDEBAR_HEADER_ABOUT'); ?>
        </a>
    </li>    
</ul>
<div id="myTabZo2SidebarContent" class="tab-content" style="float:left; margin-left: 10px;">
    <?php $this->load('admin/body/sidebar/general.php'); ?>
</div>