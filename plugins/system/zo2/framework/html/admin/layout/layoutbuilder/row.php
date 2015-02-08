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
//no direct accees
defined('JPATH_BASE') or die;

$jDoc = $row->get('jdoc');
$blockName = $row->get('name');
$jDocName = $jDoc->get('name');
$children = $row->get('children', array());
$properties = $row->getProperties();
$className[] = 'sortable-row';
$className[] = (!$row->isRoot()) ? 'row-child' : 'row-parent';
if ($row->getClass() != '')
{
    $className[] = trim($row->getClass());
}
$className[] = $jDoc->get('type');
$className = implode(' ', $className);
// we wil not generate children property into data attribute
if (isset($properties['children']))
{
    unset($properties['children']);
}
?>
<!-- Row layout -->
<div class="<?php echo $className; ?>"
     id="zo2-<?php echo Zo2HelperString::getAlias($blockName); ?>"
     data-zo2="<?php echo htmlentities(Zo2HelperEncode::json($properties)); ?>"
     data-zo2-row-settings="<?php echo htmlentities(Zo2HelperEncode::json($row->getSettings())); ?>"
     >
    <div class="row-control">
        <?php $this->load('Zo2://html/admin/layout/layoutbuilder/controls.php'); ?>

        <div id="zo2-row-setting-container" style="display: none"></div>
        <div class="children-container row-fluid connectedSortable">
            <?php
            // Render children
            if ($row->hasChildren()) :
                {
                    foreach ($children as $child)
                    {
                        $child = new Zo2LayoutbuilderAdminRow($child);
                        $child->setRoot(false);
                        $child->hasChildren();
                        echo $child->render();
                    }
                }
            endif;
            ?>
        </div>
    </div>
</div>