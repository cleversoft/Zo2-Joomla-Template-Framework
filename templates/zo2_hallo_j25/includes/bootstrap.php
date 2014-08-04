<?php

/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      Duc Nguyen <ducntv@gmail.com>
 * @author      Viet Vu <me@jooservices.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted Access');

/**
 * This file will use to init / register current template with ZO2 framework
 */
if (!class_exists('Zo2Framework'))
    die('Zo2Framework not found');

$template = Zo2Factory::getTemplate();

$framework = Zo2Factory::getFramework();
$framework->init();

$this->zo2 = new JRegistry;
$this->zo2->framework = $framework;
$this->zo2->template = new Zo2Template();
$this->zo2->layout = $framework->layout;
$this->zo2->utilities = Zo2Utilities::getInstance();

$framework->getTemplateLayouts();