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
defined('_JEXEC') or die('resticted aceess');

class Zo2Controller
{

    public static function exec($controller)
    {
        if (method_exists('Zo2Controller', $controller))
        {
            Zo2Controller::$controller();
        }
        exit;
    }

    public static function menu()
    {
        $task = JFactory::getApplication()->input->get('task', '');
        Zo2Factory::import('core.classes.admin.menu');
        if (method_exists('AdminMenu', $task))
        {
            echo AdminMenu::$task();
            exit;
        }
    }

    public static function saveLayout()
    {
        if ($_POST && isset($_POST['name']) && isset($_POST['data']) && isset($_POST['template']))
        {
            $templatePath = JPATH_SITE . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $_POST['template'] . DIRECTORY_SEPARATOR .
                    'layouts' . DIRECTORY_SEPARATOR . $_POST['name'] . '.json';

            file_put_contents($templatePath, $_POST['data']);
        }
    }

    /**
     * 
     */
    public static function getLayout()
    {
        if (isset($_GET['layout']) && $_GET['template'])
        {
            $layout = Zo2Factory::getFramework()->getLayout($_GET['template']);
            echo $layout->getLayoutJson(true, true);
        }
    }

    public static function getComponents()
    {
        if ($_GET['template'])
        {
            header('Content-Type: application/json');
            echo Zo2Factory::getFramework()->getComponents($_GET['template']);
        }
    }

    public static function getFonts()
    {
        header('Content-Type: application/json');
        if (isset($_GET['query']))
        {
            echo json_encode(Zo2HelperGoogleFonts::search($_GET['query']));
        }
    }

}
