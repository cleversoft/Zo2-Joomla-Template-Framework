/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */

(function ($) {

    $.fn.Zo2Social = function () {
        var generateHtmlButton = function(type, href, title, options) {
            var html = '<div class="zo2-social-box ' + type + '"><div class="zo2-social-inner">';
            var socialHtml = '';

            switch (type) {
                case 'facebook':
                    socialHtml += '<a rel="nofollow" href="' + href + '" class="socialite facebook-like" data-href="'
                        + decodeURIComponent(href) + '" data-layout="' + (options.float ? 'box_count' : 'button_count')
                        + '" data-send="' + (options.fb_send ? 'true' : 'false') + '" data-share="' + (options.fb_send ? 'true' : 'false')
                        + '" data-action="' + options.fb_action + '" data-width="80" data-show-faces="false" data-font="arial" target="_blank">'
                        + '<span class="zo2-share-btn">Share on Facebook</span></a>';
                    break;
                case 'twitter':
                    socialHtml += '<a rel="nofollow" href="' + href + '" class="socialite twitter-share" data-url="' + href + '" data-count="' + (options.float ? 'none' : '1') + '" target="_blank">'
                        + '<span class="zo2-share-btn">Share on Twitter</span></a>';
                    break;
                case 'google':
                    socialHtml += '<a rel="nofollow" href="' + href + '" class="socialite googleplus-one" data-href="' + href + '" data-action="share" data-size="medium" data-annotation="bubble">'
                        + '<span class="zo2-share-btn">Share on Google+</span></a>';
                    break;
                case 'linkedin':
                    socialHtml += '<a rel="nofollow" href="' + href + '" class="socialite linkedin-share" data-url="' + href + '"  data-counter="' + (options.float ? 'top' : 'right') + '" target="_blank">' +
                        '<span class="zo2-share-btn">Share on LinkedIn</span></a>';
                    break;
                case 'pinterest':
                    socialHtml += '<a rel="nofollow" class="socialite pinterest-pinit" href="//www.pinterest.com/pin/create/button/?url=' + encodeURIComponent(href) + '" data-pin-do="buttonPin" '
                        + 'data-pin-config="' + (options.float ? 'top' : 'beside') + '"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" /></a>';
                    break;
                default:
                    socialHtml += '';
                    break;
            }

            html += socialHtml + '</div></div>';
            if (socialHtml.length > 0 ) return html;
            else return '';
        };

        var calculateFloatBoxPosition = function() {
            var $box = $('.zo2-social-float');
            var windowWidth = $(window).width();

            var containerWidth = 1170;

            if (windowWidth >= 992 && windowWidth < 1200) containerWidth = 970;

            var boxWidth = 90;

            var scrollTop = $(window).scrollTop();

            var left = (windowWidth - containerWidth) / 2 - boxWidth;

            if (left < 0) left = 0;

            var roof = 0;
            if ($('#zo2-header-top').length > 0) roof = Math.max(roof, $('#zo2-header-top').offset().top + $('#zo2-header-top').height());
            if ($('#zo2-header').length > 0) roof = Math.max(roof, $('#zo2-header').offset().top + $('#zo2-header').height());
            if ($('.full-width').length > 0) roof = Math.max(roof, $('.full-width').offset().top + $('.full-width').height());

            if (scrollTop <= roof + 20) {
                $box.css({
                    position: 'absolute',
                    top: roof + 20,
                    left: left
                });
            }
            else {
                $box.css({
                    position: 'fixed',
                    top: 20,
                    left: left
                });
            }
        };

        return this.each(function() {

            var $this = $(this);

            var services = $this.attr('data-social-services') ? $this.attr('data-social-services').split(' ') : [];
            var type = $this.attr('data-social-type') ? $this.attr('data-social-type') : 'normal';

            var options = {
                float: false,
                fb_send: $this.attr('data-social-fb_send') == 'true',
                fb_action: $this.attr('data-social-fb_action')
            };
            var socialHtml = '';
            if (type == 'floating' && $this.hasClass('zo2-social-float')) {
                options.float = true;
                $this.css('position', 'fixed').css('z-index', 10000).css('width', 90);
                calculateFloatBoxPosition();

                $(window).on('scroll resize', function() {
                    calculateFloatBoxPosition();
                });
            }
            for (var i = 0, total = services.length; i < total; i++) {
                socialHtml += generateHtmlButton(services[i], $this.attr('data-url'), $this.attr('data-title'), options);
            }
            $this.html(socialHtml);
            Socialite.load();
        });
    };
})(jQuery);