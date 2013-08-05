<?php

class zo2com_toparticle extends Zo2Component
{
    public $viewName = 'toparticle';

    public $articles = null;

    public function run()
    {
        $db = JFactory::getDBO();
        $limit = $this->attributes['limit'];
        $query = "SELECT * FROM `#__content` ORDER BY `id` DESC LIMIT " . ($limit ? $limit : 1);
        $db->setQuery($query);
        $this->articles = $db->loadAssocList();
    }
}