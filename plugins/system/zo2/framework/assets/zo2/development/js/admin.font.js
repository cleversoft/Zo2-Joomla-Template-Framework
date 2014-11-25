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
 *
 * @param {type} window
 * @param {type} zo2
 * @param {type} $
 * @returns {undefined}
 */
(function (window, zo2, $) {
    /**
     * Admin font setting
     */
    zo2.admin.font = {
        /**
         * Element variables
         */
        _elements: {

        },

        _init: function () {
            this.fontChange();
            this.fontSizeSlider();
            this.initFontActive();
        },
        /**
         * Event select font size
         * @returns {undefined}
         */
        fontSizeSlider: function () {
            jQuery(".slider_font_size").slider({
                min: 5,
                max: 100,
                value: jQuery(this).next().next().val(),
                slide: function (event, ui) {
                    jQuery(this).next().html(ui.value + ' px');
                    jQuery(this).next().next().val(ui.value);
                }
            });
        },
        /**
         * Gender font seting
         * @returns {undefined}
         */
        generateFontOptions: function ($container) {
            var $result = $container.find(' > input:first');
            var $enable = $container.find('.cbEnableFont');
            if (!$enable.find('.btn-on').hasClass('active')) {
                $result.val('');
                return;
            }

            var options = {};

            var size = parseInt($container.find('.txtFontSize').val());
            if (isNaN(size))
                size = 12;
            if (size <= 0)
                size = 12;

            if ($container.find('.btnStandardFonts').hasClass('active')) {
                options = {
                    type: 'standard',
                    family: $container.find('.ddlStandardFont').val(),
                    size: size,
                    font_line_height: parseInt($container.find('.txtFontLineHeight').val()),
                    color: $container.find('.txtColorPicker').val(),
                    style: $container.find('.ddlFontStyle').val()
                };
            }
            else if ($container.find('.btnGoogleFonts').hasClass('active')) {
                options = {
                    type: 'googlefonts',
                    family: $container.find('.txtGoogleFontSelect').val(),
                    size: size,
                    color: $container.find('.txtColorPicker').val(),
                    style: $container.find('.ddlFontStyle').val()
                };
            }
            else if ($container.find('.btnFontDeck').hasClass('active')) {
                options = {
                    type: 'fontdeck',
                    family: $container.find('.txtFontDeckCss').val(),
                    size: size,
                    color: $container.find('.txtColorPicker').val(),
                    style: $container.find('.ddlFontStyle').val()
                };
            }

            $result.val(JSON.stringify(options));
        },
        /**
         * Add event when value change
         * @returns {undefined}
         */
        fontChange: function () {
            $('#font_chooser').on('font-change', '.font-container', function () {
                var $this = $(this);
                zo2.admin.font.generateFontOptions($this);
            });

            $('.font-container').on('click', '.btnStandardFonts', function () {
                var $this = $(this);
                var $container = $this.closest('.font-container');
                $container.find('.font-types').find('button').removeClass('btn-success');
                $this.addClass('btn-success');
                $container.find('.font-options-google').stop().slideUp(300);
                $container.find('.font-options-fontdeck').stop().slideUp(300);
                $container.find('.font-options-standard').stop().slideDown(400, function () {
                    $container.trigger('font-change');
                });
            });

            $('.font-container').on('click', '.btnGoogleFonts', function () {
                var $this = $(this);
                var $container = $this.closest('.font-container');
                $container.find('.font-types').find('button').removeClass('btn-success');
                $this.addClass('btn-success');
                $container.find('.font-options-standard').stop().slideUp(300);
                $container.find('.font-options-fontdeck').stop().slideUp(300);
                $container.find('.font-options-google').stop().slideDown(400, function () {
                    $container.trigger('font-change');
                });
            });

            $('.font-container').on('click', '.btnFontDeck', function () {
                var $this = $(this);
                var $container = $this.closest('.font-container');
                $container.find('.font-types').find('button').removeClass('btn-success');
                $this.addClass('btn-success');
                $container.find('.font-options-standard').stop().slideUp(300);
                $container.find('.font-options-google').stop().slideUp(300);
                $container.find('.font-options-fontdeck').stop().slideDown(400, function () {
                    $container.trigger('font-change');
                });
            });

            // listen to font options change
            var changeSelector = '.txtFontSize, .cbEnableFont, .txtColorPicker, .ddlFontStyle, .txtFontDeckCss, .txtGoogleFontSelect, .txtFontLineHeight' +
                '.ddlStandardFont';

            $('.font-container').on('change', changeSelector, function () {
                var $this = $(this);
                var $container = $this.closest('.font-container');
                $container.trigger('font-change');
            });
        },
        /**
         * Init font container: show/hide depends on active
         * @returns {undefined}
         */
        initFontActive: function () {
            $('.cbEnableFont').each(function () {
                var $this = $(this);
                var $container = $this.closest('.font-container');
                var $optionsContainer = $container.find('>.font_options');

                if ($this.find('.btn-on').hasClass('active'))
                    $optionsContainer.show();
                else
                    $optionsContainer.hide();
            });

            $('.cbEnableFont > button').on('click', function () {
                var $this = $(this);
                var $container = $this.closest('.font-container');
                var $optionsContainer = $container.find('>.font_options');

                if ($container.find('.btn-on').hasClass('active'))
                    $optionsContainer.stop().slideDown();
                else
                    $optionsContainer.stop().slideUp();

                $container.trigger('font-change');
            });
        }
    };
    /**
     * Init plugin
     * Put all of your init code into _init
     */
    $(document).ready(function () {
        zo2.admin.layoutbuilder._init();
    });
})(window, zo2, zo2.jQuery);