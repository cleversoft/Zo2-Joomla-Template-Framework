<?php

class Zo2Megamenu {

    /**
     * Internal variables
     */
    protected $_items = array();
    protected $children = array();
    protected $settings = null;
    protected $params = null;
    protected $menu = '';
    protected $active_id = 0;
    protected $active_tree = array();
    protected $top_level_caption = false;

    /**
     * @param  string  $menutype  menu type to render
     * @param  array   $settings  settings information
     * @param  null    $params    other parameters
     */
    public function __construct($menutype = 'mainmenu', $settings = array(), $params = null) {
        $app = JFactory::getApplication();
        $menu = $app->getMenu('site');

        $attributes = array('menutype');
        $values = array($menutype);

        if (isset($settings['access'])) {
            $attributes[] = 'access';
            $values[] = $settings['access'];
        } else {
            $settings['access'] = array(1);
        }

        if (isset($settings['language'])) {
            $attributes[] = 'language';
            $values[] = $settings['language'];
        }

        $items = $menu->getItems($attributes, $values);

        $active = ($menu->getActive()) ? $menu->getActive() : $menu->getDefault();
        $this->active_id = $active ? $active->id : 0;
        $this->active_tree = $active->tree;

        $this->settings = $settings;
        $this->params = $params;
        $this->editmode = isset($settings['editmode']);
        foreach ($items as &$item) {
            //remove all non-parent item (the parent has access higher access level)
            if ($item->level >= 2 && !isset($this->_items[$item->parent_id])) {
                continue;
            }

            $parent = isset($this->children[$item->parent_id]) ? $this->children[$item->parent_id] : array();
            $parent[] = $item;
            $this->children[$item->parent_id] = $parent;
            $this->_items[$item->id] = $item;
        }

        foreach ($items as &$item) {
            // bind setting for this item
            $key = 'item-' . $item->id;
            $setting = isset($this->settings[$key]) ? $this->settings[$key] : array();

            // decode html tag
            if (isset($setting['caption']) && $setting['caption'])
                $setting['caption'] = str_replace(array('[lt]', '[gt]'), array('<', '>'), $setting['caption']);
            if ($item->level == 1 && isset($setting['caption']) && $setting['caption'])
                $this->top_level_caption = true;

            // active - current
            $class = '';
            if ($item->id == $this->active_id) {
                $class .= ' current';
            }
            if (in_array($item->id, $this->active_tree)) {
                $class .= ' active';
            } elseif ($item->type == 'alias') {
                $aliasToId = $item->params->get('aliasoptions');
                if (count($this->active_tree) > 0 && $aliasToId == $this->active_tree[count($this->active_tree) - 1]) {
                    $class .= ' active';
                } elseif (in_array($aliasToId, $this->active_tree)) {
                    $class .= ' alias-parent-active';
                }
            }

            $item->class = $class;
            $item->mega = 0;
            $item->group = 0;
            $item->dropdown = 0;
            if (isset($setting['group']) && $item->level > 1) {
                $item->group = 1;
            } else {
                if ((isset($this->children[$item->id]) && ($this->editmode || !isset($setting['hidesub']))) || isset($setting['sub'])) {
                    $item->dropdown = 1;
                }
            }
            $item->mega = $item->group || $item->dropdown;
            // set default sub if not exists
            if ($item->mega) {
                if (!isset($setting['sub']))
                    $setting['sub'] = array();
                if (isset($this->children[$item->id]) && (!isset($setting['sub']['rows']) || !count($setting['sub']['rows']))) {
                    $c = $this->children[$item->id][0]->id;
                    $setting['sub'] = array('rows' => array(array(array('width' => 12, 'item' => $c))));
                }
            }
            $item->setting = $setting;

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
        }
    }

    public function render($return = false) {
        $this->menu = '';

        $this->_('beginmenu');
        $keys = array_keys($this->_items);
        if (count($keys)) { //in case the keys is empty array
            $this->nav(null, $keys[0]);
        }
        $this->_('endmenu');

        if ($return) {
            return $this->menu;
        } else {
            echo $this->menu;
        }
    }

    public function nav($pitem, $start = 0, $end = 0) {
        if ($start > 0) {
            if (!isset($this->_items[$start]))
                return;
            $pid = $this->_items[$start]->parent_id;
            $items = array();
            $started = false;
            foreach ($this->children[$pid] as $item) {
                if ($started) {
                    if ($item->id == $end)
                        break;
                    $items[] = $item;
                } else {
                    if ($item->id == $start) {
                        $started = true;
                        $items[] = $item;
                    }
                }
            }
            if (!count($items))
                return;
        } else if ($start === 0) {
            $pid = $pitem->id;
            if (!isset($this->children[$pid]))
                return;
            $items = $this->children[$pid];
        } else {
            //empty menu
            return;
        }

        $this->_('beginnav', array(
            'item' => $pitem
        ));

        foreach ($items as $item) {
            $this->item($item);
        }

        $this->_('endnav', array(
            'item' => $pitem
        ));
    }

