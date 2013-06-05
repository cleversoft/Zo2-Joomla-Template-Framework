var $ = jQuery;
var $container = $('#hdLayoutBuilder').parent().clone();
var $optionsContainer = $('#options');
$optionsContainer.empty();
$container.appendTo($optionsContainer);
$container.css('margin-left', 0);

var workFrame = new WorkFrame();
var workOverlay = new WorkOverlay();
workFrame.set('droppableOverlay', workOverlay);
workOverlay.set('acceptIframe', workFrame);

jQuery(function($){
    $('.draggable-item').draggable();
    $('#layoutbuilder-droppable').droppable({ accept: ".draggable-item" });
});