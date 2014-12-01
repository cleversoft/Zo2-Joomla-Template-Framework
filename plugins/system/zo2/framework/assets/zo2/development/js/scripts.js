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
        _elements: {
            message: '#zo2-messages',
            overlay: '#zo2-overlay'
        },
        message: function(message) {
            $(this._elements.message).html(message);
        },
        showOverlay: function() {
            $(this._elements.overlay).show();
        },
        hideOverlay: function() {
            $(this._elements.overlay).hide();
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
        _selectors: {
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
            w.onbeforeunload = function() {};
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