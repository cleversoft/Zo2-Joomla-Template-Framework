jQuery(document).ready(function() {
    if (typeof (zo2) == 'undefined') {
        zo2 = {
            settings: {
                token: null
            },
            jQuery: window.jQuery,
            extend: function(obj) {
                this.jQuery.extend(this, obj);
            }
        }
    }
    ;
    /* Ajax extension */
    zo2.extend({
        ajax: {
            settings: {
                url: "index.php",
                type: "POST",
                data: {
                    'zo2Ajax': 1
                }
            },
            init: function() {
                jQuery(document).find('*[data-zo2ajax]').each(function() {
                    var rawData = zo2.jQuery(this).data();
                    var onEvent = rawData.zo2ajax.on;
                    zo2.jQuery(this).on(onEvent, function(e) {

                        e.preventDefault();
                        var requestData = rawData;
                        delete requestData['zo2ajax'];
                        zo2.ajax.execute(this, requestData);

                    });
                })
            },
            execute: function(element, data) {
                /* Do get form values */
                var formData = new Object();
                if (zo2.jQuery(element).is('form')) {
                    var arrayData = zo2.jQuery(element).serializeArray();
                    for (var key in arrayData) {
                        formData[arrayData[key].name] = arrayData[key].value;
                    }
                }
                /* Copy default ajax settings */
                var ajaxSettings = zo2.ajax.settings;
                /* Merge ajax data */
                var ajaxData = zo2.jQuery.extend(zo2.settings, zo2.ajax.settings.data, data, formData);
                /* Update ajax data */
                ajaxSettings.data = ajaxData;
                zo2.jQuery.ajax(ajaxSettings)
                        .done(function(data) {
                            var arrayData = jQuery.parseJSON(data);
                            jQuery.each(arrayData, function(key, value) {
                                if (value.hasOwnProperty('func')) {
                                    if (value.hasOwnProperty('args')) {
                                        /* @todo Improve allow passing multi args */
                                        zo2.core.executeByString(value.func, window, value.args);
                                    } else {
                                        zo2.core.executeByString(value.func, window);
                                    }

                                }
                            })

                        })
                        .fail(function() {
                            e.preventDefault();
                        })
                        .always(function() {

                        })
            }
        },
        core: {
            executeByString: function(functionName, context /*, args */) {
                var args = Array.prototype.slice.call(arguments, 2);
                var namespaces = functionName.split(".");
                var func = namespaces.pop();
                for (var i = 0; i < namespaces.length; i++) {
                    context = context[namespaces[i]];
                }
                return context[func].apply(context, args);
            },
            test: function(arg1, arg2) {
            }
        },
        document: {
            message: function(args) {
                zo2.jQuery('#zo2messages')
                        .html('<div class="alert alert-' + args.type + ' alert-dismissable "><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + args.message + '</div>')
                        .css({opacity: 0.25})
                        .animate({
                            opacity: 1
                        }, 2000, function() {
                            zo2.jQuery('#zo2messages').animate({
                                opacity: 0
                            }, 4000)
                        })
            },
            effect: {
                showAndHide: function(element) {

                }
            },
            redirect: function(url) {
                window.location.href = url;
            }
        }
    })
    zo2.ajax.init();
})