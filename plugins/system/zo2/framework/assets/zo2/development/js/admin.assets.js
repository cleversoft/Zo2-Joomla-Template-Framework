/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
 * @license     GPL v2
 */

/**
 * Admin assets
 * @param {type} w Window pointer
 * @param {type} $ jQuery pointer
 * @returns {undefined}
 */
(function (w, $) {
    var _assets = {
        /* Ajax containner */
        ajaxs: [],
        /**
         * Start trigger
         * @returns {undefined}
         */
        start: function () {
            $.each(this.ajaxs, function (ctrl, elements) {
                $('[name=' +ctrl + ']').trigger('change');
            });
        },
        /**
         * Activate progress bar
         * @param {string} name
         * @param {any} info
         * @returns {undefined}
         */
        ajax: function (name, info) {
            var _self = this;
            info = $.extend({
                url: _self.url
            }, info);

            if (!this.ajaxs[name]) {
                this.ajaxs[name] = {};
                var inst = this;
                this.ajaxs[name].indicator = this.getElement(name).on('change',function (e) {
                    inst.callAjax(this);
                }).after('' +
                        '<div class="progress progress-striped zo2-progress active">' +
                        '<div class="bar" style="width: 100%"></div>' +
                        '</div>').next().hide();
            }
            this.ajaxs[name].info = info;
        },
        /**
         * Call Ajax
         * @param {type} control
         * @returns {Boolean}
         */
        callAjax: function (control) {
            var ajaxs = this.ajaxs,
                name = control.name,
                el = ajaxs[name],
                form = this;
            if (!el) {
                el = ajaxs[name.substr(0, name.length - 2)];
            }
            if (!el) {
                return false;
            }
            var info = el.info;
            if (el.indicator.next('.chzn-container').length) {
                el.indicator.insertAfter(el.indicator.next('.chzn-container'));
            }
            el.indicator.show();
            $.get(info.url, { menutype: form.values(form.getElement(name))[0] }, function (response) {
                el.indicator.hide();
                w.ZO2AdminMegamenu.megamenu(form, control, el, response);
            });
        },
        /**
         * Get elemet by name
         * @param {string} name
         * @returns {$}
         */
        getElement: function (name) {
            var el = w.document.adminForm[name];
            if (!el) {
                el = w.document.adminForm[name + '[]'];
            }
            return $(el);
        },
        /**
         * Get array of values
         * @param {type} name
         * @returns {Array}
         */
        values: function (name) {
            var vals = [];
            $(name).each(function () {
                var type = this.type;
                var val = [((type === 'radio' || type === 'checkbox') && !this.checked) ? null : $(this).val()];
                for (var i = 0, l = val.length; i < l; i++) {
                    if ($.inArray(val[i], vals) === -1) {
                        vals.push(val[i]);
                    }
                }
            });
            return vals;
        }
    };
    
    /* Provide global */
    w.Assets = _assets;
    
    /* Init function */
    $(w).on('load', function () {
        setTimeout(function(){
            $.proxy(w.Assets.start, w.Assets);
            $('#jform_params_menu_type').trigger('change');
        }, 120);
    });

})(window, jQuery);