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
$currentProfile = Zo2Factory::getProfile();
$url = JUri::getInstance();
$url->setVar('zo2_task', 'admin.downloadBackup');
$downloadProfileUrl = $url->toString();
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
            <div class="navbar-inner navbar-profiles">
                <div class="zo2-profiles-description">
                    <span><?php echo JText::_('ZO2_ADMIN_BUTTON_PROFILE_DESCRIPTION'); ?></span>
                </div>
                <div class="pull-left">
                    <!-- Profiles -->
                    <div class="zo2-profiles">                                
                        <div class="navbar-form pull-left">
                            <label class="pull-left zo2-name-profile"><?php echo JText::_('ZO2_PROFILE'); ?></label>
                            <?php
                            echo Zo2Html::field('profiles', array(
                                'label' => JText::_('ZO2_ADMIN_LABEL_SELECT_PROFILE')
                                    ), array(
                                'profile' => $currentProfile,
                                'profiles' => Zo2Framework::getInstance()->getProfiles()
                            ));
                            ?>
                            <button type="button" class="btn btn-primary pull-left" onClick="zo2.admin.profile.modalSaveAs();
                                    return false;">
                                        <?php echo JText::_('ZO2_ADMIN_BUTTON_PROFILE_SAVE_AS'); ?>
                            </button>
                            <?php if ($currentProfile->authorise('rename')) : ?>
                                <button type="button" class="btn btn-default pull-left" onClick="zo2.admin.profile.modalRename();
                                        return false;">
                                            <?php echo JText::_('ZO2_ADMIN_BUTTON_PROFILE_RENAME'); ?>
                                </button>
                            <?php endif; ?>
                            <?php if ($currentProfile->authorise('delete')) : ?>
                                <button type="button" class="btn btn-danger pull-left" onClick="zo2.admin.profile.delete();
                                        return false;">
                                            <?php echo JText::_('ZO2_ADMIN_BUTTON_PROFILE_DELETE'); ?>
                                </button>
                            <?php endif; ?>                           

                            <!-- Select profile -->
                            <label class="pull-left zo2-name-profile"><?php echo JText::_('ZO2_USE_PROFILE'); ?></label>
                            <select id="zo2-profile" class="form-control pull-left" name="jform[params][profile]" >
                                <!-- Display list of profiles -->
                                <?php $profiles = Zo2Framework::getInstance()->getProfiles(); ?>
                                <?php foreach ($profiles as $profile): ?>
                                    <option value="<?php echo trim($profile->name); ?>" <?php echo ($profile->name == Zo2Framework::getInstance()->template->params->get('profile')) ? 'selected="selected"' : ''; ?> ><?php echo trim($profile->name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-default" onclick="zo2.admin.clearCache();
                            return false;">
                                <?php echo JText::_('ZO2_ADMIN_BUTTON_CLEAR_CACHE'); ?>
                    </button>
                    <button type="button" class="btn btn-primary" onclick="zo2.admin.buildAssets();
                            return false;">
                            <?php echo JText::_('ZO2_ADMIN_BUTTON_COMPILE'); ?>
                    </button>
                </div>
            </div>
        </div>
        <br />
    </div>   
</div>