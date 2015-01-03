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

if (!class_exists('Zo2ModelJoomla'))
{

    class Zo2ModelJoomla
    {

        /**
         * Save zo2 data into template params and exclude it in zo2
         * @param type $zo2Data
         * @param type $joomlaData
         * @return boolean
         */
        public function saveTemplateParams(&$zo2Data, $joomlaData)
        {
            $jinput = JFactory::getApplication()->input;
            // Bind Zo2 data to params
            $joomlaData['params'] = $zo2Data;
            // Set back to post request
            $jinput->post->set('jform', $joomlaData);
            $jinput->post->set('zo2', $zo2Data);

            JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_templates/tables');
            // Save Joomla template table
            $table = JTable::getInstance('Style', 'TemplatesTable');
            if ($table->load($jinput->get('id')))
            {
                $table->params = new JRegistry($joomlaData['params']);
                $table->params = $table->params->toString();
                /* Save back into database */
                if ($table->check())
                {
                    if ($table->store())
                    {
                        return true;
                    }
                }
            }
            return false;
        }

    }

}