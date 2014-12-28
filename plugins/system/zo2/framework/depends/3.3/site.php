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

JHtml::_('jquery.framework');

$zo2Assets = Zo2Path::getInstance()->getPath('Zo2://assets/site.json');
if ($zo2Assets) {
    $assets = Zo2Assets::getInstance();
    $zoAssets = json_decode(file_get_contents($zo2Assets));
    $assets->load($zoAssets);
}