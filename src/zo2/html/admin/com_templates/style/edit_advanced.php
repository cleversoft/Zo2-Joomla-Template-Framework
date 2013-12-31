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
<div class="accordion" id="advanced-accordion">
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-google">
                <?php echo JText::_('Google')?>
            </a>
        </div>
        <div id="advanced-google" class="accordion-body collapse in">
            <div class="accordion-inner">
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
            </div>
        </div>
    </div>

    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-comments">
                <?php echo JText::_('Comments')?>
            </a>
        </div>
        <div id="advanced-comments" class="accordion-body collapse">
            <div class="accordion-inner">
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
            </div>
        </div>
    </div>

    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-social-sharing">
                <?php echo JText::_('Social Sharing')?>
            </a>
        </div>
        <div id="advanced-social-sharing" class="accordion-body collapse">
            <div class="accordion-inner">
                <div class="control-group">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('fb_action', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('fb_action', 'params'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('fb_send', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('fb_send', 'params'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('catid', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('catid', 'params'); ?>
                    </div>
                </div>

                <div class="control-group" id="display_type_choose">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('display_type', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('display_type', 'params'); ?>
                    </div>
                </div>
                <div class="control-group display_type_normal">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('show_in_article', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('show_in_article', 'params'); ?>
                    </div>
                </div>

                <div class="control-group display_type_normal">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('show_in_category', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('show_in_category', 'params'); ?>
                    </div>
                </div>

                <div class="control-group display_type_normal">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('show_in_featured', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('show_in_featured', 'params'); ?>
                    </div>
                </div>

                <div class="control-group display_type_normal">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('show_social_article_list', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('show_social_article_list', 'params'); ?>
                    </div>
                </div>

                <div class="control-group">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('normal_position', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('normal_position', 'params'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('floating_position', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('floating_position', 'params'); ?>
                    </div>
                </div>

                <div class="control-group">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('box_top', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('box_top', 'params'); ?>
                    </div>
                </div>

                <div class="control-group">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('box_left', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('box_left', 'params'); ?>
                    </div>
                </div>

                <div class="control-group">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('box_right', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('box_right', 'params'); ?>
                    </div>
                </div>

                <div class="control-group">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('box_style', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('box_style', 'params'); ?>
                    </div>
                </div>

                <div class="control-group">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('social_order', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('social_order', 'params'); ?>
                    </div>
                </div>


                <div class="control-group">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('button_layout', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('button_layout', 'params'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('social_position', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('social_position', 'params'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-advanced">
                <?php echo JText::_('Advanced Options')?>
            </a>
        </div>
        <div id="advanced-advanced" class="accordion-body collapse">
            <div class="accordion-inner">
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
                        <?php echo $this->form->getLabel('component_area', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('component_area', 'params'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('combine_css', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('combine_css', 'params'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('combine_js', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('combine_js', 'params'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('load_jquery', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('load_jquery', 'params'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-dev">
                <?php echo JText::_('Developer Options')?>
            </a>
        </div>
        <div id="advanced-dev" class="accordion-body collapse">
            <div class="accordion-inner">
                <div class="control-group">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('debug_visibility', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('debug_visibility', 'params'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('disable_mootools', 'params'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('disable_mootools', 'params'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>