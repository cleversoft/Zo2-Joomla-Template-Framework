
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
//no direct accees
defined('_JEXEC') or die('resticted aceess');
$shortcodes = Zo2Shortcodes::getInstance();
?>
<div class="pricing_wrap_<?php echo $this->get('cols'); ?>"
     <?php echo $shortcodes->execute($this->get('content')); ?>
</div> 