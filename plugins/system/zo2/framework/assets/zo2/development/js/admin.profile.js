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
    zo2.admin.profile = {
        /**
         * Element variables
         */
        _elements: {
            addNewProfileInput: '#zo2-profile-name',
            renameProfileInput: '#zo2-new-profile-name'
        },
        /**
         * Init function
         * @returns {undefined}
         */
        _init: function () {

        },
        /**
         * Add new profile
         * @returns {undefined}
         */
        add: function () {
            Joomla.submitbutton('style.apply');
        },
        /**
         * Rename current profile
         * @param {type} currentProfile
         * @returns {undefined}
         */
        rename: function (currentProfile) {
            var newProfileName = jQuery(this._elements.renameProfileInput).val();
            $.ajax({
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
                    zo2_ajax: 1,
                    zo2_task: 'renameProfile',
                    newProfileName: newProfileName,
                    profile: currentProfile
                }

            })
                    .done(function (data) {
                        zo2.admin.ajax.loadProfile(newProfileName);
                    });
        },
        /**
         * Delete current profile
         * @returns {undefined}
         */
        remove: function () {
            zo2.document.redirect(jQuery('.form-control zo2-select-profile').data('url'));
        }
    };
    /**
     * Init plugin
     * Put all of your init code into _init
     */
    $(document).ready(function () {
        zo2.admin.profile._init();
    });
})(window, zo2, zo2.jQuery);