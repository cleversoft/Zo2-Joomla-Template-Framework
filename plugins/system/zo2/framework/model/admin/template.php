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
if (!class_exists('Zo2ModelAdminTemplate'))
{

    /**
     * Administrator template model class
     */
    class Zo2ModelAdminTemplate
    {

        /**
         * Save template
         */
        public function save()
        {
            $jinput = JFactory::getApplication()->input;
            if ($jinput->get('option') == 'com_templates')
            {

                $zo2Data = $jinput->get('zo2', array(), 'array');
                $joomlaData = $jinput->get('jform', array(), 'array');
                $templateId = $jinput->get('id');
                $task = $jinput->get('task');
                $this->_saveToDatabase($zo2Data, $joomlaData, $templateId);
                // Get Zo2 data. It's already modified after bindTemplateParams above                
                switch ($task)
                {
                    // Save data to current profile
                    case 'style.apply':
                        $profile = Zo2Framework::getInstance()->profile;

                        $profile->loadArray($zo2Data);
                        $profile->save();
                }
            }
        }

        /**
         * Save zo2 data into template params and exclude it in zo2
         * @param type $zo2Data
         * @param type $joomlaData
         * @return boolean
         */
        private function _saveToDatabase(&$zo2Data, $joomlaData, $templateId)
        {

            JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_templates/tables');
            // Bind Zo2 data to params for storing
            $joomlaData['params'] = $zo2Data;
            // Save Joomla template table
            $table = JTable::getInstance('Style', 'TemplatesTable');
            if ($table->load($templateId))
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