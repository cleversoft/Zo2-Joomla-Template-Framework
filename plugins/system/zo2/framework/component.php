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
 * Zo2Component is a class allows user to render HTML at specific module position
 *
 * Class Zo2Component
 */
class Zo2Component {

    const RENDER_AFTER = 'after';
    const RENDER_BEFORE = 'before';

    public $position = self::RENDER_BEFORE;

    public function __construct() {
        
    }

    protected function beforeRender() {
        
    }

    protected function afterRender() {
        
    }

    /**
     * Render the HTML
     *
     * @return string
     */
    public function render() {
        return '';
    }

}
