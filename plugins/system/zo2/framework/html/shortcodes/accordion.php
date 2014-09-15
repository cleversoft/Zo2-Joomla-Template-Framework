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
$content = $this->get('content');
$shortcodes = Zo2Shortcodes::getInstance();
$_SESSION['accordion'] = 0;
?>
<div class="panel-group zt-accordion" id="accordion">
    <?php if ($content) { ?>
        <?php echo $shortcodes->execute($content); ?>
    <?php } ?>
</div>