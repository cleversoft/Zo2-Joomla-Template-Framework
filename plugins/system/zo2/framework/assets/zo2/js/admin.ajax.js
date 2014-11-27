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
     * Admin ajax
     * @todo Move to zo2.ajax
     */
    zo2.admin.ajax = {
        _settings: {
            ajax: {
                /* Default URL */
                url: document.URL,
                /* Default method */
                type: 'POST',
                /* Default data type */
                dataType: 'json',
                /* Data format */
                data: {
                    /* Force using raw */
                    format: 'raw',
                    zo2_ajax: 1
                }
            }
        },
        /**
         * Clear Zo2 cache
         * @returns {undefined}
         * @todo Need display notice message when success or fail
         */
        clearCache: function () {
            _settings = {
                data: {
                    zo2_task: 'clearCache'
                }
            };
            settings = $.extend(this._settings, _settings);
            $.ajax(settings)
                .done(function (data) {
                    if ($.isArray(data)) {

                    } else {
                        data = $.parseJSON(data);
                    }
                    zo2.document.message(data[0].args.message);
                })
        },
        /**
         *
         * @returns {undefined}
         */
        buildAssets: function () {
            _settings = {
                data: {
                    zo2_task: 'buildAssets'
                }
            };
            settings = $.extend(this._settings, _settings);
            $.ajax(settings)
                .done(function (data) {
                    if ($.isArray(data)) {

                    } else {
                        data = $.parseJSON(data);
                    }
                    zo2.document.message(data[0].args.message);
                })
        },
        /**
         * Ajax to load selected profile
         * @param {type} value
         * @returns {undefined}
         */
        loadProfile: function (value) {
            _settings = {
                data: {
                    zo2_task: 'renderAdmin',
                    profile: value
                }
            };
            settings = $.extend(this._settings, _settings);
            $.ajax(settings)
                .done(function (data) {
                    if ($.isArray(data)) {

                    } else {
                        data = $.parseJSON(data);
                    }
                    jQuery('#zo2-framework').parent().html(data.html[0].html);
                    zo2.admin._init();
                });
        }
    };
})(window, zo2, zo2.jQuery);