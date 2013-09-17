var strategy = [
    [12], [6, 6], [4, 4, 4], [3, 3, 3, 3], [3, 3, 2, 2, 2], [2, 2, 2, 2, 2, 2]
];

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
    generateLayoutsList();

    //var width = $('#style-form').width() - 320;
    //$('#droppable-container').css('width', width);
    var layoutName = $('#hfLayoutName').val();
    var templateName = $('#hfTemplateName').val();

    $('#btSaveLayout').on('click', function() {
        var $overlay = $('<div />').addClass('overlay').appendTo('body').fadeIn();
        var json = generateJson();
        var postData = {
            zo2controller: 'saveLayout',
            name: layoutName,
            template: templateName,
            data: json
        };
        $.post('index.php', postData, function(res) {
            $overlay.remove();
        });
        return false;
    });

    loadLayout($('#hfTemplateName').val(), $('#hfLayoutName').val());

    $('#btLoadLayout').on('click', function() {
        $('#hfLayoutName').val($('#selectLayouts').val());
        loadLayout($('#hfTemplateName').val(), $('#hfLayoutName').val(), true);

        return false;
    });

    $('.row-control-icon.duplicate').live('click', function() {
        var $this = $(this);
        var $parent = $this.closest('.row-fluid');
        var $container = $this.closest('.container-fluid, .sortable-span');
        var $row = jQuery('<div />').addClass('row-fluid sortable-row').insertAfter($parent);
        $row.attr('data-zo2-type', 'row');
        $row.attr('data-zo2-customClass', '');
        $row.attr('data-zo2-layout', 'fixed');
        var $meta = jQuery('<div class="span12 row-control"><div class="row-control-container"><div class="row-name">(unnamed row)' +
            '</div><div class="row-control-buttons"><div class="row-control-icon dragger"></div><div class="row-control-icon settings"></div><div class="row-control-icon delete"></div><div class="row-control-icon duplicate"></div><div class="row-control-icon split"></div></div></div></div>');
        $meta.appendTo($row);
        //jQuery('<hr />').appendTo($row);
        //var $span12 = jQuery('<div />').addClass('span12').appendTo($row);
        var $colContainer = jQuery('<div />').addClass('col-container row-fluid clearfix');
        $colContainer.appendTo($meta);
    });

    $('.row-control-icon.split').live('click', function() {
        var $this = $(this);
        var $container = $this.closest('[data-zo2-type="row"]');
        var $colContainer = $container.find('>.span12>.col-container');
        var $spans = $colContainer.find('>[data-zo2-type="span"]');
        var strategyNum = $spans.length;

        if ($spans.length > 5) return false;
        else
        {
            var selectedStrategy = strategy[strategyNum];
            var $span = jQuery('<div />').addClass('sortable-span');
            $span.attr('data-zo2-type', 'span');
            $span.attr('data-zo2-position', '');
            $span.attr('data-zo2-offset', 0);
            var $meta = jQuery('<div class="col-name">(none)</div><div class="col-control-buttons"><div class="col-control-icon dragger"></div><div class="col-control-icon settings"></div><div class="col-control-icon delete"></div></div></div>');
            $meta.appendTo($span);
            var $spanContainer = jQuery('<div />').addClass('row-container row-fluid sortable-row');
            $spanContainer.appendTo($span);
            $span.appendTo($colContainer);

            // apply new span number
            $colContainer.find('>[data-zo2-type="span"]').each(function(index) {
                var $this = jQuery(this);
                $this.removeClass('span1 span2 span3 span4 span5 span6 span7 span8 span9 span10 span11 span12');
                $this.addClass('span' + selectedStrategy[index]);
                $this.attr('data-zo2-span', selectedStrategy[index]);
            });
        }
    });

    $('.row-control-buttons .delete').live('click', function(){
        var $this = $(this);
        bootbox.confirm('Are you sure want to delete this row?', function(result) {
            if (result) $this.closest('.sortable-row').remove();
        });
    });

    $('.col-control-buttons .delete').live('click', function() {
        var $this = $(this);

        bootbox.confirm('Are you sure want to delete this column?', function(result) {
            var $container = $this.closest('.col-container');
            if (result) $this.closest('.sortable-span').remove();
            rearrangeSpan($container);
        });
    });

    $('.row-control-buttons .settings').live('click', function(){
        var $this = $(this);
        var $row = $this.closest('.sortable-row');
        var rowName = $row.find('>.row-control>.row-control-container>.row-name').text();
        var rowCustomClass = $row.attr('data-zo2-customClass');
        var rowLayout = $row.attr('data-zo2-layout');
        if (!rowCustomClass) rowCustomClass = '';
        $.data(document.body, 'editingEl', $row);
        $('#txtRowName').val('').val(rowName);
        $('#txtRowCss').val('').val(rowCustomClass);
        $('#ddlRowLayout').val(rowLayout).trigger("liszt:updated");
        $('#rowSettingsModal').modal('show');
    });

    $('#btnSaveRowSettings').live('click', function () {
        var $row = $.data(document.body, 'editingEl');
        $row.find('>.row-control>.row-control-container>.row-name').text($('#txtRowName').val());
        $row.attr('data-zo2-customClass', $('#txtRowCss').val());
        $row.attr('data-zo2-layout', $('#ddlRowLayout').val());
        $('#rowSettingsModal').modal('hide');
        return false;
    });

    $('.col-control-buttons .settings').live('click', function(){
        var $this = $(this);
        var $col = $this.closest('.sortable-span');
        $.data(document.body, 'editingEl', $col);
        var spanWidth = $col.attr('data-zo2-span');
        var spanPosition = $col.attr('data-zo2-position');
        var spanOffset = $col.attr('data-zo2-offset');
        $('#dlColWidth').val(spanWidth).trigger("liszt:updated"); // trigger chosen to update its selected value, stupid old version
        $('#dlColPosition').val(spanPosition).trigger("liszt:updated");
        $('#ddlColOffset').val(spanOffset).trigger("liszt:updated");
        $('#colSettingsModal').modal('show');
    });

    $('#btnSaveColSettings').live('click', function() {
        var $col = $.data(document.body, 'editingEl');
        $col.attr('data-zo2-span', $('#dlColWidth').val());
        $col.attr('data-zo2-offset', $('#ddlColOffset').val());
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
    jQuery('#droppable-container > .container-fluid').sortable({
        items: '>.sortable-row',
        handle: '>.row-control>.row-control-container>.row-control-buttons>.row-control-icon.dragger',
        containment: 'parent',
        tolerance: 'pointer',
        axis: 'y'

    });

    jQuery('.sortable-row').sortable({
        items: '.sortable-span',
        connectWith: '>.sortable-row',
        handle: '>.col-control-buttons>.col-control-icon.dragger',
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
    var $meta = jQuery('<div class="span12 row-control"><div class="row-control-container"><div class="row-name">' + row.name +
        '</div><div class="row-control-buttons"><i class="icon-move row-control-icon dragger" /><i class="icon-cog row-control-icon settings" /><i class="row-control-icon duplicate icon-align-justify" /><i class="row-control-icon split icon-columns" /><i class="row-control-icon delete icon-remove" /></div></div></div>');
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
    var $span = jQuery('<div />').addClass('sortable-span').addClass('span'+ span.span).appendTo($parent);
    $span.attr('data-zo2-type', 'span').attr('data-zo2-span', span.span);
    $span.attr('data-zo2-offset', span.offset !== null ? span.offset : 0);
    $span.attr('data-zo2-position', span.position);
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
    var $rootParent = jQuery('#droppable-container .container-fluid');
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
            children: []
        };

        $childrenContainer = $item.find('> .row-control > .row-fluid');

        $childrenContainer.find('> [data-zo2-type]').each(function() {
            var childItem = generateItemJson(jQuery(this));
            result.children.push(childItem);
        });
    }
    else if ($item.attr('data-zo2-type') == 'span') {
        result = {
            type: "col",
            name: $item.find('> .col-name').text(),
            position: $item.attr('data-zo2-position'),
            span: parseInt($item.attr('data-zo2-span')),
            offset: parseInt($item.attr('data-zo2-offset')),
            customClass: $item.attr('data-zo2-customClass'),
            children: []
        };

        $childrenContainer = $item.find('> .row-fluid');

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
                $spans.removeClass('span1 span2 span3 span4 span5 span6 span7 span8 span9 span10 span11 span12');
                $spans.addClass('span' + width);
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
                $lastSpan.removeClass('span1 span2 span3 span4 span5 span6 span7 span8 span9 span10 span11 span12');
                $lastSpan.addClass('span' + width);
                $lastSpan.attr('data-zo2-span', width);
            }
        }
    }
};

var generateLayoutsList = function() {
    jQuery.getJSON('index.php?zo2controller=getLayouts&template=' + jQuery('#hfTemplateName').val(), function(data) {
        if (data && data.length > 0) {
            for (var i = 0, total = data.length; i < total; i++) {
                if (data[i] == 'homepage') continue;
                jQuery('<option />').attr('value', data[i]).text(data[i]).appendTo('#selectLayouts');
            }

            jQuery("#selectLayouts").trigger("liszt:updated");
        }
    });
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
    $('.icon-apply').replaceWith('<i class="icon-check"></i>');
    $('.icon-save-copy').replaceWith('<i class="icon-copy"></i>');
    $('.icon-cancel').replaceWith('<i class="icon-remove-sign color4"></i>');
};