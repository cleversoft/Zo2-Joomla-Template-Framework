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
            $this->save();
        }

        public function save() {
            /* Hook and replace Joomla! style save */
            $jinput = JFactory::getApplication()->input;
            if ($jinput->get('option') == 'com_templates') {
                /**
                 * @todo Replace by JInput
                 */
                if (isset($_REQUEST['jform'])) {
                    JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_templates/tables');
                    /* Get table */
                    $table = JTable::getInstance('Style', 'TemplatesTable');
                    $data = $_REQUEST['jform'];
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
                                JFactory::getApplication()->enqueueMessage('Style successfully saved');
                                JFactory::getApplication()->redirect(JRoute::_('index.php?option=com_templates&view=styles', false));
                            }
                        }
                    } else {
                        JFactory::getApplication()->enqueueMessage('Style save error');
                    }
                }
            }
        }

        public function apply() {
            
        }

    }

}