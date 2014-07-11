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
defined('_JEXEC') or die;
/* Get Zo2Framework */
$framework = Zo2Factory::getFramework();
$jinput = JFactory::getApplication()->input;
// Initiasile related data.
require_once JPATH_ADMINISTRATOR . '/components/com_menus/helpers/menus.php';
$menuTypes = MenusHelper::getMenuLinks();
$user = JFactory::getUser();
$profileAssign = $framework->get('profile');
$profileName = $jinput->get('profile', 'default'); /* Request profile */
$profiles = $framework->getProfiles();
?>
<p><?php echo JText::_('ZO2_ADMIN_EDITPROFILE_SAVE_MODIFICATIONS'); ?></p>
<div class="row-fluid">
    <div class="span6">
        <div class="control-group">
            <div class="control-label">
                <?php echo JText::_('ZO2_ADMIN_EDITPROFILE_SELECT_PROFILE'); ?>
            </div>
            <div class="controls">
                <!-- Select profile -->
                <select class="form-control zo2-select-profile" name="jform[profile-select]">
                    <?php
                    foreach ($profiles as $profile) {
                        if ($profile->name == $profileName) {
                            echo '<option value="' . $profile->name . '" selected>' . $profile->name . '</option>';
                        } else {
                            echo '<option value="' . $profile->name . '">' . $profile->name . '</option>';
                        }
                    }
                    ?>
                </select>

                <span class="input-group-btn">
                    <!-- Load profile -->
                    <button 
                        class="btn btn-default" id="zo2-loadProfile" 
                        data-url="<?php echo JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . JFactory::getApplication()->input->get('id')); ?>">
                        <?php echo JText::_('ZO2_ADMIN_EDITPROFILE_LOAD'); ?>
                    </button>
                    <!-- Add -->
                    <button class="btn btn-default" id="zo2-addProfile" ><?php echo JText::_('ZO2_ADMIN_EDITPROFILE_ADD'); ?></button>
                    <!-- Do not allow to rename & remove when we only have 1 profile -->
                    <?php if (count($profiles) > 1 && $profileName != 'default') { ?>
                    <button class="btn btn-default" id="zo2-renameProfile" data-url="<?php echo JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . JFactory::getApplication()->input->get('id')); ?>"><?php echo JText::_('ZO2_ADMIN_EDITPROFILE_RENAME'); ?></button>
                        <button class="btn btn-default" id="zo2-removeProfile" data-url="<?php echo JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . JFactory::getApplication()->input->get('id') . '&task=remove'); ?>"><?php echo JText::_('ZO2_ADMIN_EDITPROFILE_REMOVE'); ?></button>
                    <?php } ?>
                </span>
                <!-- Add new profile -->
                <div class="zo2-form-newProfile" id="zo2-form-addProfile" style="display: none;">
                    <p><?php echo JText::_('ZO2_ADMIN_EDITPROFILE_PROFILE_NAME_REQUIRE'); ?></p>
                    <input type="text" id="zo2-profile-name" name="profile-name" />
                    <span class="input-group-btn">
                        <button 
                            class="btn btn-default" 
                            id="zo2-save-profile" 
                            data-url="<?php echo JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . JFactory::getApplication()->input->get('id')); ?>"><?php echo JText::_('ZO2_ADMIN_EDITPROFILE_SAVE'); ?></button>
                        <button class="btn btn-default" id="zo2-cancel-profile"><?php echo JText::_('ZO2_ADMIN_EDITPROFILE_CANCEL'); ?></button>
                    </span>
                </div>
                <!-- Rename profile -->
                <div class="zo2-form-newProfile" id="zo2-form-renameProfile" style="display: none;">
                    <p><?php echo JText::_('ZO2_ADMIN_EDITPROFILE_LAYOUT_NAME_REQUIRE'); ?></p>
                    <input type="text" id="zo2-new-profile-name" name="new-profile-name" />
                    <span class="input-group-btn">
                        <button class="btn btn-default" id="zo2-rename-profile" data-url="<?php echo JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . JFactory::getApplication()->input->get('id')); ?>"><?php echo JText::_('ZO2_ADMIN_EDITPROFILE_SAVE'); ?></button>
                        <button class="btn btn-default" id="zo2-cancel-rename-profile"><?php echo JText::_('ZO2_ADMIN_EDITPROFILE_CANCEL'); ?></button>
                    </span>
                </div>
                <input type="hidden" name="profile-id" value="<?php echo JFactory::getApplication()->input->get('id'); ?>"/>
            </div>
        </div>

    </div>
</div>
