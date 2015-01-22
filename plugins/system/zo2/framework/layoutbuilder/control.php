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
if (!class_exists('Zo2LayoutbuilderControl'))
{

    /**
     * Class object for each row
     */
    class Zo2LayoutbuilderControl extends JObject
    {

        public $class = array(
            'row-control-icon',
            'hasTooltip'
        );
        public $data = array();

        public function __construct($properties = null)
        {
            parent::__construct($properties);
        }

        public function addClass($class)
        {
            if (!in_array($class, $this->class))
            {
                $this->class[] = $class;
            }
        }

        public function setIcon($icon)
        {
            $this->set('icon', 'fa fa-' . $icon);
        }

        public function setName($name)
        {
            $this->set('name', $name);
        }

        public function addAttribute($name, $value)
        {
            if (!in_array($name, $this->data))
            {
                $this->data[$name] = $value;
            }
        }

        public function getHtml()
        {

            $data = array();
            // Set icon
            if ($this->get('icon'))
            {
                $this->addClass($this->get('icon'));
            }
            // Set class
            $class = $this->get('class');
            if (!empty($class))
            {
                $data[] = 'class="' . implode(' ', $this->get('class')) . '"';
            }
            // Set data attributes
            if ($this->get('data'))
            {
                $attributes = $this->get('data');
                foreach ($attributes as $key => $value)
                {
                    $data [] = $key . '="' . htmlentities($value) . '"';
                }
            }

            $html = '<i title="' . $this->get('name') . '"' . implode(' ', $data) . '></i>';
            return $html;
        }

    }

}