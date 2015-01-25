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
if (!class_exists('Zo2App'))
{

    /**
     * Application base class
     */
    abstract class Zo2App extends JObject
    {

        const ZO2DEFAULT_PROFILE = 'default';

        /**
         * 
         * @return string
         */
        public function render()
        {
            // Get memory usage before process
            Zo2Framework::set('memory_start', memory_get_usage(true));
            // Use caching for frontend if needed
            if (JFactory::getApplication()->isSite())
            {
                // Caching
                jimport('joomla.cache.cache');
                jimport('joomla.cache.callback');
                $cache = JFactory::getCache();
                $buffer = $cache->call(array($this, 'getHtml'));
            } else
            {   // No caching for backend
                $buffer = $this->getHtml();
            }
            // Get memory useage after processed
            Zo2Framework::set('memory_end', memory_get_usage(true));
            return $buffer;
        }

        /**
         * Aplication init
         */
        abstract public function init();

        /**
         * Generate app html and return
         */
        abstract public function getHtml();

        /**
         * 
         * @param type $formName
         * @return boolean|JForm
         */
        protected function _getForm($formName)
        {
            $formFile = Zo2Path::getInstance()->getPath('Zo2://assets/' . $formName . '.xml');
            if ($formFile)
            {
                $form = JForm::getInstance('zo2form' . $formName, $formFile);
                Zo2Framework::log('Get form file', $formFile);
                return $form;
            }
            return false;
        }

        /**
         * 
         */
        protected function _init()
        {
            $this->profile = new Zo2Profile();
            $this->profile->loadFile($this->getRequestProfile());

            // Replace params for development mode
            if (Zo2Framework::isDevelopmentMode())
            {
                // Replace params for dev mode
                $devParams = array(
                    'enable_optimize_html' => false,
                    'enable_combine_css' => false,
                    'enable_combine_js' => false,
                    'enable_minify_css' => false,
                    'enable_minify_js' => false
                );
                Zo2Framework::log('Load development params');
                $this->profile->loadArray($devParams);
                // Force to build assets
                Zo2Assets::getInstance()->build();
            }
        }

        /**
         * Get profile name
         */
        abstract public function getRequestProfile();
    }

}