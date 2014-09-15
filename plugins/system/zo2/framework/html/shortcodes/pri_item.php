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
//no direct accees
defined('_JEXEC') or die('resticted aceess');
?>
<div class="pricing_box plan1-3">
    <div class="header"><span><?php echo $this->get('header'); ?></span></div>
    <h2><?php echo $this->get('price'); ?><span style="font-size: 14px;">/<?php echo $this->get('per'); ?></span></h2>
    <?php echo $this->get('content'); ?>
    <a class="button" href="<?php echo $this->get('signup_link'); ?>">Sign Up</a>
</div>