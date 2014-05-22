
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
                    $zo2 = Zo2Framework::getInstance();
                    $profileName = $jinput->get('profile', $zo2->get('profile', 'default'));
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
                </span>
            </div>
        </div>
    </div>
    <div class="span6">
        <div class="control-group">
            <div class="control-label">
                Create new profile
            </div>
            <div class="controls">
                <div class="input-group">
                    <input type="text" class="form-control zo2_profile_name" placeholder="Profile name" name="jform[params][profile]">
                </div>
            </div>
        </div>

    </div>
</div>
