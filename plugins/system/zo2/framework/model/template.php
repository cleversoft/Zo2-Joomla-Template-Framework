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
if (!class_exists('Zo2ModelTemplate'))
{

    /**
     * 
     */
    class Zo2ModelTemplate
    {

        public function getTemplate($id)
        {
            $db = JFactory::getDbo();
            $query = ' SELECT * FROM ' . $db->quoteName('#__template_styles')
                    . ' WHERE '
                    . $db->quoteName('id') . '=' . (int) $id;
            $db->setQuery($query);
            $template = $db->loadObject();
            if ($template)
            {
                $template->params = new JRegistry($template->params);
            }
            return $template;
        }

    }

}