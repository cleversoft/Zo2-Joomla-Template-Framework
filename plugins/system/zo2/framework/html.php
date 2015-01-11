<?php

/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @version     1.4.3
 * @since       1.4.3
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
if (!class_exists('Zo2Html'))
{

    /**
     * @since 1.4.3
     * Used to fetch template file
     */
    class Zo2Html extends JObject
    {

        /**
         *
         * @var Zo2Path 
         */
        private $_path;

        /**
         * Constructor
         * @param object|array $properties
         */
        public function __construct($properties = null)
        {
            parent::__construct($properties);
            /* Init local variables */
            $this->_path = Zo2Path::getInstance();
        }

        /**
         * Fetch template file
         * @param string $key
         * @return string
         */
        public function fetch($key)
        {
            $tplFile = $this->_path->getPath($key);
            /* Make sure this template file is exists */
            if ($tplFile)
            {
                $properties = $this->getProperties();
                ob_start();
                extract($properties, EXTR_REFS);
                include($tplFile);
                $content = ob_get_contents();
                ob_end_clean();
                return $content;
            }
        }

        /**
         * Include another template into current template
         * @return \Zo2Html
         */
        public function load($key)
        {
            $tplFile = $this->_path->getPath($key);
            if ($tplFile)
            {
                $properties = $this->getProperties();
                extract($properties, EXTR_REFS);
                include($tplFile);
            }
            return $this;
        }

        /**
         * 
         * @return type
         */
        public function toDataAttributes()
        {
            $attributes = $this->getProperties();
            $data = array();
            foreach ($attributes as $key => $value)
            {
                if (!is_array($value) && !is_object($value))
                {
                    $data[] = 'zo2-data-' . $key . '="' . htmlentities($value) . '"';
                } else
                {
                    // For array or object than we convert into json
                    $data[] = 'zo2-data-' . $key . '="' . htmlentities(Zo2HelperEncode::json($value)) . '"';
                }
            }

            return implode(' ', $data);
        }

    }

}