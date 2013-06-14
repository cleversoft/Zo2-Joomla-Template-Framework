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

class ZO2Controller
{
    public static function exec ($controller) {
        if (method_exists('ZO2Controller', $controller)) {
            ZO2Controller::$controller();
        }
        exit;
    }
    public static function menu() {
        $task = JFactory::getApplication()->input->get('task', '');
        Zo2Framework::import2('core.class.admin.menu');
        if(method_exists('AdminMenu', $task)){
            AdminMenu::$task();
            exit;
        }
    }

    public static function module () {

        $input = JFactory::getApplication()->input;
        $module_id = $input->getInt ('module_id');
        $module = null;
        if ($module_id) {

            $db = JFactory::getDbo();
            $query = $db->getQuery(true);
            $query->select('m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params');
            $query->from('#__modules AS m');
            $query->where('m.id = '.$module_id);
            $query->where('m.published = 1');
            $db->setQuery($query);
            $module = $db->loadObject ();
        }

        if (!empty ($module)) {
            $style = $input->getCmd ('style', 'ZO2Xhtml');
            echo JModuleHelper::renderModule($module, array('style'=>$style));
        }

    }
}