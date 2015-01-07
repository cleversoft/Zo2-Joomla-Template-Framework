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
        _elements: {
            childrenContainer: '.children-container',
            sortableConnect: '.connectedSortable'
        },
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