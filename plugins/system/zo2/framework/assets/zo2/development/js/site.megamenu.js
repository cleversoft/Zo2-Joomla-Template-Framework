/**
 * Zo2 Framework (http://zo2framework.org)
 *
 * @link     https://github.com/cleversoft/zo2
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
            $('.dropdown-toggle').on('click',function(e){
                if($(this).parent().hasClass('open') && this.href && this.href != '#'){
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