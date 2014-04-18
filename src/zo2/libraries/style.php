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
                $profile = new Zo2Profile();
                $profile->name = (isset($data['profile'])) ? $data['profile'] : 'default';
                $profile->config = json_decode($data['params']['layout']);
                $profile->template_name = $table->template;
                $profile->save();
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