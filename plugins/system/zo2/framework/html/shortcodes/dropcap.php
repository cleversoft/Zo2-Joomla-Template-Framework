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
<div class="shortcode-dropcap <?php echo $this->get('type'); ?>" style="color:<?php echo $this->get('color'); ?>; background-color:<?php echo $this->get('background'); ?>">
    <?php echo $this->get('content'); ?>
</div>