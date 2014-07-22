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
$googleMap = Zo2Services::getInstance('googlemap', array());
$googleMap->setConfig('center.lat', $this->get('lat'));
$googleMap->setConfig('center.lng', $this->get('lng'));
$googleMap->setConfig('width', $this->get('w'));
$googleMap->setConfig('height', $this->get('h'));
$googleMap->addMarker($this->get('lat'), $this->get('lng'), $this->get('content'));
echo $googleMap->getMap(substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5));