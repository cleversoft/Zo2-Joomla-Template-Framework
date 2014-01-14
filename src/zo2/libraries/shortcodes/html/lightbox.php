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
$assets = Zo2Assets::getInstance();
$assets->addScript('vendor/colorbox/js/jquery.colorbox-min.js');
$assets->addStyleSheet('vendor/colorbox/css/colorbox.css');
$source = $this->get('src');
$fileSource = Zo2HelperPath::getPath($source);
if (JFile::exists($fileSource)) {
    $image = new Zo2Imager();
    $filename = 'resize_' . md5($source) . '_' . $this->get('width') . '_' . $this->get('height') . '.jpg';
    $saveFile = Zo2HelperPath::getPath('cache/' . $filename);
    if (!JFile::exists($saveFile)) {
        $image->load($fileSource)->resize($this->get('width'), $this->get('height'))->saveToFile($saveFile);
    }
    $thumbnail = Zo2HelperPath::getUrl('cache/' . $filename);
} else {
    $thumbnail = $this->get('src');
}
?>
<a href="<?php echo $source; ?>" class="colorbox">
    <img src="<?php echo $thumbnail; ?>" />
</a>