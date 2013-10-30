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

(function(window, document, Socialite, undefined)
{

    Socialite.network('reddit');

    Socialite.widget('reddit', 'share', {
        process: null,
        init: function(instance) {
            Socialite.processInstance(instance);

            var url = instance.el.getAttribute('data-url') || location.href;
            var title = instance.el.getAttribute('data-title') || document.title;
            var countLayout = instance.el.getAttribute('data-count') || 'http://www.reddit.com/buttonlite.js?i=2&';
            countLayout += 'styled=off&url='+ url +'&title=' + title +'&newwindow=1';
            var el = document.createElement('script');
            el.setAttribute('type', 'text/javascript');
            el.setAttribute('src', countLayout);
            Socialite.copyDataAttributes(instance.el, el);
            instance.el.appendChild(el);
            //console.log(instance.el);

            Socialite.activateInstance(instance);

            if (Socialite.networkReady('reddit')) {
                Socialite.reloadNetwork('reddit');
            }

        },
        activate: function (instance) { }
    });

})(window, window.document, window.Socialite);
