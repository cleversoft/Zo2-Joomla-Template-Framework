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

/**
 * Class exists checking
 */
if (!class_exists('Zo2Profile')) {

    /**
     * Zo2 profile object
     */
    class Zo2Profile extends JRegistry {

        public function __get($name) {
            return $this->get($name);
        }

        public function __set($name, $value) {
            return $this->set($name, $value);
        }

        /**
         * 
         * @param type $file
         * @return boolean
         */
        public function load($name) {
            /* Load from profiles directory of assets namespace */
            $profileFile = Zo2Factory::getPath('assets://profiles/' . $name . '.json');
            /* If asked file is not exists than load default */
            if ($profileFile == false) {
                $profileFile = Zo2Factory::getPath('assets://profiles/default.json');
            }
            if ($profileFile) {
                $this->loadFile($profileFile);
                /* This's old profile than load from database */
                if (!$this->get('layout') && !$this->get('layout')) {
                    $framework = Zo2Factory::getFramework();
                    $profile = new stdClass();
                    $profile->layout = json_decode($framework->get('layout'));
                    $profile->theme = json_decode($framework->get('theme'));

                    $menu['hover_type'] = $framework->get('hover_type');
                    $menu['nav_type'] = $framework->get('nav_type');
                    $menu['animation'] = $framework->get('animation');
                    $menu['duration'] = $framework->get('duration');
                    $menu['show_submenu'] = $framework->get('show_submenu');
                    $menu['menu_type'] = $framework->get('menu_type');
                    $menu['mega_config'] = $framework->get('menu_config');

                    $profile->menuConfig = $menu;

                    $this->loadObject($profile);
                    /* Save to profile */
                    $this->save();
                }
                return true;
            }

            return false;
        }

        public function getTheme() {
            return new JObject($this->get('theme'));
        }

        public function getMenuConfig() {
            $menuConfig = new JRegistry($this->get('menuConfig'));
            $megaConfig = json_decode($menuConfig->get('mega_config'), true);
            $menuConfig->set('mega_config', $megaConfig);
            return $menuConfig;
        }

        public function getMegaMenuConfig($menuType = 'mainmenu') {
            $menuConfig = $this->getMenuConfig()->get('mega_config');
            if (isset($menuConfig[$menuType])) {
                return $menuConfig[$menuType];
            }
            return;
        }

        /**
         * 
         * @return type
         */
        public function save() {
            /* Save to template assets/profiles */
            $templatePath = rtrim(JPATH_ROOT . '/templates/' . $this->template, DIRECTORY_SEPARATOR);
            $filePath = $templatePath . '/assets/profiles/' . $this->name . '.json';

            if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
                $buffer = json_encode($this->toArray(), JSON_PRETTY_PRINT);
            } else {
                $buffer = json_encode($this->toArray());
            }

            return JFile::write($filePath, $buffer);
        }

    }

}