jQuery(document).ready(function() {
    if (jQuery().colorbox) {
        /* Colorbox */
        jQuery('a.colorbox').colorbox();
    }
    /* Default active tab for shortcode tabs*/
    jQuery('ul.nav-tabs.shortcode a:first').tab('show'); // Select first tab

    jQuery('.zo2-megamenu .navbar-nav a').click(function(){
        var element = jQuery(this).attr('href');
        //var elements = href.split('#');
        //alert('#'+elements[elements.length -1 ]);
        jQuery('html, body').animate({
            scrollTop: jQuery(element).offset().top
        }, 800);
    });

});
