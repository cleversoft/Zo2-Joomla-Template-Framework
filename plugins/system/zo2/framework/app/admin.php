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
if (!class_exists('Zo2AppAdmin'))
{

    /**
     * Admin application
     */
    class Zo2AppAdmin extends Zo2App
    {

        /**
         * 
         * @staticvar Zo2AppAdmin $instance
         * @return \Zo2AppAdmin
         */
        public static function getInstance()
        {
            static $instance;
            if (empty($instance))
            {
                $instance = new Zo2AppAdmin();
            }
            return $instance;
        }

        /**
         * 
         * @staticvar boolean $inited
         * @return boolean
         */
        public function init()
        {
            static $inited;
            if (empty($inited))
            {
                $jVersion = new JVersion();
                require_once ZO2PATH_ROOT . '/depends/' . $jVersion->RELEASE . '/admin.php';
                parent::_init();
                $inited = true;
                Zo2Framework::log('Init', get_class($this));
            }
            return $inited;
        }

        /**
         * Render main Zo2 backend form
         * @return string
         */
        public function getHtml()
        {
            $form = $this->_prepareForm('admin');
            $html = new Zo2Html();
            $html->set('admin', $this);
            $html->set('form', $form);
            $buffer = $html->fetch('Zo2://html/admin/layout/default.php');
            // Do not optimize html for backend
            return $buffer;
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
        private function _prepareForm($formName)
        {
            // get the JForm object
            $form = $this->_getForm($formName);
            $params = $this->profile->toArray();

            // Prepare saved data to form
            $data = array(
                'zo2' => $params
            );
            $form->bind($data);
            return $form;
        }

        /**
         * 
         * @return type
         */
        public function getRequestProfile()
        {
            $profileName = JFactory::getApplication()->input->getWord('profile', self::ZO2DEFAULT_PROFILE);
            Zo2Framework::log('Get profile', $profileName);
            return Zo2Framework::getInstance()->template->getPath() . '/profiles/' . $profileName . '.json';
        }

    }

}