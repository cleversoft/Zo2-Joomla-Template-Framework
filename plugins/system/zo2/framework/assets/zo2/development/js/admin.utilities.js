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
 * @param {type} w Window pointer
 * @param {type} z Zo2 pointer
 * @param {type} $ jQuery pointer
 * @returns {undefined}
 */
(function (w, z, $) {
    
    /**
     * Ultilities class
     */
    var _utilities = {
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
            /*============For joomla 2.5==============*/
            // Turn radios into btn-group
            this.logoImage();
            this.radioButton();
            this.tabs();
        },
        /**
         * Logo image event listener
         * @todo Remove this code
         * @returns {undefined}
         */
        logoImage: function() {
            $('.logo-type-switcher').on('click', 'button', function () {
                var $this = $(this);
                var $container = $('.'+$this.closest('.field-logo-container').attr('data-name')+'_setting');
                var $buttons = $this.closest('.logo-type-switcher').find('button');
                $buttons.removeClass('active btn-success');
                $this.addClass('active btn-success');

                if ($this.hasClass('logo-type-none')) {
                    $container.find('.logo-image').removeClass('show').fadeOut(300);
                    $container.find('.logo-text').removeClass('show').fadeOut(300);
                }
                else if ($this.hasClass('logo-type-image')) {
                    $container.find('.logo-image').removeClass('show').fadeIn(300);
                    $container.find('.logo-text').removeClass('show').fadeOut(300);
                }
                else if ($this.hasClass('logo-type-text')) {
                    $container.find('.logo-image').removeClass('show').fadeOut(300);
                    $container.find('.logo-text').removeClass('show').fadeIn(300);
                }
                return false;
            });

            $('.field-logo-container').on('click', '.btn-remove-preview', function () {
                var $this = $(this);
                var $container = $this.closest('.field-logo-container');
                var $preview = $container.find('.logo-preview');
                var $input = $container.find('.logoInput');

                $preview.empty();
                return false;
            });
        },
        /**
         * Radio button
         * @returns {undefined}
         */
        _radioButton: function() {
            jQuery('.btn-group label').on("click", function () {
                var label = jQuery(this);
                var input = label.prev();
                label.closest('.btn-group').find('label').removeClass('btn-success').removeClass('btn-danger').removeClass('btn-primary').removeClass('active');
                if (input.val() == '') {
                    label.addClass('active btn-primary');
                } else if (input.val() == 0) {
                    label.addClass('active btn-danger');
                } else {
                    label.addClass('active btn-success');
                }
                jQuery(this).parent().find('input').removeAttr("checked");
                input.attr("checked",true);
            });
        },
        /**
         * Grouping radio buttons
         * @returns {undefined}
         */
        radioButton: function() {
            /*============For joomla 2.5==============*/
            // Turn radios into btn-group
            z.admin.utilities._radioButton();

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
        },
        /**
         * Zo2 tab managerment
         * @todo Remove this
         * @returns {undefined}
         */
        tabs: function() {
            // cause joomla does not have bootstrap tabs :|
            $('.zo2-tabs').on('click', 'li a', function () {
                var $this = $(this);
                var $tabs = $this.closest('.zo2-tabs');
                var $actives = $tabs.find('.active');
                $actives.removeClass('active');
                $actives.each(function () {
                    var $activeTab = $('#' + $(this).attr('data-toggle'));
                    $activeTab.removeClass('active');
                });
                $this.addClass('active');
                $('#' + $this.attr('data-toggle')).addClass('active');
            });
        }
    };
    
    /**
     * Append  to Zo2 admin
     */
    z.admin.utilities = _utilities;
    
    /**
     * Init plugin
     * Put all of your init code into _init
     */
    $(w.document).ready(function () {
        z.admin.utilities._init();
    });

})(window, zo2, zo2.jQuery);