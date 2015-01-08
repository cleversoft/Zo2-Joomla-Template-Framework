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
            sortableConnect: '.connectedSortable',
            sortableRow: '.sortable-row'
        },
        layoutJson: null,
        /**
         * Init function
         * @returns {undefined}
         */
        _init:function(){
            var _self = this;
            /* Move child rows */
            $(_self._elements.childrenContainer).sortable({
                placeholder: "sortable-hightligth",
                connectWith: _self._elements.sortableConnect
            }).disableSelection();
            /* Sort able parent row */
            $(_self._elements.layoutBuilderContainer).sortable({
                placeholder: "sortable-hightligth"
            }).disableSelection();
        },
        /**
         * Get JSON from layout builder
         * @returns {Array}
         */
        getLayoutJson: function(){
            this.layoutJson = [];
            this._getLayoutJson();
            return this.layoutJson;
        },
        /**
         * Internal get JSON
         * @param {jQuery object} $node
         * @param {array} parent
         * @returns {undefined}
         */
        _getLayoutJson: function($node, parent){
            var _self = this;
            if(typeof($node) == 'undefined'){
                $node = $(_self._elements.layoutBuilderContainer);
                parent = _self.layoutJson;
            }else{
                $node = $node.find(_self._elements.childrenContainer + ':first');
            }
            $.each($node.children(_self._elements.sortableRow), function(){
                if(typeof($(this).data('zo2')) != 'undefined'){
                    parent.push($(this).data('zo2'));
                    parent[parent.length - 1].children = [];
                    _self._getLayoutJson($(this), parent[parent.length - 1].children);
                }
            });
        }
    };
    
    /* Append to Zo2 JS framework */
    z.layoutbuilder = _layoutbuilder;
    
    /* Init after document ready */
    $(w.document).ready(function(){
        z.layoutbuilder._init();
    });
    
})(window, zo2, jQuery);