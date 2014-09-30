<?php
/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @version     1.4.3
 * @since       1.4.3
 * @uses        For Joomla! 3.x
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');
?>
<!-- Move these css to admin.css than call it -->
<style>
    #attrib-zo2 .controls {
        margin-left: 0px;
    }
    #attrib-zo2 .controls .container{
        margin-left: 0px;
    }
</style>
<!-- include css & bootrap Joomla! here -->
<div class="container-fluid container-main">
<section id="content">
<!-- Begin Content -->

<div class="row-fluid">
<div class="span12">

<div id="system-message-container">
</div>
<div id="zo2messages"></div>
<div id="zo2framework" class="joomla-3">
<form id="adminForm" action="/hallo142/administrator/index.php?option=com_templates&amp;layout=edit&amp;id=11" method="post" name="adminForm" class="form-validate form-horizontal" data-zo2ajax="{&quot;on&quot;:&quot;submit&quot;}">
<fieldset id="zo2fields" class="">
<!-- tabs header -->
<ul class="nav nav-tabs main-navigator" id="main-navigator">
    <!-- Default active tab -->
    <li class="active">
        <a href="#overview" data-toggle="tab"><i class="icon-info fa-lg"></i> Overview</a>
    </li>
    <li class="">
        <a href="#general" data-toggle="tab"><i class="icon-cog fa-lg"></i> General</a>
    </li>
    <li class="">
        <a href="#fonts" data-toggle="tab"><i class="icon-font fa-lg"></i> Fonts</a>
    </li>
    <li class="">
        <a href="#theme" data-toggle="tab"><i class="icon-columns fa-lg"></i> Layout Profiles</a>
    </li>
    <li class="">
        <a href="#megamenu" data-toggle="tab"><i class="fa fa-navicon fa-lg"></i> Mega Menus</a>
    </li>
    <li class="">
        <a href="#assignment" data-toggle="tab"><i class="icon-edit-sign fa-lg"></i>Template Assignment</a>
    </li>
    <li class="">
        <a href="#advanced" data-toggle="tab"><i class="icon-wrench fa-lg"></i> Advanced</a>
    </li>
</ul>
<!-- /tabs header -->
<!-- tabs content -->
<div class="tab-content main-navigator">
<a href="http://zo2framework.org" target="_blank" id="logo" title="Zo2 Framework"></a>
<div class="tab-pane active" id="overview">
    <div class="profiles-pane">
        <h3 class="title-profile">Overview</h3>
        <div class="profiles-pane-inner">
            <div class="overview-details">
                <div class="row-fluid">
                    <div class="span4">
                        <div class="control-group">
                            <div class="control-label">
                                <label id="jform_title-lbl" for="jform_title" class="hasTooltip required" title="" data-original-title="<strong>Style Name</strong>">Style Name<span class="star">&nbsp;*</span></label>                </div>
                            <div class="controls">
                                <input type="text" name="jform[title]" id="jform_title" value="Zo2_hallo - Default" class="input-xxlarge input-large-text" size="50" required="" aria-required="true">                </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="control-group">
                            <div class="control-label">
                                <label id="jform_template-lbl" for="jform_template" class="hasTooltip" title="" data-original-title="<strong>Template</strong><br />Template Name">Template</label>                </div>
                            <div class="controls">
                                <input type="text" name="jform[template]" id="jform_template" value="zo2_hallo" class="readonly" size="30" readonly="">                </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="control-group">
                            <div class="control-label">
                                <label id="jform_home-lbl" for="jform_home" class="hasTooltip" title="" data-original-title="<strong>Default</strong><br />If the multilingual functionality is not implemented, please limit your choice between <b>No</b> and <b>All</b>. The template style will be defined or not as global default template style.<br />If the <b>System - Language Filter</b> plugin is enabled, and you use different template styles depending on your content languages, please assign a language to this style.">Default</label>                </div>
                            <div class="controls">
                                <select id="jform_home" name="" disabled="disabled">
                                    <option value="0" disabled="disabled">No</option>
                                    <option value="1" selected="selected">All</option>
                                    <option value="ar-AA">Arabic Unitag (العربية الموحدة)</option>
                                    <option value="en-GB">English (UK)</option>
                                </select>
                                <input type="hidden" name="jform[home]" value="1">                </div>
                        </div>
                    </div>

                    <div class="span1">
                        <div class="control-group">
                            <div class="control-label">
                            </div>
                            <div class="controls">
                                <input type="hidden" name="jform[client_id]" id="jform_client_id" value="0" class="readonly">                </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="template-preview">
                <div class="row-fluid">
                    <div class="span4">
                        <div class="template-description">
                            <h3 class="title-profile dark-bg">Zo2_hallo 1.4.2</h3>


                            <img src="http://www.zootemplate.com/wp-content/uploads/2013/12/zt_hallo_responsive-1024x437.png" style="max-width:323px;">
                            <p>The Zo2 Hallo is a clean modern responsive design that is a great place to start when building your custom Zo2 powered template.</p>
                            <h3 class="title-profile dark-bg">What is the Zo2 Framework?</h3>
                            <p>Zo2 Framework is a free, open-source, highly extensible, search-engine optimized Joomla Templates Framework featuring responsive web design, bootstrap framework, Font Awesome Icons, styling for popular extensions, and a whole community behind it. Zo2 Framework comes with Drag &amp; drop layout builder which allows you to create any number of stunning and unique layouts up to 5x faster than traditional way.</p>


                        </div>
                    </div>
                    <div class="span4">
                        <h3 class="title-profile dark-bg">Key Features</h3>
                        <ul>
                            <li>100% Responsive &amp; Retina Ready</li>
                            <li>Drag &amp; Drop Layout Builder</li>
                            <li>Mega &amp; Off Canvas Menus</li>
                            <li>LESS Support</li>
                            <li>Tons of Short code</li>
                            <li>CSS3 animations</li>
                            <li>HTML5</li>
                            <li>Powerful Admin Panel</li>
                            <li>Search Engine Optimized</li>
                            <li>Social Sharing Integration</li>
                            <li>Cross-Browser Support</li>            </ul>
                        <h3 class="title-profile dark-bg">
                            Credit Links            </h3>
                        <ul>
                            <li>
                                <a title="Bootstrap" href="http://getbootstrap.com/">Bootstrap</a> is a front-end framework of Twitter, Inc.                </li>
                            <li><a title="FontAwesome" href="http://fontawesome.io/">FontAwesome</a> font licensed under SIL OFL 1.1.</li>
                            <li>Zo2 Hallo designed by <a href="http://www.zootemplate.com" title="zootemplate">Zootemplate.com</a></li>
                        </ul>
                    </div>
                    <div class="span4">
                        <div id="updater" class="alert">
                            <div id="updater-bar">Zo2 v<span>1.4.2</span></div>
                            <strong>Your current updated.</strong>
                        </div>
                        <div class="zo2-tip well dark-bg" style="display: block;">
                            <div class="zo2-tip-bar">
                                <h3 class="title-dark">Getting More Help</h3>
                            </div>
                            <p>Zo2 comes with an extremely advanced admin panel allowing users to quickly and easy customize the template.  If you would like to find out more about these settings and the Zo2 Framework in general please checkout these links:</p>
                            <ul>
                                <li>Official website: <a target="_blank" href="http://zo2framework.org" title="Zo2 Template Framework">http://zo2framework.org</a></li>
                                <li><a target="_blank" href="http://zo2framework.org/index.php/license-usage" title="License &amp; Usage">License &amp; Usage</a></li>
                                <li>Documents <a target="_blank" href="http://docs.zo2framework.org/" title="Zo2 Documents">http://docs.zo2framework.org/</a></li>
                                <li>Fork Zo2 on Github: <a target="_blank" href="https://github.com/aploss/zo2" title="Fork Zo2 on Github">https://github.com/aploss/zo2</a></li>
                                <li>Demo Zo2 Hallo – a Blank Template: <a target="_blank" href="http://demo.zo2framework.org/" title="Demo Zo2 Blank Template">http://demo.zo2framework.org/</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>                        </div>
    </div>
</div>
<div class="tab-pane" id="general">
    <div class="profiles-pane">
        <h3 class="title-profile">General</h3>
        <div class="profiles-pane-inner">
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_site_name-lbl" for="jform_params_site_name" class="">Site name</label>        </div>
                <div class="controls">
                    <input type="text" name="jform[params][site_name]" id="jform_params_site_name" value="Zo2 Hallo">        </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_site_slogan-lbl" for="jform_params_site_slogan" class="">Site slogan</label>        </div>
                <div class="controls">
                    <input type="text" name="jform[params][site_slogan]" id="jform_params_site_slogan" value="">        </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_enable_style_switcher-lbl" for="jform_params_enable_style_switcher" class="">Enable Style Switcher</label>        </div>
                <div class="controls">
                    <fieldset id="jform_params_enable_style_switcher" class="radio btn-group"><input type="radio" id="jform_params_enable_style_switcher0" name="jform[params][enable_style_switcher]" value="0" style="display: none;"><label for="jform_params_enable_style_switcher0" class="btn first">No</label><input type="radio" id="jform_params_enable_style_switcher1" name="jform[params][enable_style_switcher]" value="1" checked="checked" style="display: none;"><label for="jform_params_enable_style_switcher1" class="btn active btn-success">Yes</label></fieldset>        </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_enable_rtl-lbl" for="jform_params_enable_rtl" class="">Enable RTL</label>        </div>
                <div class="controls">
                    <fieldset id="jform_params_enable_rtl" class="radio btn-group"><input type="radio" id="jform_params_enable_rtl0" name="jform[params][enable_rtl]" value="0" style="display: none;"><label for="jform_params_enable_rtl0" class="btn first">No</label><input type="radio" id="jform_params_enable_rtl1" name="jform[params][enable_rtl]" value="1" checked="checked" style="display: none;"><label for="jform_params_enable_rtl1" class="btn active btn-success">Yes</label></fieldset>        </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_enable_custom_css-lbl" for="jform_params_enable_custom_css" class="">Enable custom css</label>        </div>
                <div class="controls">
                    <fieldset id="jform_params_enable_custom_css" class="radio btn-group"><input type="radio" id="jform_params_enable_custom_css0" name="jform[params][enable_custom_css]" value="0" style="display: none;"><label for="jform_params_enable_custom_css0" class="btn first">No</label><input type="radio" id="jform_params_enable_custom_css1" name="jform[params][enable_custom_css]" value="1" checked="checked" style="display: none;"><label for="jform_params_enable_custom_css1" class="btn active btn-success">Yes</label></fieldset>        </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_responsive_layout-lbl" for="jform_params_responsive_layout" class="hasTooltip" title="" data-original-title="<strong>Responsive Layout</strong><br />Enable or disable responsive layout">Responsive Layout</label>        </div>
                <div class="controls">
                    <fieldset id="jform_params_responsive_layout" class="radio btn-group"><input type="radio" id="jform_params_responsive_layout0" name="jform[params][responsive_layout]" value="0" style="display: none;"><label for="jform_params_responsive_layout0" class="btn first">No</label><input type="radio" id="jform_params_responsive_layout1" name="jform[params][responsive_layout]" value="1" checked="checked" style="display: none;"><label for="jform_params_responsive_layout1" class="btn active btn-success">Yes</label></fieldset>        </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_enable_sticky_menu-lbl" for="jform_params_enable_sticky_menu" class="">Enable Sticky Menu</label>        </div>
                <div class="controls">
                    <fieldset id="jform_params_enable_sticky_menu" class="radio btn-group"><input type="radio" id="jform_params_enable_sticky_menu0" name="jform[params][enable_sticky_menu]" value="0" style="display: none;"><label for="jform_params_enable_sticky_menu0" class="btn first">No</label><input type="radio" id="jform_params_enable_sticky_menu1" name="jform[params][enable_sticky_menu]" value="1" checked="checked" style="display: none;"><label for="jform_params_enable_sticky_menu1" class="btn active btn-success">Yes</label></fieldset>        </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_favicon-lbl" for="jform_params_favicon" class="">Favicon</label>        </div>
                <div class="controls">
                    <div class="input-prepend input-append">
                        <div class="media-preview add-on">
                            <span class="hasTipPreview" title=""><i class="icon-eye-open"></i></span>
                        </div>
                        <input type="text" name="jform[params][favicon]" id="jform_params_favicon" value="templates/zo2_hallo/assets/zo2/images/favicon.ico" readonly="readonly" class="input-small">
                        <a class="modal btn" title="Select" href="index.php?option=com_media&amp;view=images&amp;tmpl=component&amp;asset=com_templates&amp;author=&amp;fieldid=jform_params_favicon&amp;folder=templates/zo2_hallo/assets/zo2/images" rel="{handler: 'iframe', size: {x: 800, y: 500}}">
                            Select</a><a class="btn hasTooltip" title="" href="#" onclick="
jInsertFieldValue('', 'jform_params_favicon');
return false;
" data-original-title="Clear">
                            <i class="icon-remove"></i></a>
                    </div>        </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_header_logo-lbl" for="jform_params_header_logo" class="">Header logo</label>        </div>
                <div class="controls">
                    <div class="field-logo-container">
                        <input class="logoInput" type="hidden" id="jform_params_header_logo" name="jform[params][header_logo]" value="{&quot;type&quot;:&quot;none&quot;}">
                        <div class="radio btn-group logo-type-switcher">
                            <button class="btn logo-type-none active btn-success">None</button>
                            <button class="btn logo-type-image ">Image</button>
                            <button class="btn logo-type-text ">Text</button>
                        </div>
                        <div class="logo-image ">
                            <input type="hidden" class="basePath" value="/hallo142">
                            <input onchange="refreshLogoPreview(this)" type="hidden" id="jform_params_header_logo_path" class="logo-path" value="">
                            <div class="btn-group">
                    <span class="logo-preview">
                            </span>
                                <a href="index.php?option=com_media&amp;view=images&amp;tmpl=component&amp;asset=com_templates&amp;author=&amp;fieldid=jform_params_header_logo_path&amp;folder=" class="btn btn-primary btn-select-logo modal" rel="{handler: 'iframe', size: {x: 800, y: 600}}">Select</a>
                                <a href="#" class="btn btn-danger btn-remove-preview"><i class="icon-remove"></i></a>
                            </div>
                            <label>Width</label> <input type="text" class="logo-width input-mini" value="">
                            <label>Height</label> <input type="text" class="logo-height input-mini" value="">
                        </div>
                        <div class="logo-text ">
                            <label>Text</label> <input type="text" class="logo-text-input" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_header_retina_logo-lbl" for="jform_params_header_retina_logo" class="">Header Retina logo</label>        </div>
                <div class="controls">
                    <div class="field-logo-container">
                        <input class="logoInput" type="hidden" id="jform_params_header_retina_logo" name="jform[params][header_retina_logo]" value="{&quot;type&quot;:&quot;image&quot;,&quot;path&quot;:&quot;images/logo-retina.png&quot;,&quot;width&quot;:424,&quot;height&quot;:40}">
                        <div class="radio btn-group logo-type-switcher">
                            <button class="btn logo-type-none ">None</button>
                            <button class="btn logo-type-image active btn-success">Image</button>
                            <button class="btn logo-type-text ">Text</button>
                        </div>
                        <div class="logo-image show">
                            <input type="hidden" class="basePath" value="/hallo142">
                            <input onchange="refreshLogoPreview(this)" type="hidden" id="jform_params_header_retina_logo_path" class="logo-path" value="images/logo-retina.png">
                            <div class="btn-group">
                    <span class="logo-preview">
                                    <img src="/hallo142/images/logo-retina.png">
                            </span>
                                <a href="index.php?option=com_media&amp;view=images&amp;tmpl=component&amp;asset=com_templates&amp;author=&amp;fieldid=jform_params_header_retina_logo_path&amp;folder=" class="btn btn-primary btn-select-logo modal" rel="{handler: 'iframe', size: {x: 800, y: 600}}">Select</a>
                                <a href="#" class="btn btn-danger btn-remove-preview"><i class="icon-remove"></i></a>
                            </div>
                            <label>Width</label> <input type="text" class="logo-width input-mini" value="424">
                            <label>Height</label> <input type="text" class="logo-height input-mini" value="40">
                        </div>
                        <div class="logo-text ">
                            <label>Text</label> <input type="text" class="logo-text-input" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_footer_copyright-lbl" for="jform_params_footer_copyright" class="">Copyright</label>        </div>
                <div class="controls">
                    <textarea name="jform[params][footer_copyright]" id="jform_params_footer_copyright">Copyright © 2008 - 2014 &lt;a href="http://www.zootemplate.com/" title="joomla templates"&gt;Joomla Templates&lt;/a&gt; by ZooTemplate.Com. All rights reserved.</textarea>        </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_footer_logo-lbl" for="jform_params_footer_logo" class="hasTooltip" title="" data-original-title="<strong>Show footer logo</strong><br />Show Zo2 Framework footer logo">Show footer logo</label>        </div>
                <div class="controls">
                    <fieldset id="jform_params_footer_logo" class="radio btn-group"><input type="radio" id="jform_params_footer_logo0" name="jform[params][footer_logo]" value="0" style="display: none;"><label for="jform_params_footer_logo0" class="btn first">No</label><input type="radio" id="jform_params_footer_logo1" name="jform[params][footer_logo]" value="1" checked="checked" style="display: none;"><label for="jform_params_footer_logo1" class="btn active btn-success">Yes</label></fieldset>        </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_footer_gototop-lbl" for="jform_params_footer_gototop" class="">Show "Go to top"</label>        </div>
                <div class="controls">
                    <fieldset id="jform_params_footer_gototop" class="radio btn-group"><input type="radio" id="jform_params_footer_gototop0" name="jform[params][footer_gototop]" value="0" style="display: none;"><label for="jform_params_footer_gototop0" class="btn first">No</label><input type="radio" id="jform_params_footer_gototop1" name="jform[params][footer_gototop]" value="1" checked="checked" style="display: none;"><label for="jform_params_footer_gototop1" class="btn active btn-success">Yes</label></fieldset>        </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_cache_interval-lbl" for="jform_params_cache_interval" class="">Cache Interval</label>        </div>
                <div class="controls">
                    <input type="text" name="jform[params][cache_interval]" id="jform_params_cache_interval" value="3600">        </div>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane" id="fonts">
