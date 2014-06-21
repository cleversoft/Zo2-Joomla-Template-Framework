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
$zo2 = Zo2Framework::getInstance();
// Initiasile related data.
require_once JPATH_ADMINISTRATOR . '/components/com_menus/helpers/menus.php';
$menuTypes = MenusHelper::getMenuLinks();
$user = JFactory::getUser();
$profileAssign = $zo2->get('profile');
?>
<p>Store your modifications in a layout profile and assign it to different pages. The default layout will be used on pages without an assigned layout</p>
<div class="row-fluid">
    <div class="span6">
        <div class="control-group">
            <div class="control-label">
                Select profile
            </div>
            <div class="controls">
                <select class="form-control zo2_select_profile" name="jform[profile-select]">
                    <?php
                    $jinput = JFactory::getApplication()->input;

                    $profileName = $jinput->get('profile', 'default');
                    $profiles = $zo2->getProfiles();

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
                    <button class="btn btn-default" id="zo2-loadprofile" data-url="<?php echo JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . JFactory::getApplication()->input->get('id')); ?>">Load Profile</button>
                    <button class="btn btn-default" id="zo2-loadprofile" data-url="<?php echo JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . JFactory::getApplication()->input->get('id')); ?>">Add</button>
                    <button class="btn btn-default" id="zo2-loadprofile" data-url="<?php echo JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . JFactory::getApplication()->input->get('id')); ?>">Rename</button>
                    <button class="btn btn-default" id="zo2-loadprofile" data-url="<?php echo JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . JFactory::getApplication()->input->get('id')); ?>">Remove</button>
                </span>
            </div>
        </div>
        
    </div>
</div>
