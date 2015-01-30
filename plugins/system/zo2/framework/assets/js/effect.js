(function (w, z, $) {
    
    /**
     * Zo2 Effect Class
     * @type object
     */
    var _effect = {
        /* Selector container */
        _elements: {
            jdocGoToTop: '#zo2-jdoc-go-to-top'
        },
        /* Init function */
        _init: function () {
            var _self = this;
            $(_self._elements.jdocGoToTop).hide();
            $(function () {
                $(w).scroll(function () {
                    if ($(this).scrollTop() > 100) {
                        $(_self._elements.jdocGoToTop).fadeIn();
                    } else {
                        $(_self._elements.jdocGoToTop).fadeOut();
                    }
                });
                $(_self._elements.jdocGoToTop).click(function () {
                    $('body,html').animate({
                        scrollTop: 0
                    }, 800);
                    return false;
                });
            });
        }
    };
    
    /* Append to Zo2 framework */
    z.effect = _effect;
    
    /* Init Zo2 effect */
    $(w.document).ready(function () {
        z.effect._init();
    });

})(window, zo2, jQuery);
