/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      Duc Nguyen <ducntv@gmail.com>
 * @author      Hiepvu <vqhiep2010@gmail.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */

!function ($) {
    $(document).ready(function ($) {
        // when clicking on menu
        redirect();
        var duration = 0;
        var $parent = $('.zo2-megamenu');
        var hover_type = $parent.data('hover');
        if ($parent.data('duration')) {
            duration = $parent.data('duration');
        }

        if (duration && (hover_type == 'hover')) {
            var timeout = duration ? duration + 50 : 500;
            $('.nav > li, li.mega').hover(
                function(e) {
                    onMouseIn(this, timeout);
                }
                ,
                function (e) {
                    onMouseOut(this);
                }
            );
        } else if (hover_type == 'click') {

            $('.mega-nav').find('.dropdown-submenu').hover(
                function(e) {
                    onMouseIn(this, 100);
                }
                ,
                function (e) {
                    onMouseOut(this);
                }

            );

        }
        // for first li tag
        function redirect() {
            $('.dropdown-toggle').on('click',function(){
                if($(this).parent().hasClass('open') && this.href && this.href != '#'){
                    window.location.href = this.href;
                }
            });
        }
        function onMouseIn (e, timeout) {

            var $this = $(e);
            if ($this.hasClass('mega')) {
                $this.addClass ('hovering');
                clearTimeout ($this.data('hoverTime'));
                $this.data('hoverTime',
                    setTimeout(function(){$this.removeClass ('hovering')}, timeout));

                clearTimeout ($this.data('hoverTime'));
                $this.data('hoverTime',
                    setTimeout(function(){$this.addClass ('open')}, 100));
            } else {
                clearTimeout($this.data('hoverTime'));
                $this.data('hoverTime',
                    setTimeout(function () {
                        $this.addClass('open')
                    }, 100));
            }

        }

        function onMouseOut (e) {
            var $this = $(e);
            clearTimeout($this.data('hoverTime'));
            $this.data('hoverTime',
                setTimeout(function () {
                    $this.removeClass('open')
                }, 100));

        }
    });
}(jQuery);