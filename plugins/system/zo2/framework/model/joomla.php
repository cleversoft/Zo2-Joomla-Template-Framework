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
if (!class_exists('Zo2ModelJoomla'))
{

    /**
     * 
     */
    class Zo2ModelJoomla
    {

        public function getModules()
        {
            $app = JFactory::getApplication();
            $user = JFactory::getUser();
            $groups = implode(',', $user->getAuthorisedViewLevels());
            $lang = JFactory::getLanguage()->getTag();

            $db = JFactory::getDbo();

            $query = $db->getQuery(true)
                    ->select('m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params')
                    ->from('#__modules AS m')
                    ->where('m.published = 1')
                    ->join('LEFT', '#__extensions AS e ON e.element = m.module AND e.client_id = m.client_id')
                    ->where('e.enabled = 1');


            $query->order('m.position, m.ordering');

            // Set the query
            $db->setQuery($query);

            return $db->loadObjectList();
        }

        /**
         * 
         * @param type $type
         * @return boolean
         */
        public function getMenuItemsByType($type)
        {
            $db = JFactory::getDbo();
            $user = JFactory::getUser();
            $query = $db->getQuery(true)
                    ->select('m.id, m.menutype, m.title, m.alias, m.note, m.path AS route, m.link, m.type, m.level, m.language')
                    ->select($db->quoteName('m.browserNav') . ', m.access, m.params, m.home, m.img, m.template_style_id, m.component_id, m.parent_id')
                    ->select('e.element as component')
                    ->from('#__menu AS m')
                    ->join('LEFT', '#__extensions AS e ON m.component_id = e.extension_id')
                    ->where('m.published = 1')
                    ->where('m.parent_id > 0')
                    ->where('m.client_id = 0')
                    ->where('m.access IN ( ' . implode(',', $user->getAuthorisedViewLevels()) . ' )' ) 
                    ->where('m.menutype = ' . $db->quote($type))
                    ->order('m.lft');

            // Set the query
            $db->setQuery($query);
            $items = array();
            try
            {
                $items = $db->loadObjectList('id');
            } catch (RuntimeException $e)
            {
                JError::raiseWarning(500, JText::sprintf('JERROR_LOADING_MENUS', $e->getMessage()));
                return false;
            }

            foreach ($items as &$item)
            {
                $item->params = new JRegistry($item->params);
                // Get parent information.
                $parent_tree = array();

                if (isset($items[$item->parent_id]))
                {
                    $parent_tree = $items[$item->parent_id]->tree;
                }

                // Create tree.
                $parent_tree[] = $item->id;
                $item->tree = $parent_tree;

                // Create the query array.
                $url = str_replace('index.php?', '', $item->link);
                $url = str_replace('&amp;', '&', $url);

                parse_str($url, $item->query);
            }
            return $items;
        }

        public function getAvaiablePositions()
        {
            $templatePositions = Zo2Framework::getInstance()->getTemplatePositions();

            $db = JFactory::getDbo();
            $query = $db->getQuery(true)
                    ->select('m.position')
                    ->from('#__modules AS m')
                    ->where('m.published = 1')
                    ->where('m.client_id = 0');
            $db->setQuery($query);
            $modulePositions = $db->loadColumn();

            $list = array_merge($templatePositions, $modulePositions);
            $list = array_unique($list);

            return $list;
        }

    }

}
