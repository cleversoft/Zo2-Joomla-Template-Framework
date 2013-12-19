<script type="text/javascript">jQuery("#gototop").click(function(){jQuery("body, html").animate({scrollTop: 0}); return false;});var scrollDiv = document.createElement("div");
            jQuery(window).scroll(function () {
                if (jQuery(this).scrollTop() != 0) {
                    jQuery("#gototop").fadeIn();
                } else {
                    jQuery("#gototop").fadeOut();
                }
            });
</script>