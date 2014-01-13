<?php
class Zo2BuildAssets {

    public $position;

    public $path;

    public $type;

    public $version;

    public function __construct($position, $path, $type, $version) {
        $this->position = $position;
        $this->path = $path;
        $this->type = $type;
        $this->version = $version;
    }
}

$assets['less.admin'] = new Zo2BuildAssets(CORE, 'zo2/development/less/admin.less', 'less', '1.0.0');
$assets['less.adminmegamenu'] = new Zo2BuildAssets(CORE, 'zo2/development/less/adminmegamenu.less', 'less', '1.0.0');
$assets['less.megamenu'] = new Zo2BuildAssets(CORE, 'zo2/development/less/megamenu.less', 'less', '1.0.0');
$assets['js.adminlayout'] = new Zo2BuildAssets(CORE, 'zo2/development/js/adminlayout.js', 'js', '1.0.0');
$assets['js.adminmegamenu'] = new Zo2BuildAssets(CORE, 'zo2/development/js/adminmegamenu.js', 'js', '1.0.0');
$assets['js.megamenu'] = new Zo2BuildAssets(CORE, 'zo2/development/js/megamenu.js', 'js', '1.0.0');

file_put_contents(realpath(__DIR__) . '/../../assets/core.assets.build.json', json_encode($assets));

