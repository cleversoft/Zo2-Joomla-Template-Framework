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

class Zo2Socialshare
{

    function __construct($params)
    {
        $this->params = $params;
        $this->init();
    }

    /**
     *
     */
    function init()
    {
        $lang = JFactory::getLanguage();
        $lang->load('plg_system_zo2', JPATH_ADMINISTRATOR);
    }

    /**
     * Loading Scripts/stylesheets
     * @param $selector
     */
    function loadScript($selector)
    {

        $document = JFactory::getDocument();
        $type = $document->getType();


        if ($type == 'html') {

            $open_popup = (int)$this->params->get('show_popup', 1);
            $close_popup = (int)$this->params->get('close_popup', 10);
            $days_popup = (int)$this->params->get('days_popup_again', 1);
            $view = $this->getView();
            $display_type = $this->params->get('display_type', 'normal');
            if (($display_type == 'floating') && ($view != "article")) {
                $display_type = 'normal';
            }

            $socials = json_decode($this->params->get('social_order'));
            $newSocials = array();

            foreach ($socials as $social) {

                if ($social->enable) {

                    if ($social->name == 'facebook') {
                        $social->params = array(
                            'fb_url' => $this->params->get('fb_url'),
                            'fb_send' => ($this->params->get('fb_send') ? 'true' : 'false'),
                            'fb_action' => $this->params->get('fb_action'),
                        );
                    } else if ($social->name == 'twitter') {
                        $social->params = array(
                            'tw_username' => $this->params->get('tw_username'),
                            'tw_recommended' => $this->params->get('tw_recommended'),
                            'tw_hashtags' => $this->params->get('tw_hashtags'),
                        );
                    } else {
                        $social->params = array();
                    }

                    $newSocials[] = $social;
                }
            }

            $newSocials = "'" . addslashes(json_encode($newSocials)) . "'";

            $document->addStyleSheet(ZO2_PLUGIN_URL . '/addons/socialshare/css/social.css');
            //$document->addScript(ZO2_PLUGIN_URL . '/assets/vendor/jquery/jquery-1.9.1.min.js');
            //$document->addScript(ZO2_PLUGIN_URL . '/assets/vendor/bootstrap/js/bootstrap.min.js');
            $document->addScript(ZO2_PLUGIN_URL . '/addons/socialshare/js/jquery.cookie.js');
            $document->addScript(ZO2_PLUGIN_URL . '/addons/socialshare/js/socialite/socialite.min.js');
            $document->addScript(ZO2_PLUGIN_URL . '/addons/socialshare/js/socialite/extensions/socialite.pinterest.js');
            $document->addScript(ZO2_PLUGIN_URL . '/addons/socialshare/js/socialite/extensions/socialite.bufferapp.js');
            $document->addScript(ZO2_PLUGIN_URL . '/addons/socialshare/js/socialshare.js');
            $document->addScriptDeclaration('
                jQuery(document).ready(
                    function($){
                        $("' . $selector . '").Zo2Socialshare({
                            buttons: $.parseJSON(' . $newSocials . '),
                            display_style: "' . $display_type . '",
                            floating_position: "' . $this->params->get('floating_position', 'left') . '",
                            box_top: "' . $this->params->get('box_top', 100) . '",
                            box_left: "' . $this->params->get('box_left', 0) . '",
                            box_right: "' . $this->params->get('box_right', 0) . '",
                            enablePopup: ' . $this->params->get('enable_popup', 0) . ',
                            popupParams: {
                                sClose: "' . $close_popup . '",
                                sPopup: "' . $open_popup . '",
                                dPopup: "' . $days_popup . '",
                                domain: "' . JUri::getInstance()->toString(array('scheme', 'host', 'port')) . '"
                            }
                        });
                });');

        }

    }

    /**
     * Render popup
     * @param $body the body html
     * @return $body
     */
    function renderPopup($body)
    {

        if ($this->checkMenu()) {

            $html = '<div class="modal fade" id="zo2Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">' . JText::_('Please support our') . '</h4>
                            </div>
                            <div class="modal-body">
                                <p>' . JText::_('By clicking any of these buttons you help our site to get better') . '</p>
                                <div id="zo2-social-popup"></div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->';

            $body = str_replace('</body>', $html . '</body>', $body);
            return $body;

        } else {
            return $body;
        }

    }

    /**
     * Render social
     * @param $article
     * @param string $selector
     */
    function renderSocial($article, $selector = '.zo12-social-wrap')
    {

        $url = '';
        $option = JFactory::getApplication()->input->getCmd('option', '');
        $view = $this->getView();
        $params = Zo2Framework::getParams();

        if ($this->showIn($view)) {

            $cats = $params->get('catid');

            if (($cats[0] == '') || in_array($article->catid, $cats)) {

                $this->loadScript($selector);

                if ($option == 'com_content') {
                    $url = JUri::getInstance()->toString(array('scheme', 'host', 'port')) . JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catslug));
                } else if ($option == 'com_k2') {
                    $url = JUri::getInstance()->toString(array('scheme', 'host', 'port')) . $article->link;
                }

                $html = '<div class="zo2-social-wrap" data-id="' . $article->id . '" data-url="' . $url . '" data-title="' . $article->title . '" ></div>';

                if ($view == 'article') {

                    if ($params->get('display_type') == 'normal') {

                        if ($params->get('normal_position') == 'top') {
                            $html = $html . $article->text;
                        } else if ($params->get('normal_position') == 'bottom') {
                            $html = $article->text . $html;
                        }

                    } else {
                        $html = $html . $article->text;
                    }

                    $article->text = $html;

                } else if ($view == 'category' || $view == 'featured') {
                    $article->introtext = $html . $article->introtext;
                }
            }

        }

        return;
    }

    /**
     * Include/exclude menus
     * @return bool
     */
    function checkMenu()
    {

        $app = JFactory::getApplication();
        $excl = $this->params->get('excl_menu');
        $menuexin = ($this->params->get('menuexin')) ? true : false;

        if (empty($excl)) {
            return true;
        }

        $menu = $app->getMenu();
        $active = $menu->getActive() ? $menu->getActive() : $menu->getDefault();
        if (count($excl)) {

            if (in_array($active->id, $excl)) {
                if ($menuexin) {
                    return false;
                } else {
                    return true;
                }

            } else {

                if ($menuexin) {
                    return true;
                } else {
                    return false;
                }

            }

        }

        return true;
    }

    /**
     * Showing popup  in view
     * @param $view
     * @return bool
     */
    public function showIn($view)
    {

        $bool = false;
        switch ($view) {
            case 'article':
                $bool = $this->params->get('show_in_article', 0) ? true : false;
                break;
            case 'category':
                $bool = $this->params->get('show_in_category', 0) ? true : false;
                break;
            case 'featured':
                $bool = $this->params->get('show_in_featured', 0) ? true : false;
                break;
            default:
                $bool = true;
                break;
        }

        return $bool;
    }

    /**
     * Get current view
     * @return mixed|string
     */
    public function getView()
    {

        $input = JFactory::getApplication()->input;

        $currentView = $input->get("view", '');
        if ($currentView == "item")
            $currentView = "article";
        else If ($currentView == "featured") {
            $currentView = "featured";
        } else if ($currentView == "itemlist" || $currentView == "latest")
            $currentView = "category";

        return $currentView;
    }

}