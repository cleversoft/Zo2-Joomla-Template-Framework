jQuery(function($$){
    var $container = jQuery('#hdLayoutBuilder').parent().clone();
    var $optionsContainer = jQuery('#options');
    $optionsContainer.empty();
    $container.appendTo($optionsContainer);
    $container.css('margin-left', 0);

    $$(window).bind('load', function(){
        $$('#myTabTabs li').eq(1).one('click', function(){
            setTimeout(function(){
                var workSpace = new WorkSpace();

                var layoutHtml = $$('#jsTemplate').html();
                workSpace.setBodyHtmlContent(layoutHtml);
            }, 500);
        });
    });
});