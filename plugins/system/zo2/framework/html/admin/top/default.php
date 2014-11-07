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
<div class="row-fluid">
    <div class="span12">
        <div id="zo2-messages" class="zo2-messages wrapper"></div>
        <section class="zo2-top">
            <div class="well well-small">
                <div class="profiles-pane-inner">
                    <p>Store your modifications in a layout profile and assign it to different pages. The default layout will be used on pages without an assigned layout</p>
                    <div class="row-fluid">
                        <div class="span6">
                            <?php echo Zo2Html::field('profiles', array(), array()); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>        
    </div>   
</div>

