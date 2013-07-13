<?php
/**
 * Zo2 Framework (http://zo2framework.org)
 *
 * @link     http://github.com/aploss/zo2
 * @package  Zo2
 * @author   http://zo2framework.org
 * @copyright  Copyright ( c ) 2008 - 2013 APL Solutions
 * @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */

defined('_JEXEC') or die ('Resticted aceess');

jimport('joomla.event.plugin');

class plgSystemZo2 extends JPlugin
{
    function onAfterInitialise()
    {
        include_once dirname(__FILE__) . '/core/defines.php';

        $frameworkPath = JPATH_PLUGINS . '/system/zo2/core/Zo2Framework.php';
        if (file_exists($frameworkPath)) {
            require_once($frameworkPath);
            Zo2Framework::init();
            Zo2Framework::getTemplateLayouts();
            Zo2Framework::getController();

        } else {
            echo JText::_('Zo2 framework not found.');
            die;
        }
    }

    function onBeforeRender()
    {

        $app = JFactory::getApplication();
        if ($app->isAdmin()) {

            // Load Bootstrap CSS
            //JHtml::_('bootstrap.loadCss');
            Zo2Framework::loadAdminAssets();
            Zo2Framework::addCssStylesheet(ZO2_ADMIN_PLUGIN_URL . '/addons/shortcodes/css/shortcodes.css');

        }
    }

    function onAfterRender()
    {

        $app = JFactory::getApplication();

        if ($app->isAdmin()) {
            // Add shortcodes button into editor
            $this->addShortCodes();
        }

    }

    public function onContentPrepare($context, &$article, &$params, $page = 0)
    {
        // Don't run this plugin when the content is being indexed
        if ($context == 'com_finder.indexer') {
            return true;
        }

        if (JFactory::getApplication()->isSite()) {
            $article->text = do_shortcode($article->text);
        }

    }

    public function onRenderModule($module, $params)
    {

    }


    public function  addShortCodes()
    {

        $body = JResponse::getBody();
        $button = $this->getButtonShortCodes();

        $stext = '<script language="javascript" type="text/javascript">
						function jSelectShortcode(text) {
							text = text.replace(/\'/g, \'"\');
							if(document.getElementById(\'jform_articletext\') != null) {
								jInsertEditorText(text, \'jform_articletext\');
							}
							if(document.getElementById(\'text\') != null) {
								jInsertEditorText(text, \'text\');
							}
							if(document.getElementById(\'jform_description\') != null) {
								jInsertEditorText(text, \'jform_description\');
							}
							if(document.getElementById(\'jform_content\') != null) {
								jInsertEditorText(text, \'jform_content\');
							}
							SqueezeBox.close();
						}
				   </script>';

        $body = str_replace('<div id="editor-xtd-buttons" class="btn-toolbar pull-left">', '<div id="editor-xtd-buttons" class="btn-toolbar pull-left">' . $button, $body);
        $body = str_replace('</body>', $stext . '</body>', $body);

        JResponse::setBody($body);
    }

    // Build button shorcodes list
    public function getButtonShortCodes()
    {
        $shortcoders = array(

            'vimeo' => array(
                'name' => "Vimeo",
                'desc' => "Vimeo",
                'syntax' => "[vimeo id=\ID\ h=\'HEIGHT\' w=\'WIDTH\' autoplay=0]",
                'image' => "vimeo.png"
            ),
            'youtube' => array(
                'name' => "Youtube",
                'desc' => "Youtube",
                'syntax' => "[youtube id=\ID\ h=\'HEIGHT\' w=\'WIDTH\']",
                'image' => "youtube.png"
            ),
            'bliptv' => array(
                'name' => "Blip.tv",
                'desc' => "Blip.tv",
                'syntax' => "[bliptv id=\ID\ h=\'HEIGHT\' w=\'WIDTH\' autoplay=false]",
                'image' => "bliptv.png"
            ),
            'dailymotion' => array(
                'name' => "Dailymotion",
                'desc' => "dailymotion",
                'syntax' => "[dailymotion id=\ID\ h=\'HEIGHT\' w=\'WIDTH\' autoplay=0]PLACE_LINK_HERE[/dailymotion]",
                'image' => "dailymotion.png"
            ),
            'hulu' => array(
                'name' => "Hulu",
                'desc' => "hulu",
                'syntax' => "[hulu id=\ID\ h=\'HEIGHT\' w=\'WIDTH\']",
                'image' => "hulu.png"
            ),
            'instagram' => array(
                'name' => "Instagram",
                'desc' => "instagram",
                'syntax' => "[instagram  url=\PLACE_LINK_HERE\ h=\'HEIGHT\' w=\'WIDTH\']",
                'image' => "instagram.png"
            ),
            'slideshare' => array(
                'name' => "Slideshare",
                'desc' => "slideshare",
                'syntax' => "[slideshare id=\ID\ h=\'HEIGHT\' w=\'WIDTH\']",
                'image' => "slideshare.png"
            ),
            'googlemap' => array(
                'name' => "Google Map",
                'desc' => "Google Map",
                'syntax' => "[googlemaps lat=\'Latitude\' lng=\'Longitude\' zoom=\'11\' w=\'100%\' h=\'400\']Your Info[/googlemaps]<br/>",
                'image' => "google_map.png"
            ),
            'polldaddy' => array(
                'name' => "Polldaddy",
                'desc' => "polldaddy",
                'syntax' => "[polldaddy  poll=\'ID\']<br/>",
                'image' => "polldaddy.png"
            ),
            'gist' => array(
                'name' => "Gist",
                'desc' => "gist",
                'syntax' => "[gist url=\'URL\']<br/>",
                'image' => "gist.png"
            ),
            'code' => array(
                'name' => "Code",
                'desc' => "Syntax highlighting of code snippets in a web page",
                'syntax' => "[code languages=\'js\' first-line=\'1\']Your Code[/code]<br/>",
                'image' => "code.png"
            ),
            'twitter' => array(
                'name' => "Twitter",
                'desc' => "twitter",
                'syntax' => "[twitter id=\'ID\' username=\'USERNAME\']<br/>",
                'image' => "twitter.png"
            ),
            'flickr' => array(
                'name' => "Flickr",
                'desc' => "flickr",
                'syntax' => "[flickr url=\'PLACE_LINK_HERE\']<br/>",
                'image' => "flickr.png"
            ),
            'wufoo' => array(
                'name' => "Wufoo",
                'desc' => "wufoo",
                'syntax' => "[wufoo username=\'USERNAME\' formhash=\'FROMHASH\' h=\'HEIGHT\']<br/>",
                'image' => "wufoo.png"
            ),

        );

        $text = '<div class="btn-toolbar">';
        if (count($shortcoders))
            foreach ($shortcoders as $key => $shortcoder) {
                $text .= '<a class="btn" href="javascript: void(0);" onclick="jSelectShortcode(\'' . $shortcoder['syntax'] . '\')" title="' . $shortcoder['desc'] . '">';
                $text .= '<i class="zo2-icon-bsc-' . $key . '"></i>';
                $text .= $shortcoder['name'];
                $text .= '</a>';
            }
        $text .= '</div>';
        return $text;
    }

}