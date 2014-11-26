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
     * Zo2 administrator object
     * Only use for backend
     */
    zo2.admin = {
        /**
         * Init function
         * @returns {undefined}
         */
        _init: function () {
            this.themecolor._init();
            this.font._init();
            this.layoutbuilder._init();
        },

        generateZo2SettingJson: function () {
            var $rootParent = jQuery('#droppable-container .zo2-container');
            var json = [];
            /* Loop all rows */
            $rootParent.find('>[data-zo2-type="row"]').each(function () {
                var itemJson = zo2.admin.generateLayoutJson(jQuery(this));
                if (itemJson != null)
                    json.push(itemJson);
            });

            return JSON.stringify(json);
        },
        
        /**
         *
         * @param {type} $item
         * @returns {generateLayoutJson.result}
         */
        generateLayoutJson: function ($item) {
            var result = null;
            var $childrenContainer = null;
            /* Row */
            if ($item.attr('data-zo2-type') == 'row') {
                result = {
                    type: "row",
                    name: $item.find('> .row-control > .row-control-container > .row-name').text(),
                    customClass: $item.attr('data-zo2-customClass'),
                    id: $item.attr('data-zo2-id') ? $item.attr('data-zo2-id') : '',
                    fullwidth: $item.attr('data-zo2-fullwidth') == '1',
                    visibility: {
                        xs: $item.attr('data-zo2-visibility-xs') == '1',
                        sm: $item.attr('data-zo2-visibility-sm') == '1',
                        md: $item.attr('data-zo2-visibility-md') == '1',
                        lg: $item.attr('data-zo2-visibility-lg') == '1'
                    },
                    children: []
                };

                $childrenContainer = $item.find('> .row-control > .col-container');

                $childrenContainer.find('> [data-zo2-type]').each(function () {
                    var childItem = zo2.admin.generateLayoutJson(jQuery(this));
                    result.children.push(childItem);
                });
            }
            /* Column */
            else if ($item.attr('data-zo2-type') == 'span') {
                result = {
                    jdoc: $item.attr('data-zo2-jdoc'),
                    type: "col",
                    name: $item.find('> .col-wrap > .col-name').text(),
                    position: $item.attr('data-zo2-position'),
                    span: parseInt($item.attr('data-zo2-span')),
                    offset: parseInt($item.attr('data-zo2-offset')),
                    customClass: $item.attr('data-zo2-customClass') ? $item.attr('data-zo2-customClass') : '',
                    style: $item.attr('data-zo2-style'),
                    id: $item.attr('data-zo2-id') ? $item.attr('data-zo2-id') : '',
                    visibility: {
                        xs: $item.attr('data-zo2-visibility-xs') == '1',
                        sm: $item.attr('data-zo2-visibility-sm') == '1',
                        md: $item.attr('data-zo2-visibility-md') == '1',
                        lg: $item.attr('data-zo2-visibility-lg') == '1'
                    },
                    children: []
                };

                $childrenContainer = $item.find('> .col-wrap > .row-container');

                $childrenContainer.find('> [data-zo2-type]').each(function () {
                    var childItem = zo2.admin.generateLayoutJson(jQuery(this));
                    result.children.push(childItem);
                });
            }

            return result;
        },
        generateLogoJson: function ($container) {
            var $buttons = $container.find('.logo-type-switcher').find('button');
            var $input = $container.find('.logoInput');
            var $activeButton = $container.find('.logo-type-switcher').find('button.active');

            var data = {type: "none"};

            if ($activeButton.hasClass('logo-type-none')) {
                data = {type: "none"};
            }
            else if ($activeButton.hasClass('logo-type-image')) {
                var logoPath = $container.find('.logo-path').val();
                var width = parseInt($container.find('.logo-width').val());
                var height = parseInt($container.find('.logo-height').val());
                if (isNaN(width))
                    width = 0;
                if (isNaN(height))
                    height = 0;

                data = {
                    type: "image",
                    path: logoPath,
                    width: width,
                    height: height
                };
            }
            else if ($activeButton.hasClass('logo-type-text')) {
                data = {
                    type: "text",
                    text: $container.find('.logo-text-input').val()
                };
            }
            $input.val(JSON.stringify(data));
        }
    };
    /* Init Zo2.admin */
    $(document).ready(function () {
        zo2.admin._init();
    });

})(window, zo2, zo2.jQuery);

zo2.jQuery(document).ready(function ($) {



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


    $('.field-logo-container').on('click', '.btn-remove-preview', function () {
        var $this = $(this);
        var $container = $this.closest('.field-logo-container');
        var $preview = $container.find('.logo-preview');
        var $input = $container.find('.logoInput');

        $preview.empty();
        return false;
    });

    $('.logo-type-switcher').on('click', 'button', function () {
        var $this = $(this);
        var $container = $this.closest('.field-logo-container');
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



    var refreshLogoPreview = function (ele) {
        var $ = jQuery;
        var $this = $(ele);
        var $container = $this.closest('.field-logo-container');
        var $preview = $container.find('.logo-preview');
        var baseUri = $container.find('.basePath').val();
        var $input = $container.find('.logoInput');
        var $logoWidth = $container.find('.logo-width');
        var $logoHeight = $container.find('.logo-height');

        $preview.empty();
        var $previewImg = $('<img />').appendTo($preview);
        $logoWidth.val('0');
        $logoHeight.val('0');
        $previewImg.on('load', function () {
            $logoWidth.val(this.naturalWidth);
            $logoHeight.val(this.naturalHeight);
        });
        $previewImg.attr('src', baseUri + '/' + $this.val());
    };


    /* Override default submit function */
    Joomla.submitform = function (task, form) {
        if (typeof (form) === 'undefined' || form === null) {
            form = document.adminForm;
        }
        jQuery('.toolbox-saveConfig').trigger('click'); // dirty hack for megamenu save

        if (typeof (task) !== 'undefined') {
            form.task.value = task;
        }

        // Submit the form.
        if (typeof form.onsubmit == 'function') {
            form.onsubmit();
        }
        if (typeof form.fireEvent == "function") {
            form.fireEvent('submit');
        }

        var $ = jQuery;
        var $input = $('.hfLayoutHtml');
        $('.field-logo-container').each(function () {
            zo2.admin.generateLogoJson($(this));
        });
        $input.val(zo2.admin.generateZo2SettingJson());

        form.submit();
    };



    jQuery('#updater-desc a.btn-success').click(function (e) {
        e.preventDefault();
        jPrompt(jQuery(this).next().find('span').html() + '. Type "OK" to Continuous.', '', 'ZO2 Framework update confirmation box', function (confirm) {
            if (confirm == "OK" || confirm == "ok" || confirm == "oK" || confirm == "Ok") {
                location.href = jQuery('#updater-desc a.btn-success').attr('href');
            } else {
                return false;
            }
        });
    });
});
