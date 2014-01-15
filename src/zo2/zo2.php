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
if (!class_exists('plgSystemZo2')) {

    /**
     * Zo2 Framework entrypoint plugin
     */
    class plgSystemZo2 extends JPlugin {

        /**
         * 
         * @param type $subject
         * @param type $config
         */
        public function __construct(& $subject, $config) {
            parent::__construct($subject, $config);
            $language = JFactory::getLanguage();
            $language->load('plg_system_zo2', JPATH_ADMINISTRATOR);
        }

        /**
         * Init our framework
         */
        public function onAfterInitialise() {
            include_once __DIR__ . '/includes/bootstrap.php';
            if (!Zo2Framework::isJoomla25()) {
                JHtml::_('bootstrap.framework');
            }
        }

        /**
         * @uses This event is triggered immediately before the framework has rendered the application.
         */
        public function onBeforeRender() {
            
        }

        /**
         * 
         */
        public function onAfterRender() {
            $app = JFactory::getApplication();
            $body = JResponse::getBody();
            $shortcodes = Zo2Shortcodes::getInstance();
            $jinput = JFactory::getApplication()->input;

            if ($app->isAdmin()) {
                /**
                 * Shortcodes button hack !!!
                 */
                if (Zo2Framework::isJoomla25()) {
                    $body = str_replace('<div id="editor-xtd-buttons">', '<div id="editor-xtd-buttons"><div class="button2-left">' . $shortcodes->getButton() . '</div>', $body);
                }
                $body = str_replace('<div id="editor-xtd-buttons" class="btn-toolbar pull-left">', '<div id="editor-xtd-buttons" class="btn-toolbar pull-left">' . $shortcodes->getButton(), $body);
            } else {
                /* Make sure shortcodes enabled and we are not in any "edit" tasking ! */
                if (Zo2Framework::get('enable_shortcodes', 1) == 1 && ( $jinput->get('task') != 'edit' )) {
                    /* Do shortcodes process */
                    $body = $shortcodes->execute($body);
                }
            }

            $assets = Zo2Assets::getInstance();
            $body = str_replace('</body>', $assets->generateAssets('js') . '</body>', $body);
            $body = str_replace('</head>', $assets->generateAssets('css') . '</head>', $body);

            /* Apply back to body */
            JResponse::setBody($body);
        }

        public function onContentBeforeDisplay($context, &$article, &$params, $limitstart = 0) {
            $app = JFactory::getApplication();

            if ($app->isSite()) {

                $document = JFactory::getDocument();
                $type = $document->getType();

                if ($type == 'html') {
                    /**
                     * @todo We'll recode SocialShare in 1.2
                     */
                    //Zo2Framework::getInstance()->zo2Social->renderSocial($article, '.zo2-social-wrap');
                }
            }
        }

        public function onContentPrepare($context, &$article, &$params, $page = 0) {
            $config = Zo2Framework::getTemplate()->params;
            // Don't run this plugin when the content is being indexed
            if ($context == 'com_finder.indexer') {
                return true;
            }

            if (JFactory::getApplication()->isSite()) {
                //$article->text = $this->doShortCode($article->text);
                /* Google Authorship */
                if ((int) $config->get("enable_googleauthorship", 0)) {
                    $author_name = "+";
                    $user = JFactory::getUser();
                    $rel = 'me';
                    if ($user->get('id') == $article->created_by) {
                        $rel = 'author';
                    }

                    $gplus = '<a href="' . $config->get('google_profile_url', '') . '/?rel=' . $rel . '"';
                    $gplus .= ' title="Google Plus Profile for ' . $author_name . '" plugin="Google Plus Authorship">' . $author_name . '</a>';
                    $article->text = $gplus . $article->text;
                }
                /* Comments System */
                if ($config->get('enable_comments', 0) && !Zo2Framework::isFrontPage()) {
                    if (JFactory::getApplication()->input->getCmd('option') != 'com_k2') {
                        $view = JFactory::getApplication()->input->get('view');
                        if ($view == 'article') {
                            Zo2Framework::import('addons.comments.Zo2Comments');
                            $comment = new Zo2Comments($article);
                            $article->text = $article->text . $comment->renderHtml();
                        }
                    }
                }
            }
        }

        public function onRenderModule($module, $params) {
            
        }

        public function onDisplay($name) {
            $html = $this->_render();
            $jsCode = "
                function insertCustText(html) {
                    jInsertEditorText(html, '.$name.');
                }
				";
            $assets = Zo2Assets::getInstance();
            //$doc = JFactory::getDocument();
            $assets->addScriptDeclaration($jsCode);

            $button = new JObject();
            $button->modal = true;
            $button->class = 'btn';
            $button->text = 'Zo2 Shortcodes';
            $button->name = 'blank';
            $button->onclick = 'insertCustText(\'' . $name . '\');return false;';
            $button->link = rtrim(JUri::root(), '/') . '/index.php?zo2controller=getShortcodes';
            return $button;
        }

        private function _render() {
            $jsonFile = ZO2PATH_ASSETS . '/zo2/shortcodes.json';
            $buffer = JFile::read($jsonFile);
            $shortcodes = json_decode($buffer);
            $html = '';
            foreach ($shortcodes as $shortcode) {
                $html .= str_replace("\/", "/", $shortcode->pattern) . '<br />';
            }
            return $html;
        }

    }

}

