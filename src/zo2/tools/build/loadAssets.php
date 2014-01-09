<?php

class Zo2Asset {

    public $path = null;
    public $type = null;
    public $version = null;
    public $dependencies = array();
    public $loadIn = array();

    public function __construct($path, $type, $version) {
        $this->path = $path;
        $this->type = $type;
        $this->version = $version;
    }

    public function addDependencies($type, $dependency, $version) {
        $this->dependencies[$type] = array('dependency' => $dependency, 'version' => $version);
    }

    public function loadInJBackend($version) {
        $this->loadIn['backend'][] = $version;
    }

    public function loadInJFrontend($version) {
        $this->loadIn['frontend'][] = $version;
    }

}

/**
 * jQuery
 */
$assets['js.jquery'] = new Zo2Asset('vendor/jquery/jquery-1.9.1.min.js', 'js', '1.9.1');
$assets['js.jquery']->loadInJFrontend('2.*');
$assets['js.jquery']->loadInJBackend('2.*');

/**
 * Bootstrap
 */
$assets['js.bootstrap'] = new Zo2Asset('vendor/bootstrap/js/bootstrap.min.js', 'js', '3.0.3');
$assets['js.bootstrap']->loadInJFrontend('2.*');
$assets['js.bootstrap']->loadInJBackend('2.*');

file_put_contents(realpath(__DIR__) . '/../../assets/core.assets.load.json', json_encode($assets));