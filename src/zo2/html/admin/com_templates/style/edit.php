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
<div id="zo2framework" class="<?php echo Zo2Factory::isJoomla25() ? 'joomla-25' : 'joomla-3' ?>" >
    <form id="adminForm" action="<?php echo JRoute::_('index.php?option=com_templates&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="style-form" class="form-validate form-horizontal" data-zo2ajax='{"on":"submit"}'>
        <fieldset id="zo2fields" class="">
            <!-- tabs header -->
            <ul class="nav nav-tabs main-navigator" id="main-navigator">
                <!-- Default active tab -->
                <li class="active">
                    <a href="#overview" data-toggle="tab"><i class="icon-info fa-lg"></i> <?php echo(JText::_('ZO2_ADMIN_STYLEEDIT_OVERVIEW')); ?></a>
                </li>
                <li>
                    <a href="#general" data-toggle="tab"><i class="icon-cog fa-lg"></i> <?php echo(JText::_('ZO2_ADMIN_STYLEEDIT_GENERAL')); ?></a>
                </li>
                <li>
                    <a href="#fonts" data-toggle="tab"><i class="icon-font fa-lg"></i> <?php echo(JText::_('ZO2_ADMIN_STYLEEDIT_FONTS')); ?></a>
                </li>
                <li>
                    <a href="#theme" data-toggle="tab"><i class="icon-columns fa-lg"></i> <?php echo(JText::_('ZO2_ADMIN_STYLEEDIT_LAYOUT_PROFILES')); ?></a>
                </li>
                <li>
                    <a href="#megamenu" data-toggle="tab"><i class="fa fa-navicon fa-lg"></i> <?php echo(JText::_('ZO2_ADMIN_STYLEEDIT_MEGA_MENUS')); ?></a>
                </li>
                <li>
                    <a href="#assignment" data-toggle="tab"><i class="icon-edit-sign fa-lg"></i> <?php echo(JText::_('ZO2_ADMIN_STYLEEDIT_ASSIGNMENT')); ?></a>
                </li>
                <li>
                    <a href="#advanced" data-toggle="tab"><i class="icon-wrench fa-lg"></i> <?php echo(JText::_('ZO2_ADMIN_STYLEEDIT_ADVANCED')); ?></a>
                </li>
            </ul>
            <!-- /tabs header -->
            <!-- tabs content -->
            <div class="tab-content main-navigator">
                <a href="http://zo2framework.org" target="_blank" id="logo" title="<?php echo(JText::_('ZO2_ADMIN_COMMON_ZO2FRAMEWORK')); ?>"></a>
                    <div class="tab-pane active" id="overview">
                        <div class="profiles-pane">
                            <h3 class="title-profile"><?php echo(JText::_('ZO2_ADMIN_STYLEEDIT_OVERVIEW')); ?></h3>
                            <div class="profiles-pane-inner">
                                <?php echo $this->loadTemplate('overview'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="general">
                        <div class="profiles-pane">
                            <h3 class="title-profile"><?php echo(JText::_('ZO2_ADMIN_STYLEEDIT_GENERAL')); ?></h3>
                            <div class="profiles-pane-inner">
                                <?php echo $this->loadTemplate('general'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="fonts">
                        <div class="profiles-pane">
                            <h3 class="title-profile"><?php echo(JText::_('ZO2_ADMIN_STYLEEDIT_FONTS')); ?></h3>
                            <?php echo $this->loadTemplate('fonts'); ?>
                        </div>
                    </div>
                    <div class="tab-pane" id="theme">
                        <div class="profiles-pane">
                            <h3 class="title-profile"><?php echo(JText::_('ZO2_ADMIN_STYLEEDIT_LAYOUT_PROFILES')); ?></h3>
                            <div class="profiles-pane-inner">
                                <?php echo $this->loadTemplate('profiles'); ?>
                            </div>
                        </div>
                        <div class="profiles-pane">
                            <h3 class="title-profile"><?php echo(JText::_('ZO2_ADMIN_STYLEEDIT_LAYOUT_BUILDER')); ?></h3>
                            <div class="profiles-pane-inner">
                                <?php echo $this->loadTemplate('layoutbuilder'); ?>
                            </div>
                        </div>
                        <div class="profiles-pane">
                            <h3 class="title-profile"><?php echo(JText::_('ZO2_ADMIN_STYLEEDIT_STYLE')); ?></h3>
                            <div class="profiles-pane-inner">
                                <?php echo $this->loadTemplate('themecolors'); ?>
                            </div>
                        </div>
                        <div class="profiles-pane">
                            <h3 class="title-profile"><?php echo(JText::_('ZO2_ADMIN_STYLEEDIT_ASSIGN_LAYOUT')); ?></h3>
                            <div class="profiles-pane-inner">
                                <?php echo $this->loadTemplate('assignment_profiles'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="megamenu">
                        <div class="profiles-pane">
                            <h3 class="title-profile"><?php echo(JText::_('ZO2_ADMIN_STYLEEDIT_MEGA_MENUS')); ?></h3>
                            <div class="profiles-pane-inner">
                                <?php echo $this->loadTemplate('megamenu'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="assignment">
                        <div class="profiles-pane">
                            <h3 class="title-profile"><?php echo(JText::_('ZO2_ADMIN_STYLEEDIT_ASSIGNMENT')); ?></h3>
                            <div class="profiles-pane-inner">
                                <?php echo $this->loadTemplate('assignment'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="advanced">
                        <div class="profiles-pane">
                            <h3 class="title-profile"><?php echo(JText::_('ZO2_ADMIN_STYLEEDIT_ADVANCED')); ?></h3>
                            <div class="profiles-pane-inner">
                                <?php echo $this->loadTemplate('advanced'); ?>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- /tabs content -->
        </fieldset>
        <input type="hidden" name="task" value="" />
        <?php echo JHtml::_('form.token'); ?>
    </form>
</div>