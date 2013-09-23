<?php
/**
 * Zo2 Framework (http://zo2framework.org)
 *
 * @link         http://github.com/aploss/zo2
 * @package      Zo2
 * @author       Hiepvu
 * @copyright    Copyright ( c ) 2008 - 2013 APL Solutions
 * @license      http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */
//no direct accees
defined('_JEXEC') or die ('resticted aceess');

Zo2Framework::import2('core.Zo2shortcode');

class Code extends ZO2Shortcode
{
    // set short code tag
    protected $tagname = 'code';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */
    protected function body()
    {

        // initializing variables for short code
        extract(shortcode_atts(array(
                'languages' => '',
                'firstline' => '1',
                'highlight' => '',
            ),
            $this->attrs
        ));

        $highlight = (!empty($highlight)) ? 'highlight: ' . $highlight . ';' : '';

        $this->loadScripts();

        return '<pre class="brush: ' . $languages . '; first-line:' . $firstline . '; ' . $highlight . '">' . htmlentities($this->content) . '</pre>';

    }

    /**
     * Write output scripts for SyntaxHighlighter
     */
    public function loadScripts()
    {

        static $bool = false;
        $url = JUri::root() . ZO2_ADMIN_PLUGIN_REL . '/addons/syntaxhighlighter/';
        if (!$bool) {

            // Script
            Zo2Framework::addJsScript($url . "scripts/shCore.js");
            Zo2Framework::addJsScript($url . "scripts/shAutoloader.js");
            Zo2Framework::addCssStylesheet($url . "styles/shCore.css");
            Zo2Framework::addCssStylesheet($url . "styles/shThemeDefault.css");

            //params
            $config = "";
            $config .= "SyntaxHighlighter.config.stripBrs = false;";
            $config .= "SyntaxHighlighter.config.tagName = 'pre';";
            $config .= "SyntaxHighlighter.defaults['auto-links'] = false;";
            $config .= "SyntaxHighlighter.defaults['first-line'] = 1;";
            $config .= "SyntaxHighlighter.defaults['gutter'] = true;";
            $config .= "SyntaxHighlighter.defaults['class-name'] = null;";
//            $config .= "SyntaxHighlighter.defaults['collapse'] = true;";
            $config .= "SyntaxHighlighter.defaults['toolbar'] = true;";
            $config .= "SyntaxHighlighter.defaults['smart-tabs'] = false;";
            $config .= "SyntaxHighlighter.defaults['tab-size'] = 4;";

            $base = JURI::base();

            $js = <<<EOF
            jQuery(window).ready(function(){
                var base = '$base';
                function path(){
                  var args = arguments,result = [];
                  for(var i = 0; i < args.length; i++){
                    result.push(args[i].replace('@', [base,'plugins/system/zo2/addons/syntaxhighlighter/scripts/'].join('')));
                  }
                  return result;
                };

                SyntaxHighlighter.autoloader.apply(null, path(
                  'applescript            @shBrushAppleScript.js',
                  'actionscript3 as3      @shBrushAS3.js',
                  'bash shell             @shBrushBash.js',
                  'coldfusion cf          @shBrushColdFusion.js',
                  'cpp c                  @shBrushCpp.js',
                  'c# c-sharp csharp      @shBrushCSharp.js',
                  'css                    @shBrushCss.js',
                  'delphi pascal          @shBrushDelphi.js',
                  'diff patch pas         @shBrushDiff.js',
                  'erl erlang             @shBrushErlang.js',
                  'groovy                 @shBrushGroovy.js',
                  'java                   @shBrushJava.js',
                  'jfx javafx             @shBrushJavaFX.js',
                  'js jscript javascript  @shBrushJScript.js',
                  'perl pl                @shBrushPerl.js',
                  'php                    @shBrushPhp.js',
                  'text plain             @shBrushPlain.js',
                  'py python              @shBrushPython.js',
                  'ruby rails ror rb      @shBrushRuby.js',
                  'sass scss              @shBrushSass.js',
                  'scala                  @shBrushScala.js',
                  'sql                    @shBrushSql.js',
                  'vb vbnet               @shBrushVb.js',
                  'xml xhtml xslt html    @shBrushXml.js'
                ));

                $config;
                SyntaxHighlighter.all();
            });

EOF;

            Zo2Framework::addScriptDeclaration($js);
            $bool = true;
        }
    }

}



