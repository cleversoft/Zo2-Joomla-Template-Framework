<?php
/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');
?>
<!-- Select profile -->
<div class="control-group">
    <!-- Label -->
    <div class="control-label"><?php echo $this->label['label']; ?></div>
    <div class="controls">        
        <!-- Select profile -->        
        <?php
        $juri = JUri::getInstance();
        $juri->setVar('profile', $this->data['profile']->name);
        ?>
        <select class="form-control zo2-select-profile" onchange="zo2.admin.ajax.loadProfile(this.value);
                return false;" name="jform[profile-select]" data-url="<?php echo $juri->toString(); ?>">
            <!-- Display list of profiles -->
            <?php foreach ($this->data['profiles'] as $profile): ?>
                <option value="<?php echo trim($profile->name); ?>" 
                        <?php echo ($profile->name == $this->data['profile']->name) ? 'selected="selected"' : ''; ?> ><?php echo $profile->name; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <div class="btn-toolbar" style="margin: 0;">
            <div class="btn-group">
                <!-- Add new profile -->
                <?php if ($this->data['profile']->authorise('add')) : ?>            
                    <div class="zo2-addProfile">            
                        <span class="input-group-btn">            
                            <button class="btn btn-default" id="zo2-addProfile" onClick="jQuery('#zo2-form-addProfile').toggle();
                                        return false;">Create new profile</button> 
                        </span>
                    </div>
                <?php endif; ?>

                <!-- Rename profile -->
                <?php if ($this->data['profile']->authorise('rename')) : ?>    
                    <div class="zo2-renameProfile">
                        <span class="input-group-btn">            
                            <button class="btn btn-default" id="zo2-renameProfile" onClick="jQuery('#zo2-form-renameProfile').toggle();
                                        return false;">Rename</button> 
                        </span>
                    </div>
                <?php endif; ?>

                <!-- Remove profile -->
                <?php if ($this->data['profile']->authorise('remove')) : ?>    
                    <div class="zo2-renameProfile">
                        <span class="input-group-btn">            
                            <button class="btn btn-danger" id="zo2-renameProfile" onClick="zo2.admin.profile.remove('<?php echo $this->data['profile']->name; ?>', '<?php echo Zo2Factory::getFramework()->template->id; ?>');
                                        return false;">Delete</button> 
                        </span>                  
                    </div>
                <?php endif; ?>
            </div>

        </div>

        <div class="btn-toolbar-wap">
            <div>
                <!-- Add new profile -->
                <?php if ($this->data['profile']->authorise('add')) : ?>
                    <div class="zo2-addProfile">
                        <div class="zo2-form-addProfile" id="zo2-form-addProfile">
                            <p>Please enter new profile name</p>
                            <input type="text" id="zo2-profile-name" name="profile-name">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" id="zo2-save-profile" onclick="zo2.admin.profile.add();
                                            return false;">Save</button>
                                <button class="btn btn-default" id="zo2-cancel-profile" onclick="jQuery('zo2-form-addProfile').toggle();
                                            return false;">Cancel</button>
                            </span>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Rename profile -->
                <?php if ($this->data['profile']->authorise('rename')) : ?>
                    <div class="zo2-renameProfile">
                        <div class="zo2-form-newProfile" id="zo2-form-renameProfile" style="">
                            <p>Please enter layout profile name</p>
                            <input type="text" id="zo2-new-profile-name" name="newProfileName">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" id="zo2-rename-profile" onclick="zo2.admin.profile.rename('<?php echo $this->data['profile']->name; ?>');
                                    return false;">Save</button>
                                <button class="btn btn-default" id="zo2-cancel-rename-profile">Cancel</button>
                            </span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>


        <input type="hidden" name="profile-id" value="<?php echo Zo2Factory::getFramework()->get('id'); ?>">
    </div>
    <div class="row-fluid">
        <div class="span12">
            <button class="btn btn-primary" id="btnBackupProfile" onClick="window.open('<?php echo JUri::getInstance()->toString() . '&zo2_task=downloadBackup&tmpl=raw'; ?>');
                    return false;" data-toggle="button" data-loading-text="Processing..." >Backup</button>            
        </div>
    </div>
</div>