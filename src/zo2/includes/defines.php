<?php

/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */
defined('_JEXEC') or die;

define('ZO2', 'zo2');

/**
 * Paths
 */
define('ZO2PATH_ROOT', realpath(dirname(__FILE__) . '/..'));
define('ZO2PATH_ASSETS', ZO2PATH_ROOT . '/assets');
define('ZO2PATH_ASSETS_ZO2', ZO2PATH_ASSETS . '/zo2');
define('ZO2PATH_ASSETS_VENDOR', ZO2PATH_ASSETS . '/vendor');
define('ZO2PATH_CACHE', JPATH_ROOT . '/cache/zo2');
define('ZO2PATH_ASSET_COMPRESSED', ZO2PATH_ASSETS . '/compressed');
/**
 * Urls
 */
define('ZO2URL_ROOT', rtrim(JUri::root(), '/') . '/plugins/system/' . ZO2);
define('ZO2URL_ASSETS', ZO2URL_ROOT . '/assets');
define('ZO2URL_ASSETS_ZO2', ZO2URL_ASSETS . '/zo2');
define('ZO2URL_ASSETS_VENDOR', ZO2URL_ASSETS . '/vendor');
define('ZO2URL_ASSET_COMPRESSED', ZO2URL_ASSETS . '/compressed');