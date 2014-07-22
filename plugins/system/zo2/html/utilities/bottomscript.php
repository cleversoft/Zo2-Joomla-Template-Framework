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


//Script for Sticky menu
if(Zo2Framework::get('enable_sticky_menu', 1) == 1) {
    ?>
        jQuery(document).ready(function() {
            jQuery(".zo2-sticky").sticky({topSpacing:0});
        });
    <?php
}

//Google analytics code
$ga_code = Zo2Framework::get('ga_code', null);
if(!empty($ga_code)) {
    echo $ga_code;
}