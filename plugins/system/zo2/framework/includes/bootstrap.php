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

$autoloader = new Zo2Autoloader();
spl_autoload_register(array(
    $autoloader, 'autoloadByPsr2'
));

if (Zo2Factory::isZo2Template()) {

    $framework = Zo2Factory::getFramework();
    $framework->init();

    if (Zo2Factory::isJoomla25()) {
        
    } else {
        JHtml::_('jquery.ui', array('core', 'sortable'));
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
                };
                /*
                  $zo2Task = $jinput->get('zo2_task');
                  if ($zo2Task) {
                  $zo2Task = explode('.', $zo2Task);
                  $modelClass = 'Zo2Model' . ucfirst($zo2Task[0]);
                  $model = new $modelClass;
                  if (method_exists($model, $zo2Task[1])) {
                  call_user_func(array($model, $zo2Task[1]));
                  }
                  }
                 * 
                 */
            }
        }
    JFactory::getDocument()->addScriptDeclaration('/**
 * Zo2 JS framework define
 * @param {object} w Window pointer
 * @param {object} $ jQuery pointer
 * @returns {undefined}
 */
(function(w, $) {

    if (typeof w.zo2 === \'undefined\') {

        /* Local zo2 definition */
        var _zo2 = {
            /* Common settings */
            _settings: {
                token: "' . JFactory::getSession()->getFormToken() . '",
                url: "' . JUri::getInstance()->toString() . '",
                frontEndUrl: "' . JUri::getInstance()->root(false) . '"
            },
            /* Internal jQuery */
            jQuery: $
        };

        /* Provide global zo2 object */
        w.zo2 = _zo2;

    }

})(window, jQuery.noConflict());');
} else {
    
}
