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

<!-- include css & bootrap Joomla! here -->

<section id="content">
<!-- Begin Content -->

    <div class="row-fluid">

        <div class="span12">

        <!-- System Message -->
        <div id="system-message-container"></div>

        <!-- Zo2 Message -->
        <div id="zo2messages"></div>

        <!-- Zo2 Warpper -->
        <div id="zo2framework" class="joomla-3">
            <form id="adminForm" action="/hallo142/administrator/index.php?option=com_templates&amp;layout=edit&amp;id=11" method="post" name="adminForm" class="form-validate form-horizontal" data-zo2ajax="{&quot;on&quot;:&quot;submit&quot;}">
                <fieldset id="zo2fields" class="">
                    <!-- tabs header -->
                    <ul class="nav nav-tabs main-navigator" id="main-navigator">
                        <!-- Default active tab -->
                        <li class="active"><a href="#overview" data-toggle="tab"><i class="icon-info fa-lg"></i> Overview</a></li>
                        <li class=""><a href="#general" data-toggle="tab"><i class="icon-cog fa-lg"></i> General</a></li>
                        <li class=""><a href="#fonts" data-toggle="tab"><i class="icon-font fa-lg"></i> Fonts</a></li>
                        <li class=""><a href="#theme" data-toggle="tab"><i class="icon-columns fa-lg"></i> Layout Profiles</a></li>
                        <li class=""><a href="#megamenu" data-toggle="tab"><i class="fa fa-navicon fa-lg"></i> Mega Menus</a></li>
                        <li class=""><a href="#assignment" data-toggle="tab"><i class="icon-edit-sign fa-lg"></i>Template Assignment</a></li>
                        <li class=""><a href="#advanced" data-toggle="tab"><i class="icon-wrench fa-lg"></i> Advanced</a></li>
                    </ul>

                    <!-- tabs content -->
                    <div class="tab-content main-navigator">
                    <a href="http://zo2framework.org" target="_blank" id="logo" title="Zo2 Framework"></a>

                    <!-- Tab Panel Overview -->
                    <div class="tab-pane active" id="overview">
                        <div class="profiles-pane">
                            <h3 class="title-profile">Overview</h3>
                            <div class="profiles-pane-inner">
                                <div class="overview-details">
                                    <div class="row-fluid">
                                        <div class="span4">
                                            <div class="control-group">
                                                <div class="control-label"><label class="hasTooltip required" data-original-title="Style Name">Style Name<span class="star">&nbsp;*</span></label></div>
                                                <div class="controls">
                                                    <input type="text" value="Zo2_hallo - Default" class="input-large-text" size="50" required="" aria-required="true">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span4">
                                            <div class="control-group">
                                                <div class="control-label">
                                                    <label class="hasTooltip" data-original-title="Template<br />Template Name">Template</label>
                                                </div>
                                                <div class="controls">
                                                    <input type="text" value="zo2_hallo" class="readonly" size="30" readonly="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span4">
                                            <div class="control-group">
                                                <div class="control-label">
                                                    <label class="hasTooltip" data-original-title="Default<br />If the multilingual functionality is not implemented, please limit your choice between <b>No</b> and <b>All</b>. The template style will be defined or not as global default template style.<br />If the <b>System - Language Filter</b> plugin is enabled, and you use different template styles depending on your content languages, please assign a language to this style.">Default</label>
                                                </div>
                                                <div class="controls">
                                                    <select disabled="disabled">
                                                        <option value="0" disabled="disabled">No</option>
                                                        <option value="1" selected="selected">All</option>
                                                        <option value="ar-AA">Arabic Unitag (العربية الموحدة)</option>
                                                        <option value="en-GB">English (UK)</option>
                                                    </select>
                                                    <input type="hidden" value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span1">
                                            <div class="control-group">
                                                <div class="control-label">
                                                </div>
                                                <div class="controls">
                                                    <input type="hidden" value="0" class="readonly">
                                                </div>
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
                                                <li>Cross-Browser Support</li>
                                            </ul>
                                            <h3 class="title-profile dark-bg">Credit Links</h3>
                                            <ul>
                                                <li><a title="Bootstrap" href="http://getbootstrap.com/">Bootstrap</a> is a front-end framework of Twitter, Inc.</li>
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Panel General -->
                    <div class="tab-pane" id="general">
                        <div class="profiles-pane">
                            <h3 class="title-profile">General</h3>
                            <div class="profiles-pane-inner">

                                <!-- Site Name -->
                                <div class="control-group">
                                    <div class="control-label">
                                        <label>Site name</label>
                                    </div>
                                    <div class="controls"><input type="text" value="Zo2 Hallo" class="input-text-option"></div>
                                </div>

                                <!-- Site Slogan -->
                                <div class="control-group">
                                    <div class="control-label">
                                        <label>Site slogan</label>
                                    </div>
                                    <div class="controls"><input type="text" value="" class="input-text-option"></div>
                                </div>

                                <!-- Enable Style Switcher -->
                                <div class="control-group">
                                    <div class="control-label">
                                        <label>Enable Style Switcher</label>
                                    </div>
                                    <div class="controls">
                                        <fieldset class="radio btn-group">
                                            <input type="radio" value="0" style="display: none;">
                                            <label class="btn first">No</label>
                                            <input type="radio" value="1" checked="checked" style="display: none;">
                                            <label class="btn active btn-success">Yes</label>
                                        </fieldset>
                                    </div>
                                </div>

                                <!-- Enable RTL -->
                                <div class="control-group">
                                    <div class="control-label">
                                        <label>Enable RTL</label>
                                    </div>
                                    <div class="controls">
                                        <fieldset class="radio btn-group">
                                            <input type="radio" value="0" style="display: none;">
                                            <label class="btn first">No</label>
                                            <input type="radio" value="1" checked="checked" style="display: none;">
                                            <label class="btn active btn-success">Yes</label>
                                        </fieldset>
                                    </div>
                                </div>


                                <!-- Enable custom css -->
                                <div class="control-group">
                                    <div class="control-label">
                                        <label class="">Enable custom css</label>
                                    </div>
                                    <div class="controls">
                                        <fieldset class="radio btn-group">
                                            <input type="radio" value="0" style="display: none;">
                                            <label class="btn first">No</label>
                                            <input type="radio" value="1" checked="checked" style="display: none;">
                                            <label class="btn active btn-success">Yes</label>
                                        </fieldset>
                                    </div>
                                </div>

                                <!-- Responsive Layout -->
                                <div class="control-group">
                                    <div class="control-label">
                                        <label class="hasTooltip" title="" data-original-title="Responsive Layout<br />Enable or disable responsive layout">Responsive Layout</label>
                                    </div>
                                    <div class="controls">
                                        <fieldset class="radio btn-group">
                                            <input type="radio" value="0" style="display: none;">
                                            <label class="btn first">No</label>
                                            <input type="radio" value="1" checked="checked" style="display: none;">
                                            <label class="btn active btn-success">Yes</label>
                                        </fieldset>
                                    </div>
                                </div>

                                <!-- Enable Sticky Menu -->
                                <div class="control-group">
                                    <div class="control-label">
                                        <label class="">Enable Sticky Menu</label>
                                    </div>
                                    <div class="controls">
                                        <fieldset class="radio btn-group">
                                            <input type="radio" value="0" style="display: none;">
                                            <label class="btn first">No</label>
                                            <input type="radio" value="1" checked="checked" style="display: none;">
                                            <label class="btn active btn-success">Yes</label>
                                        </fieldset>
                                    </div>
                                </div>

                                <!-- Favicon -->
                                <div class="control-group">
                                    <div class="control-label">
                                        <label class="">Favicon</label>
                                    </div>
                                    <div class="controls">
                                        <div class="input-prepend input-append">
                                            <div class="media-preview add-on"><span class="hasTipPreview" title=""><i class="icon-eye-open"></i></span></div>
                                            <input type="text" value="templates/zo2_hallo/assets/zo2/images/favicon.ico" readonly="readonly" class="input-small">
                                            <a class="modal btn" title="Select" href="#" rel="">Select</a>
                                            <a class="btn hasTooltip" title="" href="#" data-original-title="Clear"><i class="icon-remove"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Header logo -->
                                <div class="control-group">
                                    <div class="control-label">
                                        <label class="">Header logo</label>
                                    </div>
                                    <div class="controls">
                                        <div class="field-logo-container">
                                            <input class="logoInput" type="hidden" value="">
                                            <div class="radio btn-group logo-type-switcher">
                                                <button class="btn logo-type-none active btn-success">None</button>
                                                <button class="btn logo-type-image ">Image</button>
                                                <button class="btn logo-type-text ">Text</button>
                                            </div>
                                            <div class="logo-image ">
                                                <input type="hidden" class="basePath" value="/hallo142">
                                                <input type="hidden" class="logo-path" value="">
                                                <div class="btn-group">
                                                <span class="logo-preview">
                                                </span>
                                                    <a href="" class="btn btn-primary btn-select-logo modal" rel="">Select</a>
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

                                <!-- Header Retina logo -->
                                <div class="control-group">
                                    <div class="control-label">
                                        <label class="">Header Retina logo</label>
                                    </div>
                                    <div class="controls">
                                        <div class="field-logo-container">
                                            <input class="logoInput" type="hidden" value="">
                                            <div class="radio btn-group logo-type-switcher">
                                                <button class="btn logo-type-none ">None</button>
                                                <button class="btn logo-type-image active btn-success">Image</button>
                                                <button class="btn logo-type-text ">Text</button>
                                            </div>
                                            <div class="logo-image show">
                                                <input type="hidden" class="basePath" value="/hallo142">
                                                <input type="hidden" class="logo-path" value="images/logo-retina.png">
                                                <div class="btn-group">
                                                    <span class="logo-preview">
                                                        <img src="/hallo142/images/logo-retina.png">
                                                    </span>
                                                    <a href="" class="btn btn-primary btn-select-logo modal" rel="">Select</a>
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

                                <!-- Copyright -->
                                <div class="control-group">
                                    <div class="control-label">
                                        <label class="">Copyright</label>
                                    </div>
                                    <div class="controls">
                                        <textarea>Copyright © 2008 - 2014 &lt;a href="http://www.zootemplate.com/" title="joomla templates"&gt;Joomla Templates&lt;/a&gt; by ZooTemplate.Com. All rights reserved.</textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="control-label">
                                        <label class="hasTooltip" title="" data-original-title="Show footer logo<br />Show Zo2 Framework footer logo">Show footer logo</label>
                                    </div>
                                    <div class="controls">
                                        <fieldset class="radio btn-group"><input type="radio" value="0" style="display: none;">
                                            <label class="btn first">No</label>
                                            <input type="radio" value="1" checked="checked" style="display: none;">
                                            <label class="btn active btn-success">Yes</label>
                                        </fieldset>
                                    </div>
                                </div>

                                <!-- Show "Go to top" -->
                                <div class="control-group">
                                    <div class="control-label">
                                        <label class="">Show "Go to top"</label>
                                    </div>
                                    <div class="controls">
                                        <fieldset class="radio btn-group"><input type="radio" value="0" style="display: none;">
                                            <label class="btn first">No</label><input type="radio" value="1" checked="checked" style="display: none;">
                                            <label class="btn active btn-success">Yes</label>
                                        </fieldset>
                                    </div>
                                </div>

                                <!-- Cache Interval -->
                                <div class="control-group">
                                    <div class="control-label">
                                        <label class="">Cache Interval</label>
                                    </div>
                                    <div class="controls">
                                        <input type="text" value="3600">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Fonts -->
                    <div class="tab-pane" id="fonts">
                        <div class="profiles-pane">
                            <h3 class="title-profile">Fonts</h3>
                                <div id="font_chooser">
                                    <div class="font-container">
                                        <input type="hidden" value="">
                                        <h3>Body</h3>

                                        <!-- Enable Font -->
                                        <div class="control-group">
                                            <div class="control-label">
                                                <div class="font-label">Enable</div>
                                            </div>
                                            <div class="controls btn-group btn-group-onoff cbEnableFont">
                                                <button class="btn btn-on ">On</button>
                                                <button class="btn btn-off active btn-danger">Off</button>
                                            </div>
                                        </div>

                                        <!-- Font type -->
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

                                            <!-- Standard Font -->
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

                                            <!-- Google Font -->
                                            <div class="font-options-google hide control-group">
                                                <div class="control-label">
                                                    <div class="font-label">Google Font</div>
                                                    <div class="font-desc">Choose the type of font you want to use for body</div>
                                                </div>
                                                <div class="controls">
                                                    <input type="text" class="txtGoogleFontSelect" value="" style="display: none;">
                                                    <div class="font-select">
                                                        <a><span>Select a font</span><div><b></b></div></a>
                                                        <div class="fs-drop" style="display: none;">
                                                            <div class="fs-search">
                                                                <input type="text" class="fs-searchinput">
                                                            </div>
                                                            <ul class="fs-results" style="display: none;">
                                                                <li data-value="Open Sans" style="font-family: Open Sans; font-weight: 400">Open Sans</li>
                                                                <li data-value="Oswald" style="font-family: Oswald; font-weight: 400">Oswald</li>
                                                                <li data-value="Lustria" style="font-family: Lustria; font-weight: 400">Lustria</li>
                                                                <li data-value="Lato" style="font-family: Lato; font-weight: 400">Lato</li>
                                                                <li data-value="Roboto" style="font-family: Roboto; font-weight: 400">Roboto</li>
                                                                <li data-value="Roboto Slab" style="font-family: Roboto Slab; font-weight: 400">Roboto Slab</li>
                                                                <li data-value="Yanone Kaffeesatz" style="font-family: Yanone Kaffeesatz; font-weight: 400">Yanone Kaffeesatz</li>
                                                                <li data-value="Arvo" style="font-family: Arvo; font-weight: 400">Arvo</li>
                                                                <li data-value="Ubuntu" style="font-family: Ubuntu; font-weight: 400">Ubuntu</li>
                                                                <li data-value="Lora" style="font-family: Lora; font-weight: 400">Lora</li>
                                                                <li data-value="Raleway" style="font-family: Raleway; font-weight: 400">Raleway</li>
                                                                <li data-value="Merriweather" style="font-family: Merriweather; font-weight: 400">Merriweather</li>
                                                                <li data-value="Bitter" style="font-family: Bitter; font-weight: 400">Bitter</li>
                                                                <li data-value="Cabin" style="font-family: Cabin; font-weight: 400">Cabin</li>
                                                                <li data-value="Cuprum" style="font-family: Cuprum; font-weight: 400">Cuprum</li>
                                                                <li data-value="Quattrocento" style="font-family: Quattrocento; font-weight: 400">Quattrocento</li>
                                                                <li data-value="Quattrocento Sans" style="font-family: Quattrocento Sans; font-weight: 400">Quattrocento Sans</li>
                                                                <li data-value="Droid Sans" style="font-family: Droid Sans; font-weight: 400">Droid Sans</li>
                                                                <li data-value="Vollkorn" style="font-family: Vollkorn; font-weight: 400">Vollkorn</li>
                                                                <li data-value="PT Mono" style="font-family: PT Mono; font-weight: 400">PT Mono</li>
                                                                <li data-value="Gravitas One" style="font-family: Gravitas One; font-weight: 400">Gravitas One</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- FontDeck Name -->
                                            <div class="font-options-fontdeck hide control-group">
                                                <div class="control-label">
                                                    <div class="font-label">FontDeck Name</div>
                                                    <div class="font-desc">Paste the font family attribute from CSS code in Step 2 of FontDeck website here</div>
                                                </div>
                                                <div class="controls">
                                                    <textarea class="txtFontDeckCss"></textarea>
                                                </div>
                                            </div>

                                            <!-- Font options -->
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
                                    </div>

                                    <!-- Font For Headline H1 -->
                                    <div class="font-container">
                                        <input type="hidden" value="">
                                        <h3>Headline H1</h3>

                                        <!-- Enable -->
                                        <div class="control-group">
                                            <div class="control-label">
                                                <div class="font-label">Enable</div>
                                            </div>
                                            <div class="controls btn-group btn-group-onoff cbEnableFont">
                                                <button class="btn btn-on ">On</button>
                                                <button class="btn btn-off active btn-danger">Off</button>
                                            </div>
                                        </div>

                                        <!-- Font type -->
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

                                            <!-- Standard Font -->
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

                                            <!-- Google Font -->
                                            <div class="font-options-google hide control-group">
                                                <div class="control-label">
                                                    <div class="font-label">Google Font</div>
                                                    <div class="font-desc">Choose the type of font you want to use for headline h1</div>
                                                </div>
                                                <div class="controls">
                                                    <input type="text" class="txtGoogleFontSelect" value="" style="display: none;">
                                                    <div class="font-select">
                                                        <a><span>Select a font</span><div><b></b></div></a>
                                                        <div class="fs-drop" style="display: none;">
                                                            <div class="fs-search">
                                                                <input type="text" class="fs-searchinput">
                                                            </div>
                                                            <ul class="fs-results" style="display: none;">
                                                                <li data-value="Open Sans" style="font-family: Open Sans; font-weight: 400">Open Sans</li>
                                                                <li data-value="Oswald" style="font-family: Oswald; font-weight: 400">Oswald</li>
                                                                <li data-value="Lustria" style="font-family: Lustria; font-weight: 400">Lustria</li>
                                                                <li data-value="Lato" style="font-family: Lato; font-weight: 400">Lato</li>
                                                                <li data-value="Roboto" style="font-family: Roboto; font-weight: 400">Roboto</li>
                                                                <li data-value="Roboto Slab" style="font-family: Roboto Slab; font-weight: 400">Roboto Slab</li>
                                                                <li data-value="Yanone Kaffeesatz" style="font-family: Yanone Kaffeesatz; font-weight: 400">Yanone Kaffeesatz</li>
                                                                <li data-value="Arvo" style="font-family: Arvo; font-weight: 400">Arvo</li>
                                                                <li data-value="Ubuntu" style="font-family: Ubuntu; font-weight: 400">Ubuntu</li>
                                                                <li data-value="Lora" style="font-family: Lora; font-weight: 400">Lora</li>
                                                                <li data-value="Raleway" style="font-family: Raleway; font-weight: 400">Raleway</li>
                                                                <li data-value="Merriweather" style="font-family: Merriweather; font-weight: 400">Merriweather</li>
                                                                <li data-value="Bitter" style="font-family: Bitter; font-weight: 400">Bitter</li>
                                                                <li data-value="Cabin" style="font-family: Cabin; font-weight: 400">Cabin</li>
                                                                <li data-value="Cuprum" style="font-family: Cuprum; font-weight: 400">Cuprum</li>
                                                                <li data-value="Quattrocento" style="font-family: Quattrocento; font-weight: 400">Quattrocento</li>
                                                                <li data-value="Quattrocento Sans" style="font-family: Quattrocento Sans; font-weight: 400">Quattrocento Sans</li>
                                                                <li data-value="Droid Sans" style="font-family: Droid Sans; font-weight: 400">Droid Sans</li>
                                                                <li data-value="Vollkorn" style="font-family: Vollkorn; font-weight: 400">Vollkorn</li>
                                                                <li data-value="PT Mono" style="font-family: PT Mono; font-weight: 400">PT Mono</li>
                                                                <li data-value="Gravitas One" style="font-family: Gravitas One; font-weight: 400">Gravitas One</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- FontDeck Name -->
                                            <div class="font-options-fontdeck hide control-group">
                                                <div class="control-label">
                                                    <div class="font-label">FontDeck Name</div>
                                                    <div class="font-desc">Paste the font family attribute from CSS code in Step 2 of FontDeck website here</div>
                                                </div>
                                                <div class="controls">
                                                    <textarea class="txtFontDeckCss"></textarea>
                                                </div>
                                            </div>

                                            <!-- Font options -->
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
                                    </div>
                                    <div class="font-container">
                                        <input type="hidden" value="">
                                        <h3>Headline H2</h3>
                                        <!-- Enable -->
                                        <div class="control-group">
                                            <div class="control-label">
                                                <div class="font-label">Enable</div>
                                            </div>
                                            <div class="controls btn-group btn-group-onoff cbEnableFont">
                                                <button class="btn btn-on ">On</button>
                                                <button class="btn btn-off active btn-danger">Off</button>
                                            </div>
                                        </div>

                                        <!-- Font type -->
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

                                            <!-- Standard Font -->
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

                                            <!-- Google Font -->
                                            <div class="font-options-google hide control-group">
                                                <div class="control-label">
                                                    <div class="font-label">Google Font</div>
                                                    <div class="font-desc">Choose the type of font you want to use for headline h1</div>
                                                </div>
                                                <div class="controls">
                                                    <input type="text" class="txtGoogleFontSelect" value="" style="display: none;">
                                                    <div class="font-select">
                                                        <a><span>Select a font</span><div><b></b></div></a>
                                                        <div class="fs-drop" style="display: none;">
                                                            <div class="fs-search">
                                                                <input type="text" class="fs-searchinput">
                                                            </div>
                                                            <ul class="fs-results" style="display: none;">
                                                                <li data-value="Open Sans" style="font-family: Open Sans; font-weight: 400">Open Sans</li>
                                                                <li data-value="Oswald" style="font-family: Oswald; font-weight: 400">Oswald</li>
                                                                <li data-value="Lustria" style="font-family: Lustria; font-weight: 400">Lustria</li>
                                                                <li data-value="Lato" style="font-family: Lato; font-weight: 400">Lato</li>
                                                                <li data-value="Roboto" style="font-family: Roboto; font-weight: 400">Roboto</li>
                                                                <li data-value="Roboto Slab" style="font-family: Roboto Slab; font-weight: 400">Roboto Slab</li>
                                                                <li data-value="Yanone Kaffeesatz" style="font-family: Yanone Kaffeesatz; font-weight: 400">Yanone Kaffeesatz</li>
                                                                <li data-value="Arvo" style="font-family: Arvo; font-weight: 400">Arvo</li>
                                                                <li data-value="Ubuntu" style="font-family: Ubuntu; font-weight: 400">Ubuntu</li>
                                                                <li data-value="Lora" style="font-family: Lora; font-weight: 400">Lora</li>
                                                                <li data-value="Raleway" style="font-family: Raleway; font-weight: 400">Raleway</li>
                                                                <li data-value="Merriweather" style="font-family: Merriweather; font-weight: 400">Merriweather</li>
                                                                <li data-value="Bitter" style="font-family: Bitter; font-weight: 400">Bitter</li>
                                                                <li data-value="Cabin" style="font-family: Cabin; font-weight: 400">Cabin</li>
                                                                <li data-value="Cuprum" style="font-family: Cuprum; font-weight: 400">Cuprum</li>
                                                                <li data-value="Quattrocento" style="font-family: Quattrocento; font-weight: 400">Quattrocento</li>
                                                                <li data-value="Quattrocento Sans" style="font-family: Quattrocento Sans; font-weight: 400">Quattrocento Sans</li>
                                                                <li data-value="Droid Sans" style="font-family: Droid Sans; font-weight: 400">Droid Sans</li>
                                                                <li data-value="Vollkorn" style="font-family: Vollkorn; font-weight: 400">Vollkorn</li>
                                                                <li data-value="PT Mono" style="font-family: PT Mono; font-weight: 400">PT Mono</li>
                                                                <li data-value="Gravitas One" style="font-family: Gravitas One; font-weight: 400">Gravitas One</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- FontDeck Name -->
                                            <div class="font-options-fontdeck hide control-group">
                                                <div class="control-label">
                                                    <div class="font-label">FontDeck Name</div>
                                                    <div class="font-desc">Paste the font family attribute from CSS code in Step 2 of FontDeck website here</div>
                                                </div>
                                                <div class="controls">
                                                    <textarea class="txtFontDeckCss"></textarea>
                                                </div>
                                            </div>

                                            <!-- Font options -->
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
                                    </div>
                                    <div class="font-container">
                                        <input type="hidden" value="">
                                        <h3>Headline H3</h3>
                                        <!-- Enable -->
                                        <div class="control-group">
                                            <div class="control-label">
                                                <div class="font-label">Enable</div>
                                            </div>
                                            <div class="controls btn-group btn-group-onoff cbEnableFont">
                                                <button class="btn btn-on ">On</button>
                                                <button class="btn btn-off active btn-danger">Off</button>
                                            </div>
                                        </div>

                                        <!-- Font type -->
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

                                            <!-- Standard Font -->
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

                                            <!-- Google Font -->
                                            <div class="font-options-google hide control-group">
                                                <div class="control-label">
                                                    <div class="font-label">Google Font</div>
                                                    <div class="font-desc">Choose the type of font you want to use for headline h1</div>
                                                </div>
                                                <div class="controls">
                                                    <input type="text" class="txtGoogleFontSelect" value="" style="display: none;">
                                                    <div class="font-select">
                                                        <a><span>Select a font</span><div><b></b></div></a>
                                                        <div class="fs-drop" style="display: none;">
                                                            <div class="fs-search">
                                                                <input type="text" class="fs-searchinput">
                                                            </div>
                                                            <ul class="fs-results" style="display: none;">
                                                                <li data-value="Open Sans" style="font-family: Open Sans; font-weight: 400">Open Sans</li>
                                                                <li data-value="Oswald" style="font-family: Oswald; font-weight: 400">Oswald</li>
                                                                <li data-value="Lustria" style="font-family: Lustria; font-weight: 400">Lustria</li>
                                                                <li data-value="Lato" style="font-family: Lato; font-weight: 400">Lato</li>
                                                                <li data-value="Roboto" style="font-family: Roboto; font-weight: 400">Roboto</li>
                                                                <li data-value="Roboto Slab" style="font-family: Roboto Slab; font-weight: 400">Roboto Slab</li>
                                                                <li data-value="Yanone Kaffeesatz" style="font-family: Yanone Kaffeesatz; font-weight: 400">Yanone Kaffeesatz</li>
                                                                <li data-value="Arvo" style="font-family: Arvo; font-weight: 400">Arvo</li>
                                                                <li data-value="Ubuntu" style="font-family: Ubuntu; font-weight: 400">Ubuntu</li>
                                                                <li data-value="Lora" style="font-family: Lora; font-weight: 400">Lora</li>
                                                                <li data-value="Raleway" style="font-family: Raleway; font-weight: 400">Raleway</li>
                                                                <li data-value="Merriweather" style="font-family: Merriweather; font-weight: 400">Merriweather</li>
                                                                <li data-value="Bitter" style="font-family: Bitter; font-weight: 400">Bitter</li>
                                                                <li data-value="Cabin" style="font-family: Cabin; font-weight: 400">Cabin</li>
                                                                <li data-value="Cuprum" style="font-family: Cuprum; font-weight: 400">Cuprum</li>
                                                                <li data-value="Quattrocento" style="font-family: Quattrocento; font-weight: 400">Quattrocento</li>
                                                                <li data-value="Quattrocento Sans" style="font-family: Quattrocento Sans; font-weight: 400">Quattrocento Sans</li>
                                                                <li data-value="Droid Sans" style="font-family: Droid Sans; font-weight: 400">Droid Sans</li>
                                                                <li data-value="Vollkorn" style="font-family: Vollkorn; font-weight: 400">Vollkorn</li>
                                                                <li data-value="PT Mono" style="font-family: PT Mono; font-weight: 400">PT Mono</li>
                                                                <li data-value="Gravitas One" style="font-family: Gravitas One; font-weight: 400">Gravitas One</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- FontDeck Name -->
                                            <div class="font-options-fontdeck hide control-group">
                                                <div class="control-label">
                                                    <div class="font-label">FontDeck Name</div>
                                                    <div class="font-desc">Paste the font family attribute from CSS code in Step 2 of FontDeck website here</div>
                                                </div>
                                                <div class="controls">
                                                    <textarea class="txtFontDeckCss"></textarea>
                                                </div>
                                            </div>

                                            <!-- Font options -->
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
                                    </div>
                                    <div class="font-container">
                                        <input type="hidden" value="">
                                        <h3>Headline H4</h3>
                                        <!-- Enable -->
                                        <div class="control-group">
                                            <div class="control-label">
                                                <div class="font-label">Enable</div>
                                            </div>
                                            <div class="controls btn-group btn-group-onoff cbEnableFont">
                                                <button class="btn btn-on ">On</button>
                                                <button class="btn btn-off active btn-danger">Off</button>
                                            </div>
                                        </div>

                                        <!-- Font type -->
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

                                            <!-- Standard Font -->
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

                                            <!-- Google Font -->
                                            <div class="font-options-google hide control-group">
                                                <div class="control-label">
                                                    <div class="font-label">Google Font</div>
                                                    <div class="font-desc">Choose the type of font you want to use for headline h1</div>
                                                </div>
                                                <div class="controls">
                                                    <input type="text" class="txtGoogleFontSelect" value="" style="display: none;">
                                                    <div class="font-select">
                                                        <a><span>Select a font</span><div><b></b></div></a>
                                                        <div class="fs-drop" style="display: none;">
                                                            <div class="fs-search">
                                                                <input type="text" class="fs-searchinput">
                                                            </div>
                                                            <ul class="fs-results" style="display: none;">
                                                                <li data-value="Open Sans" style="font-family: Open Sans; font-weight: 400">Open Sans</li>
                                                                <li data-value="Oswald" style="font-family: Oswald; font-weight: 400">Oswald</li>
                                                                <li data-value="Lustria" style="font-family: Lustria; font-weight: 400">Lustria</li>
                                                                <li data-value="Lato" style="font-family: Lato; font-weight: 400">Lato</li>
                                                                <li data-value="Roboto" style="font-family: Roboto; font-weight: 400">Roboto</li>
                                                                <li data-value="Roboto Slab" style="font-family: Roboto Slab; font-weight: 400">Roboto Slab</li>
                                                                <li data-value="Yanone Kaffeesatz" style="font-family: Yanone Kaffeesatz; font-weight: 400">Yanone Kaffeesatz</li>
                                                                <li data-value="Arvo" style="font-family: Arvo; font-weight: 400">Arvo</li>
                                                                <li data-value="Ubuntu" style="font-family: Ubuntu; font-weight: 400">Ubuntu</li>
                                                                <li data-value="Lora" style="font-family: Lora; font-weight: 400">Lora</li>
                                                                <li data-value="Raleway" style="font-family: Raleway; font-weight: 400">Raleway</li>
                                                                <li data-value="Merriweather" style="font-family: Merriweather; font-weight: 400">Merriweather</li>
                                                                <li data-value="Bitter" style="font-family: Bitter; font-weight: 400">Bitter</li>
                                                                <li data-value="Cabin" style="font-family: Cabin; font-weight: 400">Cabin</li>
                                                                <li data-value="Cuprum" style="font-family: Cuprum; font-weight: 400">Cuprum</li>
                                                                <li data-value="Quattrocento" style="font-family: Quattrocento; font-weight: 400">Quattrocento</li>
                                                                <li data-value="Quattrocento Sans" style="font-family: Quattrocento Sans; font-weight: 400">Quattrocento Sans</li>
                                                                <li data-value="Droid Sans" style="font-family: Droid Sans; font-weight: 400">Droid Sans</li>
                                                                <li data-value="Vollkorn" style="font-family: Vollkorn; font-weight: 400">Vollkorn</li>
                                                                <li data-value="PT Mono" style="font-family: PT Mono; font-weight: 400">PT Mono</li>
                                                                <li data-value="Gravitas One" style="font-family: Gravitas One; font-weight: 400">Gravitas One</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- FontDeck Name -->
                                            <div class="font-options-fontdeck hide control-group">
                                                <div class="control-label">
                                                    <div class="font-label">FontDeck Name</div>
                                                    <div class="font-desc">Paste the font family attribute from CSS code in Step 2 of FontDeck website here</div>
                                                </div>
                                                <div class="controls">
                                                    <textarea class="txtFontDeckCss"></textarea>
                                                </div>
                                            </div>

                                            <!-- Font options -->
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
                                    </div>
                                    <div class="font-container">
                                        <input type="hidden" value="">
                                        <h3>Headline H5</h3>
                                        <!-- Enable -->
                                        <div class="control-group">
                                            <div class="control-label">
                                                <div class="font-label">Enable</div>
                                            </div>
                                            <div class="controls btn-group btn-group-onoff cbEnableFont">
                                                <button class="btn btn-on ">On</button>
                                                <button class="btn btn-off active btn-danger">Off</button>
                                            </div>
                                        </div>

                                        <!-- Font type -->
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

                                            <!-- Standard Font -->
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

                                            <!-- Google Font -->
                                            <div class="font-options-google hide control-group">
                                                <div class="control-label">
                                                    <div class="font-label">Google Font</div>
                                                    <div class="font-desc">Choose the type of font you want to use for headline h1</div>
                                                </div>
                                                <div class="controls">
                                                    <input type="text" class="txtGoogleFontSelect" value="" style="display: none;">
                                                    <div class="font-select">
                                                        <a><span>Select a font</span><div><b></b></div></a>
                                                        <div class="fs-drop" style="display: none;">
                                                            <div class="fs-search">
                                                                <input type="text" class="fs-searchinput">
                                                            </div>
                                                            <ul class="fs-results" style="display: none;">
                                                                <li data-value="Open Sans" style="font-family: Open Sans; font-weight: 400">Open Sans</li>
                                                                <li data-value="Oswald" style="font-family: Oswald; font-weight: 400">Oswald</li>
                                                                <li data-value="Lustria" style="font-family: Lustria; font-weight: 400">Lustria</li>
                                                                <li data-value="Lato" style="font-family: Lato; font-weight: 400">Lato</li>
                                                                <li data-value="Roboto" style="font-family: Roboto; font-weight: 400">Roboto</li>
                                                                <li data-value="Roboto Slab" style="font-family: Roboto Slab; font-weight: 400">Roboto Slab</li>
                                                                <li data-value="Yanone Kaffeesatz" style="font-family: Yanone Kaffeesatz; font-weight: 400">Yanone Kaffeesatz</li>
                                                                <li data-value="Arvo" style="font-family: Arvo; font-weight: 400">Arvo</li>
                                                                <li data-value="Ubuntu" style="font-family: Ubuntu; font-weight: 400">Ubuntu</li>
                                                                <li data-value="Lora" style="font-family: Lora; font-weight: 400">Lora</li>
                                                                <li data-value="Raleway" style="font-family: Raleway; font-weight: 400">Raleway</li>
                                                                <li data-value="Merriweather" style="font-family: Merriweather; font-weight: 400">Merriweather</li>
                                                                <li data-value="Bitter" style="font-family: Bitter; font-weight: 400">Bitter</li>
                                                                <li data-value="Cabin" style="font-family: Cabin; font-weight: 400">Cabin</li>
                                                                <li data-value="Cuprum" style="font-family: Cuprum; font-weight: 400">Cuprum</li>
                                                                <li data-value="Quattrocento" style="font-family: Quattrocento; font-weight: 400">Quattrocento</li>
                                                                <li data-value="Quattrocento Sans" style="font-family: Quattrocento Sans; font-weight: 400">Quattrocento Sans</li>
                                                                <li data-value="Droid Sans" style="font-family: Droid Sans; font-weight: 400">Droid Sans</li>
                                                                <li data-value="Vollkorn" style="font-family: Vollkorn; font-weight: 400">Vollkorn</li>
                                                                <li data-value="PT Mono" style="font-family: PT Mono; font-weight: 400">PT Mono</li>
                                                                <li data-value="Gravitas One" style="font-family: Gravitas One; font-weight: 400">Gravitas One</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- FontDeck Name -->
                                            <div class="font-options-fontdeck hide control-group">
                                                <div class="control-label">
                                                    <div class="font-label">FontDeck Name</div>
                                                    <div class="font-desc">Paste the font family attribute from CSS code in Step 2 of FontDeck website here</div>
                                                </div>
                                                <div class="controls">
                                                    <textarea class="txtFontDeckCss"></textarea>
                                                </div>
                                            </div>

                                            <!-- Font options -->
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
                                    </div>
                                    <div class="font-container">
                                        <input type="hidden" value="">
                                        <h3>Headline H6</h3>
                                        <!-- Enable -->
                                        <div class="control-group">
                                            <div class="control-label">
                                                <div class="font-label">Enable</div>
                                            </div>
                                            <div class="controls btn-group btn-group-onoff cbEnableFont">
                                                <button class="btn btn-on ">On</button>
                                                <button class="btn btn-off active btn-danger">Off</button>
                                            </div>
                                        </div>

                                        <!-- Font type -->
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

                                            <!-- Standard Font -->
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

                                            <!-- Google Font -->
                                            <div class="font-options-google hide control-group">
                                                <div class="control-label">
                                                    <div class="font-label">Google Font</div>
                                                    <div class="font-desc">Choose the type of font you want to use for headline h1</div>
                                                </div>
                                                <div class="controls">
                                                    <input type="text" class="txtGoogleFontSelect" value="" style="display: none;">
                                                    <div class="font-select">
                                                        <a><span>Select a font</span><div><b></b></div></a>
                                                        <div class="fs-drop" style="display: none;">
                                                            <div class="fs-search">
                                                                <input type="text" class="fs-searchinput">
                                                            </div>
                                                            <ul class="fs-results" style="display: none;">
                                                                <li data-value="Open Sans" style="font-family: Open Sans; font-weight: 400">Open Sans</li>
                                                                <li data-value="Oswald" style="font-family: Oswald; font-weight: 400">Oswald</li>
                                                                <li data-value="Lustria" style="font-family: Lustria; font-weight: 400">Lustria</li>
                                                                <li data-value="Lato" style="font-family: Lato; font-weight: 400">Lato</li>
                                                                <li data-value="Roboto" style="font-family: Roboto; font-weight: 400">Roboto</li>
                                                                <li data-value="Roboto Slab" style="font-family: Roboto Slab; font-weight: 400">Roboto Slab</li>
                                                                <li data-value="Yanone Kaffeesatz" style="font-family: Yanone Kaffeesatz; font-weight: 400">Yanone Kaffeesatz</li>
                                                                <li data-value="Arvo" style="font-family: Arvo; font-weight: 400">Arvo</li>
                                                                <li data-value="Ubuntu" style="font-family: Ubuntu; font-weight: 400">Ubuntu</li>
                                                                <li data-value="Lora" style="font-family: Lora; font-weight: 400">Lora</li>
                                                                <li data-value="Raleway" style="font-family: Raleway; font-weight: 400">Raleway</li>
                                                                <li data-value="Merriweather" style="font-family: Merriweather; font-weight: 400">Merriweather</li>
                                                                <li data-value="Bitter" style="font-family: Bitter; font-weight: 400">Bitter</li>
                                                                <li data-value="Cabin" style="font-family: Cabin; font-weight: 400">Cabin</li>
                                                                <li data-value="Cuprum" style="font-family: Cuprum; font-weight: 400">Cuprum</li>
                                                                <li data-value="Quattrocento" style="font-family: Quattrocento; font-weight: 400">Quattrocento</li>
                                                                <li data-value="Quattrocento Sans" style="font-family: Quattrocento Sans; font-weight: 400">Quattrocento Sans</li>
                                                                <li data-value="Droid Sans" style="font-family: Droid Sans; font-weight: 400">Droid Sans</li>
                                                                <li data-value="Vollkorn" style="font-family: Vollkorn; font-weight: 400">Vollkorn</li>
                                                                <li data-value="PT Mono" style="font-family: PT Mono; font-weight: 400">PT Mono</li>
                                                                <li data-value="Gravitas One" style="font-family: Gravitas One; font-weight: 400">Gravitas One</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- FontDeck Name -->
                                            <div class="font-options-fontdeck hide control-group">
                                                <div class="control-label">
                                                    <div class="font-label">FontDeck Name</div>
                                                    <div class="font-desc">Paste the font family attribute from CSS code in Step 2 of FontDeck website here</div>
                                                </div>
                                                <div class="controls">
                                                    <textarea class="txtFontDeckCss"></textarea>
                                                </div>
                                            </div>

                                            <!-- Font options -->
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
                                    </div>
                                    <div class="font-container">
                                        <div class="control-group font-deck-code" style="margin-top:20px">
                                            <div class="control-label">
                                                <div class="font-label">
                                                    <label class="hasTooltip" title="" data-original-title="FontDeck code<br />Paste the JS script code from Step 1 in FontDeck website">FontDeck code</label>
                                                </div>
                                                <div class="font-desc">Paste the JS script code from Step 1 in FontDeck website</div>
                                            </div>
                                            <div class="controls">
                                                <textarea></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Layouts Profiles Tab Pane -->
                        <div class="tab-pane" id="theme">
                            <div class="profiles-pane">
                                <h3 class="title-profile">Layouts Profiles</h3>
                                <div class="profiles-pane-inner">
                                    <p>Store your modifications in a layout profile and assign it to different pages. The default layout will be used on pages without an assigned layout</p>
                                    <div class="row-fluid">
                                        <div class="span6">

                                            <!-- Select profile -->
                                            <div class="control-group">
                                                <div class="control-label">Select profile</div>
                                                <div class="controls">
                                                    <!-- Select profile -->
                                                    <select class="form-control zo2-select-profile">
                                                        <option value="default" selected="">default</option>
                                                    </select>

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
                                                            <button class="btn btn-default" id="zo2-save-profile">Save</button>
                                                            <button class="btn btn-default" id="zo2-cancel-profile">Cancel</button>
                                                        </span>
                                                    </div>
                                                    <!-- Rename profile -->
                                                    <div class="zo2-form-newProfile" id="zo2-form-renameProfile" style="display: none;">
                                                        <p>Please enter layout profile name</p>
                                                        <input type="text" id="zo2-new-profile-name" name="new-profile-name">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-default" id="zo2-rename-profile">Save</button>
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
                        </div>

                        <!------------ Layout Builder -------------->
                        <div class="profiles-pane">
                            <h3 class="title-profile">Layout Builder</h3>
                            <div class="profiles-pane-inner">
                                <div id="layoutbuilder-container">
                                    <!-- Hidden fields -->
                                    <fieldset>
                                        <!-- Input field to store generate layout data -->
                                        <input type="text" value="">
                                        <input type="hidden" id="hfTemplateName" value="zo2_hallo">
                                        <input type="hidden" id="hdLayoutBuilder" value="0">
                                        <input type="hidden" id="hfLayoutName" value="homepage">
                                    </fieldset>

                                    <!-- Main layout -->
                                    <div id="droppable-container">
                                        <div class="zo2-container ui-sortable">

                                            <!-- Top Area -->
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

                                                        <!-- Top Menu -->
                                                        <div class="sortable-col col-md-4 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="4" data-zo2-offset="0" data-zo2-position="top-menu" data-zo2-style="zo2_menu" data-zo2-customclass="col-sm-4" data-zo2-id="top-menu" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                                                            <div class="col-wrap">
                                                                <div class="col-name">top-menu</div>
                                                                <div class="col-control-buttons">
                                                                    <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                                                                    <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                                                                    <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                                                                    <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                                                                </div>
                                                                <div class="row-container"></div>
                                                            </div>
                                                        </div>

                                                        <!-- Search -->
                                                        <div class="sortable-col col-md-4 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="4" data-zo2-offset="0" data-zo2-position="search" data-zo2-style="zo2_xhtml" data-zo2-customclass="col-sm-4" data-zo2-id="top-search" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                                                            <div class="col-wrap">
                                                                <div class="col-name">search</div>
                                                                <div class="col-control-buttons">
                                                                    <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                                                                    <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                                                                    <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                                                                    <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                                                                </div>
                                                                <div class="row-container"></div>
                                                            </div>
                                                        </div>

                                                        <!-- Top Social -->
                                                        <div class="sortable-col col-md-4 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="4" data-zo2-offset="0" data-zo2-position="top-social" data-zo2-style="zo2_xhtml" data-zo2-customclass="col-sm-4" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                                                            <div class="col-wrap">
                                                                <div class="col-name">top-social</div>
                                                                <div class="col-control-buttons">
                                                                    <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                                                                    <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                                                                    <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                                                                    <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                                                                </div>
                                                                <div class="row-container"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Header Area -->
                                            <div class="zo2-row sortable-row ui-sortable" data-zo2-type="row" data-zo2-customclass="zo2-sticky" data-zo2-id="zo2-header" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1" data-zo2-fullwidth="0">
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

                                                        <!-- Mega Menu -->
                                                        <div class="sortable-col col-md-1 col-md-offset-0" data-zo2-jdoc="canvasmenu" data-zo2-type="span" data-zo2-span="1" data-zo2-offset="0" data-zo2-position="mega_menu" data-zo2-style="" data-zo2-customclass="col-xs-1" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                                                            <div class="col-wrap">
                                                                <div class="col-name">mega_menu</div>
                                                                <div class="col-control-buttons">
                                                                    <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                                                                    <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                                                                    <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                                                                    <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                                                                </div>
                                                                <div class="row-container"></div>
                                                            </div>
                                                        </div>

                                                        <!-- Header Logo -->
                                                        <div class="sortable-col col-md-3 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="3" data-zo2-offset="0" data-zo2-position="header_logo" data-zo2-style="" data-zo2-customclass="col-sm-3 col-xs-10 mobile-logo" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                                                            <div class="col-wrap">
                                                                <div class="col-name">header_logo</div>
                                                                <div class="col-control-buttons">
                                                                    <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                                                                    <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                                                                    <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                                                                    <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                                                                </div>
                                                                <div class="row-container"></div>
                                                            </div>
                                                        </div>
                                                        <div class="sortable-col col-md-8 col-md-offset-0" data-zo2-jdoc="megamenu" data-zo2-type="span" data-zo2-span="8" data-zo2-offset="0" data-zo2-position="mega_menu" data-zo2-style="none" data-zo2-customclass="col-sm-9 col-xs-2 mobile-menu" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                                                            <div class="col-wrap">
                                                                <div class="col-name">mega_menu</div>
                                                                <div class="col-control-buttons">
                                                                    <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                                                                    <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                                                                    <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                                                                    <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                                                                </div>
                                                                <div class="row-container"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Slider Area -->
                                            <div class="zo2-row sortable-row ui-sortable" data-zo2-type="row" data-zo2-customclass="full-width" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1" data-zo2-fullwidth="1">
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
                                                                <div class="row-container"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Feature Area -->
                                            <div class="zo2-row sortable-row ui-sortable" data-zo2-type="row" data-zo2-customclass="" data-zo2-id="zo2-hello" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1" data-zo2-fullwidth="0">
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
                                                                <div class="row-container"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Breadcrumb Area -->
                                            <div class="zo2-row sortable-row ui-sortable" data-zo2-type="row" data-zo2-customclass="" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1" data-zo2-fullwidth="0">
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
                                                                <div class="row-container"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Zo2 Message -->
                                            <div class="zo2-row sortable-row ui-sortable" data-zo2-type="row" data-zo2-customclass="" data-zo2-id="zo2-message" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1" data-zo2-fullwidth="0">
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
                                                                <div class="row-container"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Body Area -->
                                            <div class="zo2-row sortable-row ui-sortable" data-zo2-type="row" data-zo2-customclass="" data-zo2-id="zo2-mainframe" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1" data-zo2-fullwidth="0">
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

                                                        <!-- Body Left -->
                                                        <div class="sortable-col col-md-3 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="3" data-zo2-offset="0" data-zo2-position="left" data-zo2-style="zo2_xhtml" data-zo2-customclass="" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                                                            <div class="col-wrap">
                                                                <div class="col-name">left</div>
                                                                <div class="col-control-buttons">
                                                                    <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                                                                    <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                                                                    <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                                                                    <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                                                                </div>
                                                                <div class="row-container"></div>
                                                            </div>
                                                        </div>

                                                        <!-- Body Component -->
                                                        <div class="sortable-col col-md-6 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="6" data-zo2-offset="0" data-zo2-position="component" data-zo2-style="none" data-zo2-customclass="" data-zo2-id="zo2-component" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
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
                                                        </div>

                                                        <!-- Body Right -->
                                                        <div class="sortable-col col-md-3 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="3" data-zo2-offset="0" data-zo2-position="right" data-zo2-style="zo2_xhtml" data-zo2-customclass="" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- News Area -->
                                            <div class="zo2-row sortable-row ui-sortable" data-zo2-type="row" data-zo2-customclass="" data-zo2-id="news" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1" data-zo2-fullwidth="0">
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
                                                                <div class="row-container"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Bottom Area 1 -->
                                            <div class="zo2-row sortable-row ui-sortable" data-zo2-type="row" data-zo2-customclass="" data-zo2-id="zo2-bottom1" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1" data-zo2-fullwidth="0">
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Bottom Area 2 -->
                                            <div class="zo2-row sortable-row ui-sortable" data-zo2-type="row" data-zo2-customclass="" data-zo2-id="zo2-bottom2" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1" data-zo2-fullwidth="0">
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
                                                                <div class="row-container"></div>
                                                            </div>
                                                        </div>
                                                        <div class="sortable-col col-md-4 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="4" data-zo2-offset="0" data-zo2-position="bottom3" data-zo2-style="zo2_xhtml" data-zo2-customclass="col-sm-4" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                                                            <div class="col-wrap">
                                                                <div class="col-name">bottom3</div>
                                                                <div class="col-control-buttons">
                                                                    <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                                                                    <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                                                                    <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                                                                    <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                                                                </div>
                                                                <div class="row-container"></div>
                                                            </div>
                                                        </div>
                                                        <div class="sortable-col col-md-4 col-md-offset-0" data-zo2-jdoc="modules" data-zo2-type="span" data-zo2-span="4" data-zo2-offset="0" data-zo2-position="bottom4" data-zo2-style="zo2_xhtml" data-zo2-customclass="col-sm-4" data-zo2-id="" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1">
                                                            <div class="col-wrap">
                                                                <div class="col-name">bottom4</div>
                                                                <div class="col-control-buttons">
                                                                    <i title="" class="col-control-icon dragger icon-move hasTooltip" data-original-title="Drag column"></i>
                                                                    <i title="" class="icon-cog col-control-icon settings hasTooltip" data-original-title="Column's settings"></i>
                                                                    <i title="" class="col-control-icon add-row icon-align-justify hasTooltip" data-original-title="Append new row"></i>
                                                                    <i title="" class="icon-remove col-control-icon delete hasTooltip" data-original-title="Remove column"></i>
                                                                </div>
                                                                <div class="row-container"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Footer Area -->
                                            <div class="zo2-row sortable-row ui-sortable" data-zo2-type="row" data-zo2-customclass="" data-zo2-id="zo2-footer" data-zo2-visibility-xs="1" data-zo2-visibility-sm="1" data-zo2-visibility-md="1" data-zo2-visibility-lg="1" data-zo2-fullwidth="0">
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
                                                                <div class="row-container"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                                            <div class="control-label">
                                                                <div class="control-label">Phone</div>
                                                            </div>
                                                            <div class="controls btn-group btn-group-onoff" id="btgRowPhone">
                                                                <button class="btn btn-on">On</button>
                                                                <button class="btn btn-off">Off</button>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <div class="control-label">
                                                                <div class="control-label">Tablet</div>
                                                            </div>
                                                            <div class="controls btn-group btn-group-onoff" id="btgRowTablet">
                                                                <button class="btn btn-on">On</button>
                                                                <button class="btn btn-off">Off</button>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <div class="control-label">
                                                                <div class="control-label">Desktop</div>
                                                            </div>
                                                            <div class="controls btn-group btn-group-onoff" id="btgRowDesktop">
                                                                <button class="btn btn-on">On</button>
                                                                <button class="btn btn-off">Off</button>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
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
                                                    <div class="control-label">
                                                        <div class="control-label">Phone</div>
                                                    </div>
                                                    <div class="controls btn-group btn-group-onoff" id="btgColPhone">
                                                        <button class="btn btn-on">On</button>
                                                        <button class="btn btn-off">Off</button>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <div class="control-label">
                                                        <div class="control-label">Tablet</div>
                                                    </div>
                                                    <div class="controls btn-group btn-group-onoff" id="btgColTablet">
                                                        <button class="btn btn-on">On</button>
                                                        <button class="btn btn-off">Off</button>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <div class="control-label">
                                                        <div class="control-label">Desktop</div>
                                                    </div>
                                                    <div class="controls btn-group btn-group-onoff" id="btgColDesktop">
                                                        <button class="btn btn-on">On</button>
                                                        <button class="btn btn-off">Off</button>
                                                    </div>
                                                </div>
                                                <div class="control-group">
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

                    <!-- Profile Style -->
                    <div class="profiles-pane">
                        <h3 class="title-profile">Style</h3>
                        <div class="profiles-pane-inner">
                            <div id="zo2_themes_container">
                                <input type="hidden" value="">

                                <!-- Select which preset style -->
                                <div class="zo2_themes_row clearfix">
                                    <div class="zo2_themes_label">Select which preset style the layout should load.</div>
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

                                <!-- Preset Settings -->
                                <div class="zo2_themes_row clearfix">
                                    <div class="zo2_themes_label">Preset Settings</div>
                                    <div class="zo2_themes_form">

                                        <!-- Background -->
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

                                        <!-- Header -->
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

                                        <!-- Header top -->
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

                                        <!-- Text -->
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

                                        <!-- Link -->
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

                                        <!-- Link hover -->
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

                                        <!-- Bottom 1 -->
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

                                        <!-- Bottom 2 -->
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

                                        <!-- Footer -->
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

                                <!-- Other Preset Settings -->
                                <div class="zo2_themes_row clearfix">
                                    <div class="zo2_themes_label">Other Preset Settings</div>
                                    <div class="zo2_themes_form_container preset-setting">
                                        <div class="zo2_themes_form">
                                            <input type="button" class="btn add_more_preset" value="Add more">
                                        </div>
                                    </div>

                                    <!-- Layout Style and Background -->
                                    <div class="zo2_themes_row clearfix">
                                        <div class="zo2_themes_label">Layout Style and Background</div>
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

                                            <!-- Background Image -->
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
                                                        <a class="modal btn" title="Select" href="" rel="">Select</a>
                                                        <a class="btn hasTooltip" title="" href="#" onclick="" data-original-title="Clear">
                                                            <i class="icon-remove"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

                                            <!-- Pattern Background -->
                                            <div class="zo2_themes_label">Pattern Background</div>
                                            <div class="zo2_themes_form">
                                                <ul class="options background-select">
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/congruent_outline.png"></li>
                                                    <li class="selected"><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/congruent_pentagon.png"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/dimension_@2X.png"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/fresh_snow_@2X.png"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/index.html"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern10_black.png"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern11_black.png"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern12_black.png"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern13_black.png"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern14_black.png"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern15_black.png"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern15_white.png"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern2_black.png"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern3_black.png"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern4_black.png"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern5_black.png"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern6_black.png"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern7_black.png"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern7_white.png"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern8_black.png"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/pattern9_black.png"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/tree_bark.png"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/triangular_@2X.png"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/tweed_@2X.png"></li>
                                                    <li class=""><img rel="" src="templates/zo2_hallo/assets/zo2/images/background-patterns/wild_flowers.png"></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Assignment -->
                    <div class="profiles-pane">
                        <h3 class="title-profile">Profile Assignment: Assign this layout profile to menu items.</h3>
                        <div class="profiles-pane-inner">

                    <!-- Menu assignment -->
                    <div id="profile-menu-assignment">
                        <ul class="menu-links thumbnails">
                            <li class="span3">
                                <div class="thumbnail">
                                    <button class="btn" type="button" onclick=""><i class="icon-check"></i> Toggle Selection</button>
                                    <h5>Main Menu</h5>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Home</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Home Blue</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Home Green</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Home Orange</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Home Boxed</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Divider</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Features</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Shortcodes</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Accordion</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Blockquote</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Buttons</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Columns</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Dropcap</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Gallery</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Google Map</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Lightbox</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">List icon</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Message Box</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Pricing Tables</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Social icon</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Pricing Tables</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Tabs</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Testimonial</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Toggle Box</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Twitter</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Vimeo</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Joomla</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Category Blog</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Single Article</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Contact</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Login</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Registration</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">404</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Typography</label>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu">Blog</label>
                                </div>
                            </li>
                            <li class="span3">
                                <div class="thumbnail">
                                    <button class="btn" type="button" onclick=""><i class="icon-check"></i> Toggle Selection</button>
                                    <h5>Main Menu ar-AA</h5>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu-ar-aa">منز</label>
                                </div>
                            </li>
                            <li class="span3">
                                <div class="thumbnail">
                                    <button class="btn" type="button" onclick=""><i class="icon-check"></i> Toggle Selection</button>
                                    <h5>Main Menu en-GB</h5>
                                    <label class="checkbox small"><input type="checkbox" class="mainmenu-en-gb">Home</label>
                                </div>
                            </li>
                            <li class="span3">
                                <div class="thumbnail">
                                    <button class="btn" type="button" onclick=""><i class="icon-check"></i> Toggle Selection</button>
                                    <h5>Shortcodes</h5>
                                    <label class="checkbox small" for="link519"><input type="checkbox" value="519" id="link519" class="chk-menulink shortcode">Accordion</label>
                                    <label class="checkbox small" for="link520"><input type="checkbox" value="520" id="link520" class="chk-menulink shortcode">Blockquote</label>
                                    <label class="checkbox small" for="link521"><input type="checkbox" value="521" id="link521" class="chk-menulink shortcode">Buttons</label>
                                    <label class="checkbox small" for="link522"><input type="checkbox" value="522" id="link522" class="chk-menulink shortcode">Columns</label>
                                    <label class="checkbox small" for="link523"><input type="checkbox" value="523" id="link523" class="chk-menulink shortcode">Divider</label>
                                    <label class="checkbox small" for="link524"><input type="checkbox" value="524" id="link524" class="chk-menulink shortcode">Dropcap</label>
                                    <label class="checkbox small" for="link525"><input type="checkbox" value="525" id="link525" class="chk-menulink shortcode">Gallery</label>
                                    <label class="checkbox small" for="link526"><input type="checkbox" value="526" id="link526" class="chk-menulink shortcode">Google Map</label>
                                    <label class="checkbox small" for="link527"><input type="checkbox" value="527" id="link527" class="chk-menulink shortcode">Lightbox</label>
                                    <label class="checkbox small" for="link528"><input type="checkbox" value="528" id="link528" class="chk-menulink shortcode">List icon</label>
                                    <label class="checkbox small" for="link529"><input type="checkbox" value="529" id="link529" class="chk-menulink shortcode">Message Box</label>
                                    <label class="checkbox small" for="link530"><input type="checkbox" value="530" id="link530" class="chk-menulink shortcode">Pricing Tables</label>
                                    <label class="checkbox small" for="link531"><input type="checkbox" value="531" id="link531" class="chk-menulink shortcode">Social icon</label>
                                    <label class="checkbox small" for="link533"><input type="checkbox" value="533" id="link533" class="chk-menulink shortcode">Tabs</label>
                                    <label class="checkbox small" for="link534"><input type="checkbox" value="534" id="link534" class="chk-menulink shortcode">Testimonial</label>
                                    <label class="checkbox small" for="link535"><input type="checkbox" value="535" id="link535" class="chk-menulink shortcode">Toggle Box</label>
                                    <label class="checkbox small" for="link536"><input type="checkbox" value="536" id="link536" class="chk-menulink shortcode">Twitter</label>
                                    <label class="checkbox small" for="link537"><input type="checkbox" value="537" id="link537" class="chk-menulink shortcode">Vimeo</label>
                                </div>
                            </li>
                            <li class="span3">
                                <div class="thumbnail">
                                    <button class="btn" type="button" onclick=""><i class="icon-check"></i> Toggle Selection</button>
                                    <h5>Top Menu</h5>
                                    <label class="checkbox small" for="link473"><input type="checkbox" value="473" id="link473" class="chk-menulink top-menu">Blogs</label>
                                    <label class="checkbox small" for="link474"><input type="checkbox" value="474" id="link474" class="chk-menulink top-menu">Contacts</label>
                                    <label class="checkbox small" for="link475"><input type="checkbox" value="475" id="link475" class="chk-menulink top-menu">Login</label>
                                </div>
                            </li>
                            <li class="span3">
                                <div class="thumbnail">
                                    <button class="btn" type="button" onclick=""><i class="icon-check"></i> Toggle Selection</button>
                                    <h5>User Menu</h5>
                                    <label class="checkbox small" for="link201"><input type="checkbox" value="201" id="link201" class="chk-menulink usermenu">Your Profile</label>
                                    <label class="checkbox small" for="link449"><input type="checkbox" value="449" id="link449" class="chk-menulink usermenu">Submit an Article</label>
                                    <label class="checkbox small" for="link450"><input type="checkbox" value="450" id="link450" class="chk-menulink usermenu">Submit a Web Link</label>
                                    <label class="checkbox small" for="link448"><input type="checkbox" value="448" id="link448" class="chk-menulink usermenu">Site Administrator</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    </div>
                    </div>
                    </div>

                    <!-- Mega Menu Tab Pane -->
                    <div class="tab-pane" id="megamenu">
                        <div class="profiles-pane">
                            <h3 class="title-profile">Mega Menus</h3>
                            <div class="profiles-pane-inner">
                                <div class="control-group">
                                    <div class="control-label"></div>
                                    <div class="controls"></div>
                                </div>

                                <!-- Hover type -->
                                <div class="control-group">
                                    <div class="control-label">
                                        <label class="hasTooltip" title="" data-original-title="Hover type">Hover type</label>
                                    </div>
                                    <div class="controls">
                                        <select>
                                            <option value="hover" selected="selected">Mouse Hover</option>
                                            <option value="click">Mouse Click</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Navigation type -->
                                <div class="control-group">
                                    <div class="control-label">
                                        <label class="hasTooltip" title="" data-original-title="Navigation type">Navigation type</label>
                                    </div>
                                    <div class="controls">
                                        <select>
                                            <option value="megamenu" selected="selected">Megamenu</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Animation -->
                                <div class="control-group">
                                    <div class="control-label">
                                        <label class="hasTooltip" title="" data-original-title="Animation">Animation</label>
                                    </div>
                                    <div class="controls">
                                        <select>
                                            <option value="">None</option>
                                            <option value="fading">Fading</option>
                                            <option value="slide">Slide</option>
                                            <option value="zoom" selected="selected">Zoom</option>
                                            <option value="elastic">Elastic</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Duration -->
                                <div class="control-group">
                                    <div class="control-label">
                                        <label class="hasTooltip" title="" data-original-title="Duration">Duration</label>
                                    </div>
                                    <div class="controls">
                                        <input type="text" value="400">
                                    </div>
                                </div>

                                <!-- Show submenu -->
                                <div class="control-group">
                                    <div class="control-label">
                                        <label class="hasTooltip" title="" data-original-title="Show submenu">Show submenu</label>
                                    </div>
                                    <div class="controls">
                                        <fieldset class="radio btn-group">
                                            <input type="radio" value="0" style="display: none;">
                                            <label class="btn first">No</label>
                                            <input type="radio" value="1" checked="checked" style="display: none;">
                                            <label class="btn active btn-success">Yes</label>
                                        </fieldset>
                                    </div>
                                </div>

                                <!-- Menu type -->
                                <div class="control-group">
                                    <div class="control-label">
                                        <label class="hasTooltip" title="" data-original-title="Menu type">Menu type</label>
                                    </div>
                                    <div class="controls">
                                        <select>
                                            <option value="mainmenu" selected="selected">Main Menu</option>
                                            <option value="mainmenu-ar-aa">Main Menu ar-AA</option>
                                            <option value="mainmenu-en-gb">Main Menu en-GB</option>
                                            <option value="shortcode">Shortcodes</option>
                                            <option value="top-menu">Top Menu</option>
                                            <option value="usermenu">User Menu</option>
                                        </select>
                                        <div class="progress progress-striped zo2-progress active" style="display: none;"><div class="bar" style="width: 100%"></div></div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="control-label">
                                        <label class=""></label>
                                    </div>

                                    <!-- Megamenu Toolbox -->
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
                                                                <label class="hasTip" title="">Item caption</label>
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
                                                                    <input type="radio" class="toolbox-toggle" data-action="hideWhenCollapse" name="togglesubHideWhenCollapse" value="0" checked="checked" style="display: none;">
                                                                    <label class="btn active btn-danger first">No</label>
                                                                    <input type="radio" class="toolbox-toggle" data-action="hideWhenCollapse" name="togglesubHideWhenCollapse" value="1" style="display: none;">
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
                                                                    <input type="radio" class="toolbox-toggle" data-action="hideWhenCollapse" value="0" checked="checked" style="display: none;">
                                                                    <label class="btn active btn-danger first">No</label>
                                                                    <input type="radio" class="toolbox-toggle" data-action="hideWhenCollapse" value="1" style="display: none;">
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

                                        <div id="zo2-admin-mm-container" class="navbar clearfix">
                                            <div class="zo2-megamenu animate zoom">
                                                <ul class="nav navbar-nav level-top">
                                                    <li class="dropdown mega">
                                                        <a class="dropdown-toggle" href="#">Home<b class="caret"></b></a>
                                                        <div class="menu-child dropdown-menu mega-dropdown-menu">
                                                            <div class="mega-dropdown-inner">
                                                                <div class="row-fluid">
                                                                    <div class="span12 mega-col-nav">
                                                                        <div class="mega-inner">
                                                                            <ul class="mega-nav level1">
                                                                                <li class=""><a href="#">Home Blue<b class="caret"></b></a></li>
                                                                                <li class=""><a href="#">Home Green<b class="caret"></b></a></li>
                                                                                <li class=""><a href="#">Home Orange<b class="caret"></b></a></li>
                                                                                <li class="dropdown-submenu mega">
                                                                                    <a href="#">Home Boxed<b class="caret"></b></a>
                                                                                    <div class="menu-child  dropdown-menu mega-dropdown-menu">
                                                                                        <div class="mega-dropdown-inner">
                                                                                            <div class="row-fluid">
                                                                                                <div class="span12 mega-col-nav">
                                                                                                    <div class="mega-inner">
                                                                                                        <ul class="mega-nav level2">
                                                                                                            <li class=""><a class="" href="#">Divider<b class="caret"></b></a></li>
                                                                                                        </ul>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class=""><a class="" href="#">Features<b class="caret"></b></a></li>
                                                    <li class=""><a class="" href="#">Typography<b class="caret"></b></a></li>
                                                    <li class=""><a class="" href="#">Blog<b class="caret"></b></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <input type="hidden" value="">
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>

                    <!-- Assignment Tab Pane -->
                    <div class="tab-pane" id="assignment">
                        <div class="profiles-pane">
                            <h3 class="title-profile">Assignment</h3>
                            <div class="profiles-pane-inner">
                                <label>Menu Selection:</label>
                                <div class="btn-toolbar">
                                    <button class="btn" type="button" onclick=""><i class="icon-check"></i> Toggle Selection</button>
                                </div>
                                <div id="menu-assignment">
                                    <ul class="menu-links thumbnails">
                                        <li class="span3">
                                            <div class="thumbnail">
                                                <button class="btn" type="button" onclick=""><i class="icon-check"></i> Toggle Selection</button>
                                                <h5>Main Menu</h5>
                                                <label class="checkbox small"><input type="checkbox" value="435" id="link435" checked="checked" class="mainmenu">Home</label>
                                                <label class="checkbox small"><input type="checkbox" value="547" id="link547" class="mainmenu">Home Blue</label>
                                                <label class="checkbox small"><input type="checkbox" value="548" id="link548" class="mainmenu">Home Green</label>
                                                <label class="checkbox small"><input type="checkbox" value="549" id="link549" class="mainmenu">Home Orange</label>
                                                <label class="checkbox small"><input type="checkbox" value="550" id="link550" class="mainmenu">Home Boxed</label>
                                                <label class="checkbox small"><input type="checkbox" value="504" id="link504" class="mainmenu">Divider</label>
                                                <label class="checkbox small"><input type="checkbox" value="467" id="link467" class="mainmenu">Features</label>
                                                <label class="checkbox small"><input type="checkbox" value="468" id="link468" class="mainmenu">Shortcodes</label>
                                                <label class="checkbox small"><input type="checkbox" value="500" id="link500" class="mainmenu">Accordion</label>
                                                <label class="checkbox small"><input type="checkbox" value="501" id="link501" class="mainmenu">Blockquote</label>
                                                <label class="checkbox small"><input type="checkbox" value="502" id="link502" class="mainmenu">Buttons</label>
                                                <label class="checkbox small"><input type="checkbox" value="503" id="link503" class="mainmenu">Columns</label>
                                                <label class="checkbox small"><input type="checkbox" value="505" id="link505" class="mainmenu">Dropcap</label>
                                                <label class="checkbox small"><input type="checkbox" value="506" id="link506" class="mainmenu">Gallery</label>
                                                <label class="checkbox small"><input type="checkbox" value="507" id="link507" class="mainmenu">Google Map</label>
                                                <label class="checkbox small"><input type="checkbox" value="508" id="link508" class="mainmenu">Lightbox</label>
                                                <label class="checkbox small"><input type="checkbox" value="509" id="link509" class="mainmenu">List icon</label>
                                                <label class="checkbox small"><input type="checkbox" value="510" id="link510" class="mainmenu">Message Box</label>
                                                <label class="checkbox small"><input type="checkbox" value="511" id="link511" class="mainmenu">Pricing Tables</label>
                                                <label class="checkbox small"><input type="checkbox" value="512" id="link512" class="mainmenu">Social icon</label>
                                                <label class="checkbox small"><input type="checkbox" value="513" id="link513" class="mainmenu">Pricing Tables</label>
                                                <label class="checkbox small"><input type="checkbox" value="514" id="link514" class="mainmenu">Tabs</label>
                                                <label class="checkbox small"><input type="checkbox" value="515" id="link515" class="mainmenu">Testimonial</label>
                                                <label class="checkbox small"><input type="checkbox" value="516" id="link516" class="mainmenu">Toggle Box</label>
                                                <label class="checkbox small"><input type="checkbox" value="517" id="link517" class="mainmenu">Twitter</label>
                                                <label class="checkbox small"><input type="checkbox" value="518" id="link518" class="mainmenu">Vimeo</label>
                                                <label class="checkbox small"><input type="checkbox" value="491" id="link491" class="mainmenu">Joomla</label>
                                                <label class="checkbox small"><input type="checkbox" value="492" id="link492" class="mainmenu">Category Blog</label>
                                                <label class="checkbox small"><input type="checkbox" value="493" id="link493" class="mainmenu">Single Article</label>
                                                <label class="checkbox small"><input type="checkbox" value="494" id="link494" class="mainmenu">Contact</label>
                                                <label class="checkbox small"><input type="checkbox" value="495" id="link495" class="mainmenu">Login</label>
                                                <label class="checkbox small"><input type="checkbox" value="496" id="link496" class="mainmenu">Registration</label>
                                                <label class="checkbox small"><input type="checkbox" value="497" id="link497" class="mainmenu">404</label>
                                                <label class="checkbox small"><input type="checkbox" value="498" id="link498" class="mainmenu">Typography</label>
                                                <label class="checkbox small"><input type="checkbox" value="538" id="link538" class="mainmenu">Blog</label>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="thumbnail">
                                                <button class="btn" type="button" onclick=""><i class="icon-check"></i> Toggle Selection</button>
                                                <h5>Main Menu ar-AA</h5>
                                                <label class="checkbox small"><input type="checkbox" class="mainmenu-ar-aa">منز</label>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="thumbnail">
                                                <button class="btn" type="button" onclick=""><i class="icon-check"></i> Toggle Selection</button>
                                                <h5>Main Menu en-GB</h5>
                                                <label class="checkbox small"><input type="checkbox" class="mainmenu-en-gb">Home</label>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="thumbnail">
                                                <button class="btn" type="button" onclick=""><i class="icon-check"></i> Toggle Selection</button>
                                                <h5>Shortcodes</h5>
                                                <label class="checkbox small"><input type="checkbox" class="chk-menulink shortcode">Accordion</label>
                                                <label class="checkbox small"><input type="checkbox" class="chk-menulink shortcode">Blockquote</label>
                                                <label class="checkbox small"><input type="checkbox" class="chk-menulink shortcode">Buttons</label>
                                                <label class="checkbox small"><input type="checkbox" class="chk-menulink shortcode">Columns</label>
                                                <label class="checkbox small"><input type="checkbox" class="chk-menulink shortcode">Divider</label>
                                                <label class="checkbox small"><input type="checkbox" class="chk-menulink shortcode">Dropcap</label>
                                                <label class="checkbox small"><input type="checkbox" class="chk-menulink shortcode">Gallery</label>
                                                <label class="checkbox small"><input type="checkbox" class="chk-menulink shortcode">Google Map</label>
                                                <label class="checkbox small"><input type="checkbox" class="chk-menulink shortcode">Lightbox</label>
                                                <label class="checkbox small"><input type="checkbox" class="chk-menulink shortcode">List icon</label>
                                                <label class="checkbox small"><input type="checkbox" class="chk-menulink shortcode">Message Box</label>
                                                <label class="checkbox small"><input type="checkbox" class="chk-menulink shortcode">Pricing Tables</label>
                                                <label class="checkbox small"><input type="checkbox" class="chk-menulink shortcode">Social icon</label>
                                                <label class="checkbox small"><input type="checkbox" class="chk-menulink shortcode">Tabs</label>
                                                <label class="checkbox small"><input type="checkbox" class="chk-menulink shortcode">Testimonial</label>
                                                <label class="checkbox small"><input type="checkbox" class="chk-menulink shortcode">Toggle Box</label>
                                                <label class="checkbox small"><input type="checkbox" class="chk-menulink shortcode">Twitter</label>
                                                <label class="checkbox small"><input type="checkbox" class="chk-menulink shortcode">Vimeo</label>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="thumbnail">
                                                <button class="btn" type="button" onclick=""><i class="icon-check"></i> Toggle Selection</button>
                                                <h5>Top Menu</h5>
                                                <label class="checkbox small"><input type="checkbox" class="chk-menulink top-menu">Blogs</label>
                                                <label class="checkbox small"><input type="checkbox" class="chk-menulink top-menu">Contacts</label>
                                                <label class="checkbox small"><input type="checkbox" class="chk-menulink top-menu">Login</label>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="thumbnail">
                                                <button class="btn" type="button" onclick=""><i class="icon-check"></i> Toggle Selection</button>
                                                <h5>User Menu</h5>
                                                <label class="checkbox small" for="link201"><input type="checkbox" value="201" id="link201" class="chk-menulink usermenu">Your Profile</label>
                                                <label class="checkbox small" for="link449"><input type="checkbox" value="449" id="link449" class="chk-menulink usermenu">Submit an Article</label>
                                                <label class="checkbox small" for="link450"><input type="checkbox" value="450" id="link450" class="chk-menulink usermenu">Submit a Web Link</label>
                                                <label class="checkbox small" for="link448"><input type="checkbox" value="448" id="link448" class="chk-menulink usermenu">Site Administrator</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Advanced Tab Pane -->
                    <div class="tab-pane" id="advanced">
                        <div class="profiles-pane">
                        <h3 class="title-profile">Advanced</h3>
                            <div class="profiles-pane-inner">
                                <div class="accordion" id="advanced-accordion">
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-google">Google</a>
                                        </div>
                                        <div id="advanced-google" class="accordion-body collapse in">
                                            <div class="accordion-inner">
                                                <div class="control-group">
                                                    <div class="control-label">
                                                        <label class="hasTooltip" title="" data-original-title="Google Authorship">Google Authorship</label>
                                                    </div>
                                                    <div class="controls">
                                                        <fieldset class="radio btn-group"><input type="radio" value="0" checked="checked" style="display: none;">
                                                            <label class="btn active btn-danger first">No</label>
                                                            <input type="radio" value="1" style="display: none;">
                                                            <label class="btn">Yes</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <div class="control-label">
                                                        <label class="hasTooltip" title="" data-original-title="Google Profile URL">Google Profile URL</label>
                                                    </div>
                                                    <div class="controls">
                                                        <input type="text" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-comments">Comments</a>
                                        </div>
                                        <div id="advanced-comments" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                                <div class="control-group">
                                                    <div class="control-label">
                                                        <label class="hasTooltip" title="" data-original-title="Enable Comments">Enable Comments</label>
                                                    </div>
                                                    <div class="controls">
                                                        <fieldset class="radio btn-group">
                                                            <input type="radio" value="1" style="display: none;">
                                                            <label class="btn">Yes</label>
                                                            <input type="radio" value="0" checked="checked" style="display: none;">
                                                            <label class="btn active btn-danger first">No</label>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <div class="control-label">
                                                        <label class="hasTooltip" title="" data-original-title="Tabs Order<br />Only tabs listed will be showed">Tabs Order</label>
                                                    </div>
                                                    <div class="controls">
                                                        <input type="text" value="facebook,gplus,disqus">
                                                        <div style="margin: 5px 0;">
                                                            <strong>Notes</strong>: Comma Separated List, First listed is the default, If left empty it will use default value below, only tabs listed will be shown. <br>
                                                            <strong>Possible Values </strong>: gplus,facebook,disqus <br>
                                                            <strong>Default Value </strong>: gplus,facebook <br>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <div class="control-label">
                                                        <label class="hasTooltip" title="" data-original-title="Disqus Shortname<br />Required if showing the disqus tab">Disqus Shortname</label>
                                                    </div>
                                                    <div class="controls">
                                                        <input type="text" value="zootemplates">
                                                        <div style="margin: 5px 0;">
                                                            <strong>Notes </strong>: Required if showing the Disqus Tab
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <div class="control-label">
                                                        <label class="">Facebook Label</label>
                                                    </div>
                                                    <div class="controls">
                                                        <input type="text" value="Facebook">
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <div class="control-label">
                                                        <label class="">Google+ Label</label>
                                                    </div>
                                                    <div class="controls">
                                                        <input type="text" value="Google+">
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <div class="control-label">
                                                        <label class="">Disqus Label</label>
                                                    </div>
                                                    <div class="controls">
                                                        <input type="text" value="Disqus">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-advanced">Advanced Options</a>
                                        </div>
                                        <div id="advanced-advanced" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                                <div class="control-group">
                                                    <div class="control-label">
                                                        <label class="hasTooltip" title="" data-original-title="Tracking code<br />Include the tracking code">Tracking code</label>
                                                    </div>
                                                    <div class="controls">
                                                        <textarea></textarea>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <div class="control-label">
                                                        <label class="hasTooltip" title="" data-original-title="Hide Component Area<br />Show component area from front page">Hide Component Area</label>                </div>
                                                    <div class="controls">
                                                        <fieldset class="radio btn-group"><input type="radio" value="0" checked="checked" style="display: none;">
                                                            <label class="btn active btn-danger first">No</label>
                                                            <input type="radio" value="1" style="display: none;">
                                                            <label class="btn">Yes</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <div class="control-label">
                                                        <label class="hasTooltip" title="" data-original-title="Combine CSS<br />Combine CSS files into one file">Combine CSS</label>
                                                    </div>
                                                    <div class="controls">
                                                        <fieldset class="radio btn-group"><input type="radio" value="0" checked="checked" style="display: none;">
                                                            <label class="btn active btn-danger first">No</label>
                                                            <input type="radio" value="1" style="display: none;">
                                                            <label class="btn">Yes</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <div class="control-label">
                                                        <label class="hasTooltip" title="" data-original-title="Combine JS<br />Combine JS files into one file">Combine JS</label>
                                                    </div>
                                                    <div class="controls">
                                                        <fieldset class="radio btn-group">
                                                            <input type="radio" value="0" checked="checked" style="display: none;">
                                                            <label class="btn active btn-danger first">No</label>
                                                            <input type="radio" value="1" style="display: none;">
                                                            <label class="btn">Yes</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <div class="control-label">
                                                        <label class="hasTooltip" title="" data-original-title="Load jQuery<br />Force load jQuery">Load jQuery</label>
                                                    </div>
                                                    <div class="controls">
                                                        <fieldset class="radio btn-group"><input type="radio" value="0" checked="checked" style="display: none;">
                                                            <label class="btn active btn-danger first">No</label>
                                                            <input type="radio" value="1" style="display: none;">
                                                            <label class="btn">Yes</label>
                                                        </fieldset>
                                                    </div>
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
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#advanced-accordion" href="#advanced-dev">Developer Options</a>
                                        </div>
                                        <div id="advanced-dev" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                                <div class="control-group">
                                                    <div class="control-label">
                                                        <label class="hasTooltip" title="" data-original-title="Debug<br />Allow Developer to rebuild the cache. ONLY use this feature if you are developer">Debug</label>
                                                    </div>
                                                    <div class="controls">
                                                        <fieldset class="radio btn-group">
                                                            <input type="radio" value="0" checked="checked" style="display: none;">
                                                            <label class="btn active btn-danger first">No</label>
                                                            <input type="radio" value="1" style="display: none;">
                                                            <label class="btn">Yes</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <div class="control-label">
                                                        <label class="hasTooltip" title="" data-original-title="Disable mootools<br />Disable mootools to avoid script conflict">Disable mootools</label>
                                                    </div>
                                                    <div class="controls">
                                                        <fieldset class="radio btn-group">
                                                            <input type="radio" value="0" style="display: none;">
                                                            <label class="btn first">No</label>
                                                            <input type="radio" value="1" checked="checked" style="display: none;">
                                                            <label class="btn active btn-success">Yes</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

