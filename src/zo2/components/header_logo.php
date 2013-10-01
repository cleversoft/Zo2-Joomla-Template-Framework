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
class Zo2Component_header_logo extends Zo2Component {
    public $position = Zo2Component::RENDER_BEFORE;

    public function render()
    {
        $zo2 = Zo2Framework::getInstance();

        $logo = $zo2->getParams('header_logo');
        $logoRetina = $zo2->getParams('header_retina_logo');
        $sitename = $zo2->getParams('site_name');
        $slogan = $zo2->getParams('site_slogan');

        if (!empty($logo) && !empty($logoRetina)) {
            $customStyle = '.logo_retina { display: none; }
                @media only screen and (-webkit-min-device-pixel-ratio: 2) {
                    .logo_normal { display: none; }
                    .logo_retina { display: block; }
                }';

            // still having bug with this
            //$zo2->getLayout()->insertCssDeclaration($customStyle);
            $zo2->getLayout()->insertCssDeclaration($customStyle);

            $html = '<header id="header_logo"><h1><a href="/" title="' . (!empty($sitename) ? $sitename : '') . '">';
            $html .= '<img class="logo_normal" src="' . $logo . '" />';
            $html .= '<img class="logo_retina" src="' . $logoRetina . '" />';
            $html .= '</a></h1>';
            $html .= !empty($slogan) ? '<h2>' . $slogan . '</h2>' : '';
            $html .= '</header>';

            return $html;
        }
        else if (!empty($logo) && empty($logoRetina)) {
            $html = '<header id="header_logo"><h1><a href="/" title="' . (!empty($sitename) ? $sitename : '') . '">';
            $html .= '<img class="logo_normal" src="' . $logo . '" />';
            $html .= '</a></h1>';
            $html .= !empty($slogan) ? '<h2>' . $slogan . '</h2>' : '';
            $html .= '</header>';

            return $html;
        }
        else return '';
    }
}