    public function item($item) {
        // item content
        $setting = $item->setting;

        $this->_('beginitem', array(
            'item' => $item,
            'setting' => $setting,
            'menu' => $this
        ));

        $this->menu .= $this->_('item', array(
            'item' => $item,
            'setting' => $setting,
            'menu' => $this
        ));

        if ($item->mega) {
            $this->mega($item);
        }
        $this->_('enditem', array(
            'item' => $item
        ));
    }

    public function mega($item) {
        $setting = $item->setting;
        $sub = $setting['sub'];
        $items = isset($this->children[$item->id]) ? $this->children[$item->id] : array();
        $firstitem = count($items) ? $items[0]->id : 0;

        $this->_('beginmega', array(
            'item' => $item
        ));
        $endItems = array();
        $k1 = $k2 = 0;
        foreach ($sub['rows'] as $row) {
            foreach ($row as $col) {
                if (!isset($col['position'])) {
                    if ($k1) {
                        $k2 = $col['item'];
                        if (!isset($this->_items[$k2]) || $this->_items[$k2]->parent_id != $item->id)
                            break;
                        $endItems[$k1] = $k2;
                    }
                    $k1 = $col['item'];
                }
            }
        }
        $endItems[$k1] = 0;

        $firstitemscol = true;
        foreach ($sub['rows'] as $row) {
            $this->_('beginrow', array(
                'menu' => $this
            ));

            foreach ($row as $col) {
                $this->_('begincol', array(
                    'setting' => $col,
                    'menu' => $this
                ));
                if (isset($col['position'])) {
                    $this->module($col['position']);
                } else {
                    if (!isset($endItems[$col['item']]))
                        continue;
                    $toitem = $endItems[$col['item']];
                    $startitem = $firstitemscol ? $firstitem : $col['item'];
                    $this->nav($item, $startitem, $toitem);
                    $firstitemscol = false;
                }
                $this->_('endcol');
            }
            $this->_('endrow');
        }
        $this->_('endmega');
    }

    public function module($module) {
        // load module
        $id = intval($module);
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query
                ->select('m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params')
                ->from('#__modules AS m')
                ->where('m.id = ' . $id)
                ->where('m.published = 1')
                ->where('m.access IN (' . implode(',', $this->settings['access']) . ')');
        $db->setQuery($query);
        $module = $db->loadObject();

        //check in case the module is unpublish or deleted
        if ($module && $module->id) {
            $style = 'T3Xhtml';
            $content = JModuleHelper::renderModule($module, array(
                        'style' => $style
            ));

            $this->menu .= $content . "\n";
        }
    }

    public function _($tmpl, $vars = array()) {
        $vars['menu'] = $this;
        $this->menu .= Zo2MegamenuTpl::_($tmpl, $vars);
    }

    public function get($prop) {
        if (isset($this->$prop))
            return $this->$prop;
        return null;
    }

    public function getParam($name, $default = null) {
        if (!$this->params)
            return $default;
        return $this->params->get($name, $default);
    }

}

class Zo2MegamenuTpl {

    static function beginmenu($vars) {
        $menu = $vars['menu'];
        $animation = $menu->getParam('navigation_animation', 'zoom');
        $trigger = $menu->getParam('navigation_trigger', 'hover');
        $responsive = $menu->getParam('responsive', 1);
        $anim_duration = $menu->getParam('navigation_animation_duration', 100);
        if ($trigger == 'hover' && !empty($animation)) {
            $cls = ' class="t3-megamenu hover animate ' . $animation . '"';
        } else {
            $cls = ' class="t3-megamenu';
        }

        $data = $animation && $anim_duration ? ' data-duration="' . $anim_duration . '"' : '';
        $data = $data . ($responsive ? ' data-responsive="true"' : '');

        return "<div $cls $data>";
    }

    static function endmenu($vars) {
        return '</div>';
    }

    static function beginnav($vars) {
        $item = $vars['item'];
        $cls = '';
        if (!$item) {
            // first nav
            $cls = 'nav navbar-nav level0';
        } else {
            $cls .= ' mega-nav';
            $cls .= ' level' . $item->level;
        }
        if ($cls)
            $cls = 'class="' . trim($cls) . '"';

        return '<ul ' . $cls . '>';
    }

