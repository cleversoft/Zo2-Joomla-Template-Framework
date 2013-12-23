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
    class Zo2Shortcodes {

        /**
         * @uses [tag key={varName} ...]{keyContent}[/tag]
         * @var array 
         * @todo Should we move into ini file?
         * @todo Allow dynamic variables
         */
        private $_tags = array(
            '[accordion]{content}[/accordion]' => 'accordion',
            '[accordionitem title={title}]{content}[/accordionitem]' => 'accordionitem',
            '[blockquote align={align}]{content}[/blockquote]' => 'blockquote',
            '[column col={col}]{content}[/column]' => 'column',
            '[icon icon={icon}][/youtube]' => 'icon',
            '[messagebox title={title} show_close={show_close}]{content}[/messagebox]' => 'messagebox',
            '[plan title={title} button_link={button_link} button_label={button_label} featured={featured} percent={percent}]{content}[/plan]' => 'plan',
            '[space height={height}]{content}[/space]' => 'space',
            '[youtube width={width} height={height} id={id}][/youtube]' => 'youtube',
        );

        /**
         * 
         * @param type $text
         * @return string
         */
        public function process($text) {
            return $this->_replaceCode($text);
        }

        /**
         * 
         * @param type $text
         * @return boolean
         */
        private function _replaceCode(&$text) {

            /**
             * Work on all tags
             */
            foreach ($this->_tags as $key => $val) {

                $search = array();
                $replace = array();
                $tokens = array();
                /* Save original text */
                $workingText = $text;

                /* build the regexp for the tag */
                $openTag = substr($key, 0, strpos($key, ']') + 1);
                $partialOpenTag = substr($openTag, 0, (strpos($openTag, ' ')) ? strpos($openTag, ' ') : strpos($openTag, ']'));
                $tokenedOpenTag = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>.*?)', $openTag);

                /* Escaped tag exists */
                if (strpos($openTag, "/]")) {
                    $escapedKey = $this->_addEscapes($tokenedOpenTag);
                } else {
                    $tagContents = substr($key, strpos($key, ']') + 1, strrpos($key, '[') - (strpos($key, ']') + 1));
                    $tokened_tag_contens = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>(?s:(?!' . $partialOpenTag . ').)*?)', $tagContents);
                    $closetag = substr($key, strrpos($key, '['), strrpos($key, ']') - strrpos($key, '[') + 1);
                    $escapedKey = $this->_addEscapes($tokenedOpenTag . $tokened_tag_contens . $closetag);
                }
                $finalTagPattern = "%" . $escapedKey . "%";

                /* Process */
                preg_match_all($finalTagPattern, $workingText, $results);

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
                        $params = new JRegistry();
                        foreach ($tokens as $token) {
                            //$tmpval = str_replace("{" . $token . "}", $results[$token][$i], $tmpval);
                            $params->set($token, str_replace('{', '', str_replace('}', '', $results[$token][$i])));
                        }
                        $tmplFile = ZO2PATH_ROOT . '/libraries/shortcodes/html/' . $val . '.php';

                        if (JFile::exists($tmplFile)) {
                            ob_start();
                            include $tmplFile;
                            $buffer = ob_get_contents();
                            ob_end_clean();
                            $replace[] = $buffer;
                        } else {
                            $replace[] = JText::_('PLG_SYSTEM_ZO2_FILE_NOT_FOUND');
                        }
                    }
                }
                /* Feww completed */
                $text = str_replace($search, $replace, $text);
            }
            return $text;
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