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
 * Zo2 layout builder
 * @param {type} w Window pointer
 * @param {type} z Zo2 pointer
 * @param {type} $ jQuery pointer
 * @returns {undefined}
 */
(function(w, z, $) {

    /**
     * Layout builder
     */
    var _layoutbuilder = {
        /**
         * Element selector containner
         */
        _elements: {
            /* Drop able childrend */
            container: "#droppable-container > .zo2-container",
            /* Sortable row */
            sortableRow: ".sortable-row"
        },
        /**
         * Default settings
         */
        _settings: {
            /* Default layout */
            strantegy: [
                [12], [6, 6], [4, 4, 4], [3, 3, 3, 3], [3, 3, 2, 2, 2], [2, 2, 2, 2, 2, 2]
            ],
            /* Visibility attributes */
            visibilityAttributes: [
                'data-zo2-visibility-xs', 'data-zo2-visibility-sm', 'data-zo2-visibility-md', 'data-zo2-visibility-lg'
            ],
            /* Colum class */
            allColClass: 'col-md-1 col-md-2 col-md-3 col-md-4 col-md-5 col-md-6 col-md-7 col-md-8 col-md-9 col-md-10 col-md-11 col-md-12',
            /* Colum offset */
            allColOffset: 'col-md-offset-0 col-md-offset-1 col-md-offset-2 col-md-offset-3 col-md-offset-4 col-md-offset-5 col-md-offset-6 ' +
                    'col-md-offset-7 col-md-offset-8 col-md-offset-9 col-md-offset-10 col-md-offset-11 col-md-offset-12'
        },
        /**
         * Init function
         * @returns {undefined}
         */
        _init: function() {
            this._sortable();
            this.duplicate();
            this.slipt();
            this.delete();
            this.addRow();
            this.setting();
            this.save();
        },
        /**
         * Init sortable for layout builder
         * @returns {undefined}
         */
        _sortable: function() {
            $(this._elements.container).sortable({
                items: '>.sortable-row',
                handle: '>.row-control>.row-control-container>.row-control-buttons>.row-control-icon.dragger',
                containment: 'parent',
                tolerance: 'pointer',
                forcePlaceholderSize: true,
                axis: 'y'
            });

            $(this._elements.sortableRow).sortable({
                items: '>.row-control>.col-container>.sortable-col',
                connectWith: '>.sortable-row',
                handle: '>.col-wrap>.col-control-buttons>.col-control-icon.dragger',
                containment: 'parent',
                tolerance: "pointer",
                helper: 'clone',
                axis: 'x'
            });
        },
        /**
         * Rearrange spans
         * @param {jQuery object} $container
         * @returns {undefined}
         */
        rearrangeSpan: function($container) {
            var $spans = $container.find('>[data-zo2-type="span"]');
            var _self = this;
            if ($spans.length > 0) {
                var width = 0;
                if ($spans.length === 1) {
                    width = 12 - parseInt($spans.attr('data-zo2-offset'));
                    if (width > 0) {
                        $spans.removeClass(_self._settings.allColClass);
                        $spans.addClass('col-md-' + width);
                        $spans.attr('data-zo2-span', width);
                    }
                }
                else
                {
                    var $lastSpan = $spans.eq($spans.length - 1);
                    var totalWidth = 0;
                    for (var i = 0, total = $spans.length - 1; i < total; i++) {
                        var $currentSpan = $spans.eq(i);
                        totalWidth += parseInt($currentSpan.attr('data-zo2-offset')) + parseInt($currentSpan.attr('data-zo2-span'));
                    }

                    width = 12 - totalWidth;
                    if (width > 0) {
                        $lastSpan.removeClass(_self._settings.allColClass);
                        $lastSpan.addClass('col-md-' + width);
                        $lastSpan.attr('data-zo2-span', width);
                    }
                }
            }
        },
        /**
         * Check for duplication
         * @returns {undefined}
         */
        duplicate: function() {
            var _self = this;
            $('#droppable-container').on('click', '.row-control-buttons > .duplicate', function() {
                var $this = $(this);
                var $parent = $this.closest('.zo2-row');
                var $row = $('<div />').addClass('zo2-row sortable-row').insertAfter($parent);
                $row.attr('data-zo2-type', 'row');
                $row.attr('data-zo2-customClass', '');
                $row.attr('data-zo2-fullwidth', '0');
                for (var i = 0; i < _self._settings.visibilityAttributes.length; i++) {
                    $row.attr(_self._settings.visibilityAttributes[i], '1');
                }
                //$row.attr('data-zo2-layout', 'fixed');
                var $meta = $('<div class="col-md-12 row-control">' +
                        '<div class="row-control-container">' +
                        '<div class="row-name">(unnamed row)</div>' +
                        '<div class="row-control-buttons">' +
                        '<i title="Drag row" class="fa fa-arrows row-control-icon dragger hasTooltip"></i>' +
                        '<i title="Row\'s settings" class="fa fa-cog row-control-icon settings hasTooltip"></i>' +
                        '<i title="Duplicate row" class="row-control-icon duplicate fa fa-th-list"></i>' +
                        '<i title="Split row" class="row-control-icon split fa fa-align-justify hasTooltip"></i>' +
                        '<i title="Remove row" class="row-control-icon delete fa fa-remove hasTooltip"></i>' +
                        '</div></div>' +
                        '<div class="col-container"></div></div>');
                $meta.appendTo($row);

            });
        },
        /**
         * Split row
         * @returns {undefined}
         */
        slipt: function() {
            var _self = this;
            $('#droppable-container').on('click', '.row-control-buttons > .split', function() {
                var $this = $(this);
                var $container = $this.closest('[data-zo2-type="row"]');
                var $colContainer = $container.find('>.col-md-12>.col-container');
                var $spans = $colContainer.find('>[data-zo2-type="span"]');
                var strategyNum = $spans.length;

                if ($spans.length > 5)
                    return false;
                else
                {
                    var selectedStrategy = _self._settings.strategy[strategyNum];
                    var $span = $('<div />').addClass('sortable-col');
                    $span.attr('data-zo2-type', 'span');
                    $span.attr('data-zo2-position', '');
                    $span.attr('data-zo2-offset', 0);
                    $span.attr('data-zo2-customClass', '');
                    for (var i = 0; i < _self._settings.visibilityAttributes.length; i++) {
                        $span.attr(_self._settings.visibilityAttributes[i], '1');
                    }
                    var metaHtml = '<div class="col-wrap"><div class="col-name">(none)</div>' +
                            '<div class="col-control-buttons">' +
                            '<i title="Drag column" class="col-control-icon dragger fa fa-arrows hasTooltip"></i>' +
                            '<i title="Column\'s settings" class="fa fa-cog col-control-icon settings hasTooltip"></i>' +
                            '<i title="Append new row" class="col-control-icon add-row fa fa-align-justify hasTooltip"></i>' +
                            '<i title="Remove column" class="fa fa-remove col-control-icon delete hasTooltip"></i>' +
                            '</div><div class="row-container"></div></div></div>';
                    var $meta = $(metaHtml);
                    $meta.appendTo($span);
                    /*
                     var $spanContainer = $('<div />').addClass('row-container zo2-row sortable-row');
                     $spanContainer.appendTo($meta);
                     */
                    $span.appendTo($colContainer);

                    // apply new span number
                    $colContainer.find('>[data-zo2-type="span"]').each(function(index) {
                        var $this = $(this);
                        $this.removeClass(_self._settings.allColClass);
                        $this.addClass('col-md-' + selectedStrategy[index]);
                        $this.attr('data-zo2-span', selectedStrategy[index]);
                    });

                    //bindSortable();

                }
            });
        },
        /**
         * Delet child element
         * @returns {undefined}
         */
        delete: function() {
            $('#droppable-container').on('click', '.col-control-buttons > .delete', function() {
                var $this = $(this);
                w.bootbox.confirm('Are you sure want to delete this column?', function(result) {
                    var $container = $this.closest('.col-container');
                    if (result)
                        $this.closest('.sortable-col').remove();
                    z.admin.layoutBuilder.rearrangeSpan($container);
                });
            });
        },
        /**
         * Add new row
         * @returns {undefined}
         */
        addRow: function() {
            var _self = this;
            $('#droppable-container').on('click', '.col-control-buttons > .add-row', function() {
                var $this = $(this);
                var $container = $this.parents('.col-wrap').find('>.row-container');
                var $row = $('<div />').addClass('zo2-row sortable-row').appendTo($container);
                $row.attr('data-zo2-type', 'row');
                $row.attr('data-zo2-customClass', '');
                $row.attr('data-zo2-fullwidth', '0');
                for (var i = 0; i < _self._settings.visibilityAttributes.length; i++) {
                    $row.attr(_self._settings.visibilityAttributes[i], '1');
                }
                //$row.attr('data-zo2-layout', 'fixed');
                var $meta = $('<div class="col-md-12 row-control"><div class="row-control-container"><div class="col-name">(unnamed row)' +
                        '</div><div class="col-control-buttons">' +
                        '<i title="Drag column" class="col-control-icon dragger fa fa-arrows hasTooltip"></i>' +
                        '<i title="Column\'s settings" class="fa fa-cog col-control-icon settings hasTooltip"></i>' +
                        '<i title="Append new row" class="col-control-icon add-row fa fa-align-justify hasTooltip"></i>' +
                        '<i title="Remove column" class="fa fa-remove col-control-icon delete hasTooltip"></i></div></div></div>');
                $meta.appendTo($row);
                var $colContainer = $('<div />').addClass('col-container row-fluid clearfix');
                $colContainer.appendTo($meta);

            });
        },
        /**
         * Show setting
         * @returns {undefined}
         */
        setting: function() {
            //bind event to generate row id
            $('#txtRowName').on('keyup', function(e) {
                var $this = $(this);
                $('#txtRowId').val(z.admin.generateSlug($this.val()));
            });

            $('#droppable-container').on('click', '.row-control-buttons > .settings', function() {
                var $this = $(this);
                var $row = $this.closest('.sortable-row');
                var rowName = $row.find('>.row-control>.row-control-container>.row-name').text();
                var rowCustomClass = $row.attr('data-zo2-customClass');
                //var rowLayout = $row.attr('data-zo2-layout');
                var rowId = $row.attr('data-zo2-id');
                if (!rowCustomClass)
                    rowCustomClass = '';

                //$('#cbRowPhoneVisibility').attr('checked', $row.attr('data-zo2-visibility-xs') == '1');
                $('#btgRowPhone').find('button').removeClass('active btn-success btn-danger');
                if ($row.attr('data-zo2-visibility-xs') == '1')
                    $('#btgRowPhone').find('.btn-on').addClass('active btn-success');
                else
                    $('#btgRowPhone').find('.btn-off').addClass('active btn-danger');
                //$('#cbRowTabletVisibility').attr('checked', $row.attr('data-zo2-visibility-sm') == '1');
                $('#btgRowTablet').find('button').removeClass('active btn-success btn-danger');
                if ($row.attr('data-zo2-visibility-sm') == '1')
                    $('#btgRowTablet').find('.btn-on').addClass('active btn-success');
                else
                    $('#btgRowTablet').find('.btn-off').addClass('active btn-danger');
                //$('#cbRowDesktopVisibility').attr('checked', $row.attr('data-zo2-visibility-md') == '1');
                $('#btgRowDesktop').find('button').removeClass('active btn-success btn-danger');
                if ($row.attr('data-zo2-visibility-md') == '1')
                    $('#btgRowDesktop').find('.btn-on').addClass('active btn-success');
                else
                    $('#btgRowDesktop').find('.btn-off').addClass('active btn-danger');
                //$('#cbRowLargeDesktopVisibility').attr('checked', $row.attr('data-zo2-visibility-lg') == '1');
                $('#btgRowLargeDesktop').find('button').removeClass('active btn-success btn-danger');
                if ($row.attr('data-zo2-visibility-lg') == '1')
                    $('#btgRowLargeDesktop').find('.btn-on').addClass('active btn-success');
                else
                    $('#btgRowLargeDesktop').find('.btn-off').addClass('active btn-danger');

                //$('#cbRowFullWidth').attr('checked', $row.attr('data-zo2-fullwidth') == '1');
                $('#btgFullWidth').find('button').removeClass('active btn-danger btn-success');
                if ($row.attr('data-zo2-fullwidth') == '1')
                    $('#btgFullWidth').find('.btn-on').addClass('btn-success active');
                else
                    $('#btgFullWidth').find('.btn-off').addClass('btn-danger active');

                $.data(w.document.body, 'editingEl', $row);
                $('#txtRowName').val('').val(rowName);
                $('#txtRowCss').val('').val(rowCustomClass);
                $('#txtRowId').val(rowId);
                //$('#ddlRowLayout').val(rowLayout).trigger("liszt:updated");
                var $modal = $('#rowSettingsModal');
                $modal.find('.zo2-tabs').find('li a').removeClass('active');
                $modal.find('.zo2-tabs-content').find('> div').removeClass('active');
                $modal.find('.zo2-tabs').find('li a:first').addClass('active');
                $modal.find('.zo2-tabs-content').find('> div:first').addClass('active');
                $modal.modal('show');
            });
        },
        /**
         * Save layout
         * @returns {undefined}
         */
        save: function() {
            var _self = this;
            $('#btnSaveColSettings').on('click', function() {
                var $col = $.data(w.document.body, 'editingEl');
                $col.attr('data-zo2-jdoc', $('#dlColJDoc').val());
                $col.attr('data-zo2-span', $('#dlColWidth').val());
                $col.attr('data-zo2-offset', $('#ddlColOffset').val());
                $col.attr('data-zo2-style', $('#ddlColStyle').val());
                $col.attr('data-zo2-customClass', $('#txtColCss').val());
                $col.attr('data-zo2-id', $('#txtColId').val());

                $col.attr('data-zo2-visibility-xs', $('#btgColPhone').find('.btn-on').hasClass('active') ? '1' : '0');
                $col.attr('data-zo2-visibility-sm', $('#btgColTablet').find('.btn-on').hasClass('active') ? '1' : '0');
                $col.attr('data-zo2-visibility-md', $('#btgColDesktop').find('.btn-on').hasClass('active') ? '1' : '0');
                $col.attr('data-zo2-visibility-lg', $('#btgColLargeDesktop').find('.btn-on').hasClass('active') ? '1' : '0');

                var colName = $('#dlColPosition').val().length > 0 ? $('#dlColPosition').val() : '(none)';
                $col.removeClass(_self._settings.allColClass).addClass('col-md-' + $('#dlColWidth').val());
                $col.removeClass(_self._settings.allColOffset).addClass('col-md-offset-' + $('#ddlColOffset').val());
                $col.attr('data-zo2-position', $('#dlColPosition').val());
                $col.find('>.col-wrap>.col-name').text(colName);
                $('#colSettingsModal').modal('hide');
                return false;
            });
        },
        /**
         * Generate slug
         * @param {type} str
         * @returns {unresolved}
         */
        generateSlug: function(str) {
            str = str.replace(/^\s+|\s+$/g, '');
            var from = "ÁÀẠẢÃĂẮẰẶẲẴÂẤẦẬẨẪáàạảãăắằặẳẵâấầậẩẫóòọỏõÓÒỌỎÕôốồộổỗÔỐỒỘỔỖơớờợởỡƠỚỜỢỞỠéèẹẻẽÉÈẸẺẼêếềệểễÊẾỀỆỂỄúùụủũÚÙỤỦŨưứừựửữƯỨỪỰỬỮíìịỉĩÍÌỊỈĨýỳỵỷỹÝỲỴỶỸĐđÑñÇç·/_,:;";
            var to = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaooooooooooooooooooooooooooooooooooeeeeeeeeeeeeeeeeeeeeeeuuuuuuuuuuuuuuuuuuuuuuiiiiiiiiiiyyyyyyyyyyddnncc------";

            for (var i = 0, l = from.length; i < l; i++) {
                str = str.replace(new RegExp(from[i], "g"), to[i]);
            }
            str = str.replace(/[^a-zA-Z0-9 -]/g, '').replace(/\s+/g, '-').toLowerCase();
            str = str.replace(/(-){2,}/i, '-');
            return str;
        }
    };
    
    /**
     * Append to Zo2 admin
     */
    z.admin.layoutbuilder = _layoutbuilder;

    /**
     * Init plugin
     * Put all of your init code into _init
     */
    $(w.document).ready(function() {
        z.admin.layoutbuilder._init();
    });
    
})(window, zo2, zo2.jQuery);