    static function endnav($vars) {
        return '</ul>';
    }

    static function beginmega($vars) {
        $item = $vars['item'];
        $setting = $item->setting;
        $sub = $setting['sub'];
        $cls = 'nav-child ' . ($item->dropdown ? 'dropdown-menu mega-dropdown-menu' : 'mega-group-ct');
        $style = '';
        $data = '';
        if (isset($sub['class'])) {
            $data .= " data-class=\"{$sub['class']}\"";
            $cls .= " {$sub['class']}";
        }
        if (isset($setting['alignsub']) && $setting['alignsub'] == 'justify') {
            $cls .= ' ' . ($vars['menu']->editmode ? 'span' : T3_BASE_NONRSP_WIDTH_PREFIX) . '12';
        } else {
            if (isset($sub['width'])) {
                if ($item->dropdown)
                    $style = ' style="width: ' . str_replace('px', '', $sub['width']) . 'px"';
                $data .= ' data-width="' . str_replace('px', '', $sub['width']) . '"';
            }
        }

        if ($cls)
            $cls = 'class="' . trim($cls) . '"';

        return "<div $cls $style $data><div class=\"mega-dropdown-inner\">";
    }

    static function endmega($vars) {
        return '</div></div>';
    }

    static function beginrow($vars) {
        return '<div class="' . ($vars['menu']->editmode ? 'row-fluid' : 'row') . '">';
    }

    static function endrow($vars) {
        return '</div>';
    }

    static function begincol($vars) {
        $setting = isset($vars['setting']) ? $vars['setting'] : array();
        $width = isset($setting['width']) ? $setting['width'] : 12;
        $data = "data-width=\"$width\"";
        $cls = ($vars['menu']->editmode ? 'span' : 'col-xs-') . $width;

        if (isset($setting['position'])) {
            $cls .= " mega-col-module";
            $data .= " data-position=\"{$setting['position']}\"";
        } else {
            $cls .= " mega-col-nav";
        }
        if (isset($setting['class'])) {
            $cls .= " {$setting['class']}";
            $data .= " data-class=\"{$setting['class']}\"";
        }
        if (isset($setting['hidewcol'])) {
            $cls .= " hidden-collapse";
            $data .= " data-hidewcol=\"1\"";
        }

        return "<div class=\"$cls\" $data><div class=\"mega-inner\">";
    }

    static function endcol($vars) {
        return '</div></div>';
    }

    static function beginitem($vars) {
        $item = $vars['item'];
        $setting = $item->setting;
        $cls = $item->class;

        if ($item->dropdown) {
            $cls .= $item->level == 1 ? ' dropdown' : ' dropdown-submenu';
        }

        if ($item->mega)
            $cls .= ' mega';
        if ($item->group)
            $cls .= ' mega-group';
        if ($item->type == 'separator' && !$item->group && !$item->mega)
            $cls .= ' divider';

        $data = "data-id=\"{$item->id}\" data-level=\"{$item->level}\"";
        if ($item->group)
            $data .= " data-group=\"1\"";
        if (isset($setting['class'])) {
            $cls .= " {$setting['class']}";
            $data .= " data-class=\"{$setting['class']}\"";
        }
        if (isset($setting['alignsub'])) {
            $cls .= " mega-align-{$setting['alignsub']}";
            $data .= " data-alignsub=\"{$setting['alignsub']}\"";
        }
        if (isset($setting['hidesub']))
            $data .= " data-hidesub=\"1\"";
        if (isset($setting['xicon']))
            $data .= " data-xicon=\"{$setting['xicon']}\"";
        if (isset($setting['caption']))
            $data .= " data-caption=\"" . htmlspecialchars($setting['caption']) . "\"";
        if (isset($setting['hidewcol'])) {
            $data .= " data-hidewcol=\"1\"";
            $cls .= " sub-hidden-collapse";
        }

        if ($cls)
            $cls = 'class="' . trim($cls) . '"';

        return "<li $cls $data>";
    }

    static function enditem($vars) {
        return '</li>';
    }

