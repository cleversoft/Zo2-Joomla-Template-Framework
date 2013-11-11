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
        if ($('#fb-root').length <= 0) $('<div />').attr('id', 'fb-root').prepend('body');

        var generateHtmlButton = function(type, href, title, options) {
            var html = '<div class="zo2-social-box"><div class="zo2-social-inner">';

            switch (type) {
                case 'facebook':
                    html += '<a href="' + href + '" class="socialite facebook-like" data-href="' + decodeURIComponent(href) + '" data-layout="' + $fblayout + '" data-send="' + $params.fb_send + '" data-action="' + $params.fb_action + '" data-width="80" data-show-faces="false" data-font="arial" target="_blank">' +
                    '<span class="zo2-share-btn">Share on Facebook</span></a>';
                    break;
                case 'twitter':
                    html += '<a href="' + href + '" class="socialite twitter-share" data-url="' + href + '" data-count="' + $countLayout + '" target="_blank">' +
                        '<span class="zo2-share-btn">Share on Twitter</span></a>';
            }

            html += '</div></div>';
        };

        return this.each(function() {

            var $this = $(this);

            var services = $this.attr('data-zo2-services') ? $this.attr('data-zo2-services').split(' ') : [];
            var type = $this.attr('data-zo2-type') ? $this.attr('data-zo2-type') : 'normal';

            var shares = {
                facebook: '{URL}',
                twitter: 'http://twitter.com/share?text={TITLE}&amp;url={URL}',
                google: 'https://plus.google.com/share?url={URL}',
                linkedin: 'http://www.linkedin.com/shareArticle?mini=true&amp;url={URL}&amp;title={TITLE}',
                reddit: 'http://www.reddit.com/submit?url={URL}&amp;title={TITLE}',
                pinterest: 'http://www.pinterest.com/pin/create/button/?url={URL}&amp;description={TITLE}',
                tumblr: 'http://www.tumblr.com/share/link?url={URL}&name={TITLE}',
                delicious: 'https://delicious.com/save?v=5&noui&jump=close&url={URL}&title={TITLE}'
            };

            if (type == 'floating' && $this.is('body')) {
                var $container = $('<div />').appendTo($('body'));
                $container.addClass('zo2-social-wrap floating');

            }
            else {

            }
        });
    };
})(jQuery);