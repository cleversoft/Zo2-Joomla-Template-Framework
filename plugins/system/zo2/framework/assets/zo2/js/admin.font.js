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
(function (w, z, $) {
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
        _init: function () {
            this.fontChange();
            this.fontSizeSlider();
        },
        /**
         * Event select font size
         * @returns {undefined}
         */
        fontSizeSlider: function () {
            $('.font_single_slider').jRange({
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
         * Add event when value change
         * @returns {undefined}
         */
        fontChange: function () {
            var _self = this;

            //update example text when standard font change
            $('.ddl-standard-font').change(function () {
                $(this).next().css('font-family', $(this).val());
            });

            //show the current font type
            $('.zo2-font-container').each(function () {
                $(this).find('.zo2-font-options').hide();
                $(this).find('.zo2-font-options-' + jQuery(this).find('.zo2-font-type').val()).show();
            });

            //select font type
            $('.zo2-font-container .font-types button').click(function () {
                var $fontype = $(this).closest('.font-types');
                var $container = $(this).closest('.zo2-font-container');
                $fontype.find('button').removeClass('btn-success');
                if ($(this).data('target') != 'none') {
                    $(this).addClass('btn-success');
                } else {
                    $(this).addClass('btn-default');
                }

                $fontype.find('.zo2-font-type').val($(this).data('target'));
                $container.find('.zo2-font-options').hide();
                $container.find('.zo2-font-options-' + $(this).data('target')).fadeIn(300);
                if ($(this).data('target') != 'none') {
                    $container.find('.zo2-font-size-option').fadeIn(300);
                    $container.find('.zo2-font-lineheight-option').fadeIn(300);
                } else if ($(this).data('target') == 'none') {
                    $container.find('.zo2-font-size-option').hide();
                    $container.find('.zo2-font-lineheight-option').hide();
                }

            });

            //google font select
            this.googleFont = $('.txt-googlefont-select').fontselect();
            this.googleFont.change(function () {
                var $example = $(this).parent().find('h3');
                /* replace + signs with spaces for css */
                var font = $(this).val().replace(/\+/g, ' ');
                /* split font into family and weight */
                font = font.split(':');
                if (font.length >= 2) {
                    var style = "normal";
                    var weight = font[1];
                    if (font[1].indexOf("italic") >= 0) {
                        style = "italic";
                    }
               
                    /* set family on example */
                    $example.css('font-family', font[0]);
                    $example.css('font-weight', weight.replace('italic', ''));
                    $example.css('font-style', style);
                }
            });
            /* Init font & fontsize option */
            this.googleFont.trigger('change');
            $('.zo2-font-container .font-types button').each(function(){
                if($(this).hasClass('active') && $(this).hasClass('btn-success')){
                    $(this).trigger('click');
                }
            });
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
    $(w.document).ready(function () {
        z.admin.font._init();
    });

})(window, zo2, zo2.jQuery);