<?php
/**
 * @package      Zo2
 *
 * @author       ZooTemplate.com
 * @copyright    Copyright (C) 2008 - 2015. All rights reserved.
 * @license      GPL v2 or later
 */

defined('_JEXEC') or die();


class pkg_Zo2InstallerScript
{
    /**
     * Called before any type of action
     *
     * @param     string              $route      Which action is happening (install|uninstall|discover_install)
     * @param     jadapterinstance    $adapter    The object responsible for running this script
     *
     * @return    boolean                         True on success
     */
    public function preflight($route, JAdapterInstance $adapter)
    {
        return true;
    }


    /**
     * Called after any type of action
     *
     * @param     string              $route      Which action is happening (install|uninstall|discover_install)
     * @param     jadapterinstance    $adapter    The object responsible for running this script
     *
     * @return    boolean                         True on success
     */
    public function postflight($route, JAdapterInstance $adapter)
    {
        return true;
    }
}
