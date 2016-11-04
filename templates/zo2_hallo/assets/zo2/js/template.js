/* Here you can include your additional Javascript code */
!function ($) {
    var $body = $('body');
    $body.append('<div id="nm-page-overlay" class="nm-page-overlay"></div>');
    $('#nm-mobile-menu-button').click(function(){
        if($body.hasClass('mobile-menu-open')){
            $body.removeClass('mobile-menu-open');
            $('#nm-page-overlay').removeClass('show');
            $('.navbar-collapse').addClass('collapse');
        }else{
            $body.addClass('mobile-menu-open');
            $('#nm-page-overlay').addClass('show');
            $('#zo2-mega-menu nav.zo2-menu').attr('id','mn-menu-canvas');
            $('#nm-page-overlay').addClass('show');
            $('.navbar-collapse').removeClass('collapse').addClass('nm-mobile-menu-content');
        }
        $('.mobile-menu-open #nm-page-overlay').click(function(){
            $body.removeClass('mobile-menu-open');
            $(this).removeClass('show');
            $('.navbar-collapse').addClass('collapse');
        });
    });
}(jQuery);
