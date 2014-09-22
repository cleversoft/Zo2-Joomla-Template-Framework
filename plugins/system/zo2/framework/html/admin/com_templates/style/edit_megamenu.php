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

defined('_JEXEC') or die;
?>

<?php foreach ($this->form->getFieldset('megamenu') as $field) : ?>
    <div class="control-group">
        <div class="control-label">
            <?php echo $field->label; ?>
        </div>
        <div class="controls">
            <?php echo $field->input; ?>
        </div>
    </div>
<?php endforeach;

