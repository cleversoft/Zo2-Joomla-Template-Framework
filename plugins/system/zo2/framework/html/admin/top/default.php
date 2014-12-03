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
        <div id="zo2-messages" class="zo2-messages wrapper">           
        </div>

        <!-- Overlay -->
        <div id="zo2-overlay" class="zo2-overlay hide">
            <span class="zo2-overlay-loadding"></span>
        </div>

        <!-- Navbar -->
        <div class="navbar">
            <div class="navbar-inner">   
                <div class="pull-left">
                    <div class="zo2-profiles">                        
                        <div class="navbar-form pull-left">                            
                            <?php
                            echo Zo2Html::field('profiles', array(
                                'label' => JText::_('ZO2_ADMIN_LABEL_SELECT_PROFILE')
                                    ), array(
                                'profile' => Zo2Factory::getProfile(),
                                'profiles' => Zo2Factory::getFramework()->getProfiles()
                            ));
                            ?>                           
                        </div>
                        <button type="button" class="btn btn-primary" onClick="zo2.admin.profile.modalCreateProfile();
                                return false;">Save as copy</button>
                        <button type="button" class="btn btn-default" onClick="admin.profile.rename();
                                return false;">Rename</button>
                        <button type="button" class="btn btn-danger" onClick="admin.profile.delete();
                                return false;">Delete</button>
                    </div>

                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-danger" onclick="zo2.admin.clearCache();
                            return false;"><?php echo JText::_('ZO2_NAVBAR_CLEAR_CACHE'); ?></button>
                    <button type="button" class="btn btn-primary" onclick="zo2.admin.buildAssets();
                            return false;"><?php echo JText::_('ZO2_NAVBAR_COMPILE'); ?></button>
                </div>
            </div>
        </div>
        <br />
    </div>   
</div>

