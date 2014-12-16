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
 * Zo2 animate addon
 * @param {object} w Window pointer
 * @param {object} z Zo2 pointer
 * @param {object} $ jQuery pointer
 * @returns {undefined}
 */
(function (w, z, $) {

    /**
     * Animate class
     */
    var _animate = {
        /**
         * Scroll from el to toEl
         * @param {type} el
         * @param {type} toEl
         * @returns {undefined}
         */
        scrollTop: function (el, toEl) {
            $(el).animate({
                scrollTop: $(toEl).offset().top
            }, 1500);
        },
        /**
         * Show target
         * @param {type} target
         * @param {mixed} duration
         * @returns {undefined}
         */
        show: function (target, duration) {
            duration = (typeof duration === 'undefined') ? null : duration;
            if (duration === null) {
                $(target).show();
            } else {
                $(target).show(duration);
            }
        },
        /**
         * Hide target
         * @param {string} target
         * @param {mixed} duration
         * @returns {undefined}
         */
        hide: function (target, duration) {
            duration = (typeof duration === 'undefined') ? null : duration;
            if (duration === null) {
                $(target).hide();
            } else {
                $(target).hide(duration);
            }
        }
    };

    /**
     * Append to global Zo2
     */
    z.animate = _animate;

})(window, zo2, zo2.jQuery);

/**
 * Zo2 document addon
 * @param {object} w Window pointer
 * @param {object} z Zo2 pointer
 * @param {object} $ jQuery pointer
 * @returns {undefined}
 */
(function (w, z, $) {

    /**
     * Document class
     */
    var _document = {
        /* Default empty message */
        _settings: {
            /* HTML source */
            html: '',
            /* Options */
            options: {
                /* Append or create new */

                append: true,
                /* Delay after close */

                delayClose: 10000,
                /* Child message ID */
                childID: ''
            }
        },
        /* jQuery element selector */
        _elements: {
            messages: '#zo2-messages',
            overlay: '#zo2-overlay'
        },
        /**
         * Show overlay
         * @returns {undefined}
         */
        showOverlay: function () {
            z.animate.show(this._elements.overlay);
        },
        /**
         * Hide overlay
         * @returns {undefined}
         */
        hideOverlay: function () {
            z.animate.hide(this._elements.overlay);
        },
        /**
         * Append HTML to target
         * @param {string} target
         * @param {string} html
         * @returns {undefined}
         */
        append: function (target, html) {
            $(target).append(html);
        },
        /**
         * Replace HTML on target
         * @param {type} target
         * @param {type} html
         * @returns {undefined}
         */
        replace: function (target, html) {
            $(target).html(html);
        },
        /**
         * 
         * @param {string} target
         * @param {boolean} animation
         * @returns {undefined}
         */
        remove: function (target, animation) {
            animation = (typeof animation === 'undefined') ? false : animation;
            /* Is animation present ? */
            if (animation) {
                $(target).hide('slow', function () {
                    $(this).remove();
                });
            } else {
                $(target).remove();
            }
        },
        /**
         * Raise message
         * @param {object} data
         */
        raiseMessage: function (message) {
            this.append($(this._elements.messages), message);
        },
        /**
         * Raise text
         * @param {string} text Text content
         * @param {string} type type type
         */
        raiseText: function (text, type) {
            /* Fix default settings is override */
            var settings = $.extend(true, {}, this._settings);
            settings.options.childID = 'zo2-ajax-message-rand' + Math.round(Math.random() * 100000);
            /* Render message */
            settings.html += '<div class="zo2-message" id="' + settings.options.childID + '">';
            settings.html += '<div class="alert alert-' + type + '">';
            settings.html += '<a href="#" class="close" data-dismiss="alert">&times;</a>';
            settings.html += '<h4>' + type.substr(0, 1).toUpperCase() + type.substr(1) + '</h4>';
            settings.html += text;
            settings.html += '</div></div>';
            /* Append or override */
            if (settings.options.append) {
                z.document.append(this._elements.messages, settings.html);
            } else {
                z.document.append.replace(this._elements.messages, settings.html);
            }
            /* Hide message after a moment */
            if (settings.options.delayClose >= 0 && settings.options.childID !== '') {
                w.setTimeout(function () {
                    z.document.remove('#' + settings.options.childID, true);
                }, settings.options.delayClose);
            }
        }
    };

    /**
     * Append to global Zo2
     */
    z.document = _document;

})(window, zo2, zo2.jQuery);

/**
 * Zo2 Ajax addon
 * @param {object} w Window pointer
 * @param {object} z Zo2 pointer
 * @param {object} $ jQuery pointer
 * @returns {undefined}
 */
