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

<?php

    echo JHtml::_('bootstrap.startAccordion', 'advanced', array('active' => 'google'));

        echo JHtml::_('bootstrap.addSlide', 'advanced', JText::_('Google'), 'google');
        ?>
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
        <?php
        echo JHtml::_('bootstrap.endSlide');
        echo JHtml::_('bootstrap.addSlide', 'advanced', JText::_('Comments'), 'comments');
        ?>
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

        <?php
        echo JHtml::_('bootstrap.endSlide');
        echo JHtml::_('bootstrap.addSlide', 'advanced', JText::_('Social Sharing'), 'social_sharing');
        ?>
            <ul class="nav nav-pills">
                <li class="active"><a href="#basic" data-toggle="tab">Basic</a></li>
                <li><a href="#social" data-toggle="tab">Social</a></li>
                <li><a href="#popup" data-toggle="tab">Popup</a></li>
            </ul>
            <div class="tab-content">
                <div id="basic" class="tab-pane active">
                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $this->form->getLabel('ordering_buttons', 'params'); ?>
                        </div>
                        <div class="controls">
                            <?php echo $this->form->getInput('ordering_buttons', 'params'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $this->form->getLabel('social_style', 'params'); ?>
                        </div>
                        <div class="controls">
                            <?php echo $this->form->getInput('social_style', 'params'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $this->form->getLabel('show_in_article', 'params'); ?>
                        </div>
                        <div class="controls">
                            <?php echo $this->form->getInput('show_in_article', 'params'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $this->form->getLabel('show_in_category', 'params'); ?>
                        </div>
                        <div class="controls">
                            <?php echo $this->form->getInput('show_in_category', 'params'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $this->form->getLabel('show_in_featured', 'params'); ?>
                        </div>
                        <div class="controls">
                            <?php echo $this->form->getInput('show_in_featured', 'params'); ?>
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

                </div>
                <div id="social" class="tab-pane">
                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $this->form->getLabel('tw_username', 'params'); ?>
                        </div>
                        <div class="controls">
                            <?php echo $this->form->getInput('tw_username', 'params'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $this->form->getLabel('tw_recommended', 'params'); ?>
                        </div>
                        <div class="controls">
                            <?php echo $this->form->getInput('tw_recommended', 'params'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $this->form->getLabel('tw_hashtags', 'params'); ?>
                        </div>
                        <div class="controls">
                            <?php echo $this->form->getInput('tw_hashtags', 'params'); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $this->form->getLabel('fb_url', 'params'); ?>
                        </div>
                        <div class="controls">
                            <?php echo $this->form->getInput('fb_url', 'params'); ?>
                        </div>
                    </div>
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
                </div>
                <div id="popup" class="tab-pane">
                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $this->form->getLabel('enable_popup', 'params'); ?>
                        </div>
                        <div class="controls">
                            <?php echo $this->form->getInput('enable_popup', 'params'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $this->form->getLabel('days_popup_again', 'params'); ?>
                        </div>
                        <div class="controls">
                            <?php echo $this->form->getInput('days_popup_again', 'params'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $this->form->getLabel('appear_popup', 'params'); ?>
                        </div>
                        <div class="controls">
                            <?php echo $this->form->getInput('appear_popup', 'params'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $this->form->getLabel('close_popup', 'params'); ?>
                        </div>
                        <div class="controls">
                            <?php echo $this->form->getInput('close_popup', 'params'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $this->form->getLabel('menuexin', 'params'); ?>
                        </div>
                        <div class="controls">
                            <?php echo $this->form->getInput('menuexin', 'params'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $this->form->getLabel('excl_menu', 'params'); ?>
                        </div>
                        <div class="controls">
                            <?php echo $this->form->getInput('excl_menu', 'params'); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        echo JHtml::_('bootstrap.endSlide');
        echo JHtml::_('bootstrap.addSlide', 'advanced', JText::_('Advanced'), 'advanced_options');
        ?>
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
        <?php
        echo JHtml::_('bootstrap.endSlide');
    echo JHtml::_('bootstrap.endAccordion');
?>

<fieldset>
    <legend style="margin-bottom: 0"><span class="zo2-label label-info">Debug options</span></legend>
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
</fieldset>
