/* Here you can include your additional Javascript code */
!function ($) {
  var $_search = $('.icon-search .cs-font.clever-icon-search-4');
  var $_count = 0;
  $_search.click(function(){
    $_count++;
    $('.search').addClass('frmopen');
    $('.icon-search .cs-font').removeClass('clever-icon-search-4');
    $('.icon-search .cs-font').addClass('clever-icon-close');
    if($_count % 2 == 0){
      $('.search').removeClass('frmopen');
          $('.icon-search .cs-font').removeClass('clever-icon-close');
      $('.icon-search .cs-font').addClass('clever-icon-search-4');
    }
  });
}(jQuery);
