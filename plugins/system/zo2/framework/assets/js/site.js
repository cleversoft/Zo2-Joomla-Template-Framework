(function (w, z, $) {
    $(w.document).ready(function () {
        $("#zo2-go-to-top").hide();
        $(function () {
            $(w).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('#zo2-go-to-top').fadeIn();
                } else {
                    $('#zo2-go-to-top').fadeOut();
                }
            });
            $('#zo2-go-to-top').click(function () {
                $('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
        });
    });
})(window, zo2, jquery);
