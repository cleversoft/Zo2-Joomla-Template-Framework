<?php
/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      Duc Nguyen <ducntv@gmail.com>
 * @author      Hiepvu <vqhiep2010@gmail.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */
defined('_JEXEC') or die;

define ('ZO2', 'zo2');
//define ('ZO2_ADMIN_PATH', dirname(dirname(__FILE__)));
define ('ZO2_ADMIN_BASE', realpath(dirname(__FILE__) . '/..'));
define ('ZO2_SYSTEM_PLUGIN', 'plg_system_zo2');
define ('ZO2_PLUGIN_REL', 'plugins/system/'.ZO2);
define ('ZO2_PLUGIN_URL', JURI::root(true).'/'.ZO2_PLUGIN_REL);
