<?php
/**
 * Zo2 Framework (http://zo2framework.org)
 *
 * @link     http://github.com/aploss/zo2
 * @package  Zo2
 * @author   Hiepvu
 * @copyright  Copyright ( c ) 2008 - 2013 APL Solutions
 * @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */
//no direct accees
defined('_JEXEC') or die ('resticted aceess');

class ZO2MegaMenu
{
    protected $_params = null;
    protected $_configs = null;
    protected $children = null;
    protected $_items = null;
    protected $edit = false;

    function __construct($menutype = 'mainmenu', $configs = array(), $params)
    {
        $this->_configs = $configs;
        $this->_params = $params;
        $this->edit = isset($configs['edit']) ? $configs['edit'] : false;
        $this->loadMegaMenu($menutype);
    }

    function loadMegaMenu($menutype)
    {

        $app = JFactory::getApplication();
        $menu = $app->getMenu('site');
        $items = $menu->getItems('menutype', $menutype);

        $active_menu = $menu->getActive() ? $menu->getActive() : $menu->getDefault();
        $menu_id = $active_menu ? $active_menu->id : 0;
        $menu_tree = $active_menu->tree ? $active_menu->tree : array();

        foreach ($items as &$item) {

            $itemid = 'item-' . $item->id;
            $config = isset($this->_configs[$itemid]) ? $this->_configs[$itemid] : array();

            // active - current
            $class = '';
            if ($item->id == $menu_id) {
                $class .= ' current';
            }
            if (in_array($item->id, $menu_tree)) {
                $class .= ' active';
            } elseif ($item->type == 'alias') {
                if (count($menu_tree) > 0 && $item->params->get('aliasoptions') == $menu_tree[count($menu_tree) - 1]) {
                    $class .= ' active';
                } elseif (in_array($item->params->get('aliasoptions'), $menu_tree)) {
                    $class .= ' alias-parent-active';
                }
            }

            $item->class = $class;
            $item->show_group = false;
            $item->isdropdown = false;

            if (isset($config['group'])) {
                $item->show_group = true;
            } else {
                // if this item is a parent then setting up the status is dropdown
                if (isset($config['submenu']) || (isset($this->children[$item->id]) && ($config['hidesub'] || $this->edit))) {
                    $item->isdropdown = true;
                }
            }
            $item->megamenu = $item->isdropdown || $item->show_group;

            $item->config = $config;


            $item->flink = $item->link;

            // Reverted back for CMS version 2.5.6
            switch ($item->type) {
                case 'separator':
                case 'heading':
                    // No further action needed.
                    continue;

                case 'url':
                    if ((strpos($item->link, 'index.php?') === 0) && (strpos($item->link, 'Itemid=') === false)) {
                        // If this is an internal Joomla link, ensure the Itemid is set.
                        $item->flink = $item->link . '&Itemid=' . $item->id;
                    }

                    break;

                case 'alias':
                    // If this is an alias use the item id stored in the parameters to make the link.
                    $item->flink = 'index.php?Itemid=' . $item->params->get('aliasoptions');
                    break;

                default:
                    $router = JSite::getRouter();
                    if ($router->getMode() == JROUTER_MODE_SEF) {
                        $item->flink = 'index.php?Itemid=' . $item->id;
                    } else {
                        $item->flink .= '&Itemid=' . $item->id;
                    }
                    break;
            }

            if (strcasecmp(substr($item->flink, 0, 4), 'http') && (strpos($item->flink, 'index.php?') !== false)) {

                $item->flink = JRoute::_($item->flink, true, $item->params->get('secure'));
            } else {
                $item->flink = JRoute::_($item->flink);
            }

            // We prevent the double encoding because for some reason the $item is shared for menu modules and we get double encoding
            // when the cause of that is found the argument should be removed
            $item->title = htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8', false);
            $item->anchor_css = htmlspecialchars($item->params->get('menu-anchor_css', ''), ENT_COMPAT, 'UTF-8', false);
            $item->anchor_title = htmlspecialchars($item->params->get('menu-anchor_title', ''), ENT_COMPAT, 'UTF-8', false);
            $item->menu_image = $item->params->get('menu_image', '') ? htmlspecialchars($item->params->get('menu_image', ''), ENT_COMPAT, 'UTF-8', false) : '';
            //
            $parent_id = $item->parent_id;
            $parents = isset($this->children[$parent_id]) ? $this->children[$parent_id] : array();
            // push a item into parents array
            array_push($parents, $item);
            $this->children[$parent_id] = $parents;
            $this->_items[$item->id] = $item;
        }

    }

