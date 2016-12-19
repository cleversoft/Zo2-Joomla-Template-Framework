<?php

/**
 * Zo2 - A powerful Joomla template framework
 * @version     1.5.3
 * @link        http://www.zootemplate.com/zo2
 * @author      ZooTemplate
 * @copyright   CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */

defined('_JEXEC') or die();


class PlgSystemZo2InstallerScript
{
    /**
     * Called after any type of action
     *
     * @param     string              $route      Which action is happening (install|uninstall|discover_install)
     * @param     jadapterinstance    $adapter    The object responsible for running this script
     *
     * @return    boolean                         True on success
     */
    public function postFlight($route, JAdapterInstance $adapter)
    {
        $db    = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query
            ->update('#__extensions')
            ->set("`enabled`='1'")
            ->where("`type`='plugin'")
            ->where("`folder`='system'")
            ->where("`element`='zo2'");
        $db->setQuery($query);
        $db->execute();
        
        return true;
    }
}
