<?php

/**
 * @uses This file will use to generate our *.assets.load.json
 * Please put all needed assets here and generate
 */
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

    /**
     * Dependency files will be loaded
     * @param type $name
     * @param type $path
     * @param type $type
     */
    public function addDependencies($name, $path, $type) {
        $this->dependencies[$name][] = array('path' => $path, 'type' => $type);
    }

    public function loadInJBackend($version) {
        $this->loadIn['backend'][] = $version;
    }

    public function loadInJFrontend($version) {
        $this->loadIn['frontend'][] = $version;
    }

}

$assets['ekko-lightbox'] = new Zo2Asset('zo2/js/ekko-lightbox.js', 'js', '');
$assets['ekko-lightbox']->loadInJFrontend('*');
$assets['normalize'] = new Zo2Asset('zo2/css/normalize.css', 'css', '');
$assets['normalize']->loadInJFrontend('*');
$assets['megamenu'] = new Zo2Asset('zo2/js/megamenu.js', 'js', '');
$assets['megamenu']->loadInJFrontend('*');
$assets['template'] = new Zo2Asset('zo2/css/template.css', 'css', '');
$assets['template']->loadInJFrontend('*');

file_put_contents(realpath(__DIR__) . '/../../assets/template.assets.load.json', json_encode($assets));
echo '<pre>';
print_r(json_decode(json_encode($assets)));
echo '</pre>';
