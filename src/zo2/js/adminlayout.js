jQuery(document).ready(function($){
    var width = $('#style-form').width() - 320;
    $('#droppable-container').css('width', width);

    $('#droppable-container > .container-fluid').sortable({
        items: '.sortable-row',
        helper: 'clone',
        handle: '.row-control-icon.dragger',
        containment: 'parent'
    });

    $('.sortable-row').sortable({
        items: '.sortable-span',
        connectWith: '.sortable-row'
    });

    $('.row-control-icon.duprow').on('click', function() {
        var $container = $(this).closest('.sortable-row');
        var $colContainer = $container.find('')
        if ($container != null && $container.length > 0) {

        }
    });
});