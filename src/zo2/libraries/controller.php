<?php
/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */
 //no direct accees
defined ('_JEXEC') or die ('resticted aceess');

class Zo2Controller
{
    public static function exec ($controller) {
        if (method_exists('Zo2Controller', $controller)) {
            Zo2Controller::$controller();
        }
        exit;
    }
    public static function menu() {
        $task = JFactory::getApplication()->input->get('task', '');
        Zo2Framework::import2('core.classes.admin.menu');
        if(method_exists('AdminMenu', $task)){
            echo AdminMenu::$task();
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

    public static function saveLayout()
    {
        if($_POST && isset($_POST['name']) && isset($_POST['data']) && isset($_POST['template'])) {
            $templatePath = JPATH_SITE . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $_POST['template'] . DIRECTORY_SEPARATOR .
                'layouts' . DIRECTORY_SEPARATOR . $_POST['name'] . '.json';

            file_put_contents($templatePath, $_POST['data']);
        }
    }

    public static function getLayout()
    {
        if(isset($_GET['layout']) && $_GET['template']) {
            $layout = new Zo2Layout($_GET['template'], $_GET['layout']);
            echo $layout->getLayoutJson(true, true);
        }
    }

    public static function getComponents()
    {
        if($_GET['template']) {
            header('Content-Type: application/json');
            echo Zo2Framework::getComponents($_GET['template']);
        }
    }

    public static function getLayouts()
    {
        if ($_GET['template']) {
            header('Content-Type: application/json');
            echo Zo2Framework::getTemplateLayoutsName($_GET['template']);
        }
    }
}