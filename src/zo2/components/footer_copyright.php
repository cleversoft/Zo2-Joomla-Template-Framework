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
        $html .= '<a href="http://zo2framework.org" style="display:block;float:left;margin-right: 20px">';
        $html .= '<img src="' . $logo . '" />';
        $html .= '</a>';
        $html .= '<section style="float:left">' . $copyright . '</section>';
        if ($gototop) {
            $html .= '<a href="#" id="gototop" title="Go to top"><i class="icon-chevron-sign-up" /></a>';

            $style = '#gototop{display:block;position:fixed;width:20px;height:20px;right:40px;bottom:40px;font-size:30px;text-decoration:none}';

            $script = 'jQuery("#gototop").click(function(){jQuery("body").animate({scrollTop: 0}); return false;});';

            $zo2->getLayout()->insertCssDeclaration($style)->insertJsDeclaration($script);
        }
        $html .= '</footer>';

        return $html;
    }
}