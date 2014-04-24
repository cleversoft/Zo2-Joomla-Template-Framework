<?php
$presets_json = '';
$presetPath = Zo2Framework::getTemplatePath() . '/assets/template.presets.json';
if (file_exists($presetPath)) {
    $presets_json = json_decode(file_get_contents($presetPath));
}

$backgroundsDir =  Zo2Framework::getTemplatePath(). '/assets/zo2/images/background-patterns/';
$presetDir = Zo2Framework::getTemplatePath(). '/assets/zo2/css/presets/';

?>
<div class="style-switcher" id="style-switcher" style="left: -230px;">
    <h4>Style Switcher<span class="style-switcher-icon glyphicon glyphicon-cog fa-spin"></span></h4>
    <input type="hidden" id="ss_position" value="hide" >
    <div class="switch-container">
        <h5>Layout options</h5>
        <ul class="options layout-select">
            <li class="boxed-layout" id="boxed-layout"><a class="boxed" href="#"><img src="<?php echo JUri::root() ?>/plugins/system/zo2/assets/zo2/images/page-bordered.png" alt="Boxed Layout"></a></li>
            <li class="fullwidth-layout" id="fullwidth-layout"><a class="fullwidth" href="#"><img src="<?php echo JUri::root() ?>/plugins/system/zo2/assets/zo2/images/page-fullwidth.png" alt="Full Width Layout"></a></li>
        </ul>

        <h5>Primary Color</h5>
        <ul class="options color-select">
            <?php
            foreach($presets_json  as $key => $preset ) {
                echo '<li><a href="#" data-color="'.$key.'" data-layout="'.$preset->name.'" style="background-color: '.$preset->color.';"></a></li>';
            }
            ?>
        </ul>
        <div class="background-select-wrap" style="display: none">
            <h5>Patterns (Boxed Version)</h5>
            <ul class="options background-select">
                <?php
                $bgPatterns =  glob($backgroundsDir.'/*.*');

                if(count($bgPatterns) > 0) {
                    foreach($bgPatterns as $pattern ) {
                        echo '<li><img src="'.Zo2HelperPath::toUrl($pattern).'" /></li>';
                    }
                }

                ?>
            </ul>
        </div>
    </div>
</div>
<script>
    if(typeof document.createStyleSheet === 'undefined') {
        document.createStyleSheet = (function() {
            function createStyleSheet(href) {
                if(typeof href !== 'undefined') {
                    var element = document.createElement('link');
                    element.type = 'text/css';
                    element.rel = 'stylesheet';
                    element.href = href;
                }
                else {
                    var element = document.createElement('style');
                    element.type = 'text/css';
                }

                document.getElementsByTagName('head')[0].appendChild(element);
                var sheet = document.styleSheets[document.styleSheets.length - 1];

                if(typeof sheet.addRule === 'undefined')
                    sheet.addRule = addRule;

                if(typeof sheet.removeRule === 'undefined')
                    sheet.removeRule = sheet.deleteRule;

                return sheet;
            }

            function addRule(selectorText, cssText, index) {
                if(typeof index === 'undefined')
                    index = this.cssRules.length;

                this.insertRule(selectorText + ' {' + cssText + '}', index);
            }

            return createStyleSheet;
        })();
    }

    function set_presets(style_number, style_name, presetjson) {

        var presets = JSON.parse(presetjson);

        jQuery('body').css({'background-color': presets[style_number].variables.background});
        jQuery('#zo2-header').css({'background-color': presets[style_number].variables.header});
        jQuery('#zo2-header-top').css({'background-color': presets[style_number].variables.header_top});
        jQuery('body').css({'color': presets[style_number].variables.text});
        jQuery('a').css({'color': presets[style_number].variables.link});

        jQuery("a").mouseenter(function() {
            jQuery(this).css({'color': presets[style_number].variables.link_hover});
        }).mouseleave(function() {
            jQuery(this).css({'color': presets[style_number].variables.link});
        });

        jQuery('#zo2-bottom1').css({'background-color': presets[style_number].variables.bottom1});
        jQuery('#zo2-bottom2').css({'background-color': presets[style_number].variables.bottom2});
        jQuery('#zo2-footer').css({'background-color': presets[style_number].variables.footer});
        if(jQuery('.color-select li.selected').length > 0) {
            document.getElementsByTagName('head')[0].removeChild(document.getElementsByTagName('head')[0].lastElementChild);
        }
        document.createStyleSheet('<?php echo Zo2HelperPath::toUrl($presetDir); ?>'+style_name+'.css');
    }

    jQuery(document).ready(function() {

        //style switcher
        if(jQuery('body').hasClass('boxed')) {
            jQuery('#boxed-layout').addClass('selected');
            jQuery('.background-select-wrap').show();
        }else {
            jQuery('#fullwidth-layout').addClass('selected');
        }

        jQuery(".style-switcher-icon").click(function() {
            if(jQuery('#ss_position').val() == 'hide') {
                jQuery('#style-switcher').animate({'left': '0px'}, 600);
                jQuery('#ss_position').val('show');
            } else {
                jQuery('#style-switcher').animate({'left': '-230px'}, 600);
                jQuery('#ss_position').val('hide');
            }
        });

        jQuery(document).mouseup(function (e) {
            var container = jQuery("#style-switcher");
            if (!container.is(e.target) // if the target of the click isn't the container...
                && container.has(e.target).length === 0) { // ... nor a descendant of the container

                container.animate({'left': '-230px'}, 600);
            }
        });

        jQuery('.layout-select li').click(function() {
            jQuery('.layout-select li').removeClass('selected');
            jQuery(this).addClass('selected');
            var color = jQuery('.color-select li.selected a').attr('data-color');
            if(jQuery(this).attr('id') == 'boxed-layout') {
                jQuery('body').addClass('boxed').addClass('body-boxed');
                jQuery('body .wrapper').addClass('boxed').addClass('container');
                jQuery('.background-select-wrap').fadeIn(500);
            } else {
                jQuery('body').removeClass('boxed').removeClass('body-boxed');
                jQuery('body .wrapper').removeClass('boxed').removeClass('container');
                jQuery('.background-select-wrap').fadeOut(500);
            }
        });

        jQuery('.color-select li').click(function() {

            jQuery('.color-select li').removeClass('selected');
            jQuery(this).addClass('selected');
            var presetjson = '<?php echo json_encode($presets_json);?>';
            set_presets(jQuery(this).find('a').attr('data-color'), jQuery(this).find('a').attr('data-layout'), presetjson);
        });

        jQuery('.background-select li').click(function() {

            jQuery('.background-select li').removeClass('selected');
            jQuery(this).addClass('selected');
            var background = jQuery(this).find('img').attr('src');
            jQuery('head').find(':last-child').append('<style> .body-boxed {background-image: url("'+background+'")}  </style>')
        });
    });
</script>