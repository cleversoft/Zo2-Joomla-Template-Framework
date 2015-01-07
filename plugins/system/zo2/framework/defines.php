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

define('ZO2VERSION', '2.0.0');
define('ZO2PATH_ROOT', __DIR__);
define('ZO2URL_ROOT', rtrim(JUri::root(), '/') . '/plugins/system/zo2');
define('ZO2URL_MEGAMENU', ZO2URL_ROOT . '/framework/assets/vendor/megamenu');
define('ZO2PATH_CACHE', JPATH_ROOT . '/cache/zo2');
define('ZO2URL_CACHE', rtrim(JUri::root(), '/') . '/cache/zo2');
define('ZO2DEVELOPMENT_MODE', true);
