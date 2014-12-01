<?php
/**
 * Init Zo2 Javascript Framework
 *
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */
header("Content-type: application/x-javascript; charset: UTF-8");
?>
/**
 * Zo2 JS framework define
 * @version <?php //echo CREX_VERSION; ?>
 * @param {object} w Window pointer
 * @param {object} $ jQuery pointer
 * @returns {undefined}
 */
(function(w, $) {
    if (typeof w.zo2 === 'undefined') {
        /* Local zo2 definition */
        var _zo2 = {

            /* Common settings */
            settings: {
            
                /* Zo2 current version */
                version: "<?php //echo CREX_VERSION; ?>",
                
                /* Joomla! URL root */
                url: "<?php //echo JURI::root(); ?>",

            },
            
            /* Internal jQuery */
            jQuery: $
            
        };

        /* Provide global zo2 object */
        w.zo2 = _zo2;
        
    }

})(window, jQuery.noConflict(true));