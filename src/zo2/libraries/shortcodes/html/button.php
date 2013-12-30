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
$type = $this->get('type');
$size = $this->get('size');
$state = $this->get('state');
?>
<button class="btn <?php (($type != '') ? ' btn-' . $type : '') . (($size != '') ? ' btn-' . $size : '') . (($state == 'disabled') ? ' disabled' : ''); ?>">
    <?php echo $this->get('content'); ?>
</button>