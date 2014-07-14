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
require_once __DIR__ . '/framework.php';
require_once __DIR__ . '/factory.php';

/* Joomla! autoloading register */
JLoader::discover('Zo2', ZO2PATH_ROOT . '/libraries');
JLoader::discover('Zo2Helper', ZO2PATH_ROOT . '/helpers');
JLoader::discover('Zo2Service', ZO2PATH_ROOT . '/libraries/services');
JLoader::discover('Zo2Imager', ZO2PATH_ROOT . '/libraries/imagers');

if (Zo2Factory::isZo2Template()) {

    $framework = Zo2Factory::getFramework();
    $framework->init();
    
    if (Zo2Factory::isJoomla25()) {
        
    } else {
        JHtml::_('bootstrap.framework');
        JFactory::getApplication()->loadLanguage();
    }

    /**
     * @todo remove this core hacking
     */
    if (!class_exists('JViewLegacy', false))
        Zo2Factory::import('core.classes.legacy');

    if (Zo2Factory::isSite()) {
        /**
         * @todo remove this core hacking
         */
        if (!class_exists('JModuleHelper', false))
            Zo2Factory::import('core.classes.helper');
    } else {

        $framework->joomla('template')->process();
    }

    Zo2Factory::execController();

    $script = 'zo2.settings.token = "' . JFactory::getSession()->getFormToken() . '";';
    Zo2Assets::getInstance()->addScriptDeclaration($script);
} else {
    
}
Zo2Ajax::getInstance()->register('Zo2Style', 'apply');
Zo2Ajax::getInstance()->process();