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
        if (isset($_GET['option']) && $_GET['option'] == 'com_templates' && isset($_GET['id'])) {

            $app = JFactory::getApplication();
            if ($app->isAdmin()) {
                // Load Bootstrap CSS
                //JHtml::_('bootstrap.loadCss');
                Zo2Framework::loadAdminAssets();

            }
        }
        Zo2Framework::addCssStylesheet(ZO2_ADMIN_PLUGIN_URL . '/addons/shortcodes/css/shortcodes.css');
    }

    function onAfterRender()
    {

        $app = JFactory::getApplication();

        if ($app->isAdmin()) {
            // Add shortcodes button into editor
            $this->addShortCodes();
        }

        // get response
        //$html = JResponse::getBody();
    }

    public function onContentPrepare($context, &$article, &$params, $page = 0)
    {
        $config = Zo2Framework::getParams();

        // Don't run this plugin when the content is being indexed
        if ($context == 'com_finder.indexer') {
            return true;
        }



        if (JFactory::getApplication()->isSite()) {
            $article->text = $this->doShortCode($article->text);

            if ((int)$config->get("enable_googleauthorship", 0)) {
                $author_name = "+";
                $user = JFactory::getUser();
                $rel = 'me';
                if ($user->get('id') == $article->created_by) {
                    $rel = 'author';
                }

                $gplus = '<a href="'.$config->get('google_profile_url', '').'/?rel='.$rel.'"';
                $gplus .= ' title="Google Plus Profile for '.$author_name.'" plugin="Google Plus Authorship">'.$author_name.'</a>';
                $article->text = $gplus . $article->text;
            }

        }

    }

    public function onRenderModule($module, $params)
    {

    }

    public function doShortCode($content)
    {

        if (Zo2Framework::loadShortCodes()) {
            return do_shortcode($content);
        } else {
            return $content;
        }
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
							jQuery(\'#zo2Modal\').modal(\'hide\');
						}
				   </script>';

        $button = '<a href="#zo2Modal" role="button" class="btn" data-toggle="modal"><i class="icon-arrow-down"></i>ZO2 ShortCodes</a>
            <div id="zo2Modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="zo2ModalLabel" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                <h2 id="zo2ModalLabel">ZO2 ShortCodes</h2>
              </div>
              <div class="modal-body">
                '.$button.'
              </div>
              <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
              </div>
            </div>';

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
                'image' => "vimeo.png",
                'type' => "media"
            ),
            'youtube' => array(
                'name' => "Youtube",
                'desc' => "Youtube",
                'syntax' => "[youtube id=\ID\ h=\'HEIGHT\' w=\'WIDTH\']",
                'image' => "youtube.png",
                'type' => "media"
            ),
            'bliptv' => array(
                'name' => "Blip.tv",
                'desc' => "Blip.tv",
                'syntax' => "[blip.tv id=\ID\ h=\'HEIGHT\' w=\'WIDTH\' autoplay=false]",
                'image' => "bliptv.png",
                'type' => "media"
            ),
            'dailymotion' => array(
                'name' => "Dailymotion",
                'desc' => "dailymotion",
                'syntax' => "[dailymotion id=\ID\ h=\'HEIGHT\' w=\'WIDTH\' autoplay=0]PLACE_LINK_HERE[/dailymotion]",
                'image' => "dailymotion.png",
                'type' => "media"
            ),
            'hulu' => array(
                'name' => "Hulu",
                'desc' => "hulu",
                'syntax' => "[hulu id=\ID\ h=\'HEIGHT\' w=\'WIDTH\']",
                'image' => "hulu.png",
                'type' => "media"
            ),
            'instagram' => array(
                'name' => "Instagram",
                'desc' => "instagram",
                'syntax' => "[instagram  url=\PLACE_LINK_HERE\ h=\'HEIGHT\' w=\'WIDTH\']",
                'image' => "instagram.png",
                'type' => "media"
            ),
            'slideshare' => array(
                'name' => "Slideshare",
                'desc' => "slideshare",
                'syntax' => "[slideshare id=\ID\ h=\'HEIGHT\' w=\'WIDTH\']",
                'image' => "slideshare.png",
                'type' => "document"
            ),
            'googlemap' => array(
                'name' => "Google Map",
                'desc' => "Google Map",
                'syntax' => "[googlemaps lat=\'Latitude\' lng=\'Longitude\' zoom=\'11\' w=\'100%\' h=\'400\']Your Info[/googlemaps]<br/>",
                'image' => "google_map.png",
                'type' => "map"
            ),
            'polldaddy' => array(
                'name' => "Polldaddy",
                'desc' => "polldaddy",
                'syntax' => "[polldaddy  poll=\'ID\']<br/>",
                'image' => "polldaddy.ico",
                'type' => "poll"
            ),
            'gist' => array(
                'name' => "Gist",
                'desc' => "gist",
                'syntax' => "[gist url=\'URL\']<br/>",
                'image' => "github.png",
                'type' => "code"
            ),
            'code' => array(
                'name' => "Code",
                'desc' => "Syntax highlighting of code snippets in a web page",
                'syntax' => "[code languages=\'js\' first-line=\'1\']Your Code[/code]<br/>",
                'image' => "code.png",
                'type' => "code"
            ),
            'twitter' => array(
                'name' => "Twitter",
                'desc' => "twitter",
                'syntax' => "[twitter id=\'ID\' username=\'USERNAME\']<br/>",
                'image' => "twitter.png",
                'type' => "social"
            ),
            'flickr' => array(
                'name' => "Flickr",
                'desc' => "flickr",
                'syntax' => "[flickr url=\'PLACE_LINK_HERE\']<br/>",
                'image' => "flickr.png",
                'type' => "photo"
            ),
            'wufoo' => array(
                'name' => "Wufoo",
                'desc' => "wufoo",
                'syntax' => "[wufoo username=\'USERNAME\' formhash=\'FROMHASH\' h=\'HEIGHT\']<br/>",
                'image' => "wufoo.png",
                'type' => "form"
            ),

        );

        $shortcodetype = array();
        foreach ($shortcoders as $key => $shortcode) {
            if (isset($shortcode['type'])) {
                $shortcodetype[$shortcode['type']][] = $shortcode;
            } else {
                $shortcodetype['media'][] = $shortcode;
            }
        }

        $text = '';
        if (count($shortcodetype))
            $i = 0;
            foreach ($shortcodetype as $type => $items) {
                $text .= '<h3>'.ucwords($type).'</h3>';
                $text .= '<div class="shortcode-items">';
                foreach ($items as $shortcoder) {

                    $text .= '  <a class="btn" href="javascript: void(0);" onclick="jSelectShortcode(\'' . $shortcoder['syntax'] . '\')" title="' . $shortcoder['desc'] . '">';
                    $text .= '  <i class="zo2-icon-bsc-' . $i++ . '" style="background: url(' . JUri::root() . ZO2_ADMIN_PLUGIN_REL . '/addons/shortcodes/images/' . $shortcoder['image'] . ') 0 0 no-repeat;"></i>';
                    $text .= $shortcoder['name'];
                    $text .= '  </a>';
                }
                $text .= '</div>';
            }
        return $text;
    }
}