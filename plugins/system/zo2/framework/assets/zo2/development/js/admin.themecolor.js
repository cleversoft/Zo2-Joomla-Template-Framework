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
     * Admin preset theme color
     */
    zo2.admin.themecolor = {

        /**
         * Element variables
         */
        _elements: {

        },

        /**
         *  Initial events for preset theme
         * @returns {undefined}
         */
        _init: function () {
            this.selectPreset();
            this.addMorePreset();
            this.removePreset();
            this.colorPresetChange();
            this.selectBackgroundImage();
            this.selectLayoutType();
        },

        /**
         *
         * @returns {undefined}
         */
        selectPreset: function () {
            jQuery('#zo2_themes').on('click', '> li', function () {
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

                zo2.admin.themecolor.generatePresetData();
            });
        },
        /**
         * Generate data from preset box
         * @returns {undefined}
         */
        generatePresetData: function () {
            var currentPreset = jQuery('#zo2_themes').find('.active');
            var hiddenInput = jQuery('#zo2_themes_container').find('input:first');
            var data = {
                name: currentPreset.attr('data-zo2-theme'),
                css: currentPreset.attr('data-zo2-css'),
                less: currentPreset.attr('data-zo2-less'),
                boxed: jQuery('#zo2_boxed_style').val(),
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
            jQuery(hiddenInput).val(JSON.stringify(data));
        },
        /**
         * Add more other preset setting
         * @returns {undefined}
         */
        addMorePreset: function () {
            $('.add_more_preset').click(function () {
                $(this).parent().before(
                    '<div class="zo2_themes_form">' +
                        '<div class="control-group">' +
                        '<div class="control-label">' +
                        '<label><input placeholder="ID or class of element" value="" class="zo2_other_preset zo2_other_preset_element"></label>' +
                        '</div>' +
                        '<div class="controls">' +
                        '<div class="colorpicker-container">' +
                        '<input id="extra_element_value" type="text" class="txtColorPicker zo2_other_preset zo2_other_preset_value" value="">' +
                        '<span id="extra_element_preview" class="color-preview" style="background-color: transparent"></span>' +
                        '<input type="button" class="btn remove_preset" value="Remove" />' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>'
                );
                $('#zo2_themes_container').find('.txtColorPicker').colorpicker().on('change', function () {
                    var $this = $(this);
                    var $parent = $this.parent();
                    var $preview = $parent.find('.color-preview');
                    if ($this.val().length > 0)
                        $preview.css('background-color', $this.val());
                    else
                        $preview.css('background-color', 'transparent');

                    zo2.admin.themecolor.generatePresetData();
                });

                $('.zo2_other_preset_element').on('change', function () {
                    zo2.admin.themecolor.generatePresetData();
                });

                $('.remove_preset').click(function () {
                    $(this).parent().parent().parent().parent().remove();
                    zo2.admin.themecolor.generatePresetData();
                });
            });
        },
        /**
         * Remove preset added in addMorePreset
         * @returns {undefined}
         */
        removePreset: function () {
            $('.remove_preset').click(function () {
                $(this).parent().parent().parent().parent().remove();
                zo2.admin.themecolor.generatePresetData();
            });
        },
        /**
         *
         * @returns {undefined}
         */
        colorPresetChange: function () {
            $('#zo2_themes_container').find('.txtColorPicker').colorpicker().on('change', function () {
                var $this = $(this);
                var $parent = $this.parent();
                var $preview = $parent.find('.color-preview');
                if ($this.val().length > 0)
                    $preview.css('background-color', $this.val());
                else
                    $preview.css('background-color', 'transparent');

                zo2.admin.themecolor.generatePresetData();
            });
        },
        /**
         *
         * @returns {undefined}
         */
        selectBackgroundImage: function () {
            jQuery('.background-select li').click(function () {
                if (jQuery(this).hasClass('selected')) {
                    jQuery(this).removeClass('selected');
                } else {
                    jQuery(".background-select li").removeClass('selected');
                    jQuery(this).addClass('selected');
                }
                zo2.admin.themecolor.generatePresetData();
            });
        },
        /**
         *
         * @returns {undefined}
         */
        selectLayoutType: function () {
            jQuery('.layout_style_choose').click(function () {
                jQuery('.layout_style_choose').removeClass('btn-success');
                jQuery(this).addClass('btn-success');
                if (jQuery(this).hasClass('boxed')) {
                    jQuery('input[name="zo2_boxed_style"]').val('1');
                    jQuery('.zo2_background_and_pattern').fadeIn(500);
                } else {
                    jQuery('input[name="zo2_boxed_style"]').val('0');
                    jQuery('.zo2_background_and_pattern').fadeOut(500);
                }
                zo2.admin.themecolor.generatePresetData();
            });

            jQuery('#zo2_background_image').change(function () {
                zo2.admin.themecolor.generatePresetData();
            });
        }
    };
    /**
     * Init plugin
     * Put all of your init code into _init
     */
    $(document).ready(function () {
        zo2.admin.themecolor._init();
    });
})(window, zo2, zo2.jQuery);