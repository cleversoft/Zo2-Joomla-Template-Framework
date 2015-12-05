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
defined('_JEXEC') or die('resticted aceess');

/**
 * Class exists checking
 */
if (!class_exists('Zo2Megamenu'))
{

    /**
     * Zo2 Megamenu
     * @todo This class must be extends from JObject and init with themself default properties
     */
    class Zo2Megamenu
    {

        private $_menuType = 'mainmenu';
        protected $_configs = null;
        protected $children = null;
        protected $_items = null;
        protected $edit = false;
        protected $isAdmin = false;
        private $_activeMenuId = -1;

        public function __construct($menuType = 'mainmenu', $configs = array())
        {
            $this->_menuType = $menuType;
            $this->_configs = Zo2Factory::getProfile()->getMegaMenuConfig($menuType);
            $this->edit = isset($configs['edit']) ? $configs['edit'] : false;

            $this->loadMegaMenu();
        }

        function loadMegaMenu()
        {
            $model = new Zo2ModelJoomla();
            $lang = JFactory::getLanguage();
            $menu = JFactory::getApplication()->getMenu();
            $items = $model->getMenuItemsByType($this->_menuType);

            /* Get active menu */
            $defMenu = $menu->getDefault($lang->getTag());
            $active_menu = $menu->getActive() ? $menu->getActive() : $defMenu;
            $menu_id = $active_menu ? $active_menu->id : 0;
            $this->_activeMenuId = $menu_id;

            $menu_tree = $active_menu->tree ? $active_menu->tree : array();
            if ($menu->getActive() == $defMenu)
            {
                $menu_tree[] = $menu->getDefault()->id; /* Menu tree should be include Default home menu & Default home with language menu */
            }

            // Get all child menus for a parent menu
            foreach ($items as &$item)
            {

                $parent_id = $item->parent_id;
                if (isset($this->children[$parent_id]))
                {
                    $menus = $this->children[$parent_id];
                } else
                {
                    $menus = array();
                }
                // push a item into $menus array
                array_push($menus, $item);
                $this->children[$parent_id] = $menus;
            }

            foreach ($items as &$item)
            {
                $itemid = 'item-' . $item->id;

                $config = isset($this->_configs[$itemid]) ? $this->_configs[$itemid] : array();


                if (isset($config['caption']) && $config['caption'])
                    $config['caption'] = str_replace(array('[lt]', '[gt]'), array('<', '>'), $config['caption']);
                if ($item->level == 1 && isset($config['caption']) && $config['caption'])
                {
                    $item->top_level_caption = true;
                }
                // active - current
                $class = '';
                if ($item->id == $menu_id)
                {
                    $class .= ' current';
                }
                if (in_array($item->id, $menu_tree))
                {
                    $class .= ' active';
                } elseif ($item->type == 'alias')
                {
                    if (count($menu_tree) > 0 && $item->params->get('aliasoptions') == $menu_tree[count($menu_tree) - 1])
                    {
                        $class .= ' active';
                    } elseif (in_array($item->params->get('aliasoptions'), $menu_tree))
                    {
                        $class .= ' alias-parent-active';
                    }
                }

                $item->class = $class;
                $item->show_group = false;
                $item->isdropdown = false;
                if (isset($config['group']))
                {
                    $item->show_group = true;
                } else
                {
                    // if this item is a parent then setting up the status is dropdown
                    if (isset($config['submenu']) || (isset($this->children[$item->id]) && (!isset($config['hidesub']) || $this->edit)))
                    {
                        $item->isdropdown = true;
                    }
                }
                $item->megamenu = $item->isdropdown || $item->show_group;

                if ($item->megamenu && !isset($config['submenu']))
                {
                    $firstChild = $this->children[$item->id][0]->id;
                    $config['submenu'] = array('rows' => array(array(array('width' => 12, 'item' => $firstChild))));
                }

                $item->config = $config;


                $item->flink = $item->link;

                // Reverted back for CMS version 2.5.6
                switch ($item->type)
                {
                    case 'separator':
                    case 'heading':
                        // No further action needed.
                        continue;

                    case 'url':
                        if ((strpos($item->link, 'index.php?') === 0) && (strpos($item->link, 'Itemid=') === false))
                        {
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
                        if ($router->getMode() == JROUTER_MODE_SEF)
                        {
                            $item->flink = 'index.php?Itemid=' . $item->id;
                        } else
                        {
                            $item->flink .= '&Itemid=' . $item->id;
                        }
                        break;
                }

                if (strcasecmp(substr($item->flink, 0, 4), 'http') && (strpos($item->flink, 'index.php?') !== false))
                {

                    $item->flink = JRoute::_($item->flink, true, $item->params->get('secure'));
                } else
                {
                    $item->flink = JRoute::_($item->flink);
                }

                // We prevent the double encoding because for some reason the $item is shared for menu modules and we get double encoding
                // when the cause of that is found the argument should be removed
                $item->title = htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8', false);
                $item->anchor_css = htmlspecialchars($item->params->get('menu-anchor_css', ''), ENT_COMPAT, 'UTF-8', false);
                $item->anchor_title = htmlspecialchars($item->params->get('menu-anchor_title', ''), ENT_COMPAT, 'UTF-8', false);
                $item->menu_image = $item->params->get('menu_image', '') ? htmlspecialchars($item->params->get('menu_image', ''), ENT_COMPAT, 'UTF-8', false) : '';
                $this->_items[$item->id] = $item;
            }
        }

        public function renderOffCanvasMenu($config)
        {
            $this->isAdmin = $config['isAdmin'];
            $html = '<div class="offcanvas offcanvas-left ' . implode(' ', $config['item']->getVisibilityClass()) . '">' .
                    '<a href="#" class="sidebar-close"></a>' .
                    '<div class="sidebar-nav">';

            $keys = array_keys($this->_items);
            $html .= $this->getOffCanvasMenu(null, $keys[0]);
            $html .= '</div></div>';
            return $html;
        }

        function getOffCanvasMenu($parent = null, $start = 0, $end = 0)
        {
            $html = '';
            if ($start > 0)
            {
                if (!isset($this->_items[$start]))
                    return;
                $parent_id = $this->_items[$start]->parent_id;
                $menus = array();
                $started = false;
                foreach ($this->children[$parent_id] as $item)
                {

                    if ($started)
                    {
                        if ($item->id == $end)
                            break;
                        array_push($menus, $item);
                    } else
                    {
                        if ($item->id == $start)
                        {
                            $started = true;
                            array_push($menus, $item);
                        }
                    }
                }

                if (!count($menus))
                    return;
            } else if ($start === 0)
            {
                $pid = $parent->id;
                if (!isset($this->children[$pid]))
                    return;
                $menus = $this->children[$pid];
            } else
            {
                return;
            }


            $class = '';
            if (!$parent)
            {
                $class .= ''; //additional class here
            } else
            {
                if (!$this->isAdmin)
                    $class .= 'nav';
                $class .= ' level' . $parent->level;
            }

            if ($class)
                $class = 'class="' . trim($class) . '"';

            $html .= '<ul ' . $class . '>';

            foreach ($menus as $menu)
            {
                $html .= $this->generateOffCanvasHtml($menu);
            }
            $html .= '</ul>';

            return $html;
        }

        private function generateOffCanvasHtml($menu)
        {
            $submenuHtml = '';
            $menus = isset($this->children[$menu->id]) ? $this->children[$menu->id] : array();
            if (!empty($menus))
            {
                $submenuHtml = '<ul class="submenu nav-sub collapse" id="ocSub-' . $menu->id . '">';
                foreach ($menus as $submenu)
                {
                    $submenuHtml .= $this->generateOffCanvasHtml($submenu);
                }
                $submenuHtml .= '</ul>';
            }
            $liClass = array();
            if (!empty($submenuHtml))
                $liClass[] = 'nav-parent';
            if ($this->_activeMenuId == $menu->id)
                $liClass[] = 'nav-active';
            $html = '<li class="' . implode(' ', $liClass) . '">';
            $html .= '<a href="' . $menu->flink . '">' . $menu->title . '</a>';
            if (!empty($submenuHtml))
                $html .= '<a href="#" class="nav-oc-toggle icon-caret-down" data-toggle="collapse" data-target="#ocSub-' . $menu->id . '"></a>';
            $html .= $submenuHtml;
            $html .= '</li>';
            return $html;
        }

        /**
         * 
         * @param type $isAdmin
         * @return string
         */
        function renderMenu($isAdmin = false)
        {
            $this->isAdmin = $isAdmin;
            $prefix = '<nav data-zo2selectable="navbar" class="wrap zo2-menu navbar navbar-default" role="navigation">
                    <div class="navbar-collapse collapse">';
            $suffix = '</div></nav>';
            $html = '';
            $menuConfig = Zo2Factory::getProfile()->getMenuConfig();
            $hover = ' data-hover="' . $menuConfig->get('hover_type') . '"';
            $animation = $menuConfig->get('animation');
            $duration = $menuConfig->get('duration', 300);
            if ((int) $duration <= 0)
                $duration = 300;
            $class = 'class="zo2-megamenu' . ($animation ? ' animate ' . $animation : '') . '"';
            $data = $animation && $duration ? ' data-duration="' . $duration . '"' : '';

            if (isset($this->_items))
            {
                if (count($this->_items))
                {
                    $keys = array_keys($this->_items);
                    $html .= "<div $class$data$hover>";
                    $html .= $this->getMenu(null, $keys[0]);
                    $html .= "</div>";
                    if ($isAdmin == true)
                    {
                        return $html;
                    } elseif ($isAdmin == false)
                    {
                        return $prefix . $html . $suffix;
                    }
                }
            }

            return '';
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

            if ($start > 0)
            {
                if (!isset($this->_items[$start]))
                    return;
                $parent_id = $this->_items[$start]->parent_id;
                $menus = array();
                $started = false;
                foreach ($this->children[$parent_id] as $item)
                {

                    if ($started)
                    {
                        if ($item->id == $end)
                            break;
                        array_push($menus, $item);
                    } else
                    {
                        if ($item->id == $start)
                        {
                            $started = true;
                            array_push($menus, $item);
                        }
                    }
                }

                if (!count($menus))
                    return;
            } else if ($start === 0)
            {
                $pid = $parent->id;
                if (!isset($this->children[$pid]))
                    return;
                $menus = $this->children[$pid];
            } else
            {
                return;
            }
            $class = '';
            if (!$parent)
            {
                $class .= 'nav navbar-nav level-top';
            } else
            {
                if (!$this->isAdmin)
                    $class .= 'nav';
                $class .= ' mega-nav';
                $class .= ' level' . $parent->level;
            }

            if ($class)
                $class = 'class="' . trim($class) . '"';

            $html .= '<ul ' . $class . '>';

            foreach ($menus as $menu)
            {
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
            if ($menu->megamenu)
            {
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
            $icon = '';
            $caret = '';
            if ($menu->isdropdown)
            {
                $caret = '<b class="caret"></b>';
            }
            if ($menu->isdropdown && $menu->level < 2)
            {
                $class .= 'dropdown-toggle';
                $dropdown = ' data-toggle="dropdown" ';
            }

            if ($menu->show_group)
            {
                $class .= ' group-title';
            }

            if ($menu->menu_image)
            {
                if ($menu->params->get('menu_text', 1))
                {
                    $linktype = '<img src="' . $menu->menu_image . '" alt="' . $menu->title . '" /><span class="image-title">' . $menu->title . '</span>';
                } else
                {
                    $linktype = '<img src="' . $menu->menu_image . '" alt="' . $menu->title . '" />';
                }
            } else
            {
                $linktype = $menu->title;
            }

            if (isset($config['xicon']) && $config['xicon'])
            {
                $icon = '<i class="' . $config['xicon'] . '"></i>';
            }

            if (isset($config['caption']) && $config['caption'])
            {
                $caption = '<span class="mega-caption">' . $config['caption'] . '</span>';
            } else if ($menu->level == 1 && isset($menu->top_level_caption) && $menu->top_level_caption)
            {
                $caption = '<span class="mega-caption mega-caption-empty"></span>';
            }

            $html = '';

            switch ($menu->type)
            {
                case 'separator':
                    $class .= " separator";
                    $html = "<span class=\"$class\">$icon$title $linktype$caption</span>";
                    break;
                case 'component':

                    switch ($menu->browserNav)
                    {
                        default:
                        case 0:
                            $html = "<a class=\"$class\" href=\"{$menu->flink}\" $title $dropdown>$icon$linktype$caret$caption</a>";
                            break;
                        case 1:
                            // _blank
                            $html = "<a class=\"$class\" href=\"{$menu->flink}\" target=\"_blank\" $title $dropdown>$icon$linktype$caret$caption</a>";
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
                    switch ($menu->browserNav)
                    {

                        default:
                        case 0:
                            $html = "<a class=\"$class\" href=\"$flink\" $title $dropdown>$icon$linktype$caret$caption</a>";
                            break;
                        case 1:
                            // _blank
                            $html = "<a class=\"$class\" href=\"$flink\" target=\"_blank\" $title $dropdown>$icon$linktype$caret$caption</a>";
                            break;
                        case 2:
                            // window.open
                            $options = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,' . $menu->params->get('window_open');
                            $html = "<a class=\"$class\" href=\"$flink\" onclick=\"window.open(this.href,'targetWindow','$options');return false;\" $title $dropdown>$icon$linktype$caret$caption</a>";
                            break;
                    }

                    break;
                default:
                    $flink = $menu->flink;
                    $flink = JFilterOutput::ampReplace(htmlspecialchars($flink));
                    $html = "<a class=\"$class\" href=\"$flink\" $title $dropdown>$icon$linktype$caret$caption</a>";
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

            if ($menu->isdropdown)
            {
                $class .= $menu->level == 1 ? ' dropdown' : ' dropdown-submenu';
            }

            if ($menu->megamenu)
                $class .= ' mega';
            if ($menu->show_group)
                $class .= ' mega-group';

            $data = "data-id=\"{$menu->id}\" data-level=\"{$menu->level}\"";
            if ($menu->show_group)
                $data .= " data-group=\"1\"";
            if (isset($config['class']))
            {
                $data .= " data-class=\"{$config['class']}\"";
                $class .= " {$config['class']}";
            }

            if (isset($config['alignsub']))
            {
                $data .= " data-alignsub=\"{$config['alignsub']}\"";
                $class .= " mega-align-{$config['alignsub']}";
            }
            if (isset($config['hidesub']))
                $data .= " data-hidesub=\"1\"";
            if (isset($config['xicon']))
                $data .= " data-xicon=\"{$config['xicon']}\"";
            if (isset($config['caption']))
                $data .= " data-caption=\"" . htmlspecialchars($config['caption']) . "\"";

            if (isset($config['hidesub']))
                $data .= " data-hidesub=\"1\"";
            if (isset($config['caption']))
                $data .= " data-caption=\"" . htmlspecialchars($config['caption']) . "\"";
            if (isset($config['hidewcol']))
            {
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

            $class = 'menu-child  ' . ($parent->isdropdown ? 'dropdown-menu mega-dropdown-menu' : 'mega-group-content');
            $data = '';
            $style = '';

            if (isset($config['class']))
                $data .= " data-class=\"{$config['class']}\"";
            if (isset($config['alignsub']) && $config['alignsub'] == 'justify')
            {
                if ($this->isAdmin)
                {
                    $class .= " span12";
                } else
                {
                    $class .= " col-md-12 col-sm-12";
                }
            } else
            {
                if (isset($submenu['width']))
                {
                    if ($parent->isdropdown)
                    {
                        $style = " style=\"width:{$submenu['width']}px\"";
                    }
                    $data .= " data-width=\"{$submenu['width']}\"";
                }
            }

            if ($class)
                $class = 'class="' . trim($class) . '"';

            $html .= "<div $style $class $data><div class=\"mega-dropdown-inner\">";

            $endItems = array();
            $key1 = 0;
            $key2 = 0;
            foreach ($submenu['rows'] as $row)
            {

                foreach ($row as $column)
                {
                    if (!isset($column['module_id']))
                    {
                        if ($key1)
                        {
                            $key2 = $column['item'];
                            if (!isset($this->_items[$key2]) || $this->_items[$key2]->parent_id != $parent->id)
                                break;
                            $endItems[$key1] = $key2;
                        }
                        $key1 = $column['item'];
                    }
                }
            }

            $endItems[$key1] = 0;
            $firstitem = true;
            $rowClass = 'row-fluid';
            $colClass = 'span';
            if (!$this->isAdmin)
            {
                $rowClass = 'row';
                $colClass = 'col-md-';
            }
            foreach ($submenu['rows'] as $key => $row)
            {
                //start row
                $html .= '<div class="' . $rowClass . '">';
                foreach ($row as $column)
                {
                    $width = isset($column['width']) ? $column['width'] : '12';
                    $data = "data-width=\"$width\"";
                    $class = $colClass . $width;
                    if (!$this->isAdmin)
                    {
                        $class = $colClass . $width . ' ' . 'col-sm-' . $width;
                    }
                    if (isset($column['module_id']))
                    {
                        $class .= " mega-col-module";
                        $data .= " data-module_id=\"{$column['module_id']}\"";
                    } else
                    {
                        $class .= " mega-col-nav";
                    }
                    if (isset($column['class']))
                    {
                        $class .= " {$column['class']}";
                        $data .= " data-class=\"{$column['class']}\"";
                    }
                    if (isset($column['hidewcol']))
                    {
                        $data .= " data-hidewcol=\"1\"";
                        $class .= " hidden-collapse";
                    }
                    // start column
                    $html .= "<div class=\"$class\" $data><div class=\"mega-inner\">";

                    if (isset($column['module_id']))
                    {
                        $html .= $this->getModule($column['module_id']);
                    } else
                    {
                        if (!isset($endItems[$column['item']]))
                            continue;
                        $endId = $endItems[$column['item']];
                        $startId = $firstitem ? $fitem : $column['item'];
                        $html .= $this->getMenu($parent, (int) $startId, (int) $endId);
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
            if (is_numeric($id))
            {
                $query->where('m.id = ' . $id);
            }
            $query->where('m.client_id = 0');
            $query->order('position, ordering');
            $db->setQuery($query);
            $module = $db->loadObject();

            if ($module && $module->id)
            {
                $style = 'ZO2Xhtml';
                $content = JModuleHelper::renderModule($module, array('style' => $style));
                return $content . "\n";
            }
        }

        public static function getModules()
        {

            $app = JFactory::getApplication();
            $user = JFactory::getUser();
            $groups = implode(',', $user->getAuthorisedViewLevels());
            $lang = JFactory::getLanguage()->getTag();

            $db = JFactory::getDbo();

            $query = $db->getQuery(true)
                    ->select('m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid')
                    ->from('#__modules AS m')
                    ->join('LEFT', '#__modules_menu AS mm ON mm.moduleid = m.id')
                    ->where('m.published = 1')
                    ->join('LEFT', '#__extensions AS e ON e.element = m.module AND e.client_id = m.client_id')
                    ->where('e.enabled = 1');

            $date = JFactory::getDate();
            $now = $date->toSql();
            $nullDate = $db->getNullDate();
            $query->where('(m.publish_up = ' . $db->quote($nullDate) . ' OR m.publish_up <= ' . $db->quote($now) . ')')
                    ->where('(m.publish_down = ' . $db->quote($nullDate) . ' OR m.publish_down >= ' . $db->quote($now) . ')')
                    ->where('m.access IN (' . $groups . ')')
                    ->where('m.client_id = 0');

            // Filter by language
            if ($app->isSite() && $app->getLanguageFilter())
            {
                $query->where('m.language IN (' . $db->quote($lang) . ',' . $db->quote('*') . ')');
            }

            $query->order('m.position, m.ordering');

            // Set the query
            $db->setQuery($query);

            return $db->loadObjectList();
        }

        public static function getMenuTypes()
        {
            $db = JFactory::getDbo();
            $query = $db->getQuery(true)
                    ->select('a.menutype, a.title')
                    ->from('#__menu_types AS a');
            $db->setQuery($query);

            return $db->loadObjectList();
        }

    }

}