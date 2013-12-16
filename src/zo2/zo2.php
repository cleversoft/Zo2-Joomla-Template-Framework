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
            Zo2Framework::loadAssets();
        }

        /**
         * @uses This event is triggered immediately before the framework has rendered the application.
         */
        public function onBeforeRender() {
            $app = JFactory::getApplication();
            $jinput = JFactory::getApplication()->input;
            $document = JFactory::getDocument();

            $option = $jinput->getWord('option');
            $view = $jinput->get('view', '');
            $layout = $jinput->get('layout');

            $disableMootols = Zo2Framework::get('disable_mootools');

            /* Frontend process */
            if (!$app->isAdmin()) {
                /* Remove Mootools */
                if ($disableMootols && ($view != 'form' && $layout != 'edit')) {
                    unset($document->_scripts[JURI::root(true) . '/media/system/js/mootools-core.js']);
                    unset($document->_scripts[JURI::root(true) . '/media/system/js/core.js']);
                    unset($document->_scripts[JURI::root(true) . '/media/system/js/caption.js']);
                    unset($document->_scripts[JURI::root(true) . '/media/system/js/modal.js']);
                    unset($document->_scripts[JURI::root(true) . '/media/system/js/mootools.js']);
                    unset($document->_scripts[JURI::root(true) . '/plugins/system/mtupgrade/mootools.js']);

                    unset($document->_scripts[JURI::root(true) . '/media/system/js/mootools-core-uncompressed.js']);
                    unset($document->_scripts[JURI::root(true) . '/media/system/js/core-uncompressed.js']);
                    unset($document->_scripts[JURI::root(true) . '/media/system/js/caption-uncompressed.js']);
                    unset($document->_scripts[JURI::root(true) . '/media/system/js/tabs-state.js']);

                    unset($document->_scripts[JUri::root(true) . '/media/jui/js/jquery-migrate.min.js']);

                    unset($document->_styleSheets[JUri::root(true) . '/media/system/css/modal.css']);

                    if (isset($document->_script) && isset($document->_script['text/javascript'])) {
                        $document->_script['text/javascript'] = preg_replace('%window\.addEvent\(\'load\',\s*function\(\)\s*{\s*new\s*JCaption\(\'img.caption\'\);\s*}\);\s*%', '', $document->_script['text/javascript']);
                        $document->_script['text/javascript'] = preg_replace('%new JCaption\(\'img.caption\'\);%', '', $document->_script['text/javascript']);
                        if (empty($document->_script['text/javascript']))
                            unset($document->_script['text/javascript']);
                    }
                }
                // remove default jquery and bootstrap 2
                if (!Zo2Framework::isJoomla25()) {
                    JHtml::_('bootstrap.framework', false);
                    //JHtml::_('jquery.framework', false);
                    //JHtml::_('behavior.tooltip', false);
                    unset($document->_scripts[JURI::root(true) . '/media/jui/js/jquery.min.js']);
                    unset($document->_scripts[JURI::root(true) . '/media/jui/js/jquery-noconflict.js']);
                    unset($document->_scripts[JURI::root(true) . '/media/jui/js/bootstrap.min.js']);
                }
            } else {
                if (!Zo2Framework::isJoomla25() && Zo2Framework::allowOverrideAdminTemplate())
                    unset($document->_scripts[JURI::root(true) . '/media/jui/js/jquery.min.js']);
            }
        }

        public function onAfterRender() {

            $app = JFactory::getApplication();

            if ($app->isAdmin()) {
                /**
                 * @todo We should move this feature into Joomla! standard plugin
                 */
                // Add shortcodes button into editor
                //$this->addShortCodes();
            } else {
                $body = JResponse::getBody();
                if (Zo2Framework::get('enable_shortcodes', 1) == 1) {
                    /* Do shortcodes process */
                    $shortcodes = new Zo2Shortcodes();
                    $body = $shortcodes->process($body);
                }

                /* Apply back to body */
                JResponse::setBody($body);
            }
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
            $config = Zo2Framework::getParams();
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
                            Zo2Framework::import2('addons.comments.Zo2Comments');
                            $comment = new Zo2Comments($article);
                            $article->text = $article->text . $comment->renderHtml();
                        }
                    }
                }
            }
        }

        public function onRenderModule($module, $params) {
            
        }

    }

}

