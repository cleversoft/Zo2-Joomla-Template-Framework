<script>
    /**     
     * @param {object} w Window pointer
     * @param {object} $ jQuery pointer
     * @returns {undefined}
     */
    (function (w, $) {

        if (typeof w.zo2 === 'undefined') {
            /* Local zo2 definition */
            var _zo2 = {
                /* Common settings */
                settings: {
                    /* Crex current version */
                    version: "<?php echo ZO2VERSION; ?>",
                    /* Joomla! URL root */
                    frontendUrl: "<?php echo JUri::root(); ?>",
                    backendUrl: "<?php echo rtrim(JUri::root(), '/') . '/administrator'; ?>",
                    /* Joomla! security torken */
                    token: "<?php echo JSession::getFormToken(); ?>"
                },
                /* Internal jQuery */
                jQuery: $
            };
            /* Provide global zo2 object */
            w.zo2 = _zo2;
        }

    })(window, jQuery);
</script>