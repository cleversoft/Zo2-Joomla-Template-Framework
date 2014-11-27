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

        <!-- Zo2 Messsage -->
        <div id="zo2-messages" class="zo2-messages wrapper hide">
                <button data-dismiss="alert" class="close" type="button">×</button>
                <div class="alert alert-success">
                    <h4 class="alert-heading">Message</h4>
                    <p>Style successfully saved</p>
                </div>
        </div>

        <!-- Overlay -->
        <div class="zo2-overlay hide">
            <span class="zo2-overlay-loadding"></span>
        </div>

        <section class="zo2-top">
            <div class="well well-small">
                <div class="profiles-pane-inner">
                    <p>Store your modifications in a layout profile and assign it to different pages. The default layout will be used on pages without an assigned layout</p>
                    <div class="row-fluid">
                        <div class="span6">
                            <?php
                            echo Zo2Html::field('profiles', array(
                                'label' => JText::_('ZO2_ADMIN_LABEL_SELECT_PROFILE')
                                    ), array(
                                'profile' => Zo2Factory::getProfile(),
                                'profiles' => Zo2Factory::getFramework()->getProfiles()
                            ));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>        
    </div>   
</div>

