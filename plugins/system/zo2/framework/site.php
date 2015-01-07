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
if (!class_exists('Zo2Site'))
{

    class Zo2Site
    {

        const ZO2DEFAULT_PROFILE = 'default';

        /**
         * 
         * @staticvar Zo2Admin $instances
         * @return \Zo2Admin
         */
        public static function &getInstance()
        {
            static $instance;
            if (!isset($instance))
            {
                $instance = new Zo2Site();
            }
            return $instance;
        }

        public static function init($document)
        {
            static $inited;
            if (empty($inited))
            {
                $inited = self::getInstance();
                $inited->_init($document);
            }
            return $inited;
        }

        protected function _init($document)
        {
            // Load dependencies based on Joomla!
            $jVersion = new JVersion();
            require_once __DIR__ . '/depends/' . $jVersion->RELEASE . '/site.php';
            // Init Zo2 Framework core variables
            $framework = Zo2Framework::getInstance();
            $framework->document = $document;
            $framework->template = new Zo2Template(JFactory::getApplication()->getTemplate(true));
            $framework->profile = new Zo2Profile();
            $framework->profile->loadFile($this->getRequestProfile());
            if (Zo2Framework::isDevelopmentMode())
            {
                Zo2Assets::getInstance()->build();
            }
        }

        /**
         * Render frontend layout
         * @param JDocumentHtml $document
         * @return string
         */
        public function render()
        {

            $framework = Zo2Framework::getInstance();
            // Get memory usage before process
            $framework->set('memory_start', memory_get_usage(true));
            // Init layout builder with current profile
            $layoutBuilder = new Zo2LayoutbuilderSite($framework->profile->get('layout'));
            // Prepare properties for html to render
            $html = new Zo2Html();
            $html->set('layout', $layoutBuilder);
            $buffer = $html->fetch('Zo2://html/site/layout/default.php');
            // Optimize buffer
            if (Zo2Framework::getGlobalParam('enable_optimize_html'))
            {
                Zo2Framework::importVendor('ganon');
                $dom = str_get_dom($buffer);
                HTML_Formatter::minify_html($dom);
                $buffer = $dom;
            }
            // Get memory useage after processed
            $framework->set('memory_end', memory_get_usage(true));
            return $buffer;
        }

        /**
         * 
         * @return string
         */
        public function getRequestProfile()
        {
            // Get request Itemid to use for profile assignment
            $itemId = JFactory::getApplication()->input->getInt('Itemid');
            $profileName = self::ZO2DEFAULT_PROFILE;
            $framework = Zo2Framework::getInstance();
            // Get list of profile assignmented
            $profileAssignments = Zo2Framework::getGlobalParam('profile_assignment', array());
            // Check if this Itemid have profile assigned
            if (isset($profileAssignments[$itemId]))
            {
                $profileName = $profileAssignments[$itemId];
            }
            $profileFile = $framework->template->getPath() . '/profiles/' . $framework->template->get('id') . '/' . $profileName . '.json';
            if (JFile::exists($profileFile))
            {
                return $profileFile;
            } else
            {
                // Return default profile
                return $framework->template->getPath() . '/profiles/' . self::ZO2DEFAULT_PROFILE . '.json';
            }
        }

    }

}