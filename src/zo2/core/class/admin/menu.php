<?php
/**
 * Zo2 Framework (http://zo2framework.org)
 *
 * @link         http://github.com/aploss/zo2
 * @package      Zo2
 * @author       Hiepvu
 * @copyright    Copyright ( c ) 2008 - 2013 APL Solutions
 * @license      http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */
 //no direct accees
defined ('_JEXEC') or die ('resticted aceess');

class AdminMenu {
    public static function display () {
        Zo2Framework::import2('core.menu');

        $app = JFactory::getApplication('site');

        $input = JFactory::getApplication()->input;
        $menutype = $input->get ('menutype', 'mainmenu');
//        $tplparams = $input->get('tplparams', '', 'raw');
//        $currentconfig = $tplparams instanceof JRegistry ? json_decode($tplparams->get('mm_config', ''), true) : null;



//        $currentconfig = json_decode($params->get('mm_config', ''), true);
//        $mmconfig = ($currentconfig && isset($currentconfig[$menutype])) ? $currentconfig[$menutype] : array();
//        $mmconfig['edit'] = true;
//
//        $menu = new ZO2MegaMenu ($menutype, $mmconfig, $params);
//        $buffer = $menu->renderMenu();
        Zo2Framework::displayMegaMenu($menutype, 'zo2_base');

    }

    public static function save () {

    }
}
