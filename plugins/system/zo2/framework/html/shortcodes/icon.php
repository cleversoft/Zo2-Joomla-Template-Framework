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
$name = 'fa fa-' . $this->get('name');
$size = ( $this->get('size') ) ? 'fa-' . $this->get('size') : '';
?>
<i class="zo2-icon-<?php echo $this->get('name'); ?> <?php echo $name; ?><?php echo $size; ?>"></i>