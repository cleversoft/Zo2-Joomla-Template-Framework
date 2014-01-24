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
?>
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