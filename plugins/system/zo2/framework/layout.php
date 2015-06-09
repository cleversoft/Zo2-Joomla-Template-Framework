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
defined('_JEXEC') or die;

/**
 * Class exists checking
 */
if (!class_exists('Zo2Layout'))
{

    /**
     * Zo2 Layoutbuilder class
     */
    class Zo2Layout extends JObject
    {

        /**
         * Array HTML of layout elements
         * @var array
         */
        private $_buffer = array();
        private $_outBuffer = array();

        /**
         * Generate body html
         * @return string
         */
        public function render()
        {

            $cache = Zo2Cache::getInstance();
            return $cache->get($this->_getId(), array($this, 'getHtml'));
        }

        private function _getId()
        {
            $user = JFactory::getUser();
            return md5(serialize($user->groups) . serialize($this));
        }

        public function getHtml()
        {
            $html = '';
            $document = JFactory::getDocument();
            $document->addCustomTag('<!-- built with zo2 framework: http://www.zootemplate.com/zo2 -->');

            /* Build layout from properties */
            $properties = $this->getProperties();
            foreach ($properties as $property)
            {
                $this->_buffer[] = $this->_buildItem($property);
            }
            if ($this->get('canvasMenu') instanceof Zo2LayoutItem)
            {
                $config['item'] = $this->get('canvasMenu');
                $this->_outBuffer[] = Zo2Framework::getInstance()->displayOffCanvasMenu($config);
            }
            $html = implode(PHP_EOL, $this->_buffer);
            /**
             * caused invalid character. Will need check later
             * */
            //$html = $this->_compressHtml($html);
            return $html;
        }

        /**
         * 
         * @return type
         */
        public function renderOut()
        {
            return implode("", $this->_outBuffer);
        }

        /**
         * Generate html for an item such as a row or a column.
         * @param type $item
         * @return type
         */
        private function _buildItem($item)
        {
            $item = new Zo2LayoutItem($item);
            switch ($item->get('type'))
            {
                case 'row':
                    return $this->_generateRow($item);
                case 'col':
                    return $this->_generateColumn($item);
                default:
                    break;
            }
        }

        /**
         * 
         * @param type $item
         * @return boolean
         */
        private function _checkShowRow($item)
        {
            /**
             * @todo We only check base on jdoc & modules position
             */
            if ($item->get('name') == 'component' || $item->get('jdoc') == 'component')
            {
                return !$this->hideComponent();
            }
            $children = $item->get('children', array());
            if (count($children) > 0)
                foreach ($children as $item)
                {
                    $item = new JObject($item);
                    if ($this->_checkShowColumn($item))
                    {
                        return true;
                    }
                } else
            {
                return false;
            }
            return false;
        }

        /**
         * Generate html from a row item
         * @param type $item
         * @return string
         */
        private function _generateRow($item)
        {
            /* Basic check to verify this row can render */
            if ($this->_checkShowRow($item))
            {

                $html = '';
                $html .= '<!-- build row: ' . trim($item->get('name', 'unknown')) . ' -->' . "\n\r";

                /* START ROW WRAPPER */
                $customClass = $item->getCustomClass();
                $id = JFilterOutput::stringURLSafe(strtolower(trim($item->get('name'))));
                $html .= '<section id="zo2-' . $id . '-wrap" class="' . $customClass . '">';

                /* START CONTAINER */
                $customs = explode(' ', $customClass);

                if (in_array('full-width', $customs))
                {
                    $containerClass [] = 'container-fluid';
                } else
                {
                    $containerClass [] = 'container';
                }

                $containerClass = array_merge($containerClass, $item->getVisibilityClass());
                $containerClass = trim(implode(' ', $containerClass));
                if ($containerClass != '')
                {
                    $html .= '<div class="' . $containerClass . '">';
                } else
                {
                    $html .= '<div>';
                }

                /* START ROW  */
                $html .= '<div class="row">';

                $maxSpace = 12;
                $usedSpace = 0;
                $offsetSpace = 0;
                $exceptPos = array('footer-copyright', 'footer-logo', 'header-logo', 'canvas-menu', 'header_logo', 'logo', 'menu', 'mega-menu', 'mega_menu', 'footer_logo', 'footer_copyright', 'component', 'debug', 'message');
                $children = $item->get('children');

                /* Process span value for children */
                $availableChildren = array();
                foreach ($children as $index => $child)
                {

                    $child = new JObject($child);

                    /* Count number of available modules in this position */
                    $modulesInPosition = count(JModuleHelper::getModules($child->position));
                    /**
                     * This child position is excepted
                     * @todo We should not allow these kind of exceptions !
                     */
                    if (in_array($child->position, $exceptPos))
                    {
                        /* Because this exception than at least 1 module will be there */
                        $modulesInPosition = max($modulesInPosition, 1);
                    }
                    /* If there is no modules in this position */
                    if ($modulesInPosition == 0)
                    {
                        if (isset($children[$index + 1]))
                        {
                            /* If right element exists than plus for right */
                            $children[$index + 1]->span += $child->span;
                            $usedSpace += $child->span; /* Increase used space */
                        } else
                        {
                            /* If right element not exists than plus for left */
                            if (isset($children[$index - 1]))
                            {
                                // Make sure prev element available
                                if ($this->_checkItemPosition($children[$index - 1]))
                                {
                                    $children[$index - 1]->span += $child->span;
                                    $usedSpace += $child->span; /* Increase used space */
                                } else
                                {
                                    // Prev element not exists than we find last available                                    
                                    end($availableChildren);         // move the internal pointer to the end of the array
                                    $key = key($availableChildren);  // fetches the key of the element pointed to by the internal pointer
                                    $children[$key]->span += $usedSpace;
                                }
                            }
                        }
                    } else
                    {
                        $usedSpace += $child->span;
                        $availableChildren[$index] = $child;
                    }
                    $offsetSpace += $child->offset;
                }

                if ($usedSpace <= 0)
                    return '<!--empty row: ' . trim($item->get('name', 'unknown')) . ' -->';
//                /* Increase span for last element */
//                if ($usedSpace <= $maxSpace) {
//                    $remainingSpace = $maxSpace - $usedSpace - $offsetSpace;
//                    /* Point to last element */
//                    end($children);
//                    $key = key($children);
//                    $children[$key]->span += $remainingSpace; /* Plus with remaining space */
//                }

                foreach ($children as $child)
                {
                    $html .= $this->_buildItem($child);
                }
                /* END ROW */
                $html .= '</div>';
                /* END CONTAINER */
                $html .= '</div>';
                /* END WRAPPER */
                $html .= '</section>';
                return $html;
            }
        }

        private function _checkItemPosition($item)
        {
            if ($item instanceof JObject)
            {
                
            } else
            {
                $item = new JObject($item);
            }
            $exceptPos = array('footer-copyright', 'footer-logo', 'header-logo', 'canvas-menu', 'header_logo', 'logo', 'menu', 'mega-menu', 'mega_menu', 'footer_logo', 'footer_copyright', 'component', 'debug', 'message');
            if (in_array($item->get('position'), $exceptPos))
            {
                return true;
            } else
            {
                $modules = JModuleHelper::getModules($item->get('position'));
                if (count($modules) > 0)
                {
                    return true;
                } else
                {
                    return false;
                }
            }
        }

        /**
         * Check is allowed to show this jdoc
         * @param JRegistry $item
         * @return boolean
         */
        private function _checkShowColumn($item)
        {
            $jdoc = $item->get('jdoc', 'modules');
            if (trim($jdoc) == '')
                $jdoc = 'modules';
            switch ($jdoc)
            {
                /* Component type */
                case 'component':
                    return !$this->hideComponent();
                    break;
                /* Message type always render because it's a part of Joomla!system */
                case 'message':
                    return true;
                /* Megamenu always render */
                case 'canvasmenu':
                    return true;
                /* Megamenu always render */
                case 'megamenu':
                    return true;
                default:
                    $exceptPos = array('footer-copyright', 'footer-logo', 'header-logo', 'canvas-menu', 'header_logo', 'logo', 'menu', 'mega-menu', 'mega_menu', 'footer_logo', 'footer_copyright', 'component', 'debug', 'message');
                    if (in_array($item->get('position'), $exceptPos))
                    {
                        return true;
                    }
                    /* Modules position */
                    if (strpos('addon-', $jdoc, 0) === false)
                    {
                        jimport('joomla.application.module.helper');
                        $modules = JModuleHelper::getModules($item->get('position'));
                        if (count($modules) > 0)
                        {
                            return true;
                        } else
                        {
                            return false;
                        }
                    } else
                    { /* 3rd party */
                        $jdoc = str_replace('addon-', '', $jdoc);
                        $addons = Zo2Factory::getFramework()->getRegisteredAddons();
                        if (isset($addons[$jdoc]))
                        {
                            return true;
                        }
                    }
                    /* For now temporary force return true because all config still messup */
                    return true;
            }
        }

        /**
         * Generate html from a column item
         * @param $item
         * @return string
         */
        private function _generateColumn($item)
        {

            /* Check is allowed to show this jdoc */
            if ($this->_checkShowColumn($item))
            {
                $jdoc = $item->get('jdoc', 'modules');
                if (trim($jdoc) == '')
                    $jdoc = 'modules';
                $html = '';
                $html .= '<!-- build column: ' . trim($item->get('name', 'unknown')) . ' -->' . "\n\r";
                $html .= '<!-- jdoc: ' . $jdoc . ' - position: ' . $item->get('position') . ' -->';

                $class[] = 'col-md-' . $item->get('span');
                $class[] = 'col-sm-' . $item->get('span');

                if ($item->get('offset') != 0)
                {
                    $class [] = ' col-md-offset-' . $item->get('offset');
                }
                $class = array_merge($class, $item->getVisibilityClass());
                $customClass = explode(' ', $item->get('customClass'));
                $class = array_merge($class, $customClass);
                $class = array_unique($class);

                $gridClass = array();
                /* Find grid core class */
                foreach ($class as $key => $value)
                {
                    if (
                            strpos($value, 'col-xs-') !== false || strpos($value, 'col-sm-') !== false || strpos($value, 'col-md-') !== false || strpos($value, 'col-lg-') !== false)
                    {
                        $subs = explode('-', $value);
                        if (in_array('offset', $subs))
                        {
                            
                        } else
                        {
                            if (count($subs) == 3)
                            {
                                $gridClass[$subs[0] . '-' . $subs[1]] = $subs[2];
                            }
                            unset($class[$key]);
                        }
                    }
                }
                foreach ($gridClass as $key => $value)
                {
                    $class [] = $key . '-' . $value;
                }
                $class = array_unique($class);

                /* BEGIN COL */
                $id = JFilterOutput::stringURLSafe(strtolower(trim($item->get('name', $item->get('position')))));
                $id = str_replace('_', '-', $id);
                $html .= '<div id="zo2-' . $id . '" class="' . trim(implode(' ', $class)) . '">';

                switch ($jdoc)
                {
                    case 'component':
                        $html .= '<jdoc:include type="component" />';
                        break;
                    case 'message':
                        $html .= '<jdoc:include type="message" />';
                        break;
                    case 'modules':
                        /**
                         * old code
                         * @todo position only used to define where is element render not what kind of element
                         */
                        if (($item->get('position') == 'component'))
                            $html .= '<jdoc:include type="component" />';
                        else if (($item->get('position') == 'message'))
                            $html .= '<jdoc:include type="message" />';
                        else
                        {
                            $html .= '<jdoc:include type="modules" name="' . $item->get('position') . '"  style="' . $item->get('style') . '" />';
                        }
                        /**
                         * @todo need move to correct jdoc
                         */
                        $template = new Zo2Template();
                        switch ($item->get('position'))
                        {
                            case 'footer_copyright':
                            case 'footer-copyright':
                                $html .= Zo2Html::_('copyright', 'render');
                                break;
                            case 'header_logo':
                            case 'header-logo':
                                $html .= Zo2Html::_('headerlogo', 'render');
                                break;
                            case 'mega_menu':
                            case 'mega-menu':
                                /* Display frontend megamenu */
                                $framework = Zo2Framework::getInstance();
                                $megamenu = $framework->displayMegaMenu(Zo2Framework::getInstance()->profile->menu_type);
                                //$html .= $megamenu;
                                break;
                        }
                        break;
                    case 'megamenu':
                        /* Display frontend megamenu */
                        $framework = Zo2Framework::getInstance();
                        $megamenu = $framework->displayMegaMenu(Zo2Framework::getInstance()->profile->menu_type);
                        $html .= $megamenu;
                        break;
                    case 'canvasmenu':
                        $this->set('canvasMenu', $item);
                        $html .= '<span class="button-canvas"><i class="fa fa-2x fa-bars" data-toggle="offcanvas"></i></span>';
                        break;
                    default:
                        /**
                         * 3rd addons
                         */
                        if (strpos($jdoc, 'addon-') !== false)
                        {
                            $jdoc = str_replace('addon-', '', $jdoc);
                            $addons = Zo2Factory::getFramework()->getRegisteredAddons();
                            if (isset($addons[$jdoc]))
                            {
                                /**
                                 * Prevent evil code
                                 */
                                $html .= call_user_func($addons[$jdoc]);
                            }
                        } else
                        {
                            
                        }
                }

                foreach ($item->get('children') as $child)
                {
                    $html .= $this->_buildItem($child);
                }
                /* END COLUMN */
                $html .= '</div>';
                return $html;
            }
        }

        /**
         * Remove whitespace, tab, new line from input
         *
         * @param $input
         * @return mixed
         */
        protected function _compressHtml($buffer)
        {
            Zo2Factory::import('vendor.ganon.ganon');
            $dom = str_get_dom($buffer);
            HTML_Formatter::minify_html($dom);
            $buffer = (string) $dom;
            return $buffer;
        }

        public function getBodyClass($customClass = '')
        {
            $classes = array();
            $classes[] = Zo2Factory::getCurrentPage();
            return trim(implode(' ', $classes) . ' ' . $customClass);
        }

        /**
         * Hide component from frontpage
         * @return bool
         */
        private static function hideComponent()
        {
            $framework = Zo2Framework::getInstance();
            $params = Zo2Factory::getTemplate()->params;
            if ((int) $params->get('component_area', 0) && $framework->isFrontPage())
            {
                return true;
            } else
            {
                return false;
            }
        }

    }

}

/**
 * Class exists checking
 */
if (!class_exists('Zo2LayoutItem'))
{

    /**
     * Zo2 layout item class object
     */
    class Zo2LayoutItem extends JObject
    {

        public $type = null;
        public $name = null;
        public $classClass = null;
        public $id = null;
        public $fullwidth = null;
        public $visibility = array();
        public $children = array();

        public function getVisibilityClass()
        {
            $visibility = new JObject($this->get('visibility'));
            $classes = array();
            if (!$visibility->get('xs', 0))
                $classes[] = 'hidden-xs';
            if (!$visibility->get('sm', 0))
                $classes[] = 'hidden-sm';
            if (!$visibility->get('md', 0))
                $classes[] = 'hidden-md';
            if (!$visibility->get('lg', 0))
                $classes[] = 'hidden-lg';
            return $classes;
        }

        /**
         * 
         * @return boolean
         */
        public function haveChildren()
        {
            if (count($this->get('children')) > 0)
            {
                return true;
            }
            return false;
        }

        public function getCustomClass($default = '')
        {
            if (trim($this->get('customClass')) == '')
            {
                return $default;
            } else
            {
                return trim($this->get('customClass'));
            }
        }

    }

}    
