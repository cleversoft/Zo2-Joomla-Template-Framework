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
defined('_JEXEC') or die('Restricted access');
//$assets = Zo2Assets::getInstance();
//$assets->addScript('vendor/colorbox/js/jquery.colorbox-min.js');
//$assets->addStyleSheet('vendor/colorbox/css/colorbox.css');
$source = $this->get('src');
$fileSource = Zo2HelperPath::getPath($source);
if (JFile::exists($fileSource)) {
    $image = new Zo2Imager();
    $filename = 'resize_' . md5($source) . '_' . $this->get('width') . '_' . $this->get('height') . '.jpg';
    $saveFile = Zo2HelperPath::getPath('cache/' . $filename);
    if (!JFile::exists($saveFile)) {
        $image->load($fileSource)->resize($this->get('width'), $this->get('height'))->saveToFile($saveFile);
    }
    $thumbnail = Zo2Factory::getUrl('cache://' . $filename);
} else {
    $thumbnail = $this->get('src');
}
$name = 'modal-' . md5($source);
?>
<a href="#<?php echo $name; ?>" class="lightbox-modal" data-toggle="modal" data-target="#<?php echo $name; ?>" >
    <img src="<?php echo $thumbnail; ?>" />
</a>
<!-- Modal -->
<div class="modal fade" id="<?php echo $name; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <!-- <h4 class="modal-title" id="myModalLabel">Modal title</h4> -->
            </div>
            <div class="modal-body">
                <img src="<?php echo $source; ?>" />
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->