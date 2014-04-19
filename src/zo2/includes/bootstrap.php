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

    /**
     * Framework init
     */
    if (!Zo2Framework::isJoomla25()) {
        JFactory::getApplication()->loadLanguage();
    }
    Zo2Framework::import('core.Zo2Layout');
    Zo2Framework::import('core.Zo2Component');
    Zo2Framework::import('core.Zo2AssetsManager');

    /**
     * @todo remove this core hacking
     */
    if (!class_exists('JViewLegacy', false))
        Zo2Framework::import('core.classes.legacy');

    if (Zo2Framework::isSite()) {
        $template = Zo2Framework::getTemplate();

        /**
         * @todo remove this core hacking
         */
        if (!class_exists('JModuleHelper', false))
            Zo2Framework::import('core.classes.helper');
    } else {
        /* Hook and replace Joomla! style save */
        $jinput = JFactory::getApplication()->input;
        if ($jinput->get('option') == 'com_templates') {
            if (isset($_REQUEST['jform'])) {
                JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_templates/tables');
                $data = $_REQUEST['jform'];
                $table = JTable::getInstance('Style', 'TemplatesTable');
                if ($table->load(array(
                            'template' => $data['template'],
                            'client_id' => $data['client_id'],
                            'home' => $data['home'],
                            'title' => $data['title']
                        ))) {
                    $params = new JRegistry($data['params']);
                    $table->params = $params->toString();
                    if ($table->check()) {
                        if ($table->store()) {
                            JFactory::getApplication()->enqueueMessage('Style successfully saved');
                            JFactory::getApplication()->redirect(JRoute::_('index.php?option=com_templates&view=styles', false));
                        }
                    }
                }
            }
        }
    }
    //
    Zo2Framework::getController();

    $script = 'zo2.settings.token = "' . JFactory::getSession()->getFormToken() . '";';
    Zo2Assets::getInstance()->addScriptDeclaration($script);
} else {
    
}
Zo2Ajax::getInstance()->register('Zo2Style', 'apply');