<div class="profiles-pane">
<h3 class="title-profile">Fonts</h3>
<div id="font_chooser">
<div class="font-container">
    <input type="hidden" value="" name="jform[params][body_font]" id="jform_params_body_font">
    <h3>Body</h3>
    <div class="control-group">
        <div class="control-label">
            <div class="font-label">Enable</div>
        </div>
        <div class="controls btn-group btn-group-onoff cbEnableFont">
            <button class="btn btn-on ">On</button>
            <button class="btn btn-off active btn-danger">Off</button>
        </div>
    </div>
    <div class="font_options" style="display: none;">
        <div class="control-group">
            <div class="control-label">
                <div class="font-label">Font type</div>
                <div class="font-desc">Choose the type of font you want to use for body</div>
            </div>
            <div class="controls">
                <div class="btn-group font-types" data-toggle="buttons-radio">
                    <button type="button" class="btn btnStandardFonts active btn-success">Standard Fonts</button>
                    <button type="button" class="btn btnGoogleFonts ">Google Fonts</button>
                    <button type="button" class="btn btnFontDeck ">FontDeck</button>
                </div>
            </div>
        </div>

        <div class="font-options-standard control-group" style="display:block">
            <div class="control-label">
                <div class="font-label">Standard Font</div>
                <div class="font-desc">Choose the font face that is used for body</div>
            </div>
            <div class="controls">
                <select class="ddlStandardFont show">
                    <option value="'Helvetica Neue', Helvetica">'Helvetica Neue', Helvetica</option>
                    <option value="Arial">Arial</option>
                    <option value="Tahoma">Tahoma</option>
                    <option value="Verdana">Verdana</option>
                    <option value="'Myriad Pro'">'Myriad Pro'</option>
                </select>
            </div>
        </div>

        <div class="font-options-google hide control-group">
            <div class="control-label">
                <div class="font-label">Google Font</div>
                <div class="font-desc">Choose the type of font you want to use for body</div>
            </div>
            <div class="controls">
                <input type="text" class="txtGoogleFontSelect" value="" style="display: none;"><div class="font-select"><a><span>Select a font</span><div><b></b></div></a><div class="fs-drop" style="display: none;"><div class="fs-search"><input type="text" class="fs-searchinput"></div><ul class="fs-results" style="display: none;"><li data-value="Open Sans" style="font-family: Open Sans; font-weight: 400">Open Sans</li><li data-value="Oswald" style="font-family: Oswald; font-weight: 400">Oswald</li><li data-value="Lustria" style="font-family: Lustria; font-weight: 400">Lustria</li><li data-value="Lato" style="font-family: Lato; font-weight: 400">Lato</li><li data-value="Roboto" style="font-family: Roboto; font-weight: 400">Roboto</li><li data-value="Roboto Slab" style="font-family: Roboto Slab; font-weight: 400">Roboto Slab</li><li data-value="Yanone Kaffeesatz" style="font-family: Yanone Kaffeesatz; font-weight: 400">Yanone Kaffeesatz</li><li data-value="Arvo" style="font-family: Arvo; font-weight: 400">Arvo</li><li data-value="Ubuntu" style="font-family: Ubuntu; font-weight: 400">Ubuntu</li><li data-value="Lora" style="font-family: Lora; font-weight: 400">Lora</li><li data-value="Raleway" style="font-family: Raleway; font-weight: 400">Raleway</li><li data-value="Merriweather" style="font-family: Merriweather; font-weight: 400">Merriweather</li><li data-value="Bitter" style="font-family: Bitter; font-weight: 400">Bitter</li><li data-value="Cabin" style="font-family: Cabin; font-weight: 400">Cabin</li><li data-value="Cuprum" style="font-family: Cuprum; font-weight: 400">Cuprum</li><li data-value="Quattrocento" style="font-family: Quattrocento; font-weight: 400">Quattrocento</li><li data-value="Quattrocento Sans" style="font-family: Quattrocento Sans; font-weight: 400">Quattrocento Sans</li><li data-value="Droid Sans" style="font-family: Droid Sans; font-weight: 400">Droid Sans</li><li data-value="Vollkorn" style="font-family: Vollkorn; font-weight: 400">Vollkorn</li><li data-value="PT Mono" style="font-family: PT Mono; font-weight: 400">PT Mono</li><li data-value="Gravitas One" style="font-family: Gravitas One; font-weight: 400">Gravitas One</li></ul></div></div>
            </div>
        </div>

        <div class="font-options-fontdeck hide control-group">
            <div class="control-label">
                <div class="font-label">FontDeck Name</div>
                <div class="font-desc">Paste the font family attribute from CSS code in Step 2 of FontDeck website here</div>
            </div>
            <div class="controls">
                <textarea class="txtFontDeckCss"></textarea>
            </div>
        </div>

        <div class="control-group">
            <div class="control-label">
                <div class="font-label">Font options</div>
                <div class="font-desc">Specify the body font properties</div>
            </div>
            <div class="controls floatdiv clearfix">
                <div><input type="text" class="txtFontSize" value=""> px</div>

                <div class="colorpicker-container">
                    <input type="text" class="txtColorPicker" value="" data-colorpicker-guid="1">
                    <span class="color-preview" style="background-color: transparent"></span>
                </div>

                <div>
                    <select class="ddlFontStyle">
                        <option value="n">Normal</option>
                        <option value="b">Bold</option>
                        <option value="i">Italic</option>
                        <option value="bi">Bold Italic</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>            <div class="font-container">
    <input type="hidden" value="" name="jform[params][h1_font]" id="jform_params_h1_font">
    <h3>Headline H1</h3>
    <div class="control-group">
        <div class="control-label">
            <div class="font-label">Enable</div>
        </div>
        <div class="controls btn-group btn-group-onoff cbEnableFont">
            <button class="btn btn-on ">On</button>
            <button class="btn btn-off active btn-danger">Off</button>
        </div>
    </div>
    <div class="font_options" style="display: none;">
        <div class="control-group">
            <div class="control-label">
                <div class="font-label">Font type</div>
                <div class="font-desc">Choose the type of font you want to use for headline h1</div>
            </div>
            <div class="controls">
                <div class="btn-group font-types" data-toggle="buttons-radio">
                    <button type="button" class="btn btnStandardFonts active btn-success">Standard Fonts</button>
                    <button type="button" class="btn btnGoogleFonts ">Google Fonts</button>
                    <button type="button" class="btn btnFontDeck ">FontDeck</button>
                </div>
            </div>
        </div>

        <div class="font-options-standard control-group" style="display:block">
            <div class="control-label">
                <div class="font-label">Standard Font</div>
                <div class="font-desc">Choose the font face that is used for headline h1</div>
            </div>
            <div class="controls">
                <select class="ddlStandardFont show">
                    <option value="'Helvetica Neue', Helvetica">'Helvetica Neue', Helvetica</option>
                    <option value="Arial">Arial</option>
                    <option value="Tahoma">Tahoma</option>
                    <option value="Verdana">Verdana</option>
                    <option value="'Myriad Pro'">'Myriad Pro'</option>
                </select>
            </div>
        </div>

        <div class="font-options-google hide control-group">
            <div class="control-label">
                <div class="font-label">Google Font</div>
                <div class="font-desc">Choose the type of font you want to use for headline h1</div>
            </div>
            <div class="controls">
                <input type="text" class="txtGoogleFontSelect" value="" style="display: none;"><div class="font-select"><a><span>Select a font</span><div><b></b></div></a><div class="fs-drop" style="display: none;"><div class="fs-search"><input type="text" class="fs-searchinput"></div><ul class="fs-results" style="display: none;"><li data-value="Open Sans" style="font-family: Open Sans; font-weight: 400">Open Sans</li><li data-value="Oswald" style="font-family: Oswald; font-weight: 400">Oswald</li><li data-value="Lustria" style="font-family: Lustria; font-weight: 400">Lustria</li><li data-value="Lato" style="font-family: Lato; font-weight: 400">Lato</li><li data-value="Roboto" style="font-family: Roboto; font-weight: 400">Roboto</li><li data-value="Roboto Slab" style="font-family: Roboto Slab; font-weight: 400">Roboto Slab</li><li data-value="Yanone Kaffeesatz" style="font-family: Yanone Kaffeesatz; font-weight: 400">Yanone Kaffeesatz</li><li data-value="Arvo" style="font-family: Arvo; font-weight: 400">Arvo</li><li data-value="Ubuntu" style="font-family: Ubuntu; font-weight: 400">Ubuntu</li><li data-value="Lora" style="font-family: Lora; font-weight: 400">Lora</li><li data-value="Raleway" style="font-family: Raleway; font-weight: 400">Raleway</li><li data-value="Merriweather" style="font-family: Merriweather; font-weight: 400">Merriweather</li><li data-value="Bitter" style="font-family: Bitter; font-weight: 400">Bitter</li><li data-value="Cabin" style="font-family: Cabin; font-weight: 400">Cabin</li><li data-value="Cuprum" style="font-family: Cuprum; font-weight: 400">Cuprum</li><li data-value="Quattrocento" style="font-family: Quattrocento; font-weight: 400">Quattrocento</li><li data-value="Quattrocento Sans" style="font-family: Quattrocento Sans; font-weight: 400">Quattrocento Sans</li><li data-value="Droid Sans" style="font-family: Droid Sans; font-weight: 400">Droid Sans</li><li data-value="Vollkorn" style="font-family: Vollkorn; font-weight: 400">Vollkorn</li><li data-value="PT Mono" style="font-family: PT Mono; font-weight: 400">PT Mono</li><li data-value="Gravitas One" style="font-family: Gravitas One; font-weight: 400">Gravitas One</li></ul></div></div>
            </div>
        </div>

        <div class="font-options-fontdeck hide control-group">
            <div class="control-label">
                <div class="font-label">FontDeck Name</div>
                <div class="font-desc">Paste the font family attribute from CSS code in Step 2 of FontDeck website here</div>
            </div>
            <div class="controls">
                <textarea class="txtFontDeckCss"></textarea>
            </div>
        </div>

        <div class="control-group">
            <div class="control-label">
                <div class="font-label">Font options</div>
                <div class="font-desc">Specify the headline h1 font properties</div>
            </div>
            <div class="controls floatdiv clearfix">
                <div><input type="text" class="txtFontSize" value=""> px</div>

                <div class="colorpicker-container">
                    <input type="text" class="txtColorPicker" value="" data-colorpicker-guid="2">
                    <span class="color-preview" style="background-color: transparent"></span>
                </div>

                <div>
                    <select class="ddlFontStyle">
                        <option value="n">Normal</option>
                        <option value="b">Bold</option>
                        <option value="i">Italic</option>
                        <option value="bi">Bold Italic</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>            <div class="font-container">
    <input type="hidden" value="" name="jform[params][h2_font]" id="jform_params_h2_font">
    <h3>Headline H2</h3>
    <div class="control-group">
        <div class="control-label">
            <div class="font-label">Enable</div>
        </div>
        <div class="controls btn-group btn-group-onoff cbEnableFont">
            <button class="btn btn-on ">On</button>
            <button class="btn btn-off active btn-danger">Off</button>
        </div>
    </div>
    <div class="font_options" style="display: none;">
        <div class="control-group">
            <div class="control-label">
                <div class="font-label">Font type</div>
                <div class="font-desc">Choose the type of font you want to use for headline h2</div>
            </div>
            <div class="controls">
                <div class="btn-group font-types" data-toggle="buttons-radio">
                    <button type="button" class="btn btnStandardFonts active btn-success">Standard Fonts</button>
                    <button type="button" class="btn btnGoogleFonts ">Google Fonts</button>
                    <button type="button" class="btn btnFontDeck ">FontDeck</button>
                </div>
            </div>
        </div>

        <div class="font-options-standard control-group" style="display:block">
            <div class="control-label">
                <div class="font-label">Standard Font</div>
                <div class="font-desc">Choose the font face that is used for headline h2</div>
            </div>
            <div class="controls">
                <select class="ddlStandardFont show">
                    <option value="'Helvetica Neue', Helvetica">'Helvetica Neue', Helvetica</option>
                    <option value="Arial">Arial</option>
                    <option value="Tahoma">Tahoma</option>
                    <option value="Verdana">Verdana</option>
                    <option value="'Myriad Pro'">'Myriad Pro'</option>
                </select>
            </div>
        </div>

        <div class="font-options-google hide control-group">
            <div class="control-label">
                <div class="font-label">Google Font</div>
                <div class="font-desc">Choose the type of font you want to use for headline h2</div>
            </div>
            <div class="controls">
                <input type="text" class="txtGoogleFontSelect" value="" style="display: none;"><div class="font-select"><a><span>Select a font</span><div><b></b></div></a><div class="fs-drop" style="display: none;"><div class="fs-search"><input type="text" class="fs-searchinput"></div><ul class="fs-results" style="display: none;"><li data-value="Open Sans" style="font-family: Open Sans; font-weight: 400">Open Sans</li><li data-value="Oswald" style="font-family: Oswald; font-weight: 400">Oswald</li><li data-value="Lustria" style="font-family: Lustria; font-weight: 400">Lustria</li><li data-value="Lato" style="font-family: Lato; font-weight: 400">Lato</li><li data-value="Roboto" style="font-family: Roboto; font-weight: 400">Roboto</li><li data-value="Roboto Slab" style="font-family: Roboto Slab; font-weight: 400">Roboto Slab</li><li data-value="Yanone Kaffeesatz" style="font-family: Yanone Kaffeesatz; font-weight: 400">Yanone Kaffeesatz</li><li data-value="Arvo" style="font-family: Arvo; font-weight: 400">Arvo</li><li data-value="Ubuntu" style="font-family: Ubuntu; font-weight: 400">Ubuntu</li><li data-value="Lora" style="font-family: Lora; font-weight: 400">Lora</li><li data-value="Raleway" style="font-family: Raleway; font-weight: 400">Raleway</li><li data-value="Merriweather" style="font-family: Merriweather; font-weight: 400">Merriweather</li><li data-value="Bitter" style="font-family: Bitter; font-weight: 400">Bitter</li><li data-value="Cabin" style="font-family: Cabin; font-weight: 400">Cabin</li><li data-value="Cuprum" style="font-family: Cuprum; font-weight: 400">Cuprum</li><li data-value="Quattrocento" style="font-family: Quattrocento; font-weight: 400">Quattrocento</li><li data-value="Quattrocento Sans" style="font-family: Quattrocento Sans; font-weight: 400">Quattrocento Sans</li><li data-value="Droid Sans" style="font-family: Droid Sans; font-weight: 400">Droid Sans</li><li data-value="Vollkorn" style="font-family: Vollkorn; font-weight: 400">Vollkorn</li><li data-value="PT Mono" style="font-family: PT Mono; font-weight: 400">PT Mono</li><li data-value="Gravitas One" style="font-family: Gravitas One; font-weight: 400">Gravitas One</li></ul></div></div>
            </div>
        </div>

        <div class="font-options-fontdeck hide control-group">
            <div class="control-label">
                <div class="font-label">FontDeck Name</div>
                <div class="font-desc">Paste the font family attribute from CSS code in Step 2 of FontDeck website here</div>
            </div>
            <div class="controls">
                <textarea class="txtFontDeckCss"></textarea>
            </div>
        </div>

        <div class="control-group">
            <div class="control-label">
                <div class="font-label">Font options</div>
                <div class="font-desc">Specify the headline h2 font properties</div>
            </div>
            <div class="controls floatdiv clearfix">
                <div><input type="text" class="txtFontSize" value=""> px</div>

                <div class="colorpicker-container">
                    <input type="text" class="txtColorPicker" value="" data-colorpicker-guid="3">
                    <span class="color-preview" style="background-color: transparent"></span>
                </div>

                <div>
                    <select class="ddlFontStyle">
                        <option value="n">Normal</option>
                        <option value="b">Bold</option>
                        <option value="i">Italic</option>
                        <option value="bi">Bold Italic</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>            <div class="font-container">
    <input type="hidden" value="" name="jform[params][h3_font]" id="jform_params_h3_font">
    <h3>Headline H3</h3>
    <div class="control-group">
        <div class="control-label">
            <div class="font-label">Enable</div>
        </div>
        <div class="controls btn-group btn-group-onoff cbEnableFont">
            <button class="btn btn-on ">On</button>
            <button class="btn btn-off active btn-danger">Off</button>
        </div>
    </div>
    <div class="font_options" style="display: none;">
        <div class="control-group">
            <div class="control-label">
                <div class="font-label">Font type</div>
                <div class="font-desc">Choose the type of font you want to use for headline h3</div>
            </div>
            <div class="controls">
                <div class="btn-group font-types" data-toggle="buttons-radio">
                    <button type="button" class="btn btnStandardFonts active btn-success">Standard Fonts</button>
                    <button type="button" class="btn btnGoogleFonts ">Google Fonts</button>
                    <button type="button" class="btn btnFontDeck ">FontDeck</button>
                </div>
            </div>
        </div>

        <div class="font-options-standard control-group" style="display:block">
            <div class="control-label">
                <div class="font-label">Standard Font</div>
                <div class="font-desc">Choose the font face that is used for headline h3</div>
            </div>
            <div class="controls">
                <select class="ddlStandardFont show">
                    <option value="'Helvetica Neue', Helvetica">'Helvetica Neue', Helvetica</option>
                    <option value="Arial">Arial</option>
                    <option value="Tahoma">Tahoma</option>
                    <option value="Verdana">Verdana</option>
                    <option value="'Myriad Pro'">'Myriad Pro'</option>
                </select>
            </div>
        </div>

        <div class="font-options-google hide control-group">
            <div class="control-label">
                <div class="font-label">Google Font</div>
                <div class="font-desc">Choose the type of font you want to use for headline h3</div>
            </div>
            <div class="controls">
                <input type="text" class="txtGoogleFontSelect" value="" style="display: none;"><div class="font-select"><a><span>Select a font</span><div><b></b></div></a><div class="fs-drop" style="display: none;"><div class="fs-search"><input type="text" class="fs-searchinput"></div><ul class="fs-results" style="display: none;"><li data-value="Open Sans" style="font-family: Open Sans; font-weight: 400">Open Sans</li><li data-value="Oswald" style="font-family: Oswald; font-weight: 400">Oswald</li><li data-value="Lustria" style="font-family: Lustria; font-weight: 400">Lustria</li><li data-value="Lato" style="font-family: Lato; font-weight: 400">Lato</li><li data-value="Roboto" style="font-family: Roboto; font-weight: 400">Roboto</li><li data-value="Roboto Slab" style="font-family: Roboto Slab; font-weight: 400">Roboto Slab</li><li data-value="Yanone Kaffeesatz" style="font-family: Yanone Kaffeesatz; font-weight: 400">Yanone Kaffeesatz</li><li data-value="Arvo" style="font-family: Arvo; font-weight: 400">Arvo</li><li data-value="Ubuntu" style="font-family: Ubuntu; font-weight: 400">Ubuntu</li><li data-value="Lora" style="font-family: Lora; font-weight: 400">Lora</li><li data-value="Raleway" style="font-family: Raleway; font-weight: 400">Raleway</li><li data-value="Merriweather" style="font-family: Merriweather; font-weight: 400">Merriweather</li><li data-value="Bitter" style="font-family: Bitter; font-weight: 400">Bitter</li><li data-value="Cabin" style="font-family: Cabin; font-weight: 400">Cabin</li><li data-value="Cuprum" style="font-family: Cuprum; font-weight: 400">Cuprum</li><li data-value="Quattrocento" style="font-family: Quattrocento; font-weight: 400">Quattrocento</li><li data-value="Quattrocento Sans" style="font-family: Quattrocento Sans; font-weight: 400">Quattrocento Sans</li><li data-value="Droid Sans" style="font-family: Droid Sans; font-weight: 400">Droid Sans</li><li data-value="Vollkorn" style="font-family: Vollkorn; font-weight: 400">Vollkorn</li><li data-value="PT Mono" style="font-family: PT Mono; font-weight: 400">PT Mono</li><li data-value="Gravitas One" style="font-family: Gravitas One; font-weight: 400">Gravitas One</li></ul></div></div>
            </div>
        </div>

        <div class="font-options-fontdeck hide control-group">
            <div class="control-label">
                <div class="font-label">FontDeck Name</div>
                <div class="font-desc">Paste the font family attribute from CSS code in Step 2 of FontDeck website here</div>
            </div>
            <div class="controls">
                <textarea class="txtFontDeckCss"></textarea>
            </div>
        </div>

        <div class="control-group">
            <div class="control-label">
                <div class="font-label">Font options</div>
                <div class="font-desc">Specify the headline h3 font properties</div>
            </div>
            <div class="controls floatdiv clearfix">
                <div><input type="text" class="txtFontSize" value=""> px</div>

                <div class="colorpicker-container">
                    <input type="text" class="txtColorPicker" value="" data-colorpicker-guid="4">
                    <span class="color-preview" style="background-color: transparent"></span>
                </div>

                <div>
                    <select class="ddlFontStyle">
                        <option value="n">Normal</option>
                        <option value="b">Bold</option>
                        <option value="i">Italic</option>
                        <option value="bi">Bold Italic</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>            <div class="font-container">
    <input type="hidden" value="" name="jform[params][h4_font]" id="jform_params_h4_font">
    <h3>Headline H4</h3>
    <div class="control-group">
        <div class="control-label">
            <div class="font-label">Enable</div>
        </div>
        <div class="controls btn-group btn-group-onoff cbEnableFont">
            <button class="btn btn-on ">On</button>
            <button class="btn btn-off active btn-danger">Off</button>
        </div>
    </div>
    <div class="font_options" style="display: none;">
        <div class="control-group">
            <div class="control-label">
                <div class="font-label">Font type</div>
                <div class="font-desc">Choose the type of font you want to use for headline h4</div>
            </div>
            <div class="controls">
                <div class="btn-group font-types" data-toggle="buttons-radio">
                    <button type="button" class="btn btnStandardFonts active btn-success">Standard Fonts</button>
                    <button type="button" class="btn btnGoogleFonts ">Google Fonts</button>
                    <button type="button" class="btn btnFontDeck ">FontDeck</button>
                </div>
            </div>
        </div>

        <div class="font-options-standard control-group" style="display:block">
            <div class="control-label">
                <div class="font-label">Standard Font</div>
                <div class="font-desc">Choose the font face that is used for headline h4</div>
            </div>
            <div class="controls">
                <select class="ddlStandardFont show">
                    <option value="'Helvetica Neue', Helvetica">'Helvetica Neue', Helvetica</option>
                    <option value="Arial">Arial</option>
                    <option value="Tahoma">Tahoma</option>
                    <option value="Verdana">Verdana</option>
                    <option value="'Myriad Pro'">'Myriad Pro'</option>
                </select>
            </div>
        </div>

        <div class="font-options-google hide control-group">
            <div class="control-label">
                <div class="font-label">Google Font</div>
                <div class="font-desc">Choose the type of font you want to use for headline h4</div>
            </div>
            <div class="controls">
                <input type="text" class="txtGoogleFontSelect" value="" style="display: none;"><div class="font-select"><a><span>Select a font</span><div><b></b></div></a><div class="fs-drop" style="display: none;"><div class="fs-search"><input type="text" class="fs-searchinput"></div><ul class="fs-results" style="display: none;"><li data-value="Open Sans" style="font-family: Open Sans; font-weight: 400">Open Sans</li><li data-value="Oswald" style="font-family: Oswald; font-weight: 400">Oswald</li><li data-value="Lustria" style="font-family: Lustria; font-weight: 400">Lustria</li><li data-value="Lato" style="font-family: Lato; font-weight: 400">Lato</li><li data-value="Roboto" style="font-family: Roboto; font-weight: 400">Roboto</li><li data-value="Roboto Slab" style="font-family: Roboto Slab; font-weight: 400">Roboto Slab</li><li data-value="Yanone Kaffeesatz" style="font-family: Yanone Kaffeesatz; font-weight: 400">Yanone Kaffeesatz</li><li data-value="Arvo" style="font-family: Arvo; font-weight: 400">Arvo</li><li data-value="Ubuntu" style="font-family: Ubuntu; font-weight: 400">Ubuntu</li><li data-value="Lora" style="font-family: Lora; font-weight: 400">Lora</li><li data-value="Raleway" style="font-family: Raleway; font-weight: 400">Raleway</li><li data-value="Merriweather" style="font-family: Merriweather; font-weight: 400">Merriweather</li><li data-value="Bitter" style="font-family: Bitter; font-weight: 400">Bitter</li><li data-value="Cabin" style="font-family: Cabin; font-weight: 400">Cabin</li><li data-value="Cuprum" style="font-family: Cuprum; font-weight: 400">Cuprum</li><li data-value="Quattrocento" style="font-family: Quattrocento; font-weight: 400">Quattrocento</li><li data-value="Quattrocento Sans" style="font-family: Quattrocento Sans; font-weight: 400">Quattrocento Sans</li><li data-value="Droid Sans" style="font-family: Droid Sans; font-weight: 400">Droid Sans</li><li data-value="Vollkorn" style="font-family: Vollkorn; font-weight: 400">Vollkorn</li><li data-value="PT Mono" style="font-family: PT Mono; font-weight: 400">PT Mono</li><li data-value="Gravitas One" style="font-family: Gravitas One; font-weight: 400">Gravitas One</li></ul></div></div>
            </div>
        </div>

        <div class="font-options-fontdeck hide control-group">
            <div class="control-label">
                <div class="font-label">FontDeck Name</div>
                <div class="font-desc">Paste the font family attribute from CSS code in Step 2 of FontDeck website here</div>
            </div>
            <div class="controls">
                <textarea class="txtFontDeckCss"></textarea>
            </div>
        </div>

        <div class="control-group">
            <div class="control-label">
                <div class="font-label">Font options</div>
                <div class="font-desc">Specify the headline h4 font properties</div>
            </div>
            <div class="controls floatdiv clearfix">
                <div><input type="text" class="txtFontSize" value=""> px</div>

                <div class="colorpicker-container">
                    <input type="text" class="txtColorPicker" value="" data-colorpicker-guid="5">
                    <span class="color-preview" style="background-color: transparent"></span>
                </div>

                <div>
                    <select class="ddlFontStyle">
                        <option value="n">Normal</option>
                        <option value="b">Bold</option>
                        <option value="i">Italic</option>
                        <option value="bi">Bold Italic</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>            <div class="font-container">
    <input type="hidden" value="" name="jform[params][h5_font]" id="jform_params_h5_font">
    <h3>Headline H5</h3>
    <div class="control-group">
        <div class="control-label">
            <div class="font-label">Enable</div>
        </div>
        <div class="controls btn-group btn-group-onoff cbEnableFont">
            <button class="btn btn-on ">On</button>
            <button class="btn btn-off active btn-danger">Off</button>
        </div>
    </div>
    <div class="font_options" style="display: none;">
        <div class="control-group">
            <div class="control-label">
                <div class="font-label">Font type</div>
                <div class="font-desc">Choose the type of font you want to use for headline h5</div>
            </div>
            <div class="controls">
                <div class="btn-group font-types" data-toggle="buttons-radio">
                    <button type="button" class="btn btnStandardFonts active btn-success">Standard Fonts</button>
                    <button type="button" class="btn btnGoogleFonts ">Google Fonts</button>
                    <button type="button" class="btn btnFontDeck ">FontDeck</button>
                </div>
            </div>
        </div>

        <div class="font-options-standard control-group" style="display:block">
            <div class="control-label">
                <div class="font-label">Standard Font</div>
                <div class="font-desc">Choose the font face that is used for headline h5</div>
            </div>
            <div class="controls">
                <select class="ddlStandardFont show">
                    <option value="'Helvetica Neue', Helvetica">'Helvetica Neue', Helvetica</option>
                    <option value="Arial">Arial</option>
                    <option value="Tahoma">Tahoma</option>
                    <option value="Verdana">Verdana</option>
                    <option value="'Myriad Pro'">'Myriad Pro'</option>
                </select>
            </div>
        </div>

        <div class="font-options-google hide control-group">
            <div class="control-label">
                <div class="font-label">Google Font</div>
                <div class="font-desc">Choose the type of font you want to use for headline h5</div>
            </div>
            <div class="controls">
                <input type="text" class="txtGoogleFontSelect" value="" style="display: none;"><div class="font-select"><a><span>Select a font</span><div><b></b></div></a><div class="fs-drop" style="display: none;"><div class="fs-search"><input type="text" class="fs-searchinput"></div><ul class="fs-results" style="display: none;"><li data-value="Open Sans" style="font-family: Open Sans; font-weight: 400">Open Sans</li><li data-value="Oswald" style="font-family: Oswald; font-weight: 400">Oswald</li><li data-value="Lustria" style="font-family: Lustria; font-weight: 400">Lustria</li><li data-value="Lato" style="font-family: Lato; font-weight: 400">Lato</li><li data-value="Roboto" style="font-family: Roboto; font-weight: 400">Roboto</li><li data-value="Roboto Slab" style="font-family: Roboto Slab; font-weight: 400">Roboto Slab</li><li data-value="Yanone Kaffeesatz" style="font-family: Yanone Kaffeesatz; font-weight: 400">Yanone Kaffeesatz</li><li data-value="Arvo" style="font-family: Arvo; font-weight: 400">Arvo</li><li data-value="Ubuntu" style="font-family: Ubuntu; font-weight: 400">Ubuntu</li><li data-value="Lora" style="font-family: Lora; font-weight: 400">Lora</li><li data-value="Raleway" style="font-family: Raleway; font-weight: 400">Raleway</li><li data-value="Merriweather" style="font-family: Merriweather; font-weight: 400">Merriweather</li><li data-value="Bitter" style="font-family: Bitter; font-weight: 400">Bitter</li><li data-value="Cabin" style="font-family: Cabin; font-weight: 400">Cabin</li><li data-value="Cuprum" style="font-family: Cuprum; font-weight: 400">Cuprum</li><li data-value="Quattrocento" style="font-family: Quattrocento; font-weight: 400">Quattrocento</li><li data-value="Quattrocento Sans" style="font-family: Quattrocento Sans; font-weight: 400">Quattrocento Sans</li><li data-value="Droid Sans" style="font-family: Droid Sans; font-weight: 400">Droid Sans</li><li data-value="Vollkorn" style="font-family: Vollkorn; font-weight: 400">Vollkorn</li><li data-value="PT Mono" style="font-family: PT Mono; font-weight: 400">PT Mono</li><li data-value="Gravitas One" style="font-family: Gravitas One; font-weight: 400">Gravitas One</li></ul></div></div>
            </div>
        </div>

        <div class="font-options-fontdeck hide control-group">
            <div class="control-label">
                <div class="font-label">FontDeck Name</div>
                <div class="font-desc">Paste the font family attribute from CSS code in Step 2 of FontDeck website here</div>
            </div>
            <div class="controls">
                <textarea class="txtFontDeckCss"></textarea>
            </div>
        </div>

        <div class="control-group">
            <div class="control-label">
                <div class="font-label">Font options</div>
                <div class="font-desc">Specify the headline h5 font properties</div>
            </div>
            <div class="controls floatdiv clearfix">
                <div><input type="text" class="txtFontSize" value=""> px</div>

                <div class="colorpicker-container">
                    <input type="text" class="txtColorPicker" value="" data-colorpicker-guid="6">
                    <span class="color-preview" style="background-color: transparent"></span>
                </div>

                <div>
                    <select class="ddlFontStyle">
                        <option value="n">Normal</option>
                        <option value="b">Bold</option>
                        <option value="i">Italic</option>
                        <option value="bi">Bold Italic</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>            <div class="font-container">
    <input type="hidden" value="" name="jform[params][h6_font]" id="jform_params_h6_font">
    <h3>Headline H6</h3>
    <div class="control-group">
        <div class="control-label">
            <div class="font-label">Enable</div>
        </div>
        <div class="controls btn-group btn-group-onoff cbEnableFont">
            <button class="btn btn-on ">On</button>
            <button class="btn btn-off active btn-danger">Off</button>
        </div>
    </div>
    <div class="font_options" style="display: none;">
        <div class="control-group">
            <div class="control-label">
                <div class="font-label">Font type</div>
                <div class="font-desc">Choose the type of font you want to use for headline h6</div>
            </div>
            <div class="controls">
                <div class="btn-group font-types" data-toggle="buttons-radio">
                    <button type="button" class="btn btnStandardFonts active btn-success">Standard Fonts</button>
                    <button type="button" class="btn btnGoogleFonts ">Google Fonts</button>
                    <button type="button" class="btn btnFontDeck ">FontDeck</button>
                </div>
            </div>
        </div>

        <div class="font-options-standard control-group" style="display:block">
            <div class="control-label">
                <div class="font-label">Standard Font</div>
                <div class="font-desc">Choose the font face that is used for headline h6</div>
            </div>
            <div class="controls">
                <select class="ddlStandardFont show">
                    <option value="'Helvetica Neue', Helvetica">'Helvetica Neue', Helvetica</option>
                    <option value="Arial">Arial</option>
                    <option value="Tahoma">Tahoma</option>
                    <option value="Verdana">Verdana</option>
                    <option value="'Myriad Pro'">'Myriad Pro'</option>
                </select>
            </div>
        </div>

        <div class="font-options-google hide control-group">
            <div class="control-label">
                <div class="font-label">Google Font</div>
                <div class="font-desc">Choose the type of font you want to use for headline h6</div>
            </div>
            <div class="controls">
                <input type="text" class="txtGoogleFontSelect" value="" style="display: none;"><div class="font-select"><a><span>Select a font</span><div><b></b></div></a><div class="fs-drop" style="display: none;"><div class="fs-search"><input type="text" class="fs-searchinput"></div><ul class="fs-results" style="display: none;"><li data-value="Open Sans" style="font-family: Open Sans; font-weight: 400">Open Sans</li><li data-value="Oswald" style="font-family: Oswald; font-weight: 400">Oswald</li><li data-value="Lustria" style="font-family: Lustria; font-weight: 400">Lustria</li><li data-value="Lato" style="font-family: Lato; font-weight: 400">Lato</li><li data-value="Roboto" style="font-family: Roboto; font-weight: 400">Roboto</li><li data-value="Roboto Slab" style="font-family: Roboto Slab; font-weight: 400">Roboto Slab</li><li data-value="Yanone Kaffeesatz" style="font-family: Yanone Kaffeesatz; font-weight: 400">Yanone Kaffeesatz</li><li data-value="Arvo" style="font-family: Arvo; font-weight: 400">Arvo</li><li data-value="Ubuntu" style="font-family: Ubuntu; font-weight: 400">Ubuntu</li><li data-value="Lora" style="font-family: Lora; font-weight: 400">Lora</li><li data-value="Raleway" style="font-family: Raleway; font-weight: 400">Raleway</li><li data-value="Merriweather" style="font-family: Merriweather; font-weight: 400">Merriweather</li><li data-value="Bitter" style="font-family: Bitter; font-weight: 400">Bitter</li><li data-value="Cabin" style="font-family: Cabin; font-weight: 400">Cabin</li><li data-value="Cuprum" style="font-family: Cuprum; font-weight: 400">Cuprum</li><li data-value="Quattrocento" style="font-family: Quattrocento; font-weight: 400">Quattrocento</li><li data-value="Quattrocento Sans" style="font-family: Quattrocento Sans; font-weight: 400">Quattrocento Sans</li><li data-value="Droid Sans" style="font-family: Droid Sans; font-weight: 400">Droid Sans</li><li data-value="Vollkorn" style="font-family: Vollkorn; font-weight: 400">Vollkorn</li><li data-value="PT Mono" style="font-family: PT Mono; font-weight: 400">PT Mono</li><li data-value="Gravitas One" style="font-family: Gravitas One; font-weight: 400">Gravitas One</li></ul></div></div>
            </div>
        </div>

        <div class="font-options-fontdeck hide control-group">
            <div class="control-label">
                <div class="font-label">FontDeck Name</div>
                <div class="font-desc">Paste the font family attribute from CSS code in Step 2 of FontDeck website here</div>
            </div>
            <div class="controls">
                <textarea class="txtFontDeckCss"></textarea>
            </div>
        </div>

        <div class="control-group">
            <div class="control-label">
                <div class="font-label">Font options</div>
                <div class="font-desc">Specify the headline h6 font properties</div>
            </div>
            <div class="controls floatdiv clearfix">
                <div><input type="text" class="txtFontSize" value=""> px</div>

                <div class="colorpicker-container">
                    <input type="text" class="txtColorPicker" value="" data-colorpicker-guid="7">
                    <span class="color-preview" style="background-color: transparent"></span>
                </div>

                <div>
                    <select class="ddlFontStyle">
                        <option value="n">Normal</option>
                        <option value="b">Bold</option>
                        <option value="i">Italic</option>
                        <option value="bi">Bold Italic</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>            <div class="font-container">
    <div class="control-group font-deck-code" style="margin-top:20px">
        <div class="control-label">
            <div class="font-label"><label id="jform_params_fontdeck_code-lbl" for="jform_params_fontdeck_code" class="hasTooltip" title="" data-original-title="<strong>FontDeck code</strong><br />Paste the JS script code from Step 1 in FontDeck website">FontDeck code</label></div>
            <div class="font-desc">Paste the JS script code from Step 1 in FontDeck website</div>
        </div>
        <div class="controls">
            <textarea name="jform[params][fontdeck_code]" id="jform_params_fontdeck_code"></textarea>            </div>
    </div>
