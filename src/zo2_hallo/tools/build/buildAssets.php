<?php
if(!class_exists('Zo2BuildAssets')){
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
}

$builds['tmp.less.error'] = new Zo2BuildAssets(TEMPLATE, 'zo2/development/less/error.less', 'less', '1.0.0');
$builds['tmp.less.joomla'] = new Zo2BuildAssets(TEMPLATE, 'zo2/development/less/joomla.less', 'less', '1.0.0');
$builds['tmp.less.megamenu'] = new Zo2BuildAssets(TEMPLATE, 'zo2/development/less/megamenu.less', 'less', '1.0.0');
$builds['tmp.less.template'] = new Zo2BuildAssets(TEMPLATE, 'zo2/development/less/template.less', 'less', '1.0.0');
$builds['tmp.less.mixins'] = new Zo2BuildAssets(TEMPLATE, 'zo2/development/less/mixins.less', 'less', '1.0.0');
$builds['tmp.less.typography'] = new Zo2BuildAssets(TEMPLATE, 'zo2/development/less/typography.less', 'less', '1.0.0');
$builds['tmp.less.variables'] = new Zo2BuildAssets(TEMPLATE, 'zo2/development/less/variables.less', 'less', '1.0.0');
$builds['tmp.less.normalize'] = new Zo2BuildAssets(TEMPLATE, 'zo2/development/less/normalize.less', 'less', '1.0.0');
$builds['tmp.less.presets.black'] = new Zo2BuildAssets(TEMPLATE, 'zo2/development/less/presets/black.less', 'less', '1.0.0');
$builds['tmp.less.presets.blue'] = new Zo2BuildAssets(TEMPLATE, 'zo2/development/less/presets/blue.less', 'less', '1.0.0');
$builds['tmp.less.presets.default'] = new Zo2BuildAssets(TEMPLATE, 'zo2/development/less/presets/default.less', 'less', '1.0.0');
$builds['tmp.less.presets.orange'] = new Zo2BuildAssets(TEMPLATE, 'zo2/development/less/presets/orange.less', 'less', '1.0.0');
$builds['tmp.less.presets.red'] = new Zo2BuildAssets(TEMPLATE, 'zo2/development/less/presets/red.less', 'less', '1.0.0');
$builds['tmp.js.ekko-lightbox'] = new Zo2BuildAssets(TEMPLATE, 'zo2/js/ekko-lightbox.js', 'js', '1');
$builds['tmp.js.megamenu'] = new Zo2BuildAssets(TEMPLATE, 'zo2/js/megamenu.js', 'js', '1');

file_put_contents(realpath(__DIR__) . '/../../assets/template.assets.build.json', json_encode($builds));

