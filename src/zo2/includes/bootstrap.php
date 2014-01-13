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

require_once __DIR__ . '/defines.php';

/* Joomla! autoloading register */
JLoader::discover('Zo2', ZO2PATH_ROOT . '/libraries');
JLoader::discover('Zo2Helper', ZO2PATH_ROOT . '/helpers');
JLoader::discover('Zo2Service', ZO2PATH_ROOT . '/libraries/services');
JLoader::discover('Zo2Imager', ZO2PATH_ROOT . '/libraries/imagers');

$assets = Zo2Assets::getInstance();

//$assets->loadBuildList('core.assets.build.json');
//$assets->loadBuildList('template.assets.build.json');
//$assets->buildAssets();

//$assets->buildFrameworkProduction();
/* Load core assets */
$assets->importAssets('core.assets.load.json');
/* Load template assets */
$assets->importAssets('template.assets.load.json');
$assets->loadAssets();

/**
 * @todo remove and replace by $assets->importAssets('template.assets.load.json');
 */

//Zo2Framework::prepareTemplateAssets();
Zo2Framework::preparePresets();
Zo2Framework::prepareCustomFonts();

Zo2Framework::init();
Zo2Framework::getTemplateLayouts();
Zo2Framework::getController();
