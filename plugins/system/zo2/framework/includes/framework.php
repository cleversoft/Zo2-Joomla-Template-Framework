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
defined('_JEXEC') or die('Restricted access');

jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

/**
 * Class exists checking
 */
if (!class_exists('Zo2Framework'))
{

    /**
     * Zo2 Framework object class     
     */
    class Zo2Framework
    {

        /**
         * @var Zo2Framework
         */
        protected static $_instances;

        /**
         * Joomla! template object
         * @var object
         */
        public $template = null;

        /**
         *
         * @var Zo2Assets
         */
        public $assets = null;

        /**
         *
         * @var Zo2Profile
         */
        public $profile = null;

        /**
         *
         * @var \Zo2Layout
         */
        public $layout = null;

        /**
         *
         * @var array 
         */
        protected $_addons = array();

        /**
         * Constructor
         * @param type $template
         */
        protected function __construct()
        {
            
        }

        /**
         * 
         * @staticvar Zo2Framework $instance
         * @return \Zo2Framework
         */
        public static function getInstance()
        {
            static $instance;
            if (!isset($instance))
            {
                $instance = new Zo2Framework();
            }
            return $instance;
        }

        /**
         * Framework init
         */
        public function init()
        {
            if (!defined('ZO2_LOADED'))
            {
                $this->template = Zo2Factory::getTemplate();
                /* Load language */
                $language = JFactory::getLanguage();
                $language->load('plg_system_zo2', ZO2PATH_ROOT);

                JHtml::_('jquery.framework');

                $jinput = JFactory::getApplication()->input;
                /**
                 * Init framework variables
                 */
                $this->path = Zo2Path::getInstance();
                /* Zo2 root dir */
                $this->path->registerNamespace('zo2', ZO2PATH_ROOT);
                /* Zo2 html */
                $this->path->registerNamespace('html', ZO2PATH_ROOT . '/html');
                /* Zo2 assets */
                $this->path->registerNamespace('assets', ZO2PATH_ROOT . '/assets');

                /**
                 * Zo2 template
                 */
                $templateName = $this->template->template;
                $this->path->registerNamespace('zo2', JPATH_ROOT . '/templates/' . $templateName);
                $this->path->registerNamespace('assets', JPATH_ROOT . '/templates/' . $templateName . '/assets');
                /* Current */
                $this->path->registerNamespace('templates', JPATH_ROOT . '/templates/' . $templateName);
                /* Override Zo2 html directory */
                $this->path->registerNamespace('html', JPATH_ROOT . '/templates/' . $templateName . '/html');

                /**
                 * Init Zo2 objects
                 */
                $this->assets = Zo2Assets::getInstance();
                if (JFactory::getApplication()->isAdmin())
                {
                    JHtml::_('jquery.ui', array('core', 'sortable'));
                    $this->profile = Zo2Factory::getProfile();
                } else
                {
                    $this->profile = Zo2Factory::getProfile();
                }


                $this->layout = new Zo2Layout($this->profile->layout);

                $this->_loadAssets();
                define('ZO2_LOADED', 1);
            }
        }

        /**
         * Get template params
         * @param type $name
         * @param type $default
         * @return type
         */
        public static function getParam($name, $default = null)
        {
            return self::getInstance()->get($name, $default);
        }

        /**
         * Get template param
         * @use Just for back compatilibity with index.php in template
         * @return type
         */
        public function get($name, $default = null)
        {
            return $this->profile->get($name, $default);
        }

        /**
         * 
         */
        private function _loadAssets()
        {

            $assetsFile = 'assets.default.json';
            /* Load Zo2' assets */
            $assetsFile = Zo2Factory::getPath('zo2://assets/' . $assetsFile);
            if ($assetsFile)
            {
                $assets = json_decode(file_get_contents($assetsFile));
                /* Debug mode */
                if ($this->get('development_mode'))
                {
                    $this->assets->buildAssets();
                }
                /* Site loading */
                if (Zo2Factory::isSite())
                {
                    /* Load core assets */
                    $this->assets->load($assets->frontend);
                    /**
                     * Disable responsive
                     * @link http://getbootstrap.com/getting-started/#disable-responsive
                     */
                    if ($this->get('non_responsive_layout'))
                    {
                        $this->assets->addStyleSheet('vendor/bootstrap/addons/non-responsive.css');
                        $this->assets->addStyleSheet('zo2/css/non-responsive.css');
                    } else
                    {
                        $this->assets->addStyleSheet('zo2/css/responsive.css');
                    }

                    /* Custom files */
                    $this->assets->addStyleSheet('zo2/css/custom.css');
                    $this->assets->addScript('zo2/js/custom.js');
                    /* Load bootstrap-rtl if needed */
                    if (Zo2Factory::isRTL())
                    {
                        $this->assets->addStyleSheet('vendor/bootstrap/addons/bootstrap-rtl/css/bootstrap-rtl.min.css');
                        $this->assets->addStyleSheet('zo2/css/rtl.css');
                    }
                    $this->_loadTheme();
                } else
                {
                    /* Backend loading */

                    /* Load core assets */
                    $this->assets->load($assets->backend);
                }
            } else
            {
                JFactory::getApplication()->enqueueMessage(JText::_('ZO2_ASSETS_NOT_FOUND'), 'error');
            }
        }

        /**
         * 
         * @param type $key
         * @return type
         */
        public function getPath($key)
        {
            return Zo2Factory::getPath('templates://' . $key);
        }

        /**
         * 
         * @param type $key
         * @return type
         */
        public function getUrl($key)
        {
            return Zo2Factory::getUrl('templates://' . $key);
        }

        /**
         *
         * @return array
         */
        public function getTemplatePositions()
        {
            $path = $this->getPath('templateDetails.xml');
            $positions = array();
            if ($path)
            {
                $xml = simplexml_load_file($path);
                $positions = (array) $xml->positions;
                if (isset($positions['position']))
                    $positions = $positions['position'];
                else
                    $positions = array();
            }
            return $positions;
        }

        /**
         * Generate custom CSS style for Standard Font option
         *
         * @param $data
         * @param $selector
         */
        protected function _buildStandardFontStyle($data, $selector)
        {
            $assets = Zo2Assets::getInstance();
            $family = $data->get('family');
            $style = array();
            /* Font family */
            if (!empty($family->standard))
                $style [] = 'font-family:"' . $family->standard . '"';
            /* Font size */
            if ($data->get('size') > 0)
                $style [] = 'font-size:' . $data->get('size') . 'px';
            /* Font line height */
            if ($data->get('font_line_height') > 0)
                $style [] = 'line-height:' . $data->get('font_line_height') . 'px';
            $style = implode(';', $style);
            if (!empty($style))
            {
                $style = $selector . '{' . $style . '}';
                $assets->addStyleSheetDeclaration($style);
            }
        }

        /**
         * @param $data
         * @param $selector
         */
        protected function _buildGoogleFontsStyle($data, $selector)
        {
            $assets = Zo2Assets::getInstance();
            $family = $data->get('family');
            $api[] = 'http://fonts.googleapis.com/css?family=';
            $style = array();
            if (!empty($family->googlefonts))
            {
                if (strpos($family->googlefonts, ':') !== false)
                {
                    $googlefonts = explode(':', $family->googlefonts);
                    $googlefonts = $googlefonts[0];
                } else
                {
                    $googlefonts = $family->googlefonts;
                }
                $family->googlefonts = $googlefonts;
                $style [] = 'font-family:"' . $family->googlefonts . '"';
                $api [] = urlencode($family->googlefonts);
            }
            if ($data->get('size') > 0)
                $style [] = 'font-size:' . $data->get('size') . 'px';
            /* Font line height */
            if ($data->get('font_line_height') > 0)
                $style [] = 'line-height:' . $data->get('font_line_height') . 'px';
            $style = implode(';', $style);
            if (!empty($style))
            {
                $doc = JFactory::getDocument();
                $doc->addStyleSheet(implode('', $api));
                $style = $selector . '{' . $style . '}';
                $assets->addStyleSheetDeclaration($style);
            }
        }

        /**
         * Generate custom CSS style for FontDeck option
         *
         * @param $data
         * @param $selector
         */
        protected function _buildFontDeckStyle($data, $selector)
        {
            $fontdeckCode = $this->get('fontdeck_code');
            $assets = Zo2Assets::getInstance();
            $family = $data->get('family');
            if (!empty($fontdeckCode))
            {
                $assets->addScriptDeclaration($fontdeckCode);
            }

            $style = array();
            if (!empty($family->fontdeck))
                $style [] = 'font-family:"' . $family->fontdeck . '"';
            /* Font size */
            if ($data->get('size') > 0)
                $style [] = 'font-size:' . $data->get('size') . 'px';
            /* Font line height */
            if ($data->get('font_line_height') > 0)
                $style [] = 'line-height:' . $data->get('font_line_height') . 'px';
            $style = implode(';', $style);
            if (!empty($style))
            {
                $style = $selector . '{' . $style . '}';
                $assets->addStyleSheetDeclaration($style);
            }
        }

        /**
         *
         */
        protected function _loadTheme()
        {
            /* Template side */
            $templateAssets = json_decode($this->getAssetsFile('template.json'));
            if ($templateAssets && isset($templateAssets->assets))
            {
                $this->assets->load($templateAssets->assets);
            }
            $style = array();
            if ($this->profile->theme)
            {
                $style = $this->profile->getThemeStylesheet();
                $this->assets->addStyleSheetDeclaration($style);
                if (isset($this->profile->theme->css) && $this->profile->theme->css != '')
                {
                    $this->assets->addStyleSheet('zo2/css/' . $this->profile->theme->css . '.css');
                }
            }

            /* Prepare Fonts */
            $selectors = array(
                'body_font' => 'body',
                'menu_font' => 'nav, .sidebar-nav',
                'h1_font' => 'h1',
                'h2_font' => 'h2',
                'h3_font' => 'h3',
                'h4_font' => 'h4',
                'h5_font' => 'h5',
                'h6_font' => 'h6'
            );
            /* */
            foreach ($selectors as $key => $selector)
            {
                $value = $this->get($key);
                if (!empty($value))
                {
                    $value = new JObject($value);
                    switch ($value->get('type'))
                    {
                        case 'standard':
                            $this->_buildStandardFontStyle($value, $selector);
                            break;
                        case 'googlefonts':
                            $this->_buildGoogleFontsStyle($value, $selector);
                            break;
                        case 'fontdeck':
                            $this->_buildFontDeckStyle($value, $selector);
                            break;
                        default:
                            break;
                    }
                }
            }
        }

        public function isBoxed()
        {
            if (isset($this->profile->get('theme')->boxed) && $this->profile->get('theme')->boxed == 1)
                return true;
            return false;
        }

        /**
         * Get list of data components of current template. Usable from backend only.
         *
         * @param string $templateName
         * @return string
         */
        public function getComponents($templateName)
        {
            if (!empty($templateName))
            {
                $path = JPATH_SITE . '/templates/' . $templateName . '/data/components.json';
                if (file_exists($path))
                {
                    $content = file_get_contents($path);
                    echo $content;
                }
            }

            return '';
        }

        /**
         * Return singleton Zo2Layout instance
         * @staticvar Zo2Layout $instances
         * @return \Zo2Layout
         */
        public function getLayout($templateName = null)
        {
            static $instances;
            $templateId = Zo2Factory::getTemplate()->id;
            if (!isset($instances[$templateId]))
            {
                $instances[$templateId] = new Zo2Layout();
            }
            return $instances[$templateId];
        }

        /**
         * Get list of layouts from this template
         * @return array
         */
        public function getTemplateLayouts()
        {
            $templateName = $this->template->template;

            if (!empty($templateName))
            {
                $templatePath = JPATH_SITE . '/templates/' . $templateName . '/layouts/*.php';
                $layoutFiles = glob($templatePath);
                if (is_array($layoutFiles))
                    return array_map('basename', $layoutFiles, array('.php'));
            } else
                return array();
        }

        /**
         * Return current page.
         *
         * @return string
         */
        public function getCurrentPage()
        {
            $app = JFactory::getApplication();
            $menu = $app->getMenu();
            if (isset($menu))
            {
                $activeMenu = $menu->getActive();
                if (isset($activeMenu) && $activeMenu->home)
                    return 'homepage';
            }

            return $app->input->getString('view', 'homepage');
        }

        /**
         *
         * @param string $menutype
         * @return string
         */
        public function getMenuType($menuType = null)
        {
            if ($menuType === null)
            {
                $menuType = $this->get('menu_type', 'mainmenu');
            }
            return $menuType;
        }

        /**
         *
         * @param string $menutype
         * @return array
         */
        public function getMenuItems($menuType = null)
        {
            $menuType = $this->getMenuType($menuType);
            $menu = JFactory::getApplication()->getMenu();
            return $menu->getItems('menutype', $menuType);
        }

        /**
         * Get HTML for Megamenu
         * @param string $menutype
         * @param string $isAdmin True to generate megamenu in backend
         * @return string
         */
        public function displayMegaMenu($menutype = null, $isAdmin = false)
        {
            if ($menutype === null)
            {
                $menutype = $this->get('menu_type', 'mainmenu');
            }
            $menu = new Zo2Megamenu($menutype);
            return $menu->rendermenu($isAdmin);
        }

        /**
         * @todo Create new renderMenu to wrap both of mega & canvas menu function
         * @todo Parameter is object / array config
         * @param type $config
         * @param type $isAdmin
         * @return type
         */
        public function displayOffCanvasMenu($config = null, $isAdmin = false)
        {
            if (!isset($config['menu_type']))
            {
                $config['menu_type'] = $this->get('menu_type', 'mainmenu');
            }
            if (!isset($config['isAdmin']))
            {
                $config['isAdmin'] = false;
            }
            $menu = new Zo2Megamenu($config['menu_type'], $config);
            return $menu->renderOffCanvasMenu($config);
        }

        public function getAsset($name, $data = array())
        {
            static $assets = array();
            if (empty($assets[$name]))
            {
                $assets[$name] = new Zo2Asset($data);
            }
            return $assets[$name];
        }

        /**
         * 
         * @return SimpleXMLElement
         */
        public function getManifest()
        {
            $manifestFile = realpath(ZO2PATH_ROOT . '/../zo2.xml');
            if (JFile::exists($manifestFile))
            {
                return simplexml_load_file($manifestFile);
            }
            return false;
        }

        /**
         * Check Zo2 version is up to date
         * @return int
         */
        public function checkVersion()
        {
            $remoteXML = simplexml_load_file('http://update.zo2framework.org/zo2/extension.xml');
            $result['compare'] = 0;
            $result['currentVersion'] = (string) $this->getManifest()->version;
            $result['latestVersion'] = 'Unknown';
            if ($remoteXML)
            {
                $result['latestVersion'] = (string) $remoteXML->update[0]->version;
                $result['compare'] = version_compare($result['currentVersion'], $result['latestVersion']);
            }
            return $result;
        }

        /**
         * Get array of exists profiles
         * @return \Zo2Profile
         */
        public function getProfiles()
        {
            $templateProfiles = $this->_getProfiles(Zo2Factory::getPath('templates://assets/profiles/' . $this->template->id));
            $defaultProfiles = $this->_getProfiles(Zo2Factory::getPath('templates://assets/profiles'));
            $profiles = array_merge($defaultProfiles, $templateProfiles);
            return array_unique($profiles);
        }

        /**
         * 
         * @param string $dir
         * @return array Zo2Profile
         */
        private function _getProfiles($dir)
        {
            $profiles = array();
            if (JFolder::exists($dir))
            {
                $files = JFolder::files($dir);
                if ($files)
                {
                    foreach ($files as $file)
                    {
                        if (JFile::getExt($file) == 'json')
                        {
                            $profile = new Zo2Profile();
                            $profile->load(JFile::stripExt($file));
                            if ($profile->isValid())
                            {
                                $profiles[$profile->name] = $profile;
                            }
                        }
                    }
                }
            }
            return $profiles;
        }

        public function joomla($name)
        {
            $filePath = ZO2PATH_ROOT . '/joomla/' . $name . '.php';
            if (JFile::exists($filePath))
            {
                require_once $filePath;
            }
            $className = 'Zo2J' . ucfirst($name);
            if (class_exists($className))
            {
                return new $className();
            }
        }

        public function __get($name)
        {
            $properties = get_object_vars($this);
            if (isset($properties[$name]))
            {
                return $properties;
            } else
            {
                
            }
        }

        /**
         * Register addons that will render
         * @param type $name
         * @param type $callback
         * @return \Zo2Framework
         */
        public function registerAddon($name, $callback)
        {
            $this->_addons[$name] = $callback;
            return $this;
        }

        public function getRegisteredAddons()
        {
            return $this->_addons;
        }

        public function getAssetsFile($path)
        {
            $assetsFile = $this->getPath('assets/' . $path);
            if ($assetsFile)
            {
                return file_get_contents($assetsFile);
            }
        }

        /**
         * @return bool
         */
        public static function isFrontPage()
        {
            $app = JFactory::getApplication();
            $menu = $app->getMenu();
            $tag = JFactory::getLanguage()->getTag();
            if ($menu->getActive() == $menu->getDefault($tag))
            {
                return true;
            } else
            {
                return false;
            }
        }

    }

}