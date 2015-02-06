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
<select id="zo2-profiles" class="form-control pull-left" onchange="zo2.admin.profile.load(this.value);
        return false;" name="zo2[profiles]" >
    <!-- Display list of profiles -->
    <?php foreach ($this->data['profiles'] as $profile): ?>
        <option value="<?php echo trim($profile->name); ?>" <?php echo ($profile->name == $this->data['profile']->name) ? 'selected="selected"' : ''; ?> ><?php echo trim($profile->name); ?></option>
    <?php endforeach; ?>
</select>
<input type="hidden" name="profile-id" value="<?php echo Zo2Framework::getParam('id'); ?>">