/*
 bindWithDelay jQuery plugin
 Author: Brian Grinstead
 MIT license: http://www.opensource.org/licenses/mit-license.php

 http://github.com/bgrins/bindWithDelay
 http://briangrinstead.com/files/bindWithDelay

 Usage:
 See http://api.jquery.com/bind/
 .bindWithDelay( eventType, [ eventData ], handler(eventObject), timeout, throttle )

 Examples:
 $("#foo").bindWithDelay("click", function(e) { }, 100);
 $(window).bindWithDelay("resize", { optional: "eventData" }, callback, 1000);
 $(window).bindWithDelay("resize", callback, 1000, true);
 */

(function($) {

    $.fn.onDelay = function( type, data, fn, timeout, throttle ) {

        if ( $.isFunction( data ) ) {
            throttle = timeout;
            timeout = fn;
            fn = data;
            data = undefined;
        }

        // Allow delayed function to be removed with fn in unbind function
        fn.guid = fn.guid || ($.guid && $.guid++);

        // Bind each separately so that each element has its own delay
        return this.each(function() {

            var wait = null;

            function cb() {
                var e = $.extend(true, { }, arguments[0]);
                var ctx = this;
                var throttler = function() {
                    wait = null;
                    fn.apply(ctx, [e]);
                };

                if (!throttle) { clearTimeout(wait); wait = null; }
                if (!wait) { wait = setTimeout(throttler, timeout); }
            }

            cb.guid = fn.guid;

            $(this).on(type, data, cb);
        });
    };

})(jQuery);

/*
 * jQuery.fontselect - A font selector for the Google Web Fonts api
 * Tom Moor, http://tommoor.com
 * Copyright (c) 2011 Tom Moor
 * MIT Licensed
 * @version 0.1
 *
 * Edited by ducntq@gmail.com for Zo2Framework
 */

