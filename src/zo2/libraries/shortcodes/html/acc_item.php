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
