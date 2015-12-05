<?php
/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @version     1.4.3
 * @since       1.4.3
 * @uses        For Joomla! 3.x
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');
$profile = Zo2Factory::getProfile();
?>
<!-- Main layout for backend -->
<!-- It's using Twitter Bootstrap 2 default. Provided by Joomla! -->
<!-- Begin Content -->
<div id="zo2-profile" 
     data-zo2-template="<?php echo Zo2Framework::getInstance()->template->template; ?>" 
     data-zo2-templateid="<?php echo Zo2Framework::getInstance()->template->id; ?>"
     data-zo2-profile="<?php echo $profile->get('name'); ?>">
    <div class="row-fluid">
        <div class="span12">
            <?php $this->load('admin/top/default.php'); ?>
            <?php $this->load('admin/body/default.php'); ?>
        </div>
    </div>    
</div>

<!-- End Content -->
<style>
    #attrib-zo2 .controls {
        margin-left: 0px;
    }
</style>