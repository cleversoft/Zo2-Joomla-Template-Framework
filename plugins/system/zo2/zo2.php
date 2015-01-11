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
if (!class_exists('plgSystemZo2'))
{

    /**
     * Zo2 Framework entrypoint plugin
     */
    class plgSystemZo2 extends JPlugin
    {

        /**
         * 
         * @param type $subject
         * @param type $config
         */
        public function __construct(&$subject, $config = array())
        {
            parent::__construct($subject, $config);
            // Init Zo2 Framework
            $zo2 = $this->_isZo2();
            if ($zo2)
            {
                // Load language
                $language = JFactory::getLanguage();
                $language->load('plg_system_zo2', __DIR__ . '/framework');
                require_once (JPATH_ROOT . '/plugins/system/zo2/framework/bootstrap.php');
                $requiredVersion = (string) $zo2[0];
                $zo2Version = ZO2VERSION;
                if (version_compare($zo2Version, $requiredVersion) == -1)
                {
                    exit();
                }
                $framework = Zo2Framework::getInstance();
                $framework->template = new Zo2Template($this->_getTemplate());
            }
        }

        /**
         * @link https://docs.joomla.org/Plugin/Events/System#onAfterRoute
         * This event is triggered after the framework has loaded and initialised and the router has routed the client request.
         */
        public function onAfterRoute()
        {
            if ($this->_isZo2())
            {
                Zo2Framework::joomlaHook();
            }
        }

        /**
         * 
         * @staticvar type $template
         * @return boolean
         */
        private function _getTemplate()
        {
            static $template;
            if (empty($template))
            {
                $app = JFactory::getApplication();
                $jinput = $app->input;
                if ($app->isAdmin() && $jinput->get('option') == 'com_templates' && ( $jinput->get('view') == 'style' || $jinput->get('layout') == 'edit' ))
                {
                    $db = JFactory::getDbo();
                    $query = $db->getQuery(true);
                    $query
                            ->select('template, params')
                            ->from('#__template_styles')
                            ->where('id=' . $app->input->get('id'));


                    $db->setQuery($query);
                    $template = $db->loadObject();

                    if ($template)
                    {
                        $registry = new JRegistry;
                        $registry->loadString($template->params);
                        $template->params = $registry;
                    }
                } else if ($app->isSite())
                {
                    $template = JFactory::getApplication()->getTemplate(true);
                } else
                {
                    return false;
                }
            }
            return $template;
        }

        /**
         * 
         * @return boolean
         */
        private function _isZo2()
        {
            $template = $this->_getTemplate();
            if ($template)
            {
                $filePath = JPath::clean(JPATH_ROOT . '/templates/' . $template->template . '/templateDetails.xml');
                if (is_file($filePath))
                {
                    $xml = $xml = simplexml_load_file($filePath);

                    if (isset($xml->zo2))
                    {
                        return $xml->zo2;
                    }
                }
            }
            return false;
        }

    }

}