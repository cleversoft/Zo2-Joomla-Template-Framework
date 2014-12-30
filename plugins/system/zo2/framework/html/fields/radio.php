<?php
/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @version     1.4.3
 * @since       1.4.3
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
$default_options = array(
    array(
        'value' => 1,
        'label' => JText::_('JYES'),
        'class' => ''
    ),
    array(
        'value' => 0,
        'label' => JText::_('JNO'),
        'class' => ''
    )
);

if (empty($this->data['options']))
    $this->data['options'] = $default_options
    ?>
<div class="control-group">
    <div class="control-label">
        <label
            class="control-label zo2-label <?php echo (isset($this->label['class'])) ? $this->label['class'] : ''; ?>"
            for="<?php echo $this->data['name']; ?>"
            >
<?php echo $this->label['label'];
?>
        </label>
        <div class="label-desc"><?php echo $this->label['description']; ?></div>
    </div>
    <div class="controls">
        <fieldset class="radio btn-group">

<?php
foreach ($this->data['options'] as $key => $option) {
    $active = $checked = $class = '';
    $class = isset($option['class']) ? $option['class'] : $default_options[$key]['class'];
    $value = isset($option['value']) ? $option['value'] : $default_options[$key]['value'];
    $label = isset($option['label']) ? $option['label'] : $default_options[$key]['label'];

    if ($this->data['value'] == $value) {
        $active = 'active';
        $checked = 'checked="checked"';
    }
    ?>
                <input name="<?php echo $this->data['name'] ?>" <?php echo $checked; ?> type="radio" value="<?php echo $value ?>" >
                <label class="btn <?php echo $class; ?> <?php echo $active ?>"><?php echo $label ?></label>
                <?php
            }
            ?>
        </fieldset>
    </div>
</div>