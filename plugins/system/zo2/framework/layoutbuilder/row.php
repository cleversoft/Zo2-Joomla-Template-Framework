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
if (!class_exists('Zo2LayoutbuilderRow'))
{

    /**
     * Class object for each row
     */
    class Zo2LayoutbuilderRow extends JObject
    {

        const DEFAULT_NAME = "unknown";

        /**
         *
         * @var type 
         */
        protected $_bsVars = array(
            '3' => array(
                'grid' => 'col'
            ),
            '2' => array(
                'grid' => 'span'
            )
        );

        /**
         * 
         * @param type $properties
         */
        public function __construct($properties = null)
        {
            parent::__construct($properties);

            // Default name
            $this->def('name', self::DEFAULT_NAME);
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

        /**
         * 
         * @param type $isRoot
         * @return \Zo2LayoutbuilderRow
         */
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
            return $this;
        }

        /**
         *
         * @return boolean
         */
        public function isRoot()
        {
            return $this->get('root', false);
        }

        /**
         * 
         * @param type $rootDir
         * @return type
         */
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
                    return true;
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
            if ($this->get('class') != '')
                $class [] = $this->get('class');
            $class [] = $this->_getGridClass();
            return implode(' ', $class);
        }

        /**
         *
         * @return type
         */
        protected function _getGridClass()
        {
            $class = '';
            // For frontpage we generate grid by use BS3
            if (JFactory::getApplication()->isSite())
            {
                $class = $this->_getBs3GridClass();
            } else // For backend we generate span md by use BS2
            {
                $class = $this->_getBs2GridClass();
            }

            return $class;
        }

        protected function _getBs2GridClass()
        {
            $class = array();
            $grid = $this->get('grid');
            $gridClass = $this->_getBootstrapVar('2', 'grid', 'span');
            $class [] = $gridClass . $grid->get('md');
            return trim(implode(' ', $class));
        }

        protected function _getBs3GridClass()
        {
            $grid = $this->get('grid');
            $gridProperties = $grid->getProperties();
            $class = array();
            foreach ($gridProperties as $key => $value)
            {

                $gridClass = $this->_getBootstrapVar('3', 'grid', 'col');
                $class [] = $gridClass . '-' . $key . '-' . $value;
            }
            return $class;
        }

        /**
         * 
         * @param type $version
         * @param type $name
         * @param type $default
         * @return type
         */
        protected function _getBootstrapVar($version, $name, $default = null)
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