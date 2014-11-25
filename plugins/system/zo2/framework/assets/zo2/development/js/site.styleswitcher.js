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
     * Admin font setting
     */
    zo2.styleswitcher = {
        /**
         * Element variables
         */
        _elements: {

        },

        _init: function () {
            this.fontChange();
            this.fontSizeSlider();
            this.initFontActive();
        }
    };

    /**
     * Init plugin
     * Put all of your init code into _init
     */
    $(document).ready(function () {
        zo2.styleswitcher._init();
    });
})(window, zo2, zo2.jQuery);