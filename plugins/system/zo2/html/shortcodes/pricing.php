
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
$shortcodes = Zo2Shortcodes::getInstance();
?>
<div class="pricing_wrap_<?php echo $this->get('cols'); ?>"
     <?php echo $shortcodes->execute($this->get('content')); ?>
</div> 