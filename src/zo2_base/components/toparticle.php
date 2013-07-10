<?php

class zo2widget_toparticle extends Zo2Widget
{
    public $viewName = 'toparticle';

    public $article = null;

    public function run()
    {
        $db = JFactory::getDBO();
        $query = "SELECT * FROM `#__content` ORDER BY `id` DESC LIMIT 1";
        $db->setQuery($query);
        $rows = $db->loadObjectList();
        if(count($rows) > 0) $this->article = $rows[0];
    }
}