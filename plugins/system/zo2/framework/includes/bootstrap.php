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
                frontEndUrl: "' . rtrim(JUri::getInstance()->root(false),'/') . '/index.php"
            },
            /* Internal jQuery */
            jQuery: $
        };

        /* Provide global zo2 object */
        w.zo2 = _zo2;

    }

})(window, jQuery.noConflict());');
