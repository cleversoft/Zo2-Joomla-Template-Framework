(function (window, zo2, $) {
    zo2.ajax = {
    };

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
            }, 1500)
        }
    }
})(window, zo2, zo2.jQuery);