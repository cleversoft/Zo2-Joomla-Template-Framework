/**
 * Zo2 Layout builder
 * @param {type} w
 * @param {type} z
 * @param {type} $
 * @returns {undefined}
 */
(function(w, z, $){
    
    /* Layout builder local */
    var _layoutbuilder = {
        /* Element selectors */
        _elements: {
            layoutBuilderContainer: '#layoutbuilder-container',
            childrenContainer: '.children-container',
            sortableConnect: '.connectedSortable'
        },
        /**
         * Init function
         * @returns {undefined}
         */
        _init:function(){
            var _self = this;
            $(_self._elements.childrenContainer).sortable({
                    connectWith: _self._elements.sortableConnect
            }).disableSelection();
        }

    };
    
    /* Append to Zo2 JS framework */
    z.layoutbuilder = _layoutbuilder;
    
    /* Init after document ready */
    $(w.document).ready(function(){
        z.layoutbuilder._init();
    });
    
})(window, zo2, jQuery);