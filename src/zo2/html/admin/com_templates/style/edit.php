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

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
$user = JFactory::getUser();
JHTML::_('behavior.tooltip');
?>
<div id="zo2messages"></div>
<div id="zo2framework" class="<?php echo Zo2Framework::isJoomla25() ? 'joomla-25' : 'joomla-3' ?>" >
    <form id="adminForm" action="<?php echo JRoute::_('index.php?option=com_templates&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="style-form" class="form-validate form-horizontal" data-zo2ajax='{"on":"submit"}'>
        <fieldset id="zo2fields" class="">
            <!-- tabs header -->
            <ul class="nav nav-tabs main-navigator" id="main-navigator">
                <!-- Default active tab -->
                <li class="active">
                    <a href="#overview" data-toggle="tab"><i class="icon-info fa-lg"></i> Overview</a>
                </li>
                <li>
                    <a href="#general" data-toggle="tab"><i class="icon-cog fa-lg"></i> General</a>
                </li>
                <li>
                    <a href="#fonts" data-toggle="tab"><i class="icon-font fa-lg"></i> Fonts</a>
                </li>
                <li>
                    <a href="#theme" data-toggle="tab"><i class="icon-columns fa-lg"></i> Layout Profiles</a>
                </li>
                <li>
                    <a href="#megamenu" data-toggle="tab"><i class="fa fa-navicon fa-lg"></i> Mega Menus</a>
                </li>
                <li>
                    <a href="#assignment" data-toggle="tab"><i class="icon-edit-sign fa-lg"></i> Assignment</a>
                </li>
                <li>
                    <a href="#advanced" data-toggle="tab"><i class="icon-wrench fa-lg"></i> Advanced</a>
                </li>
            </ul>
            <!-- /tabs header -->
            <!-- tabs content -->
            <div class="tab-content main-navigator">
                    <a href="http://zo2framework.org" target="_blank" id="logo" title="Zo2 Framework"></a>
                    <div class="tab-pane active" id="overview">
                        <?php echo $this->loadTemplate('overview'); ?>
                    </div>
                    <div class="tab-pane" id="general">
                        <?php echo $this->loadTemplate('general'); ?>
                    </div>
                    <div class="tab-pane" id="fonts">
                        <?php echo $this->loadTemplate('fonts'); ?>
                    </div>
                    <div class="tab-pane" id="theme">
                        <div class="profiles-pane">
                            <h3 class="title-profile">Layouts Profiles</h3>
                            <?php echo $this->loadTemplate('profiles'); ?>
                        </div>
                        <div class="profiles-pane">
                            <h3 class="title-profile">Layout Builder</h3>
                            <?php echo $this->loadTemplate('layoutbuilder'); ?>
                        </div>
                        <div class="profiles-pane">
                            <h3 class="title-profile">Style</h3>
                            <?php echo $this->loadTemplate('themecolors'); ?>
                        </div>
                    </div>
                    <div class="tab-pane" id="megamenu">
                        <?php echo $this->loadTemplate('megamenu'); ?>
                    </div>
                    <div class="tab-pane" id="assignment">
                        <?php echo $this->loadTemplate('assignment'); ?>
                    </div>
                    <div class="tab-pane" id="advanced">
                        <?php echo $this->loadTemplate('advanced'); ?>
                    </div>
            </div>
            <!-- /tabs content -->
        </fieldset>
        <input type="hidden" name="task" value="" />
        <?php echo JHtml::_('form.token'); ?>
    </form>
</div>