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

/**
 * Class exists checking
 */
if (!class_exists('Zo2Profile'))
{

    /**
     * Zo2 profile object
     */
    class Zo2Profile extends JRegistry
    {

        /**
         * Profile file path
         * @var string
         */
        private $_profileFile;

        /**
         *
         * @var string
         */
        private $_profileName;

        /**
         * Profile directory path
         * @var string
         */
        private $_profileDir;

        /**
         * Default profile name
         */
        const DEFAULT_PROFILE_NAME = 'default';

        /**
         * 
         * @param object|array $data
         */
        public function __construct($data = null)
        {
            parent::__construct($data);
            $framework = Zo2Framework::getInstance();
            /* Init default profile root directory */
            $this->_profileDir = JPATH_ROOT . '/templates/' . $framework->template->template . '/assets/profiles';
        }

        /**
         * 
         * @param string $name
         * @return mixed
         */
        public function __get($name)
        {
            return $this->get($name);
        }

        /**
         * 
         * @param string $name
         * @param mixed $value
         * @return mixed
         */
        public function __set($name, $value)
        {
            return $this->set($name, $value);
        }

        /**
         * Load profile by name
         * @param string $file
         * @return boolean
         */
        public function load($name)
        {

            /* Load profile under profiles root dir */

            /* Load from profiles directory of assets namespace */
            $profileFile = Zo2Factory::getPath('assets://profiles/' . $name . '.json');

            /* If asked file is not exists than load default */
            if ($profileFile == false)
            {
                $profileFile = Zo2Factory::getPath('assets://profiles/' . self::DEFAULT_PROFILE_NAME . '.json');
            }

            /* Profile file is existed */
            if ($profileFile)
            {
                Zo2Factory::addLog('Loading profile', $profileFile);
                /* Load profile data by use json file */
                $this->loadFile($profileFile);
                // Layout               
                $layout = $this->get('layout');
                if (is_string($layout))
                {
                    $layout = json_decode($layout);
                    $this->set('layout', $layout);
                }
                // Menu config                
                $menu_config = $this->get('menu_config');
                if (is_string($menu_config))
                {
                    $menu_config = json_decode($menu_config);
                    $this->set('menu_config', $menu_config);
                }

                // Theme
                $theme = $this->get('theme');
                if (is_string($theme))
                {
                    $theme = json_decode($theme);
                    $this->set('theme', $theme);
                }
                $this->_profileFile = $profileFile;
                return $this->isValid();
            }
            return false;
        }

        public function isValid()
        {
            return $this->_check();
        }

        /**
         * Valid profile checking
         * @return boolean
         */
        private function _check()
        {
            $template = $this->get('template');
            if (empty($template))
            {
                JFactory::getApplication()->enqueueMessage('Invalid profile: Template field is missed', 'error');
                return false;
            }
            $name = $this->get('name');
            if (empty($name))
            {
                JFactory::getApplication()->enqueueMessage('Invalid profile: Name field is missed', 'error');
                return false;
            }
            $layout = $this->get('layout');
            if (empty($layout))
            {
                JFactory::getApplication()->enqueueMessage('Invalid profile: Layout field is missed', 'error');
                return false;
            }

            return true;
        }

        /**
         * 
         * @return \JRegistry
         */
        public function getMenuConfig()
        {

            $menuConfig = new JRegistry();
            $properties = $this->toArray();
            foreach ($properties as $key => $value)
            {
                if (strpos($key, 'menu_') !== false)
                {
                    $key = substr($key, 5);
                    if ($key == 'config')
                    {
                        $key = 'mega_config';
                    }
                    $menuConfig->set($key, $value);
                }
            }
            return $menuConfig;
        }

        /**
         * 
         * @param type $menuType
         * @return type
         */
        public function getMegaMenuConfig($menuType = 'mainmenu')
        {
            $menuConfig = $this->getMenuConfig()->get('mega_config');
            if (isset($menuConfig[$menuType]))
            {
                return $menuConfig[$menuType];
            }
            return;
        }

        /**
         * 
         * @param type $profileFile
         * @return bool
         */
        private function _save($profileFile)
        {
            if ($this->isValid())
            {
                if (version_compare(PHP_VERSION, '5.4.0', '>='))
                {
                    $buffer = json_encode($this->toArray(), JSON_PRETTY_PRINT);
                } else
                {
                    $buffer = json_encode($this->toArray());
                }
                if (JFile::write($profileFile, $buffer))
                {
                    return true;
                } else
                {
                    JFactory::getApplication()->enqueueMessage('Permission denied! Please change the permission of the directory and enable others to create files inside /templates/zo2_template/assets/profile', 'error');
                    return false;
                }
            }
            return false;
        }

        /**
         * 
         * @return type
         */
        public function save()
        {
            /* Save to template assets/profiles */
            $templatePath = rtrim(JPATH_ROOT . '/templates/' . $this->template, DIRECTORY_SEPARATOR);
            $filePath = $templatePath . '/assets/profiles/' . $this->name . '.json';
            return $this->_save($filePath);
        }

        /**
         * 
         * @return boolean
         */
        public function delete()
        {
            if (strpos($this->_profileFile, 'default.json') === false)
            {

                /* Do file delete */
                if (JFile::exists($this->_profileFile))
                {
                    return JFile::delete($this->_profileFile);
                }
            } else
            {
                JFactory::getApplication()->enqueueMessage('You can not delete default profile');
            }
            return false;
        }

        public function rename($newName)
        {
            $originalInfo = pathinfo($this->_profileFile);
            $oldProfileName = $originalInfo ['basename'];
            $newFilePath = $originalInfo['dirname'] . '/' . $newName . '.json';
            if (JFile::exists($newFilePath))
            {
                JFactory::getApplication()->enqueueMessage('Profile file existed', 'error');
            } else
            {
                $this->name = $newName;
                $this->save();
                /* delete old file */
                $this->delete();
                /* reload */
                $this->load($newName);
                //JFile::move($this->_profileFile, $newFilePath);
                return true;
            }
            return false;
        }

        public function getThemeStylesheet()
        {
            $style = array();

            $themeData = get_object_vars($this->theme);
            /* Background */
            if (!empty($themeData['background']))
                $style [] = 'body{background-color:' . $themeData['background'] . ';}';
            /* Header */
            if (!empty($themeData['header']))
                $style [] = '#zo2-header{background-color:' . $themeData['header'] . ';}';
            /* Header top */
            if (!empty($themeData['header_top']))
                $style [] = '#zo2-header-top{background-color:' . $themeData['header_top'] . ';}';
            /* Text */
            if (!empty($themeData['text']))
                $style [] = 'body{color:' . $themeData['text'] . ';}';
            /* Link */
            if (!empty($themeData['link']))
                $style [] = 'a{color:' . $themeData['link'] . ';}';
            /* Link hover */
            if (!empty($themeData['link_hover']))
                $style [] = 'a:hover{color:' . $themeData['link_hover'] . ';}';
            /* Bottom1 */
            if (!empty($themeData['bottom1']))
                $style [] = '#zo2-bottom1{background-color:' . $themeData['bottom1'] . ';}';
            /* Bottom2 */
            if (!empty($themeData['bottom2']))
                $style [] = '#zo2-bottom2{background-color:' . $themeData['bottom2'] . ';}';
            /* Footer */
            if (!empty($themeData['footer']))
                $style [] = '#zo2-footer{background-color:' . $themeData['footer'] . ';}';
            if (!empty($themeData['boxed']) && $themeData['boxed'] == 1)
            {
                if (!empty($themeData['bg_image']) || !empty($themeData['bg_pattern']))
                {
                    $backgroundImage = !empty($themeData['bg_image']) ? $themeData['bg_image'] : $themeData['bg_pattern'];
                    $backgroundImage = JUri::root() . '/' . $backgroundImage;
                    $backgroundImage = str_replace('\\', '/', $backgroundImage);
                }
                if (!empty($backgroundImage))
                    $style [] = 'body.boxed{background-image:url("' . $backgroundImage . '");}';
            }

            return implode(PHP_EOL, $style);
        }

        public function isDefault()
        {
            if ($this->get('name') == 'default')
            {
                return true;
            }
        }

        /**
         * 
         * @param type $action
         * @return boolean
         */
        public function authorise($action)
        {
            switch ($action)
            {
                case 'saveAs':
                    return true;
                case 'rename';
                    return !$this->isDefault();
                case 'delete';
                    return !$this->isDefault();
                default:
                    return true;
            }
        }

    }

}