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
if(empty($this->data['options']))
    $this->data['options'] = array(
            array(
                'value' => 0,
                'label' => JText::_('ZO2_NO'),
                'class' => 'first'
            ),
            array(
                'value' => 1,
                'label' => JText::_('ZO2_YES'),
                'class' => 'btn-success'
            )
        );

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
    </div>
<div class="controls">
    <fieldset class="radio btn-group">
        <?php
        foreach($this->data['options'] as $option) {
            $active = '';
            if($this->data['value'] == $option['value'])
                $active = 'active';
            ?>
            <input name="<?php echo $this->data['name'] ?>" type="radio" value="<?php echo $option['value']?>" >
            <label class="btn <?php echo $option['class'] ?> <?php echo $active?>"><?php echo $option['label']?></label>
            <?php
        }
        ?>
    </fieldset>
</div>
</div>