    /**
     * render menu
     */
    function renderMenu()
    {
        $html = '';
        $animation = $this->_params->get('menu_aimation', '');
        $duration = $this->_params->get('duration', 4);
        $class = 'class="zo2-megamenu' . ($animation ? ' animate ' . $animation : '') . '"';
        $data = $animation && $duration ? ' data-duration="' . $duration . '"' : '';
        $keys = array_keys($this->_items);

        if (count($this->_items)) {
            $html .= "<div $class$data>";
            $html .= $this->getMenu(null, $keys[0]);
            $html .= "</div>";
            echo $html;
        }

    }

    /**
     * Get child menus for parent menu
     * @param null $parent
     * @param int $start
     * @param int $end
     * @return string
     */
    function getMenu($parent = null, $start = 0, $end = 0)
    {

        $html = '';
        $menus = array();
        if ($start) {
            if (!isset($this->_items[$start])) return;
            $parent_id = $this->_items[$start]->parent_id;

            foreach ($this->children[$parent_id] as $item) {
                if ($item->id == $start) {
                    array_push($menus, $item);
                } else if ($item->id != $start) {
                    if ($item->id == $end) {
                        return;
                    } else {
                        array_push($menus, $item);
                    }
                }
            }

        } else {
            return;
        }
        $class = '';
        if (!$parent) {
            $class .= 'nav level10';
        } else {
            $class .= ' mega-nav';
            $class .= ' level' . $parent->level;
        }

        $html .= '<ul class="' . $class . '">';
        foreach ($menus as $menu) {
            $html .= $this->getLiTag($menu);
        }
        $html .= '</ul>';

        return $html;
    }

    /**
     * Get content of Li tag
     * @param $menu
     * @return string
     */
    function getLiTag($menu)
    {
        $html = '';
        $html .= $this->beginLi($menu);
        $html .= $this->getLinkTitle($menu);
        if ($menu->megamenu) {
            $html .= $this->getSubMenu($menu);
        }
        $html .= $this->endLi($menu);
        return $html;
    }

    /**
     * Get link type
     * @param $menu
     * @return string
     */
    function getLinkTitle($menu)
    {

        $config = $menu->config;

        $class = $menu->anchor_css ? $menu->anchor_css : '';
        $title = $menu->anchor_title ? 'title="' . $menu->anchor_title . '"' : '';
        $dropdown = '';
        $caption = '';
        $linktype = '';
        $caret = '<b class="caret"></b>';
        if ($menu->isdropdown && $menu->level < 2) {
            $class .= 'dropdown-toggle';
            $dropdown = ' data-toggle="dropdown"';
        }

        if ($menu->show_group) {
            $class .= ' group-title';
        }

        if ($menu->menu_image) {
            if ($menu->params->get('menu_text', 1)) {
                $linktype = '<img src="' . $menu->menu_image . '" alt="' . $menu->title . '" /><span class="image-title">' . $menu->title . '</span>';
            } else {
                $linktype = '<img src="' . $menu->menu_image . '" alt="' . $menu->title . '" />';
            }
        } else {
            $linktype = $menu->title;
        }

        if (isset($config['caption'])) {
            $caption = '<span class="caption">' . $config['caption'] . '</span>';
        } else {
            $caption = '<span class="empty-caption"></span>';
        }

        $html = '';

        switch ($menu->type) {
            case 'separator':
                $class .= " separator";
                $html = "<span class=\"$class\">$title $linktype$caption</span>";
                break;
            case 'component':

                switch ($menu->browserNav) {
                    default:
                    case 0:
                        $html = "<a class=\"$class\" href=\"{$menu->flink}\" $title $dropdown>$linktype $caret$caption</a>";
                        break;
                    case 1:
                        // _blank
                        $html = "<a class=\"$class\" href=\"{$menu->flink}\" target=\"_blank\" $title $dropdown>$linktype $caret$caption</a>";
                        break;
                    case 2:
                        // window.open
                        $html = "<a class=\"$class\" href=\"{$menu->flink}\" onclick=\"window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');return false;\" $title $dropdown>$linktype $caret$caption</a>";
                        break;
                }
                break;
            case 'url':
                $flink = $menu->flink;
                $flink = JFilterOutput::ampReplace(htmlspecialchars($flink));
                switch ($menu->browserNav) {

                    default:
                    case 0:
                        $html = "<a class=\"$class\" href=\"$flink\" $title $dropdown>$linktype$caret$caption</a>";
                        break;
                    case 1:
                        // _blank
                        $html = "<a class=\"$class\" href=\"$flink\" target=\"_blank\" $title $dropdown>$linktype$caret$caption</a>";
                        break;
                    case 2:
                        // window.open
                        $options = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,' . $menu->params->get('window_open');
                        $html = "<a class=\"$class\" href=\"$flink\" onclick=\"window.open(this.href,'targetWindow','$options');return false;\" $title $dropdown>$linktype$caret$caption</a>";
                        break;
                }

                break;
        }

        return $html;
    }

