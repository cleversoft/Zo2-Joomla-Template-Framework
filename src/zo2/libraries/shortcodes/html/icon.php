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
$name = 'fa fa-' . $this->get('name');
$size = ( $this->get('size') ) ? 'fa-' . $this->get('size') : '';
?>
<i class="zo2-icon-<?php echo $this->get('name'); ?> <?php echo $name; ?><?php echo $size; ?>"></i>