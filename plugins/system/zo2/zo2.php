<?php

/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @version     1.4.4
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2015 CleverSoft (http://cleversoft.co/)
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
         * Init our framework
         */
        public function onAfterRoute()
        {

            if ($this->_isZo2())
            {
                include_once __DIR__ . '/framework/includes/bootstrap.php';
                Zo2Framework::getInstance()->init();
                Zo2Factory::joomlaHook();
                Zo2Factory::ajax();
            }
        }

        /**
         * 
         */
        public function onAfterRender()
        {
            if ($this->_isZo2())
            {
                $app = JFactory::getApplication();
                $body = JResponse::getBody();

                $jinput = JFactory::getApplication()->input;
                $framework = Zo2Framework::getInstance();

                $assets = Zo2Assets::getInstance();
                $body = str_replace('</body>', $assets->generateAssets('js') . '</body>', $body);
                $body = str_replace('</head>', $assets->generateAssets('css') . '</head>', $body);

                /* Apply back to body */
                JResponse::setBody($body);
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
                            ->select('*')
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
                $templateConfig = JPATH_ROOT . '/templates/' . $template->template . '/assets/template.json';
                if (is_file($templateConfig))
                {
                    return $template;
                }
            }

            return false;
        }

    }

}

