<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
?>
<?php
// Create a shortcut for params.
$params = $this->item->params;
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
$canEdit = $this->item->params->get('access-edit');
JHtml::_('behavior.framework');
?>
<?php if ($this->item->state == 0) : ?>
    <span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
<?php endif; ?>
<?php echo JLayoutHelper::render('joomla.content.intro_image', $this->item); ?>
<div class="article_content">
    <span class="article_icon"><i class="fa fa-picture-o"></i>
    </span>
    <?php echo JLayoutHelper::render('joomla.content.blog_style_default_item_title', $this->item); ?>

    <div class="introtext">
        <?php if (!$params->get('show_intro')) : ?>
            <?php echo $this->item->event->afterDisplayTitle; ?>
        <?php endif; ?>
        <?php echo $this->item->event->beforeDisplayContent; ?> <?php echo substr($this->item->introtext, 0, 320) . '...'; ?>
        <?php $useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date') || $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author') ); ?>
        <?php if ($useDefList) : ?>
            <?php echo JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'below')); ?>
        <?php endif; ?>
    </div>

    <div class="article_bottom">
        <?php if ($useDefList) : ?>
            <?php echo JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'above')); ?>
        <?php endif; ?>
        <?php
        if ($params->get('show_readmore') && $this->item->readmore) :
            if ($params->get('access-view')) :
                $link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
            else :
                $menu = JFactory::getApplication()->getMenu();
                $active = $menu->getActive();
                $itemId = $active->id;
                $link1 = JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId);
                $returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
                $link = new JUri($link1);
                $link->setVar('return', base64_encode($returnURL));
            endif;
            ?>

            <a class="itemReadmore" href="<?php echo $link; ?>">
                <?php
                echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
                ?>
            </a>

        <?php endif; ?>
    </div>
</div>

<?php echo $this->item->event->afterDisplayContent; ?>