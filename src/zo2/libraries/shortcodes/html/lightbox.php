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
//$assets->addScript('vendor/colorbox/js/jquery.colorbox-min.js');
//$assets->addStyleSheet('vendor/colorbox/css/colorbox.css');
$path = new Zo2Path();
$source = $this->get('src');
if (JFile::exists($fileSource)) {
    $image = new Zo2Imager();
    $saveFile = $path->getPath('cache/' . md5($source) . '.jpg');
    if (!JFile::exists($saveFile)) {
        $image->load($fileSource)->resize($this->get('width'), $this->get('height'))->saveToFile($saveFile);
    }
    $src = $path->getUrl('cache/' . md5($source) . '.jpg');
} else {
    $src = $this->get('src');
}
?>
<a href="<?php echo $source; ?>" class="colorbox">
    <img src="<?php echo $src; ?>" />
</a>