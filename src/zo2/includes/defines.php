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
defined('_JEXEC') or die('Restricted access');

define('ZO2', 'zo2');

define('JURL_ROOT', rtrim(JUri::root(), '/'));
/**
 * Paths
 */
define('ZO2PATH_ROOT', realpath(__DIR__ . '/../'));
define('ZO2PATH_ASSETS', ZO2PATH_ROOT . '/assets');
define('ZO2PATH_ASSETS_ZO2', ZO2PATH_ASSETS . '/zo2');
define('ZO2PATH_ASSETS_ZO2_DEVELOPMENT', ZO2PATH_ASSETS_ZO2 . '/development');
define('ZO2PATH_ASSETS_VENDOR', ZO2PATH_ASSETS . '/vendor');
define('ZO2PATH_CACHE', JPATH_ROOT . '/cache/zo2');
/**
 * Relative paths
 */
define('ZO2RTP_ROOT', JUri::root(true) . '/plugins/system/' . ZO2);
define('ZO2RTP_ASSETS', ZO2RTP_ROOT . '/assets');
define('ZO2RTP_ASSETS_ZO2', ZO2RTP_ASSETS . '/zo2');
define('ZO2RTP_ASSETS_ZO2_DEVELOPMENT', ZO2RTP_ASSETS_ZO2 . '/development');
define('ZO2RTP_ASSETS_VENDOR', ZO2RTP_ASSETS . '/vendor');
define('ZO2RTP_CACHE', JUri::root(true) . '/cache/zo2');
/**
 * Urls
 */
define('ZO2URL_ROOT', JURL_ROOT . '/plugins/system/' . ZO2);
define('ZO2URL_ASSETS', ZO2URL_ROOT . '/assets');
define('ZO2URL_ASSETS_ZO2', ZO2URL_ASSETS . '/zo2');
define('ZO2URL_ASSETS_ZO2_DEVELOPMENT', ZO2URL_ASSETS_ZO2 . '/development');
define('ZO2URL_ASSETS_VENDOR', ZO2URL_ASSETS . '/vendor');
