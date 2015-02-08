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
if (!class_exists('Zo2LayoutbuilderAdminRow'))
{

    /**
     * Class object for each row
     */
    class Zo2LayoutbuilderAdminRow extends Zo2LayoutbuilderRow
    {

        protected $_controls;

        /**
         *
         * @var type 
         */
        protected $_settings = array(
            'name',
            'class',
            'visibility'
        );

        /**
         * 
         * @param type $properties
         */
        public function __construct($properties = null)
        {
            parent::__construct($properties);

            // Default controls
            $this->addControl(JText::_('ZO2_ADMIN_LAYOUTBULDER_ROW_CONTROL_MOVE'), 'arrows', 'move', array('id' => 'move-row'));
            $this->addControl(JText::_('ZO2_ADMIN_LAYOUTBULDER_ROW_CONTROL_SETTINGS'), 'cog', 'settings', array('onClick' => 'zo2.layoutbuilder.showSettingModal(this);'));
            $this->addControl(JText::_('ZO2_ADMIN_LAYOUTBULDER_ROW_CONTROL_ADD_CHILDREN'), 'columns', 'add-row', array('onClick' => 'zo2.layoutbuilder.addRow(this);'));
            $this->addControl(JText::_('ZO2_ADMIN_LAYOUTBULDER_ROW_CONTROL_DUPLICATE'), 'files-o', 'duplicate-col', array('onClick' => 'zo2.layoutbuilder.duplicate(this);'));
            $this->addControl(JText::_('ZO2_ADMIN_LAYOUTBULDER_ROW_CONTROL_REMOVE'), 'remove', 'delete', array('onClick' => 'zo2.layoutbuilder.showDeleteModal(this);'));
        }

        /**
         *
         * @param type $name
         * @param type $icon
         * @param type $class
         * @param type $data
         */
        public function addControl($name, $icon, $class, $data = array())
        {
            $control = new Zo2LayoutbuilderControl();
            $control->setTitle($name);
            $control->setIcon($icon);
            $control->addClass($class);
            $control->addHtmlAttributes($data);
            $this->_controls[] = $control;
        }

        /**
         *
         * @param array $controls
         * @return string
         */
        public function getControls($controls = array())
        {

            $html = array();
            foreach ($this->_controls as $control)
            {
                $html [] = $control->getHtml();
            }
            return implode(PHP_EOL, $html);
        }

        /**
         * 
         * @return array
         */
        public function getSettings()
        {
            return $this->_settings;
        }

        /**
         * Check if this row has children to render
         * @return boolean
         */
        public function hasChildren()
        {
            $children = $this->get('children', array());
            if (count($children) > 0)
            {
                return true;
            }
            return false;
        }

        /**
         * 
         * @param string $rootDir
         */
        public function render($rootDir = 'Zo2://html/admin/layout/layoutbuilder')
        {
            return parent::render($rootDir);
        }

        /**
         *
         * @return type
         */
        protected function _getGridClass()
        {
            return $this->_getBs2GridClass();
        }

    }

}