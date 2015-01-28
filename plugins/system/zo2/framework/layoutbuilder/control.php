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
if (!class_exists('Zo2LayoutbuilderControl'))
{

    /**
     * Control object class
     */
    class Zo2LayoutbuilderControl extends JObject
    {

        /**
         *
         * @var string
         */
        private $_classes = array(
            'row-control-icon',
            'hasTooltip'
        );

        /**
         *
         * @var array
         */
        private $_htmlAttributes = array();

        /**
         * 
         * @param string $class
         */
        public function addClass($class)
        {
            if (!in_array($class, $this->_classes))
            {
                $this->_classes[] = $class;
            }
        }

        /**
         * 
         * @return array
         */
        public function getClasses()
        {
            return $this->_classes;
        }

        /**
         * 
         * @param string $icon
         */
        public function setIcon($icon)
        {
            $this->set('icon', 'fa fa-' . $icon);
        }

        /**
         * 
         * @param string $name
         */
        public function setTitle($name)
        {
            $this->set('title', $name);
        }

        /**
         * 
         * @param string $name
         * @param string $value
         */
        public function addHtmlAttribute($name, $value)
        {
            if (!in_array($name, $this->_htmlAttributes))
            {
                $this->_htmlAttributes[$name] = $value;
            }
        }

        public function addHtmlAttributes($array)
        {
            $this->_htmlAttributes = array_merge_recursive($this->_htmlAttributes, $array);
        }

        /**
         * 
         * @return array
         */
        public function getHtmlAttributes()
        {
            return $this->_htmlAttributes;
        }

        /**
         * 
         * @return string
         */
        public function getHtml()
        {

            $data = array();
            // Set icon
            if ($this->get('icon'))
            {
                $this->addClass($this->get('icon'));
            }
            // Generate classes
            $classes = $this->getClasses();
            if (!empty($classes))
            {
                // Add class to data list
                $data[] = 'class="' . implode(' ', $classes) . '"';
            }
            // Set data attributes
            $attributes = $this->getHtmlAttributes();
            if (!empty($attributes))
            {
                // Add each html attribute to data list
                foreach ($attributes as $key => $value)
                {
                    // Prevent empty value than we do not need to generate data
                    if (!empty($value))
                    {
                        $data [] = $key . '="' . htmlentities($value) . '"';
                    }
                }
            }
            // Prevent duplicate data
            $data = array_unique($data);
            $html = '<i title="' . $this->get('title') . '"' . implode(' ', $data) . '></i>';
            return $html;
        }

    }

}