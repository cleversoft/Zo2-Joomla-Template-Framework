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
if (Zo2Factory::isZo2Template()) {
?>

<?php foreach ($this->form->getFieldset('basic') as $field) : ?>
    <div class="control-group">
        <div class="control-label">
            <?php echo $field->label; ?>
        </div>
        <div class="controls">
            <?php echo $field->input; ?>
        </div>
    </div>
<?php endforeach;

}
else
{
    // Load chosen.css
    JHtml::_('formbehavior.chosen', 'select');

    ?>
    <?php
    echo JHtml::_('bootstrap.startAccordion', 'templatestyleOptions', array('active' => 'collapse0'));
    $fieldSets = $this->form->getFieldsets('params');
    $i = 0;

    foreach ($fieldSets as $name => $fieldSet) :
        $label = !empty($fieldSet->label) ? $fieldSet->label : 'COM_TEMPLATES_'.$name.'_FIELDSET_LABEL';
        echo JHtml::_('bootstrap.addSlide', 'templatestyleOptions', JText::_($label), 'collapse' . $i++);
        if (isset($fieldSet->description) && trim($fieldSet->description)) :
            echo '<p class="tip">'.$this->escape(JText::_($fieldSet->description)).'</p>';
        endif;
        ?>
        <?php foreach ($this->form->getFieldset($name) as $field) : ?>
        <div class="control-group">
            <div class="control-label">
                <?php echo $field->label; ?>
            </div>
            <div class="controls">
                <?php echo $field->input; ?>
            </div>
        </div>
    <?php endforeach;
        echo JHtml::_('bootstrap.endSlide');
    endforeach;
    echo JHtml::_('bootstrap.endAccordion');
}