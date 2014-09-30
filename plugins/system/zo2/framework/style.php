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

if (!class_exists('Zo2Style')) {

    class Zo2Style {

        public function apply() {
            JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_templates/tables');
            $data = $_REQUEST['jform'];
            $table = JTable::getInstance('Style', 'TemplatesTable');
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
                        $ajax = Zo2Ajax::getInstance();
                        $ajax->addMessage('Template save success', 'success');
                    }
                }
            }
        }

    }

}