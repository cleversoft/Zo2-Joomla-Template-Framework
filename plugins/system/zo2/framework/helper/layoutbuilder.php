<?php

/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 * 
 * @since       2.0.0
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');

/**
 * Class exists checking
 */
if (!class_exists('Zo2HelperLayoutbuilder'))
{

    class Zo2HelperLayoutbuilder
    {

        public static function getZo2Statements()
        {
            $dir = Zo2Path::getInstance()->getPath('Zo2://html/site/jdoc');
            $files = JFolder::files($dir);
            $list = array();
            foreach ($files as $file)
            {
                $name = JFile::stripExt(basename($file));
                $list[$name] = 'ZO2_ADMIN_LAYOUTBUILDER_SETTINGS_JDOC_' . strtoupper($name);
            }
            return $list;
        }

        public static function getModuleStyles()
        {
            $array = array(
                'none', 'html5', 'table', 'horz', 'xhtml', 'rounded', 'outline', 'zo2', 'offcanvas'
            );
            return $array;
        }

        public static function getOffsets()
        {
            return array(
                'none' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                'auto' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '1' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '2' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '3' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '4' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '5' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '6' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '7' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '8' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '9' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '10' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '11' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
                '12' => 'ZO2_ADMIN_LAYOUTBUILDER_OFFSET_LABEL',
            );
        }

        public static function getHtmlPositions($selectedPosition = '')
        {
            JHtml::_('formbehavior.chosen', 'select');
            require_once JPATH_ADMINISTRATOR . '/components/com_templates/helpers/templates.php';
            require_once JPATH_ADMINISTRATOR . '/components/com_modules/' . '/helpers/modules.php';
            JHtml::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_modules/' . '/helpers/html');

            $clientId = 0;
            $state = 1;

            $positions = JHtml::_('modules.positions', $clientId, $state, $selectedPosition);


// Add custom position to options
            $customGroupText = JText::_('COM_MODULES_CUSTOM_POSITION');

// Build field
            $attr = array(
                'id' => 'zo2-setting-position',
                'list.select' => $selectedPosition,
                'list.attr' => 'class="chzn-custom-value" '
                . 'data-custom_group_text="' . $customGroupText . '" '
                . 'data-no_results_text="' . JText::_('COM_MODULES_ADD_CUSTOM_POSITION') . '" '
                . 'data-placeholder="' . JText::_('COM_MODULES_TYPE_OR_SELECT_POSITION') . '" '
                . 'aria-invalid="false"'
            );

            return JHtml::_('select.groupedlist', $positions, '', $attr);
        }

    }

}