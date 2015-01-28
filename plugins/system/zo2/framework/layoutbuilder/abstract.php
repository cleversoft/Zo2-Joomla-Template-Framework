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
if (!class_exists('Zo2LayoutbuilderAbstract'))
{

    /**
     * Layout builder base class
     */
    abstract class Zo2LayoutbuilderAbstract extends JObject
    {

        protected $_bsVars = array(
            '3' => array(
                'grid' => 'col'
            ),
            '2' => array(
                'grid' => 'span'
            )
        );
        protected $_settings = array(
            'name',
            'class',
            'visibility'
        );
        protected $_controls;

        public function __construct($properties = null)
        {
            parent::__construct($properties);

            // Default controls
            $this->addControl(JText::_('ZO2_ADMIN_LAYOUTBULDER_ROW_CONTROL_MOVE'), 'arrows', 'move', array('id' => 'move-row'));
            $this->addControl(JText::_('ZO2_ADMIN_LAYOUTBULDER_ROW_CONTROL_SETTINGS'), 'cog', 'settings', array('onClick' => 'zo2.layoutbuilder.showSettingModal(this);'));
            $this->addControl(JText::_('ZO2_ADMIN_LAYOUTBULDER_ROW_CONTROL_ADD_CHILDREN'), 'columns', 'add-row', array('onClick' => 'zo2.layoutbuilder.addRow(this);'));
            $this->addControl(JText::_('ZO2_ADMIN_LAYOUTBULDER_ROW_CONTROL_DUPLICATE'), 'files-o', 'duplicate-col', array('onClick' => ''));
            $this->addControl(JText::_('ZO2_ADMIN_LAYOUTBULDER_ROW_CONTROL_REMOVE'), 'remove', 'delete', array('onClick' => 'zo2.layoutbuilder.showDeleteModal(this);'));
            // Default name
            $this->def('name', 'unknown');
            // Convert jdoc to JObject
            if ($this->get('jdoc'))
            {
                $this->set('jdoc', new JObject($this->get('jdoc')));
            } else
            {
                $this->set('jdoc', new JObject());
            }
            // Convert grid to JObject
            if ($this->get('grid'))
            {
                $this->set('grid', new JObject($this->get('grid')));
            } else
            {
                // Grid is not exists than we init default values
                $grid = new JObject();
                $grid->def('xs', 12);
                $grid->def('sm', 12);
                $grid->def('md', 12);
                $grid->def('lg', 12);
                $this->set('grid', $grid);
            }
        }

        public function setRoot($isRoot)
        {
            $this->set('root', $isRoot);
            if ($isRoot === false)
            {
                $childSettings = array(
                    'jdoc',
                    'positions',
                    'modules',
                    'grid',
                    'offset'
                );
                $this->_settings = array_merge($this->_settings, $childSettings);
                $this->_settings = array_unique($this->_settings);
            }
        }

        public function isRoot()
        {
            return $this->get('root');
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

        public function render($rootDir)
        {
            $html = new Zo2Html();
            $html->set('row', $this);
            $ret[] = '<!-- BEGIN row: ' . $this->get('name') . ' -->';
            $ret[] = $html->fetch($rootDir . '/row.php');
            $ret[] = '<!-- END row: ' . $this->get('name') . ' -->';
            return implode(PHP_EOL, $ret);
        }

        /**
         * Check if this row has children to render
         * @return boolean
         */
        public function hasChildren()
        {
            $children = $this->get('children', array());
            $hasChild = false;
            foreach ($children as $child)
            {
                $child = new Zo2LayoutbuilderRow($child);

                if ($child->hasData())
                {
                    $hasChild = true;
                    continue;
                } else
                {
                    return false;
                }
            }
            return $hasChild;
        }

        /**
         *
         * @return type
         */
        public function hasData()
        {
            $jdoc = $this->get('jdoc');
            switch ($jdoc->get('type'))
            {
                // Check if modules position have any modules to render
                case 'modules':
                    return Zo2HelperLayoutbuilder::isAvailableModulePosition($jdoc->get('name'));
                // Check if this module avaiable to render
                case 'module':
                    return Zo2HelperLayoutbuilder::isModuleAvaiable($jdoc->get('name'));
                // For anything else by default is TRUE
                case 'message':
                case 'component':
                    return true;
                default :
                    return true;
            }
        }

        public function getWidth($name = 'md')
        {
            return $this->grid->get($name, 12);
        }

        /**
         *
         * @param type $default
         * @return string
         */
        public function getClass($default = array())
        {
            $class = $default;
            $class [] = '';
            if ($this->get('class') != '')
                $class [] = $this->get('class');
            $class [] = $this->_getGridClass();
            return implode(' ', $class);
        }

        public function getSettings()
        {
            return $this->_settings;
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
         * @return type
         */
        protected function _getGridClass()
        {
            $grid = $this->get('grid');
            $gridProperties = $grid->getProperties();
            $class = array();
            // For frontpage we generate grid by use BS3
            if (JFactory::getApplication()->isSite())
            {
                foreach ($gridProperties as $key => $value)
                {

                    $gridClass = $this->_getBootstrapVar('3', 'grid', 'col');
                    $class [] = $gridClass . '-' . $key . '-' . $value;
                }
            } else // For backend we generate span md by use BS2
            {
                $gridClass = $this->_getBootstrapVar('2', 'grid', 'span');
                $class [] = $gridClass . $grid->get('md');
            }

            return trim(implode(' ', $class));
        }

        private function _getBootstrapVar($version, $name, $default = null)
        {
            if (isset($this->_bsVars[$version]))
            {
                if (isset($this->_bsVars[$version][$name]))
                {
                    return $this->_bsVars[$version][$name];
                }
            }
            return $default;
        }

    }

}