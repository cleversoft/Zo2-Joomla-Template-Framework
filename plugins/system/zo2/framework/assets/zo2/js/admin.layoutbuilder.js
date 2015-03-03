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
         * Element selector container
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
            strategy: [
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
         * Element which is editing
         */
        editingElement: null,
        /**
         * Init function
         * @returns {undefined}
         */
        _init: function() {
            this._sortable();
            this.addNewRow();
            this.addColumn();
            this.delete();
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
            this._updateSpanSize($container);
        },
        /**
         * Update span size on col control
         * @param {type} $container
         * @returns {undefined}
         */
        _updateSpanSize: function($container) {
            var $spans = $container.find('>[data-zo2-type="span"]');
            $spans.each(function() {
                var _currentSpan = $(this);
                _currentSpan.find('.col-grid-button > .col-size').html(_currentSpan.attr('data-zo2-span') + '/12');
            });
        },
        /**
         * Add new parent row
         * @returns {undefined}
         */
        addNewRow: function() {
            var _self = this;
            $('#droppable-container').on('click', '.row-control-buttons > .add-row', function() {
                var $row = $(this).closest('[data-zo2-type="row"]');
                if($row.parent().hasClass('zo2-container')){
                    _self._addChildRow($row, true);
                }                
            });
            $('#droppable-container').on('click', '.col-control-buttons > .add-row', function() {
                var $col = $(this).closest('[data-zo2-type="span"]');
                _self._addChildRow($col.find('> .col-wrap > .row-container'));
            });
        },
        /**
         * Add column
         * @returns {undefined}
         */
        addColumn: function() {
            var _self = this;
            $('#droppable-container').on('click', '.row-control-buttons > .add-column', function() {
                var $row = $(this).closest('[data-zo2-type="row"]');
                _self._addChildColumn($row.find('> .col-md-12 > .col-container'));
            });
        },
        /**
         * Add child column to container
         * @param {type} $rowContainer
         * @returns {undefined}
         */
        _addChildColumn: function($target) {
            var _self = this;
            var $col = $('<div />').addClass('sortable-col');
            $col.attr('data-zo2-type', 'span');
            $col.attr('data-zo2-span', 12);
            $col.removeClass(_self._settings.allColClass);
            $col.addClass('col-md-12');
            $col.attr('data-zo2-position', '');
            $col.attr('data-zo2-offset', 0);
            $col.attr('data-zo2-customClass', '');
            var metaHtml = '<div class="col-wrap"><div class="col-name">(none)</div>' +
                    '<div class="col-grid-button">' +
                    '<i title="Column decrease" class="col-grid-icon col-decrease fa fa-minus-square-o"></i>' +
                    '<span class="col-size">12/12</span>' +
                    '<i title="Column increase" class="col-grid-icon col-increase fa fa-plus-square-o"></i>' +
                    '</div>' +
                    '<div class="col-control-buttons">' +
                    '<i title="Drag column" class="col-control-icon dragger fa fa-arrows hasTooltip"></i>' +
                    '<i title="Column\'s settings" class="fa fa-cog col-control-icon settings hasTooltip"></i>' +
                    '<i title="Add new row" class="col-control-icon add-row fa fa-align-justify hasTooltip"></i>'+
                    '<i title="Remove column" class="fa fa-remove col-control-icon delete hasTooltip"></i>' +
                    '</div><div class="row-container"></div></div></div>';
            var $meta = $(metaHtml);
            $meta.appendTo($col);
            $col.appendTo($target);
        },
        /**
         * Add child column to container
         * @param {type} $rowContainer
         * @returns {undefined}
         */
        _addChildRow: function($target, after) {
                var _self = this;
                if(typeof(after) === 'undefined'){
                    var $row = $('<div />').addClass('zo2-row sortable-row').appendTo($target);
                }else{
                    var $row = $('<div />').addClass('zo2-row sortable-row').insertAfter($target);
                }                
                $row.attr('data-zo2-type', 'row');
                $row.attr('data-zo2-customClass', '');
                $row.attr('data-zo2-fullwidth', '0');
                for (var i = 0; i < _self._settings.visibilityAttributes.length; i++) {
                    $row.attr(_self._settings.visibilityAttributes[i], '1');
                }
                var $meta = $('<div class="col-md-12 row-control">' +
                        '<div class="row-control-container">' +
                        '<div class="row-name">(unnamed row)</div>' +
                        '<div class="row-control-buttons">' +
                        '<i title="Drag row" class="fa fa-arrows row-control-icon dragger hasTooltip"></i>' +
                        '<i title="Row\'s settings" class="fa fa-cog row-control-icon settings hasTooltip"></i>' +
                        '<i title="Add new row" class="row-control-icon add-row fa fa-align-justify hasTooltip"></i>' +
                        '<i title="Add new column" class="row-control-icon add-column fa fa-columns hasTooltip"></i>' +
                        '<i title="Remove row" class="row-control-icon delete fa fa-remove hasTooltip"></i>' +
                        '</div></div>' +
                        '<div class="col-container"></div></div>');
                $meta.appendTo($row);
                _self._addChildColumn($row.find('>.col-md-12>.col-container'))
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
                    z.admin.layoutbuilder.rearrangeSpan($container);
                });
            });
            $('#droppable-container').on('click', '.row-control-buttons > .delete', function() {
                var $this = $(this);
                w.bootbox.confirm('Are you sure want to delete this column?', function(result) {
                    var $container = $this.closest('.row-container');
                    if (result)
                        $this.closest('.sortable-row').remove();
                    z.admin.layoutbuilder.rearrangeSpan($container);
                });
            });
        },
        /**
         * Show setting
         * @returns {undefined}
         */
        setting: function() {
            var _self = this;
            //bind event to generate row id
            $('#txtRowName').on('keyup', function(e) {
                var $this = $(this);
                $('#txtRowId').val(z.admin.generateSlug($this.val()));
            });
            $('#droppable-container').on('click', '.col-grid-button > .col-decrease', function() {
                var $col = $(this).closest('.sortable-col');
                $col.removeClass(_self._settings.allColClass);
                var width = parseInt($col.attr('data-zo2-span'));
                width -= (width > 1) ? 1 : 0;
                $col.addClass('col-md-' + width);
                $col.attr('data-zo2-span', width);
                $col.find('.col-grid-button > .col-size').html(width + '/12');
            });
            $('#droppable-container').on('click', '.col-grid-button > .col-increase', function() {
                var $col = $(this).closest('.sortable-col');
                $col.removeClass(_self._settings.allColClass);
                var width = parseInt($col.attr('data-zo2-span'));
                width += (width < 12) ? 1 : 0;
                $col.addClass('col-md-' + width);
                $col.attr('data-zo2-span', width);
                $col.find('.col-grid-button > .col-size').html(width + '/12');
            });
            $('#droppable-container').on('click', '.row-control-buttons > .settings', function() {
                var $this = $(this);
                var $row = $this.closest('.sortable-row');
                _self.editingElement = $row;

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

            $('#droppable-container').on('click', '.col-control-buttons > .settings', function() {
                var $col = $(this).closest('.sortable-col');
                _self.editingElement = $col;

                var jdoc = $col.attr('data-zo2-jdoc');
                var spanPosition = $col.attr('data-zo2-position');
                var spanOffset = $col.attr('data-zo2-offset');
                var spanStyle = $col.attr('data-zo2-style');
                var customCss = $col.attr('data-zo2-customClass');
                var spanId = $col.attr('data-zo2-id');
                
                //$('#cbColumnPhoneVisibility').attr('checked', $col.attr('data-zo2-visibility-xs') == '1');
                $('#btgColPhone').find('button').removeClass('active btn-danger btn-success');
                if ($col.attr('data-zo2-visibility-xs') == '1')
                    $('#btgColPhone').find('.btn-on').addClass('btn-success active');
                else
                    $('#btgColPhone').find('.btn-off').addClass('btn-danger active');
                //$('#cbColumnTabletVisibility').attr('checked', $col.attr('data-zo2-visibility-sm') == '1');
                $('#btgColTablet').find('button').removeClass('active btn-danger btn-success');
                if ($col.attr('data-zo2-visibility-sm') == '1')
                    $('#btgColTablet').find('.btn-on').addClass('btn-success active');
                else
                    $('#btgColTablet').find('.btn-off').addClass('btn-danger active');
                //$('#cbColumnDesktopVisibility').attr('checked', $col.attr('data-zo2-visibility-md') == '1');
                $('#btgColDesktop').find('button').removeClass('active btn-danger btn-success');
                if ($col.attr('data-zo2-visibility-md') == '1')
                    $('#btgColDesktop').find('.btn-on').addClass('btn-success active');
                else
                    $('#btgColDesktop').find('.btn-off').addClass('btn-danger active');
                //$('#cbColumnLargeDesktopVisibility').attr('checked', $col.attr('data-zo2-visibility-lg') == '1');
                $('#btgColLargeDesktop').find('button').removeClass('active btn-danger btn-success');
                if ($col.attr('data-zo2-visibility-lg') == '1')
                    $('#btgColLargeDesktop').find('.btn-on').addClass('btn-success active');
                else
                    $('#btgColLargeDesktop').find('.btn-off').addClass('btn-danger active');

                $('#dlColJDoc').val(jdoc).trigger("liszt:updated");
                $('#dlColPosition').val(spanPosition).trigger("liszt:updated");
                $('#ddlColOffset').val(spanOffset).trigger("liszt:updated");
                $('#ddlColStyle').val(spanStyle).trigger("liszt:updated");
                $('#txtColCss').val(customCss);
                $('#txtColId').val(spanId);
                var $modal = $('#colSettingsModal');
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
                var $col = _self.editingElement;
                $col.attr('data-zo2-jdoc', $('#dlColJDoc').val());
                $col.attr('data-zo2-offset', $('#ddlColOffset').val());
                $col.attr('data-zo2-style', $('#ddlColStyle').val());
                $col.attr('data-zo2-customClass', $('#txtColCss').val());
                $col.attr('data-zo2-id', $('#txtColId').val());

                $col.attr('data-zo2-visibility-xs', $('#btgColPhone').find('.btn-on').hasClass('active') ? '1' : '0');
                $col.attr('data-zo2-visibility-sm', $('#btgColTablet').find('.btn-on').hasClass('active') ? '1' : '0');
                $col.attr('data-zo2-visibility-md', $('#btgColDesktop').find('.btn-on').hasClass('active') ? '1' : '0');
                $col.attr('data-zo2-visibility-lg', $('#btgColLargeDesktop').find('.btn-on').hasClass('active') ? '1' : '0');

                var position = $('#dlColPosition').val();
                if (position === null) {
                    position = '';
                }
                var colName = position.length > 0 ? position : '(none)';
                $col.removeClass(_self._settings.allColClass).addClass('col-md-' + $col.attr('data-zo2-span'));
                $col.removeClass(_self._settings.allColOffset).addClass('col-md-offset-' + $('#ddlColOffset').val());
                $col.attr('data-zo2-position', position);
                $col.find('>.col-wrap>.col-name').text(colName);
                $('#colSettingsModal').modal('hide');
                return false;
            });
            $('#btnSaveRowSettings').on('click', function() {
                var $row = _self.editingElement;
                $row.find('>.row-control>.row-control-container>.row-name').text($('#txtRowName').val());
                $row.attr('data-zo2-customClass', $('#txtRowCss').val());
                $row.attr('data-zo2-visibility-xs', $('#btgRowPhone').find('.btn-on').hasClass('active') ? '1' : '0');
                $row.attr('data-zo2-visibility-sm', $('#btgRowTablet').find('.btn-on').hasClass('active') ? '1' : '0');
                $row.attr('data-zo2-visibility-md', $('#btgRowDesktop').find('.btn-on').hasClass('active') ? '1' : '0');
                $row.attr('data-zo2-visibility-lg', $('#btgRowLargeDesktop').find('.btn-on').hasClass('active') ? '1' : '0');
                $row.attr('data-zo2-fullwidth', $('#btgFullWidth').find('.btn-on').hasClass('active') ? '1' : '0');
                //$row.attr('data-zo2-layout', $('#ddlRowLayout').val());
                $row.attr('data-zo2-id', $('#txtRowId').val());
                $('#rowSettingsModal').modal('hide');
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