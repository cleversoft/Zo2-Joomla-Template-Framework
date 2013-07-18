jQuery(function($){
    //var $container = jQuery('#hdLayoutBuilder').parent().clone();
    //var $optionsContainer = jQuery('#options');
    //$optionsContainer.empty();
    //$container.appendTo($optionsContainer);
    //$container.css('margin-left', 0);

    $(window).bind('load', function(){
        // insert tab
        var $tabsContainer = $('#myTabTabs');
        var $tabContent = $('#myTabContent');
        var $tab = $('<li class=""><a href="#layoutbuilder-container" data-toggle="tab">Layout Builder</a></li>');
        $tab.appendTo($tabsContainer);

        var $layoutBuilder = $('#layoutbuilder-container');
        var $layoutContainer = jQuery('#layoutbuilder-container').closest('.accordion-group');
        $layoutBuilder.addClass('tab-pane').appendTo($tabContent);
        jQuery('#hfLayoutName').appendTo($layoutBuilder);
        $layoutContainer.remove();

        $('#myTabTabs li').eq(3).one('click', function(){
            // wait a bit to init layoutbuilder
            setTimeout(function(){
                console.log('here');
                window.workSpace = new WorkSpace();

                workSpace.getLayoutHtml('homepage', function(layoutHtml){
                    workSpace.setBodyHtmlContent(layoutHtml);
                    workSpace.set('components', generateComponentList());
                    workSpace.generateComponentList();

                    jQuery('#workspace-tabs').tabs();
                });
            }, 500);
        });
    });

    $('#btSaveLayout').on('click', function(){
        workSpace.saveLayout();
        return false;
    });
});

// TODO: Thêm các thể loại component khác
var generateComponentList = function() {
    var componentList = new ComponentList();
    componentList.add(new Component({id: 'header', icon: 'heading.png', name: 'Header', html: '<h1 data-zo2selectable="true">Header</h1>'}));
    componentList.add(new Component({id: 'link', name: 'Link', html: '<a data-zo2selectable="true" href="#">Link</a>'}));
    componentList.add(new Component({id: 'paragraph', icon: 'paragraph.png', name: 'Paragraph', html: '<p data-zo2selectable="true">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>'}));
    componentList.add(new Component({id: 'unorderedlist', name: 'Unordered List', html: '<ul data-zo2selectable="true"><li>Item 1</li><li>Item 2</li></ul>'}));
    componentList.add(new Component({id: 'orderedlist', name: 'Ordered List', html: '<ol data-zo2selectable="true"><li>Item 1</li><li>Item 2</li></ol>'}));
    componentList.add(new Component({id: 'linkbutton', icon: 'button.png', name: 'Link Button', html: '<a data-zo2selectable="true" class="btn">Header</a>'}));
    componentList.add(new Component({id: 'toparticle', name: 'Top Article', html: '<div class="" data-zo2selectable="true" data-zo2componenttype="data-component" data-zo2componentid="toparticle"></div>'}));
    return componentList;
};