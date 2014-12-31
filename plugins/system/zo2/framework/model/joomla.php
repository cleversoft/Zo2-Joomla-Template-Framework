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
            $joomlaFile = Zo2Path::getInstance()->getPath('Zo2://assets/joomla.json');
            if ($joomlaFile)
            {
                $data = json_decode(file_get_contents($joomlaFile));
                $jinput = JFactory::getApplication()->input;
                $params = array();
                foreach ($zo2Data as $key => $value)
                {
                    if (in_array($key, $data))
                    {
                        $params[$key] = $value;
                        // This param already stored in template params as global than we no need to save in profile
                        unset($zo2Data[$key]);
                    }
                }
                $joomlaData['params'] = $params;
                // Set back to post request
                $jinput->post->set('jform', $joomlaData);
                $jinput->post->set('zo2', $zo2Data);
                JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_templates/tables');
                // Save Joomla template table
                $table = JTable::getInstance('Style', 'TemplatesTable');
                if ($table->load($jinput->get('id')))
                {
                    $table->params = new JRegistry($params);
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
            }
            return false;
        }

    }

}