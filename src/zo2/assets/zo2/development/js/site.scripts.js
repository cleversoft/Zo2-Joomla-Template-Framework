function set_presets(style_number) {
    var presetjson = '[{"name":"default","default":false,"css":"","less":"","thumbnail":"/assets/zo2/images/presets/default.jpg","variables":{"background":"","header":"","header_top":"","link":"","link_hover":"","text":"","bottom1":"","bottom2":"","footer":""}},{"name":"black","default":true,"css":"presets/black","less":"presets/black","thumbnail":"/assets/zo2/images/presets/black.jpg","variables":{"background":"#dedede","header":"#cfcfcf","header_top":"","link":"#212121","link_hover":"#5eaf28","text":"#ffffff","bottom1":"","bottom2":"","footer":""}},{"name":"blue","default":false,"css":"presets/blue","less":"presets/blue","thumbnail":"/assets/zo2/images/presets/blue.jpg","variables":{"background":"#3288c7","header":"#95c5e8","header_top":"","link":"#184587","link_hover":"#5eaf28","text":"#fff","bottom1":"","bottom2":"","footer":""}},{"name":"orange","default":false,"css":"presets/orange","less":"presets/orange","thumbnail":"/assets/zo2/images/presets/orange.jpg","variables":{"background":"#ffffff","header":"#ecf0f1","header_top":"#ecf0f1","link":"#d35400","link_hover":"#e67e22","text":"#4d4d62","bottom1":"#2c3e50","bottom2":"#2c3e50","footer":"#edeff1"}}]';
    var presets = JSON.parse(presetjson);

    jQuery('body').css({'background-color': presets[style_number].variables.background});
    jQuery('#zo2-header').css({'background-color': presets[style_number].variables.header});
    jQuery('#zo2-header-top').css({'background-color': presets[style_number].variables.header_top});
    jQuery('body').css({'color': presets[style_number].variables.text});
    jQuery('a').css({'color': presets[style_number].variables.link});

    jQuery("a").mouseenter(function() {
        jQuery(this).css({'color': presets[style_number].variables.link_hover});
    }).mouseleave(function() {
        jQuery(this).css({'color': presets[style_number].variables.link});
    });

    jQuery('#zo2-bottom1').css({'background-color': presets[style_number].variables.bottom1});
    jQuery('#zo2-bottom2').css({'background-color': presets[style_number].variables.bottom2});
    jQuery('#zo2-footer').css({'background-color': presets[style_number].variables.footer});
}

jQuery(document).ready(function() {
    if (jQuery().colorbox) {
        /* Colorbox */
        jQuery('a.colorbox').colorbox();
    }
    /* Default active tab for shortcode tabs*/
    jQuery('ul.nav-tabs.shortcode a:first').tab('show'); // Select first tab

    jQuery("#zo2-header").sticky({topSpacing:0});

    //style switcher
    if(jQuery('body').hasClass('boxed')) {
        jQuery('#boxed-layout').addClass('selected');
    }else {
        jQuery('#fullwidth-layout').addClass('selected');
    }

    jQuery(".style-switcher-icon").click(function() {
        if(jQuery('#ss_position').val() == 'hide') {
            jQuery('#style-switcher').animate({'left': '0px'}, 600);
            jQuery('#ss_position').val('show');
        } else {
            jQuery('#style-switcher').animate({'left': '-230px'}, 600);
            jQuery('#ss_position').val('hide');
        }
    });

    jQuery(document).mouseup(function (e) {
        var container = jQuery("#style-switcher");
        if (!container.is(e.target) // if the target of the click isn't the container...
            && container.has(e.target).length === 0) { // ... nor a descendant of the container

            container.animate({'left': '-230px'}, 600);
        }
    });

    jQuery('.layout-select li').click(function() {
        jQuery('.layout-select li').removeClass('selected');
        jQuery(this).addClass('selected');
        var color = jQuery('.color-select li.selected a').attr('data-color');
        if(jQuery(this).attr('id') == 'boxed-layout') {
            jQuery('body').addClass('boxed');
            jQuery('body .wrapper').addClass('boxed').addClass('container');
        } else {
            jQuery('body').removeClass('boxed');
            jQuery('body .wrapper').removeClass('boxed').removeClass('container');
        }
    });

    jQuery('.color-select li').click(function() {
        jQuery('.color-select li').removeClass('selected');
        jQuery(this).addClass('selected');
        set_presets(jQuery(this).find('a').attr('data-color'));
    });

});
