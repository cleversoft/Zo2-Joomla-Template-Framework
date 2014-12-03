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
 * Profile management
 * @param {type} window
 * @param {type} zo2
 * @param {type} $
 * @returns {undefined}
 */
(function (window, zo2, $) {

    /**
     * Admin profile
     * @todo Move to zo2.ajax
     */
    var _profile = {
        /**
         * Element variables
         */
        _elements: {
            /* Profile name selector */
            addNewProfileInput: '#zo2-profile-name',
            /* New profile selector */
            renameProfileInput: '#zo2-new-profile-name'
        },
        /**
         * Init function
         * @returns {undefined}
         */
        _init: function () {

        },
        modalCreateProfile: function () {
            settings = {
                url: zo2._settings.url,
                data: {
                    zo2_task: 'admin.modalCreateProfile'
                }
            };
            zo2.ajax.request(settings);
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
         * @param {string} currentProfile
         * @returns {undefined}
         */
        rename: function (currentProfile) {

        },
        /**
         * Delete current profile
         * @param {string} profile
         * @param {int} templateId
         * @returns {undefined}
         */
        remove: function (profile, templateId) {

        },
        /**
         * Load profile
         * @param {string} profileName
         * @returns {undefined}
         */
        load: function (profileName) {
            settings = {
                url: zo2._settings.url,
                data: {
                    zo2_task: 'admin.modalCreateProfile',
                }
            };
            zo2.ajax.request(settings);
        }
    };

    /**
     * Append to zo2.admin
     */
    zo2.admin.profile = _profile;

    /**
     * Init plugin
     * Put all of your init code into _init
     */
    $(document).ready(function () {
        zo2.admin.profile._init();
    });

})(window, zo2, zo2.jQuery);