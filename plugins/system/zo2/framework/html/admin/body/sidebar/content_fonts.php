<!-- Tab Fonts -->
<div class="tab-pane" id="zo2-fonts">
    <blockquote>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        <small>Someone famous <cite title="Source Title">Source Title</cite></small>
    </blockquote>
    <div class="profiles-pane">        
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
