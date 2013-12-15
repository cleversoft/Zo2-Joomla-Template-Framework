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
$content = $params->get('content');
$shortcodes = new Zo2Shortcodes();
?>
<ul class='zt-accordion'>
    <?php if ($content) { ?>
        <?php echo $shortcodes->process($content); ?>
    <?php } ?>
</ul>