/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      Duc Nguyen <ducntv@gmail.com>
 * @author      Phuoc Nguyen <phuoc@huuphuoc.me>
 * @author      Vu Hiep <vqhiep2010@gmail.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */

var strategy = [
    [12], [6, 6], [4, 4, 4], [3, 3, 3, 3], [3, 3, 2, 2, 2], [2, 2, 2, 2, 2, 2]
];

var allColClass = 'col-md-1 col-md-2 col-md-3 col-md-4 col-md-5 col-md-6 col-md-7 col-md-8 col-md-9 col-md-10 col-md-11 col-md-12';

var $ = jQuery.noConflict();

$(window).bind('load', function(){
    var $tabsContainer = $('#myTabTabs');
    var $tabContent = $('#myTabContent');
    var $tab = $('<li class=""><a href="#layoutbuilder-container" data-toggle="tab">Layout Builder</a></li>');
    $tab.appendTo($tabsContainer);

    var $layoutBuilder = $('#layoutbuilder-container');
    var $layoutContainer = jQuery('#layoutbuilder-container').closest('.accordion-group');
    $layoutBuilder.addClass('tab-pane').appendTo($tabContent);
    $('#hfTemplateName').appendTo($layoutBuilder);
    $('#hfLayoutName').appendTo($layoutBuilder);
    $layoutContainer.remove();

    insertLogo();
    addIconToMenu();
    fixToolbarIcon();
});

