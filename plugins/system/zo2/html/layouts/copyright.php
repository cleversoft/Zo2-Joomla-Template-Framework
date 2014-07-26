<?php

$assets = Zo2Assets::getInstance();
$logo = Zo2Factory::get('footer_logo');
$copyright = Zo2Factory::get('footer_copyright');
$gototop = Zo2Factory::get('footer_gototop');

$html = '<footer>';
$html .= '<section class="copyright" style="text-align:center">' . $copyright . '</section>';
if ($logo == 1) {
    $html .= '<a title="Powered by Zo2Framework" class="footer_zo2_logo" href="http://zo2framework.org" style="display:block;">';
    $html .= '<img src="' . JUri::root(true) . '/plugins/system/zo2/assets/images/zo2logo.png" />';
    $html .= '</a>';
}
if ($gototop) {
    $html .= '<a href="#" id="gototop" title="Go to top"><i class="icon-chevron-up"></i></a>';

    $script = 'jQuery("#gototop").click(function(){jQuery("body, html").animate({scrollTop: 0}); return false;});';

    $assets->addScriptDeclaration($script);
}
$html .= '</footer>';
echo $html;
?>
