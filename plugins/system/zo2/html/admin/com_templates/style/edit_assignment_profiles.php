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
