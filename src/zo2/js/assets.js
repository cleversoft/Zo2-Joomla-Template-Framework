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

!function ($) {

    var Assets = window.Assets = window.Assets || {

        ajaxs: {},
        start: function () {
            var form = this;
            $.each(this.ajaxs, function (ctrl, elements) {
                form.getElement(ctrl).trigger('change');
            });

        },
        ajax: function (name, info) {
            var ajaxs = this;
            info = $.extend({
                url: Assets.url
            }, info);

            if (!ajaxs[name]) {
                ajaxs[name] = {};
                var inst = this;
                ajaxs[name].indicator = this.getElement(name).on('change',function (e) {
                    inst.callAjax(this);
                }).after('' +
                        '<div class="progress progress-striped zo2-progress active">' +
                        '<div class="bar" style="width: 100%"></div>' +
                        '</div>').next().hide();
            }

            ajaxs[name].info = info;
            this.ajaxs[name] = ajaxs[name];
        },

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
                ZO2AdminMegamenu.megamenu(form, control, el, response);
            });
        },
        getElement: function (name) {

            var el = document.adminForm[name];
            if (!el) {
                el = document.adminForm[name + '[]'];
            }

            return $(el);
        },
        values: function (name) {
            var vals = [];

            $(name).each(function () {
                var type = this.type,
                    val = $.makeArray(((type == 'radio' || type == 'checkbox') && !this.checked) ? null : $(this).val());

                for (var i = 0, l = val.length; i < l; i++) {
                    if ($.inArray(val[i], vals) == -1) {
                        vals.push(val[i]);
                    }
                }
            });

            return vals;
        }

    };

    $(window).on('load', function () {
        setTimeout($.proxy(Assets.start, Assets), 120);
    });

}(jQuery);
