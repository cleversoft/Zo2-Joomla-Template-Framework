<?php
/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @version     1.5.2
 * @uses        For Joomla! 3.x
 * @link        http://www.zootemplate.com/zo2
 * @author      ZooTemplate <http://www.zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');
?>
<div class="row-fluid">
    <div class="span12">
        <section class="zo2-body">
            <div class="tabbable tabs-left">
                <?php $this->load('admin/body/sidebar/header.php'); ?>
                <?php $this->load('admin/body/sidebar/content.php'); ?>
            </div>
        </section>
    </div>
</div>