jQuery(document).ready(function($){
    injectFormSubmit();
    wrapForm();

    bindSortable();

    // bind event to generate row id
    $('#txtRowName').on('keyup', function (e){
        var $this = $(this);
        $('#txtRowId').val(generateSlug($this.val()));
    });

    //var width = $('#style-form').width() - 320;
    //$('#droppable-container').css('width', width);
    var layoutName = $('#hfLayoutName').val();
    var templateName = $('#hfTemplateName').val();

    //loadLayout(templateName, layoutName);

    $('.row-control-icon.duplicate').on('click', function() {
        var $this = $(this);
        var $parent = $this.closest('.zo2-row');
        var $container = $this.closest('.zo2-container, .sortable-col');
        var $row = jQuery('<div />').addClass('zo2-row sortable-row').insertAfter($parent);
        $row.attr('data-zo2-type', 'row');
        $row.attr('data-zo2-customClass', '');
        $row.attr('data-zo2-layout', 'fixed');
        var $meta = jQuery('<div class="col-md-12 row-control"><div class="row-control-container"><div class="row-name">(unnamed row)' +
            '</div><div class="row-control-buttons"><i class="icon-move row-control-icon dragger">' +
            '</i><i class="icon-cogs row-control-icon settings"></i><i class="row-control-icon duplicate icon-align-justify">' +
            '</i><i class="row-control-icon split icon-columns" /><i class="row-control-icon delete icon-remove"></i></div></div></div>');
        $meta.appendTo($row);
        var $colContainer = jQuery('<div />').addClass('col-container row-fluid clearfix');
        $colContainer.appendTo($meta);
    });

    $('.row-control-icon.split').on('click', function() {
        var $this = $(this);
        var $container = $this.closest('[data-zo2-type="row"]');
        var $colContainer = $container.find('>.col-md-12>.col-container');
        var $spans = $colContainer.find('>[data-zo2-type="span"]');
        var strategyNum = $spans.length;

        if ($spans.length > 5) return false;
        else
        {
            var selectedStrategy = strategy[strategyNum];
            var $span = jQuery('<div />').addClass('sortable-col');
            $span.attr('data-zo2-type', 'span');
            $span.attr('data-zo2-position', '');
            $span.attr('data-zo2-offset', 0);
            $span.attr('data-zo2-customClass', '');
            var metaHtml = '<div class="col-wrap"><div class="col-name">(none)</div>' +
                '<div class="col-control-buttons">' +
                '<i class="col-control-icon dragger icon-move"></i><i class="icon-cogs col-control-icon settings"></i>' +
                '<i class="icon-remove col-control-icon delete"></i></div></div></div>';
            var $meta = jQuery(metaHtml);
            $meta.appendTo($span);
            var $spanContainer = jQuery('<div />').addClass('row-container zo2-row sortable-row');
            $spanContainer.appendTo($meta);
            $span.appendTo($colContainer);

            // apply new span number
            $colContainer.find('>[data-zo2-type="span"]').each(function(index) {
                var $this = jQuery(this);
                $this.removeClass(allColClass);
                $this.addClass('col-md-' + selectedStrategy[index]);
                $this.attr('data-zo2-span', selectedStrategy[index]);
            });
        }
    });

    $('.row-control-buttons .delete').on('click', function(){
        var $this = $(this);
        bootbox.confirm('Are you sure want to delete this row?', function(result) {
            if (result) $this.closest('.sortable-row').remove();
        });
    });

    $('.col-control-buttons .delete').on('click', function() {
        var $this = $(this);

        bootbox.confirm('Are you sure want to delete this column?', function(result) {
            var $container = $this.closest('.col-container');
            if (result) $this.closest('.sortable-col').remove();
            rearrangeSpan($container);
        });
    });

    $('.row-control-buttons .settings').on('click', function(){
        var $this = $(this);
        var $row = $this.closest('.sortable-row');
        var rowName = $row.find('>.row-control>.row-control-container>.row-name').text();
        var rowCustomClass = $row.attr('data-zo2-customClass');
        var rowLayout = $row.attr('data-zo2-layout');
        var rowId = $row.attr('data-zo2-id');
        if (!rowCustomClass) rowCustomClass = '';
        $.data(document.body, 'editingEl', $row);
        $('#txtRowName').val('').val(rowName);
        $('#txtRowCss').val('').val(rowCustomClass);
        $('#txtRowId').val(rowId);
        $('#ddlRowLayout').val(rowLayout).trigger("liszt:updated");
        $('#rowSettingsModal').modal('show');
    });

    $('#btnSaveRowSettings').on('click', function () {
        var $row = $.data(document.body, 'editingEl');
        $row.find('>.row-control>.row-control-container>.row-name').text($('#txtRowName').val());
        $row.attr('data-zo2-customClass', $('#txtRowCss').val());
        $row.attr('data-zo2-layout', $('#ddlRowLayout').val());
        $row.attr('data-zo2-id', $('#txtRowId').val());
        $('#rowSettingsModal').modal('hide');
        return false;
    });

    $('.col-control-buttons .settings').on('click', function(){
        var $this = $(this);
        var $col = $this.closest('.sortable-col');
        $.data(document.body, 'editingEl', $col);
        var spanWidth = $col.attr('data-zo2-span');
        var spanPosition = $col.attr('data-zo2-position');
        var spanOffset = $col.attr('data-zo2-offset');
        var spanStyle = $col.attr('data-zo2-style');
        var customCss = $col.attr('data-zo2-customClass');
        var spanId = $col.attr('data-zo2-id');
        $('#dlColWidth').val(spanWidth).trigger("liszt:updated"); // trigger chosen to update its selected value, stupid old version
        $('#dlColPosition').val(spanPosition).trigger("liszt:updated");
        $('#ddlColOffset').val(spanOffset).trigger("liszt:updated");
        $('#ddlColStyle').val(spanStyle).trigger("liszt:updated");
        $('#txtColCss').val(customCss);
        $('#txtColId').val(spanId);
        $('#colSettingsModal').modal('show');
    });

    $('#btnSaveColSettings').on('click', function() {
        var $col = $.data(document.body, 'editingEl');
        $col.attr('data-zo2-span', $('#dlColWidth').val());
        $col.attr('data-zo2-offset', $('#ddlColOffset').val());
        $col.attr('data-zo2-style', $('#ddlColStyle').val());
        $col.attr('data-zo2-customClass', $('#txtColCss').val());
        $col.attr('data-zo2-id', $('#txtColId').val());
        var colName = $('#dlColPosition').val().length > 0 ? $('#dlColPosition').val() : '(none)';
        $col.removeClass('span1 span2 span3 span4 span5 span6 span7 span8 span9 span10 span11 span12').addClass('span' + $('#dlColWidth').val());
        $col.removeClass('offset1 offset2 offset3 offset4 offset5 offset6 offset7 offset8 offset9 offset10 offset11 offset12').addClass('offset' + $('#ddlColOffset').val());
        $col.attr('data-zo2-position', $('#dlColPosition').val());
        $col.find('>.col-name').text($('#dlColPosition').val());
        $('#colSettingsModal').modal('hide');
        return false;
    });
});

var bindSortable = function () {
    jQuery('#droppable-container > .zo2-container').sortable({
        items: '>.sortable-row',
        handle: '>.row-control>.row-control-container>.row-control-buttons>.row-control-icon.dragger',
        containment: 'parent',
        tolerance: 'pointer',
        axis: 'y'

    });

    jQuery('.sortable-row').sortable({
        items: '.sortable-col',
        connectWith: '>.sortable-row',
        handle: '>.col-wrap>.col-control-buttons>.col-control-icon.dragger',
        containment: 'parent',
        tolerance: "pointer",
        helper: 'clone',
        axis: 'x'
    });
};

