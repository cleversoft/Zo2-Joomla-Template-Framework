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
    zo2.admin.layoutbuilder = {
        /**
         * Element variables
         */
        _elements: {
            container: "#droppable-container > .zo2-container",
            sortableRow: ".sortable-row"
        },
        /**
         * Init function
         * @returns {undefined}
         */
        _init: function () {
            jQuery(this._elements.container).sortable({
                items: '>.sortable-row',
                handle: '>.row-control>.row-control-container>.row-control-buttons>.row-control-icon.dragger',
                containment: 'parent',
                tolerance: 'pointer',
                forcePlaceholderSize: true,
                axis: 'y'
            });

            jQuery(this._elements.sortableRow).sortable({
                items: '>.row-control>.col-container>.sortable-col',
                connectWith: '>.sortable-row',
                handle: '>.col-wrap>.col-control-buttons>.col-control-icon.dragger',
                containment: 'parent',
                tolerance: "pointer",
                helper: 'clone',
                axis: 'x'
            });
        }
    };
    /**
     * Init plugin
     * Put all of your init code into _init
     */
    $(document).ready(function () {
        zo2.admin.layoutbuilder._init();
    });
})(window, zo2, zo2.jQuery);