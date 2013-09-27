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
//no direct accees
defined('_JEXEC') or die ('resticted aceess');
/**
 * Zo2Comments Class
 * @package     zo2
 * @subpackage  Zo2Comments
 */
class Zo2Comments
{
    function __construct()
    {
        $this->http = JHttpFactory::getHttp();
    }

    function getFacebookCount($url = "")
    {

        if (empty($url)) {
            $url = JUri::getInstance()->toString();
        }

        $link = 'https://graph.facebook.com/?ids=' . urlencode($url);
        $response = $this->http->get($link);
        $body = $response->body;
        $info = json_decode($body);

        if (!empty($info)) {
            return $info->$url->comments;
        }

        return 0;
    }

    function getGplusCount($url = '')
    {

        if (empty($url)) {
            $url = JUri::getInstance()->toString();
        }

        $link = 'https://apis.google.com/_/widget/render/commentcount?bsv&href=' . urlencode($url);
        $response = $this->http->get($link);

        $body = $response->body;

        $doc = new DOMDocument();
        $doc->loadHTML($body);

        $counter = $doc->getElementById('aggregateCount');
        if ($counter) {
            return $counter->nodeValue;
        }

        return 0;

    }

    function getDisqusCount($url = '')
    {

        $params = Zo2Framework::getParams();

        if ($params->get("disqus_shortname")) {

            $link = 'http://disqus.com/api/3.0/threads/details.json?api_key=oM0LSEGeVxqJb93ctjAohh66F9JFqndGigzWT0HRAenCinuhHNIWCiiDlKXtAYF2&forum=' . $params->get("disqus_shortname") . '&thread:link=' . urlencode($url);
            $response = $this->http->get($link);
            $body = $response->body;

            $json = json_decode($body);

            if (!empty($json)) {
                return $json->response->posts;
            }

        }

        return 0;
    }

