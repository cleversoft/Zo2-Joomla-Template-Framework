/**
 * Zo2 - A powerful Joomla template framework
 * @link        http://www.zootemplate.com/zo2
 * @author      ZooTemplate (http://www.zootemplate.com)
 * @copyright   CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */

!function ($) {
    $(document).ready(function ($) {
        // when clicking on menu

        var duration = 0;
        var $parent = $('.zo2-megamenu');
        var $body = $('body');
        window.clicked = false;
        if ($parent.data('duration')) {
            duration = $parent.data('duration');
        }
        var w = $(window).width();
        eventType(w);
        function eventType(w) {
            if(w < 768) {
                $parent.find('li').unbind('hover');
            } else {
                if (duration) {
                    var timeout = duration ? duration + 50 : 500;
                    $('.nav > li, li.mega').hover(
                        function(e) {
                            onMouseIn(this, timeout);
                        },
                        function (e) {
                            onMouseOut(this);
                        }
                    );
                }
            }
        }

        //add mobile menu class to menu
        $('#zo2-mega-menu').append('<div id="canvas-overlay"></div>');
        $('#open-canvas').on('click',function(){
            $body.addClass('offcanvas');
        });
        $('#close-canvas, #canvas-overlay').on('click',function(){
            $body.removeClass('offcanvas');
        });
        $('.zo2-megamenu li').find('a, span').on('click', function(e){
            e.preventDefault();
            e.stopPropagation();
            var $this = $(this),
            target = $(e.target);
            if(target.is('b')) 
            {
                var dropdownMenu = $this.next('.menu-child');
                var siblings = $this.closest('li').siblings().find('.menu-child');
                $('.zo2-megamenu').find('li').removeClass('open');
                if(dropdownMenu.is(':visible')) {
                    dropdownMenu.slideUp();
                } else {
                    siblings.slideUp();
                    dropdownMenu.slideDown();
                    $this.parent('li').addClass('open');
                }
            } else if (target.is('a')) 
            {
                var href = target.attr('href');
                if(href != '#')
                    window.location.href = href;
            }
        })
        
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

        /**  Reset menu **/
        $(window).resize(function(e) {
            var w = $(window).width();
            eventType(w);
            if(w >= 768) {
                $body.removeClass('offcanvas');
                $parent.find('li').removeClass('open').find('.menu-child').css('display','');
            };
        });

    });
}(jQuery);