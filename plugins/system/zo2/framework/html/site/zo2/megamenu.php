<?php

$framework = Zo2Framework::getInstance();
$profile = $framework->profile;
$menu = new JObject($profile->get('menu'));
$megamenu = new Zo2Megamenu('mainmenu', json_decode($menu->get('configs')), $menu);
echo $megamenu->render(true);
?>