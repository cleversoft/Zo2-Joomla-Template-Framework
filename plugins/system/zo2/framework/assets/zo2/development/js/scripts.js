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
})(window, zo2, zo2.jQuery);