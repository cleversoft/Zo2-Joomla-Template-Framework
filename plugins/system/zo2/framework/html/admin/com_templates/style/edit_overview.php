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
defined('_JEXEC') or die;

$framework = Zo2Factory::getFramework();
$templateManifest = $framework->getTemplateManifest();
?>
<div class="overview-details">
    <div class="row-fluid">
        <div class="span4">
            <div class="control-group">
                <div class="control-label">
                    <?php echo $this->form->getLabel('title'); ?>
                </div>
                <div class="controls">
                    <?php echo $this->form->getInput('title'); ?>
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="control-group">
                <div class="control-label">
                    <?php echo $this->form->getLabel('template'); ?>
                </div>
                <div class="controls">
                    <?php echo $this->form->getInput('template'); ?>
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="control-group">
                <div class="control-label">
                    <?php echo $this->form->getLabel('home'); ?>
                </div>
                <div class="controls">
                    <?php echo $this->form->getInput('home'); ?>
                </div>
            </div>
        </div>

        <div class="span1">
            <div class="control-group">
                <div class="control-label">
                    <?php echo $this->form->getLabel('client_id'); ?>
                </div>
                <div class="controls">
                    <?php echo $this->form->getInput('client_id'); ?>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="template-preview">
    <div class="row-fluid">
        <div class="span4">
            <div class="template-description">
                <h3 class="title-profile dark-bg"><?php echo $templateManifest->name . ' ' . $templateManifest->version; ?></h3>
                <?php echo $templateManifest->description; ?>
            </div>
        </div>
        <div class="span4">
            <h3 class="title-profile dark-bg"><?php echo JText::_('ZO2_ADMIN_EDITOVERVIEW_KEY_FEATURES'); ?></h3>
            <ul>
                <?php echo JText::_('ZO2_ADMIN_EDITOVERVIEW_FEATURE_LIST'); ?>
            </ul>
            <h3 class="title-profile dark-bg">
                <?php echo JText::_('ZO2_ADMIN_EDITOVERVIEW_CREDITS'); ?>
            </h3>
            <ul>
                <li>
                    <a title="Bootstrap" href="http://getbootstrap.com/"><?php echo JText::_('ZO2_ADMIN_EDITOVERVIEW_BOOTSTRAP'); ?></a> <?php echo JText::_('ZO2_ADMIN_EDITOVERVIEW_BOOTSTRAP_DESCRIPTION'); ?>
                </li>
                <li><a title="FontAwesome" href="http://fontawesome.io/"><?php echo JText::_('ZO2_ADMIN_EDITOVERVIEW_FONTAWESOME'); ?></a> <?php echo JText::_('ZO2_ADMIN_EDITOVERVIEW_FONTAWESOME_DESCRIPTION'); ?></li>
                <li><?php echo JText::_('ZO2_ADMIN_EDITOVERVIEW_ZO2HALLO_DESIGN_BY'); ?> <a href="http://www.zootemplate.com" title="zootemplate">Zootemplate.com</a></li>
            </ul>
        </div>
        <div class="span4">
            <div id="updater" class="alert">
                <?php
                /* Get framework from factory */
                $framework = Zo2Factory::getFramework();
                ?>
                <div id="updater-bar">Zo2 v<span><?php echo $framework->getManifest()->version; ?></span></div>
                <?php
                $update = false;
                $version = $framework->checkVersion();
                switch ($version['compare']) {
                    case -1:
                        $update = true;
                        $message = JText::printf('ZO2_ADMIN_EDITOVERVIEW_AVAILBLE_VERSION=', $version['latestVersion']);
                        break;
                    case 0:
                        $message = JText::_('ZO2_ADMIN_EDITOVERVIEW_UP_TO_DATE');
                        break;
                    case 1:
                        $message = JText::_('ZO2_ADMIN_EDITOVERVIEW_ALIEN_VER');
                        break;
                }
                ?>
                <strong><?php echo $message; ?></strong>
                <?php if ($update) { ?>
                    <div id="updater-desc">
                        Please <a href="<?php echo JUri::root(); ?>administrator/index.php?option=com_installer&amp;view=update" class="btn btn-success btn-small"><i class="icon-white icon-circle-arrow-down"></i> download</a> the latest version now.
                        <blockquote>
                            <small><strong><?php echo JText::_('ZO2_ADMIN_EDITOVERVIEW_ATTENTION'); ?></strong> <span><?php echo JText::_('ZO2_ADMIN_EDITOVERVIEW_COMPATIBLE') . ' ' . $version['latestVersion']; ?></span></small>
                        </blockquote>
                    </div>
                <?php } ?>
            </div>
            <div class="zo2-tip well dark-bg" style="display: block;">
                <div class="zo2-tip-bar">
                    <h3 class="title-dark"><?php echo JText::_('ZO2_ADMIN_EDITOVERVIEW_MORE_HELP'); ?></h3>
                </div>
                <p><?php echo JText::_('ZO2_ADMIN_EDITOVERVIEW_MORE_HELP_LINK'); ?></p>
                <ul>
                    <li><?php echo JText::_('ZO2_ADMIN_EDITOVERVIEW_OFFICAL_WEBSITE'); ?>: <a target="_blank" href="http://zo2framework.org" title="Zo2 Template Framework">http://zo2framework.org</a></li>
                    <li><a target="_blank" href="http://zo2framework.org/index.php/license-usage" title="License &amp; Usage"><?php echo JText::_('ZO2_ADMIN_EDITOVERVIEW_LICENSE_USAGE'); ?></a></li>
                    <li><?php echo JText::_('ZO2_ADMIN_EDITOVERVIEW_DOCUMENT'); ?> <a target="_blank" href="http://docs.zo2framework.org/" title="Zo2 Documents">http://docs.zo2framework.org/</a></li>
                    <li><?php echo JText::_('ZO2_ADMIN_EDITOVERVIEW_GITHUB'); ?>: <a target="_blank" href="https://github.com/aploss/zo2" title="Fork Zo2 on Github">https://github.com/aploss/zo2</a></li>
                    <li><?php echo JText::_('ZO2_ADMIN_EDITOVERVIEW_DEMO'); ?>: <a target="_blank" href="http://demo.zo2framework.org/" title="Demo Zo2 Blank Template">http://demo.zo2framework.org/</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>