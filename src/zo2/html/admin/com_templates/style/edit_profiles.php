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
$profileName = $jinput->get('profile', 'default'); /* Request profile */
$profiles = $framework->getProfiles();
?>
<p>Store your modifications in a layout profile and assign it to different pages. The default layout will be used on pages without an assigned layout</p>
<div class="row-fluid">
    <div class="span6">
        <div class="control-group">
            <div class="control-label">
                Select profile
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
                        Load Profile
                    </button>
                    <!-- Add -->
                    <button class="btn btn-default" id="zo2-addProfile" >Add</button>
                    <!-- Do not allow to rename & remove when we only have 1 profile -->
                    <?php if (count($profiles) > 1 && $profileName != 'default') { ?>
                        <button class="btn btn-default" id="zo2-renameProfile" data-url="<?php echo JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . JFactory::getApplication()->input->get('id')); ?>">Rename</button>
                        <button class="btn btn-default" id="zo2-removeProfile" data-url="<?php echo JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . JFactory::getApplication()->input->get('id') . '&task=remove'); ?>">Remove</button>
                    <?php } ?>
                </span>
                <!-- Add new profile -->
                <div class="zo2-form-newProfile" id="zo2-form-addProfile" style="display: none;">
                    <p>Please enter new profile name</p>
                    <input type="text" id="zo2-profile-name" name="profile-name" />
                    <span class="input-group-btn">
                        <button 
                            class="btn btn-default" 
                            id="zo2-save-profile" 
                            data-url="<?php echo JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . JFactory::getApplication()->input->get('id')); ?>">Save</button>
                        <button class="btn btn-default" id="zo2-cancel-profile">Cancel</button>
                    </span>
                </div>
                <!-- Rename profile -->
                <div class="zo2-form-newProfile" id="zo2-form-renameProfile" style="display: none;">
                    <p>Please enter layout profile name</p>
                    <input type="text" id="zo2-new-profile-name" name="new-profile-name" />
                    <span class="input-group-btn">
                        <button class="btn btn-default" id="zo2-rename-profile" data-url="<?php echo JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . JFactory::getApplication()->input->get('id')); ?>">Save</button>
                        <button class="btn btn-default" id="zo2-cancel-rename-profile">Cancel</button>
                    </span>
                </div>
                <input type="hidden" name="profile-id" value="<?php echo JFactory::getApplication()->input->get('id'); ?>"/>
            </div>
        </div>

    </div>
</div>
