jQuery(function($){
    var $container = $('#hdLayoutBuilder').parent().clone();
    var $optionsContainer = $('#options');
    $optionsContainer.empty();
    $container.appendTo($optionsContainer);
    $container.css('margin-left', 0);

    $container.find('.row-fluid').sortable({
        handle: '.drag-handler'
    });


});