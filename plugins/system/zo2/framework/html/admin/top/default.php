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
                        <select class="form-control zo2-select-profile" onchange="zo2.admin.ajax.loadProfile(this.value);
                                return false;" name="jform[profile-select]" data-url="http://localhost/cleversoft/zo2_j3/administrator/index.php?option=com_templates&amp;view=style&amp;layout=edit&amp;id=11&amp;profile=default" aria-invalid="false">
                            <!-- Display list of profiles -->
                            <option value="default" selected="selected">default                </option>
                            <option value="default" selected="selected">default                </option>
                            <option value="xxyyxx">xxyyxx                </option>
                            <option value="xyx">xyx                </option>
                            <option value="xyzxxx">xyzxxx                </option>
                        </select>
                        <div class="btn-group">
                            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Backup</a></li>
                            </ul>
                        </div>
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

