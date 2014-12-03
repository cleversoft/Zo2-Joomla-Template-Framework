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
           
        },
        /**
         * Delete current profile
         * @returns {undefined}
         */
        remove: function (profile, templateId) {
          
        },
        /**
         * 
         * @param {type} profileName
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
     * Init plugin
     * Put all of your init code into _init
     */
    $(document).ready(function () {
        zo2.admin.profile._init();
    });
})(window, zo2, zo2.jQuery);