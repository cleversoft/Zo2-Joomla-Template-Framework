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
         * Add event when value change
         * @returns {undefined}
         */
        fontChange: function() {
            var _self = this;

            //update example text when standard font change
            jQuery('.ddl-standard-font').change(function() {
                jQuery(this).next().css('font-family', $(this).val());
            });

            //show the current font type
            jQuery('.zo2-font-container').each(function() {
                jQuery(this).find('.zo2-font-options').hide();
                jQuery(this).find('.zo2-font-options-'+jQuery(this).find('.zo2-font-type').val()).show();
            });

            //select font type
            jQuery('.zo2-font-container .font-types button').click(function() {
                var $fontype = $(this).closest('.font-types');
                var $container = $(this).closest('.zo2-font-container');
                $fontype.find('button').removeClass('btn-success');
                $(this).addClass('btn-success');
                $fontype.find('.zo2-font-type').val($(this).data('target'));
                $container.find('.zo2-font-options').hide();
                $container.find('.zo2-font-options-'+$(this).data('target')).fadeIn(300);

            });

            //google font select
            this.googleFont = $('.txt-googlefont-select').fontselect();

            $(".txt-googlefont-select").change(function() {
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