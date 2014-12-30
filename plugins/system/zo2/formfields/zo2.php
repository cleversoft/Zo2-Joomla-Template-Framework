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
//no direct accees
defined('JPATH_BASE') or die;

/**
 * Class exists checking
 */
if (!class_exists('JFormFieldZo2'))
{
    jimport('joomla.form.formfield');

    /**
     * Zo2 backend entrypoint field
     * @since 1.4.3
     * @link http://docs.joomla.org/Creating_a_custom_form_field_type
     */
    class JFormFieldZo2 extends JFormField
    {

        protected $type = 'Zo2';

        public function getLabel()
        {
            return '';
        }

        /**
         * Get the html for input
         *
         * @return string
         */
        public function getInput()
        {
            if (!defined('ZO2_LOADED'))
            {
                return 'Please enable Zo2 Framework plugin';
            } else
            {
                $html = Zo2Html::_('admin', $this->element['layout']);
                $html = '<div id="zo2-framework" class="zo2-framwork">' . $html . '</div>';
                return $html;
            }
        }

    }

}
