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

        public function __construct($document)
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
        }

        /**
         * Render frontend layout
         * @param JDocumentHtml $document
         * @return string
         */
        public function render()
        {
            // Get memory usage before process
            $memoryStart = memory_get_usage(true);
            // Assign document to Framework
            $framework = Zo2Framework::getInstance();

            // Init layout builder with current profile
            $layoutBuilder = new Zo2LayoutbuilderSite($framework->profile->get('layout'));
            // Prepare properties for html to render
            $html = new Zo2Html();
            $html->set('layout', $layoutBuilder);
            $buffer = $html->fetch('Zo2://html/site/layout/default.php');
            // Optimize buffer
            if (Zo2Framework::getGlobalParam('enable_optimize_html', 1))
            {
                Zo2Framework::importVendor('ganon');
                $dom = str_get_dom($buffer);
                HTML_Formatter::minify_html($dom);
                $buffer = $dom;
            }
            // Get memory useage after processed
            $memoryEnd = memory_get_usage(true);
            return $buffer;
        }

        /**
         * 
         * @return string
         */
        public function getRequestProfile()
        {
            $itemId = JFactory::getApplication()->input->getInt('Itemid');
            $profileName = self::ZO2DEFAULT_PROFILE;
            $framework = Zo2Framework::getInstance();
            $profileAssignments = Zo2Framework::getGlobalParam('profile_assignment', array());
            if (isset($profileAssignments[$itemId]))
            {
                $profileName = $profileAssignments[$itemId];
            }
            $profileFile[] = $framework->template->getPath() . '/profiles/' . $framework->template->get('id') . '/' . $profileName . '.json';
            $profileFile[] = $framework->template->getPath() . '/profiles/' . $profileName . '.json';
            foreach ($profileFile as $value)
            {
                if (JFile::exists($value))
                {
                    return $value;
                }
            }
            return $framework->template->getPath() . '/profiles/' . self::ZO2DEFAULT_PROFILE . '.json';
        }

    }

}