<!------------ Layout Builder -------------->
<div class="tab-pane" id="zo2-layout">   
    <div class="profiles-pane">
        <h3 class="title-profile"><?php echo JText::_('ZO2_ADMIN_LAYOUT_BUILDER'); ?></h3>
        <blockquote>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <small>Someone famous <cite title="Source Title">Source Title</cite></small>
        </blockquote>
        <?php echo Zo2Html::_('admin', 'builder'); ?>
    </div>

    <?php
        defined('_JEXEC') or die;

        // Initiasile related data.
        require_once JPATH_ADMINISTRATOR . '/components/com_menus/helpers/menus.php';
        $menuTypes = MenusHelper::getMenuLinks();
        $framework = Zo2Factory::getFramework();
        $profileAssign = $framework->get('profile');
        $currentProfile = JFactory::getApplication()->input->get('profile', 'default');
    ?>

    <!-- Menu assignment -->
    <div id="profile-menu-assignment">
        <ul class="menu-links thumbnails">
            <?php foreach ($menuTypes as &$type) : ?>
                <li class="span3">
                    <div class="thumbnail">
                        <button class="btn" type="button" class="jform-rightbtn" onclick="
                            $$('#profile-menu-assignment .<?php echo $type->menutype; ?>').each(function(el) {
                            el.checked = !el.checked;
                            });">
                            <i class="icon-check"></i> <?php echo JText::_('JGLOBAL_SELECTION_INVERT'); ?>
                        </button>
                        <h5><?php echo $type->title ? $type->title : $type->menutype; ?></h5>

                        <?php foreach ($type->links as $link) : ?>
                            <?php $value = $link->value; ?>
                            <label class="checkbox small" for="link<?php echo (int) $link->value; ?>" >
                                <input type="checkbox" name="jform[profile-menu][]"
                                       value="<?php echo (int) $link->value; ?>"
                                       id="link<?php echo (int) $link->value; ?>"
                                    <?php if (isset($profileAssign->$value) && $profileAssign->$value == $currentProfile): ?> checked="checked"<?php endif; ?>
                                       class="chk-menulink <?php echo $type->menutype; ?>" />
                                <?php echo $link->text; ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
