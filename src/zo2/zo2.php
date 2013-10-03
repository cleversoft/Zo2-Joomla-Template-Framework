<?php
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

defined('_JEXEC') or die;

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
        if (isset($_GET['option']) && $_GET['option'] == 'com_templates' && isset($_GET['id'])) {
            if ($app->isAdmin()) {
                // Load Bootstrap CSS
                //JHtml::_('bootstrap.loadCss');
                Zo2Framework::loadAdminAssets();

            }
        }
        Zo2Framework::addCssStylesheet(ZO2_PLUGIN_URL . '/addons/shortcodes/css/shortcodes.css');
        if ($app->isSite()) {
            Zo2Framework::addJsScript(ZO2_PLUGIN_URL . '/addons/shortcodes/js/shortcodes.js');
        }
    }

    function onAfterRender()
    {

        $app = JFactory::getApplication();

        if ($app->isAdmin()) {
            // Add shortcodes button into editor
            $this->addShortCodes();
        } else {

            // get response
            $body = JResponse::getBody();
            $body = $this->doShortCode($body);
            JResponse::setBody($body);

        }

    }

    public function onContentPrepare($context, &$article, &$params, $page = 0)
    {
        $config = Zo2Framework::getParams();
        // Don't run this plugin when the content is being indexed
        if ($context == 'com_finder.indexer') {
            return true;
        }

        if (JFactory::getApplication()->isSite()) {
            //$article->text = $this->doShortCode($article->text);
            /* Google Authorship */
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
            /* Comments System */
            if ($config->get('enable_comments', 0)) {
                if (JFactory::getApplication()->input->getCmd('option') != 'com_k2') {
                    Zo2Framework::import2('addons.comments.Zo2Comments');
                    $comment = new Zo2Comments($article);
                    $article->text = $article->text . $comment->renderHtml();
                }

            }

        }

    }

    public function onRenderModule($module, $params)
    {

    }

    public function doShortCode($content)
    {

        if (Zo2Framework::loadShortCodes()) {
            return Zo2Framework::getInstance()->ShortCode->do_shortcode($content);
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
            'accordion' => array(
                'name'		=> "Accordion",
                'desc'		=> "Accordion",
                'syntax'	=> "[accordion]<br/>[acc_item title=\'ITEM_TITLE\']ADD_CONTENT_HERE[/acc_item]<br/>[acc_item title=\'ITEM_TITLE\']ADD_CONTENT_HERE[/acc_item]<br/>[acc_item title=\'ITEM_TITLE\']ADD_CONTENT_HERE[/acc_item]<br/>[/accordion]<br/>",
                'image'		=> "accordion.png",
                'type' => "form"
            ),
            'blockquote' => array(
                'name'		=> "Blockquote",
                'desc'		=> "Blockquote",
                'syntax'	=> "[quote align=\'center\' color=\'#999999\']ADD_CONTENT_HERE[/quote]",
                'image'		=> "blockquote.png",
                'type' => "form"
            ),
            'buttons' => array(
                'name'		=> "Buttons",
                'desc'		=> "Buttons",
                'syntax'	=> "[button type=\'primary\' size=\'large\' state=\'enable\']ADD_BUTTON_CONTENT[/button]",
                'image'		=> "buttons.png",
                'type' => "form"
            ),
            'column' => array(
                'name'		=> "Column",
                'desc'		=> "Column",
                'syntax'	=> "[columns]<br/>[column_item col=\'4\']ADD_CONTENT_HERE[/column_item]<br/>[column_item col=\'4\']ADD_CONTENT_HERE[/column_item]<br/>[column_item col=\'4\']ADD_CONTENT_HERE[/column_item]<br/>[/columns]",
                'image'		=> "column.png",
                'type' => "form"
            ),
            'dropcap' => array(
                'name'		=> "Dropcap",
                'desc'		=> "Dropcap",
                'syntax'	=> "[dropcap type=\'circle\' color=\'#COLOR_CODE\' background=\'#COLOR_CODE\']ADD_CONTENT_HERE[/dropcap]",
                'image'		=> "dropcap.png",
                'type' => "form"
            ),
            'gallery' => array(
                'name'		=> "Gallery",
                'desc'		=> "Gallery",
                'syntax'	=> "[gallery title=\'GALLERY_TITLE\' width=\'IMAGE_THUMB_WIDTH\' height=\'IMAGE_THUMB_HEIGHT\' columns=\'3\']<br/>[gallery_item title=\'IMAGE_TITLE\' src=\'IMAGE_SRC\']IMAGE_DESCRIPTION[/gallery_item]<br/>[gallery_item title=\'IMAGE_TITLE\' src=\'IMAGE_SRC\']IMAGE_DESCRIPTION[/gallery_item]<br/>[gallery_item title=\'IMAGE_TITLE\' src=\'IMAGE_SRC\']IMAGE_DESCRIPTION[/gallery_item]<br/>[/gallery]",
                'image'		=> "gallery.png",
                'type' => "photo"
            ),
            'lightbox' => array(
                'name'		=> "Lightbox",
                'desc'		=> "Lightbox",
                'syntax'	=> "[lightbox src=\'IMAGE_SRC\' width=\'IMAGE_WIDTH\' height=\'IMAGE_HEIGHT\' lightbox=\'on\' title=\'IMAGE_TITLE\' align=\'left\']",
                'image'		=> "lightbox.png",
                'type' => "form"
            ),
            'liststyle' => array(
                'name'		=> "List Style",
                'desc'		=> "List Style",
                'syntax'	=> "[list type=\'check\']<br/><ul><li>ADD_LIST_CONTENT</li>\<li>ADD_LIST_CONTENT</li></ul>[/list]",
                'image'		=> "list.png",
                'type' => "form"
            ),
            'message' => array(
                'name'		=> "Message Boxes",
                'desc'		=> "Message Boxes",
                'syntax'	=> "[message_box title=\'MESSAGE_TITLE\' color=\'red\' show_close=\'Yes/No\']ADD_CONTENT_HERE[/message_box]",
                'image'		=> "message.png",
                'type' => "form"
            ),
            'social' => array(
                'name'		=> "Social Icons",
                'desc'		=> "Social Icons",
                'syntax'	=> "[social type=\'facebook\' opacity=\'dark\']PLACE_LINK_HERE[/social]",
                'image'		=> "social.png",
                'type' => "social"
            ),
            'tabs' => array(
                'name'		=> "Tabs",
                'desc'		=> "Tabs",
                'syntax'	=> "[tabs]<br/>[tab_item title=\'ITEM_TITLE\']ADD_CONTENT_HERE[/tab_item]<br/>[tab_item title=\'ITEM_TITLE\']ADD_CONTENT_HERE[/tab_item]<br/>[tab_item title=\'ITEM_TITLE\']ADD_CONTENT_HERE[/tab_item]<br/>[/tabs]",
                'image'		=> "tabs.png",
                'type' => "form"
            ),
            'testimonial' => array(
                'name'		=> "Testimonial",
                'desc'		=> "Testimonial",
                'syntax'	=> "[testimonial author=\'TESTIMONIAL_AUTHOR\' position=\'AUTHOR_POSITION\']ADD_TESTIMONIAL_HERE[/testimonial]",
                'image'		=> "testimonial.png",
                'type' => "form"
            ),
            'toggle' => array(
                'name'		=> "Toggle Boxes",
                'desc'		=> "Toggle Boxes",
                'syntax'	=> "[toggle_box]<br/>[toggle_item title=\'ITEM_TITLE\']ADD_CONTENT_HERE[/toggle_item]<br/>[toggle_item title=\'ITEM_TITLE\' active=\'true\']ADD_CONTENT_HERE[/toggle_item]<br/>[/toggle_box]",
                'image'		=> "toggle.png",
                'type' => "form"
            ),

            'divider' => array(
                'name'		=> "Divider",
                'desc'		=> "Divider",
                'syntax'	=> "[divider scroll_text=\'SCROLL_TEXT\']<br/>",
                'image'		=> "divider.png",
                'type' => "form"
            ),
            'spacer' => array(
                'name'		=> "Add Space",
                'desc'		=> "Add Space",
                'syntax'	=> "[space height=\'HEIGHT\']<br/>",
                'image'		=> "space.png",
                'type' => "form"
            ),
            'highlighter' => array(
                'name'		=> "Syntax Highlighting",
                'desc'		=> "Syntax highlighting of code snippets in a web page",
                'syntax'	=> "[highlighter lang=\'js\' linenums=\'true\' startnums=\'1\']YOUR_CODE_HERE[/highlighter]<br/>",
                'image'		=> "highlighter.png",
                 'type' => "code"
            ),
            'pricing' => array(
                'name'		=> "Pricing Tables",
                'desc'		=> "Pricing Tables",
                'syntax'	=> "[pricing columns=\'3\']<br/>[plan title=\'PRICING_TITLE\' button_link=\'http://\' button_label=\'PRICING_BUTTON_LABEL\' price=\'$200\' featured=\'false\' per=\'month\']TEXT_OF_PLAN[/plan]<br/>[plan title=\'PRICING_TITLE\' button_link=\'http://\' button_label=\'PRICING_BUTTON_LABEL\' price=\'$200\' featured=\'false\' per=\'month\']TEXT_OF_PLAN[/plan]<br/>[plan title=\'PRICING_TITLE\' button_link=\'http://\' button_label=\'PRICING_BUTTON_LABEL\' price=\'$200\' featured=\'false\' per=\'month\']TEXT_OF_PLAN[/plan]<br/>[/pricing]<br/>",
                'image'		=> "pricing.png",
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
                    $text .= '  <i class="zo2-icon-bsc-' . $i++ . '" style="background: url(' . JUri::root() . ZO2_PLUGIN_REL . '/addons/shortcodes/images/' . $shortcoder['image'] . ') 0 0 no-repeat;"></i>';
                    $text .= $shortcoder['name'];
                    $text .= '  </a>';
                }
                $text .= '</div>';
            }
        return $text;
    }
}