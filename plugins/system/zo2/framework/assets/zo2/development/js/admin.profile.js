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
 * @param {object} w Windows pointer
 * @param {object} z Zo2 pointer
 * @param {object} $ jQuery pointer
 * @returns {undefined}
 */
(function (w, z, $) {

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
        /**
         * Trigger modal save as
         * @returns {undefined}
         */
        modalSaveAs: function () {
            z.ajax.request({
                url: z._settings.url,
                data: {
                    zo2_task: 'admin.modalCreateProfile'
                }
            }).done(function(){
                $('#prependedInput').keypress(function(e){
                    if(!((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >=97 && e.keyCode <= 122))){
                         return false;
                    }
                });
            });
        },
        /**
         * Save profile as
         * @returns {undefined}
         */
        saveAs: function () {
            w.Joomla.submitbutton('style.apply');
        },
        /**
         * Trigger modal rename
         * @returns {undefined}
         */
        modalRename: function () {
            z.ajax.request({
                url: z._settings.url,
                data: {
                    zo2_task: 'admin.modalRenameProfile'
                }
            }).done(function(){
                $('#zo2-new-profile').keypress(function(e){
                    if(!((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >=97 && e.keyCode <= 122))){
                         return false;
                    }
                });
            });
        },
        /**
         * Rename a profile
         * @returns {undefined}
         */
        rename: function () {
            z.ajax.request({
                url: z._settings.url,
                data: {
                    zo2_task: 'admin.renameProfile',
                    newProfile: $(this._elements.newProfile).val(),
                    profile: $(this._elements.profileData).data('zo2-profile')
                }
            });
        },
        /**
         * Delete a profile
         * @returns {undefined}
         */
        delete: function () {
            z.ajax.request({
                url: z._settings.url,
                data: {
                    zo2_task: 'admin.deleteProfile',                    
                    profile: $(this._elements.profileData).data('zo2-profile')
                }
            });
        },
        /**
         * Load profile
         * @param {string} profileName
         * @returns {undefined}
         */
        load: function (profileName) {
            z.ajax.request({
                url: z._settings.url,
                data: {
                    zo2_task: 'admin.render',
                    profile: profileName
                }
            });
        }
    };

    /**
     * Append to zo2.admin
     */
    z.admin.profile = _profile;

    /**
     * Init plugin
     * Put all of your init code into _init
     */
    $(w.document).ready(function () {
        z.admin.profile._init();
    });

})(window, zo2, zo2.jQuery);