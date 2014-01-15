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

/**
 * Bootstrap 3.x will use for frontpage
 */
$assets['css.bootstrap'] = new Zo2Asset('vendor/bootstrap/core/css/bootstrap.min.css', 'css', '3.0.3');
$assets['css.bootstrap']->loadInJFrontend('*');
$assets['js.bootstrap'] = new Zo2Asset('vendor/bootstrap/core/js/bootstrap.js', 'js', '3.0.3');
$assets['js.bootstrap']->loadInJFrontend('2.*');
//$assets['js.bootstrap']->loadInJFrontend('3.*');

/**
 * Bootstrap 2.x will use only for backend
 */
$assets['css.bootstrap2'] = new Zo2Asset('vendor/bootstrap/core/2.3.2/css/bootstrap.min.css', 'css', '2');
$assets['css.bootstrap2']->loadInJBackend('2.*');
$assets['js.bootstrap2'] = new Zo2Asset('vendor/bootstrap/core/2.3.2/js/bootstrap.min.js', 'js', '2');
$assets['js.bootstrap2']->loadInJBackend('2.*');
/* Font awesome */
$assets['font.awesome'] = new Zo2Asset('vendor/bootstrap/addons/font-awesome/css/font-awesome.min.css', 'css', '');
$assets['font.awesome']->loadInJFrontend('*');
$assets['font.awesome']->loadInJBackend('*');
$assets['css.bootstrap.colorpicker'] = new Zo2Asset('vendor/bootstrap/addons/bootstrap-colorpicker/css/bootstrap-colorpicker.css', 'css', '');
$assets['css.bootstrap.colorpicker']->loadInJBackend('*');
$assets['js.bootstrap.colorpicker'] = new Zo2Asset('vendor/bootstrap/addons/bootstrap-colorpicker/js/bootstrap-colorpicker.js', 'js', '');
$assets['js.bootstrap.colorpicker']->loadInJBackend('*');
/**
 * Bootstrap' addons
 * @uses It will load follow up css.bootstrap as dependencies
 */
/**
 * Fonts
 */
$assets['css.fontselect'] = new Zo2Asset('vendor/fontselect/jquery.fontselect.css', 'css', '');
$assets['css.fontselect']->loadInJBackend('*');
$assets['js.fontselect'] = new Zo2Asset('vendor/fontselect/jquery.fontselect.js', 'js', '');
$assets['js.fontselect']->loadInJBackend('*');
$assets['css.fontello'] = new Zo2Asset('vendor/fontello/css/fontello.css', 'css', '');
$assets['css.fontello']->loadInJBackend('*');
/* Mega menu */
$assets['css.megamenu'] = new Zo2Asset('zo2/css/adminmegamenu.css', 'css', '');
$assets['css.megamenu']->loadInJBackend('*');
/* Admin menu */
$assets['css.admin'] = new Zo2Asset('zo2/css/admin.css', 'css', '');
$assets['css.admin']->loadInJBackend('*');
/* Shortcodes */
$assets['css.shortcodes'] = new Zo2Asset('zo2/css/shortcodes.css', 'css', '');
$assets['css.shortcodes']->loadInJFrontend('*');
/* Our own scripts */
$assets['scripts'] = new Zo2Asset('zo2/js/scripts.js', 'js', '');
$assets['scripts']->loadInJFrontend('*');
file_put_contents(realpath(__DIR__) . '/../../assets/core.assets.load.json', json_encode($assets));
echo '<pre>';
print_r(json_decode(json_encode($assets)));
echo '</pre>';