(function($){

    $.fn.fontselect = function(options) {

        var __bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; };

        // default fonts
        var fonts = [
            'Open Sans',
            'Oswald',
            'Lustria',
            'Lato',
            'Roboto',
            'Roboto Slab',
            'Yanone Kaffeesatz',
            'Arvo',
            'Ubuntu',
            'Lora',
            'Raleway',
            'Merriweather',
            'Bitter',
            'Cabin',
            'Cuprum',
            'Quattrocento',
            'Quattrocento Sans',
            'Droid',
            'Vollkorn',
            'PT Mono',
            'Gravitas One'
        ];

        var settings = {
            style: 'font-select',
            placeholder: 'Select a font',
            lookahead: 2,
            api: 'http://fonts.googleapis.com/css?family='
        };

        var Fontselect = (function(){

            function Fontselect(original, o){
                this.$original = $(original);
                this.options = o;
                this.active = false;
                this.setupHtml();
                this.getVisibleFonts();
                this.bindEvents();

                var font = this.$original.val();
                if (font) {
                    this.updateSelected();
                    this.addFontLink(font);
                }
            }

            Fontselect.prototype.loadFonts = function(query, callback) {
                var url = Assets.root + 'index.php?zo2controller=getFonts&query=' + encodeURIComponent(query);

                $.getJSON(url, function(data) {
                    fonts = data;
                    if (typeof callback == 'function') callback();
                });
            };

            Fontselect.prototype.bindLi = function () {
                $('li', this.$results)
                    .click(__bind(this.selectFont, this))
                    .mouseenter(__bind(this.activateFont, this))
                    .mouseleave(__bind(this.deactivateFont, this));
            };

            Fontselect.prototype.bindEvents = function(){
                var thisObject = this;
                this.bindLi();
                $('span', this.$select).click(__bind(this.toggleDrop, this));
                this.$arrow.click(__bind(this.toggleDrop, this));

                this.$searchInput.off('keyup').onDelay('keyup', function() {
                    thisObject.loadFonts(thisObject.$searchInput.val(), function() {
                        thisObject.$results.empty();
                        thisObject.$results.append(thisObject.fontsAsHtml());
                        thisObject.bindLi();
                    });
                }, 1000);
            };

            Fontselect.prototype.toggleDrop = function(ev){

                if(this.active){
                    this.$element.removeClass('font-select-active');
                    this.$drop.hide();
                    clearInterval(this.visibleInterval);

                } else {
                    this.$element.addClass('font-select-active');
                    this.$drop.show();
                    this.$results.show();
                    this.moveToSelected();
                    this.$searchInput.focus();
                    this.visibleInterval = setInterval(__bind(this.getVisibleFonts, this), 500);
                }

                this.active = !this.active;
            };

            Fontselect.prototype.selectFont = function(){
                var font = $('li.active', this.$results).data('value');
                this.$original.val(font).change();
                this.updateSelected();
                this.toggleDrop();
            };

            Fontselect.prototype.moveToSelected = function(){

                var $li, font = this.$original.val();
                if (font && font.length > 0){
                    $li = $("li[data-value='"+ font +"']", this.$results);
                } else {
                    $li = $("li", this.$results).first();
                }
                if ($li.length > 0) this.$results.scrollTop($li.addClass('active').position().top);
            };

            Fontselect.prototype.activateFont = function(ev){
                $('li.active', this.$results).removeClass('active');
                $(ev.currentTarget).addClass('active');
            };

            Fontselect.prototype.deactivateFont = function(ev){

                $(ev.currentTarget).removeClass('active');
            };

            Fontselect.prototype.updateSelected = function(){

                var font = this.$original.val();
                $('span', this.$element).text(this.toReadable(font)).css(this.toStyle(font));
            };

            Fontselect.prototype.setupHtml = function(){

                this.$original.empty().hide();
                this.$element = $('<div>', {'class': this.options.style});
                this.$arrow = $('<div><b></b></div>');
                this.$select = $('<a><span>'+ this.options.placeholder +'</span></a>');
                this.$drop = $('<div>', {'class': 'fs-drop'}).hide();
                this.$results = $('<ul>', {'class': 'fs-results'});
                this.$searchContainer = $('<div />').addClass('fs-search').appendTo(this.$drop);
                this.$searchInput = $('<input type="text" />').addClass('fs-searchinput').appendTo(this.$searchContainer);
                this.$original.after(this.$element.append(this.$select.append(this.$arrow)).append(this.$drop));
                this.$drop.append(this.$results.append(this.fontsAsHtml()).hide());
            };

            Fontselect.prototype.fontsAsHtml = function(){

                var l = fonts.length;
                var r, s, h = '';

                for(var i=0; i<l; i++){
                    r = this.toReadable(fonts[i]);
                    s = this.toStyle(fonts[i]);
                    h += '<li data-value="'+ fonts[i] +'" style="font-family: '+s['font-family'] +'; font-weight: '+s['font-weight'] +'">'+ r +'</li>';
                }

                return h;
            };

            Fontselect.prototype.toReadable = function(font){
                return font.replace(/[\+|:]/g, ' ');
            };

            Fontselect.prototype.toStyle = function(font){
                var t = font.split(':');
                return {'font-family': this.toReadable(t[0]), 'font-weight': (t[1] || 400)};
            };

            Fontselect.prototype.getVisibleFonts = function(){

                if(this.$results.is(':hidden')) return;

                var fs = this;
                var top = this.$results.scrollTop();
                var bottom = top + this.$results.height();

                if(this.options.lookahead){
                    var li = $('li', this.$results).first().height();
                    bottom += li*this.options.lookahead;
                }

                $('li', this.$results).each(function(){

                    var ft = $(this).position().top+top;
                    var fb = ft + $(this).height();

                    if ((fb >= top) && (ft <= bottom)){
                        var font = $(this).data('value');
                        fs.addFontLink(font);
                    }

                });
            };

            Fontselect.prototype.addFontLink = function(font){

                var link = this.options.api + font;

                if ($("link[href*='" + font + "']").length === 0){
                    $('link:last').after('<link href="' + link + '" rel="stylesheet" type="text/css">');
                }
            };

            return Fontselect;
        })();

        return this.each(function(options) {
            // If options exist, lets merge them
            if (options) $.extend( settings, options );

            return new Fontselect(this, settings);
        });

    };
})(jQuery);