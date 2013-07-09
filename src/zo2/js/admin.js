jQuery(function($$){
    var $container = jQuery('#hdLayoutBuilder').parent().clone();
    var $optionsContainer = jQuery('#options');
    $optionsContainer.empty();
    $container.appendTo($optionsContainer);
    $container.css('margin-left', 0);

    $$(window).bind('load', function(){
        $$('#myTabTabs li').eq(1).one('click', function(){
            // wait a bit to init layoutbuilder
            setTimeout(function(){
                window.workSpace = new WorkSpace();

                var layoutHtml = $$('#jsTemplate').html();
                workSpace.setBodyHtmlContent(layoutHtml);
                workSpace.set('components', generateComponentList());
                workSpace.generateComponentList();
            }, 500);
        });
    });
});

// TODO: Thêm các thể loại component khác
var generateComponentList = function() {
    var componentList = new ComponentList();
    componentList.add(new Component({id: 'header', name: 'Header', html: '<h1>Header</h1>'}));
    componentList.add(new Component({id: 'link', name: 'Link', html: '<a href="#">Link</a>'}));
    return componentList;
};