    function renderHtml()
    {

        $params = Zo2Framework::getParams();
        $tab_order = explode(',', $params->get('tab_order', 'facebook,gplus,disqus,k2comment'));
        $url = JUri::getInstance()->toString();
        $document = JFactory::getDocument();
        $document->addStyleSheet(ZO2_PLUGIN_URL . '/addons/comments/css/comments.css');
        $document->addScriptDeclaration('
                jQuery(document).ready(function() {
                    comment_width = jQuery(\'#zo2comment-tabs\').innerWidth();
                });'
        );

        $html = '';

        $html .= '<div id="zo2comment-tabs">';

        $html .= '<h3 name="comments">' . JText::_('ZO2 Comments') . '</h3>';
        $html .= '<ul class="nav nav-tabs nav-justified ">';


        foreach ($tab_order as $key => $tab) {
            $class = '';
            $tab = trim($tab);
            if ($key == 0) {
                $class = 'class="active"';
            } else {
                $class = '';
            }
            $html .= '<li ' . $class . '><a href="#' . $tab . '" data-toggle="tab">';
            $html .= '<span id="' . $tab . '-label">' . $params->get($tab . '_label') . '</span>';
            $html .= '</a></li>';
        }


        $html .= '</ul>';
        $html .= '<div class="tab-content">';


        foreach ($tab_order as $key => $tab) {

            $active = '';
            if ($key == 0) {
                $active = 'active';
            }
            $html .= '<div id="' . $tab . '" class="embed-container tab-pane ' . $active . '">';

            switch ($tab) {

                case 'facebook':
                    $html .= '<div id="fb-root"></div>';
                    $html .= '<div id="fb-comments">Loading Facebook Comments ...</div>';
                    $html .= '<script type="text/javascript">';
                    $html .= 'jQuery(document).ready(function($){
                                        $(\'#fb-comments\').html(\'<div class="fb-comments" data-width="\'+comment_width+\'" data-href="' . $url . '" data-num-posts="20" data-colorscheme="light" data-mobile="auto"></div>\');
                                      });';
                    $html .= '</script>';
                    $html .= '<script async type="text/javascript" src="//connect.facebook.net/en_US/all.js#xfbml=1">FB.init();</script>';

                    break;
                case 'gplus';

                    $html .= '<script type="text/javascript">';
                    $html .= 'jQuery(document).ready(function($) {
                                            $(\'#gplus\').html(\'<div class="g-comments" data-width="\'+comment_width+\'" data-href="' . $url . '" data-first_party_property="BLOGGER" data-view_type="FILTERED_POSTMOD">Loading Google+ Comments ...</div>\');
                                    });';
                    $html .= '</script>';
                    $html .= '<script async type="text/javascript" src="//apis.google.com/js/plusone.js?callback=gpcb"></script>';
                    break;

                case 'disqus';
                    if ($params->get('disqus_shortname')) {

                        $html .= '<div class="embed-container " id="disqus_thread">Loading Disqus Comments ...</div>';
                        $html .= '<script type="text/javascript">';
                        $html .= 'var disqus_shortname = "' . $params->get("disqus_shortname") . '";';
                        $html .= '(function(d) {
                                        var dsq = d.createElement(\'script\'); dsq.type = \'text/javascript\'; dsq.async = true;
                                        dsq.src = "//" +disqus_shortname+ ".disqus.com/embed.js";
                                        (d.getElementsByTagName(\'head\')[0] || d.getElementsByTagName(\'body\')[0]).appendChild(dsq)
                                        })(document);';
                        $html .= '</script>';
                    } else {
                        $html .= '<h2>You must enter  your Disqus "shortname"</h2>';
                    }

                    break;
                case 'k2comment';

                    jimport('joomla.application.component.helper');

                    if(!JComponentHelper::isEnabled('com_k2', true))
                    {
                        $html .= '' . JText::_('Zo2 Framework requires k2 component installed');

                    } else {

                        JHtml::_('behavior.formvalidation');
                        JHtml::_('behavior.keepalive');

                        //JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');
                        //$comment = JTable::getInstance('K2Comments', 'Table');
                        //$comment->load($item->id);

                        $html .= '
                            <script type=\"text/javascript\">
                                Joomla.submitbutton = function(task)
                                {
                                    if (document.formvalidator.isValid(document.id(\'comment-form\')))
                                    {
                                        Joomla.submitform(task, document.getElementById(\'comment-form\'));
                                    } else {
                                        return false;
                                    }
                                }
                            </script>';

                        // $user = JFactory::getUser();
                        //$user->guest;

                        $html .= '<div id="zo2framework-comments">
                            <form action="'.JURI::root(true).'/index.php" method="post" name="adminForm" id="comment-form" class="form-validate form-horizontal" role="form">

                                <div class="form-group">
                                    <label id="commentText-lbl" for="commentText" class="col-lg-2 hasTip required control-label formComment" title="">Message<span class="star">&nbsp;*</span></label>
                                    <div class="col-lg-10">
                                      <textarea rows="5" cols="10" class="form-control required" required="required" aria-required="true"  name="commentText" id="commentText" placeholder="Your message here"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label id="userName-lbl" for="userName" class="col-lg-2 hasTip required control-label formName" title="">Name<span class="star">&nbsp;*</span></label>
                                    <div class="col-lg-10">
                                      <input class="form-control required" type="text" required="required" aria-required="true" name="userName" id="userName" value="" placeholder="Your name" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label id="commentEmail-lbl" for="commentEmail" class="col-lg-2 hasTip required control-label formEmail" title="">Email<span class="star">&nbsp;*</span></label>
                                    <div class="col-lg-10">
                                       <input class="inputbox form-control required" required="required" aria-required="true" type="text" name="commentEmail" id="commentEmail" value="" placeholder="Your email" />
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label id="commentURL-lbl" for="commentURL" class="col-lg-2 hasTip required control-label formUrl" title="">Website URL<span class="star">&nbsp;*</span></label>
                                    <div class="col-lg-10">
                                       <input class="inputbox form-control required" required="required" aria-required="true" type="text" name="commentURL" id="commentURL" value=""  placeholder="Website URL" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label  class="col-lg-2 control-label"></label>
                                    <div class="col-lg-10">
                                        <input type="submit" class="btn btn-primary" id="submitCommentButton" value="Submit Comments" onclick="Joomla.submitbutton(\'comment\'); return false;" />
                                    </div>
                                </div>

                                <span id="formLog"></span>

                                <input type="hidden" name="option" value="com_k2" />
                                <input type="hidden" name="view" value="item" />
                                <input type="hidden" name="task" value="comment" />
                                <input type="hidden" name="itemID" value="'.JRequest::getInt('id').'" />
                                '.JHTML::_('form.token').'
                            </form></div>
                            ';
                    }

                    break;
            }

            $html .= '</div>';
        }

        $html .= '</div>';

        $html .= '</div>';


        return $html;

    }


}