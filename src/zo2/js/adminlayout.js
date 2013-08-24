jQuery(document).ready(function($){
    var width = $('#style-form').width() - 320;
    $('#droppable-container').css('width', width);

    $('.row-control-icon.duprow').on('click', function() {
        var $container = $(this).closest('.sortable-row');
        var $colContainer = $container.find('')
        if ($container != null && $container.length > 0) {

        }
    });

    $('#btSaveLayout').on('click', function(){
        alert(generateJson());
        return false;
    });

    loadLayout($('#hfTemplateName').val(), $('#hfLayoutName').val());
});

var bindSortable = function () {
    jQuery('#droppable-container > .container-fluid').sortable({
        items: '>.sortable-row',
        handle: '>.row-control>.row-control-container>.row-control-buttons>.row-control-icon.dragger',
        containment: 'parent',
        tolerance: "pointer",
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
var loadLayout = function (templateName, layoutName) {
    jQuery.getJSON('index.php?zo2controller=getLayout&layout=' + layoutName + '&template=' + templateName, function(data){
        var $rootParent = jQuery('#droppable-container .container-fluid');
        for (var i = 0; i < data.length; i++) {
            var item = data[i];
            if (item.type == 'row') insertRow(item, $rootParent);
            else if(item.type == 'col') insertCol(item, $rootParent);
        }

        bindSortable();
    });
};

var insertRow = function (row, $parent) {
    var $row = jQuery('<div />').addClass('row-fluid sortable-row').appendTo($parent);
    $row.attr('data-zo2-type', 'row');
    var $meta = jQuery('<div class="span12 row-control"><div class="row-control-container"><div class="row-name">' + row.name +
        '</div><div class="row-control-buttons"><div class="row-control-icon dragger"></div><div class="row-control-icon duplicate"></div><div class="row-control-icon duprow"></div></div></div></div>');
    $meta.appendTo($row);
    jQuery('<hr />').appendTo($row);
    var $colContainer = jQuery('<div />').addClass('col-container row-fluid clearfix');
    $colContainer.appendTo($row);

    for (var i = 0; i < row.children.length; i++) {
        var item = row.children[i];
        if (item.type == 'row') insertRow(item, $colContainer);
        else if(item.type == 'col') insertCol(item, $colContainer);
    }
};

var insertCol = function(span, $parent) {
    var $span = jQuery('<div />').addClass('sortable-span').addClass('span'+ span.span).appendTo($parent);
    $span.attr('data-zo2-type', 'span').attr('data-zo2-span', span.span);
    $span.attr('data-zo2-position', span.position);
    var $meta = jQuery('<div class="col-name">' + span.name +
        '</div><div class="col-control-buttons"><div class="col-control-icon dragger"></div></div>');
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
            name: $item.find('> .row-control > .row-control-container > .row-name').text(),
            customClass: "",
            children: []
        };

        $childrenContainer = $item.find('> .row-fluid');

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
            customClass: "",
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