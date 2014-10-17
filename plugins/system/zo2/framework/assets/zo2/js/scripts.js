/**
 * Main script file
 * @param {object} window
 * @param {object} zo2
 * @param {object} $
 * @returns {undefined}
 */
(function (window, zo2, $) {

    /**
     * Ajax class
     */
    zo2.ajax = {
        /* Default settings */
        _settings: {
        }
    };

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
})(window, zo2, zo2.jQuery);