<?php
class Zo2Widget {
    public $viewName = '';

    public function render()
    {
        $viewPath = 'views/' . $this->viewName . '.php';

        if (file_exists($viewPath)) {
            include $viewPath;
        }
    }

    public function parseAttributes($html)
    {
        $pattern = '#data-zo2widgetattr-[a-zA-Z0-9]+=["\'][a-zA-Z0-9]+["\']#';

        $result = preg_match_all($pattern, $html, $matches);

        if($result) {

        }
    }
}