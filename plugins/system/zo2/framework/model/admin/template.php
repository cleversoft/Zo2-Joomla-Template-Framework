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
            // Only process inside com_templates
            if ($jinput->get('option') == 'com_templates')
            {
                $zo2Data = $jinput->get('zo2', array(), 'array');
                $joomlaData = $jinput->get('jform', array(), 'array');
                $templateId = $jinput->get('id');
                $task = $jinput->get('task');
                $zo2Data = $this->_check($zo2Data);
                if ($zo2Data !== false)
                {
                    $this->_saveToDatabase($zo2Data, $joomlaData, $templateId);

                    switch ($task)
                    {
                        // Save data to current profile                    
                        case 'style.apply':
                        case 'style.save':
                        case 'style.save2copy':
                            $profile = Zo2Framework::getApp()->profile;
                            $profile->loadArray($zo2Data);
                            $profile->save();
                    }
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

        /**
         * 
         * @param type $data
         * @return boolean
         */
        private function _check($data)
        {
            // Make sure layout field is valid
            if (isset($data['layout']))
            {
                if (is_string($data['layout']))
                {
                    $data['layout'] = json_decode($data['layout'], true);
                }
                /**
                 * @todo Should we need to verify into each row properties
                 */
            } else
            {
                Zo2Framework::message('ZO2_ADMIN_MODEL_MESSAGE_MISSED_LAYOUT_FIELD', 'notice');
                return false;
            }
            return $data;
        }

    }

}