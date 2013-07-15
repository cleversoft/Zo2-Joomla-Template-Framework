<?php
class Zo2Widget {
    public $viewName = '';

    private $attributes = array();

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