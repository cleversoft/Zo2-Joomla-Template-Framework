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
JLoader::discover('Zo2ServiceButton', ZO2PATH_ROOT . '/libraries/services/buttons');

/* Build development into production */
$assets = Zo2Assets::getInstance();
$assets->buildFrameworkProduction();
/* Load core assets */
Zo2Framework::loadAssets();

Zo2Framework::init();
Zo2Framework::getTemplateLayouts();
Zo2Framework::getController();

$zo2services = new Zo2ServiceButtonTwitter();
echo $zo2services->getButtonHtml('share');