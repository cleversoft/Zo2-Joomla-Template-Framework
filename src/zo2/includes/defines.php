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
<<<<<<< HEAD
define('ZO2PATH_ROOT',  JPATH_ROOT . '/plugins/system/' . ZO2);
=======
define('ZO2PATH_ROOT', JPATH_ROOT . '/plugins/system/zo2');
>>>>>>> 2ea5bf42b2e5500ae3e9297a083be890318b3edc
define('ZO2PATH_ASSETS', ZO2PATH_ROOT . '/assets');
define('ZO2PATH_CACHE', JPATH_ROOT . '/cache/zo2');

/**
 * Urls
 */
define('ZO2URL_ROOT', JURL_ROOT . '/plugins/system/' . ZO2);
define('ZO2URL_ASSETS', ZO2URL_ROOT . '/assets');

/**
 * Core and Template
 */
define('CORE', 'core');
define('TEMPLATE', 'template');
