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
<ul class="nav nav-tabs" id="myTabZo2Sidebar" role="tablist">
    <!-- General: Default active tab -->
    <li class="active">
        <a href="#zo2-general" role="tab" data-toggle="tab">
            <i class="icon-cog fa-lg"></i> <?php echo JText::_('ZO2_ADMIN_SIDEBAR_HEADER_GENERAL'); ?>
        </a>
    </li>
    <!-- Fonts -->
    <li class="">
        <a href="#zo2-fonts" role="tab" data-toggle="tab">
            <i class="fa fa-font"></i> <?php echo JText::_('ZO2_ADMIN_SIDEBAR_HEADER_FONTS'); ?>
        </a>
    </li>
    <!-- Layout -->
    <li class="">
        <a href="#zo2-layout" role="tab" data-toggle="tab">
            <i class="fa fa-sitemap"></i> <?php echo JText::_('ZO2_ADMIN_SIDEBAR_HEADER_LAYOUT'); ?>
        </a>
    </li>
    <!-- Layout -->
    <li class="">
        <a href="#zo2-themecolor" role="tab" data-toggle="tab">
            <i class="fa fa-sitemap"></i> <?php echo JText::_('ZO2_ADMIN_SIDEBAR_HEADER_THEMECOLOR'); ?>
        </a>
    </li>
    <!-- Menu -->
    <li class="">
        <a href="#zo2-menu" role="tab" data-toggle="tab">
            <i class="fa fa-sitemap"></i> <?php echo JText::_('ZO2_ADMIN_SIDEBAR_HEADER_MENU'); ?>
        </a>
    </li>
    <!-- Advanced -->
    <li class="">
        <a href="#zo2-advanced" role="tab" data-toggle="tab">
            <i class="fa fa-wrench"></i> <?php echo JText::_('ZO2_ADMIN_SIDEBAR_HEADER_ADVANCED'); ?>
        </a>
    </li>
    <!-- About -->    
    <li class="">
        <a href="#zo2-about" role="tab" data-toggle="tab">
            <i class="fa fa-info"></i> <?php echo JText::_('ZO2_ADMIN_SIDEBAR_HEADER_ABOUT'); ?>
            <span class="label label-important">Out of date</span>
        </a>
    </li>    
</ul>