</div>
</div>                    </div>
</div>
<div class="tab-pane" id="theme">
<div class="profiles-pane">
    <h3 class="title-profile">Layouts Profiles</h3>
    <div class="profiles-pane-inner">
        <p>Store your modifications in a layout profile and assign it to different pages. The default layout will be used on pages without an assigned layout</p>
        <div class="row-fluid">
            <div class="span6">
                <div class="control-group">
                    <div class="control-label">
                        Select profile
                    </div>
                    <div class="controls">
                        <!-- Select profile -->
                        <select class="form-control zo2-select-profile" name="jform[profile-select]" data-url="/hallo142/administrator/index.php?option=com_templates&amp;view=style&amp;layout=edit&amp;id=11">
                            <option value="default" selected="">default</option>                </select>

                <span class="input-group-btn">
                    <!-- Add -->
                    <button class="btn btn-default" id="zo2-addProfile">Add</button>
                    <!-- Do not allow to rename & remove when we only have 1 profile -->
                                    </span>
                        <!-- Add new profile -->
                        <div class="zo2-form-newProfile" id="zo2-form-addProfile" style="display: none;">
                            <p>Please enter new profile name</p>
                            <input type="text" id="zo2-profile-name" name="profile-name">
                    <span class="input-group-btn">
                        <button class="btn btn-default" id="zo2-save-profile" data-url="/hallo142/administrator/index.php?option=com_templates&amp;view=style&amp;layout=edit&amp;id=11">Save</button>
                        <button class="btn btn-default" id="zo2-cancel-profile">Cancel</button>
                    </span>
                        </div>
                        <!-- Rename profile -->
                        <div class="zo2-form-newProfile" id="zo2-form-renameProfile" style="display: none;">
                            <p>Please enter layout profile name</p>
                            <input type="text" id="zo2-new-profile-name" name="new-profile-name">
                    <span class="input-group-btn">
                        <button class="btn btn-default" id="zo2-rename-profile" data-url="/hallo142/administrator/index.php?option=com_templates&amp;view=style&amp;layout=edit&amp;id=11">Save</button>
                        <button class="btn btn-default" id="zo2-cancel-rename-profile">Cancel</button>
                    </span>
                        </div>
                        <input type="hidden" name="profile-id" value="11">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="profiles-pane">
<h3 class="title-profile">Layout Builder</h3>
<div class="profiles-pane-inner">


<div id="layoutbuilder-container">
<!-- Hidden fields -->
<fieldset>
    <!-- Input field to store generate layout data -->
    <input type="text" value="[{&quot;type&quot;:&quot;row&quot;,&quot;name&quot;:&quot;Top&quot;,&quot;customClass&quot;:&quot;&quot;,&quot;id&quot;:&quot;zo2-header-top&quot;,&quot;fullwidth&quot;:false,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[{&quot;jdoc&quot;:&quot;modules&quot;,&quot;type&quot;:&quot;col&quot;,&quot;name&quot;:&quot;top-menu&quot;,&quot;position&quot;:&quot;top-menu&quot;,&quot;span&quot;:4,&quot;offset&quot;:0,&quot;customClass&quot;:&quot;col-sm-4&quot;,&quot;style&quot;:&quot;zo2_menu&quot;,&quot;id&quot;:&quot;top-menu&quot;,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[]},{&quot;jdoc&quot;:&quot;modules&quot;,&quot;type&quot;:&quot;col&quot;,&quot;name&quot;:&quot;search&quot;,&quot;position&quot;:&quot;search&quot;,&quot;span&quot;:4,&quot;offset&quot;:0,&quot;customClass&quot;:&quot;col-sm-4&quot;,&quot;style&quot;:&quot;zo2_xhtml&quot;,&quot;id&quot;:&quot;top-search&quot;,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[]},{&quot;jdoc&quot;:&quot;modules&quot;,&quot;type&quot;:&quot;col&quot;,&quot;name&quot;:&quot;top-social&quot;,&quot;position&quot;:&quot;top-social&quot;,&quot;span&quot;:4,&quot;offset&quot;:0,&quot;customClass&quot;:&quot;col-sm-4&quot;,&quot;style&quot;:&quot;zo2_xhtml&quot;,&quot;id&quot;:&quot;&quot;,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[]}]},{&quot;type&quot;:&quot;row&quot;,&quot;name&quot;:&quot;Header&quot;,&quot;customClass&quot;:&quot;zo2-sticky&quot;,&quot;id&quot;:&quot;zo2-header&quot;,&quot;fullwidth&quot;:false,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[{&quot;jdoc&quot;:&quot;canvasmenu&quot;,&quot;type&quot;:&quot;col&quot;,&quot;name&quot;:&quot;mega_menu&quot;,&quot;position&quot;:&quot;mega_menu&quot;,&quot;span&quot;:1,&quot;offset&quot;:0,&quot;customClass&quot;:&quot;col-xs-1&quot;,&quot;style&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[]},{&quot;jdoc&quot;:&quot;modules&quot;,&quot;type&quot;:&quot;col&quot;,&quot;name&quot;:&quot;header_logo&quot;,&quot;position&quot;:&quot;header_logo&quot;,&quot;span&quot;:3,&quot;offset&quot;:0,&quot;customClass&quot;:&quot;col-sm-3 col-xs-10 mobile-logo&quot;,&quot;style&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[]},{&quot;jdoc&quot;:&quot;megamenu&quot;,&quot;type&quot;:&quot;col&quot;,&quot;name&quot;:&quot;mega_menu&quot;,&quot;position&quot;:&quot;mega_menu&quot;,&quot;span&quot;:8,&quot;offset&quot;:0,&quot;customClass&quot;:&quot;col-sm-9 col-xs-2 mobile-menu&quot;,&quot;style&quot;:&quot;none&quot;,&quot;id&quot;:&quot;&quot;,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[]}]},{&quot;type&quot;:&quot;row&quot;,&quot;name&quot;:&quot;Slide&quot;,&quot;customClass&quot;:&quot;full-width&quot;,&quot;id&quot;:&quot;&quot;,&quot;fullwidth&quot;:true,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[{&quot;jdoc&quot;:&quot;modules&quot;,&quot;type&quot;:&quot;col&quot;,&quot;name&quot;:&quot;slide&quot;,&quot;position&quot;:&quot;slide&quot;,&quot;span&quot;:12,&quot;offset&quot;:0,&quot;customClass&quot;:&quot;full-width&quot;,&quot;style&quot;:&quot;none&quot;,&quot;id&quot;:&quot;&quot;,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[]}]},{&quot;type&quot;:&quot;row&quot;,&quot;name&quot;:&quot; Feature &quot;,&quot;customClass&quot;:&quot;&quot;,&quot;id&quot;:&quot;zo2-hello&quot;,&quot;fullwidth&quot;:false,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[{&quot;jdoc&quot;:&quot;modules&quot;,&quot;type&quot;:&quot;col&quot;,&quot;name&quot;:&quot;feature&quot;,&quot;position&quot;:&quot;feature&quot;,&quot;span&quot;:12,&quot;offset&quot;:0,&quot;customClass&quot;:&quot;&quot;,&quot;style&quot;:&quot;zo2_xhtml&quot;,&quot;id&quot;:&quot;&quot;,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[]}]},{&quot;type&quot;:&quot;row&quot;,&quot;name&quot;:&quot;Breadcrumb&quot;,&quot;customClass&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;fullwidth&quot;:false,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[{&quot;jdoc&quot;:&quot;modules&quot;,&quot;type&quot;:&quot;col&quot;,&quot;name&quot;:&quot;breadcrumb&quot;,&quot;position&quot;:&quot;breadcrumb&quot;,&quot;span&quot;:12,&quot;offset&quot;:0,&quot;customClass&quot;:&quot;&quot;,&quot;style&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[]}]},{&quot;type&quot;:&quot;row&quot;,&quot;name&quot;:&quot;zo2-message&quot;,&quot;customClass&quot;:&quot;&quot;,&quot;id&quot;:&quot;zo2-message&quot;,&quot;fullwidth&quot;:false,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[{&quot;jdoc&quot;:&quot;modules&quot;,&quot;type&quot;:&quot;col&quot;,&quot;name&quot;:&quot;message&quot;,&quot;position&quot;:&quot;message&quot;,&quot;span&quot;:12,&quot;offset&quot;:0,&quot;customClass&quot;:&quot;&quot;,&quot;style&quot;:&quot;none&quot;,&quot;id&quot;:&quot;&quot;,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[]}]},{&quot;type&quot;:&quot;row&quot;,&quot;name&quot;:&quot;Body&quot;,&quot;customClass&quot;:&quot;&quot;,&quot;id&quot;:&quot;zo2-mainframe&quot;,&quot;fullwidth&quot;:false,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[{&quot;jdoc&quot;:&quot;modules&quot;,&quot;type&quot;:&quot;col&quot;,&quot;name&quot;:&quot;left&quot;,&quot;position&quot;:&quot;left&quot;,&quot;span&quot;:3,&quot;offset&quot;:0,&quot;customClass&quot;:&quot;&quot;,&quot;style&quot;:&quot;zo2_xhtml&quot;,&quot;id&quot;:&quot;&quot;,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[]},{&quot;jdoc&quot;:&quot;modules&quot;,&quot;type&quot;:&quot;col&quot;,&quot;name&quot;:&quot;component&quot;,&quot;position&quot;:&quot;component&quot;,&quot;span&quot;:6,&quot;offset&quot;:0,&quot;customClass&quot;:&quot;&quot;,&quot;style&quot;:&quot;none&quot;,&quot;id&quot;:&quot;zo2-component&quot;,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[]},{&quot;jdoc&quot;:&quot;modules&quot;,&quot;type&quot;:&quot;col&quot;,&quot;name&quot;:&quot;right&quot;,&quot;position&quot;:&quot;right&quot;,&quot;span&quot;:3,&quot;offset&quot;:0,&quot;customClass&quot;:&quot;&quot;,&quot;style&quot;:&quot;zo2_xhtml&quot;,&quot;id&quot;:&quot;&quot;,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[]}]},{&quot;type&quot;:&quot;row&quot;,&quot;name&quot;:&quot;News&quot;,&quot;customClass&quot;:&quot;&quot;,&quot;id&quot;:&quot;news&quot;,&quot;fullwidth&quot;:false,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[{&quot;jdoc&quot;:&quot;modules&quot;,&quot;type&quot;:&quot;col&quot;,&quot;name&quot;:&quot;news&quot;,&quot;position&quot;:&quot;news&quot;,&quot;span&quot;:12,&quot;offset&quot;:0,&quot;customClass&quot;:&quot;&quot;,&quot;style&quot;:&quot;zo2_xhtml&quot;,&quot;id&quot;:&quot;&quot;,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[]}]},{&quot;type&quot;:&quot;row&quot;,&quot;name&quot;:&quot;Bottom 1&quot;,&quot;customClass&quot;:&quot;&quot;,&quot;id&quot;:&quot;zo2-bottom1&quot;,&quot;fullwidth&quot;:false,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[{&quot;jdoc&quot;:&quot;modules&quot;,&quot;type&quot;:&quot;col&quot;,&quot;name&quot;:&quot;bottom1&quot;,&quot;position&quot;:&quot;bottom1&quot;,&quot;span&quot;:12,&quot;offset&quot;:0,&quot;customClass&quot;:&quot;&quot;,&quot;style&quot;:&quot;zo2_xhtml&quot;,&quot;id&quot;:&quot;&quot;,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[]}]},{&quot;type&quot;:&quot;row&quot;,&quot;name&quot;:&quot;Bottom 2&quot;,&quot;customClass&quot;:&quot;&quot;,&quot;id&quot;:&quot;zo2-bottom2&quot;,&quot;fullwidth&quot;:false,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[{&quot;jdoc&quot;:&quot;modules&quot;,&quot;type&quot;:&quot;col&quot;,&quot;name&quot;:&quot;bottom2&quot;,&quot;position&quot;:&quot;bottom2&quot;,&quot;span&quot;:4,&quot;offset&quot;:0,&quot;customClass&quot;:&quot;col-sm-4&quot;,&quot;style&quot;:&quot;zo2_xhtml&quot;,&quot;id&quot;:&quot;&quot;,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[]},{&quot;jdoc&quot;:&quot;modules&quot;,&quot;type&quot;:&quot;col&quot;,&quot;name&quot;:&quot;bottom3&quot;,&quot;position&quot;:&quot;bottom3&quot;,&quot;span&quot;:4,&quot;offset&quot;:0,&quot;customClass&quot;:&quot;col-sm-4&quot;,&quot;style&quot;:&quot;zo2_xhtml&quot;,&quot;id&quot;:&quot;&quot;,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[]},{&quot;jdoc&quot;:&quot;modules&quot;,&quot;type&quot;:&quot;col&quot;,&quot;name&quot;:&quot;bottom4&quot;,&quot;position&quot;:&quot;bottom4&quot;,&quot;span&quot;:4,&quot;offset&quot;:0,&quot;customClass&quot;:&quot;col-sm-4&quot;,&quot;style&quot;:&quot;zo2_xhtml&quot;,&quot;id&quot;:&quot;&quot;,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[]}]},{&quot;type&quot;:&quot;row&quot;,&quot;name&quot;:&quot;Footer&quot;,&quot;customClass&quot;:&quot;&quot;,&quot;id&quot;:&quot;zo2-footer&quot;,&quot;fullwidth&quot;:false,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[{&quot;jdoc&quot;:&quot;modules&quot;,&quot;type&quot;:&quot;col&quot;,&quot;name&quot;:&quot;footer_copyright&quot;,&quot;position&quot;:&quot;footer_copyright&quot;,&quot;span&quot;:12,&quot;offset&quot;:0,&quot;customClass&quot;:&quot;&quot;,&quot;style&quot;:&quot;xhtml&quot;,&quot;id&quot;:&quot;&quot;,&quot;visibility&quot;:{&quot;xs&quot;:true,&quot;sm&quot;:true,&quot;md&quot;:true,&quot;lg&quot;:true},&quot;children&quot;:[]}]}]" style="display: none" class="hfLayoutHtml" name="jform[params][layout]" id="jform_params_layout">
    <input type="hidden" id="hfTemplateName" value="zo2_hallo">
    <input type="hidden" id="hdLayoutBuilder" value="0">
    <input type="hidden" id="hfLayoutName" value="homepage">
