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
if (!class_exists('Zo2ModelJoomla')) {

    /**
     * 
     */
    class Zo2ModelJoomla {

        public function getModules() {
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
            if ($app->isSite() && $app->getLanguageFilter()) {
                $query->where('m.language IN (' . $db->quote($lang) . ',' . $db->quote('*') . ')');
            }

            $query->order('m.position, m.ordering');

            // Set the query
            $db->setQuery($query);

            return $db->loadObjectList();
        }

    }

}