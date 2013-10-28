<?php
/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      Duc Nguyen <ducntv@gmail.com>
 * @author      Hiepvu <vqhiep2010@gmail.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */
defined('_JEXEC') or die ('Restricted access');

/**
 * Class Zo2Component_header_logo
 *
 * This class will prepend the logo, sitename, slogan to the header_logo position
 */
class Zo2Component_footer_copyright extends Zo2Component {
    public $position = Zo2Component::RENDER_AFTER;

    public function render()
    {
        $zo2 = Zo2Framework::getInstance();
        $logo = $zo2->getParams('footer_logo');
        $copyright = $zo2->getParams('footer_copyright');
        $gototop = $zo2->getParams('footer_gototop');

        $html = '<footer>';
        $html .= '<section class="copyright" style="text-align:center">' . $copyright . '</section>';
        if ($logo == 1) {
            $html .= '<a title="Powered by Zo2Framework" class="footer_zo2_logo" href="http://zo2framework.org" style="display:block;clear:both;margin:auto;text-align: center">';
            $html .= '<img src="' . JUri::root(true) . '/plugins/system/zo2/assets/images/zo2logo.png" />';
            $html .= '</a>';
        }
        if ($gototop) {
            $html .= '<a href="#" id="gototop" title="Go to top"><i class="icon-chevron-sign-up"></i></a>';

            $style = '#gototop{display:block;position:fixed;width:20px;height:20px;right:40px;bottom:40px;font-size:30px;text-decoration:none}';

            $script = 'jQuery("#gototop").click(function(){jQuery("body, html").animate({scrollTop: 0}); return false;});';

            $zo2->getLayout()->insertCssDeclaration($style)->insertJsDeclaration($script);
        }
        $html .= '</footer>';

        return $html;
    }
}