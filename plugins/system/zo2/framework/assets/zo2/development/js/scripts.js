/**
 * Zo2 JS framework define
 * @version <?php //echo CREX_VERSION; ?>
 * @param {object} w Window pointer
 * @param {object} $ jQuery pointer
 * @returns {undefined}
 */
(function(w, $) {

    if (typeof w.zo2 === 'undefined') {

        /* Local zo2 definition */
        var _zo2 = {
            /* Common settings */
            _settings: {
            },
            /* Internal jQuery */
            jQuery: $
        };

        /* Provide global zo2 object */
        w.zo2 = _zo2;

    }

})(window, jQuery.noConflict(true));

/**
 * Zo2 animate addon
 * @param {object} w Window pointer
 * @param {object} z Zo2 pointer
 * @param {object} $ jQuery pointer
 * @returns {undefined}
 */
(function(w, z, $) {

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
        scrollTop: function(el, toEl) {
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
        show: function(target, duration) {
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
        hide: function(target, duration) {
            duration = (typeof duration === 'undefined') ? null : duration;
            if (duration === null) {
                $(target).hide();
            } else {
                $(target).hide(duration);
            }
        },
        /**
         * Trigger animation on target
         * @param {string} target
         * @param {object} animation
         * @param {mixed} duration
         * @param {string} easing
         * @param {function} complete
         * @returns {undefined}
         */
        animation: {
            /* jQuery animate wrapper */
            animate: function(target, animation, duration, easing, complete) {
                /**
                 * @note: Default value if not valid
                 * You can cast it simply
                 * crex.ui.animation.animate('div', {opacity: 0});
                 * Checkout for more information: <http://api.jquery.com/animate/>
                 */
                duration = (typeof duration === 'undefined') ? 400 : duration;
                easing = (typeof easing === 'undefined') ? 'swing' : easing;
                complete = (typeof complete === 'undefined') ? function() {
                } : complete;
                $(target).animate(animation, duration, easing, complete);
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
(function(w, z, $) {

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
            message: '#zo2-messages',
            overlay: '#zo2-overlay'
        },
        /**
         * Add message
         * @todo Replace with raiseMessage()
         * @param {string} message
         * @returns {undefined}
         */
        message: function(message) {
            $(this._elements.message).html(message);
        },
        /**
         * Show overlay
         * @returns {undefined}
         */
        showOverlay: function() {
            z.animate.show(this._elements.overlay);
        },
        /**
         * Hide overlay
         * @returns {undefined}
         */
        hideOverlay: function() {
            z.animate.hide(this._elements.overlay);
        },
        /**
         * Append HTML to target
         * @param {string} target
         * @param {string} html
         * @returns {undefined}
         */
        append: function(target, html) {
            $(target).append(html);
        },
        /**
         * Replace HTML on target
         * @param {type} target
         * @param {type} html
         * @returns {undefined}
         */
        replace: function(target, html) {
            $(target).html(html);
        },
        /**
         * 
         * @param {string} target
         * @param {boolean} animation
         * @returns {undefined}
         */
        remove: function(target, animation) {
            animation = (typeof animation === 'undefined') ? false : animation;
            /* Is animation present ? */
            if (animation) {
                $(target).hide('slow', function() {
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
        raiseMessage: function(data) {
            /* Fix default settings is override */
            var tempSettings = $.extend(true, {}, this._settings);
            /* Merge setting with default setting */
            data = $.extend(true, tempSettings, data);
            /* Append or override */
            if (data.options.append) {
                z.document.append(this._elements.message, data.html);
            } else {
                z.document.append.replace(this._elements.message, data.html);
            }
            /* Hide message after a moment */
            if (data.options.delayClose >= 0 && data.childID !== '') {
                w.setTimeout(function() {
                    z.document.remove('#' + data.options.childID, true);
                }, data.options.delayClose);
            }
        },
        /**
         * Raise text
         * @param {string} text Text content
         * @param {string} type type type
         */
        raiseText: function(text, type) {
            /* Fix default settings is override */
            var settings = $.extend(true, {}, this._settings);
            settings.options.childID = 'crex-ajax-message-rand' + Math.round(Math.random() * 100000);
            /* Render message */
            settings.html += '<div class="crex-message" id="' + settings.options.childID + '">';
            settings.html += '<div class="alert alert-' + type + '">';
            settings.html += '<a href="#" class="close" data-dismiss="alert">&times;</a>';
            settings.html += '<h4>' + type.substr(0, 1).toUpperCase() + type.substr(1) + '</h4>';
            settings.html += text;
            settings.html += '</div></div>';
            /* Append or override */
            if (settings.options.append) {
                z.document.append(this._elements.message, settings.html);
            } else {
                z.document.append.replace(this._elements.message, settings.html);
            }
            /* Hide message after a moment */
            if (settings.options.delayClose >= 0 && settings.options.childID !== '') {
                w.setTimeout(function() {
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
(function(w, z, $) {

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
            ZO2_AJAX_IN_PROCESS: 'Crex ajax in process, do not try to reload this page'
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
                format: 'raw'
            },
            /**
             * Before send ajax request
             * @returns {undefined}
             */
            beforeSend: function() {
                z.ajax.showOverlay();
            },
            /**
             * After ajax request done
             * @param {object} data
             * @returns {undefined}
             */
            success: function(data) {
                $.each(data, function(key, value) {
                    switch (key) {

                        case 'html':
                            $.each(data[key], function(childKey, childValue) {
                                z.document.replace(childValue.target, childValue.html);
                            });
                            break;

                        case 'appendHtml':
                            $.each(data[key], function(childKey, childValue) {
                                z.document.append(childValue.target, childValue.html);
                            });
                            break;

                        case 'message':
                            $.each(data[key], function(childKey, childValue) {
                                z.document.raiseMessage(childValue);
                            });
                            break;

                    }
                });
                $.each(data, function(key, value) {
                    switch (key) {
                        case 'exec':
                        case 'execute':
                            $.each(data[key], function(childKey, childValue) {
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
            complete: function() {
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
        ajaxLock: function() {
            w.onbeforeunload = function() {
                return z.ajax._text.ZO2_AJAX_IN_PROCESS;
            };
        },
        /**
         * Unlock page reload
         * @returns {undefined}
         */
        ajaxUnLock: function() {
            w.onbeforeunload = function() {
            };
        },
        /**
         * Turn on overlay
         * @returns {undefined}
         */
        turnOnOverlay: function() {
            this._settings.ajaxOverlay = true;
        },
        /**
         * Show overlay
         * @returns {undefined}
         */
        showOverlay: function() {
            if (this._settings.ajaxOverlay === true) {
                z.document.showOverlay();
            }
        },
        /**
         * Hide overlay
         * @returns {undefined}
         */
        hideOverlay: function() {
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
        collectleData: function() {
            var data = {};
            $('input').each(function() {
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
        request: function(settings, showOverlay) {
            /* A we show the overlay ? */
            showOverlay = (typeof showOverlay === 'undefined') ? false : showOverlay;
            if (showOverlay === true) {
                this.turnOnOverlay();
            }
            /* Fix default settings is override */
            var tempSettings = $.extend(true, {data: this.collectleData()}, this._settings);
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
            response.fail(function(data) {
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