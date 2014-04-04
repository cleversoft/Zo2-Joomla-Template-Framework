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

defined('_JEXEC') or die('Restricted access');

/**
 * Class exists checking
 */
if (!class_exists('Zo2StyleSwitcher')) {

    class Zo2StyleSwitcher {

        public function styleSwitcher() {
            ?>
            <div class="style-switcher" id="style-switcher" style="left: -230px;">
                <h4>Style Switcher<span class="style-switcher-icon glyphicon glyphicon-cog fa-spin"></span></h4>
                <input type="hidden" id="ss_position" value="hide" >
                <div class="switch-container">
                    <h5>Layout options</h5>
                    <ul class="options layout-select">
                        <li class="boxed-layout" id="boxed-layout"><a class="boxed" href="#"><img src="<?php echo JUri::root()?>/plugins/system/zo2/assets/zo2/images/page-bordered.png" alt="Boxed Layout"></a></li>
                        <li class="fullwidth-layout" id="fullwidth-layout"><a class="fullwidth" href="#"><img src="<?php echo JUri::root()?>/plugins/system/zo2/assets/zo2/images/page-fullwidth.png" alt="Full Width Layout"></a></li>
                    </ul>

                    <h5>Color Examples</h5>
                    <ul class="options color-select">
                        <li class=""><a href="#" data-color="0" style="background-color: #ffffff;"></a></li>
                        <li><a href="#" data-color="1" style="background-color: #000000;"></a></li>
                        <li><a href="#" data-color="2" style="background-color: #3288c7;"></a></li>
                        <li><a href="#" data-color="3" style="background-color: #d35400;"></a></li>
                    </ul>
                </div>
            </div>
        <?php
        }
    }
}