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

require_once __DIR__ . '/defines.php';
require_once __DIR__ . '/path.php';
require_once __DIR__ . '/autoloader.php';
require_once __DIR__ . '/factory.php';
require_once __DIR__ . '/framework.php';

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
    //Zo2Factory::import('core.classes.legacy');
        if (Zo2Factory::isSite()) {
            /**
             * @todo remove this core hacking
             */
            if (!class_exists('JModuleHelper', false))
                Zo2Factory::import('core.classes.helper');
        } else {
            $jinput = JFactory::getApplication()->input;
            if ($jinput->get('option') == 'com_templates') {
                $task = $jinput->get('task');
                $model = Zo2ModelTemplate::getInstance();
                switch ($task) {
                    case 'style.save':
                        $model->save();
                        $model->build();
                        break;
                    case 'style.apply':
                        $model->save();
                        $model->build();
                        break;
                    case 'remove':
                        $model->remove();
                        break;
                    case 'rename':
                        $model->rename();
                        break;
                }
            }
        }
    Zo2Factory::execController();
    $script = 'zo2.settings.token = "' . JFactory::getSession()->getFormToken() . '";';
    Zo2Assets::getInstance()->addScriptDeclaration($script);
} else {
    
}
