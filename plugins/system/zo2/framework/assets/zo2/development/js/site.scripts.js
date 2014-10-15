(function (window, zo2, $) {
    zo2.site = {
    };
})(window, zo2, zo2.jQuery);

jQuery(document).ready(function () {
    if (jQuery().colorbox) {
        /* Colorbox */
        jQuery('a.colorbox').colorbox();
    }
    /* Default active tab for shortcode tabs*/
    jQuery('ul.nav-tabs.shortcode a:first').tab('show'); // Select first tab

    jQuery('.zo2-megamenu .navbar-nav a').click(function () {
        var element = jQuery(this).attr('href');
        zo2.animate.scrollTop('html, body', element);
    });

});
