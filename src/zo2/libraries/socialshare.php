<?php

/**
 * Zo2 (http://www.zo2framework.org)
 * A powerful Joomla template framework
 *
 * @link        http://www.zo2framework.org
 * @link        http://github.com/aploss/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2013 APL Solutions (http://apl.vn)
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');

if (!class_exists('Zo2Socialshare')) {

    class Zo2Socialshare {

        public $addedSocialScript = false;
        public $socials = array();
        public $optionAttributes = array();
        public $optionAttributesHtml = '';

        public function __construct($params) {
            $this->params = $params;
            $this->init();
        }

        /**
         *
         */
        public function init() {
            $lang = JFactory::getLanguage();
            $lang->load('plg_system_zo2', JPATH_ADMINISTRATOR);

            $this->loadScript();
            $this->generateOptionAttributes();
            $this->generateOptionAttributesHtml();
        }

        /**
         * Loading Scripts/stylesheets
         */
        public function loadScript() {

            $document = JFactory::getDocument();
            $type = $document->getType();


            if ($type == 'html') {

                $open_popup = (int) $this->params->get('show_popup', 1);
                $close_popup = (int) $this->params->get('close_popup', 10);
                $days_popup = (int) $this->params->get('days_popup_again', 1);
                $view = $this->getView();

                $socials = json_decode($this->params->get('social_order'));
                $newSocials = array();

                if (is_array($socials)) {
                    foreach ($socials as $social) {

                        if ($social->enable) {

                            if ($social->name == 'facebook') {
                                $social->params = array(
                                    'fb_url' => $this->params->get('fb_url'),
                                    'fb_send' => ($this->params->get('fb_send') ? 'true' : 'false'),
                                    'fb_action' => $this->params->get('fb_action', 'like'),
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

                            $this->socials[] = $social;
                        }
                    }
                }


                $document->addStyleSheet(ZO2URL_ROOT . '/assets/zo2/css/social.css');
                $document->addScript(ZO2URL_ROOT . '/assets/vendor/jquery.cookie.js');
                $document->addScript(ZO2URL_ROOT . '/assets/vendor/socialite/socialite.min.js');
                $document->addScript(ZO2URL_ROOT . '/assets/vendor/socialite/extensions/socialite.pinterest.js');
                $document->addScript(ZO2URL_ROOT . '/assets/vendor/socialite/extensions/socialite.bufferapp.js');
                $document->addScript(ZO2URL_ROOT . '/assets/vendor/socialite/extensions/socialite.reddit.js');
                //$document->addScript(ZO2URL_ROOT . '/addons/socialshare/js/socialshare.js');
                $document->addScript(ZO2URL_ROOT . '/assets/zo2/js/social.min.js');
                if (!$this->addedSocialScript) {
                    /*
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
                      box_style: "' . $this->params->get('box_style', 'text-align: center; border: 1px solid #A09999; padding: 7px; float: left;') . '",
                      popupParams: {
                      sClose: "' . $close_popup . '",
                      sPopup: "' . $open_popup . '",
                      dPopup: "' . $days_popup . '",
                      domain: "' . JUri::getInstance()->toString(array('scheme', 'host', 'port')) . '"
                      }
                      });
                      });'
                      );
                     */

                    $document->addScriptDeclaration('jQuery(document).ready(function($){$(".zo2-social-wrap").Zo2Social();});');

                    $this->addedSocialScript = true;
                }
            }
        }

        /**
         * Render social
         * @param $article
         * @param string $selector
         */
        public function renderSocial($article, $selector = '.zo12-social-wrap') {
            $url = '';
            $option = JFactory::getApplication()->input->getCmd('option', '');
            $view = $this->getView();
            $params = Zo2Framework::getParams();

            $cats = $params->get('catid');

            if (($cats[0] == '') || in_array($article->catid, $cats)) {

                if ($option == 'com_content') {
                    $url = JUri::getInstance()->toString(array('scheme', 'host', 'port')) . JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catslug));
                } else if ($option == 'com_k2') {
                    $url = JUri::getInstance()->toString(array('scheme', 'host', 'port')) . $article->link;
                }

                if ($view == 'article' && $params->get('display_type', 'normal') == 'normal' && $this->showIn($view)) {
                    $socialWrapPattern = '<div class="zo2-social-wrap hidden-xs hidden-md" data-id="%s" data-url="%s" data-title="%s" %s></div>';
                    $socialWrap = sprintf($socialWrapPattern, $article->id, $url, $article->title, $this->optionAttributesHtml);

                    if ($params->get('normal_position') == 'top') {
                        $article->text = $socialWrap . $article->text;
                    } else if ($params->get('normal_position') == 'bottom') {
                        $article->text = $article->text . $socialWrap;
                    }
                } else if (($view == 'category' || $view = 'featured') && $params->get('show_social_article_list', '1')) {
                    $socialWrapPattern = '<div class="zo2-social-wrap hidden-xs hidden-md" data-id="%s" data-url="%s" data-title="%s" %s></div>';
                    $socialWrap = sprintf($socialWrapPattern, $article->id, $url, $article->title, $this->optionAttributesHtml);
                    //if (!$this->addedSocialScript) $article->introtext = $socialWrap . $article->introtext;
                    $article->introtext = $socialWrap . $article->introtext;
                }
            }

            return;
        }

        public function renderFloatSocial() {
            $doc = JFactory::getDocument();
            $params = Zo2Framework::getParams();
            $view = $this->getView();
            if ($params->get('display_type', 'normal') == 'float' && $this->showIn($view)) {
                $pattern = '<div class="zo2-social-float zo2-social-wrap hidden-xs hidden-md" data-social-type="floating" data-id="%s" data-url="%s" data-title="%s" %s></div>';
                $url = JUri::current();
                $title = $doc->getTitle();
                return sprintf($pattern, 0, $url, $title, $this->optionAttributesHtml);
            }

            return '';
        }

        public function renderCurrentPageNormalSocial() {
            $doc = JFactory::getDocument();
            $params = Zo2Framework::getParams();
            //$view = $this->getView();
            if ($params->get('display_type', 'normal') == 'normal') {
                $pattern = '<div class="zo2-social-wrap hidden-xs hidden-md" data-id="%s" data-url="%s" data-title="%s" %s></div>';
                $url = JUri::current();
                $title = $doc->getTitle();
                return sprintf($pattern, 0, $url, $title, $this->optionAttributesHtml);
            }

            return '';
        }

        public function generateOptionAttributes() {
            $services = array();
            foreach ($this->socials as $s) {
                foreach ($s->params as $key => $value) {
                    $this->optionAttributes[$key] = $value;
                }

                if ($s->enable)
                    $services[] = $s->name;
            }
            $this->optionAttributes['services'] = implode(' ', $services);
        }

        public function generateOptionAttributesHtml() {
            $html = array();
            foreach ($this->optionAttributes as $key => $value) {
                $html[] = 'data-social-' . $key . '="' . htmlspecialchars($value) . '"';
            }
            $this->optionAttributesHtml = implode(' ', $html);
        }

        /**
         * Include/exclude menus
         * @return bool
         */
        public function checkMenu() {

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
        public function showIn($view) {
            $result = false;
            switch ($view) {
                case 'article':
                    $result = $this->params->get('show_in_article', 0) ? true : false;
                    break;
                case 'category':
                    $result = $this->params->get('show_in_category', 0) ? true : false;
                    break;
                case 'featured':
                    $result = $this->params->get('show_in_featured', 0) ? true : false;
                    break;
                default:
                    $result = true;
                    break;
            }

            return $result;
        }

        /**
         * Get current view
         * @return mixed|string
         */
        public function getView() {

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

}
