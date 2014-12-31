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

if (!class_exists('Zo2LayoutbuilderRow'))
{

    /**
     * Class object for each row
     */
    class Zo2LayoutbuilderRow extends Zo2LayoutbuilderAbstract
    {

        /**
         * Render layout of this row
         * @return string
         */
        public function render()
        {
            // Only render row if this row have data
            if ($this->hasData())
            {
                $html = new Zo2Html();
                $html->set('row', $this);
                $ret[] = '<!-- BEGIN row: ' . $this->get('name') . ' -->';
                $ret[] = $html->fetch('Zo2://html/site/layout/row.php');
                $ret[] = '<!-- END row: ' . $this->get('name') . ' -->';
                return implode(PHP_EOL, $ret);
            }
        }

        /**
         * 
         * @return type
         */
        public function hasData()
        {
            $jDoc = $this->getJdoc();
            /* Check if this row using jDoc and this jDoc has data */
            $hasData = $this->_hasData($jDoc);
            return $hasData;
        }

        /**
         * Render children rows
         * @return string
         */
        public function renderChildren()
        {
            $children = $this->get('children', array());
            return $this->_render($children);
        }

        /**
         * Check if this row has children to render
         * @return boolean
         */
        public function hasChildren()
        {
            $children = $this->get('children', array());
            foreach ($children as $child)
            {
                $child = new Zo2LayoutbuilderRow($child);
                $jDoc = $child->getJdoc();
                return $this->_hasData($jDoc);
            }
            return false;
        }

        /**
         * 
         * @param type $jDoc
         * @return boolean
         */
        protected function _hasData($jDoc)
        {
            switch ($jDoc->get('type'))
            {
                // Check if modules position have any modules to render
                case 'modules':
                    $hasChildren = $this->countModules($jDoc->get('name')) > 0;
                    return $hasChildren;
                // Check if this module avaiable to render
                case 'module':
                    return $this->isModuleAvaiable($jDoc->get('name'));
                // For anything else by default is TRUE
                case 'message':
                case 'component':
                    return true;
                default :
                    return true;
            }
        }

        /**
         * @link https://docs.joomla.org/Jdoc_statements
         * @return \JObject
         */
        public function getJdoc()
        {
            return new JObject($this->get('jdoc'));
        }

        /**
         * 
         * @return type
         */
        public function getGridClass()
        {
            $grid = new JObject($this->get('grid'));
            $grid->def('xs', 12);
            $grid->def('sm', 12);
            $grid->def('md', 12);
            $grid->def('lg', 12);
            $gridProperties = $grid->getProperties();
            $class = array();
            foreach ($gridProperties as $key => $value)
            {
                $class [] = 'col-' . $key . '-' . $value;
            }
            return trim(implode(' ', $class));
        }

        /**
         * 
         * @param type $default
         * @return string
         */
        public function getClass($default = array())
        {
            $class = $default;
            $class [] = 'row';
            if ($this->get('class') != '')
                $class [] = $this->get('class');
            $class [] = $this->getGridClass();
            return implode(' ', $class);
        }

        /**
         * 
         * @param array $controls
         * @return string
         */
        public function getControls($controls = array())
        {
            $default = array(
                'drag' => 'fa fa-arrows row-control-icon dragger hasTooltip',
                'settings' => 'fa fa-cog row-control-icon settings hasTooltip',
                'remove' => 'row-control-icon delete fa fa-remove hasTooltip'
            );
            $controls = array_merge($default, $controls);
            $html = array();
            foreach ($controls as $title => $class)
            {
                $html [] = '<i title="' . $title . '" class="' . $class . '"></i>';
            }
            return implode(PHP_EOL, $html);
        }

    }

}