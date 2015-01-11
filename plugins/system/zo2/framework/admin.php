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

if (!class_exists('Zo2Admin'))
{

    class Zo2Admin
    {

        public $template;

        const ZO2DEFAULT_PROFILE = 'default';

        /**
         * 
         * @staticvar Zo2Admin $instances
         * @return \Zo2Admin
         */
        public static function &getInstance()
        {
            static $instance;
            if (!isset($instance))
            {
                $instance = new Zo2Admin();
            }
            return $instance;
        }

        public static function init()
        {
            static $inited;
            if (empty($inited))
            {
                $inited = self::getInstance();
                $jVersion = new JVersion();
                require_once __DIR__ . '/depends/' . $jVersion->RELEASE . '/admin.php';

                $framework = Zo2Framework::getInstance();
                $framework->profile = new Zo2Profile();
                $framework->profile->loadFile($inited->getRequestProfile());
                if (Zo2Framework::isDevelopmentMode())
                {
                    Zo2Assets::getInstance()->build();
                }
            }
            return $inited;
        }

        /**
         * Render main Zo2 backend form
         * @return type
         */
        public function render()
        {
            $formFile = Zo2Path::getInstance()->getPath('Zo2://assets/admin.xml');
            if ($formFile)
            {
                $form = $this->_prepareForm('zo2form', $formFile);
                $html = new Zo2Html();
                $html->set('admin', $this);
                $html->set('form', $form);
                return $html->fetch('Zo2://html/admin/layout/default.php');
            }
        }

        /**
         * Render extends form
         * @return type
         */
        public function renderExtends()
        {
            $formFile = Zo2Path::getInstance()->getPath('Zo2://assets/extends.xml');
            if ($formFile)
            {
                $form = $this->_prepareForm('extends', $formFile);
                $html = new Zo2Html();
                $html->set('admin', $this);
                $html->set('form', $form);
                return $html->fetch('Zo2://html/admin/layout/extends.php');
            }
        }

        /**
         * 
         * @param type $formName
         * @param type $formFile
         * @return type
         */
        private function _prepareForm($formName, $formFile)
        {
            // get the JForm object
            $form = JForm::getInstance($formName, $formFile);
            $profileData = Zo2Framework::getInstance()->profile->toArray();
            $templateData = Zo2Framework::getInstance()->template->params->toArray();
            $data = array_merge($templateData, $profileData);
            // Prepare saved data to form
            $data = array(
                'zo2' => $data
            );
            $form->bind($data);
            return $form;
        }

        public function getRequestProfile()
        {
            $profileName = JFactory::getApplication()->input->getWord('profile');
            $profileName = self::ZO2DEFAULT_PROFILE;
            $framework = Zo2Framework::getInstance();

            $profileFile[] = $framework->template->getPath() . '/profiles/' . $framework->template->get('id') . '/' . $profileName . '.json';
            $profileFile[] = $framework->template->getPath() . '/profiles/' . $profileName . '.json';
            foreach ($profileFile as $value)
            {
                if (JFile::exists($value))
                {
                    return $value;
                }
            }
            return $framework->template->getPath() . '/profiles/' . self::ZO2DEFAULT_PROFILE . '.json';
        }

    }

}