// jQuery('#hfTemplateName').val()
var loadLayout = function (templateName, layoutName, showOverlay) {
    var $overlay = $('<div />').addClass('overlay').appendTo('body');
    if (showOverlay) $overlay.fadeIn();
    jQuery.getJSON('index.php?zo2controller=getLayout&layout=' + layoutName + '&template=' + templateName, function(data){
        var $rootParent = jQuery('#droppable-container .container-fluid');
        $rootParent.empty();
        for (var i = 0; i < data.length; i++) {
            var item = data[i];
            if (item.type == 'row') insertRow(item, $rootParent);
            else if(item.type == 'col') insertCol(item, $rootParent);
        }

        bindSortable();

        $overlay.remove();
    });
};

var insertRow = function (row, $parent) {
    var $row = jQuery('<div />').addClass('row-fluid sortable-row').appendTo($parent);
    $row.attr('data-zo2-type', 'row');
    $row.attr('data-zo2-customClass', row.customClass);
    $row.attr('data-zo2-layout', 'fixed');
    $row.attr('data-zo2-id', row.id);
    var $meta = jQuery('<div class="span12 row-control"><div class="row-control-container"><div class="row-name">' + row.name +
        '</div><div class="row-control-buttons"><i class="icon-move row-control-icon dragger" /><i class="icon-cogs row-control-icon settings" /><i class="row-control-icon duplicate icon-align-justify" /><i class="row-control-icon split icon-columns" /><i class="row-control-icon delete icon-remove" /></div></div></div>');
    $meta.appendTo($row);
    //jQuery('<hr />').appendTo($row);
    //var $span12 = jQuery('<div />').addClass('span12').appendTo($row);
    var $colContainer = jQuery('<div />').addClass('col-container row-fluid clearfix');
    $colContainer.appendTo($meta);

    for (var i = 0; i < row.children.length; i++) {
        var item = row.children[i];
        if (item.type == 'row') insertRow(item, $colContainer);
        else if(item.type == 'col') insertCol(item, $colContainer);
    }
};

var insertCol = function(span, $parent) {
    var $span = jQuery('<div />').addClass('sortable-col').addClass('span'+ span.span).appendTo($parent);
    $span.attr('data-zo2-type', 'span').attr('data-zo2-span', span.span);
    $span.attr('data-zo2-offset', span.offset !== null ? span.offset : 0);
    $span.attr('data-zo2-position', span.position);
    $span.attr('data-zo2-style', span.style);
    $span.attr('data-zo2-customClass', span.customClass);
    $span.attr('data-zo2-id', span.id);
    var $meta = jQuery('<div class="col-name">' + span.name +
        '</div><div class="col-control-buttons"><i class="col-control-icon dragger icon-move" /><i class="icon-cog col-control-icon settings" /><i class="icon-remove col-control-icon delete" /></div>');
    $meta.appendTo($span);
    var $spanContainer = jQuery('<div />').addClass('row-container row-fluid sortable-row');
    $spanContainer.appendTo($span);

    for (var i = 0; i < span.children.length; i++) {
        var item = span.children[i];

        if (item.type == 'row') insertRow(item, $spanContainer);
        else if(item.type == 'col') insertCol(item, $spanContainer);
    }
};

var generateJson = function() {
    var $rootParent = jQuery('#droppable-container .zo2-container');
    var json = [];
    $rootParent.find('>[data-zo2-type="row"]').each(function (){
        var itemJson = generateItemJson(jQuery(this));
        if (itemJson != null) json.push(itemJson);
    });

    return JSON.stringify(json);
};

var generateItemJson = function($item) {
    var result = null;
    var $childrenContainer = null;
    if ($item.attr('data-zo2-type') == 'row') {
        result = {
            type: "row",
            layout: $item.attr('data-zo2-layout'),
            name: $item.find('> .row-control > .row-control-container > .row-name').text(),
            customClass: $item.attr('data-zo2-customClass'),
            id: $item.attr('data-zo2-id') ? $item.attr('data-zo2-id') : '',
            children: []
        };

        $childrenContainer = $item.find('> .row-control > .zo2-row');

        $childrenContainer.find('> [data-zo2-type]').each(function() {
            var childItem = generateItemJson(jQuery(this));
            result.children.push(childItem);
        });
    }
    else if ($item.attr('data-zo2-type') == 'span') {
        result = {
            type: "col",
            name: $item.find('> .col-wrap > .col-name').text(),
            position: $item.attr('data-zo2-position'),
            span: parseInt($item.attr('data-zo2-span')),
            offset: parseInt($item.attr('data-zo2-offset')),
            customClass: $item.attr('data-zo2-customClass') ? $item.attr('data-zo2-customClass') : '',
            style: $item.attr('data-zo2-style'),
            id: $item.attr('data-zo2-id') ? $item.attr('data-zo2-id') : '',
            children: []
        };

        $childrenContainer = $item.find('> .zo2-row');

        $childrenContainer.find('> [data-zo2-type]').each(function() {
            var childItem = generateItemJson(jQuery(this));
            result.children.push(childItem);
        });
    }

    return result;
};

