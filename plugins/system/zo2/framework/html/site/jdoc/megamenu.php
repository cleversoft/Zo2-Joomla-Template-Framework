<?php

$framework = Zo2Framework::getInstance();
$profile = Zo2Framework::getApp()->profile;
$menu = new JObject($profile->get('menu'));
$model = new Zo2ModelSiteMegamenu();
echo $model->render('mainmenu', json_decode($menu->get('configs')), $menu);
