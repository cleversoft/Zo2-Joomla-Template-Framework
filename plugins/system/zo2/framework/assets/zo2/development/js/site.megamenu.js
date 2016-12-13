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

        $('.dropdown-toggle').closest('li').on('click',function(e){
            if($(this).hasClass('open') && $(this).children('a.dropdown-toggle').eq(0).attr('href') && $(this).children('a.dropdown-toggle').eq(0).attr('href') != '#'){
                if(e.target !== e.currentTarget) {
                    e.preventDefault();
                    e.stopPropagation();
                    return;
                }
            }
        });

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

        //add mobile menu class to body
        var $body = $('body');
        $body.append('<div id="nm-page-overlay" class="nm-page-overlay"></div>');
        $('#nm-mobile-menu-button').on('click',function(){
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
                addCaretToHeadingMenu($('.zo2-megamenu'),hover_type);
                $parent.find('ul > li > div.menu-child').each(function(){
                    $(this).removeAttr('style');
                });
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
            var $menuheading = $parent.find('li.heading-submenu');
            if (window.clicked) return;
            if ($menuheading.length > 0) {
                $menuheading.each(function(el){
                    $(this).addClass('dropdown-submenu');
                    $(this).children('a').append('<b class="caret"></b>');
                    var $ulelement = $(this).siblings();
                    if ($ulelement.length > 0) {
                        var $ul = $('<ul class="dropdown-menu"></ul>').append($ulelement);
                        $(this).append($ul);
                    }
                    $(this).children('a').on(hover_type,function(e){
                        e.stopPropagation();
                        if(e.target !== e.currentTarget) return;
                        var seft = $(this);
                        $('.heading-submenu.open').not(seft.closest('.heading-submenu')).each(function(){
                            var $thisone = $(this);
                            $thisone.children('ul.dropdown-menu').toggle('slow');
                            $thisone.toggleClass('open');
                        });
                        seft.next('ul.dropdown-menu').toggle('slow');
                        seft.closest('.heading-submenu').toggleClass('open');

                    });

                })
            }
            window.clicked = true;
        }

        ///
        //function submenuOut(el,timeout,hover_type){
        //    $(el).find('ul.dropdown-menu').fadeOut(timeout);
        //}
        //
        /////
        //function submenuIn(el,timeout,hover_type){
        //    $(el).find('ul.dropdown-menu').fadeIn(timeout);
        //}
        // for first li tag
        function redirect() {
            $('.dropdown-toggle').on('click',function(e){
                if($(this).parent().hasClass('open') && this.href && this.href != '#'){
                    if(e.target !== e.currentTarget) return;
                    $(this).next().toggle('fast');
                    window.location.href = this.href;
                    e.preventDefault();
                } else {
                    e.stopPropagation();
                    e.preventDefault();
                    if(e.target !== e.currentTarget) return;
                    $('.dropdown.mega.open').not($(this).closest('li')).each(function(){
                        var $thisone = $(this);
                        $thisone.children('div.dropdown-menu').toggle('slow');
                        $thisone.toggleClass('open');
                    });
                    $(this).next().toggle('slow');
                    $(this).closest('li').toggleClass('open');
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

        /** BEGIN: off canvas menu **/
        var showOffCanvasMenu = function () {
            var $offcanvas = $('.offcanvas');
            var $body = $('body');
            var $wrapper = $('.zo2-wrapper');

            $body.addClass('overflow-hidden');
            $wrapper.addClass('offcanvas-push');
            var $overlay = $('<div />').addClass('offcanvas-overlay').appendTo('body');
            $overlay.css({
                top:0,
                right:0,
                bottom:0
            }).fadeIn();
            $overlay.click(function() {
                $body.removeClass('overflow-hidden');
                $wrapper.removeClass('offcanvas-push');
                $offcanvas.removeClass('active');
                $('.offcanvas-overlay').remove();
            });
        };
        var hideOffCanvasMenu = function () {
            var $body = $('body');
            var $wrapper = $('.zo2-wrapper');
            var $offcanvas = $('.offcanvas');

            $body.removeClass('overflow-hidden');
            $wrapper.removeClass('offcanvas-push');
            $offcanvas.removeClass('active');
            $('.offcanvas-overlay').remove();
        };
        $('[data-toggle=offcanvas]').click(function() {
            var $offcanvas = $('.offcanvas');
            $offcanvas.toggleClass('active');
            if ($offcanvas.hasClass('active')) {
                showOffCanvasMenu();
            }
            else {
                hideOffCanvasMenu();
            }
        });

        $(document).mouseup(function (e) {
            var container = $(".offcanvas");
            if (!container.is(e.target) // if the target of the click isn't the container...
                && container.has(e.target).length === 0) {// ... nor a descendant of the container
                hideOffCanvasMenu();
            }
        });

        $('body').on('click', '.sidebar-nav a', function() {
            if (!$(this).hasClass('nav-oc-toggle')) hideOffCanvasMenu();
        });

        $('body').on('click', '.sidebar-close', function() {
            hideOffCanvasMenu();
        });

        // new off canvas submenu
        $('body').on('click', '.nav-oc-toggle', function() {
            var $this = $(this);
            var $parent = $this.closest('.nav-parent');

            if ($parent.find('> .submenu').hasClass('in')) $this.removeClass('icon-caret-up').addClass('icon-caret-down');
            else $this.removeClass('icon-caret-down').addClass('icon-caret-up');
        });
        /** END: off canvas menu **/

    });
}(jQuery);