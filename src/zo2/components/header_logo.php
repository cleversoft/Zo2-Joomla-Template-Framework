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
            $logo = json_decode($logo, true);
            $logoRetina = json_decode($logoRetina, true);
            $customStyle = '.logo_retina { display: none; }
                .logo_normal {display:block}
                @media only screen and (-webkit-min-device-pixel-ratio: 2) {
                    .logo_normal { display: none; }
                    .logo_retina { display: block; }
                }';

            // still having bug with this
            //$zo2->getLayout()->insertCssDeclaration($customStyle);
            $zo2->getLayout()->insertCssDeclaration($customStyle);

            $html = '<header id="header_logo">';
            if ($logo['type'] == 'text') {
                $html .= htmlspecialchars($logo['text']);
            }
            else {
                if ($logo['type'] == 'image' && !empty($logo['path'])) {
                    $html .= '<a style="width: ' . $logo['width'] . 'px; height: ' . $logo['height'] . 'px;background-image: url(' . JUri::root(true) . '/' . $logo['path'] . ')" class="logo_normal" href="' . JUri::root(true) . '" title="' . (!empty($sitename) ? $sitename : '') . '"></a>';
                }
                if ($logoRetina['type'] == 'image' && !empty($logoRetina['path'])) {
                    $html .= '<a style="width: ' . $logoRetina['width'] . 'px; height: ' . $logoRetina['height'] . 'px" class="logo_retina" href="' . JUri::root(true) . '/' . '" title="' . (!empty($sitename) ? $sitename : '') . '"></a>';
                }
            }
            $html .= !empty($slogan) ? '<h2 class="header_slogan">' . $slogan . '</h2>' : '';
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