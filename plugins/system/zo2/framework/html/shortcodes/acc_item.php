<?php
/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');
$_SESSION['accordion'] = !isset($_SESSION['accordion']) ? 1 : $_SESSION['accordion'] + 1;
?>
<?php ?>
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $_SESSION['accordion'] ?>">
                    <?php echo $this->get('title'); ?>
                </a>
            </h4>
        </div>
        <div id="collapse-<?php echo $_SESSION['accordion'] ?>" class="panel-collapse collapse <?php echo $_SESSION['accordion'] == 1 ? 'in' : '' ?>">
            <div class="panel-body">
                <?php echo $this->get('content'); ?>
            </div>
        </div>
    </div>
</div>
