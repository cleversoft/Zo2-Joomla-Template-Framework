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

if (Zo2Framework::isZo2Template()) {

    $assets = Zo2Assets::getInstance();

    $assets->buildAssets();
    $assets->loadAssets();

    if (JFactory::getApplication()->isSite()) {
        Zo2Framework::preparePresets();
        Zo2Framework::prepareCustomFonts();
    }

    /**
     * Framework init
     */
    if (!Zo2Framework::isJoomla25()) {
        JFactory::getApplication()->loadLanguage();
    }
    Zo2Framework::import('core.Zo2Layout');
    Zo2Framework::import('core.Zo2Component');
    Zo2Framework::import('core.Zo2AssetsManager');

    Zo2Framework::setLayout(new Zo2Layout(Zo2Framework::getTemplateName()));
// JViewLegacy
    if (!class_exists('JViewLegacy', false))
        Zo2Framework::import('core.classes.legacy');

    if (Zo2Framework::isSite()) {

        // JModuleHelper
        if (!class_exists('JModuleHelper', false))
            Zo2Framework::import('core.classes.helper');
    } else {
        
    }
    Zo2Framework::getTemplateLayouts();
    Zo2Framework::getController();
} else {
    
}

Zo2Ajax::getInstance()->register('Zo2Style', 'apply');
