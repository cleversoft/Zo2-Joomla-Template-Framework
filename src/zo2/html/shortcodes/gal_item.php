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
$source = $this->get('src');
$fileSource = Zo2HelperPath::getPath($source);
if (JFile::exists($fileSource)) {
    $image = new Zo2Imager();
    $filename = 'resize_' . md5($source) . '_' . $this->get('width') . '_' . $this->get('height') . '.jpg';
    $saveFile = Zo2HelperPath::getPath('cache/' . $filename);
    if (!JFile::exists($saveFile)) {
        $image->load($fileSource)->resize($this->get('width'), $this->get('height'))->saveToFile($saveFile);
    }
    $src = Zo2Factory::getUrl('cache://' . $filename);
} else {
    $src = $this->get('src');
}
?>
<div class="item <?php echo $this->get('active'); ?>">    
    <img src="<?php echo $src; ?>" alt="<?php echo $this->get('title'); ?>">
    <div class="carousel-caption">
        <?php echo $this->get('content'); ?>
    </div>
</div>