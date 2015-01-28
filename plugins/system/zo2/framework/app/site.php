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

/**
 * Class exists checking
 */
if (!class_exists('Zo2AppSite'))
{

    /**
     * Zo2 frontend main class
     */
    class Zo2AppSite extends Zo2App
    {

        /**
         * 
         * @staticvar Zo2AppSite $instance
         * @return \Zo2AppSite
         */
        public static function getInstance()
        {
            static $instance;
            if (empty($instance))
            {
                $instance = new Zo2AppSite();
            }
            return $instance;
        }

        /**
         * Site init
         * @staticvar type $inited
         * @return \Zo2AppSite
         */
        public function init()
        {
            static $inited;
            if (empty($inited))
            {
                // Load dependencies based on Joomla!
                $jVersion = new JVersion();
                require_once ZO2PATH_ROOT . '/depends/' . $jVersion->RELEASE . '/site.php';
                parent::_init();
                $assets = Zo2Assets::getInstance();
                if (!Zo2Framework::getParam('enable_responsive'))
                {
                    $assets->addStyleSheet('Zo2://assets/css/non.responsive.css');
                }
                if (Zo2Framework::getParam('enable_rtl'))
                {
                    $assets->addStyleSheet('Zo2://assets/css/rtl.css');
                }
                Zo2Framework::log('Init', get_class($this));
                $inited = true;
            }
            return $this;
        }

        /**
         * 
         * @return string
         */
        public function getHtml()
        {
            // Prepare properties for html to render
            $html = new Zo2Html();
            $html->set('rows', $this->profile->get('layout'));
            $buffer = $html->fetch('Zo2://html/site/layout/default.php');
            // Optimize buffer
            if (Zo2Framework::getParam('enable_optimize_html'))
            {
                Zo2Framework::importVendor('ganon');
                $dom = str_get_dom($buffer);
                HTML_Formatter::minify_html($dom);
                $buffer = $dom;
                $buffer = Zo2HelperMinify::html($buffer);
            }
            return $buffer;
        }

        /**
         * 
         * @return string
         */
        public function getRequestProfile()
        {
            $profileName = Zo2Framework::getParam('profile', self::ZO2DEFAULT_PROFILE);
            Zo2Framework::log('Get profile', $profileName);
            return Zo2Framework::getInstance()->template->getPath() . '/profiles/' . $profileName . '.json';
        }

    }

}