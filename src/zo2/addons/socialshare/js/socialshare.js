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
            buttons: null,
            display_style: 'normal', // normal or floating
            floating_position: 'float_left', // float_left or float_right
            box_top: 200,
            box_left: 200,
            box_right: 300,
            enablePopup: false,
            popupParams: {
                sClose: 10,
                dPopup: 1,
                sPopup: 3, // Time for showing popup window
                domain: ''
            }
        }, options);

        var $links = {
            facebook: 'http://www.facebook.com/sharer.php?u={URL}&amp;title={TITLE}',
            twitter: 'http://twitter.com/share?text={TITLE}&amp;url={URL}',
            google: 'https://plus.google.com/share?url={URL}',
            linkedin: 'http://www.linkedin.com/shareArticle?mini=true&amp;url={URL}&amp;title={TITLE}'
        };


        return this.each(function () {

            var count = 0;
            var counter = '';
            var $this = this;
            var $container = $(this);

            if ($.isArray($config.buttons)) {

                if ($config.display_style == 'normal') {
                    $container.addClass('horizontal');
                }

                $.each($config.buttons, function (key, value) {
                    var $button = getHtmlButton(value);
                    if ($button != null) {
                        $container.append($button);
                    }
                });

                if ($config.display_style == 'floating') {

                    $(window).load(function () {
                        scrollBox();
                    });

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
                var $x = 0;
                var $y = $config.box_top - $top_scrolled;
                var $position = '';
                var $scrollY = $(window).scrollTop();

                if ($config.floating_position == 'float_left') {

                    $x = parseInt($main_box.offset().left) - $config.box_left;

                } else if ($config.floating_position == 'float_right') {

                    $x = parseInt($main_box.width()) + parseInt($config.box_right);

                }
                if ($social_box.length > 0) {

                    if ($scrollY > $y) {
                        $social_box.stop().attr('style', 'position: fixed; z-index: 9999; top: ' + $top_scrolled + 'px; left: ' + $x + 'px');
                    } else if ($scrollY < $y) {
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
                var $params = type.params;
                var $url = getUrl(type);

                switch (type.name) {

                    case 'facebook':

                        var $fblayout = type.button_design;
                        if ($config.display_style == 'floating') {
                            $fblayout = 'box_count';
                        }

                        $html += '<div id="fb-root"></div>' +
                            '<a href="' + $url + '" class="socialite facebook-like" data-href="' + $url + '" data-layout="' + $fblayout + '" data-send="' + $params.fb_send + '" data-action="' + $params.fb_action + '" data-width="80" data-show-faces="false" data-font="arial" target="_blank">' +
                            '<span class="zo2-share-btn">Share on Facebook</span></a>';

                        break;
                    case 'twitter':

                        var $countLayout = type.button_design;

                        if ($config.display_style == 'normal') {
                            $countLayout = 'horizontal';
                        } else if ($config.display_style == 'floating') {
                            $countLayout = 'vertical';
                        }

                        $html += '<a href="' + $url + '" class="socialite twitter-share" data-url="' + $url + '" data-count="' + $countLayout + '" target="_blank">' +
                            '<span class="zo2-share-btn">Share on Twitter</span></a>';

                        break;
                    case 'google':

                        var $gShareAnnotation = type.button_design;

                        if ($config.display_style == 'floating') {
                            $gShareAnnotation = 'vertical-bubble';
                        }

                        $html += '<a href="' + $url + '" class="socialite googleplus-share" data-action="share" ' + (($gShareAnnotation == 'inline') ? '' : 'data-annotation="' + $gShareAnnotation + '"') + ' data-href="' + $url + '" target="_blank">' +
                            '<span class="zo2-share-btn">Share on Google+</span></a>';

                        break;
                    case 'linkedin':

                        var $linkedinCount = type.button_design;

                        if ($config.display_style == "floating") {
                            $linkedinCount = 'top';
                        }

                        $html += '<a href="' + $url + '" class="socialite linkedin-share" data-url="' + $url + '"  data-counter="' + $linkedinCount + '"  data-showZero="true" target="_blank">' +
                            '<span class="zo2-share-btn">Share on LinkedIn</span></a>';

                        break;

                }

                return $beforeHtml + $html + $afterHtml;
            }

            function getUrl(type) {

                var $params = type.params;
                var $itemUrl = $container.data('url');
                var $itemId = $container.data('id');
                var $itemTitle = $container.data('title');
                var $url = '';

                if (typeof $itemUrl != "undefined" && $itemUrl != '') {
                    $url = $links[type.name].replace('{URL}', encodeURIComponent($itemUrl)).replace('{TITLE}', encodeURIComponent((typeof($itemTitle) != "undefined") ? $itemTitle : document.title));
                } else {
                    $url = $links[type.name].replace('{URL}', encodeURIComponent(location.href)).replace('{TITLE}', encodeURIComponent(document.title));
                }

                switch (type.name) {
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