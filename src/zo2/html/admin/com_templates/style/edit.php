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

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
$user = JFactory::getUser();
$canDo = TemplatesHelper::getActions();

if (Zo2Framework::isZo2Template()) :
?>
<form id="adminForm" action="<?php echo JRoute::_('index.php?option=com_templates&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="style-form" class="form-validate form-horizontal">
	<fieldset id="zo2" class="<?php echo Zo2Framework::isJoomla25() ? 'zo2_j25' : 'zo2_j3'?>">
        <!-- tabs header -->
        <ul class="nav nav-tabs" id="zo2Tabs">
            <li class="active">
                <a href="#overview" data-toggle="tab"><i class="icon-info"></i> Overview</a>
            </li>
            <li>
                <a href="#general" data-toggle="tab"><i class="icon-cog"></i> General</a>
            </li>
            <li>
                <a href="#fonts" data-toggle="tab"><i class="icon-font"></i> Fonts</a>
            </li>
            <li>
                <a href="#theme" data-toggle="tab"><i class="icon-pencil"></i> Preset Styles</a>
            </li>
            <li>
                <a href="#layoutbuiler" data-toggle="tab"><i class="icon-th"></i> Layout Builder</a>
            </li>
            <li>
                <a href="#megamenu" data-toggle="tab"><i class="icon-list-alt"></i> Mega Menus</a>
            </li>
            <li>
                <a href="#assignment" data-toggle="tab"><i class="icon-edit-sign"></i> Assignment</a>
            </li>
            <li>
                <a href="#advanced" data-toggle="tab"><i class="icon-wrench"></i> Advanced</a>
            </li>
        </ul>
        <!-- /tabs header -->
        <!-- tabs content -->
        <div class="tab-content">
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
                <?php echo $this->loadTemplate('themecolors'); ?>
            </div>
            <div class="tab-pane" id="layoutbuiler">
                <?php echo $this->loadTemplate('layoutbuilder'); ?>
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

<?php else : ?>
<form id="adminForm" action="<?php echo JRoute::_('index.php?option=com_templates&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="style-form" class="form-validate form-horizontal">
    <fieldset>
        <!-- tabs header -->
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#details" data-toggle="tab"><i class="icon-info"></i> <?php echo JText::_('JDETAILS', true)?></a>
            </li>
            <li>
                <a href="#options" data-toggle="tab"><i class="icon-cog"></i> <?php echo JText::_('JOPTIONS', true)?></a>
            </li>
        <?php if ($user->authorise('core.edit', 'com_menu') && $this->item->client_id == 0):?>
        <?php if ($canDo->get('core.edit.state')) : ?>
                <li>
                    <a href="#assignment" data-toggle="tab"><i class="icon-cog"></i> <?php echo JText::_('COM_TEMPLATES_MENUS_ASSIGNMENT', true)?></a>
                </li>
        <?php endif; endif; ?>
        </ul>
        <!-- /tabs header -->
        <!-- tabs content -->
        <div class="tab-content">
            <div class="tab-pane active" id="details">
                <div class="control-group">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('title'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('title'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('template'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('template'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('client_id'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('client_id'); ?>
                        <input type="text" size="35" value="<?php echo $this->item->client_id == 0 ? JText::_('JSITE') : JText::_('JADMINISTRATOR'); ?>	" class="readonly" readonly="readonly" />
                    </div>
                </div>
                <div class="control-group">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('home'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('home'); ?>
                    </div>
                </div>
                <?php if ($this->item->id) : ?>
                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $this->form->getLabel('id'); ?>
                        </div>
                        <div class="controls">
                            <span class="disabled"><?php echo $this->item->id; ?></span>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($this->item->xml) : ?>
                    <?php if ($text = trim($this->item->xml->description)) : ?>
                        <div class="control-group">
                            <label class="control-label">
                                <?php echo JText::_('COM_TEMPLATES_TEMPLATE_DESCRIPTION'); ?>
                            </label>
                            <div class="controls">
                                <span class="disabled"><?php echo JText::_($text); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php else : ?>
                    <div class="alert alert-error"><?php echo JText::_('COM_TEMPLATES_ERR_XML'); ?></div>
                <?php endif; ?>
            </div>
            <div class="tab-pane" id="options">
                <?php echo $this->loadTemplate('options'); ?>
            </div>
            <?php if ($user->authorise('core.edit', 'com_menu') && $this->item->client_id == 0):?>
            <?php if ($canDo->get('core.edit.state')) : ?>
            <div class="tab-pane" id="assignment">
            <?php echo $this->loadTemplate('assignment'); ?>
            </div>
            <?php endif; ?>
            <?php endif;?>
        </div>
        <!-- /tabs content -->
    </fieldset>

    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
</form>
<?php endif; ?>