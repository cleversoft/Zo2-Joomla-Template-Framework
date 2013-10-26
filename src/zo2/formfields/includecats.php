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

class JFormFieldIncludecats extends JFormField
{
    protected $type = 'Includecats';

    /**
     * Get the html for input
     *
     * @return string
     */
    public function getInput()
    {

        $extension = $this->element['extension'] ? (string)$this->element['extension'] : '';
        $categories = $this->getCategories($extension);
        ?>

        <div class="include_categories">
            <div class="form-inline">
                <span class="small">
                    <input type="button" class="btn" id="checkAll" value="<?php echo JText::_('Select All'); ?>" /> -
                    <input type="button" class="btn" id="uncheckAll" value="<?php echo JText::_('Clear Selection'); ?>" />
                </span>
            </div>

            <hr class="zo2-hr"/>

            <ul class="treeCategories form-inline">
                <?php
                $count = count($categories);

                foreach ($categories as $category) :
                $checked = in_array($category->id, $this->value) ? ' checked="checked"' : '';
                ?>
                <li class="category-item">
                    <input type="checkbox" class="checkbox" name="<?php echo $this->name; ?>[]"
                           value="<?php echo (int)$category->id; ?>"
                           id="category<?php echo (int)$category->id; ?>"<?php echo $checked; ?>/>
                    <label for="category<?php echo (int)$category->id; ?>">
                        <?php echo $category->title; ?>
                    </label>
                </li>
                <?php if ($count > 10) : ?>
                    </ul>
                    <ul class="treeCategories">
                <?php endif; ?>

                <?php endforeach; ?>

            </ul>

        </div>

    <?php
    }

    function getCategories($extension)
    {

        $db = JFactory::getDbo();
        $query = $db->getQuery(true)
            ->select('a.id, a.title, a.level')
            ->from('#__categories AS a')
            ->where('a.parent_id > 0 AND a.published = 1');

        $query->where('extension = ' . $db->quote($extension));

        $query->order('a.lft');

        $db->setQuery($query);
        $items = $db->loadObjectList();

        foreach ($items as &$item) {
            $repeat = ($item->level - 1 >= 0) ? $item->level - 1 : 0;
            $item->title = str_repeat('- ', $repeat) . $item->title;
        }

        return $items;

    }

}
