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

        public function process() {
            $jinput = JFactory::getApplication()->input;
            /* Dont save if task is cancel */
            if ($jinput->get('task') == 'style.cancel')
                return;
            $this->save();
        }

        /**
         * Hook and replace Joomla! style save
         */
        public function save() {
            $jinput = JFactory::getApplication()->input;
            if ($jinput->get('option') == 'com_templates') {
                /**
                 * @todo Replace by JInput
                 */
                if (isset($_REQUEST['jform'])) {
                    JModelLegacy::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_templates/models');
                    JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_templates/tables');

                    /* Load language */
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
                        $profileName = $jinput->get('profile-name', $data['profile-select']);
                        if ($profileName == '')
                            $profileName = $data['profile-select'];
                        /* Update profile assign list */
                        $list = array();
                        if (isset($data['profile-menu'])) {
                            foreach ($data['profile-menu'] as $menuId) {
                                $list[$menuId] = $profileName;
                            }
                        }
                        $data['params']['profile'] = $list;
                        $params = new JRegistry($data['params']);
                        $table->params = $params->toString();
                        if ($table->check()) {
                            if ($table->store()) {

                                /**
                                 * Save profile
                                 */
                                $profile = new Zo2Profile();
                                $profile->template = $data['template'];
                                $profile->name = $profileName;
                                $profile->layout = json_decode($params->get('layout'));

                                $profile->save();

                                $application = JFactory::getApplication();
                                $application->enqueueMessage('Style successfully saved');

                                if ($jinput->get('task') == 'style.apply') {
                                    //$application->redirect(JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . $table->id, false));
                                } else {
                                    //$application->redirect(JRoute::_('index.php?option=com_templates&view=styles', false));
                                }
                            }
                        }
                    } else {
                        //JFactory::getApplication()->enqueueMessage('Style save error');
                    }
                }
            }
        }

        public function apply() {
            
        }

    }

}