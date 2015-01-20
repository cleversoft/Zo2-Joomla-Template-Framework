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
//Script for Sticky menu
if (Zo2Framework::getParam('enable_sticky_menu', 1) == 1)
{
    ?>
    jQuery(document).ready(function() {
    jQuery(".zo2-sticky").sticky({topSpacing:0});
    });
    <?php
}

//Google analytics code
$ga_code = Zo2Framework::getParam('tracking_code', null);
if (!empty($ga_code))
{
    // Remove dummies code
    $ga_code = str_replace('<script>', '', $ga_code);
    $ga_code = str_replace('</script>', '', $ga_code);
    echo $ga_code;
}