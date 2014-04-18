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

if (!class_exists('Zo2Profile')) {

    class Zo2Profile extends JObject {

        public function save() {
            $zo2 = Zo2Framework::getInstance();
            $templatePath = rtrim(JPATH_ROOT . '/templates/' . $this->get('template_name'), DIRECTORY_SEPARATOR);
            $filePath = $templatePath . '/assets/profiles/' . $this->name . '.json';
            $buffer = json_encode($this->config, JSON_PRETTY_PRINT);
            return JFile::write($filePath, $buffer);
        }

    }

}