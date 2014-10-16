<!-- Mega Menu Tab Pane -->
<div class="tab-pane" id="zo2-menu">
    <blockquote>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        <small>Someone famous <cite title="Source Title">Source Title</cite></small>
    </blockquote>
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