/**
 * Zo2 Layout builder
 * @param {type} w
 * @param {type} z
 * @param {type} $
 * @returns {undefined}
 */
(function(w, z, $) {

    /* Layout builder local */
    var _layoutbuilder = {
        /* Element selectors */
        _elements: {
            layoutBuilderContainer: '#layoutbuilder-container > #zo2-layoutbuilder',
            childrenContainer: '.children-container',
            sortableConnect: '.connectedSortable',
            sortableRow: '.sortable-row',
            joomlaTooltip: '.tooltip',
            emptyParentRow: '#layoutbuilder-container > #zo2-empty-parent-row',
            emptyChildRow: '#layoutbuilder-container > #zo2-empty-child-row',
            defaultRowSetting: '#layoutbuilder-container > #zo2-row-setting',
            rowSetting: '#zo2-row-setting-container'
        },
        layoutJson: null,
        /**
         * Init function
         * @returns {undefined}
         */
        _init: function() {
            var _self = this;
            /* Move child rows */
            $(_self._elements.childrenContainer).sortable({
                placeholder: "sortable-hightligth",
                start: function(event, ui) {
                    ui.placeholder.height(ui.helper.outerHeight());
                    ui.placeholder.addClass(ui.item.attr('class'));
                },
                stop: function(event, ui) {
                    ui.placeholder.removeClass(ui.item.attr('class'));
                },
                connectWith: _self._elements.sortableConnect
            }).disableSelection();
            /* Sort able parent row */
            $(_self._elements.layoutBuilderContainer).sortable({
                placeholder: "sortable-hightligth",
                start: function(event, ui) {
                    ui.placeholder.height(ui.helper.outerHeight());
                    ui.placeholder.addClass(ui.item.attr('class'));
                },
                stop: function(event, ui) {
                    ui.placeholder.removeClass(ui.item.attr('class'));
                }
            }).disableSelection();
        },
        /**
         * Sortable flush
         * @returns {undefined}
         */
        sortableFlush: function() {
            $(this._elements.layoutBuilderContainer).sortable("destroy");
            $(this._elements.childrenContainer).sortable("destroy");
        },
        /**
         * Get JSON from layout builder
         * @returns {Array}
         */
        getLayoutJson: function() {
            this.layoutJson = [];
            this._getLayoutJson();
            return this.layoutJson;
        },
        /**
         * Add empty parent row
         * @returns {undefined}
         */
        addParentRow: function() {
            this.sortableFlush();
            var html = $(this._elements.emptyParentRow).html();
            $(this._elements.layoutBuilderContainer)
                    .find(this._elements.sortableRow + ':first')
                    .before(html);
            this._init();
        },
        /**
         * Add child row
         * @param {type} element
         * @returns {undefined}
         */
        addRow: function(element) {
            this.sortableFlush();
            var html = $(this._elements.emptyChildRow).html();
            var $childContainer = $(element)
                    .closest(this._elements.sortableRow)
                    .find(this._elements.childrenContainer + ':first');
            if ($childContainer.find(this._elements.sortableRow).length > 0) {
                $childContainer.find(this._elements.sortableRow + ':first').before(html);
            } else {
                $childContainer.html(html);
            }
            this._init();
        },
        /**
         * Delete row
         * @param {html node} element
         * @returns {undefined}
         */
        deleteRow: function(element) {
            $(element).closest(this._elements.sortableRow).remove();
            $(this._elements.joomlaTooltip).find(':visible').hide();
        },
        /**
         * Toogle settings
         * @param {html node} element
         * @returns {undefined}
         */
        toggleSetting: function(element) {
            var html = $(this._elements.defaultRowSetting).html();
            var $rowSetting = $(element)
                    .closest(this._elements.sortableRow)
                    .find(this._elements.rowSetting);
            $rowSetting.html(html);
            $rowSetting.toggle('slow');
        },
        /**
         * Internal get JSON
         * @param {jQuery object} $node
         * @param {array} parent
         * @returns {undefined}
         */
        _getLayoutJson: function($node, parent) {
            var _self = this;
            if (typeof ($node) == 'undefined') {
                $node = $(_self._elements.layoutBuilderContainer);
                parent = _self.layoutJson;
            } else {
                $node = $node.find(_self._elements.childrenContainer + ':first');
            }
            $.each($node.children(_self._elements.sortableRow), function() {
                if (typeof ($(this).data('zo2')) != 'undefined') {
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
    $(w.document).ready(function() {
        z.layoutbuilder._init();
    });

})(window, zo2, jQuery);