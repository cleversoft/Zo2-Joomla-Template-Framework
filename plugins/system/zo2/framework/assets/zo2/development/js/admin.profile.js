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
            profileData: '#zo2-profile',
            newProfile: '#zo2-new-profile'
        },
        /**
         * Init function
         * @returns {undefined}
         */
        _init: function () {

        },
        modalSaveAs: function () {
            settings = {
                url: zo2._settings.url,
                data: {
                    zo2_task: 'admin.modalCreateProfile'
                }
            };
            zo2.ajax.request(settings);
        },
        saveAs: function () {
            Joomla.submitbutton('style.apply');
        },
        modalRename: function () {
            settings = {
                url: zo2._settings.url,
                data: {
                    zo2_task: 'admin.modalRenameProfile'
                }
            };
            zo2.ajax.request(settings);
        },
        /**
         * Rename current profile
         * @param {string} currentProfile
         * @returns {undefined}
         */
        rename: function () {
            settings = {
                url: zo2._settings.url,
                data: {
                    zo2_task: 'admin.renameProfile',
                    newProfile: $(this._elements.newProfile).val(),
                    profile: $(this._elements.profileData).data('zo2-profile')
                }
            };
            zo2.ajax.request(settings);
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
                    zo2_task: 'admin.render',
                    profile: profileName
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