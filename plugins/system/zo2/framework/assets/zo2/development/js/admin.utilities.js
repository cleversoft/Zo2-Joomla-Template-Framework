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
    zo2.admin.utilities = {

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

        },

        radioButton: function() {
            /*============For joomla 2.5==============*/
            function radio_button() {
                jQuery('.btn-group label:not(.active)').on("click", function () {
                    var label = jQuery(this);
                    var input = label.prev();

                    if (!input.prop('checked')) {
                        label.closest('.btn-group').find('label').removeClass('btn-success').removeClass('btn-danger').removeClass('btn-primary');
                        if (input.val() == '') {
                            label.addClass('active btn-primary');
                        } else if (input.val() == 0) {
                            label.addClass('active btn-danger');
                        } else {
                            label.addClass('active btn-success');
                        }
                        input.prop('checked', true);
                    }
                });
            }
            // Turn radios into btn-group

            radio_button();

            $('.btn-group label').on("click", function () {
                radio_button();
            });

            $('.btn-group input[checked=checked]').each(function () {
                var label = $(this).next();
                if ($(this).val() == '') {
                    label.addClass('active btn-primary');
                } else if ($(this).val() == 0) {
                    label.addClass('active btn-danger');
                } else {
                    label.addClass('active btn-success');
                }
            });


            $('.btn-group-onoff > button').on('click', function (e) {
                var $this = $(this);
                var $container = $this.closest('.btn-group-onoff');

                $container.find('button').removeClass('active btn-success btn-danger');
                if ($this.hasClass('btn-on'))
                    $this.addClass('active btn-success');
                else
                    $this.addClass('active btn-danger');

                return false;
            });
        }

    }
    /**
     * Init plugin
     * Put all of your init code into _init
     */
    $(document).ready(function () {
        zo2.admin.themecolor._init();
    });
})(window, zo2, zo2.jQuery);