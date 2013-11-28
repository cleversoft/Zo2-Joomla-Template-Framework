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
defined('_JEXEC') or die ('Restricted access');


/**
 * Zo2Component is a class allows user to render HTML at specific module position
 *
 * Class Zo2Component
 */
class Zo2Component {
    const RENDER_AFTER = 'after';
    const RENDER_BEFORE = 'before';
    public $position = self::RENDER_BEFORE;

    public function __construct()
    {

    }

    protected function beforeRender()
    {

    }

    protected function afterRender()
    {

    }

    /**
     * Render the HTML
     *
     * @return string
     */
    public function render()
    {
        return '';
    }
}