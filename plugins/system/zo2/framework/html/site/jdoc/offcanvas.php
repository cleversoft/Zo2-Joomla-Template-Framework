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
<?php if (Zo2Framework::getInstance()->document->countModules('zo2-offcanvas')) : ?>
    <a href="#" onClick="zo2.offcanvas.show(); ? >"><i class="fa fa-bars fa-3"></i></a>
<?php endif; ?>