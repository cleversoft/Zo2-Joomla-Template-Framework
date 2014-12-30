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
if (isset($this->data['editor'])) {
    $default = array(
        'params' => array(
            'smilies' => '0',
            'style' => '1',
            'layer' => '0',
            'table' => '0',
            'clear_entities' => '0'
        ),
        'width' => 100,
        'height' => 100,
        'col' => 10,
        'row' => 10,
        'buttons' => false,
        'id' => null,
        'asset' => null,
        'author' => null
    );
    $editor = JFactory::getEditor();
    $this->data['editor'] = array_merge_recursive($default, $this->data['editor']);
    $html = $editor->display(
            $this->data['name'], $this->data['value'], $this->data['editor']['width'], $this->data['editor']['height'], $this->data['editor']['row'], $this->data['editor']['col'], $this->data['editor']['buttons'], $this->data['editor']['id'], $this->data['editor']['asset'], $this->data['editor']['author'], $this->data['editor']['params']);
}
?>
<div class="control-group">
    <div class="control-label">
        <label class="zo2-label <?php echo (isset($this->label['class'])) ? $this->label['class'] : ''; ?>" for="<?php echo $this->data['name']; ?>">
            <?php echo $this->label['label']; ?>
        </label>
        <div class="label-desc"><?php echo $this->label['description']; ?></div>
    </div>
    <div class="controls">
        <?php if (isset($this->data['editor'])) : ?>
            <?php echo $html; ?>
        <?php else: ?>
            <textarea         
                id="<?php echo $this->data['name']; ?>"        
                <?php foreach ($this->data as $key => $value) : ?>
                    <?php if (!empty($value) && $key != 'value') : ?>
                        <?php echo $key . '="' . $value . '"'; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
                ><?php echo $this->data['value']; ?>
            </textarea>
        <?php endif; ?>
    </div>
</div>