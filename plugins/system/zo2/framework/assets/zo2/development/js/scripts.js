/**
 * Zo2 JS framework define
 * @version <?php //echo CREX_VERSION; ?>
 * @param {object} w Window pointer
 * @param {object} $ jQuery pointer
 * @returns {undefined}
 */
(function (w, $) {
    if (typeof w.zo2 === 'undefined') {
        /* Local zo2 definition */
        var _zo2 = {
            /* Common settings */
            settings: {
            },
            /* Internal jQuery */
            jQuery: $

        };

        /* Provide global zo2 object */
        w.zo2 = _zo2;

    }

})(window, jQuery);


/**
 * Main script file
 * @param {object} window
 * @param {object} zo2
 * @param {object} $
 * @returns {undefined}
 */
(function (window, zo2, $) {

    /**
     * Animation class
     */
    zo2.animate = {
        /**
         * Scroll from el to toEl
         * @param {type} el
         * @param {type} toEl
         * @returns {undefined}
         */
        scrollTop: function (el, toEl) {
            $(el).animate({
                scrollTop: jQuery(toEl).offset().top
            }, 1500);
        }
    };

    zo2.document = {
        _elements: {
            message: '#zo2-messages',
            overlay: '#zo2-overlay'
        },
        /**
         * Display message
         * @param {type} message
         * @returns {undefined}
         */
        message: function (message) {
            $(this._elements.message).html(message);
        },
        /**
         * Show waiting overlay
         * @returns {undefined}
         */
        showOverlay: function () {
            $(this._elements.overlay).show();
        },
        /**
         * Hide waiting overlayt
         * @returns {undefined}
         */
        hideOverlay: function () {
            $(this._elements.overlay).hide();
        }
    };

    zo2.ajax = {
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
                },
                /**
                 * Display waiting overlay
                 * @returns {undefined}
                 */
                beforeSend: function () {
                    zo2.document.showOverlay();
                }
            }
        },
        /**
         * Execute ajax
         * @param {type} settings
         * @returns {jqXHR|$jqXHR}
         */
        execute: function (settings) {
            $mergedSettings = $.extend(true, this._settings.ajax, settings);
            $jqXHR = $.ajax($mergedSettings);
            $jqXHR.done(function (respond) {
                $.each(respond, function (key, value) {
                    switch (key) {
                        /**
                         * Display notice message
                         */
                        case 'message':
                            $.each(respond[key], function (childKey, childValue) {
                                zo2.document.message(childValue.html);
                            });
                            break;

                    }
                });
            });
            $jqXHR.always(function () {
                zo2.document.hideOverlay();
            });
            return $jqXHR;
        }
    };
})(window, zo2, zo2.jQuery);