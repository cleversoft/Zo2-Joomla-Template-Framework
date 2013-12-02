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

/* Please put all init thing here  */

require_once __DIR__ . '/defines.php';
require_once __DIR__ . '/framework.php';

/* Register autoload for Zo2<Classname> */
JLoader::discover('Zo2', ZO2PATH_ROOT . '/libraries');
JLoader::discover('Zo2Helper', ZO2PATH_ROOT . '/helpers');

/* Temporary import un-standard files */
//require_once ZO2PATH_ROOT . '/libraries/Zo2AssetsHelper.php';
require_once ZO2PATH_ROOT . '/libraries/classes/admin/menu.php';
require_once ZO2PATH_ROOT . '/libraries/shortcodes/WPShortcode.php';

Zo2Framework::init();
Zo2Framework::getTemplateLayouts();
Zo2Framework::getController();

//Zo2Document::getInstance()->addLess(ZO2PATH_ASSETS .'/zo2/development/less/test.less');