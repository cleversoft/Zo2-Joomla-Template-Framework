/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */

var Zo2Social = window.Zo2Social || {};

!function ($) {

    $.extend(Zo2Social, {

        toggleButtons: function () {

            $('.social-onoff > label').click(function () {
                var $this = $(this);
                var $parent = $this.parent();
                var $input = $parent.find('input[type=radio]');
                if ($parent.hasClass('toggle-off')) {
                    $parent.find('.off').removeClass('active btn-danger');
                    $parent.find('.on').addClass('active btn-success');
                    $input.prop('value', 1);
                    $parent.removeClass('toggle-off');
                } else {
                    $parent.find('.off').addClass('active btn-danger');
                    $parent.find('.on').removeClass('active btn-success');
                    $input.prop('value', 0);
                    $parent.addClass('toggle-off');
                }
            });

        },

        updateIndex: function (e, ui) {
            $('td.index', ui.item.parent()).each(function (i) {
                $(this).html(i + 1);
            })
        },

        saveConfig: function (e, ui) {

            var $items = [];
            $(ui.item.parent().children()).each(function (e) {
                var $item = Zo2Social.getRow(this);
                $items.push($item);
            });
            var $json = Zo2Social.encodeJSON($items);
            if ($json) {
                $('#jform_params_social_order').val($json);
            }

            return true;
        },

        getRow: function (e) {

            var $item = {};
            // columns
            var $columns = $(e).children();
            $item.name = $($columns[0]).attr('name');
            $item.index = parseInt($($columns[1]).text());
            $item.website = $($columns[2]).find('a').text();
            $item.link = $($columns[2]).find('a').attr('href');
            $item.enable = parseInt($($columns[3]).find('input[type=radio]').val());
            $item.button_design = $($columns[4]).find('select[name=' + $item.name + '_button_design]').val();

            return $item;
        },

        encodeJSON: function ($items) {

            if (JSON && JSON.stringify) {
                $items = JSON.stringify($items);
                return $items;
            } else {
                return $items;
            }

        },

        decodeJSON: function ($json) {
            return  $.parseJSON($json);
        },

        onSubmit: function () {

            var form = document.adminForm;
            if (!form) {
                return false;
            }
            form.onsubmit = function (e) {

                var $items = [];
                $('#social_options > tbody > tr').each(function (e) {
                    var $item = Zo2Social.getRow(this);
                    $items.push($item);
                });

                var $json = Zo2Social.encodeJSON($items);
                if ($json) {
                    $('#jform_params_social_order').val($json);
                }
                return false;
            };

        },
        loadFields: function () {
            $('#jform_params_normal_position').closest('.control-group').hide();
            $('#jform_params_floating_position').closest('.control-group').hide();
            $('#jform_params_box_top').closest('.control-group').hide();
            $('#jform_params_box_left').closest('.control-group').hide();
            $('#jform_params_box_right').closest('.control-group').hide();
            $('#jform_params_box_style').closest('.control-group').hide();
            var $type = $('#jform_params_display_type').val();
            Zo2Social.toggleType($type);
        },
        init: function () {

            $('#jform_params_display_type').on('change', function () {
                var $type = $(this).val();
                Zo2Social.toggleType($type)
            });

            $('#checkAll').click(function() {
                $('.treeCategories input').attr('checked', 'checked');
            });

            $('#uncheckAll').click(function() {
                $('.treeCategories input').attr('checked', false);
            });

        },
        toggleType: function (value) {

            if (value == 'normal') {
                $('#jform_params_normal_position').closest('.control-group').show();
                $('#jform_params_floating_position').closest('.control-group').hide();
                $('#jform_params_box_top').closest('.control-group').hide();
                $('#jform_params_box_left').closest('.control-group').hide();
                $('#jform_params_box_right').closest('.control-group').hide();
                $('#jform_params_box_style').closest('.control-group').hide();
            } else if (value == 'floating') {
                $('#jform_params_normal_position').closest('.control-group').hide();
                $('#jform_params_floating_position').closest('.control-group').show();
                $('#jform_params_box_top').closest('.control-group').show();
                $('#jform_params_box_left').closest('.control-group').show();
                $('#jform_params_box_right').closest('.control-group').show();
                $('#jform_params_box_style').closest('.control-group').show();
            }
        }
    });

    $(document).ready(function () {
        Zo2Social.loadFields();
        Zo2Social.init();
        Zo2Social.onSubmit();
        Zo2Social.toggleButtons();
    });

}(jQuery)
