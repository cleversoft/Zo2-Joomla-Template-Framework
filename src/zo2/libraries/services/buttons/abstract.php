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
if (!class_exists('Zo2ServiceButtonAbstract')) {

    /**
     * 
     */
    abstract class Zo2ServiceButtonAbstract extends Zo2Template {

        protected $_script;

        public function __construct($properties = null) {
            parent::__construct($properties);
            $this->def('url', JUri::getInstance()->toString());
        }

        public function loadScript() {
            static $loaded = false;
            if ($loaded == false) {
                Zo2Assets::getInstance()->addScriptDeclaration($this->_script);
            }
        }

        public function getButtonHtml($button, $args = array()) {
            if (method_exists($this, $button)) {
                $this->loadScript();
                return call_user_func_array(array($this, $button), $args);
            }
        }

    }

}