</fieldset>

<!-- Main layout -->
<div id="droppable-container">
<div class="zo2-container ui-sortable">
<div class="zo2-row sortable-row ui-sortable" data-zo2-type="row" data-zo2-customclass="" data-zo2-id="zo2-header-top" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1" data-zo2-fullwidth="0">
    <div class="col-md-12 row-control">
        <div class="row-control-container">
            <div class="row-name">Top</div>
            <div class="row-control-buttons">
                <i title="" class="icon-move row-control-icon dragger hasTooltip" data-original-title="Drag row"></i>
                <i title="" class="icon-cogs row-control-icon settings hasTooltip" data-original-title="Row's settings"></i>
                <i title="" class="row-control-icon duplicate icon-align-justify hasTooltip" data-original-title="Duplicate row"></i>
                <i title="" class="row-control-icon split icon-columns hasTooltip" data-original-title="Split row"></i>
                <i title="" class="row-control-icon delete icon-remove hasTooltip" data-original-title="Remove row"></i>
            </div>
        </div>

        <div class="col-container">
            <div class="sortable-col col-md-4 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="4" data-zo2-offset="0" data-zo2-position="top-menu" data-zo2-style="zo2_menu" data-zo2-customclass="col-sm-4" data-zo2-id="top-menu" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                <div class="col-wrap">
                    <div class="col-name">top-menu</div>
                    <div class="col-control-buttons">
                        <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                        <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                        <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                        <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                    </div>

                    <div class="row-container">

                    </div>
                </div>
            </div><div class="sortable-col col-md-4 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="4" data-zo2-offset="0" data-zo2-position="search" data-zo2-style="zo2_xhtml" data-zo2-customclass="col-sm-4" data-zo2-id="top-search" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                <div class="col-wrap">
                    <div class="col-name">search</div>
                    <div class="col-control-buttons">
                        <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                        <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                        <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                        <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                    </div>

                    <div class="row-container">

                    </div>
                </div>
            </div><div class="sortable-col col-md-4 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="4" data-zo2-offset="0" data-zo2-position="top-social" data-zo2-style="zo2_xhtml" data-zo2-customclass="col-sm-4" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                <div class="col-wrap">
                    <div class="col-name">top-social</div>
                    <div class="col-control-buttons">
                        <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                        <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                        <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                        <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                    </div>

                    <div class="row-container">

                    </div>
                </div>
            </div>        </div>
    </div>
</div><div class="zo2-row sortable-row ui-sortable" data-zo2-type="row" data-zo2-customclass="zo2-sticky" data-zo2-id="zo2-header" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1" data-zo2-fullwidth="0">
    <div class="col-md-12 row-control">
        <div class="row-control-container">
            <div class="row-name">Header</div>
            <div class="row-control-buttons">
                <i title="" class="icon-move row-control-icon dragger hasTooltip" data-original-title="Drag row"></i>
                <i title="" class="icon-cogs row-control-icon settings hasTooltip" data-original-title="Row's settings"></i>
                <i title="" class="row-control-icon duplicate icon-align-justify hasTooltip" data-original-title="Duplicate row"></i>
                <i title="" class="row-control-icon split icon-columns hasTooltip" data-original-title="Split row"></i>
                <i title="" class="row-control-icon delete icon-remove hasTooltip" data-original-title="Remove row"></i>
            </div>
        </div>

        <div class="col-container">
            <div class="sortable-col col-md-1 col-md-offset-0" data-zo2-jdoc="canvasmenu" data-zo2-type="span" data-zo2-span="1" data-zo2-offset="0" data-zo2-position="mega_menu" data-zo2-style="" data-zo2-customclass="col-xs-1" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                <div class="col-wrap">
                    <div class="col-name">mega_menu</div>
                    <div class="col-control-buttons">
                        <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                        <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                        <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                        <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                    </div>

                    <div class="row-container">

                    </div>
                </div>
            </div><div class="sortable-col col-md-3 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="3" data-zo2-offset="0" data-zo2-position="header_logo" data-zo2-style="" data-zo2-customclass="col-sm-3 col-xs-10 mobile-logo" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                <div class="col-wrap">
                    <div class="col-name">header_logo</div>
                    <div class="col-control-buttons">
                        <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                        <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                        <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                        <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                    </div>

                    <div class="row-container">

                    </div>
                </div>
            </div><div class="sortable-col col-md-8 col-md-offset-0" data-zo2-jdoc="megamenu" data-zo2-type="span" data-zo2-span="8" data-zo2-offset="0" data-zo2-position="mega_menu" data-zo2-style="none" data-zo2-customclass="col-sm-9 col-xs-2 mobile-menu" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                <div class="col-wrap">
                    <div class="col-name">mega_menu</div>
                    <div class="col-control-buttons">
                        <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                        <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                        <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                        <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                    </div>

                    <div class="row-container">

                    </div>
                </div>
            </div>        </div>
    </div>
</div><div class="zo2-row sortable-row ui-sortable" data-zo2-type="row" data-zo2-customclass="full-width" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1" data-zo2-fullwidth="1">
    <div class="col-md-12 row-control">
        <div class="row-control-container">
            <div class="row-name">Slide</div>
            <div class="row-control-buttons">
                <i title="" class="icon-move row-control-icon dragger hasTooltip" data-original-title="Drag row"></i>
                <i title="" class="icon-cogs row-control-icon settings hasTooltip" data-original-title="Row's settings"></i>
                <i title="" class="row-control-icon duplicate icon-align-justify hasTooltip" data-original-title="Duplicate row"></i>
                <i title="" class="row-control-icon split icon-columns hasTooltip" data-original-title="Split row"></i>
                <i title="" class="row-control-icon delete icon-remove hasTooltip" data-original-title="Remove row"></i>
            </div>
        </div>

        <div class="col-container">
            <div class="sortable-col col-md-12 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="12" data-zo2-offset="0" data-zo2-position="slide" data-zo2-style="none" data-zo2-customclass="full-width" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                <div class="col-wrap">
                    <div class="col-name">slide</div>
                    <div class="col-control-buttons">
                        <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                        <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                        <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                        <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                    </div>

                    <div class="row-container">

                    </div>
                </div>
            </div>        </div>
    </div>
</div><div class="zo2-row sortable-row ui-sortable" data-zo2-type="row" data-zo2-customclass="" data-zo2-id="zo2-hello" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1" data-zo2-fullwidth="0">
    <div class="col-md-12 row-control">
        <div class="row-control-container">
            <div class="row-name"> Feature </div>
            <div class="row-control-buttons">
                <i title="" class="icon-move row-control-icon dragger hasTooltip" data-original-title="Drag row"></i>
                <i title="" class="icon-cogs row-control-icon settings hasTooltip" data-original-title="Row's settings"></i>
                <i title="" class="row-control-icon duplicate icon-align-justify hasTooltip" data-original-title="Duplicate row"></i>
                <i title="" class="row-control-icon split icon-columns hasTooltip" data-original-title="Split row"></i>
                <i title="" class="row-control-icon delete icon-remove hasTooltip" data-original-title="Remove row"></i>
            </div>
        </div>

        <div class="col-container">
            <div class="sortable-col col-md-12 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="12" data-zo2-offset="0" data-zo2-position="feature" data-zo2-style="zo2_xhtml" data-zo2-customclass="" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                <div class="col-wrap">
                    <div class="col-name">feature</div>
                    <div class="col-control-buttons">
                        <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                        <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                        <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                        <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                    </div>

                    <div class="row-container">

                    </div>
                </div>
            </div>        </div>
    </div>
</div><div class="zo2-row sortable-row ui-sortable" data-zo2-type="row" data-zo2-customclass="" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1" data-zo2-fullwidth="0">
    <div class="col-md-12 row-control">
        <div class="row-control-container">
            <div class="row-name">Breadcrumb</div>
            <div class="row-control-buttons">
                <i title="" class="icon-move row-control-icon dragger hasTooltip" data-original-title="Drag row"></i>
                <i title="" class="icon-cogs row-control-icon settings hasTooltip" data-original-title="Row's settings"></i>
                <i title="" class="row-control-icon duplicate icon-align-justify hasTooltip" data-original-title="Duplicate row"></i>
                <i title="" class="row-control-icon split icon-columns hasTooltip" data-original-title="Split row"></i>
                <i title="" class="row-control-icon delete icon-remove hasTooltip" data-original-title="Remove row"></i>
            </div>
        </div>

        <div class="col-container">
            <div class="sortable-col col-md-12 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="12" data-zo2-offset="0" data-zo2-position="breadcrumb" data-zo2-style="" data-zo2-customclass="" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                <div class="col-wrap">
                    <div class="col-name">breadcrumb</div>
                    <div class="col-control-buttons">
                        <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                        <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                        <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                        <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                    </div>

                    <div class="row-container">

                    </div>
                </div>
            </div>        </div>
    </div>
</div><div class="zo2-row sortable-row ui-sortable" data-zo2-type="row" data-zo2-customclass="" data-zo2-id="zo2-message" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1" data-zo2-fullwidth="0">
    <div class="col-md-12 row-control">
        <div class="row-control-container">
            <div class="row-name">zo2-message</div>
            <div class="row-control-buttons">
                <i title="" class="icon-move row-control-icon dragger hasTooltip" data-original-title="Drag row"></i>
                <i title="" class="icon-cogs row-control-icon settings hasTooltip" data-original-title="Row's settings"></i>
                <i title="" class="row-control-icon duplicate icon-align-justify hasTooltip" data-original-title="Duplicate row"></i>
                <i title="" class="row-control-icon split icon-columns hasTooltip" data-original-title="Split row"></i>
                <i title="" class="row-control-icon delete icon-remove hasTooltip" data-original-title="Remove row"></i>
            </div>
        </div>

        <div class="col-container">
            <div class="sortable-col col-md-12 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="12" data-zo2-offset="0" data-zo2-position="message" data-zo2-style="none" data-zo2-customclass="" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                <div class="col-wrap">
                    <div class="col-name">message</div>
                    <div class="col-control-buttons">
                        <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                        <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                        <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                        <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                    </div>

                    <div class="row-container">

                    </div>
                </div>
            </div>        </div>
    </div>
</div><div class="zo2-row sortable-row ui-sortable" data-zo2-type="row" data-zo2-customclass="" data-zo2-id="zo2-mainframe" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1" data-zo2-fullwidth="0">
    <div class="col-md-12 row-control">
        <div class="row-control-container">
            <div class="row-name">Body</div>
            <div class="row-control-buttons">
                <i title="" class="icon-move row-control-icon dragger hasTooltip" data-original-title="Drag row"></i>
                <i title="" class="icon-cogs row-control-icon settings hasTooltip" data-original-title="Row's settings"></i>
                <i title="" class="row-control-icon duplicate icon-align-justify hasTooltip" data-original-title="Duplicate row"></i>
                <i title="" class="row-control-icon split icon-columns hasTooltip" data-original-title="Split row"></i>
                <i title="" class="row-control-icon delete icon-remove hasTooltip" data-original-title="Remove row"></i>
            </div>
        </div>

        <div class="col-container">
            <div class="sortable-col col-md-3 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="3" data-zo2-offset="0" data-zo2-position="left" data-zo2-style="zo2_xhtml" data-zo2-customclass="" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                <div class="col-wrap">
                    <div class="col-name">left</div>
                    <div class="col-control-buttons">
                        <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                        <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                        <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                        <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                    </div>

                    <div class="row-container">

                    </div>
                </div>
            </div><div class="sortable-col col-md-6 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="6" data-zo2-offset="0" data-zo2-position="component" data-zo2-style="none" data-zo2-customclass="" data-zo2-id="zo2-component" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                <div class="col-wrap">
                    <div class="col-name">component</div>
                    <div class="col-control-buttons">
                        <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                        <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                        <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                        <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                    </div>

                    <div class="row-container">

                    </div>
                </div>
            </div><div class="sortable-col col-md-3 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="3" data-zo2-offset="0" data-zo2-position="right" data-zo2-style="zo2_xhtml" data-zo2-customclass="" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                <div class="col-wrap">
                    <div class="col-name">right</div>
                    <div class="col-control-buttons">
                        <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                        <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                        <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                        <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                    </div>

                    <div class="row-container">

                    </div>
                </div>
            </div>        </div>
    </div>
</div><div class="zo2-row sortable-row ui-sortable" data-zo2-type="row" data-zo2-customclass="" data-zo2-id="news" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1" data-zo2-fullwidth="0">
    <div class="col-md-12 row-control">
        <div class="row-control-container">
            <div class="row-name">News</div>
            <div class="row-control-buttons">
                <i title="" class="icon-move row-control-icon dragger hasTooltip" data-original-title="Drag row"></i>
                <i title="" class="icon-cogs row-control-icon settings hasTooltip" data-original-title="Row's settings"></i>
                <i title="" class="row-control-icon duplicate icon-align-justify hasTooltip" data-original-title="Duplicate row"></i>
                <i title="" class="row-control-icon split icon-columns hasTooltip" data-original-title="Split row"></i>
                <i title="" class="row-control-icon delete icon-remove hasTooltip" data-original-title="Remove row"></i>
            </div>
        </div>

        <div class="col-container">
            <div class="sortable-col col-md-12 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="12" data-zo2-offset="0" data-zo2-position="news" data-zo2-style="zo2_xhtml" data-zo2-customclass="" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                <div class="col-wrap">
                    <div class="col-name">news</div>
                    <div class="col-control-buttons">
                        <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                        <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                        <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                        <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                    </div>

                    <div class="row-container">

                    </div>
                </div>
            </div>        </div>
    </div>
</div><div class="zo2-row sortable-row ui-sortable" data-zo2-type="row" data-zo2-customclass="" data-zo2-id="zo2-bottom1" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1" data-zo2-fullwidth="0">
    <div class="col-md-12 row-control">
        <div class="row-control-container">
            <div class="row-name">Bottom 1</div>
            <div class="row-control-buttons">
                <i title="" class="icon-move row-control-icon dragger hasTooltip" data-original-title="Drag row"></i>
                <i title="" class="icon-cogs row-control-icon settings hasTooltip" data-original-title="Row's settings"></i>
                <i title="" class="row-control-icon duplicate icon-align-justify hasTooltip" data-original-title="Duplicate row"></i>
                <i title="" class="row-control-icon split icon-columns hasTooltip" data-original-title="Split row"></i>
                <i title="" class="row-control-icon delete icon-remove hasTooltip" data-original-title="Remove row"></i>
            </div>
        </div>

        <div class="col-container">
            <div class="sortable-col col-md-12 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="12" data-zo2-offset="0" data-zo2-position="bottom1" data-zo2-style="zo2_xhtml" data-zo2-customclass="" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                <div class="col-wrap">
                    <div class="col-name">bottom1</div>
                    <div class="col-control-buttons">
                        <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                        <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                        <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                        <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                    </div>

                    <div class="row-container">

                    </div>
                </div>
            </div>        </div>
    </div>
</div><div class="zo2-row sortable-row ui-sortable" data-zo2-type="row" data-zo2-customclass="" data-zo2-id="zo2-bottom2" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1" data-zo2-fullwidth="0">
    <div class="col-md-12 row-control">
        <div class="row-control-container">
            <div class="row-name">Bottom 2</div>
            <div class="row-control-buttons">
                <i title="" class="icon-move row-control-icon dragger hasTooltip" data-original-title="Drag row"></i>
                <i title="" class="icon-cogs row-control-icon settings hasTooltip" data-original-title="Row's settings"></i>
                <i title="" class="row-control-icon duplicate icon-align-justify hasTooltip" data-original-title="Duplicate row"></i>
                <i title="" class="row-control-icon split icon-columns hasTooltip" data-original-title="Split row"></i>
                <i title="" class="row-control-icon delete icon-remove hasTooltip" data-original-title="Remove row"></i>
            </div>
        </div>

        <div class="col-container">
            <div class="sortable-col col-md-4 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="4" data-zo2-offset="0" data-zo2-position="bottom2" data-zo2-style="zo2_xhtml" data-zo2-customclass="col-sm-4" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                <div class="col-wrap">
                    <div class="col-name">bottom2</div>
                    <div class="col-control-buttons">
                        <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                        <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                        <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                        <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                    </div>

                    <div class="row-container">

                    </div>
                </div>
            </div><div class="sortable-col col-md-4 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="4" data-zo2-offset="0" data-zo2-position="bottom3" data-zo2-style="zo2_xhtml" data-zo2-customclass="col-sm-4" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                <div class="col-wrap">
                    <div class="col-name">bottom3</div>
                    <div class="col-control-buttons">
                        <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                        <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                        <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                        <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                    </div>

                    <div class="row-container">

                    </div>
                </div>
            </div><div class="sortable-col col-md-4 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="4" data-zo2-offset="0" data-zo2-position="bottom4" data-zo2-style="zo2_xhtml" data-zo2-customclass="col-sm-4" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                <div class="col-wrap">
                    <div class="col-name">bottom4</div>
                    <div class="col-control-buttons">
                        <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                        <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                        <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                        <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                    </div>

                    <div class="row-container">

                    </div>
                </div>
            </div>        </div>
    </div>
</div><div class="zo2-row sortable-row ui-sortable" data-zo2-type="row" data-zo2-customclass="" data-zo2-id="zo2-footer" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1" data-zo2-fullwidth="0">
    <div class="col-md-12 row-control">
        <div class="row-control-container">
            <div class="row-name">Footer</div>
            <div class="row-control-buttons">
                <i title="" class="icon-move row-control-icon dragger hasTooltip" data-original-title="Drag row"></i>
                <i title="" class="icon-cogs row-control-icon settings hasTooltip" data-original-title="Row's settings"></i>
                <i title="" class="row-control-icon duplicate icon-align-justify hasTooltip" data-original-title="Duplicate row"></i>
                <i title="" class="row-control-icon split icon-columns hasTooltip" data-original-title="Split row"></i>
                <i title="" class="row-control-icon delete icon-remove hasTooltip" data-original-title="Remove row"></i>
            </div>
        </div>

        <div class="col-container">
            <div class="sortable-col col-md-12 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="12" data-zo2-offset="0" data-zo2-position="footer_copyright" data-zo2-style="xhtml" data-zo2-customclass="" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                <div class="col-wrap">
                    <div class="col-name">footer_copyright</div>
                    <div class="col-control-buttons">
                        <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                        <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                        <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                        <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                    </div>

                    <div class="row-container">

                    </div>
                </div>
            </div>        </div>
    </div>
</div>        </div>
</div>

<!-- Modal: Row settings -->
<div id="rowSettingsModal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!-- Modal header -->
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Row's settings</h3>
        <!-- Tab titles -->
        <ul class="zo2-tabs">
            <li><a class="active" href="#row-basic" data-toggle="tab">Basic</a></li>
            <li><a href="#row-responsive" data-toggle="tab">Responsive</a></li>
        </ul>
    </div>
    <!-- Modal body -->
    <div class="modal-body">
        <div class="form-horizontal">
            <!-- Tab contents -->
            <div class="zo2-tabs-content">
                <!-- Basic -->
                <div class="active" id="row-basic">
                    <div class="control-group">
                        <label class="control-label" for="txtRowName">Name</label>
                        <div class="controls">
                            <input type="text" id="txtRowName" placeholder="Row's name">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="txtRowId">ID</label>
                        <div class="controls">
                            <input type="text" id="txtRowId" placeholder="Row's ID">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="txtRowCss">Custom CSS class</label>
                        <div class="controls">
                            <input type="text" id="txtRowCss" placeholder="Row's custom CSS class">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <div class="control-label">Full Width</div>
                        </div>
                        <div class="controls btn-group btn-group-onoff" id="btgFullWidth">
                            <button class="btn btn-on">On</button>
                            <button class="btn btn-off">Off</button>
                        </div>
                    </div>
                </div>
                <!-- Responsive -->
                <div id="row-responsive">
                    <div class="control-group">
                        <!--
                        <span class="switch_title">Phone</span>
                        <label class="switch_wrap" for="cbRowPhoneVisibility">
                            <input id="cbRowPhoneVisibility" type="checkbox" value="1" />
                            <div class="switch"><span class="bullet"></span></div>
                        </label>
                        -->
                        <div class="control-label">
                            <div class="control-label">Phone</div>
                        </div>
                        <div class="controls btn-group btn-group-onoff" id="btgRowPhone">
                            <button class="btn btn-on">On</button>
                            <button class="btn btn-off">Off</button>
                        </div>
                    </div>
                    <div class="control-group">
                        <!--
                        <span class="switch_title">Tablet</span>
                        <label class="switch_wrap" for="cbRowTabletVisibility">
                            <input id="cbRowTabletVisibility" type="checkbox" value="1" />
                            <div class="switch"><span class="bullet"></span></div>
                        </label>
                        -->
                        <div class="control-label">
                            <div class="control-label">Tablet</div>
                        </div>
                        <div class="controls btn-group btn-group-onoff" id="btgRowTablet">
                            <button class="btn btn-on">On</button>
                            <button class="btn btn-off">Off</button>
                        </div>
                    </div>
                    <div class="control-group">
                        <!--
                        <span class="switch_title">Desktop</span>
                        <label class="switch_wrap" for="cbRowDesktopVisibility">
                            <input id="cbRowDesktopVisibility" type="checkbox" value="1" />
                            <div class="switch"><span class="bullet"></span></div>
                        </label>
                        -->

                        <div class="control-label">
                            <div class="control-label">Desktop</div>
                        </div>
                        <div class="controls btn-group btn-group-onoff" id="btgRowDesktop">
                            <button class="btn btn-on">On</button>
                            <button class="btn btn-off">Off</button>
                        </div>
                    </div>
                    <div class="control-group">
                        <!--
                        <span class="switch_title">Large desktop</span>
                        <label class="switch_wrap" for="cbRowLargeDesktopVisibility">
                            <input id="cbRowLargeDesktopVisibility" type="checkbox" value="1" />
                            <div class="switch"><span class="bullet"></span></div>
                        </label>
                        -->

                        <div class="control-label">
                            <div class="control-label">Large desktop</div>
                        </div>
                        <div class="controls btn-group btn-group-onoff" id="btgRowLargeDesktop">
                            <button class="btn btn-on">On</button>
                            <button class="btn btn-off">Off</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Model footer -->
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary" id="btnSaveRowSettings">Save changes</button>
    </div>
