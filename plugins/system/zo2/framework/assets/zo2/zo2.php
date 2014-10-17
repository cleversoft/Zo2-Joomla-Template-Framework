<?php

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

                /* Joomla! security torken */
                token: "<?php //echo JSession::getFormToken(); ?>",
                
                /* Temporary directory */
                tmp_directory: "<?php //echo addslashes(JPATH_ROOT.'/tmp'); ?>",
                
                /* Joomla! root */
                jRoot: "<?php //echo addslashes(JPATH_ROOT); ?>"
            },
            
            /* Internal jQuery */
            jQuery: $
            
        };

        /* Provide global zo2 object */
        w.zo2 = _zo2;
        
    }

})(window, jQuery.noConflict(true));