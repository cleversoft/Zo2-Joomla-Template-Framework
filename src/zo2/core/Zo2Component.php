<?php
/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      Duc Nguyen <ducntv@gmail.com>
 * @author      Hiepvu <vqhiep2010@gmail.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */
defined('_JEXEC') or die;

class Zo2Component {
    public $viewName = '';

    protected $attributes = array();

    public function render()
    {
        $this->run();

        $viewPath = Zo2Framework::getCurrentTemplateAbsolutePath() . '/components/views/' . $this->viewName . '.php';

        if (file_exists($viewPath)) {
            ob_start();
            ob_implicit_flush(false);
            require $viewPath;
            $output = ob_get_clean();
            return $output;
        }

        return '';
    }

    public function run(){}

    public function loadAttributes($attr)
    {
        $this->attributes = $attr;
    }
}