    static function item($vars) {
        $item = $vars['item'];
        $setting = $item->setting;

        // Note. It is important to remove spaces between elements.
        $vars['class'] = $item->anchor_css ? $item->anchor_css : '';
        $vars['title'] = $item->anchor_title ? ' title="' . $item->anchor_title . '" ' : '';
        $vars['dropdown'] = ' data-target="#"';
        $vars['caret'] = '';
        $vars['icon'] = '';
        $vars['caption'] = '';

        if ($item->dropdown && $item->level < 2) {
            $vars['class'] .= ' dropdown-toggle';
            $vars['dropdown'] .= ' data-toggle="dropdown"'; // Note: data-target for JomSocial old bootstrap lib
            $vars['caret'] = '<b class="caret"></b>';
        }

        if ($item->group) {
            $vars['class'] .= ' dropdown-header mega-group-title';
        }

        if ($item->menu_image) {
            $item->params->get('menu_text', 1) ?
                            $vars['linktype'] = '<img src="' . $item->menu_image . '" alt="' . $item->title . '" /><span class="image-title">' . $item->title . '</span> ' :
                            $vars['linktype'] = '<img src="' . $item->menu_image . '" alt="' . $item->title . '" />';
        } else {
            $vars['linktype'] = $item->title;
        }

        if (isset($setting['xicon']) && $setting['xicon']) {
            $vars['icon'] = '<i class="' . $setting['xicon'] . '"></i>';
        }
        if (isset($setting['caption']) && $setting['caption']) {
            $vars['caption'] = '<span class="mega-caption">' . $setting['caption'] . '</span>';
        } else if ($item->level == 1 && $vars['menu']->get('top_level_caption')) {
            $vars['caption'] = '<span class="mega-caption mega-caption-empty">&nbsp;</span>';
        }

        switch ($item->type) {
            case 'separator':
            case 'heading':
                $html = self::_('item_separator', $vars);
                break;
            case 'component':
                $html = self::_('item_component', $vars);
                break;
            case 'url':
            default:
                $html = self::_('item_url', $vars);
        }

        return $html;
    }

    static function item_url($vars) {
        $item = $vars['item'];
        $class = $vars['class'];
        $title = $vars['title'];
        $dropdown = $vars['dropdown'];
        $caret = $vars['caret'];
        $linktype = $vars['linktype'];
        $icon = $vars['icon'];
        $caption = $vars['caption'];

        $flink = $item->flink;
        $flink = JFilterOutput::ampReplace(htmlspecialchars($flink));

        switch ($item->browserNav) :
            default:
            case 0:
                $link = "<a class=\"$class\" href=\"$flink\" $title $dropdown>$icon$linktype$caret$caption</a>";
                break;
            case 1:
                // _blank
                $link = "<a class=\"$class\" href=\"$flink\" target=\"_blank\" $title $dropdown>$icon$linktype$caret$caption</a>";
                break;
            case 2:
                // window.open
                $options = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes';
                $link = "<a class=\"$class\" href=\"$flink\"" . (!$vars['menu']->editmode ? " onclick=\"window.open(this.href,'targetWindow','$options');return false;\"" : "") . " $title $dropdown>$icon$linktype$caret$caption</a>";
                break;
        endswitch;

        return $link;
    }

    static function item_separator($vars) {
        $item = $vars['item'];
        $class = $vars['class'];
        $title = $vars['title'];
        $dropdown = $vars['dropdown'];
        $caret = $vars['caret'];
        $linktype = $vars['linktype'];
        $icon = $vars['icon'];
        $caption = $vars['caption'];
        // Note. It is important to remove spaces between elements.

        $class .= " separator";

        return "<span class=\"$class\" $title $dropdown>$icon$title $linktype$caret$caption</span>";
    }

    static function item_component($vars) {
        $item = $vars['item'];
        $class = $vars['class'];
        $title = $vars['title'];
        $dropdown = $vars['dropdown'];
        $caret = $vars['caret'];
        $linktype = $vars['linktype'];
        $icon = $vars['icon'];
        $caption = $vars['caption'];
        // Note. It is important to remove spaces between elements.

        switch ($item->browserNav) :
            default:
            case 0:
                $link = "<a class=\"$class\" href=\"{$item->flink}\" $title $dropdown>$icon$linktype $caret$caption</a>";
                break;
            case 1:
                // _blank
                $link = "<a class=\"$class\" href=\"{$item->flink}\" target=\"_blank\" $title $dropdown>$icon$linktype $caret$caption</a>";
                break;
            case 2:
                // window.open
                $link = "<a class=\"$class\" href=\"{$item->flink}\"" . (!$vars['menu']->editmode ? " onclick=\"window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');return false;\"" : "") . " $title $dropdown>$icon$linktype $caret$caption</a>";
                break;
        endswitch;

        return $link;
    }

    static function _($tmpl, $vars) {
        if (function_exists($func = 'Zo2MegamenuTpl_' . $tmpl)) {
            return $func($vars) . "\n";
        } else if (method_exists('Zo2MegamenuTpl', $tmpl)) {
            return Zo2MegamenuTpl::$tmpl($vars) . "\n";
        } else {
            return "$tmpl\n";
        }
    }

}
