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
<!-- Main layout for backend -->
<!-- It's using Twitter Bootstrap 2 default. Provided by Joomla! -->
<div id="zo2-framework" class="zo2-framwork">

    <!-- Begin Content -->
    <div class="row-fluid">
        <div class="span12">
            <?php $this->load('admin/top/default.php'); ?>
            <?php $this->load('admin/body/default.php'); ?>
        </div>
    </div>
    <!-- End Content -->

</div>

<style>
    #attrib-zo2 .controls {
        margin-left: 0px;
    }
</style>