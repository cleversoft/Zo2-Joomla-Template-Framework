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

/**
 *
 */
class Zo2HelperGoogleFonts
{
    private static $_fonts = null;

    protected static function isPopulated()
    {
        try {
            $query = "SELECT COUNT(id) FROM #__googlefonts";
            $db = JFactory::getDBO();
            $db->setQuery($query);
            $result = $db->loadResult();
            return $result;
        }
        catch(Exception $e){}
        return false;
    }

    protected static function createTable()
    {
        $query = "CREATE TABLE IF NOT EXISTS `#__googlefonts` (
            `id` int NOT NULL AUTO_INCREMENT,
            `family` varchar(255) NOT NULL,
            `variants` text,
            `subsets` text,
            `files` text,
            PRIMARY KEY (`id`, `family`)
        );";
        $db = JFactory::getDbo();
        $db->setQuery($query);
        $db->execute();
    }

    protected static function populateTable()
    {

    }

    public static function checkDatabaseReady()
    {
        $populated = self::isPopulated();
        if ($populated === false) self::createTable();
        if (!self::isPopulated())
        {
            self::populateTable();
        }
        return true;
    }

    public static function loadGoogleFontsJson()
    {
        if (self::$_fonts) return self::$_fonts;
        $fileName = 'googlefonts.json';
        $filePath = ZO2PATH_ROOT . DIRECTORY_SEPARATOR . $fileName;
        if (file_exists($filePath)) {
            $content = file_get_contents($filePath);
            self::$_fonts = json_decode($content, true);
            return self::$_fonts;
        }
        else return null;
    }

    public static function search($query)
    {
        $fonts = self::loadGoogleFontsJson();
        $pattern = '/' . $query . '/i';
        $result = array();
        for ($i = 0, $total = count($fonts); $i < $total; $i++) {
            if (preg_match($pattern, $fonts[$i]['family']) > 0) $result[] = $fonts[$i]['family'];
        }
        return $result;
    }
}
