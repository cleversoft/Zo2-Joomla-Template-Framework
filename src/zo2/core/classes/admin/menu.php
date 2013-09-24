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
defined('_JEXEC') or die ('resticted aceess');

class AdminMenu
{

    public static function display()
    {

        Zo2Framework::import2('core.Zo2Megamenu');
        $input = JFactory::getApplication()->input;
        $menutype = $input->get('menutype', 'mainmenu');
        $template = Zo2Framework::getTemplate()->template;
        return Zo2Framework::displayMegaMenu($menutype, $template, true);

    }

    public static function save()
    {

    }
}
