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

/**
 * Class exists checking
 */
if (!class_exists('Zo2UtilitySocialShares')) {
    require_once 'abstract.php';

    /**
     * 
     */
    class Zo2UtilitySocialShares extends Zo2UtilityAbstract {

        private $_url;

        public function __construct() {
            $this->_url = JUri::getInstance()->toString();
        }

        private function _twitterButton($config) {
            return Zo2Services::button('twitter', 'share', $config->text, $config->default);
        }

        private function _facebookButton($config) {
            return Zo2Services::button('facebook', 'like', $config->default);
        }

        private function _bufferButton($config) {
            return Zo2Services::button('buffer', 'buffer', $config->text, $config->default);
        }

        private function _linkedinButton($config) {
            return Zo2Services::button('linkedin', 'share', $config->default);
        }

        private function _googleButton($config) {
            return Zo2Services::button('google', 'plus', $config->default);
        }

        private function _youtubeButton($config) {
            return Zo2Services::button('youtube', 'subscribe', $config->default);
        }

        private function _pinterestButton($config) {
            return Zo2Services::button('pinterest', 'pinit', $config->default);
        }

        private function _tumblrButton($config) {
            return Zo2Services::button('tumblr', 'follow', 3, 'dark');
        }

        public function getSocials() {
            $file = Zo2Assets::getInstance()->getAssetFile('zo2/socialshares.json');
            $socialshares = json_decode(JFile::read($file));

            /* sorting by name */
            foreach ($socialshares as $socialshare) {
                if ($socialshare->enable == 1)
                    $list[$socialshare->name] = $socialshare;
            }
            /* And now get ordering from saved */
            $socialOrders = json_decode(Zo2Framework::get('social_order'));
            if ($socialOrders) {
                foreach ($socialOrders as $social) {
                    if ($social->enable == 1) {
                        if (isset($list[$social->website])) {
                            /**
                             * @todo In backend must save with correct thing than we don't need remap at frontend
                             */
                            $default = $list[$social->website]->default;
                            switch ($social->website) {
                                case 'Twitter':
                                    $default->count = $social->button_design;
                                    break;
                                case 'Facebook':
                                    $default->layout = $social->button_design;
                                    $default->action = Zo2Framework::get('fb_action');
                                    break;
                                case 'Buffer':
                                    $default->count = $social->button_design;
                                    break;
                                case 'Linkedin':
                                    $default->counter = $social->button_design;
                                    break;
                                case 'Google':
                                    $default->annotation = $social->button_design;
                                    break;
                                case 'Youtube':
                                    $default->layout = $social->button_design;
                                    break;
                                case 'Pinterest':
                                    $name = 'pin-config';
                                    $default->$name = $social->button_design;
                                    break;
                                case 'Tumblr':
                                    $default->button_type = $social->button_design;
                                    break;
                            }
                            $list[$social->website]->default = $default;
                            $_list[$social->index] = $list[$social->website];
                        } else {
                            echo $social->website . '<br />';
                        }
                    }
                }
            }
            if (isset($_list))
                return $_list;
        }

        public function floatbar() {
            $html = '';
            $list = $this->getSocials();
            if ($list) {
                foreach ($list as $social) {
                    $html .= call_user_func_array(array($this, '_' . strtolower($social->name) . 'Button'), array($social));
                }
                $html = '<div class="container"> <div class="zo2-socialshares-floatbar">' . $html . '</div> </div>';
                return $html;
            }
        }

        /**
         * Only use under item
         * @return string
         */
        public function horizontalbar() {
            /* Config checking */
            $jinput = JFactory::getApplication()->input;
            $option = $jinput->get('option');
            $view = $jinput->get('view');

            $display = false;

            switch ($option) {
                case 'com_content':
                    switch ($view) {
                        case 'archive':
                            /* of course false */
                            break;
                        case 'article':
                            $display = (bool) Zo2Framework::get('socialshare_in_article');
                            /* We do not check article in filter categories here. Will do that in template override */
                            break;
                        case 'category':
                            $display = (bool) Zo2Framework::get('socialshare_in_article_list');
                            break;
                        case 'featured':
                            $display = (bool) Zo2Framework::get('socialshare_in_featured');
                            break;
                    }

                    break;
            }

            $html = '';
            if ($display) {
                $list = $this->getSocials();
                foreach ($list as $social) {
                    $html .= call_user_func_array(array($this, '_' . strtolower($social->name) . 'Button'), array($social));
                }
                $html = '<div class="zo2-socialshares-horizontal">' . $html . '</div>';
            }

            return $html;
        }

        public function render() {
            $args = func_get_args();
            $style = $args[0];
            /**
             * @todo parameter must be prefixed by socialshares_<func>
             */
            if (Zo2Framework::get('socialshare_' . $style, 1) == 1) {
                if (method_exists($this, $style)) {
                    return $this->$style();
                }
            }
        }

    }

}