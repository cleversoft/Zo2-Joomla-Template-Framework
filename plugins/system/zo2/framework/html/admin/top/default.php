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
        <section class="zo2-top">
            <div class="well well-small">
                <div class="profiles-pane-inner">
                    <p>Store your modifications in a layout profile and assign it to different pages. The default layout will be used on pages without an assigned layout</p>
                    <div class="row-fluid">
                        <div class="span6">
                            <!-- Select profile -->
                            <div class="control-group">
                                <div class="control-label">Select profile</div>
                                <div class="controls">
                                    <!-- Select profile -->
                                    <select class="form-control zo2-select-profile">
                                        <option value="default" selected="">default</option>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>   
</div>