    /**
     * @param $menu
     * @return string
     */
    function beginLi($menu)
    {

        $config = $menu->config;
        $class = $menu->class;

        if ($menu->isdropdown) {
            $class .= $menu->level == 1 ? ' dropdown' : ' dropdown-submenu';
        }

        if ($menu->megamenu) $class .= ' mega';
        if ($menu->show_group) $class .= ' mega-group';

        $data = "data-id=\"{$menu->id}\" data-level=\"{$menu->level}\"";
        if ($menu->show_group) $data .= " data-group=\"1\"";
        if (isset($config['class'])) {
            $data .= " data-class=\"{$config['class']}\"";
            $class .= " {$config['class']}";
        }

        if (isset($setting['alignsub'])) {
            $data .= " data-alignsub=\"{$config['alignsub']}\"";
            $class .= " mega-align-{$config['alignsub']}";
        }
        if (isset($config['hidesub'])) $data .= " data-hidesub=\"1\"";
        if (isset($config['xicon'])) $data .= " data-xicon=\"{$config['xicon']}\"";
        if (isset($config['caption'])) $data .= " data-caption=\"" . htmlspecialchars($config['caption']) . "\"";

        if (isset($config['hidesub'])) $data .= " data-hidesub=\"1\"";
        if (isset($config['caption'])) $data .= " data-caption=\"" . htmlspecialchars($config['caption']) . "\"";
        if (isset($config['hidewcol'])) {
            $data .= " data-hidewcol=\"1\"";
            $class .= " sub-hidden-collapse";
        }
        $class = 'class="' . $class . '"';
        return "<li $class $data>";

    }

    /**
     * @param $menu
     * @return string
     */
    function endLi($menu)
    {
        return "</li>";
    }

    /**
     * Get sub menus for parent menu
     * @param $parent
     * @return string
     */
    function getSubMenu($parent)
    {

        $html = '';
        $config = $parent->config;
        $submenu = $config['submenu'];
        $menus = isset($this->children[$parent->id]) ? $this->children[$parent->id] : array();
        //default first item
        $fitem = count($menus) ? $menus[0]->id : 0;

        $class = 'nav-child ' . ($parent->isdropdown ? 'dropdown-menu mega-dropdown-menu' : 'mega-group-ct');
        $data = '';
        $style = '';

        if (isset($config['class'])) $data .= " data-class=\"{$config['class']}\"";
        if (isset($submenu['width'])) {
            if ($parent->isdropdown) {
                $style = " style=\"width:{$submenu['width']}px\"";
            }
            $data .= " data-width=\"{$submenu['width']}\"";
        }
        $class = 'class="' . $class . '"';

        $html .= "<div $style $class $data><div class=\"mega-dropdown-inner\">";

        $end = array();
        $menuid = 0;
        foreach ($submenu['rows'] as $row) {
            foreach ($row as $column) {
                if (!isset($column['module_id'])) {
                    if ($menuid) {
                        $end[$menuid] = $column['item'];
                    }
                    $menuid = $column['item'];
                }
            }
        }

        $end[$menuid] = 0;
        $firstitem = true;

        foreach ($submenu['rows'] as $row) {
            //start row
            $html .= '<div class="row-fluid">';

            foreach ($row as $column) {

                $width = isset($column['width']) ? $column['width'] : '12';
                $data = "data-width=\"$width\"";
                $class = "span$width";
                if (isset($column['module_id'])) {
                    $class .= " mega-col-module";
                    $data .= " data-module_id=\"{$column['module_id']}\"";
                } else {
                    $class .= " mega-col-nav";
                }
                if (isset($column['class'])) {
                    $class .= " {$column['class']}";
                    $data .= " data-class=\"{$column['class']}\"";
                }
                if (isset($column['hidewcol'])) {
                    $data .= " data-hidewcol=\"1\"";
                    $class .= " hidden-collapse";
                }
                // start column
                $html .= "<div class=\"$class\" $data><div class=\"mega-inner\">";

                if (isset($column['module_id'])) {
                    $html .= $this->getModule($column['module_id']);
                } else {
                    $endId = $end[$column['item']];
                    $startId = $firstitem ? $fitem : $column['item'];
                    $html .= $this->getMenu($parent, $startId, $endId);
                    $firstitem = false;
                }

                $html .= "</div></div>"; // end column
            }

            $html .= "</div>"; //end row
        }

        $html .= "</div></div>";
        return $html;
    }

    /**
     *
     * @param $id
     * @return string
     */
    function getModule($id)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('m.*');
        $query->from('#__modules AS m');
        $query->where('m.published = 1');
        if (is_numeric($id)) {
            $query->where('m.id = ' . $id);
        }
        $query->where('m.client_id = 0');
        $query->order('position, ordering');
        $db->setQuery($query);
        $module = $db->loadObject();

        if ($module && $module->id) {
            $style = 'ZO2Xhtml';
            $content = JModuleHelper::renderModule($module, array('style' => $style));
            return $content . "\n";
        }

    }
}