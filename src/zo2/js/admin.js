jQuery(function($){
    $(window).bind('load', function(){
        // insert tab
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

        $('#myTabTabs li').eq(3).one('click', function(){
            // wait a bit to init layoutbuilder
            /*
            setTimeout(function(){
                window.workSpace = new WorkSpace();

                workSpace.getLayoutHtml($('#hfLayoutName').val(), function(layoutHtml){
                    workSpace.setBodyHtmlContent(layoutHtml);
                    generateComponentList(function(componentList) {
                        workSpace.set('components', componentList);
                        workSpace.generateComponentList();

                        generateLayoutsList();

                        //jQuery('#workspace-tabs').tabs();
                    });
                });
            }, 500);
            */
        });
    });

    $('#btDuplicateLayout').on('click', function() {
        var $layout = $('#hfLayoutName');
        var currentLayoutName = $layout.val();
        var layoutname = prompt('Choose layout name', currentLayoutName);

        if (layoutname !== null && layoutname !== currentLayoutName) {
            $('#hfLayoutName').val(layoutname);
            $('#selectLayouts option[selected]').removeAttr('selected');
            $('<option />').attr('value', layoutname).text(layoutname).attr('selected', 'selected').appendTo('#selectLayouts');
            $("#selectLayouts").trigger("liszt:updated");
            workSpace.saveLayout();
        }

        return false;
    });

    $('#btLoadLayout').on('click', function() {
        $('#hfLayoutName').val($("#selectLayouts").val());
        workSpace.getLayoutHtml($('#hfLayoutName').val(), function(layoutHtml){
            workSpace.setBodyHtmlContent(layoutHtml);
        });
        return false;
    });
});

// TODO: Thêm các thể loại component khác
var generateComponentList = function(completeCallback) {
    var componentList = new ComponentList();
    componentList.add(new Component({id: 'header', icon: 'heading.png', name: 'Header', html: '<h1 data-zo2selectable="true">Header</h1>'}));
    componentList.add(new Component({id: 'link', name: 'Link', html: '<a data-zo2selectable="true" href="#">Link</a>'}));
    componentList.add(new Component({id: 'paragraph', icon: 'paragraph.png', name: 'Paragraph', html: '<p data-zo2selectable="true">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>'}));
    componentList.add(new Component({id: 'unorderedlist', name: 'Unordered List', html: '<ul data-zo2selectable="true"><li>Item 1</li><li>Item 2</li></ul>'}));
    componentList.add(new Component({id: 'orderedlist', name: 'Ordered List', html: '<ol data-zo2selectable="true"><li>Item 1</li><li>Item 2</li></ol>'}));
    componentList.add(new Component({id: 'linkbutton', icon: 'button.png', name: 'Link Button', html: '<a data-zo2selectable="true" class="btn">Link button</a>'}));
    componentList.add(new Component({id: 'grid', icon: null, name: 'Grid', html: '<div data-zo2selectable="true" class="container"><div class="row"><div class="span4" data-zo2selectable="true"></div><div class="span4" data-zo2selectable="true"></div><div class="span4" data-zo2selectable="true"></div></div></div>'}));
    //componentList.add(new Component({id: 'toparticle', name: 'Top Article', html: '<div class="" data-zo2selectable="true" data-zo2componenttype="data-component" data-zo2componentid="toparticle"></div>'}));

    jQuery.getJSON('index.php?zo2controller=getComponents&template=' + jQuery('#hfTemplateName').val(), function(data) {
        if (data && data.length > 0) {
            for (var i = 0, total = data.length; i < total; i++) {
                var item = data[i];
                var c = new Component({
                    id: item.id,
                    name: item.name,
                    attributes: item.attributes,
                    icon: item.icon,
                    html: item.html
                });
                componentList.add(c);
            }
        }

        if (typeof completeCallback == 'function') completeCallback(componentList);
    });
};

var generateLayoutsList = function() {
    //jQuery('<select id="selectLayoutList"></select>').insertAfter('#btSaveLayout');
    jQuery.getJSON('index.php?zo2controller=getLayouts&template=' + jQuery('#hfTemplateName').val(), function(data) {
        if (data && data.length > 0) {
            for (var i = 0, total = data.length; i < total; i++) {
                jQuery('<option />').attr('value', data[i]).text(data[i]).appendTo('#selectLayouts');
            }

            jQuery("#selectLayouts").trigger("liszt:updated");
        }
    });
};