<?php
/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      Duc Nguyen <ducntv@gmail.com>
 * @author      Hiepvu <vqhiep2010@gmail.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */

defined('_JEXEC') or die;
?>

<fieldset>
    <legend><span class="zo2-label label-info">Google</span></legend>
    <div class="control-group">
        <div class="control-label">
            <?php echo $this->form->getLabel('ga_code', 'params'); ?>
        </div>
        <div class="controls">
            <?php echo $this->form->getInput('ga_code', 'params'); ?>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <?php echo $this->form->getLabel('enable_googleauthorship', 'params'); ?>
        </div>
        <div class="controls">
            <?php echo $this->form->getInput('enable_googleauthorship', 'params'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
            <?php echo $this->form->getLabel('google_profile_url', 'params'); ?>
        </div>
        <div class="controls">
            <?php echo $this->form->getInput('google_profile_url', 'params'); ?>
        </div>
    </div>

</fieldset>

<fieldset>
    <legend><span class="zo2-label label-info">Comments</span></legend>
    <div class="control-group">
        <div class="control-label">
            <?php echo $this->form->getLabel('enable_comments', 'params'); ?>
        </div>
        <div class="controls">
            <?php echo $this->form->getInput('enable_comments', 'params'); ?>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <?php echo $this->form->getLabel('tab_order', 'params'); ?>
        </div>
        <div class="controls">
            <?php echo $this->form->getInput('tab_order', 'params'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="control-label">
            <?php echo $this->form->getLabel('disqus_shortname', 'params'); ?>
        </div>
        <div class="controls">
            <?php echo $this->form->getInput('disqus_shortname', 'params'); ?>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <?php echo $this->form->getLabel('facebook_label', 'params'); ?>
        </div>
        <div class="controls">
            <?php echo $this->form->getInput('facebook_label', 'params'); ?>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <?php echo $this->form->getLabel('gplus_label', 'params'); ?>
        </div>
        <div class="controls">
            <?php echo $this->form->getInput('gplus_label', 'params'); ?>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <?php echo $this->form->getLabel('disqus_label', 'params'); ?>
        </div>
        <div class="controls">
            <?php echo $this->form->getInput('disqus_label', 'params'); ?>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <?php echo $this->form->getLabel('disqus_label', 'params'); ?>
        </div>
        <div class="controls">
            <?php echo $this->form->getInput('disqus_label', 'params'); ?>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <?php echo $this->form->getLabel('k2comment_label', 'params'); ?>
        </div>
        <div class="controls">
            <?php echo $this->form->getInput('k2comment_label', 'params'); ?>
        </div>
    </div>

</fieldset>



