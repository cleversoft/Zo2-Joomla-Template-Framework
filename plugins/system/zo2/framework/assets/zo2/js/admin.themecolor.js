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
 * Themecolor
 * @param {type} w Window pointer
 * @param {type} z Zo2 pointer
 * @param {type} $ jQuery pointer
 * @returns {undefined}
 */
(function(w, z, $) {

    /**
     * Admin preset theme color
     */
    var _themecolor = {
        /**
         * Element variables
         */
        _elements: {
        },
        /**
         *  Initial events for preset theme
         * @returns {undefined}
         */
        _init: function() {
            this.selectPreset();
            this.colorPresetChange();
            this.selectBackgroundImage();
            this.selectLayoutType();
        },
        /**
         * Select preset
         * @returns {undefined}
         */
        selectPreset: function() {
            jQuery('#zo2_themes').on('click', '> li', function() {
                var $this = $(this);
                var $container = $('#zo2_themes_container');
                var $list = $('#zo2_themes');
                var $input = $container.find('> input');
                $list.find('>li').removeClass('active');
                $this.addClass('active');
                $input.val($this.attr('data-zo2-theme'));

                $('#color_background').colorpicker('setValue', $this.attr('data-zo2-background'));
                $('#color_header').colorpicker('setValue', $this.attr('data-zo2-header-top'));
                $('#color_header_top').colorpicker('setValue', $this.attr('data-zo2-header'));
                $('#color_text').colorpicker('setValue', $this.attr('data-zo2-text'));
                $('#color_link').colorpicker('setValue', $this.attr('data-zo2-link'));
                $('#color_link_hover').colorpicker('setValue', $this.attr('data-zo2-link-hover'));
                $('#color_bottom1').colorpicker('setValue', $this.attr('data-zo2-bottom1'));
                $('#color_bottom2').colorpicker('setValue', $this.attr('data-zo2-bottom2'));
                $('#color_footer').colorpicker('setValue', $this.attr('data-zo2-footer'));

                $('#color_background_preview').css('background-color', $this.attr('data-zo2-background'));
                $('#color_header_preview').css('background-color', $this.attr('data-zo2-header'));
                $('#color_header_top_preview').css('background-color', $this.attr('data-zo2-header-top'));
                $('#color_text_preview').css('background-color', $this.attr('data-zo2-text'));
                $('#color_link_preview').css('background-color', $this.attr('data-zo2-link'));
                $('#color_link_hover_preview').css('background-color', $this.attr('data-zo2-link-hover'));
                $('#color_bottom1_preview').css('background-color', $this.attr('data-zo2-bottom1'));
                $('#color_bottom2_preview').css('background-color', $this.attr('data-zo2-bottom2'));
                $('#color_footer_preview').css('background-color', $this.attr('data-zo2-footer'));
                z.admin.themecolor.generatePresetData();
            });
        },
        /**
         * Generate data from preset box
         * @returns {undefined}
         */
        generatePresetData: function() {
            var currentPreset = jQuery('#zo2_themes').find('.active');
            var hiddenInput = jQuery('#zo2_themes_container').find('input:first');
            var data = {
                name: currentPreset.attr('data-zo2-theme'),
                css: currentPreset.attr('data-zo2-css'),
                less: currentPreset.attr('data-zo2-less'),
                boxed: jQuery('#background_image_wrapper .btn-group').find(':checked').val(),
                background: jQuery('#color_background').val(),
                header: jQuery('#color_header').val(),
                header_top: jQuery('#color_header_top').val(),
                text: jQuery('#color_text').val(),
                link: jQuery('#color_link').val(),
                link_hover: jQuery('#color_link_hover').val(),
                bottom1: jQuery('#color_bottom1').val(),
                bottom2: jQuery('#color_bottom2').val(),
                footer: jQuery('#color_footer').val(),
                bg_image: jQuery('#zo2_background_image').val(),
                bg_pattern: jQuery('.background-select li.selected img').attr('rel')
            };
            jQuery(hiddenInput).val(w.JSON.stringify(data));
        },
        /**
         * Color preset change
         * @returns {undefined}
         */
        colorPresetChange: function() {
            $('#zo2_themes_container').find('.txtColorPicker').colorpicker().on('change', function() {
                var $this = $(this);
                var $parent = $this.parent();
                var $preview = $parent.find('.color-preview');
                if ($this.val().length > 0)
                    $preview.css('background-color', $this.val());
                else
                    $preview.css('background-color', 'transparent');

                z.admin.themecolor.generatePresetData();
            });
        },
        /**
         * Select background image
         * @returns {undefined}
         */
        selectBackgroundImage: function() {
            jQuery('.background-select li').click(function() {
                if (jQuery(this).hasClass('selected')) {
                    jQuery(this).removeClass('selected');
                } else {
                    jQuery(".background-select li").removeClass('selected');
                    jQuery(this).addClass('selected');
                }
                z.admin.themecolor.generatePresetData();
            });
        },
        /**
         * Select layout type
         * @returns {undefined}
         */
        selectLayoutType: function() {
            $('#background_image_wrapper .btn-group').on('click', function() {
                if ($(this).find(':checked').val() === '0') {
                    $('#background_image_wrapper #background_image_selector').hide('slow');
                } else {
                    $('#background_image_wrapper #background_image_selector').show('slow');
                }
                z.admin.themecolor.generatePresetData();
            });
            jQuery('#zo2_background_image').change(function() {
                z.admin.themecolor.generatePresetData();
            });
        }
    };

    /**
     * Append to Zo2 admin
     */
    z.admin.themecolor = _themecolor;

    /**
     * Init plugin
     * Put all of your init code into _init
     */
    $(w.document).ready(function() {
        z.admin.themecolor._init();
    });

})(window, zo2, zo2.jQuery);