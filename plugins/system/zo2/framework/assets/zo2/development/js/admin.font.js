/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */

/**
 * Zo2 Admin font
 * @param {type} w Window pointer
 * @param {type} z Zo2 pointer
 * @param {type} $ jQuery pointer
 * @returns {undefined}
 */
(function(w, z, $) {
    /**
     * Font class
     */
    var _font = {
        googleFont: null,
        /**
         * Element variables
         */
        _elements: {
        },
        /**
         * Init function
         * @returns {undefined}
         */
        _init: function() {
            this.fontChange();
            this.fontSizeSlider();
        },
        /**
         * Event select font size
         * @returns {undefined}
         */
        fontSizeSlider: function() {
            jQuery('.font_single_slider').jRange({
                from: 1,
                to: 100,
                step: 1,
                scale: [1, 50, 100],
                format: '%s',
                width: 300,
                showLabels: true
            });
        },
        /**
         * Gender font seting
         * @param {jQuery object} $container
         * @returns {undefined}
         */
        generateFontOptions: function($container) {
            var $result = $container.find(' > input:first');
            var options = {};
            var size = parseInt($container.find('.txtFontSize').val());
            var font_line_height = parseInt($container.find('.txtFontLineHeight').val());

            if ($container.find('.btnStandardFonts').hasClass('active')) {
                options = {
                    type: 'standard',
                    family: $container.find('.ddlStandardFont').val(),
                    size: size,
                    font_line_height: font_line_height,
                    color: $container.find('.txtColorPicker').val(),
                    style: $container.find('.ddlFontStyle').val()
                };
            }
            else if ($container.find('.btnGoogleFonts').hasClass('active')) {
                options = {
                    type: 'googlefonts',
                    family: $container.find('.txtGoogleFontSelect').val(),
                    size: size,
                    font_line_height: font_line_height,
                    color: $container.find('.txtColorPicker').val(),
                    style: $container.find('.ddlFontStyle').val()
                };
            }
            else if ($container.find('.btnFontDeck').hasClass('active')) {
                options = {
                    type: 'fontdeck',
                    family: $container.find('.txtFontDeckCss').val(),
                    size: size,
                    font_line_height: font_line_height,
                    color: $container.find('.txtColorPicker').val(),
                    style: $container.find('.ddlFontStyle').val()
                };
            }

            $result.val(w.JSON.stringify(options));
        },
        /**
         * Add event when value change
         * @returns {undefined}
         */
        fontChange: function() {
            var _self = this;
            jQuery('.ddlStandardFont').change(function() {
                jQuery(this).next().css('font-family', $(this).val());
            });
            jQuery('.font-container').on('click', '.btnStandardFonts', function() {
                var $container = $(this).closest('.font-container');
                $container.find('.font-types').find('button').removeClass('btn-success');
                $(this).addClass('btn-success');
                $container.find('.font-options-google').stop().slideUp(300);
                $container.find('.font-options-fontdeck').stop().slideUp(300);
                $container.find('.font-options-standard').stop().slideDown(400);
                _self.generateFontOptions($container);
            });
            jQuery('.font-container').on('click', '.btnGoogleFonts', function() {
                var $container = $(this).closest('.font-container');
                $container.find('.font-types').find('button').removeClass('btn-success');
                $(this).addClass('btn-success');
                $container.find('.font-options-standard').stop().slideUp(300);
                $container.find('.font-options-fontdeck').stop().slideUp(300);
                $container.find('.font-options-google').stop().slideDown(400);
                _self.generateFontOptions($container);
            });
            jQuery('.font-container').on('click', '.btnFontDeck', function() {
                var $container = $(this).closest('.font-container');
                $container.find('.font-types').find('button').removeClass('btn-success');
                $(this).addClass('btn-success');
                $container.find('.font-options-standard').stop().slideUp(300);
                $container.find('.font-options-google').stop().slideUp(300);
                $container.find('.font-options-fontdeck').stop().slideDown(400);
                _self.generateFontOptions($container);
            });

            // listen to font options change
            var changeSelector = '.txtFontSize, .txtColorPicker, .ddlFontStyle, .txtFontDeckCss, .txtGoogleFontSelect, .txtFontLineHeight,' +
                    ' .ddlStandardFont';

            jQuery('.font-container').on('change', changeSelector, function() {
                var $container = $(this).closest('.font-container');
                _self.generateFontOptions($container);
            });

            this.googleFont = $('.txtGoogleFontSelect').fontselect();

            $(".txtGoogleFontSelect").change(function() {
                _self.googleFontSet(_self.googleFont);
            });

        },
        /**
         * Set google font field
         * @returns {undefined}
         */
        googleFontSet: function() {
            var relid = this.googleFont.attr('id');
            /* replace + signs with spaces for css */
            var font = this.googleFont.val().replace(/\+/g, ' ');
            /* split font into family and weight */
            font = font.split(':');
            var style = "normal";
            var weight = font[1];
            if (font[1].indexOf("italic") >= 0) {
                style = "italic";
            }
            /* set family on example */
            jQuery('#' + relid + '.example').css('font-family', font[0]);
            jQuery('#' + relid + '.example').css('font-weight', weight.replace('italic', ''));
            jQuery('#' + relid + '.example').css('font-style', style);
            /* set family on example */
            jQuery('#' + relid + '_example.example').css('font-family', font[0]);
            jQuery('#' + relid + '_example.example').css('font-weight', weight.replace('italic', ''));
            jQuery('#' + relid + '_example.example').css('font-style', style);
        }
    };
    
    /**
     * Append to Zo2 admin
     */
    z.admin.font = _font;

    /**
     * Init plugin
     * Put all of your init code into _init
     */
    $(w.document).ready(function() {
        z.admin.font._init();
    });

})(window, zo2, zo2.jQuery);