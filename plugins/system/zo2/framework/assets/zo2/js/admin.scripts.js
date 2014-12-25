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
 * Zo2 Admin core
 * @param {type} w Window pointer
 * @param {type} z Zo2 pointer
 * @param {type} $ pointer
 * @returns {undefined}
 */
(function(w, z, $) {

    /**
     * Zo2 administrator object
     * Only use for backend
     */
    var _admin = {
        /**
         * Init function
         * @returns {undefined}
         */
        _init: function() {

        },
         /**
         * @todo Remove reinit
         * @returns {undefined}
         */
        reInit: function() {
            z.admin.utilities._init();
            z.admin.themecolor._init();
            z.admin.layoutbuilder._init();
            z.admin.font._init();
            ZO2AdminMegamenu.prepare();
            ZO2AdminMegamenu.initPanel();
            ZO2AdminMegamenu.initPreSubmit();
            ZO2AdminMegamenu.initRadioGroup();
            SqueezeBox.initialize({});
            SqueezeBox.assign($('a.modal').get(), {
                    parse: 'rel'
            });
        },
        /**
         * Clear Zo2 cache
         * @returns {undefined}
         * @todo Need display notice message when success or fail
         */
        clearCache: function() {
            z.ajax.request({
                url: z._settings.url,
                data: {
                    zo2_task: 'admin.clearCache'
                }
            });
        },
        /**
         * Assets builder
         * @returns {undefined}
         */
        buildAssets: function() {
            z.ajax.request({
                url: z._settings.url,

                data: {
                    zo2_task: 'admin.buildAssets'
                }
            });
        },
        /**
         * Generate JSON settings 
         * @returns {unresolved}
         */
        generateZo2SettingJson: function () {
            var $rootParent = jQuery('#droppable-container .zo2-container');
            var json = [];
            /* Loop all rows */
            $rootParent.find('>[data-zo2-type="row"]').each(function() {
                var itemJson = z.admin.generateLayoutJson(jQuery(this));
                if (itemJson != null)
                    json.push(itemJson);
            });

            return w.JSON.stringify(json);
        },
        /**
         * Generation default JSON settings
         * @todo Use HTML5 data(), do not use attr()
         * @param {type} $item
         * @returns {generateLayoutJson.result}
         */
        generateLayoutJson: function($item) {
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

                $childrenContainer.find('> [data-zo2-type]').each(function() {
                    var childItem = z.admin.generateLayoutJson(jQuery(this));
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

                $childrenContainer.find('> [data-zo2-type]').each(function() {
                    var childItem = z.admin.generateLayoutJson(jQuery(this));
                    result.children.push(childItem);
                });
            }

            return result;
        },
        /**
         * Generate logo JSON
         * @param {type} $container
         * @returns {undefined}
         */
        generateLogoJson: function($container) {
            var $input = $container.find('.logoInput');
            var $activeButton = $container.find('.logo-type-switcher').find('button.active');
            var data = {};
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
            $input.val(w.JSON.stringify(data));

        }
    };

    /**
     * Append admin to zo2
     */
    z.admin = _admin;

    /* Init Zo2.admin */
    $(w.document).ready(function() {
        z.admin._init();
    });


    $(w.document).ready(function(e) {
        /* Override default submit function */
        w.Joomla.submitform = function(task, form) {
            if (typeof (form) === 'undefined' || form === null) {
                form = w.document.adminForm;
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

            var $input = $('.hfLayoutHtml');
            $('.field-logo-container').each(function() {
                z.admin.generateLogoJson($(this));
            });
            $input.val(z.admin.generateZo2SettingJson());

            form.submit();
        };

        /**
         * @todo remove this code
         */
        $('#updater-desc a.btn-success').click(function(e) {
            e.preventDefault();
            jPrompt(jQuery(this).next().find('span').html() + '. Type "OK" to Continuous.', '', 'ZO2 Framework update confirmation box', function(confirm) {
                if (confirm.toString().toLowerCase() === "ok") {
                    w.location.href = jQuery('#updater-desc a.btn-success').attr('href');
                } else {
                    return false;
                }
            });
        });
    });

})(window, zo2, zo2.jQuery);

