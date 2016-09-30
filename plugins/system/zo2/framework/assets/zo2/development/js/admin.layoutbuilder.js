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
            this.blocksetting();
            this.save();
            this.addNewBlock();
        },

        /*
        prepend column
         */

        addNewBlock: function() {
            $('#droppable-container').on('click', '.col-control-header > .prepend-column.before', function() {
                var $col = $(this).closest('.sortable-col');
                var metaHtml = '<div class="col-wrap sortable-col-child"><div class="col-name">(none)</div>' +
                    '<div class="col-control-buttons">' +
                    '<i title="'+drag_block+'" class="col-control-icon dragger fa fa-arrows hasTooltip"></i>' +
                    '<i title="'+clone_block+'" class="col-control-icon add-row fa fa-clone hasTooltip"></i>'+
                    '<i title="'+block_setting+'" class="fa fa-cog col-control-icon block-settings hasTooltip"></i>' +
                    '<i title="'+remove_block+'" class="fa fa-remove col-control-icon delete hasTooltip"></i>' +
                    '</div><div class="row-container"></div>' +
                    '</div>';
                var $meta = $(metaHtml);
                $meta.insertAfter($(this).closest('.col-control-header'));
            });

            $('#droppable-container').on('click', '.col-prepend-after > .prepend-column.after', function() {
                var $col = $(this).closest('.sortable-col');
                var metaHtml = '<div class="col-wrap sortable-col-child"><div class="col-name">(none)</div>' +
                    '<div class="col-control-buttons">' +
                    '<i title="'+drag_block+'" class="col-control-icon dragger fa fa-arrows hasTooltip"></i>' +
                    '<i title="'+clone_block+'" class="col-control-icon add-row fa fa-clone hasTooltip"></i>'+
                    '<i title="'+block_setting+'" class="fa fa-cog col-control-icon block-settings hasTooltip"></i>' +
                    '<i title="'+remove_block+'" class="fa fa-remove col-control-icon delete hasTooltip"></i>' +
                    '</div><div class="row-container"></div>' +
                    '</div>';
                var $meta = $(metaHtml);
                $meta.insertBefore($(this).closest('.col-prepend-after'));
            });
        },

        /*
        setting new column
         */
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


            // $(this._elements.sortableRow).sortable({
            //     items: '>.row-control>.col-container>.sortable-col',
            //     connectWith: '>.sortable-row',
            //     handle: '>.col-wrap>.col-control-buttons>.col-control-icon.dragger',
            //     containment: 'parent',
            //     tolerance: "pointer",
            //     helper: 'clone',
            //     axis: 'x'
            // });

            // $(this._elements.container).sortable({
            //     items: '>.sortable-col-child',
            //     containment: 'parent'
            // });
            $(this._elements.container).sortable();
            if($(this._elements.container + ' > .sortable-col').length > 0) $(this._elements.container ).find(' .sortable-col').sortable();
            if($(this._elements.container ).find('.col-container.zo2-row').length > 0) $(this._elements.container).find('.col-container.zo2-row').sortable();
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
                    _self.cloneRow($row);
                    // _self._addChildRow($row, true);
                }
            });

            $('#droppable-container').on('click', '.no-content-helper > .prepend-row', function() {
                _self._addChildRow(jQuery(this).parent('.no-content-helper'),'prependTo');
            });

            $('#droppable-container').on('click', '.col-control-buttons > .add-row', function() {
                var $col = $(this).closest('.sortable-col');
                var $cur = $(this).closest('.col-wrap').clone().wrap('<div>').parent().html();
                $col.find('> .col-prepend-after').before($cur);
                $(_self._elements.container).find('.col-container.zo2-row').sortable();
                $(_self._elements.container ).find(' .sortable-col').sortable({items:'>.sortable-col-child'});
            });
        },
        /**
         * Add column
         * @returns {undefined}
         */

        /*
        * clone row
         */
        cloneRow: function($target) {
            var clone = $target.clone().wrap('<div>').parent().html();
            clone = clone.replace($target.find('.row-name').html(),$target.find('.row-name').html() + ' Cloned');
            $(clone).insertAfter($target);
        },


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
            $col.attr('data-new-layout', '1');
            $col.attr('data-zo2-span', 12);
            $col.removeClass(_self._settings.allColClass);
            $col.addClass('col-md-12');
            $col.attr('data-zo2-position', '');
            $col.attr('data-zo2-offset', 0);
            $col.attr('data-zo2-customClass', '');
            var metaHtml = '<div class="col-control-header">'+
                    '<i title="'+prepend_this_column+'" class="row-control-icon prepend-column before fa fa-plus hasTooltip"></i>'+
                    '<i title="'+col_setting+'" class="fa fa-cog col-control-icon settings hasTooltip" data-toggle="modal"></i>'+
                    '<i title="'+remove_col+'" class="row-control-icon delete fa fa-trash-o hasTooltip"></i>'+
                    '</div><div class="col-wrap sortable-col-child col-md-12" data-zo2-type="span" data-zo2-position ="" data-zo2-offset="" data-zo2-customClass =""> <div class="col-name">(none)</div>' +
                    '<div class="col-control-buttons">' +
                    '<i title="'+drag_block+'" class="col-control-icon dragger fa fa-arrows hasTooltip"></i>' +
                    '<i title="'+clone_block+'" class="col-control-icon add-row fa fa-clone hasTooltip"></i>'+
                    '<i title="'+block_setting+'" class="fa fa-cog col-control-icon block-settings hasTooltip" data-toggle="modal"></i>'+
                    '<i title="'+remove_block+'" class="fa fa-remove col-control-icon delete hasTooltip"></i>' +
                    '</div><div class="row-container"></div>' +
                    '</div>'+
                    '<div class="col-prepend-after"><i title="'+prepend_this_column+'" class="row-control-icon prepend-column after fa fa-plus hasTooltip"></i></div></div>';
            var $meta = $(metaHtml);
            $meta.appendTo($col);
            $col.appendTo($target);
            $(_self._elements.container).find('.col-container.zo2-row').sortable();
            $(_self._elements.container ).find(' .sortable-col').sortable({items:'>.sortable-col-child'});
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
                    if (after == 'prependTo') var $row = $('<div />').addClass('zo2-row sortable-row').insertBefore($target);
                    else var $row = $('<div />').addClass('zo2-row sortable-row').insertAfter($target);
                }
                $row.attr('data-zo2-type', 'row');
                $row.attr('data-zo2-customClass', '');
                $row.attr('data-zo2-fluidwidth', '0');
                for (var i = 0; i < _self._settings.visibilityAttributes.length; i++) {
                    $row.attr(_self._settings.visibilityAttributes[i], '1');
                }
                var $meta = $('<div class="col-md-12 row-control">' +
                        '<div class="row-control-container">' +
                        '<div class="row-control-buttons row-name">' +
                        '<i title="'+drag_row+'" class="fa fa-arrows row-control-icon dragger hasTooltip"></i>' +
                        '<i title="'+add_nc+'" class="row-control-icon add-column fa fa-plus hasTooltip"></i>' +
                    'Section Title</div>' +
                        '<div class="row-control-buttons">' +
                        '<i title="'+row_setting+'" class="fa fa-cog row-control-icon settings hasTooltip"></i>' +
                        '<i title="'+clone_this_row+'" class="row-control-icon add-row fa fa-clone hasTooltip"></i>' +
                        '<i title="'+remove_row+'" class="row-control-icon delete fa fa-remove hasTooltip"></i>' +
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
                w.bootbox.confirm(confirmc, function(result) {
                    var $container = $this.closest('.sortable-col');
                    var noc = $container.find('.col-wrap');
                    if (result){
                        if (noc.length == 1 ) {
                            $this.closest('.sortable-col').remove();
                            z.admin.layoutbuilder.rearrangeSpan($container);
                        }else {
                            $this.closest('.col-wrap').remove();
                        }
                    }

                });
            });
            $('#droppable-container').on('click', '.row-control-buttons > .delete', function() {
                var $this = $(this);
                w.bootbox.confirm(confirmc, function(result) {
                    var $container = $this.closest('.row-container');
                    if (result)
                        $this.closest('.sortable-row').remove();
                    z.admin.layoutbuilder.rearrangeSpan($container);
                });
            });

            $('#droppable-container').on('click', '.col-control-header > .delete', function() {
                var $this = $(this);
                w.bootbox.confirm(confirmc, function(result) {
                    var $container = $this.closest('.row-container');
                    if (result)
                        $this.closest('.sortable-col').remove();
                    z.admin.layoutbuilder.rearrangeSpan($container);
                });
            });
        },

        /*
        * block setting
         */
        blocksetting: function() {
            var _self = this;
            //bind event to generate row id
            $('#txtRowName').on('keyup', function(e) {
                var $this = $(this);
                $('#txtRowId').val(z.admin.generateSlug($this.val()));
            });
            $('#droppable-container').on('click', '.col-control-buttons > .block-settings', function() {
                var $col = $(this).closest('.sortable-col .col-wrap');
                _self.editingElement = $col;

                var jdoc = $col.attr('data-zo2-jdoc');
                var spanPosition = $col.attr('data-zo2-position');
                var spanStyle = $col.attr('data-zo2-style');
                var spanId = $col.attr('data-zo2-id');

                $('#dlColJDoc').val(jdoc).trigger("liszt:updated");
                $('#dlColPosition').val(spanPosition).trigger("liszt:updated");
                $('#ddlColStyle').val(spanStyle).trigger("liszt:updated");
                $('#txtColId').val(spanId);
                var $modal = $('#blockSettingsModal');
                $modal.find('.zo2-tabs').find('li a').removeClass('active');
                $modal.find('.zo2-tabs-content').find('> div').removeClass('active');
                $modal.find('.zo2-tabs').find('li a:first').addClass('active');
                $modal.find('.zo2-tabs-content').find('> div:first').addClass('active');
                $modal.modal('show');
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
                // $('#btgRowPhone').find('button').removeClass('active btn-success btn-danger');
                if ($row.attr('data-zo2-visibility-xs') == '1')
                    $('#btgRowPhone').prop( "checked", true );
                // else
                //     $('#btgRowPhone').find('.btn-off').addClass('active btn-danger');
                //$('#cbRowTabletVisibility').attr('checked', $row.attr('data-zo2-visibility-sm') == '1');
                // $('#btgRowTablet').find('button').removeClass('active btn-success btn-danger');
                if ($row.attr('data-zo2-visibility-sm') == '1')
                    $('#btgRowTablet').prop( "checked", true );
                // else
                //     $('#btgRowTablet').find('.btn-off').addClass('active btn-danger');
                // //$('#cbRowDesktopVisibility').attr('checked', $row.attr('data-zo2-visibility-md') == '1');
                // $('#btgRowDesktop').find('button').removeClass('active btn-success btn-danger');
                if ($row.attr('data-zo2-visibility-md') == '1')
                    $('#btgRowDesktop').prop( "checked", true );
                // else
                //     $('#btgRowDesktop').find('.btn-off').addClass('active btn-danger');
                // //$('#cbRowLargeDesktopVisibility').attr('checked', $row.attr('data-zo2-visibility-lg') == '1');
                // $('#btgRowLargeDesktop').find('button').removeClass('active btn-success btn-danger');
                if ($row.attr('data-zo2-visibility-lg') == '1')
                    $('#btgRowLargeDesktop').prop( "checked", true );
                // else
                //     $('#btgRowLargeDesktop').find('.btn-off').addClass('active btn-danger');

                //$('#cbRowFullWidth').attr('checked', $row.attr('data-zo2-fullwidth') == '1');
                // $('#btgFullWidth').find('button').removeClass('active btn-danger btn-success');
                if ($row.attr('data-zo2-fluidwidth') == '1')
                    $('#btgRowFluidWidth').prop( "checked", true );
                // else
                //     $('#btgFullWidth').find('.btn-off').addClass('btn-danger active');

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

            $('#droppable-container').on('click', '.col-control-header > .settings', function() {
                var $col = $(this).closest('.sortable-col');
                _self.editingElement = $col;

                var span = $col.attr('data-zo2-span');
                var spanOffset = $col.attr('data-zo2-offset');
                var customCss = $col.attr('data-zo2-customClass');

                //$('#cbColumnPhoneVisibility').attr('checked', $col.attr('data-zo2-visibility-xs') == '1');
                // $('#btgColPhone').find('button').removeClass('active btn-danger btn-success');
                if ($col.attr('data-zo2-visibility-xs') == '1')
                    $('#btgColPhone').prop( "checked", true );
                // else
                //     $('#btgColPhone').find('.btn-off').addClass('btn-danger active');
                // //$('#cbColumnTabletVisibility').attr('checked', $col.attr('data-zo2-visibility-sm') == '1');
                // $('#btgColTablet').find('button').removeClass('active btn-danger btn-success');
                if ($col.attr('data-zo2-visibility-sm') == '1')
                    $('#btgColTablet').prop( "checked", true );
                // else
                //     $('#btgColTablet').find('.btn-off').addClass('btn-danger active');
                // //$('#cbColumnDesktopVisibility').attr('checked', $col.attr('data-zo2-visibility-md') == '1');
                // $('#btgColDesktop').find('button').removeClass('active btn-danger btn-success');
                if ($col.attr('data-zo2-visibility-md') == '1')
                    $('#btgColDesktop').prop( "checked", true );
                // else
                //     $('#btgColDesktop').find('.btn-off').addClass('btn-danger active');
                // //$('#cbColumnLargeDesktopVisibility').attr('checked', $col.attr('data-zo2-visibility-lg') == '1');
                // $('#btgColLargeDesktop').find('button').removeClass('active btn-danger btn-success');
                if ($col.attr('data-zo2-visibility-lg') == '1')
                    $('#btgColLargeDesktop').prop( "checked", true );
                // else
                //     $('#btgColLargeDesktop').find('.btn-off').addClass('btn-danger active');

                $('#ddlColWidth').val(span).trigger("liszt:updated");
                $('#ddlColOffset').val(spanOffset).trigger("liszt:updated");
                $('#txtColCss').val(customCss);
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
            $('#btnSaveBlockSettings').on('click', function() {
                var $col = _self.editingElement;
                $col.attr('data-zo2-jdoc', $('#dlColJDoc').val());
                $col.attr('data-zo2-style', $('#ddlColStyle').val());
                $col.attr('data-zo2-id', $('#txtColId').val());


                var position = $('#dlColPosition').val();
                if (position === null) {
                    position = '';
                }
                var colName = position.length > 0 ? position : '(none)';
                //$col.removeClass(_self._settings.allColClass).addClass('col-md-' + $col.attr('data-zo2-span'));
                //$col.removeClass(_self._settings.allColOffset).addClass('col-md-offset-' + $('#ddlColOffset').val());
                $col.attr('data-zo2-position', position);
                $col.find('>.col-name').text(colName);
                $('#blockSettingsModal').modal('hide');
                return false;
            });

            $('#btnSaveColSettings').on('click', function() {
                var $col = _self.editingElement;
                $col.attr('data-zo2-offset', $('#ddlColOffset').val());
                $col.attr('data-zo2-customClass', $('#txtColCss').val());
                $col.attr('data-zo2-visibility-xs', $('#btgColPhone').is(":checked") ? '1' : '0');
                $col.attr('data-zo2-visibility-sm', $('#btgColTablet').is(":checked") ? '1' : '0');
                $col.attr('data-zo2-visibility-md', $('#btgColDesktop').is(":checked") ? '1' : '0');
                $col.attr('data-zo2-visibility-lg', $('#btgColLargeDesktop').is(":checked") ? '1' : '0');

                $col.attr('data-zo2-span', $('#ddlColWidth').val());
                $col.removeClass(_self._settings.allColClass);
                $col.addClass('col-md-'+$('#ddlColWidth').val());
                $('#colSettingsModal').modal('hide');
                return false;
            });
            $('#btnSaveRowSettings').on('click', function() {
                var $row = _self.editingElement;
                $row.find('>.row-control>.row-control-container>.row-name').html('<i title="'+drag_row+'" class="fa fa-arrows row-control-icon dragger hasTooltip"></i>' +
                    '<i title="'+add_nc+'" class="row-control-icon add-column fa fa-plus hasTooltip"></i>' + $('#txtRowName').val());
                $row.attr('data-zo2-customClass', $('#txtRowCss').val());
                $row.attr('data-zo2-visibility-xs', $('#btgRowPhone').is(":checked") ? '1' : '0');
                $row.attr('data-zo2-visibility-sm', $('#btgRowTablet').is(":checked") ? '1' : '0');
                $row.attr('data-zo2-visibility-md', $('#btgRowDesktop').is(":checked") ? '1' : '0');
                $row.attr('data-zo2-visibility-lg', $('#btgRowLargeDesktop').is(":checked") ? '1' : '0');
                $row.attr('data-zo2-fluidwidth', $('#btgRowFluidWidth').is(":checked") ? '1' : '0');
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