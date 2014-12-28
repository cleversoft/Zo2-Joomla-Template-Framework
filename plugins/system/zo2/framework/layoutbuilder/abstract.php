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

if (!class_exists('Zo2LayoutbuilderAbstract')) {

    abstract class Zo2LayoutbuilderAbstract extends JObject {

        abstract public function render();

        /**
         * 
         * @param array $rows
         * @return html
         */
        protected function _render($rows) {
            $html = array();
            foreach ($rows as $row) {
                $row = new Zo2LayoutbuilderRow($row);
                $html [] = $row->render();
            }
            return implode(PHP_EOL, $html);
        }

        /**
         * 
         * @param type $position
         * @return type
         */
        public function countModules($position) {
            return count(JModuleHelper::getModules($position));
        }

        /**
         * 
         * @staticvar type $modules
         * @param type $modName
         * @return boolean
         */
        public function isModuleAvaiable($modName) {
            static $modules;
            if (!isset($modules[$modName])) {
                $modules[$modName] = JModuleHelper::getModule($modName);
            }
            if ($modules[$modName]->id != 0) {
                return true;
            } else {
                return false;
            }
        }

    }

}