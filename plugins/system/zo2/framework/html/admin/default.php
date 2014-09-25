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
<!-- Move these css to admin.css than call it -->
<style>
    #attrib-zo2 .controls {
        margin-left: 0px;
    }
    #attrib-zo2 .controls .container{
        margin-left: 0px;
    }
</style>
<!-- include css & bootrap Joomla! here -->
<div class="container">
    <div class="row-fluid">
        <div class="span12">
            <!-- tabs header -->
            <ul class="nav nav-pills nav-stacked" id="main-navigator">                
                <li class="active">
                    <a href="#general" data-toggle="tab"><i class="icon-cog fa-lg"></i> General</a>
                </li>
                <li>
                    <a href="#fonts" data-toggle="tab"><i class="icon-font fa-lg"></i> Fonts</a>
                </li>
                <li>
                    <a href="#theme" data-toggle="tab"><i class="icon-columns fa-lg"></i> Layout Profiles</a>
                </li>
                <li>
                    <a href="#megamenu" data-toggle="tab"><i class="fa fa-navicon fa-lg"></i> Mega Menus</a>
                </li>
                <li>
                    <a href="#assignment" data-toggle="tab"><i class="icon-edit-sign fa-lg"></i>Template Assignment</a>
                </li>
                <li>
                    <a href="#advanced" data-toggle="tab"><i class="icon-wrench fa-lg"></i> Advanced</a>
                </li>
            </ul>
            <div class="tab-content main-navigator"></div>
        </div>
    </div>
</div>