</div>

<!-- Model: Column settings -->
<div id="colSettingsModal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Column's settings</h3>
    <ul class="zo2-tabs">
        <li><a class="active" href="#column-basic" data-toggle="tab">Basic</a></li>
        <li><a href="#column-responsive" data-toggle="tab">Responsive</a></li>
    </ul>
</div>
<div class="modal-body">
<div class="form-horizontal">
    <div class="zo2-tabs-content">
        <div class="active" id="column-basic">
            <!-- begin -->
            <div class="control-group">
                <label class="control-label" for="dlColJDoc">JDoc</label>
                <div class="controls">
                    <!-- http://docs.joomla.org/Jdoc_statements -->
                    <select id="dlColJDoc">
                        <optgroup label="Joomla! Document">
                            <option value="component">Component</option>
                            <option value="modules">Modules</option>
                            <option value="messsge">Message</option>
                        </optgroup>
                        <!-- These are extended for 3rd parties -->
                        <optgroup label="Menu">
                            <option value="canvasmenu">Canvas</option>
                            <option value="megamenu">Mega</option>
                        </optgroup>
                        <!-- These are extended for 3rd parties -->
                        <optgroup label="3rd parties">
                        </optgroup>
                    </select>
                </div>
            </div>
            <!-- begin -->
            <div class="control-group">
                <label class="control-label" for="dlColType">Position</label>
                <div class="controls">
                    <select id="dlColPosition">
                        <option value="">(none)</option>
                        <option value="component">Component</option>
                        <option value="message">Message</option>
                        <option value="mega_menu">Mega Menu</option>
                        <option value="top">top</option>
                        <option value="header_logo">header_logo</option>
                        <option value="top-social">top-social</option>
                        <option value="top-menu">top-menu</option>
                        <option value="search">search</option>
                        <option value="logo">logo</option>
                        <option value="header_logo">header_logo</option>
                        <option value="menu">menu</option>
                        <option value="breadcrumb">breadcrumb</option>
                        <option value="search">search</option>
                        <option value="slide">slide</option>
                        <option value="user1">user1</option>
                        <option value="user2">user2</option>
                        <option value="user3">user3</option>
                        <option value="user4">user4</option>
                        <option value="left">left</option>
                        <option value="right">right</option>
                        <option value="feature">feature</option>
                        <option value="bottom1">bottom1</option>
                        <option value="bottom2">bottom2</option>
                        <option value="bottom3">bottom3</option>
                        <option value="bottom4">bottom4</option>
                        <option value="footer_logo">footer_logo</option>
                        <option value="footer1">footer1</option>
                        <option value="footer2">footer2</option>
                        <option value="footer_copyright">footer_copyright</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="dlColWidth">Width</label>
                <div class="controls">
                    <select id="dlColWidth">
                        <option value="1">span1</option>
                        <option value="2">span2</option>
                        <option value="3">span3</option>
                        <option value="4">span4</option>
                        <option value="5">span5</option>
                        <option value="6">span6</option>
                        <option value="7">span7</option>
                        <option value="8">span8</option>
                        <option value="9">span9</option>
                        <option value="10">span10</option>
                        <option value="11">span11</option>
                        <option value="12">span12</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="ddlColOffset">Offset</label>
                <div class="controls">
                    <select id="ddlColOffset">
                        <option value="0">No Offset</option>
                        <option value="1">offset1</option>
                        <option value="2">offset2</option>
                        <option value="3">offset3</option>
                        <option value="4">offset4</option>
                        <option value="5">offset5</option>
                        <option value="6">offset6</option>
                        <option value="7">offset7</option>
                        <option value="8">offset8</option>
                        <option value="9">offset9</option>
                        <option value="10">offset10</option>
                        <option value="11">offset11</option>
                        <option value="12">offset12</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="ddlColStyle">Style</label>
                <div class="controls">
                    <select id="ddlColStyle">
                        <option value="none">None</option>
                        <option value="zo2_xhtml">zo2_xhtml</option>
                        <option value="zo2_flat">zo2_flat</option>
                        <option value="zo2_raw">zo2_raw</option>
                        <option value="zo2_menu">zo2_menu</option>
                        <option value="rounded">rounded</option>
                        <option value="table">table</option>
                        <option value="horz">horz</option>
                        <option value="xhtml">xhtml</option>
                        <option value="outline">outline</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="txtColId">ID</label>
                <div class="controls">
                    <input type="text" id="txtColId" placeholder="Column's ID">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="txtColCss">Custom CSS class</label>
                <div class="controls">
                    <input type="text" id="txtColCss" placeholder="Column's custom CSS class">
                </div>
            </div>
            <!-- end -->
        </div>
        <div id="column-responsive">
            <div class="control-group">
                <!--
                <span class="switch_title">Phone</span>
                <label class="switch_wrap" for="cbColumnPhoneVisibility">
                    <input id="cbColumnPhoneVisibility" type="checkbox" value="1" />
                    <div class="switch"><span class="bullet"></span></div>
                </label>
                -->
                <div class="control-label">
                    <div class="control-label">Phone</div>
                </div>
                <div class="controls btn-group btn-group-onoff" id="btgColPhone">
                    <button class="btn btn-on">On</button>
                    <button class="btn btn-off">Off</button>
                </div>
            </div>
            <div class="control-group">
                <!--
                <span class="switch_title">Tablet</span>
                <label class="switch_wrap" for="cbColumnTabletVisibility">
                    <input id="cbColumnTabletVisibility" type="checkbox" value="1" />
                    <div class="switch"><span class="bullet"></span></div>
                </label>
                -->
                <div class="control-label">
                    <div class="control-label">Tablet</div>
                </div>
                <div class="controls btn-group btn-group-onoff" id="btgColTablet">
                    <button class="btn btn-on">On</button>
                    <button class="btn btn-off">Off</button>
                </div>
            </div>
            <div class="control-group">
                <!--
                <span class="switch_title">Desktop</span>
                <label class="switch_wrap" for="cbColumnDesktopVisibility">
                    <input id="cbColumnDesktopVisibility" type="checkbox" value="1" />
                    <div class="switch"><span class="bullet"></span></div>
                </label>
                -->
                <div class="control-label">
                    <div class="control-label">Desktop</div>
                </div>
                <div class="controls btn-group btn-group-onoff" id="btgColDesktop">
                    <button class="btn btn-on">On</button>
                    <button class="btn btn-off">Off</button>
                </div>
            </div>
            <div class="control-group">
                <!--
                <span class="switch_title">Large desktop</span>
                <label class="switch_wrap" for="cbColumnLargeDesktopVisibility">
                    <input id="cbColumnLargeDesktopVisibility" type="checkbox" value="1" />
                    <div class="switch"><span class="bullet"></span></div>
                </label>
                -->
                <div class="control-label">
                    <div class="control-label">Large desktop</div>
                </div>
                <div class="controls btn-group btn-group-onoff" id="btgColLargeDesktop">
                    <button class="btn btn-on">On</button>
                    <button class="btn btn-off">Off</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button id="btnSaveColSettings" class="btn btn-primary">Save changes</button>
</div>
</div>
</div>
</div>
</div>
<div class="profiles-pane">
    <h3 class="title-profile">Style</h3>
    <div class="profiles-pane-inner">
        <div id="zo2_themes_container">
            <input type="hidden" value="{&quot;name&quot;:&quot;blue&quot;,&quot;css&quot;:&quot;presets/blue&quot;,&quot;less&quot;:&quot;presets/blue&quot;,&quot;boxed&quot;:&quot;0&quot;,&quot;background&quot;:&quot;&quot;,&quot;header&quot;:&quot;&quot;,&quot;header_top&quot;:&quot;&quot;,&quot;text&quot;:&quot;#222&quot;,&quot;link&quot;:&quot;#184587&quot;,&quot;link_hover&quot;:&quot;#5eaf28&quot;,&quot;bottom1&quot;:&quot;&quot;,&quot;bottom2&quot;:&quot;&quot;,&quot;footer&quot;:&quot;#fb7a7a&quot;,&quot;extra&quot;:&quot;{}&quot;,&quot;bg_image&quot;:&quot;&quot;,&quot;bg_pattern&quot;:&quot;templates/zo2_hallo/assets/zo2/images/background-patterns/congruent_pentagon.png&quot;}" name="jform[params][theme]" id="jform_params_theme">
            <div class="zo2_themes_row clearfix">
                <div class="zo2_themes_label">
                    Select which preset style the layout should load.        </div>
                <div class="zo2_themes_form">
                    <ul id="zo2_themes">
                        <li class="" data-zo2-theme="green" data-zo2-background="#ffffff" data-zo2-header="" data-zo2-header-top="" data-zo2-link="#7FBE54" data-zo2-link-hover="#449d44" data-zo2-text="" data-zo2-bottom1="" data-zo2-bottom2="" data-zo2-footer="" data-zo2-css="presets/green" data-zo2-less="presets/green">
                            <div class="theme_title">Green</div>
                            <div class="theme_thumbnail">
                                <img src="http://test.local/hallo142/templates/zo2_hallo//assets/zo2/images/presets/green.jpg">
                            </div>
                        </li>
                        <li class="active" data-zo2-theme="blue" data-zo2-background="" data-zo2-header="" data-zo2-header-top="" data-zo2-link="#184587" data-zo2-link-hover="#5eaf28" data-zo2-text="#222" data-zo2-bottom1="" data-zo2-bottom2="" data-zo2-footer="" data-zo2-css="presets/blue" data-zo2-less="presets/blue">
                            <div class="theme_title">Blue</div>
                            <div class="theme_thumbnail">
                                <img src="http://test.local/hallo142/templates/zo2_hallo//assets/zo2/images/presets/blue.jpg">
                            </div>
                        </li>
                        <li class="" data-zo2-theme="orange" data-zo2-background="#ffffff" data-zo2-header="" data-zo2-header-top="" data-zo2-link="#d35400" data-zo2-link-hover="#e67e22" data-zo2-text="#4d4d62" data-zo2-bottom1="#2c3e50" data-zo2-bottom2="#2c3e50" data-zo2-footer="#edeff1" data-zo2-css="presets/orange" data-zo2-less="presets/orange">
                            <div class="theme_title">Orange</div>
                            <div class="theme_thumbnail">
                                <img src="http://test.local/hallo142/templates/zo2_hallo//assets/zo2/images/presets/orange.jpg">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="zo2_themes_row clearfix">
                <div class="zo2_themes_label">
                    Preset Settings
                </div>
                <div class="zo2_themes_form">
                    <div class="control-group">
                        <div class="control-label">
                            <label for="color_background">Background</label>
                        </div>
                        <div class="controls">
                            <div class="colorpicker-container">
                                <input id="color_background" type="text" class="txtColorPicker zo2_preset_variable" value="" data-colorpicker-guid="8">
                                <span id="color_background_preview" class="color-preview" style="background-color: transparent"></span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label for="color_header">Header</label>
                        </div>
                        <div class="controls">
                            <div class="colorpicker-container">
                                <input id="color_header" type="text" class="txtColorPicker zo2_preset_variable" value="" data-colorpicker-guid="9">
                                <span id="color_header_preview" class="color-preview" style="background-color: transparent"></span>
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="control-label">
                            <label for="color_link_hover">Header top</label>
                        </div>
                        <div class="controls">
                            <div class="colorpicker-container">
                                <input id="color_header_top" type="text" class="txtColorPicker zo2_preset_variable" value="" data-colorpicker-guid="10">
                                <span id="color_header_top_preview" class="color-preview" style="background-color: transparent"></span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label for="color_text">Text</label>
                        </div>
                        <div class="controls">
                            <div class="colorpicker-container">
                                <input id="color_text" type="text" class="txtColorPicker zo2_preset_variable" value="#222" data-colorpicker-guid="11">
                                <span id="color_text_preview" class="color-preview" style="background-color: #222"></span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label for="color_link">Link</label>
                        </div>
                        <div class="controls">
                            <div class="colorpicker-container">
                                <input id="color_link" type="text" class="txtColorPicker zo2_preset_variable" value="#184587" data-colorpicker-guid="12">
                                <span id="color_link_preview" class="color-preview" style="background-color: #184587"></span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label for="color_link_hover">Link hover</label>
                        </div>
                        <div class="controls">
                            <div class="colorpicker-container">
                                <input id="color_link_hover" type="text" class="txtColorPicker zo2_preset_variable" value="#5eaf28" data-colorpicker-guid="13">
                                <span id="color_link_hover_preview" class="color-preview" style="background-color: #5eaf28"></span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label for="color_link_hover">Bottom 1</label>
                        </div>
                        <div class="controls">
                            <div class="colorpicker-container">
                                <input id="color_bottom1" type="text" class="txtColorPicker zo2_preset_variable" value="" data-colorpicker-guid="14">
                                <span id="color_bottom1_preview" class="color-preview" style="background-color: transparent"></span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label for="color_link_hover">Bottom 2</label>
                        </div>
                        <div class="controls">
                            <div class="colorpicker-container">
                                <input id="color_bottom2" type="text" class="txtColorPicker zo2_preset_variable" value="" data-colorpicker-guid="15">
                                <span id="color_bottom2_preview" class="color-preview" style="background-color: transparent"></span>
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="control-label">
                            <label for="color_footer">Footer</label>
                        </div>
                        <div class="controls">
                            <div class="colorpicker-container">
                                <input id="color_footer" type="text" class="txtColorPicker zo2_preset_variable" value="#fb7a7a" data-colorpicker-guid="16">
                                <span id="color_footer_preview" class="color-preview" style="background-color: #fb7a7a"></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="zo2_themes_row clearfix">
                <div class="zo2_themes_label">
                    Other Preset Settings        </div>
                <div class="zo2_themes_form_container preset-setting">
                    <div class="zo2_themes_form">
                        <input type="button" class="btn add_more_preset" value="Add more">
                    </div>
                </div>



                <div class="zo2_themes_row clearfix">

                    <div class="zo2_themes_label">
                        Layout Style and Background            </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label class="hasTooltip" data-original-title="" title="">Choose layout</label>
                        </div>
                        <div class="controls">
                            <fieldset class="radio btn-group">
                                <input type="hidden" value="0" name="zo2_boxed_style" id="zo2_boxed_style">
                                <label class="btn layout_style_choose btn-success first">Full width layout</label>
                                <label class="btn layout_style_choose boxed">Boxed layout</label>
                            </fieldset>
                        </div>
                    </div>
                    <div class="zo2_background_and_pattern" style="display:none">
                        <div class="control-group">
                            <div class="control-label">
                                <label class="">Background Image</label>
                            </div>
                            <div class="controls">
                                <div class="input-prepend input-append">
                                    <div class="media-preview add-on">
                                        <span class="hasTipPreview" title=""><i class="icon-eye-open"></i></span>
                                    </div>
                                    <input type="text" name="zo2_background_image" id="zo2_background_image" value="" readonly="readonly" class="input-small">
                                    <a class="modal btn" title="Select" href="index.php?option=com_media&amp;view=images&amp;tmpl=component&amp;asset=com_templates&amp;author=&amp;fieldid=zo2_background_image&amp;folder=" rel="{handler: 'iframe', size: {x: 800, y: 500}}">
                                        Select                            </a>
                                    <a class="btn hasTooltip" title="" href="#" onclick="jInsertFieldValue('', 'zo2_background_image');
                                    return false;" data-original-title="Clear">
                                        <i class="icon-remove"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="zo2_themes_label">
                            Pattern Background                </div>
                        <div class="zo2_themes_form">
                            <ul class="options background-select">
                                <li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/congruent_outline.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/congruent_outline.png"></li><li class="selected"><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/congruent_pentagon.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/congruent_pentagon.png"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/dimension_@2X.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/dimension_@2X.png"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/fresh_snow_@2X.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/fresh_snow_@2X.png"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/index.html" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/index.html"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern10_black.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/pattern10_black.png"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern11_black.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/pattern11_black.png"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern12_black.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/pattern12_black.png"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern13_black.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/pattern13_black.png"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern14_black.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/pattern14_black.png"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern15_black.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/pattern15_black.png"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern15_white.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/pattern15_white.png"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern2_black.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/pattern2_black.png"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern3_black.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/pattern3_black.png"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern4_black.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/pattern4_black.png"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern5_black.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/pattern5_black.png"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern6_black.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/pattern6_black.png"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern7_black.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/pattern7_black.png"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern7_white.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/pattern7_white.png"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern8_black.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/pattern8_black.png"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern9_black.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/pattern9_black.png"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/tree_bark.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/tree_bark.png"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/triangular_@2X.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/triangular_@2X.png"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/tweed_@2X.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/tweed_@2X.png"></li><li class=""><img rel="templates/zo2_hallo/assets/zo2/images/background-patterns/wild_flowers.png" src="http://test.local/hallo142/templates/zo2_hallo/assets/zo2/images/background-patterns/wild_flowers.png"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>                        </div>
</div>
<div class="profiles-pane">
<h3 class="title-profile">Profile Assignment: Assign this layout profile to menu items.</h3>
<div class="profiles-pane-inner">

<!-- Menu assignment -->
<div id="profile-menu-assignment">
<ul class="menu-links thumbnails">
<li class="span3">
    <div class="thumbnail">
        <button class="btn" type="button" onclick="
                            $$('#profile-menu-assignment .mainmenu').each(function(el) {
                                el.checked = !el.checked;
                            });">
            <i class="icon-check"></i> Toggle Selection                    </button>
        <h5>Main Menu</h5>


        <label class="checkbox small" for="link435">
            <input type="checkbox" name="jform[profile-menu][]" value="435" id="link435" class="chk-menulink mainmenu">
            Home                        </label>

        <label class="checkbox small" for="link547">
            <input type="checkbox" name="jform[profile-menu][]" value="547" id="link547" class="chk-menulink mainmenu">
            Home Blue                        </label>

        <label class="checkbox small" for="link548">
            <input type="checkbox" name="jform[profile-menu][]" value="548" id="link548" class="chk-menulink mainmenu">
            Home Green                        </label>

        <label class="checkbox small" for="link549">
            <input type="checkbox" name="jform[profile-menu][]" value="549" id="link549" class="chk-menulink mainmenu">
            Home Orange                        </label>

        <label class="checkbox small" for="link550">
            <input type="checkbox" name="jform[profile-menu][]" value="550" id="link550" class="chk-menulink mainmenu">
            Home Boxed                        </label>

        <label class="checkbox small" for="link504">
            <input type="checkbox" name="jform[profile-menu][]" value="504" id="link504" class="chk-menulink mainmenu">
            Divider                        </label>

        <label class="checkbox small" for="link467">
            <input type="checkbox" name="jform[profile-menu][]" value="467" id="link467" class="chk-menulink mainmenu">
            Features                        </label>

        <label class="checkbox small" for="link468">
            <input type="checkbox" name="jform[profile-menu][]" value="468" id="link468" class="chk-menulink mainmenu">
            Shortcodes                        </label>

        <label class="checkbox small" for="link500">
            <input type="checkbox" name="jform[profile-menu][]" value="500" id="link500" class="chk-menulink mainmenu">
            Accordion                        </label>

        <label class="checkbox small" for="link501">
            <input type="checkbox" name="jform[profile-menu][]" value="501" id="link501" class="chk-menulink mainmenu">
            Blockquote                        </label>

        <label class="checkbox small" for="link502">
            <input type="checkbox" name="jform[profile-menu][]" value="502" id="link502" class="chk-menulink mainmenu">
            Buttons                        </label>

        <label class="checkbox small" for="link503">
            <input type="checkbox" name="jform[profile-menu][]" value="503" id="link503" class="chk-menulink mainmenu">
            Columns                        </label>

        <label class="checkbox small" for="link505">
            <input type="checkbox" name="jform[profile-menu][]" value="505" id="link505" class="chk-menulink mainmenu">
            Dropcap                        </label>

        <label class="checkbox small" for="link506">
            <input type="checkbox" name="jform[profile-menu][]" value="506" id="link506" class="chk-menulink mainmenu">
            Gallery                        </label>

        <label class="checkbox small" for="link507">
            <input type="checkbox" name="jform[profile-menu][]" value="507" id="link507" class="chk-menulink mainmenu">
            Google Map                        </label>

        <label class="checkbox small" for="link508">
            <input type="checkbox" name="jform[profile-menu][]" value="508" id="link508" class="chk-menulink mainmenu">
            Lightbox                        </label>

        <label class="checkbox small" for="link509">
            <input type="checkbox" name="jform[profile-menu][]" value="509" id="link509" class="chk-menulink mainmenu">
            List icon                        </label>

        <label class="checkbox small" for="link510">
            <input type="checkbox" name="jform[profile-menu][]" value="510" id="link510" class="chk-menulink mainmenu">
            Message Box                        </label>

        <label class="checkbox small" for="link511">
            <input type="checkbox" name="jform[profile-menu][]" value="511" id="link511" class="chk-menulink mainmenu">
            Pricing Tables                        </label>

        <label class="checkbox small" for="link512">
            <input type="checkbox" name="jform[profile-menu][]" value="512" id="link512" class="chk-menulink mainmenu">
            Social icon                        </label>

        <label class="checkbox small" for="link513">
            <input type="checkbox" name="jform[profile-menu][]" value="513" id="link513" class="chk-menulink mainmenu">
            Pricing Tables                        </label>

        <label class="checkbox small" for="link514">
            <input type="checkbox" name="jform[profile-menu][]" value="514" id="link514" class="chk-menulink mainmenu">
            Tabs                        </label>

        <label class="checkbox small" for="link515">
            <input type="checkbox" name="jform[profile-menu][]" value="515" id="link515" class="chk-menulink mainmenu">
            Testimonial                        </label>

        <label class="checkbox small" for="link516">
            <input type="checkbox" name="jform[profile-menu][]" value="516" id="link516" class="chk-menulink mainmenu">
            Toggle Box                        </label>

        <label class="checkbox small" for="link517">
            <input type="checkbox" name="jform[profile-menu][]" value="517" id="link517" class="chk-menulink mainmenu">
            Twitter                        </label>

        <label class="checkbox small" for="link518">
            <input type="checkbox" name="jform[profile-menu][]" value="518" id="link518" class="chk-menulink mainmenu">
            Vimeo                        </label>

        <label class="checkbox small" for="link491">
            <input type="checkbox" name="jform[profile-menu][]" value="491" id="link491" class="chk-menulink mainmenu">
            Joomla                        </label>

        <label class="checkbox small" for="link492">
            <input type="checkbox" name="jform[profile-menu][]" value="492" id="link492" class="chk-menulink mainmenu">
            Category Blog                        </label>

        <label class="checkbox small" for="link493">
            <input type="checkbox" name="jform[profile-menu][]" value="493" id="link493" class="chk-menulink mainmenu">
            Single Article                        </label>

        <label class="checkbox small" for="link494">
            <input type="checkbox" name="jform[profile-menu][]" value="494" id="link494" class="chk-menulink mainmenu">
            Contact                        </label>

        <label class="checkbox small" for="link495">
            <input type="checkbox" name="jform[profile-menu][]" value="495" id="link495" class="chk-menulink mainmenu">
            Login                        </label>

        <label class="checkbox small" for="link496">
            <input type="checkbox" name="jform[profile-menu][]" value="496" id="link496" class="chk-menulink mainmenu">
            Registration                        </label>

        <label class="checkbox small" for="link497">
            <input type="checkbox" name="jform[profile-menu][]" value="497" id="link497" class="chk-menulink mainmenu">
            404                        </label>

        <label class="checkbox small" for="link498">
            <input type="checkbox" name="jform[profile-menu][]" value="498" id="link498" class="chk-menulink mainmenu">
            Typography                        </label>

        <label class="checkbox small" for="link538">
            <input type="checkbox" name="jform[profile-menu][]" value="538" id="link538" class="chk-menulink mainmenu">
            Blog                        </label>
    </div>
