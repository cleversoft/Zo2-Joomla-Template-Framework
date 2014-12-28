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

jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

require_once __DIR__ . '/defines.php';
require_once __DIR__ . '/path.php';
require_once __DIR__ . '/loader.php';

/* Register Zo2 namespaces */
Zo2Path::getInstance()->registerNamespace('Zo2', ZO2PATH_ROOT);

/* Register Zo2 autoloading by Psr2 */
spl_autoload_register(array('Zo2Loader', 'autoloadZo2Psr2'));

Zo2Framework::execute();