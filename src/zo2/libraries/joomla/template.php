<?php

/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');

if (!class_exists('Zo2JTemplate')) {

    class Zo2JTemplate {

        protected $_jinput;

        public function __construct() {
            $this->_jinput = JFactory::getApplication()->input;
        }

        /**
         * 
         */
        public function process() {
            if ($this->_jinput->get('option') == 'com_templates') {
                switch ($this->_jinput->get('task')) {
                    case 'style.save':
                        $this->save();
                        break;
                    case 'style.apply':
                        $this->save();
                        break;
                }
            }
        }

        /**
         * 
         */
        public function save() {
            /* Hook and replace Joomla! style save */
            $jinput = JFactory::getApplication()->input;

            /**
             * @todo Replace by JInput
             */
            if (isset($_REQUEST['jform'])) {
                JModelLegacy::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_templates/models');
                JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_templates/tables');

                $lang = JFactory::getLanguage();
                $extension = 'com_templates';
                $base_dir = JPATH_ADMINISTRATOR;
                $language_tag = 'en-GB';
                $reload = true;
                $lang->load($extension, $base_dir, $language_tag, $reload);

                /* Get table */
                $table = JTable::getInstance('Style', 'TemplatesTable');
                /* Do never use $_REQUEST */
                $data = $jinput->post->get('jform', array(), 'array');

                /* Save template with data */
                $model = JModelLegacy::getInstance('Style', 'TemplatesModel');
                $model->save($data);

                if ($table->load(array(
                            'template' => $data['template'],
                            'client_id' => $data['client_id'],
                            'home' => $data['home'],
                            'title' => $data['title']
                        ))) {
                    $params = new JRegistry($data['params']);
                    $table->params = $params->toString();
                    if ($table->check()) {
                        if ($table->store()) {

                            /**
                             * Save profile
                             */
                            $profile = new Zo2Profile();
                            $profile->template = $data['template'];
                            $profile->name = $params->get('profile', 'default');
                            $profile->layout = json_decode($params->get('layout'));
                            $profile->save();

                            $application = JFactory::getApplication();
                            $application->enqueueMessage('Style successfully saved');

                            if ($jinput->get('task') == 'style.apply') {
                                $application->redirect(JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . $table->id, false));
                            } else {
                                $application->redirect(JRoute::_('index.php?option=com_templates&view=styles', false));
                            }
                        }
                    }
                } else {
                    JFactory::getApplication()->enqueueMessage('Style save error');
                }
            }
        }

    }

}