(function (w, z, $) {

    /**
     * Ajax addon
     * @type {object}
     */
    var _ajax = {
        /* List of selectors */
        _elements: {
        },
        /* Clear text data */
        _text: {
            ZO2_AJAX_ERROR: 'Ajax error occurred',
            ZO2_AJAX_IN_PROCESS: 'Ajax in process, do not try to reload this page'
        },
        /* Default ajax setting */
        _settings: {
            /* Default URL */
            url: 'index.php',
            /* Default method */
            type: 'POST',
            /* Default data type */
            dataType: 'json',
            /* Data format */
            data: {
                /* Force using raw */
                format: 'raw',
                zo2_ajax: 1
            },
            /**
             * Before send ajax request
             * @returns {undefined}
             */
            beforeSend: function () {
                z.ajax.showOverlay();
            },
            /**
             * After ajax request done
             * @param {object} data
             * @returns {undefined}
             */
            success: function (data) {
                $.each(data, function (key, value) {
                    switch (key) {

                        case 'html':
                            $.each(data[key], function (childKey, childValue) {
                                z.document.replace(childValue.target, childValue.html);
                            });
                            break;

                        case 'appendHtml':
                            $.each(data[key], function (childKey, childValue) {
                                z.document.append(childValue.target, childValue.html);
                            });
                            break;

                        case 'message':
                            $.each(data[key], function (childKey, childValue) {
                                if (typeof childValue === 'object') {
                                    if (childValue.hasOwnProperty("message")) {
                                        z.document.raiseMessage(childValue.message);
                                    }
                                }
                            });
                            break;

                    }
                });
                $.each(data, function (key, value) {
                    switch (key) {
                        case 'exec':
                        case 'execute':
                            $.each(data[key], function (childKey, childValue) {
                                eval(childValue);
                            });
                            break;
                    }
                });
            },
            /**
             * After ajax complete error/success
             * @returns {undefined}
             */
            complete: function () {
                z.ajax.hideOverlay();
            },
            /* Ajax overlay */
            ajaxOverlay: false,
            /* jQuery ajax auto sync */
            async: true
        },
        /**
         * Lock page reload
         * @returns {undefined}
         */
        ajaxLock: function () {
            w.onbeforeunload = function () {
                return z.ajax._text.ZO2_AJAX_IN_PROCESS;
            };
        },
        /**
         * Unlock page reload
         * @returns {undefined}
         */
        ajaxUnLock: function () {
            w.onbeforeunload = function () {
            };
        },
        /**
         * Turn on overlay
         * @returns {undefined}
         */
        turnOnOverlay: function () {
            this._settings.ajaxOverlay = true;
        },
        /**
         * Show overlay
         * @returns {undefined}
         */
        showOverlay: function () {
            if (this._settings.ajaxOverlay === true) {
                z.document.showOverlay();
            }
        },
        /**
         * Hide overlay
         * @returns {undefined}
         */
        hideOverlay: function () {
            if (this._settings.ajaxOverlay === true) {
                z.document.hideOverlay();
            }
            /* Change back overlay */
            this._settings.ajaxOverlay = false;
        },
        /**
         * Collect available data
         * @returns {undefined}
         */
        collectleData: function () {
            var data = {};
            $('input').each(function () {
                $.extend(true, data, $(this).data());
            });
            return data;
        },
        /**
         * Send ajax request
         * @param {object} settings external settings
         * @param {boolean} showOverlay
         * @returns {jqXHR}
         */
        request: function (settings, showOverlay) {
            /* A we show the overlay ? */
            showOverlay = (typeof showOverlay === 'undefined') ? true : showOverlay;
            if (showOverlay === true) {
                this.turnOnOverlay();
            }
            /* Fix default settings is override */
            /**
             * @todo provide data collector automatically
             * data: this.collectleData()
             * @type @exp;$@call;extend
             */
            var tempSettings = $.extend(true, {}, this._settings);
            /* Include Joomla! token */
            settings.data[z._settings.token] = 1;
            /* Merge setting with default setting */
            settings = $.extend(true, tempSettings, settings);
            /* Send ajax request */
            var response = $.ajax(settings);
            /**
             * Ajax failed
             * @param {object} data
             */
            response.fail(function (data) {
                z.document.raiseText(z.ajax._text.ZO2_AJAX_ERROR, 'error');
            });
            return response;
        }

    };

    /**
     * Append to global Zo2
     */
    z.ajax = _ajax;

})(window, zo2, zo2.jQuery);