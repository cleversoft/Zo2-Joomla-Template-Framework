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

/**
 * Class exists checking
 */
if (!class_exists('Zo2Shortcodes')) {

    /**
     * Joomla! shortcodes generate class
     * @author Viet Vu <me@jooservices.com>
     */
    class Zo2Shortcodes extends JObject {

        /**
         * Array of shortcodes object
         * @var array 
         */
        private $_data = array();

        /**
         * Singleton instance
         * @var Zo2Shortcodes
         */
        public static $instance;

        /**
         * 
         */
        public function __construct() {
            $this->load(ZO2PATH_ASSETS . '/zo2/shortcodes.json');
        }

        public static function getInstance() {
            if (empty(self::$instance)) {
                self::$instance = new self ();
            }
            if (!empty(self::$instance)) {
                return self::$instance;
            }
        }

        /**
         * 
         * @param type $file
         * @return \Zo2Shortcodes
         */
        public function load($file) {
            $buffer = JFile::read($file);
            $this->_data = array_merge($this->_data, json_decode($buffer));
            return $this;
        }

        /**
         * Do process replace text with ALL shortcodes
         * @param type $text
         * @return string
         */
        public function execute($text) {
            foreach ($this->_data as $shortCode) {
                $text = $this->replace($shortCode, $text);
            }
            return $text;
        }

        /**
         * Do replace for each shortcode
         * @param type $shortCode
         * @param type $text
         * @return type
         */
        public function replace($shortCode, $text) {
            $search = array();
            $replace = array();
            $tokens = array();

            $shortCodePattern = $shortCode->pattern;

            /**
             * @todo Allow empty params
             */
            /* build the regexp for the tag */
            $openTag = substr($shortCodePattern, 0, strpos($shortCodePattern, ']') + 1);
            $partialOpenTag = substr($openTag, 0, (strpos($openTag, ' ')) ? strpos($openTag, ' ') : strpos($openTag, ']'));
            $tokenedOpenTag = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>.*?)', $openTag);

            /* Escaped tag exists */
            if (strpos($openTag, "/]")) {
                $escapedKey = $this->_addEscapes($tokenedOpenTag);
            } else {
                $tagContents = substr($shortCodePattern, strpos($shortCodePattern, ']') + 1, strrpos($shortCodePattern, '[') - (strpos($shortCodePattern, ']') + 1));
                $tokened_tag_contens = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>(?s:(?!' . $partialOpenTag . ').)*?)', $tagContents);
                $closetag = substr($shortCodePattern, strrpos($shortCodePattern, '['), strrpos($shortCodePattern, ']') - strrpos($shortCodePattern, '[') + 1);
                $escapedKey = $this->_addEscapes($tokenedOpenTag . $tokened_tag_contens . $closetag);
            }
            $finalTagPattern = "%" . $escapedKey . "%";

            /* Process */
            preg_match_all($finalTagPattern, $text, $results);

            if (!empty($results[0])) {
                $search = array_merge($search, $results[0]);
                /* Build array of tokens */
                foreach ($results as $k => $v) {
                    if (!is_numeric($k)) {
                        $tokens[] = $k;
                    }
                }

                /* Process for all instances */
                for ($i = 0; $i < count($results[0]); $i++) {
                    /* Create new instance of Zo2Template and provide default properties */
                    $template = new Zo2Template();
                    //$template->registerDir(Zo2Framework::getZo2Path() . '/libraries/shortcodes/html');
                    $template->setProperties($this->getProperties());
                    $template->setProperties($shortCode->default);
                    foreach ($tokens as $token) {
                        $template->set($token, str_replace('{', '', str_replace('}', '', $results[$token][$i])));
                    }
                    /* Fetch template to get html */
                    $replace[] = $template->fetch($shortCode->layout . '.php');
                }
            }
            return str_replace($search, $replace, $text);
        }

        /**
         * 
         * @param type $fullString
         * @return type
         */
        private function _addEscapes($fullString) {
            $fullString = str_replace("\\", "\\\\", $fullString);
            $fullString = str_replace("[", "\[", $fullString);
            $fullString = str_replace("]", "\\]", $fullString);
            return $fullString;
        }

    }

}