<?php
/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @version     1.4.3
 * @since       1.4.3
 * @uses        For Joomla! 3.x
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');
?>
<!------------ Layout Builder -------------->
<div class="tab-pane" id="zo2-layout">
    <h2><?php echo JText::_('ZO2_ADMIN_LAYOUT_BUILDER'); ?></h2>
    <div class="zo2-divider"></div>

    <?php
    echo Zo2Html::field(
        'description', null, array(
            'text' => JText::_('ZO2_ADMIN_DESCRIPTION_LAYOUTS'),
            'subtext' => '<a href="http://docs.zootemplate.com/category/zo2/layoutbuilder">Document</a>'
        ));
    ?>

    <?php echo Zo2Html::_('admin', 'builder'); ?>   
</div>