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

(function ($) {

    $.fn.Zo2Socialshare = function (options) {

        var $config = $.extend({

            buttons: 'facebook,twitter,linkedin,gplus',
            style: 'default', // default or floating
            box_top: 200,
            box_left: 20,
            enablePopup: false,
            popupParams: {
                sClose: 10,
                dPopup: 1,
                sPopup: 3, // Time for showing popup window
                domain: ''
            },
            socialParams: {
                facebook: {
                    fb_url: '',
                    fb_send: false,
                    fb_action: 'like'
                },
                twitter: {
                    tw_username: '',
                    tw_recommended: '',
                    tw_hashtags: ''
                },
                gplus: {

                },
                linkedin: {

                }
            }
        }, options);

        var $links = {
            facebook: 'http://www.facebook.com/sharer.php?u={URL}&amp;title={TITLE}',
            twitter: 'http://twitter.com/share?text={TITLE}&amp;url={URL}',
            gplus: 'https://plus.google.com/share?url={URL}',
            linkedin: 'http://www.linkedin.com/shareArticle?mini=true&amp;url={URL}&amp;title={TITLE}'
        };


        return this.each(function () {

            var count = 0;
            var counter = '';
            var $this = this;
            var $container = $(this);
            var $socials = $config.buttons.split(',');

            $(window).load(function () {
                scrollBox();
            });

            if ($.isArray($socials)) {

                $.each($socials, function (key, value) {
                    var $button = getHtmlButton(value);
                    if ($button != null) {
                        $container.append($button);
                    }
                });

                if ($config.style == 'floating') {


                    $(window).resize(function () {
                        scrollBox();
                    });
                    $(window).scroll(function () {
                        scrollBox();
                    });
                }

                if ($config.enablePopup) {

                    var show = $.cookie('show_modal');

                    if (show != 'true') {
                        window.setTimeout(
                            function () {
                                $('#zo2Modal').addClass('horizontal').modal('show');
                                $.cookie('show_modal', true, { expires: parseInt($config.popupParams.dPopup), path: '/'});
                            },
                            $config.popupParams.sPopup * 1000
                        )
                    }

                    if (parseInt($config.popupParams.sClose) > 0) {
                        count = $config.popupParams.sClose;
                        counter = setInterval(function () {
                            closePopup()
                        }, 1000);
                    }

                }
            }

            /*For floating*/
            function scrollBox() {

                var $main_box = $($this).closest('.container');
                var $social_box = $($this);
                var $top_scrolled = 30;
                var $x = parseInt($main_box.offset().left) - $config.box_left;
                var $y = $config.box_top - $top_scrolled;
                var $scrollY = $(window).scrollTop();

                if ($social_box.length > 0) {
                    if ($scrollY > $y) {
                        //$social_box.stop().css({position: 'fixed', top: $top_scrolled, left: $x});
                        $social_box.stop().attr('style', 'position: fixed; z-index: 9999; top: ' + $top_scrolled + 'px; left: ' + $x + 'px');
                    } else if ($scrollY < $y) {
                        // $social_box.css({position: 'absolute', top: $config.box_top, left: $x});
                        $social_box.attr('style', 'position: fixed; z-index: 9999; top: ' + $config.box_top + 'px; left: ' + $x + 'px');
                    }
                }

            }

            /*For popup*/
            function closePopup() {
                count--;
                if (count <= 0) {
                    clearInterval(counter);
                    $('#zo2Modal').modal('hide');
                    return;
                }
            }

            function getHtmlButton(type) {

                var $html = '';
                var $beforeHtml = '<div class="zo2-social-box"><div class="zo2-social-inner">';
                var $afterHtml = '</div></div>';
                var $params = $config.socialParams[type];

                var $url = getUrl(type);

                switch (type) {

                    case 'facebook':
                        var $fblayout = '';
                        if ($config.style == 'floating') {
                            $fblayout = 'box_count';
                        } else {
                            $fblayout = 'button_count';
                        }

                        $html += '<div id="fb-root"></div>' +
                            '<a href="' + $url + '" class="socialite facebook-like" data-href="' + $url + '" data-layout="' + $fblayout + '" data-send="' + $params.fb_send + '" data-action="' + $params.fb_action + '" data-width="80" data-show-faces="false" data-font="arial" target="_blank">' +
                            '<span class="zo2-share-btn">Share on Facebook</span></a>';

                        break;
                    case 'twitter':

                        var $countLayout = 'vertical';

                        if ($config.style == 'default') {
                            $countLayout = 'horizontal';
                        }

                        $html += '<a href="' + $url + '" class="socialite twitter-share" data-url="' + $url + '" data-count="' + $countLayout + '" target="_blank">' +
                            '<span class="zo2-share-btn">Share on Twitter</span></a>';

                        break;
                    case 'gplus':

                        var $gShareAnnotation = '';

                        if ($config.style == 'floating') {
                            $gShareAnnotation = 'vertical-bubble';
                        } else {
                            $gShareAnnotation = "bubble";
                        }

                        $html += '<a href="' + $url + '" class="socialite googleplus-share" data-action="share" data-annotation="' + $gShareAnnotation + '" data-href="' + $url + '" target="_blank">' +
                            '<span class="zo2-share-btn">Share on Google+</span></a>';

                        break;
                    case 'linkedin':

                        var $linkedinCount = 'right';

                        if ($config.style == "floating") {
                            $linkedinCount = 'top';
                        }

                        $html += '<a href="' + $url + '" class="socialite linkedin-share" data-url="' + $url + '"  data-counter="' + $linkedinCount + '"  data-showZero="true" target="_blank">' +
                            '<span class="zo2-share-btn">Share on LinkedIn</span></a>';

                        break;

                }

                return $beforeHtml + $html + $afterHtml;
            }

            function getUrl(type) {

                var $params = $config.socialParams[type];
                var $itemUrl = $container.data('url');
                var $itemId = $container.data('id');
                var $itemTitle = $container.data('title');
                var $url = '';

                if (typeof $itemUrl != "undefined" && $itemUrl != '') {
                    $url = $links[type].replace('{URL}', encodeURIComponent($itemUrl)).replace('{TITLE}', encodeURIComponent((typeof($itemTitle) != "undefined") ? $itemTitle : document.title));
                } else {
                    $url = $links[type].replace('{URL}', encodeURIComponent(location.href)).replace('{TITLE}', encodeURIComponent(document.title));
                }

                switch (type) {
                    case 'facebook':
                        if ($params.fb_url != '' && $config.enablePopup) {
                            $url = $params.fb_url;
                        }
                        break;
                    case 'twitter':
                        if ($params.tw_username != '') {
                            $url += '&via=' + $params.tw_username;
                        } else if ($params.tw_recommended != '') {
                            $url += '&related=' + $params.tw_recommended;
                        } else if ($params.tw_hashtags != '') {
                            $url += '&hashtags=' + $params.tw_hashtags;
                        }
                        break;
                }

                return $url;
            }

            Socialite.load();
            return this;

        });

    }

})(jQuery);