</li>
<li class="span3">
    <div class="thumbnail">
        <button class="btn" type="button" onclick="
                            $$('#profile-menu-assignment .mainmenu-ar-aa').each(function(el) {
                                el.checked = !el.checked;
                            });">
            <i class="icon-check"></i> Toggle Selection                    </button>
        <h5>Main Menu ar-AA</h5>


        <label class="checkbox small" for="link541">
            <input type="checkbox" name="jform[profile-menu][]" value="541" id="link541" class="chk-menulink mainmenu-ar-aa">
            منزل                        </label>
    </div>
</li>
<li class="span3">
    <div class="thumbnail">
        <button class="btn" type="button" onclick="
                            $$('#profile-menu-assignment .mainmenu-en-gb').each(function(el) {
                                el.checked = !el.checked;
                            });">
            <i class="icon-check"></i> Toggle Selection                    </button>
        <h5>Main Menu en-GB</h5>


        <label class="checkbox small" for="link540">
            <input type="checkbox" name="jform[profile-menu][]" value="540" id="link540" class="chk-menulink mainmenu-en-gb">
            Home                        </label>
    </div>
</li>
<li class="span3">
    <div class="thumbnail">
        <button class="btn" type="button" onclick="
                            $$('#profile-menu-assignment .shortcode').each(function(el) {
                                el.checked = !el.checked;
                            });">
            <i class="icon-check"></i> Toggle Selection                    </button>
        <h5>Shortcodes</h5>


        <label class="checkbox small" for="link519">
            <input type="checkbox" name="jform[profile-menu][]" value="519" id="link519" class="chk-menulink shortcode">
            Accordion                        </label>

        <label class="checkbox small" for="link520">
            <input type="checkbox" name="jform[profile-menu][]" value="520" id="link520" class="chk-menulink shortcode">
            Blockquote                        </label>

        <label class="checkbox small" for="link521">
            <input type="checkbox" name="jform[profile-menu][]" value="521" id="link521" class="chk-menulink shortcode">
            Buttons                        </label>

        <label class="checkbox small" for="link522">
            <input type="checkbox" name="jform[profile-menu][]" value="522" id="link522" class="chk-menulink shortcode">
            Columns                        </label>

        <label class="checkbox small" for="link523">
            <input type="checkbox" name="jform[profile-menu][]" value="523" id="link523" class="chk-menulink shortcode">
            Divider                        </label>

        <label class="checkbox small" for="link524">
            <input type="checkbox" name="jform[profile-menu][]" value="524" id="link524" class="chk-menulink shortcode">
            Dropcap                        </label>

        <label class="checkbox small" for="link525">
            <input type="checkbox" name="jform[profile-menu][]" value="525" id="link525" class="chk-menulink shortcode">
            Gallery                        </label>

        <label class="checkbox small" for="link526">
            <input type="checkbox" name="jform[profile-menu][]" value="526" id="link526" class="chk-menulink shortcode">
            Google Map                        </label>

        <label class="checkbox small" for="link527">
            <input type="checkbox" name="jform[profile-menu][]" value="527" id="link527" class="chk-menulink shortcode">
            Lightbox                        </label>

        <label class="checkbox small" for="link528">
            <input type="checkbox" name="jform[profile-menu][]" value="528" id="link528" class="chk-menulink shortcode">
            List icon                        </label>

        <label class="checkbox small" for="link529">
            <input type="checkbox" name="jform[profile-menu][]" value="529" id="link529" class="chk-menulink shortcode">
            Message Box                        </label>

        <label class="checkbox small" for="link530">
            <input type="checkbox" name="jform[profile-menu][]" value="530" id="link530" class="chk-menulink shortcode">
            Pricing Tables                        </label>

        <label class="checkbox small" for="link531">
            <input type="checkbox" name="jform[profile-menu][]" value="531" id="link531" class="chk-menulink shortcode">
            Social icon                        </label>

        <label class="checkbox small" for="link533">
            <input type="checkbox" name="jform[profile-menu][]" value="533" id="link533" class="chk-menulink shortcode">
            Tabs                        </label>

        <label class="checkbox small" for="link534">
            <input type="checkbox" name="jform[profile-menu][]" value="534" id="link534" class="chk-menulink shortcode">
            Testimonial                        </label>

        <label class="checkbox small" for="link535">
            <input type="checkbox" name="jform[profile-menu][]" value="535" id="link535" class="chk-menulink shortcode">
            Toggle Box                        </label>

        <label class="checkbox small" for="link536">
            <input type="checkbox" name="jform[profile-menu][]" value="536" id="link536" class="chk-menulink shortcode">
            Twitter                        </label>

        <label class="checkbox small" for="link537">
            <input type="checkbox" name="jform[profile-menu][]" value="537" id="link537" class="chk-menulink shortcode">
            Vimeo                        </label>
    </div>
</li>
<li class="span3">
    <div class="thumbnail">
        <button class="btn" type="button" onclick="
                            $$('#profile-menu-assignment .top-menu').each(function(el) {
                                el.checked = !el.checked;
                            });">
            <i class="icon-check"></i> Toggle Selection                    </button>
        <h5>Top Menu</h5>


        <label class="checkbox small" for="link473">
            <input type="checkbox" name="jform[profile-menu][]" value="473" id="link473" class="chk-menulink top-menu">
            Blogs                        </label>

        <label class="checkbox small" for="link474">
            <input type="checkbox" name="jform[profile-menu][]" value="474" id="link474" class="chk-menulink top-menu">
            Contacts                        </label>

        <label class="checkbox small" for="link475">
            <input type="checkbox" name="jform[profile-menu][]" value="475" id="link475" class="chk-menulink top-menu">
            Login                        </label>
    </div>
</li>
<li class="span3">
    <div class="thumbnail">
        <button class="btn" type="button" onclick="
                            $$('#profile-menu-assignment .usermenu').each(function(el) {
                                el.checked = !el.checked;
                            });">
            <i class="icon-check"></i> Toggle Selection                    </button>
        <h5>User Menu</h5>


        <label class="checkbox small" for="link201">
            <input type="checkbox" name="jform[profile-menu][]" value="201" id="link201" class="chk-menulink usermenu">
            Your Profile                        </label>

        <label class="checkbox small" for="link449">
            <input type="checkbox" name="jform[profile-menu][]" value="449" id="link449" class="chk-menulink usermenu">
            Submit an Article                        </label>

        <label class="checkbox small" for="link450">
            <input type="checkbox" name="jform[profile-menu][]" value="450" id="link450" class="chk-menulink usermenu">
            Submit a Web Link                        </label>

        <label class="checkbox small" for="link448">
            <input type="checkbox" name="jform[profile-menu][]" value="448" id="link448" class="chk-menulink usermenu">
            Site Administrator                        </label>
    </div>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="tab-pane" id="megamenu">
<div class="profiles-pane">
<h3 class="title-profile">Mega Menus</h3>
<div class="profiles-pane-inner">

<div class="control-group">
    <div class="control-label">
    </div>
    <div class="controls">
    </div>
</div>
<div class="control-group">
    <div class="control-label">
        <label id="jform_params_hover_type-lbl" for="jform_params_hover_type" class="hasTooltip" title="" data-original-title="<strong>Hover type</strong>">Hover type</label>        </div>
    <div class="controls">
        <select id="jform_params_hover_type" name="jform[params][hover_type]">
            <option value="hover" selected="selected">Mouse Hover</option>
            <option value="click">Mouse Click</option>
        </select>
    </div>
</div>
<div class="control-group">
    <div class="control-label">
        <label id="jform_params_nav_type-lbl" for="jform_params_nav_type" class="hasTooltip" title="" data-original-title="<strong>Navigation type</strong>">Navigation type</label>        </div>
    <div class="controls">
        <select id="jform_params_nav_type" name="jform[params][nav_type]">
            <option value="megamenu" selected="selected">Megamenu</option>
        </select>
    </div>
</div>
<div class="control-group">
    <div class="control-label">
        <label id="jform_params_animation-lbl" for="jform_params_animation" class="hasTooltip" title="" data-original-title="<strong>Animation</strong>">Animation</label>        </div>
    <div class="controls">
        <select id="jform_params_animation" name="jform[params][animation]">
            <option value="">None</option>
            <option value="fading">Fading</option>
            <option value="slide">Slide</option>
            <option value="zoom" selected="selected">Zoom</option>
            <option value="elastic">Elastic</option>
        </select>
    </div>
</div>
<div class="control-group">
    <div class="control-label">
        <label id="jform_params_duration-lbl" for="jform_params_duration" class="hasTooltip" title="" data-original-title="<strong>Duration</strong>">Duration</label>        </div>
    <div class="controls">
        <input type="text" name="jform[params][duration]" id="jform_params_duration" value="400">        </div>
</div>
<div class="control-group">
    <div class="control-label">
        <label id="jform_params_show_submenu-lbl" for="jform_params_show_submenu" class="hasTooltip" title="" data-original-title="<strong>Show submenu</strong>">Show submenu</label>        </div>
    <div class="controls">
        <fieldset id="jform_params_show_submenu" class="radio btn-group"><input type="radio" id="jform_params_show_submenu0" name="jform[params][show_submenu]" value="0" style="display: none;"><label for="jform_params_show_submenu0" class="btn first">No</label><input type="radio" id="jform_params_show_submenu1" name="jform[params][show_submenu]" value="1" checked="checked" style="display: none;"><label for="jform_params_show_submenu1" class="btn active btn-success">Yes</label></fieldset>        </div>
</div>
<div class="control-group">
    <div class="control-label">
        <label id="jform_params_menu_type-lbl" for="jform_params_menu_type" class="hasTooltip" title="" data-original-title="<strong>Menu type</strong>" aria-invalid="false">Menu type</label>        </div>
    <div class="controls">
        <script type="text/javascript">         jQuery(window).on('load', function(){             Assets.ajax('jform[params][menu_type]', {"url":"http:\/\/test.local\/hallo142\/index.php?zo2controller=menu&task=display"});         })</script><select id="jform_params_menu_type" name="jform[params][menu_type]">
            <option value="mainmenu" selected="selected">Main Menu</option>
            <option value="mainmenu-ar-aa">Main Menu ar-AA</option>
            <option value="mainmenu-en-gb">Main Menu en-GB</option>
            <option value="shortcode">Shortcodes</option>
            <option value="top-menu">Top Menu</option>
            <option value="usermenu">User Menu</option>
        </select><div class="progress progress-striped zo2-progress active" style="display: none;"><div class="bar" style="width: 100%"></div></div>
    </div>
</div>
<div class="control-group">
<div class="control-label">
    <label id="jform_params_menu_config-lbl" for="jform_params_menu_config" class=""></label>        </div>
<div class="controls">
<div id="zo2-admin-megamenu" class="zo2-admin-megamenu">
<div class="admin-inline-toolbox clearfix">
<div class="zo2-admin-mm-row clearfix">

<div id="zo2-admin-mm-intro" class="pull-left">
    <h3>Megamenu Toolbox</h3>
    <p>This toolbox includes all settings of megamenu, just select menu then configure. There are 3 level of configuration: sub-megamenu setting, column setting and menu item setting.</p>
</div>

<div id="zo2-admin-mm-tb">
<div id="zo2-admin-mm-toolitem" class="admin-toolbox" style="display: none;">
    <h3>Item Configuration</h3>
    <ul>
        <li>
            <label class="hasTip" title="">Submenu</label>
            <fieldset class="radio btn-group toolitem-sub">
                <input type="radio" id="toggleSub0" class="toolbox-toggle" data-action="toggleSub" name="toggleSub" value="0" style="display: none;">
                <label for="toggleSub0" class="btn first">No</label>
                <input type="radio" id="toggleSub1" class="toolbox-toggle" data-action="toggleSub" name="toggleSub" value="1" checked="checked" style="display: none;">
                <label for="toggleSub1" class="btn active btn-success">Yes</label>
            </fieldset>
        </li>
    </ul>
    <ul>
        <li>
            <label class="hasTip" title="">Group</label>
            <fieldset class="radio btn-group toolitem-group">
                <input type="radio" id="toggleGroup0" class="toolbox-toggle" data-action="toggleGroup" name="toggleGroup" value="0" style="display: none;">
                <label for="toggleGroup0" class="btn first">No</label>
                <input type="radio" id="toggleGroup1" class="toolbox-toggle" data-action="toggleGroup" name="toggleGroup" value="1" checked="checked" style="display: none;">
                <label for="toggleGroup1" class="btn active btn-success">Yes</label>
            </fieldset>
        </li>
    </ul>
    <ul>
        <li>
            <label class="hasTip" title="">Positions</label>
            <fieldset class="btn-group">
                <a href="" class="btn toolitem-moveleft toolbox-action" data-action="moveItemsLeft" title="Move to Left Column"><i class="icon-arrow-left"></i></a>
                <a href="" class="btn toolitem-moveright toolbox-action" data-action="moveItemsRight" title="Move to Right Column"><i class="icon-arrow-right"></i></a>
            </fieldset>
        </li>
    </ul>
    <ul>
        <li>
            <label class="hasTip" title="">Extra Class</label>
            <fieldset class="">
                <input type="text" class="input-medium toolitem-exclass toolbox-input" name="toolitem-exclass" data-name="class" value="">
            </fieldset>
        </li>
    </ul>
    <ul>
        <li>
            <label class="hasTip" title="">
                <a href="http://fortawesome.github.io/Font-Awesome/#icons-web-app" target="_blank"><i class="icon-search"></i>Icon</a>
            </label>
            <fieldset class="">
                <input type="text" class="input-medium toolitem-xicon toolbox-input" name="toolitem-xicon" data-name="xicon" value="">
            </fieldset>
        </li>
    </ul>
    <ul>
        <li>
            <label class="hasTip" title="">
                Item caption                                    </label>
            <fieldset class="">
                <input type="text" class="input-large toolitem-caption toolbox-input" name="toolitem-caption" data-name="caption" value="">
            </fieldset>
        </li>
    </ul>
</div>

<div id="zo2-admin-mm-toolsub" class="admin-toolbox" style="display: none;">
    <h3>Submenu Configuration</h3>
    <ul>
        <li>
            <label class="hasTip" title="">Add row</label>
            <fieldset class="btn-group">
                <a href="" class="btn toolsub-addrow toolbox-action" data-action="addRow"><i class="icon-plus"></i></a>
            </fieldset>
        </li>
    </ul>
    <ul>
        <li>
            <label class="hasTip" title="">Hide when collapse</label>
            <fieldset class="radio btn-group toolsub-hidewhencollapse">
                <input type="radio" id="togglesubHideWhenCollapse0" class="toolbox-toggle" data-action="hideWhenCollapse" name="togglesubHideWhenCollapse" value="0" checked="checked" style="display: none;">
                <label for="togglesubHideWhenCollapse0" class="btn active btn-danger first">No</label>
                <input type="radio" id="togglesubHideWhenCollapse1" class="toolbox-toggle" data-action="hideWhenCollapse" name="togglesubHideWhenCollapse" value="1" style="display: none;">
                <label for="togglesubHideWhenCollapse1" class="btn">Yes</label>
            </fieldset>
        </li>
    </ul>
    <ul>
        <li>
            <label class="hasTip" title="">Submenu Width (px)</label>
            <fieldset class="">
                <input type="text" class="toolsub-width toolbox-input input-small" name="toolsub-width" data-name="width" value="">
            </fieldset>
        </li>
    </ul>
    <ul>
        <li>
            <label class="hasTip" title="">Alignment</label>
            <fieldset class="toolsub-alignment">
                <div class="btn-group">
                    <a class="btn toolsub-align-left toolbox-action" href="#" data-action="alignment" data-align="left" title="Left"><i class="icon-align-left"></i></a>
                    <a class="btn toolsub-align-right toolbox-action" href="#" data-action="alignment" data-align="right" title="Right"><i class="icon-align-right"></i></a>
                    <a class="btn toolsub-align-center toolbox-action" href="#" data-action="alignment" data-align="center" title="Center"><i class="icon-align-center"></i></a>
                    <a class="btn toolsub-align-justify toolbox-action" href="#" data-action="alignment" data-align="justify" title="Justify"><i class="icon-align-justify"></i></a>
                </div>
            </fieldset>
        </li>
    </ul>
    <ul>
        <li>
            <label class="hasTip" title="">Extra Class</label>
            <fieldset class="">
                <input type="text" class="toolsub-exclass toolbox-input input-medium" name="toolsub-exclass" data-name="class" value="">
            </fieldset>
        </li>
    </ul>
</div>

<div id="zo2-admin-mm-toolcol" class="admin-toolbox" style="display: none;">
    <h3>Column Configuration</h3>
    <ul>
        <li>
            <label class="hasTip" title="">Add/remove Column</label>
            <fieldset class="btn-group">
                <a href="" class="btn toolcol-addcol toolbox-action" data-action="addColumn"><i class="icon-plus"></i></a>
                <a href="" class="btn toolcol-removecol toolbox-action" data-action="removeColumn"><i class="icon-minus"></i></a>
            </fieldset>
        </li>
    </ul>
    <ul>
        <li>
            <label class="hasTip" title="">Hide when collapse</label>
            <fieldset class="radio btn-group toolcol-hidewhencollapse">
                <input type="radio" id="toggleHideWhenCollapse0" class="toolbox-toggle" data-action="hideWhenCollapse" name="toggleHideWhenCollapse" value="0" checked="checked" style="display: none;">
                <label for="toggleHideWhenCollapse0" class="btn active btn-danger first">No</label>
                <input type="radio" id="toggleHideWhenCollapse1" class="toolbox-toggle" data-action="hideWhenCollapse" name="toggleHideWhenCollapse" value="1" style="display: none;">
                <label for="toggleHideWhenCollapse1" class="btn">Yes</label>
            </fieldset>
        </li>
    </ul>
    <ul>
        <li>
            <label class="hasTip" title="">Width (1-12)</label>
            <fieldset class="">
                <select class="toolcol-width toolbox-input toolbox-select input-mini" name="toolcol-width" data-name="width">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </fieldset>
        </li>
    </ul>
    <ul>
        <li>
            <label class="hasTip" title="">Module</label>
            <fieldset class="">
                <select class="toolcol-module toolbox-input toolbox-select input-medium" name="toolcol-module" data-name="module_id" data-placeholder="Select Module">
                    <option value=""></option>
                    <option value="29">Articles Most Read</option>
                    <option value="30">Feed Display</option>
                    <option value="31">News Flash</option>
                    <option value="33">Random Image</option>
                    <option value="34">Articles Related Items</option>
                    <option value="36">Statistics</option>
                    <option value="38">Users Latest</option>
                    <option value="39">Who's Online</option>
                    <option value="40">Wrapper</option>
                    <option value="41">Footer</option>
                    <option value="49">Weblinks</option>
                    <option value="52">Breadcrumbs</option>
                    <option value="56">Banners</option>
                    <option value="61">Articles Categories</option>
                    <option value="84">Smart Search Module</option>
                    <option value="88">Newsletter and up to date!</option>
                    <option value="91">About ZO2 Framework</option>
                    <option value="92">Recent Post</option>
                    <option value="93">Lightbox Gallery</option>
                    <option value="104">Breadcrumbs</option>
                    <option value="104">Breadcrumbs</option>
                    <option value="104">Breadcrumbs</option>
                    <option value="104">Breadcrumbs</option>
                    <option value="104">Breadcrumbs</option>
                    <option value="104">Breadcrumbs</option>
                    <option value="111">Custom Module</option>
                    <option value="108">HTML5</option>
                    <option value="109">LESS</option>
                    <option value="110">Random Images</option>
                    <option value="90">Hello</option>
                    <option value="90">Hello</option>
                    <option value="90">Hello</option>
                    <option value="90">Hello</option>
                    <option value="90">Hello</option>
                    <option value="90">Hello</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="106">Shortcodes</option>
                    <option value="94">Recent news from blog</option>
                    <option value="63">Search</option>
                    <option value="17">Breadcrumbs</option>
                    <option value="48">Image Module</option>
                    <option value="28">Latest Article</option>
                    <option value="19">User Menu</option>
                    <option value="16">Login Form</option>
                    <option value="107">Categories</option>
                    <option value="107">Categories</option>
                    <option value="107">Categories</option>
                    <option value="107">Categories</option>
                    <option value="107">Categories</option>
                    <option value="107">Categories</option>
                    <option value="107">Categories</option>
                    <option value="107">Categories</option>
                    <option value="112">Popular Tags</option>
                    <option value="35">Search</option>
                    <option value="89">Slide</option>
                    <option value="37">Syndicate Feeds</option>
                    <option value="64">Language Switcher</option>
                    <option value="87">Top social</option>
                    <option value="105">Video menu</option>
                </select>
            </fieldset>
        </li>
    </ul>
    <ul>
        <li>
            <label class="hasTip" title="">Extra Class</label>
            <fieldset class="">
                <input type="text" class="input-medium toolcol-exclass toolbox-input" name="toolcol-exclass" data-name="class" value="">
            </fieldset>
        </li>
    </ul>
</div>
</div>

<div class="toolbox-actions-group">
    <button class="btn btn-success toolbox-action toolbox-saveConfig hide" data-action="saveConfig"><i class="icon-save"></i>Save</button>
</div>

</div>
</div>

