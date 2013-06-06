jQuery(function($){
    var $container = jQuery('#hdLayoutBuilder').parent().clone();
    var $optionsContainer = jQuery('#options');
    $optionsContainer.empty();
    $container.appendTo($optionsContainer);
    $container.css('margin-left', 0);

    window.workFrame = new WorkFrame();
    window.workOverlay = new WorkOverlay();

    jQuery('.draggable-item').draggable({
        drag: function(event, ui) {
            console.log(workOverlay.eventToPosition(event));
        }
    });
    jQuery('#layoutbuilder-droppable').droppable({
        accept: ".draggable-item",
        drop: function(event, ui) {
            console.log("Dropped: " + event.pageX + " - " + event.pageY);
        },
        over: function(event, ui) {
            console.log("Over: " + event.pageX + " - " + event.pageY);
        }
    });
});