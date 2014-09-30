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
$type = $this->get('type');
$size = $this->get('size');
$state = $this->get('state');
?>
<button class="btn <?php (($type != '') ? ' btn-' . $type : '') . (($size != '') ? ' btn-' . $size : '') . (($state == 'disabled') ? ' disabled' : ''); ?>">
    <?php echo $this->get('content'); ?>
</button>