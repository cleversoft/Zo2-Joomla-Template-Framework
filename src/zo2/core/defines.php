<?php
/**
 *
 * @package Zo2 Framework
 * @author ZO2 http://www.joomvision.com
 * @author Duc Nguyen <ducntq@gmail.com>
 * @author Vu Hiep <vqhiep2010@gmail.com>
 * @copyright Copyright (c) 2008 - 2013 JoomVision
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */

defined('_JEXEC') or die;

define ('ZO2_ADMIN', 'zo2');
//define ('ZO2_ADMIN_PATH', dirname(dirname(__FILE__)));
define ('ZO2_ADMIN_BASE', realpath(dirname(__FILE__) . '/..'));
define ('ZO2_ADMIN_PLUGIN_URL', JURI::root(true).'/plugins/system/'.ZO2_ADMIN);
define ('ZO2_ADMIN_PLUGIN_REL', 'plugins/system/'.ZO2_ADMIN);