<div id="zo2-admin-mm-container" class="navbar clearfix"><div class="zo2-megamenu animate zoom" data-duration="400" data-hover="hover"><ul class="nav navbar-nav level-top"><li class="dropdown mega" data-id="435" data-level="1"><a class="dropdown-toggle" href="/hallo142/index.php?lang=en" data-toggle="dropdown">Home<b class="caret"></b></a><div class="menu-child  dropdown-menu mega-dropdown-menu"><div class="mega-dropdown-inner"><div class="row-fluid"><div class="span12 mega-col-nav" data-width="12"><div class="mega-inner"><ul class="mega-nav level1"><li class="" data-id="547" data-level="2"><a class="" href="/hallo142/index.php?option=com_content&amp;view=featured&amp;Itemid=547&amp;lang=en">Home Blue<b class="caret"></b></a></li><li class="" data-id="548" data-level="2"><a class="" href="/hallo142/index.php?option=com_content&amp;view=featured&amp;Itemid=548&amp;lang=en">Home Green<b class="caret"></b></a></li><li class="" data-id="549" data-level="2"><a class="" href="/hallo142/index.php?option=com_content&amp;view=featured&amp;Itemid=549&amp;lang=en">Home Orange<b class="caret"></b></a></li><li class="dropdown-submenu mega" data-id="550" data-level="2"><a class="" href="/hallo142/index.php?option=com_content&amp;view=featured&amp;Itemid=550&amp;lang=en">Home Boxed<b class="caret"></b></a><div class="menu-child  dropdown-menu mega-dropdown-menu"><div class="mega-dropdown-inner"><div class="row-fluid"><div class="span12 mega-col-nav" data-width="12"><div class="mega-inner"><ul class="mega-nav level2"><li class="" data-id="504" data-level="3"><a class="" href="/hallo142/index.php?option=com_content&amp;view=article&amp;id=9&amp;Itemid=504&amp;lang=en">Divider<b class="caret"></b></a></li></ul></div></div></div></div></div></li></ul></div></div></div></div></div></li><li class="" data-id="467" data-level="1"><a class="" href="/hallo142/index.php?option=com_content&amp;view=article&amp;id=1&amp;Itemid=467&amp;lang=en">Features<b class="caret"></b></a></li><li class="dropdown mega" data-id="468" data-level="1"><a class="dropdown-toggle" href="/hallo142/index.php?option=com_content&amp;view=article&amp;id=1&amp;Itemid=468&amp;lang=en" data-toggle="dropdown">Shortcodes<b class="caret"></b></a><div style="width:400px" class="menu-child  dropdown-menu mega-dropdown-menu" data-width="400"><div class="mega-dropdown-inner"><div class="row-fluid"><div class="span6 mega-col-nav" data-width="6"><div class="mega-inner"><ul class="mega-nav level1"><li class="" data-id="500" data-level="2"><a class="" href="/hallo142/index.php?option=com_content&amp;view=article&amp;id=5&amp;Itemid=500&amp;lang=en">Accordion<b class="caret"></b></a></li><li class="" data-id="501" data-level="2"><a class="" href="/hallo142/index.php?option=com_content&amp;view=article&amp;id=6&amp;Itemid=501&amp;lang=en">Blockquote<b class="caret"></b></a></li><li class="" data-id="502" data-level="2"><a class="" href="/hallo142/index.php?option=com_content&amp;view=article&amp;id=7&amp;Itemid=502&amp;lang=en">Buttons<b class="caret"></b></a></li><li class="" data-id="503" data-level="2"><a class="" href="/hallo142/index.php?option=com_content&amp;view=article&amp;id=8&amp;Itemid=503&amp;lang=en">Columns<b class="caret"></b></a></li><li class="" data-id="505" data-level="2"><a class="" href="/hallo142/index.php?option=com_content&amp;view=article&amp;id=10&amp;Itemid=505&amp;lang=en">Dropcap<b class="caret"></b></a></li><li class="" data-id="506" data-level="2"><a class="" href="/hallo142/index.php?option=com_content&amp;view=article&amp;id=11&amp;Itemid=506&amp;lang=en">Gallery<b class="caret"></b></a></li><li class="" data-id="508" data-level="2"><a class="" href="/hallo142/index.php?option=com_content&amp;view=article&amp;id=12&amp;Itemid=508&amp;lang=en">Lightbox<b class="caret"></b></a></li></ul></div></div><div class="span6 mega-col-nav" data-width="6"><div class="mega-inner"><ul class="mega-nav level1"><li class="" data-id="509" data-level="2"><a class="" href="/hallo142/index.php?option=com_content&amp;view=article&amp;id=27&amp;Itemid=509&amp;lang=en">List icon<b class="caret"></b></a></li><li class="" data-id="510" data-level="2"><a class="" href="/hallo142/index.php?option=com_content&amp;view=article&amp;id=13&amp;Itemid=510&amp;lang=en">Message Box<b class="caret"></b></a></li><li class="" data-id="513" data-level="2"><a class="" href="/hallo142/index.php?option=com_content&amp;view=article&amp;id=14&amp;Itemid=513&amp;lang=en">Pricing Tables<b class="caret"></b></a></li><li class="" data-id="514" data-level="2"><a class="" href="/hallo142/index.php?option=com_content&amp;view=article&amp;id=17&amp;Itemid=514&amp;lang=en">Tabs<b class="caret"></b></a></li><li class="" data-id="515" data-level="2"><a class="" href="/hallo142/index.php?option=com_content&amp;view=article&amp;id=18&amp;Itemid=515&amp;lang=en">Testimonial<b class="caret"></b></a></li><li class="" data-id="517" data-level="2"><a class="" href="/hallo142/index.php?option=com_content&amp;view=article&amp;id=3&amp;Itemid=517&amp;lang=en">Twitter<b class="caret"></b></a></li><li class="" data-id="518" data-level="2"><a class="" href="/hallo142/index.php?option=com_content&amp;view=article&amp;id=20&amp;Itemid=518&amp;lang=en">Vimeo<b class="caret"></b></a></li></ul></div></div></div></div></div></li><li class="dropdown mega" data-id="491" data-level="1"><a class="dropdown-toggle" href="/hallo142/index.php?option=com_content&amp;view=article&amp;id=21&amp;Itemid=491&amp;lang=en" data-toggle="dropdown">Joomla<b class="caret"></b></a><div class="menu-child  dropdown-menu mega-dropdown-menu"><div class="mega-dropdown-inner"><div class="row-fluid"><div class="span12 mega-col-nav" data-width="12"><div class="mega-inner"><ul class="mega-nav level1"><li class="" data-id="492" data-level="2"><a class="" href="/hallo142/index.php?option=com_content&amp;view=category&amp;layout=blog&amp;id=9&amp;Itemid=492&amp;lang=en">Category Blog<b class="caret"></b></a></li><li class="" data-id="493" data-level="2"><a class="" href="/hallo142/index.php?option=com_content&amp;view=article&amp;id=24&amp;Itemid=493&amp;lang=en">Single Article<b class="caret"></b></a></li><li class="" data-id="494" data-level="2"><a class="" href="/hallo142/index.php?option=com_contact&amp;view=contact&amp;id=1&amp;Itemid=494&amp;lang=en">Contact<b class="caret"></b></a></li><li class="" data-id="495" data-level="2"><a class="" href="/hallo142/index.php?option=com_users&amp;view=login&amp;Itemid=495&amp;lang=en">Login<b class="caret"></b></a></li><li class="" data-id="496" data-level="2"><a class="" href="/hallo142/index.php?option=com_users&amp;view=registration&amp;Itemid=496&amp;lang=en">Registration<b class="caret"></b></a></li><li class="" data-id="497" data-level="2"><a class="" href="/hallo142/index.php?option=404&amp;Itemid=497&amp;lang=en">404<b class="caret"></b></a></li></ul></div></div></div></div></div></li><li class="" data-id="498" data-level="1"><a class="" href="/hallo142/index.php?option=com_content&amp;view=article&amp;id=26&amp;Itemid=498&amp;lang=en">Typography<b class="caret"></b></a></li><li class="" data-id="538" data-level="1"><a class="" href="/hallo142/index.php?option=com_content&amp;view=category&amp;layout=blog&amp;id=11&amp;Itemid=538&amp;lang=en">Blog<b class="caret"></b></a></li></ul></div></div>
</div>

<input type="hidden" name="jform[params][menu_config]" id="jform_params_menu_config" value="{&quot;mainmenu&quot;:{&quot;item-435&quot;:{&quot;submenu&quot;:{&quot;rows&quot;:[[{&quot;item&quot;:547,&quot;width&quot;:12}]]}},&quot;item-550&quot;:{&quot;submenu&quot;:{&quot;rows&quot;:[[{&quot;item&quot;:504,&quot;width&quot;:12}]]}},&quot;item-468&quot;:{&quot;submenu&quot;:{&quot;width&quot;:400,&quot;rows&quot;:[[{&quot;item&quot;:500,&quot;width&quot;:6},{&quot;item&quot;:509,&quot;width&quot;:6}]]}},&quot;item-491&quot;:{&quot;submenu&quot;:{&quot;rows&quot;:[[{&quot;item&quot;:492,&quot;width&quot;:12}]]}}}}">
</div>
</div>
</div>
</div>
</div>
<div class="tab-pane" id="assignment">
<div class="profiles-pane">
<h3 class="title-profile">Assignment</h3>
<div class="profiles-pane-inner">
<label id="jform_menuselect-lbl" for="jform_menuselect">Menu Selection:</label>
<div class="btn-toolbar">
    <button class="btn" type="button" onclick="$$('.chk-menulink').each(function(el) {
                el.checked = !el.checked;
            });">
        <i class="icon-check"></i> Toggle Selection    </button>
</div>
<div id="menu-assignment">
<ul class="menu-links thumbnails">

<li class="span3">
    <div class="thumbnail">
        <button class="btn" type="button" onclick="$$('.mainmenu').each(function(el) {
                                el.checked = !el.checked;
                            });">
            <i class="icon-check"></i> Toggle Selection                    </button>
        <h5>Main Menu</h5>

        <label class="checkbox small" for="link435">
            <input type="checkbox" name="jform[assigned][]" value="435" id="link435" checked="checked" class="chk-menulink mainmenu">
            Home                        </label>
        <label class="checkbox small" for="link547">
            <input type="checkbox" name="jform[assigned][]" value="547" id="link547" class="chk-menulink mainmenu">
            Home Blue                        </label>
        <label class="checkbox small" for="link548">
            <input type="checkbox" name="jform[assigned][]" value="548" id="link548" class="chk-menulink mainmenu">
            Home Green                        </label>
        <label class="checkbox small" for="link549">
            <input type="checkbox" name="jform[assigned][]" value="549" id="link549" class="chk-menulink mainmenu">
            Home Orange                        </label>
        <label class="checkbox small" for="link550">
            <input type="checkbox" name="jform[assigned][]" value="550" id="link550" class="chk-menulink mainmenu">
            Home Boxed                        </label>
        <label class="checkbox small" for="link504">
            <input type="checkbox" name="jform[assigned][]" value="504" id="link504" class="chk-menulink mainmenu">
            Divider                        </label>
        <label class="checkbox small" for="link467">
            <input type="checkbox" name="jform[assigned][]" value="467" id="link467" class="chk-menulink mainmenu">
            Features                        </label>
        <label class="checkbox small" for="link468">
            <input type="checkbox" name="jform[assigned][]" value="468" id="link468" class="chk-menulink mainmenu">
            Shortcodes                        </label>
        <label class="checkbox small" for="link500">
            <input type="checkbox" name="jform[assigned][]" value="500" id="link500" class="chk-menulink mainmenu">
            Accordion                        </label>
        <label class="checkbox small" for="link501">
            <input type="checkbox" name="jform[assigned][]" value="501" id="link501" class="chk-menulink mainmenu">
            Blockquote                        </label>
        <label class="checkbox small" for="link502">
            <input type="checkbox" name="jform[assigned][]" value="502" id="link502" class="chk-menulink mainmenu">
            Buttons                        </label>
        <label class="checkbox small" for="link503">
            <input type="checkbox" name="jform[assigned][]" value="503" id="link503" class="chk-menulink mainmenu">
            Columns                        </label>
        <label class="checkbox small" for="link505">
            <input type="checkbox" name="jform[assigned][]" value="505" id="link505" class="chk-menulink mainmenu">
            Dropcap                        </label>
        <label class="checkbox small" for="link506">
            <input type="checkbox" name="jform[assigned][]" value="506" id="link506" class="chk-menulink mainmenu">
            Gallery                        </label>
        <label class="checkbox small" for="link507">
            <input type="checkbox" name="jform[assigned][]" value="507" id="link507" class="chk-menulink mainmenu">
            Google Map                        </label>
        <label class="checkbox small" for="link508">
            <input type="checkbox" name="jform[assigned][]" value="508" id="link508" class="chk-menulink mainmenu">
            Lightbox                        </label>
        <label class="checkbox small" for="link509">
            <input type="checkbox" name="jform[assigned][]" value="509" id="link509" class="chk-menulink mainmenu">
            List icon                        </label>
        <label class="checkbox small" for="link510">
            <input type="checkbox" name="jform[assigned][]" value="510" id="link510" class="chk-menulink mainmenu">
            Message Box                        </label>
        <label class="checkbox small" for="link511">
            <input type="checkbox" name="jform[assigned][]" value="511" id="link511" class="chk-menulink mainmenu">
            Pricing Tables                        </label>
        <label class="checkbox small" for="link512">
            <input type="checkbox" name="jform[assigned][]" value="512" id="link512" class="chk-menulink mainmenu">
            Social icon                        </label>
        <label class="checkbox small" for="link513">
            <input type="checkbox" name="jform[assigned][]" value="513" id="link513" class="chk-menulink mainmenu">
            Pricing Tables                        </label>
        <label class="checkbox small" for="link514">
            <input type="checkbox" name="jform[assigned][]" value="514" id="link514" class="chk-menulink mainmenu">
            Tabs                        </label>
        <label class="checkbox small" for="link515">
            <input type="checkbox" name="jform[assigned][]" value="515" id="link515" class="chk-menulink mainmenu">
            Testimonial                        </label>
        <label class="checkbox small" for="link516">
            <input type="checkbox" name="jform[assigned][]" value="516" id="link516" class="chk-menulink mainmenu">
            Toggle Box                        </label>
        <label class="checkbox small" for="link517">
            <input type="checkbox" name="jform[assigned][]" value="517" id="link517" class="chk-menulink mainmenu">
            Twitter                        </label>
        <label class="checkbox small" for="link518">
            <input type="checkbox" name="jform[assigned][]" value="518" id="link518" class="chk-menulink mainmenu">
            Vimeo                        </label>
        <label class="checkbox small" for="link491">
            <input type="checkbox" name="jform[assigned][]" value="491" id="link491" class="chk-menulink mainmenu">
            Joomla                        </label>
        <label class="checkbox small" for="link492">
            <input type="checkbox" name="jform[assigned][]" value="492" id="link492" class="chk-menulink mainmenu">
            Category Blog                        </label>
        <label class="checkbox small" for="link493">
            <input type="checkbox" name="jform[assigned][]" value="493" id="link493" class="chk-menulink mainmenu">
            Single Article                        </label>
        <label class="checkbox small" for="link494">
            <input type="checkbox" name="jform[assigned][]" value="494" id="link494" class="chk-menulink mainmenu">
            Contact                        </label>
        <label class="checkbox small" for="link495">
            <input type="checkbox" name="jform[assigned][]" value="495" id="link495" class="chk-menulink mainmenu">
            Login                        </label>
        <label class="checkbox small" for="link496">
            <input type="checkbox" name="jform[assigned][]" value="496" id="link496" class="chk-menulink mainmenu">
            Registration                        </label>
        <label class="checkbox small" for="link497">
            <input type="checkbox" name="jform[assigned][]" value="497" id="link497" class="chk-menulink mainmenu">
            404                        </label>
        <label class="checkbox small" for="link498">
            <input type="checkbox" name="jform[assigned][]" value="498" id="link498" class="chk-menulink mainmenu">
            Typography                        </label>
        <label class="checkbox small" for="link538">
            <input type="checkbox" name="jform[assigned][]" value="538" id="link538" class="chk-menulink mainmenu">
            Blog                        </label>
    </div>
</li>
<li class="span3">
    <div class="thumbnail">
        <button class="btn" type="button" onclick="$$('.mainmenu-ar-aa').each(function(el) {
                                el.checked = !el.checked;
                            });">
            <i class="icon-check"></i> Toggle Selection                    </button>
        <h5>Main Menu ar-AA</h5>

        <label class="checkbox small" for="link541">
            <input type="checkbox" name="jform[assigned][]" value="541" id="link541" class="chk-menulink mainmenu-ar-aa">
            منزل                        </label>
    </div>
</li>
<li class="span3">
    <div class="thumbnail">
        <button class="btn" type="button" onclick="$$('.mainmenu-en-gb').each(function(el) {
                                el.checked = !el.checked;
                            });">
            <i class="icon-check"></i> Toggle Selection                    </button>
        <h5>Main Menu en-GB</h5>

        <label class="checkbox small" for="link540">
            <input type="checkbox" name="jform[assigned][]" value="540" id="link540" class="chk-menulink mainmenu-en-gb">
            Home                        </label>
    </div>
</li>
<li class="span3">
    <div class="thumbnail">
        <button class="btn" type="button" onclick="$$('.shortcode').each(function(el) {
                                el.checked = !el.checked;
                            });">
            <i class="icon-check"></i> Toggle Selection                    </button>
        <h5>Shortcodes</h5>

        <label class="checkbox small" for="link519">
            <input type="checkbox" name="jform[assigned][]" value="519" id="link519" class="chk-menulink shortcode">
            Accordion                        </label>
        <label class="checkbox small" for="link520">
            <input type="checkbox" name="jform[assigned][]" value="520" id="link520" class="chk-menulink shortcode">
            Blockquote                        </label>
        <label class="checkbox small" for="link521">
            <input type="checkbox" name="jform[assigned][]" value="521" id="link521" class="chk-menulink shortcode">
            Buttons                        </label>
        <label class="checkbox small" for="link522">
            <input type="checkbox" name="jform[assigned][]" value="522" id="link522" class="chk-menulink shortcode">
            Columns                        </label>
        <label class="checkbox small" for="link523">
            <input type="checkbox" name="jform[assigned][]" value="523" id="link523" class="chk-menulink shortcode">
            Divider                        </label>
        <label class="checkbox small" for="link524">
            <input type="checkbox" name="jform[assigned][]" value="524" id="link524" class="chk-menulink shortcode">
            Dropcap                        </label>
        <label class="checkbox small" for="link525">
            <input type="checkbox" name="jform[assigned][]" value="525" id="link525" class="chk-menulink shortcode">
            Gallery                        </label>
        <label class="checkbox small" for="link526">
            <input type="checkbox" name="jform[assigned][]" value="526" id="link526" class="chk-menulink shortcode">
            Google Map                        </label>
        <label class="checkbox small" for="link527">
            <input type="checkbox" name="jform[assigned][]" value="527" id="link527" class="chk-menulink shortcode">
            Lightbox                        </label>
        <label class="checkbox small" for="link528">
            <input type="checkbox" name="jform[assigned][]" value="528" id="link528" class="chk-menulink shortcode">
            List icon                        </label>
        <label class="checkbox small" for="link529">
            <input type="checkbox" name="jform[assigned][]" value="529" id="link529" class="chk-menulink shortcode">
            Message Box                        </label>
        <label class="checkbox small" for="link530">
            <input type="checkbox" name="jform[assigned][]" value="530" id="link530" class="chk-menulink shortcode">
            Pricing Tables                        </label>
        <label class="checkbox small" for="link531">
            <input type="checkbox" name="jform[assigned][]" value="531" id="link531" class="chk-menulink shortcode">
            Social icon                        </label>
        <label class="checkbox small" for="link533">
            <input type="checkbox" name="jform[assigned][]" value="533" id="link533" class="chk-menulink shortcode">
            Tabs                        </label>
        <label class="checkbox small" for="link534">
            <input type="checkbox" name="jform[assigned][]" value="534" id="link534" class="chk-menulink shortcode">
            Testimonial                        </label>
        <label class="checkbox small" for="link535">
            <input type="checkbox" name="jform[assigned][]" value="535" id="link535" class="chk-menulink shortcode">
            Toggle Box                        </label>
        <label class="checkbox small" for="link536">
            <input type="checkbox" name="jform[assigned][]" value="536" id="link536" class="chk-menulink shortcode">
            Twitter                        </label>
        <label class="checkbox small" for="link537">
            <input type="checkbox" name="jform[assigned][]" value="537" id="link537" class="chk-menulink shortcode">
            Vimeo                        </label>
    </div>
</li>
<li class="span3">
    <div class="thumbnail">
        <button class="btn" type="button" onclick="$$('.top-menu').each(function(el) {
                                el.checked = !el.checked;
                            });">
            <i class="icon-check"></i> Toggle Selection                    </button>
        <h5>Top Menu</h5>

        <label class="checkbox small" for="link473">
            <input type="checkbox" name="jform[assigned][]" value="473" id="link473" class="chk-menulink top-menu">
            Blogs                        </label>
        <label class="checkbox small" for="link474">
            <input type="checkbox" name="jform[assigned][]" value="474" id="link474" class="chk-menulink top-menu">
            Contacts                        </label>
        <label class="checkbox small" for="link475">
            <input type="checkbox" name="jform[assigned][]" value="475" id="link475" class="chk-menulink top-menu">
            Login                        </label>
    </div>
</li>
<li class="span3">
    <div class="thumbnail">
        <button class="btn" type="button" onclick="$$('.usermenu').each(function(el) {
                                el.checked = !el.checked;
                            });">
            <i class="icon-check"></i> Toggle Selection                    </button>
        <h5>User Menu</h5>

        <label class="checkbox small" for="link201">
            <input type="checkbox" name="jform[assigned][]" value="201" id="link201" class="chk-menulink usermenu">
            Your Profile                        </label>
        <label class="checkbox small" for="link449">
            <input type="checkbox" name="jform[assigned][]" value="449" id="link449" class="chk-menulink usermenu">
            Submit an Article                        </label>
        <label class="checkbox small" for="link450">
            <input type="checkbox" name="jform[assigned][]" value="450" id="link450" class="chk-menulink usermenu">
            Submit a Web Link                        </label>
        <label class="checkbox small" for="link448">
            <input type="checkbox" name="jform[assigned][]" value="448" id="link448" class="chk-menulink usermenu">
            Site Administrator                        </label>
    </div>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="tab-pane" id="advanced">
<div class="profiles-pane">
<h3 class="title-profile">Advanced</h3>
<div class="profiles-pane-inner">
<div class="accordion" id="advanced-accordion">
<div class="accordion-group">
    <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-google">
            Google        </a>
    </div>
    <div id="advanced-google" class="accordion-body collapse in">
        <div class="accordion-inner">
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_enable_googleauthorship-lbl" for="jform_params_enable_googleauthorship" class="hasTooltip" title="" data-original-title="<strong>Google Authorship</strong>">Google Authorship</label>                </div>
                <div class="controls">
                    <fieldset id="jform_params_enable_googleauthorship" class="radio btn-group"><input type="radio" id="jform_params_enable_googleauthorship0" name="jform[params][enable_googleauthorship]" value="0" checked="checked" style="display: none;"><label for="jform_params_enable_googleauthorship0" class="btn active btn-danger first">No</label><input type="radio" id="jform_params_enable_googleauthorship1" name="jform[params][enable_googleauthorship]" value="1" style="display: none;"><label for="jform_params_enable_googleauthorship1" class="btn">Yes</label></fieldset>                </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_google_profile_url-lbl" for="jform_params_google_profile_url" class="hasTooltip" title="" data-original-title="<strong>Google Profile URL</strong>">Google Profile URL</label>                </div>
                <div class="controls">
                    <input type="text" name="jform[params][google_profile_url]" id="jform_params_google_profile_url" value="">                </div>
            </div>
        </div>
    </div>