var rearrangeSpan = function ($container){
    var $ = jQuery;
    var $spans = $container.find('>[data-zo2-type="span"]');
    if ($spans.length > 0) {
        var width = 0;
        if ($spans.length == 1) {
            width = 12 - parseInt($spans.attr('data-zo2-offset'));
            if (width > 0) {
                $spans.removeClass(allColClass);
                $spans.addClass('col-md-' + width);
                $spans.attr('data-zo2-span', width);
            }
        }
        else
        {
            var $lastSpan = $spans.eq($spans.length - 1);
            var totalWidth = 0;
            for(var i = 0, total = $spans.length - 1; i < total; i++) {
                var $currentSpan = $spans.eq(i);
                totalWidth += parseInt($currentSpan.attr('data-zo2-offset')) + parseInt($currentSpan.attr('data-zo2-span'));
            }

            width = 12 - totalWidth;
            if (width > 0) {
                $lastSpan.removeClass(allColClass);
                $lastSpan.addClass('col-md-' + width);
                $lastSpan.attr('data-zo2-span', width);
            }
        }
    }
};
var addIconToMenu = function() {
    var $ = jQuery;
    $('#myTabTabs').find('a').eq(0).html('<i class="icon-info" /> Details');
    $('#myTabTabs').find('a').eq(1).html('<i class="icon-cog" /> General Options');
    $('#myTabTabs').find('a').eq(2).html('<i class="icon-edit-sign" /> Menu Assignment');
    $('#myTabTabs').find('a').eq(3).html('<i class="icon-th" /> Layout Builder');
};

var insertLogo = function () {
    var $ = jQuery;
    var $form = $('#style-form');
    $form.prepend('<a href="http://zo2framework.org" target="_blank" id="zo2logo" title="Zo2 Framework"></a>');
};

var fixToolbarIcon = function () {
    var $ = jQuery;
    $('.icon-apply').replaceWith('<i class="icon-check"></i>');
    $('.icon-save-copy').replaceWith('<i class="icon-copy"></i>');
    $('.icon-cancel').replaceWith('<i class="icon-remove-sign color4"></i>');
};

var wrapForm = function() {
    var $ = jQuery;
    var $form = $('#style-form');
    var $wrapper = $('<div id="zo2-config" />').insertBefore($form);
    $form.appendTo($wrapper);
};

var injectFormSubmit = function() {
    var $ = jQuery;
    var $input = $('.hfLayoutHtml');
    document.adminForm.onsubmit = function() {
        $input.val(generateJson());
        return false;
    };
};

var generateSlug = function(str) {
    str = str.replace(/^\s+|\s+$/g, '');
    var from = "ÁÀẠẢÃĂẮẰẶẲẴÂẤẦẬẨẪáàạảãăắằặẳẵâấầậẩẫóòọỏõÓÒỌỎÕôốồộổỗÔỐỒỘỔỖơớờợởỡƠỚỜỢỞỠéèẹẻẽÉÈẸẺẼêếềệểễÊẾỀỆỂỄúùụủũÚÙỤỦŨưứừựửữƯỨỪỰỬỮíìịỉĩÍÌỊỈĨýỳỵỷỹÝỲỴỶỸĐđÑñÇç·/_,:;";
    var to   = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaooooooooooooooooooooooooooooooooooeeeeeeeeeeeeeeeeeeeeeeuuuuuuuuuuuuuuuuuuuuuuiiiiiiiiiiyyyyyyyyyyddnncc------";

    for (var i = 0, l = from.length ; i < l; i++) {
        str = str.replace(new RegExp(from[i], "g"), to[i]);
    }
    str = str.replace(/[^a-zA-Z0-9 -]/g, '').replace(/\s+/g, '-').toLowerCase();
    str = str.replace(/(-){2,}/i, '-');
    return str;
};