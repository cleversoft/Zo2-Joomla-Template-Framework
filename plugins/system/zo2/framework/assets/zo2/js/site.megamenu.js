/**
 * Zo2 Framework (http://zo2framework.org)
 *
 * @link     http://www.zootemplate.com/zo2
 * @package  Zo2
 * @author   Hiepvu
 * @copyright  Copyright ( c ) 2008 - 2013 APL Solutions
 * @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */

!function ($) {
    $(document).ready(function ($) {
        // when clicking on menu
        redirect();
        var duration = 0;
        var $parent = $('.zo2-megamenu');
        window.clicked = false;
        var hover_type = $parent.data('hover');
        if ($parent.data('duration')) {
            duration = $parent.data('duration');
        }
        var w = $(window).width();
        eventType(w);
        function eventType(w) {
            if(w < 768) {
                $parent.find('li').unbind('hover');
            } else {
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
            }
         }

        //add mobile menu class to body
        var $body = $('body');
        $body.append('<div id="nm-page-overlay" class="nm-page-overlay"></div>');
        $('#nm-mobile-menu-button').on('click',function(){
            var w = $(window).width();
            eventType(w);
            if($body.hasClass('mobile-menu-open')){
                $body.removeClass('mobile-menu-open');
                $('#nm-page-overlay').removeClass('show');
                $('.navbar-collapse').addClass('collapse');
            }else{
                $body.addClass('mobile-menu-open');
                $parent.find('li>a').on('click',function(e){
                    if(e.target !== e.currentTarget) {
                        if(e.target.className == 'caret') {
                            $(this).next('.menu-child').toggle(300);
                            $(this).closest('li').toggleClass('open');
                            return false;
                        }
                    }
                    window.location.href = this.href;
                    e.preventDefault();
                    e.stopPropagation();
                });
                $('#nm-page-overlay').addClass('show');
                $('#zo2-mega-menu nav.zo2-menu').attr('id','mn-menu-canvas');
                $('#nm-page-overlay').addClass('show');
                $('.navbar-collapse').removeClass('collapse').addClass('nm-mobile-menu-content');
                addCaretToHeadingMenu($('.zo2-megamenu'),hover_type);
            }
            $('.mobile-menu-open #nm-page-overlay').on('click',function(){
                $body.removeClass('mobile-menu-open');
                $(this).removeClass('show');
                $('.navbar-collapse').addClass('collapse');
            });
        });

        //add caret to menu heading
        function addCaretToHeadingMenu($parent,hover_type) {

            hover_type = 'click';
            var $megagroup = $parent.find('li.mega-group');
            if (window.clicked) return;
            if ($megagroup.length > 0) {
                $megagroup.each(function(el){
                    $(this).addClass('dropdown-submenu');
                    $(this).children('a').append('<b class="caret"></b>');
                })
            }
            window.clicked = true;
        }

        function redirect(){
            $('.dropdown-toggle').on('click',function(e){
                if($(this).parent().hasClass('open') && this.href && this.href != '#'){
                    if(e.target !== e.currentTarget) return;
                    window.location.href = this.href;
                    e.preventDefault();
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
                    $this.removeClass('open hovering')
                }, 100));
        }

        /**  reset menu **/
        $(window).resize(function(e) {
            var w = $(window).width();
            eventType(w);
            if(w >= 768) {
                $('#zo2-mega-menu nav.zo2-menu').removeAttr('id');
                $('body').removeClass('mobile-menu-open');
                $('#nm-page-overlay').removeClass('show');
                $parent.find('li').removeClass('open').find('.menu-child').css('display','');
                $('.nm-mobile-menu-content').addClass('collapse');
            };
        });

    });
}(jQuery);