</div>

<div class="accordion-group">
    <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-comments">
            Comments        </a>
    </div>
    <div id="advanced-comments" class="accordion-body collapse">
        <div class="accordion-inner">
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_enable_comments-lbl" for="jform_params_enable_comments" class="hasTooltip" title="" data-original-title="<strong>Enable Comments</strong>">Enable Comments</label>                </div>
                <div class="controls">
                    <fieldset id="jform_params_enable_comments" class="radio btn-group"><input type="radio" id="jform_params_enable_comments0" name="jform[params][enable_comments]" value="1" style="display: none;"><label for="jform_params_enable_comments0" class="btn">Yes</label><input type="radio" id="jform_params_enable_comments1" name="jform[params][enable_comments]" value="0" checked="checked" style="display: none;"><label for="jform_params_enable_comments1" class="btn active btn-danger first">No</label></fieldset>                </div>
            </div>

            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_tab_order-lbl" for="jform_params_tab_order" class="hasTooltip" title="" data-original-title="<strong>Tabs Order</strong><br />Only tabs listed will be showed">Tabs Order</label>                </div>
                <div class="controls">
                    <input type="text" name="jform[params][tab_order]" id="jform_params_tab_order" value="facebook,gplus,disqus"><div style="margin: 5px 0;">
                        <strong>Notes</strong>: Comma Separated List, First listed is the default, If left empty it will use default value below, only tabs listed will be shown. <br>
                        <strong>Possible Values </strong>: gplus,facebook,disqus <br>
                        <strong>Default Value </strong>: gplus,facebook <br>
                    </div>                </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_disqus_shortname-lbl" for="jform_params_disqus_shortname" class="hasTooltip" title="" data-original-title="<strong>Disqus Shortname</strong><br />Required if showing the disqus tab">Disqus Shortname</label>                </div>
                <div class="controls">
                    <input type="text" name="jform[params][disqus_shortname]" id="jform_params_disqus_shortname" value="zootemplates"><div style="margin: 5px 0;">
                        <strong>Notes </strong>: Required if showing the Disqus Tab
                    </div>                </div>
            </div>

            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_facebook_label-lbl" for="jform_params_facebook_label" class="">Facebook Label</label>                </div>
                <div class="controls">
                    <input type="text" name="jform[params][facebook_label]" id="jform_params_facebook_label" value="Facebook">                </div>
            </div>

            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_gplus_label-lbl" for="jform_params_gplus_label" class="">Google+ Label</label>                </div>
                <div class="controls">
                    <input type="text" name="jform[params][gplus_label]" id="jform_params_gplus_label" value="Google+">                </div>
            </div>

            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_disqus_label-lbl" for="jform_params_disqus_label" class="">Disqus Label</label>                </div>
                <div class="controls">
                    <input type="text" name="jform[params][disqus_label]" id="jform_params_disqus_label" value="Disqus">                </div>
            </div>
        </div>
    </div>
</div>

<!--
<div class="accordion-group">
    <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-social-sharing">
            Social Sharing        </a>
    </div>
    <div id="advanced-social-sharing" class="accordion-body collapse">
        <div class="accordion-inner">


            <div class="tab-pane active" id="general">
                <!-- Enable / Disable Socialshares --
                <div class="control-group">
                    <div class="control-label">
                        <label id="jform_params_socialshare_floatbar-lbl" for="jform_params_socialshare_floatbar" class="">Enable floatbar</label>                    </div>
                    <div class="controls">
                        <select id="jform_params_socialshare_floatbar" name="jform[params][socialshare_floatbar]">
	<option value="1">Yes</option>
	<option value="0">No</option>
</select>
                    </div>
                </div>
                <div class="control-group display_type_normal">
                    <div class="control-label">
                        <label id="jform_params_socialshare_in_article-lbl" for="jform_params_socialshare_in_article" class="hasTooltip" title="<strong>Show in Article</strong><br />Display social box in Article">Show in Article</label>                    </div>
                    <div class="controls">
                        <fieldset id="jform_params_socialshare_in_article" class="radio btn-group" ><input type="radio" id="jform_params_socialshare_in_article0" name="jform[params][socialshare_in_article]" value="1" /><label for="jform_params_socialshare_in_article0" >Yes</label><input type="radio" id="jform_params_socialshare_in_article1" name="jform[params][socialshare_in_article]" value="0" checked="checked" /><label for="jform_params_socialshare_in_article1" >No</label></fieldset>                    </div>
                </div>
                <div class="control-group display_type_normal">
                    <div class="control-label">
                        <label id="jform_params_socialshare_in_article_list-lbl" for="jform_params_socialshare_in_article_list" class="hasTooltip" title="<strong>Show in list of articles</strong><br />Display static social box in list of articles">Show in list of articles</label>                    </div>
                    <div class="controls">
                        <fieldset id="jform_params_socialshare_in_article_list" class="radio btn-group" ><input type="radio" id="jform_params_socialshare_in_article_list0" name="jform[params][socialshare_in_article_list]" value="1" /><label for="jform_params_socialshare_in_article_list0" >Yes</label><input type="radio" id="jform_params_socialshare_in_article_list1" name="jform[params][socialshare_in_article_list]" value="0" checked="checked" /><label for="jform_params_socialshare_in_article_list1" >No</label></fieldset>                    </div>
                </div>
                <div class="control-group display_type_normal">
                    <div class="control-label">
                                            </div>
                    <div class="controls">
                                            </div>
                </div>
                <div class="control-group display_type_normal">
                    <div class="control-label">
                        <label id="jform_params_socialshare_in_featured-lbl" for="jform_params_socialshare_in_featured" class="hasTooltip" title="<strong>Show in Featured</strong><br />Display social box in Featured page">Show in Featured</label>                    </div>
                    <div class="controls">
                        <fieldset id="jform_params_socialshare_in_featured" class="radio btn-group" ><input type="radio" id="jform_params_socialshare_in_featured0" name="jform[params][socialshare_in_featured]" value="1" /><label for="jform_params_socialshare_in_featured0" >Yes</label><input type="radio" id="jform_params_socialshare_in_featured1" name="jform[params][socialshare_in_featured]" value="0" checked="checked" /><label for="jform_params_socialshare_in_featured1" >No</label></fieldset>                    </div>
                </div>
                <div class="control-group">
                    <div class="control-label">
                        <label id="jform_params_socialshare_article_position-lbl" for="jform_params_socialshare_article_position" class="hasTooltip" title="<strong>In article position</strong><br />Normal position">In article position</label>                    </div>
                    <div class="controls">
                        <select id="jform_params_socialshare_article_position" name="jform[params][socialshare_article_position]">
	<option value="top">Top</option>
	<option value="bottom">Bottom</option>
</select>
                    </div>
                </div>
                <!-- SocialShares display filter --
                <div class="control-group">
                    <div class="control-label">
                        <label id="jform_params_socialshare_filter_categories-lbl" for="jform_params_socialshare_filter_categories" class="hasTooltip" title="<strong>Include categories</strong>">Include categories</label>                    </div>
                    <div class="controls">

        <div class="include_categories">
            <div class="form-inline">
                <span class="small">
                    <input type="button" class="btn" id="checkAll" value="Select All" /> -
                    <input type="button" class="btn" id="uncheckAll" value="Clear Selection" />
                </span>
            </div>

            <hr class="zo2-hr"/>

            <ul class="treeCategories form-inline">
                                    <li class="category-item">
                        <input type="checkbox" class="checkbox" name="jform[params][socialshare_filter_categories][]"
                               value="10"
                               id="category10"/>
                        <label for="category10">
                            Demo                        </label>
                    </li>

                                    <li class="category-item">
                        <input type="checkbox" class="checkbox" name="jform[params][socialshare_filter_categories][]"
                               value="2"
                               id="category2"/>
                        <label for="category2">
                            - Uncategorised                        </label>
                    </li>

                                    <li class="category-item">
                        <input type="checkbox" class="checkbox" name="jform[params][socialshare_filter_categories][]"
                               value="8"
                               id="category8"/>
                        <label for="category8">
                            - Shortcodes                        </label>
                    </li>

                                    <li class="category-item">
                        <input type="checkbox" class="checkbox" name="jform[params][socialshare_filter_categories][]"
                               value="9"
                               id="category9"/>
                        <label for="category9">
                            - Joomla                        </label>
                    </li>

                                    <li class="category-item">
                        <input type="checkbox" class="checkbox" name="jform[params][socialshare_filter_categories][]"
                               value="11"
                               id="category11"/>
                        <label for="category11">
                            - Blog                        </label>
                    </li>


            </ul>

        </div>

                            </div>
                </div>
            </div>
            <div class="tab-pane" id="socials">
                <!-- Facebook --
                <div class="control-group">
                    <div class="control-label">
                        <label id="jform_params_fb_action-lbl" for="jform_params_fb_action" class="hasTooltip" title="<strong>Facebook action </strong><br />Facebook action">Facebook action </label>                    </div>
                    <div class="controls">
                        <select id="jform_params_fb_action" name="jform[params][fb_action]">
	<option value="like" selected="selected">Like</option>
	<option value="recommend">Recommend</option>
</select>
                    </div>
                </div>
                <div class="control-group">
                    <div class="control-label">
                        <label id="jform_params_fb_send-lbl" for="jform_params_fb_send" class="hasTooltip" title="<strong>Show Facebook Share</strong><br />Display Facebook Share button">Show Facebook Share</label>                    </div>
                    <div class="controls">
                        <fieldset id="jform_params_fb_send" class="radio btn-group" ><input type="radio" id="jform_params_fb_send0" name="jform[params][fb_send]" value="0" checked="checked" /><label for="jform_params_fb_send0" >Hide</label><input type="radio" id="jform_params_fb_send1" name="jform[params][fb_send]" value="1" /><label for="jform_params_fb_send1" >Show</label></fieldset>                    </div>
                </div>

                <div class="control-group">
                    <div class="control-label">
                        <label id="jform_params_social_order-lbl" for="jform_params_social_order" class="hasTooltip" title="<strong>Ordering buttons</strong><br />Drag and drop to change position of button">Ordering buttons</label>                    </div>
                    <div class="controls">
                        <table width="100%" id="social_options" class="table table-striped">
                    <thead>
                        <tr>
                            <th width="1%" class="index sequence nowrap center"></th>
                            <th width="1%" class="index sequence nowrap center">#</th>
                            <th width="40%" class="nowrap">Website</th>
                            <th width="10%" class="nowrap center isactive">Enable</th>
                            <th width="20%" class="">Button Design</th>
                        </tr>
                    </thead>
                    <tbody><tr class="row0">
                                    <td class="nowrap center" name="twitter"><i class="icon-move hasTooltip" data-original-title="Drag and drop to change position of button"></i></td>
                                    <td class="index sequence order nowrap center">1</td>
                                    <td class="left">
                                        <a href="https://twitter.com/" title="twitter">Twitter</a>
                                    </td>

                                     <td class="center">

            <fieldset name="fs_enable_vertical" class="radio btn-group social-onoff ">
                <input name="enable_vertical" id="enable_vertical" type="radio" value="1">
                <label for="enable_vertical" class="btn on active btn-success">Yes</label>
                <label for="enable_vertical" class="btn off ">No</label>
            </fieldset>

                                    </td>

                                    <td class="">
                                        <select id="twitter_button_design" name="twitter_button_design" class="inputbox">
	<option value="none">None</option>
	<option value="horizontal">Horizontal Count</option>
	<option value="vertical" selected="selected">Vertical Count</option>
</select>

                                    </td>

                                </tr><tr class="row1">
                                    <td class="nowrap center" name="facebook"><i class="icon-move hasTooltip" data-original-title="Drag and drop to change position of button"></i></td>
                                    <td class="index sequence order nowrap center">2</td>
                                    <td class="left">
                                        <a href="https://www.facebook.com/" title="twitter">Facebook</a>
                                    </td>

                                     <td class="center">

            <fieldset name="fs_enable_box_count" class="radio btn-group social-onoff ">
                <input name="enable_box_count" id="enable_box_count" type="radio" value="1">
                <label for="enable_box_count" class="btn on active btn-success">Yes</label>
                <label for="enable_box_count" class="btn off ">No</label>
            </fieldset>

                                    </td>

                                    <td class="">
                                        <select id="facebook_button_design" name="facebook_button_design" class="inputbox">
	<option value="standard">Standard</option>
	<option value="button_count">Button Count</option>
	<option value="box_count" selected="selected">Box Count</option>
</select>

                                    </td>

                                </tr><tr class="row2">
                                    <td class="nowrap center" name="buffer"><i class="icon-move hasTooltip" data-original-title="Drag and drop to change position of button"></i></td>
                                    <td class="index sequence order nowrap center">3</td>
                                    <td class="left">
                                        <a href="https://twitter.com/" title="twitter">Buffer</a>
                                    </td>

                                     <td class="center">

            <fieldset name="fs_enable_horizontal" class="radio btn-group social-onoff ">
                <input name="enable_horizontal" id="enable_horizontal" type="radio" value="1">
                <label for="enable_horizontal" class="btn on active btn-success">Yes</label>
                <label for="enable_horizontal" class="btn off ">No</label>
            </fieldset>

                                    </td>

                                    <td class="">
                                        <select id="buffer_button_design" name="buffer_button_design" class="inputbox">
	<option value="none">None</option>
	<option value="vertical" selected="selected">Vertical Count</option>
	<option value="horizontal">Horizontal Count</option>
</select>

                                    </td>

                                </tr><tr class="row3">
                                    <td class="nowrap center" name="linkedin"><i class="icon-move hasTooltip" data-original-title="Drag and drop to change position of button"></i></td>
                                    <td class="index sequence order nowrap center">4</td>
                                    <td class="left">
                                        <a href="http://www.linkedin.com" title="twitter">Linkedin</a>
                                    </td>

                                     <td class="center">

            <fieldset name="fs_enable_none" class="radio btn-group social-onoff ">
                <input name="enable_none" id="enable_none" type="radio" value="1">
                <label for="enable_none" class="btn on active btn-success">Yes</label>
                <label for="enable_none" class="btn off ">No</label>
            </fieldset>

                                    </td>

                                    <td class="">
                                        <select id="linkedin_button_design" name="linkedin_button_design" class="inputbox">
	<option value="right">Horizontal Count</option>
	<option value="top" selected="selected">Vertical Count</option>
	<option value="none">No Count</option>
</select>

                                    </td>

                                </tr><tr class="row4">
                                    <td class="nowrap center" name="google"><i class="icon-move hasTooltip" data-original-title="Drag and drop to change position of button"></i></td>
                                    <td class="index sequence order nowrap center">5</td>
                                    <td class="left">
                                        <a href="https://google.com/" title="twitter">Google</a>
                                    </td>

                                     <td class="center">

            <fieldset name="fs_enable_inline" class="radio btn-group social-onoff ">
                <input name="enable_inline" id="enable_inline" type="radio" value="1">
                <label for="enable_inline" class="btn on active btn-success">Yes</label>
                <label for="enable_inline" class="btn off ">No</label>
            </fieldset>

                                    </td>

                                    <td class="">
                                        <select id="google_button_design" name="google_button_design" class="inputbox">
	<option value="none">None</option>
	<option value="bubble">Horizontal Bubble </option>
	<option value="vertical-bubble">Vertical Bubble</option>
	<option value="inline">Inline </option>
</select>

                                    </td>

                                </tr><tr class="row5">
                                    <td class="nowrap center" name="pinterest"><i class="icon-move hasTooltip" data-original-title="Drag and drop to change position of button"></i></td>
                                    <td class="index sequence order nowrap center">6</td>
                                    <td class="left">
                                        <a href="http://www.pinterest.com" title="twitter">Pinterest</a>
                                    </td>

                                     <td class="center">

            <fieldset name="fs_enable_none" class="radio btn-group social-onoff ">
                <input name="enable_none" id="enable_none" type="radio" value="1">
                <label for="enable_none" class="btn on active btn-success">Yes</label>
                <label for="enable_none" class="btn off ">No</label>
            </fieldset>

                                    </td>

                                    <td class="">
                                        <select id="pinterest_button_design" name="pinterest_button_design" class="inputbox">
	<option value="beside">Horizontal Count</option>
	<option value="above">Vertical Count</option>
	<option value="none">No Count</option>
</select>

                                    </td>

                                </tr><tr class="row6">
                                    <td class="nowrap center" name="tumblr"><i class="icon-move hasTooltip" data-original-title="Drag and drop to change position of button"></i></td>
                                    <td class="index sequence order nowrap center">7</td>
                                    <td class="left">
                                        <a href="http://www.tumblr.com" title="twitter">Tumblr</a>
                                    </td>

                                     <td class="center">

            <fieldset name="fs_enable_3" class="radio btn-group social-onoff ">
                <input name="enable_3" id="enable_3" type="radio" value="1">
                <label for="enable_3" class="btn on active btn-success">Yes</label>
                <label for="enable_3" class="btn off ">No</label>
            </fieldset>

                                    </td>

                                    <td class="">
                                        <select id="tumblr_button_design" name="tumblr_button_design" class="inputbox">
	<option value="1" selected="selected">Staff on Tumblr</option>
	<option value="2">Follow on Tumblr</option>
	<option value="3">t</option>
</select>

                                    </td>

                                </tr></tbody>
                </table>
            <input type="hidden" name="jform[params][social_order]" id="jform_params_social_order" value="" />                    </div>
                </div>

                <div class="control-group">
                    <div class="control-label">
                                            </div>
                    <div class="controls">
                                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->

<div class="accordion-group">
    <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-advanced">
            Advanced Options        </a>
    </div>
    <div id="advanced-advanced" class="accordion-body collapse">
        <div class="accordion-inner">
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_ga_code-lbl" for="jform_params_ga_code" class="hasTooltip" title="" data-original-title="<strong>Tracking code</strong><br />Include the tracking code">Tracking code</label>                </div>
                <div class="controls">
                    <textarea name="jform[params][ga_code]" id="jform_params_ga_code"></textarea>                </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_component_area-lbl" for="jform_params_component_area" class="hasTooltip" title="" data-original-title="<strong>Hide Component Area</strong><br />Show component area from front page">Hide Component Area</label>                </div>
                <div class="controls">
                    <fieldset id="jform_params_component_area" class="radio btn-group"><input type="radio" id="jform_params_component_area0" name="jform[params][component_area]" value="0" checked="checked" style="display: none;"><label for="jform_params_component_area0" class="btn active btn-danger first">No</label><input type="radio" id="jform_params_component_area1" name="jform[params][component_area]" value="1" style="display: none;"><label for="jform_params_component_area1" class="btn">Yes</label></fieldset>                </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_combine_css-lbl" for="jform_params_combine_css" class="hasTooltip" title="" data-original-title="<strong>Combine CSS</strong><br />Combine CSS files into one file">Combine CSS</label>                </div>
                <div class="controls">
                    <fieldset id="jform_params_combine_css" class="radio btn-group"><input type="radio" id="jform_params_combine_css0" name="jform[params][combine_css]" value="0" checked="checked" style="display: none;"><label for="jform_params_combine_css0" class="btn active btn-danger first">No</label><input type="radio" id="jform_params_combine_css1" name="jform[params][combine_css]" value="1" style="display: none;"><label for="jform_params_combine_css1" class="btn">Yes</label></fieldset>                </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_combine_js-lbl" for="jform_params_combine_js" class="hasTooltip" title="" data-original-title="<strong>Combine JS</strong><br />Combine JS files into one file">Combine JS</label>                </div>
                <div class="controls">
                    <fieldset id="jform_params_combine_js" class="radio btn-group"><input type="radio" id="jform_params_combine_js0" name="jform[params][combine_js]" value="0" checked="checked" style="display: none;"><label for="jform_params_combine_js0" class="btn active btn-danger first">No</label><input type="radio" id="jform_params_combine_js1" name="jform[params][combine_js]" value="1" style="display: none;"><label for="jform_params_combine_js1" class="btn">Yes</label></fieldset>                </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_load_jquery-lbl" for="jform_params_load_jquery" class="hasTooltip" title="" data-original-title="<strong>Load jQuery</strong><br />Force load jQuery">Load jQuery</label>                </div>
                <div class="controls">
                    <fieldset id="jform_params_load_jquery" class="radio btn-group"><input type="radio" id="jform_params_load_jquery0" name="jform[params][load_jquery]" value="0" checked="checked" style="display: none;"><label for="jform_params_load_jquery0" class="btn active btn-danger first">No</label><input type="radio" id="jform_params_load_jquery1" name="jform[params][load_jquery]" value="1" style="display: none;"><label for="jform_params_load_jquery1" class="btn">Yes</label></fieldset>                </div>
            </div>
            <div class="control-group">
                <div class="control-label"></div>
                <div class="controls">
                    <button class="btn btn-danger btn-large" id="btnClearCache" style="width: 300px">Clear layout cache</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="accordion-group">
    <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-dev">
            Developer Options        </a>
    </div>
    <div id="advanced-dev" class="accordion-body collapse">
        <div class="accordion-inner">
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_debug_visibility-lbl" for="jform_params_debug_visibility" class="hasTooltip" title="" data-original-title="<strong>Debug</strong><br />Allow Developer to rebuild the cache. ONLY use this feature if you are developer">Debug</label>                </div>
                <div class="controls">
                    <fieldset id="jform_params_debug_visibility" class="radio btn-group"><input type="radio" id="jform_params_debug_visibility0" name="jform[params][debug_visibility]" value="0" checked="checked" style="display: none;"><label for="jform_params_debug_visibility0" class="btn active btn-danger first">No</label><input type="radio" id="jform_params_debug_visibility1" name="jform[params][debug_visibility]" value="1" style="display: none;"><label for="jform_params_debug_visibility1" class="btn">Yes</label></fieldset>                </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label id="jform_params_disable_mootools-lbl" for="jform_params_disable_mootools" class="hasTooltip" title="" data-original-title="<strong>Disable mootools</strong><br />Disable mootools to avoid script conflict">Disable mootools</label>                </div>
                <div class="controls">
                    <fieldset id="jform_params_disable_mootools" class="radio btn-group"><input type="radio" id="jform_params_disable_mootools0" name="jform[params][disable_mootools]" value="0" style="display: none;"><label for="jform_params_disable_mootools0" class="btn first">No</label><input type="radio" id="jform_params_disable_mootools1" name="jform[params][disable_mootools]" value="1" checked="checked" style="display: none;"><label for="jform_params_disable_mootools1" class="btn active btn-success">Yes</label></fieldset>                </div>
            </div>
        </div>
    </div>
</div>
</div>                        </div>
</div>
</div>
</div>
<!-- /tabs content -->
</fieldset>
<input type="hidden" name="task" value="">
<input type="hidden" name="e0eab522e26b5b78d8dcb3b13718f2b8" value="1">    </form>
</div>
</div>
</div>
<!-- End Content -->
</section>

</div>