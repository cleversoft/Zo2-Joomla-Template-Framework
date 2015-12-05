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
if (!class_exists('Zo2Factory'))
{

    /**
     * Zo2 Framework factory class
     */
    class Zo2Factory
    {

        public static function getFramework()
        {
            return Zo2Framework::getInstance();
        }

        /**
         * 
         * @param type $namespace
         * @param type $path
         */
        public static function registerNamespace($namespace, $path)
        {
            return Zo2Path::getInstance()->registerNamespace($namespace, $path);
        }

        /**
         *
         * @staticvar array $instances
         * @param int $id
         * @return object
         */
        public static function getTemplate($id = null)
        {
            /**
             * Template instances
             */
            static $instances;
            /**
             * Menu itemids
             */
            static $itemIds;
            /* Get specific template id */
            if ($id !== null)
            {
                if (isset($instances[$id]))
                {
                    return $instances[$id];
                }
                $db = JFactory::getDBO();
                $query = ' SELECT * FROM ' . $db->quoteName('#__template_styles') .
                        ' WHERE ' . $db->quoteName('id') . ' = ' . (int) $id;
                $db->setQuery($query);
                $template = $db->loadObject();
                if ($template)
                {
                    $template->params = new JRegistry($template->params);
                }
                $instances[$id] = $template;
                return $instances[$id];
            } else
            {
                /* Get current template */
                if (JFactory::getApplication()->isSite())
                {
                    /**
                     * Somehow we can't use getActiveMenu here
                     * @todo Need to improve process
                     */
                    $itemId = JFactory::getApplication()->input->getInt('Itemid');

                    if (is_int($itemId))
                    {
                        if (isset($itemIds[$itemId]))
                        {
                            $templateId = $itemIds[$itemId];
                        } else
                        {
                            /* Get template id from database with Itemid */
                            $db = JFactory::getDbo();
                            $query = ' SELECT ' . $db->quoteName('template_style_id');
                            $query .= ' FROM ' . $db->quoteName('#__menu');
                            $query .= ' WHERE ' . $db->quoteName('id') . ' = ' . (int) $itemId;
                            $db->setQuery($query);
                            $templateId = $db->loadResult();
                            $itemIds[$itemId] = $templateId;
                        }
                        if ($templateId && $templateId != 0)
                        {
                            $id = $templateId;
                            $template = self::getTemplate($templateId);
                            // Can't get template provided itemId than we follow Joomla!
                            if ($template == false)
                            {
                                $template = JFactory::getApplication()->getTemplate(true);
                                $id = $template->id;
                            }
                        } else
                        {
                            $template = JFactory::getApplication()->getTemplate(true);
                            $id = $template->id;
                        }
                    } else
                    { /* Itemid is not exists than use Joomla! API to get current template */
                        $template = JFactory::getApplication()->getTemplate(true);
                        $id = $template->id;
                    }


                    $instances[$id] = $template;
                    return $instances[$id];
                } else
                {
                    $option = JFactory::getApplication()->input->get('option');
                    /* Get requesting template for backend only */
                    $id = JFactory::getApplication()->input->get('id');
                    if ($id && $option == 'com_templates')
                    {
                        return self::getTemplate($id);
                    }
                }
            }
        }

        /**
         * Retun physical path by input key
         * @param type $name
         * @return type
         */
        public static function getPath($key)
        {
            return Zo2Path::getInstance()->getPath($key);
        }

        /**
         * Return url by input key
         * @param type $name
         * @return type
         */
        public static function getUrl($key)
        {
            return Zo2Path::getInstance()->getUrl($key);
        }

        /**
         * Is frontend
         * @return type
         */
        public static function isSite()
        {
            return JFactory::getApplication()->isSite();
        }

        public static function ajax()
        {
            /**
             * Ajax catching
             * @todo not good at all but until we have chance
             */
            $jinput = JFactory::getApplication()->input;
            $task = $jinput->getCmd('zo2_task');
            if ($task && ($jinput->get('zo2_ajax') == 1 ))
            {
                $task = explode('.', $task);
                $modelClass = 'Zo2Model' . ucfirst($task[0]);
                $model = new $modelClass;
                if (method_exists($model, $task[1]))
                {
                    call_user_func(array($model, $task[1]));
                }
            }
        }

        /**
         * Return current page.
         *
         * @return string
         */
        public static function getCurrentPage()
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
         * Import file from Zo2Framework plugin directory
         *
         * @param string $filepath Dot syntax file path
         * @param bool $once Require this file only once
         * @return bool
         */
        public static function import($filePath, $once = true)
        {
            $path = ZO2PATH_ROOT . DIRECTORY_SEPARATOR . str_replace('.', DIRECTORY_SEPARATOR, $filePath) . '.php';
            if (JFile::exists($path))
            {
                return $once ? include_once $path : include $path;
            }
            return false;
        }

        /**
         * Get instance of Zo2Profile by name
         * @staticvar array $profiles
         * @param type $profile
         * @return \Zo2Profile
         */
        public static function getProfile($profile = null)
        {
            static $profiles = array();
            $profileName = 'default';

            if ($profile === null)
            {
                if (JFactory::getApplication()->isSite())
                {
                    $profileName = Zo2Framework::getInstance()->template->params->get('profile', 'default');
                    $profileName = JFactory::getApplication()->input->get('profile', $profileName);
                } else
                {
                    $profileName = JFactory::getApplication()->input->get('profile');
                    if (empty($profileName))
                    {
                        $profileName = Zo2Framework::getInstance()->template->params->get('profile', 'default');
                    }
                }
            } else
            {
                if (is_string($profile))
                {
                    $profileName = $profile;
                } elseif ($profile instanceof Zo2Profile)
                {
                    $profileName = $profile->name;
                }
            }
            if (!is_string($profileName) || empty($profileName))
            {
                $profileName = 'default';
            }
            if (!isset($profiles[$profileName]))
            {
                $profile = new Zo2Profile();
                $profile->load($profileName);
                $profiles[$profileName] = $profile;
            }

            return $profiles[$profileName];
        }

        public static function addLog($title, $message, $type = 'notice')
        {
            Zo2Logs::getInstance()->add($title, $message, $type);
        }

        public static function isRTL()
        {
            return JFactory::getLanguage()->isRTL() && (Zo2Framework::getParam('enable_rtl') == 1);
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

        public static function getRandomId()
        {
            return 'zo2' . md5(time() . microtime());
        }

        public static function joomlaHook()
        {
            $jinput = JFactory::getApplication()->input;
            if ($jinput->get('option') == 'com_templates')
            {
                $task = $jinput->get('task');
                $model = Zo2ModelTemplate::getInstance();
                switch ($task)
                {
                    case 'style.save':
                    case 'style.apply':
                        $model->save();
                        break;
                    case 'remove':
                        $model->remove();
                        break;
                    case 'rename':
                        $model->rename();
                        break;
                };
            }
        }

    }

}