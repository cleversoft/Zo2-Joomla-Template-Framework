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

$template = Zo2Framework::getTemplate();

Zo2Framework::loadTemplateAssets();

$this->zo2 = new JRegistry;
$this->zo2->framework = Zo2Framework::getInstance();
$this->zo2->template = $template;
$this->zo2->layout = Zo2Framework::getLayout();
$this->zo2->socialShares = new Zo2Socialshares();

if (Zo2Framework::get('enable_style_switcher', 1) == 1) {
    Zo2Utilities::getUtility('styleswitcher');
}

Zo2Framework::getTemplateLayouts();


$doc = JFactory::getDocument();
if ($this->zo2->framework->get('fullContainer') == 1 && $this->zo2->framework->get('enable_style_switcher') != 1) { //if style is boxed and style switcher is disable -> show background custom
    $background = $this->zo2->framework->get('background', '');
    $background_color = $this->zo2->framework->get('background_color');
    if ($background != '') {
        $doc->addStyleDeclaration('body.boxed {background: url("' . JUri::root(true) . '/' . $background . '") ' . $background_color . ' repeat;}');
    } else
        $doc->addStyleDeclaration('body.boxed {background: ' . $background_color . ' repeat;}');
}