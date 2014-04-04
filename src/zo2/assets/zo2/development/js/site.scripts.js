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
            jQuery('#style-switcher').css('left' ,'0px');
            jQuery('#ss_position').val('show');
        } else {
            jQuery('#style-switcher').css('left' ,'-230px');
            jQuery('#ss_position').val('hide');
        }
    });

    jQuery(document).mouseup(function (e) {
        var container = jQuery("#style-switcher");
        if (!container.is(e.target) // if the target of the click isn't the container...
            && container.has(e.target).length === 0) { // ... nor a descendant of the container

            container.css('left' ,'-230px');
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
    })
});