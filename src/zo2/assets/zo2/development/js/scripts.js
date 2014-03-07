jQuery(document).ready(function() {
    if (typeof (zo2) == 'undefined') {    
        zo2 = {
                jQuery: window.jQuery,
                extend: function(obj) {
                    this.jQuery.extend(this, obj);
                }
            }
    };
    /* Ajax extension */
    zo2.extend({
        ajax: {
            settings: {                
                url: "index.php",
                data: {
                    'zo2Ajax': 1                    
                }                
            },            
            init: function () {
                jQuery(document).find('*[data-zo2ajax]').each ( function () {
                    var rawData = zo2.jQuery(this).data();                    
                    var onEvent = rawData.zo2ajax.on;
                    zo2.jQuery(this).on (onEvent, function(e){
                        e.preventDefault();
                        var requestData = rawData;
                        delete requestData['zo2ajax'];
                        zo2.ajax.execute(this,requestData);

                    });
                })
            },
            execute: function (element, data) {
                /* Do get form values */
                var formData = new Object();
                if ( zo2.jQuery(element).is('form')) {
                    var arrayData = zo2.jQuery(element).serializeArray();
                    for ( var key in arrayData ) {
                        formData[arrayData[key].name] = arrayData[key].value;
                    }
                }                
                /* Copy default ajax settings */
                var ajaxSettings = zo2.ajax.settings;
                /* Merge ajax data */
                var ajaxData = zo2.jQuery.extend(zo2.ajax.settings.data, data, formData);
                /* Update ajax data */
                ajaxSettings.data = ajaxData;                
                zo2.jQuery.ajax(ajaxSettings);
            }
        }
    })
    zo2.ajax.init();
})