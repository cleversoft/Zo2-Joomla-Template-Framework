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
$imageUrl = ZO2URL_ROOT . '/vendor/timthumb.php?w="' . $this->get('width') . "&h=" . $this->get('height') . "&src=" . $this->get('src');
?>
<li class='gallery-item'>
    <a title="<?php echo $this->get('title'); ?>"  href="<?php echo $this->get('src'); ?>" data-rel="prettyPhoto[bkpGallery]">
        <img src="<?php echo $imageUrl; ?>" title="<?php echo $this->get('title'); ?>" alt="<?php echo $this->get('title'); ?>" />
    </a>
</li>