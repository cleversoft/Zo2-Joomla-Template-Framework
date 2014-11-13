<!-- Select profile -->
<div class="control-group">
    <div class="control-label"><?php echo $this->label['label']; ?></div>
    <div class="controls">        
        <!-- Select profile -->        
        <select class="form-control zo2-select-profile" onchange="zo2.admin.ajax.loadProfile(this.value);
                return false;">
            <!-- Loop profiles -->
            <?php foreach ($this->data['profiles'] as $profile): ?>
                <option value="<?php echo $profile->name; ?>" 
                    <?php echo ($profile->name == $this->data['profile']->name) ? 'selected="selected"' : ''; ?> ><?php echo $profile->name; ?></option>
            <?php endforeach; ?>

        </select>

        <span class="input-group-btn">
            <!-- Add -->
            <button class="btn btn-default" id="zo2-addProfile">Add</button>
            <!-- Do not allow to rename & remove when we only have 1 profile -->
        </span>
        <!-- Add new profile -->
        <div class="zo2-form-newProfile" id="zo2-form-addProfile" style="display: none;">
            <p>Please enter new profile name</p>
            <input type="text" id="zo2-profile-name" name="profile-name">
            <span class="input-group-btn">
                <button class="btn btn-default" id="zo2-save-profile">Save</button>
                <button class="btn btn-default" id="zo2-cancel-profile">Cancel</button>
            </span>
        </div>
        <!-- Rename profile -->
        <div class="zo2-form-newProfile" id="zo2-form-renameProfile" style="display: none;">
            <p>Please enter layout profile name</p>
            <input type="text" id="zo2-new-profile-name" name="new-profile-name">
            <span class="input-group-btn">
                <button class="btn btn-default" id="zo2-rename-profile">Save</button>
                <button class="btn btn-default" id="zo2-cancel-rename-profile">Cancel</button>
            </span>
        </div>
        <input type="hidden" name="profile-id" value="11">
    </div>
    <div class="row-fluid">
        <div class="span12">
            <button class="btn btn-primary" id="btnBackupProfile" onClick="" data-toggle="button" data-loading-text="Processing..." >Backup</button>
            <button class="btn" id="btnRestoreProfile" onClick="" data-toggle="button" data-loading-text="Processing..." >Restore</button>
        </div>
    </div>
</div>