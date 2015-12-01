jQuery(document).ready(function(){  
       jQuery('.search .icon-search').click(function(){
            jQuery('.search').addClass('mobie-search-active');
            jQuery('.search .search-form').fadeIn('300');
            jQuery('.search .search-form .inputbox').focus().css("color","#000");
        });
            jQuery('.search .search-close').click(function(){
            jQuery('.search').removeClass('mobie-search-active');
            jQuery('.search .search-form').fadeOut();
        });
        x = 0;
    jQuery(window).resize(function(){
        if (jQuery(window).width() > 768) {
            jQuery('.search .search-form ').show();
        }
        else{jQuery('.search .search-form ').hide();} 
    });
})