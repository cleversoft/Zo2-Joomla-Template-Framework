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

        private $_jinput;

        public function __construct() {
            $this->_jinput = JFactory::getApplication()->input;
        }

        public function process() {
            if ($this->_jinput->get('option') == 'com_templates') {
                switch ($this->_jinput->get('task')) {
                    case 'style.save':
                        $this->save();
                        break;
                    case 'style.apply':
                        $this->save();
                        break;
                    case 'remove':
                        $this->remove();
                        break;
                    case 'rename':
                        $this->rename();
                        break;
                }
            }
        }

        /**
         * Profile rename
         */
        public function rename() {
            /* Do never use $_REQUEST */
            $oldProfileName = $this->_jinput->get('profile');
            $newProfileName = $this->_jinput->get('newName');
            $templateId = $this->_jinput->get('id');

            if (trim($newProfileName) == '') {
                $newProfileName = $oldProfileName;
            }
            $profileFile = Zo2Factory::getPath('templates://assets/profiles/' . $oldProfileName . '.json');
            $newProfile = Zo2Factory::getPath('templates://assets/profiles') . '/' . $newProfileName . '.json';
            if ($oldProfileName != $newProfileName) {
                if (JFile::exists($profileFile)) {
                    JFile::move($profileFile, $newProfile);
                    JFactory::getApplication()->redirect(JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . $templateId . '&profile=' . $newProfileName, false));
                } else {
                    JFactory::getApplication()->redirect(JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . $templateId . '&profile=default', false));
                }
            }
        }

        /**
         * Profile remove
         */
        public function remove() {
            $profile = $this->_jinput->get('profile');
            $profileFile = Zo2Factory::getPath('templates://assets/profiles/' . $profile . '.json');
            $templateId = $this->_jinput->get('id');
            if (JFile::exists($profileFile)) {
                JFile::delete($profileFile);
                JFactory::getApplication()->redirect(JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . $templateId . '&profile=default', false));
            }
        }

        /**
         * Hook and replace Joomla! style save
         */
        public function save() {
            /* Load language */
            $lang = JFactory::getLanguage();
            $extension = 'com_templates';
            $base_dir = JPATH_ADMINISTRATOR;
            $language_tag = 'en-GB';
            $reload = true;
            $lang->load($extension, $base_dir, $language_tag, $reload);
            /* Do build process when template update */
            $assets = Zo2Assets::getInstance();
            $assets->buildAssets();

            JModelLegacy::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_templates/models');
            JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_templates/tables');

            /* Get table */
            $table = JTable::getInstance('Style', 'TemplatesTable');
            /* Do never use $_REQUEST */
            $formData = $this->_jinput->post->get('jform', array(), 'array');
            /* Save template with data */
            $model = JModelLegacy::getInstance('Style', 'TemplatesModel');
            $model->save($formData);

            /* Load table record */
            if ($table->load(array(
                        'template' => $formData['template'],
                        'client_id' => $formData['client_id'],
                        'home' => $formData['home'],
                        'title' => $formData['title']
                    ))) {
                /* Request profileName */
                $profileName = $this->_jinput->get('profile-name', $formData['profile-select']);
                if ($profileName == '')
                    $profileName = $formData['profile-select'];

                /* Update profile assign list */
                $list = array();
                if (isset($formData['profile-menu'])) {
                    foreach ($formData['profile-menu'] as $menuId) {
                        $list[$profileName][] = $menuId;
                    }
                }
                /* Store assigned menu and profile name for each one */
                $formData['params']['profile'] = $list;
                $params = new JRegistry($formData['params']);
                $table->params = $params->toString();
                /* Save back into database */
                if ($table->check()) {
                    if ($table->store()) {

                        /**
                         * Save profile
                         */
                        $profile = new Zo2Profile();
                        $profile->template = $formData['template'];
                        $profile->name = $profileName;
                        $profile->layout = json_decode($params->get('layout'));
                        $profile->theme = json_decode($params->get('theme'));

                        $profile->save();

                        $application = JFactory::getApplication();
                        $application->enqueueMessage('Style successfully saved');

                        if ($this->_jinput->get('task') == 'style.apply') {
                            $application->redirect(JRoute::_('index.php?option=com_templates&view=style&layout=edit&id=' . $table->id . '&profile=' . $profileName, false));
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