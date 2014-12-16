<?php

/**
 * Zo2 (http://www.zootemplate.com/zo2)
 * A powerful Joomla template framework
 *
 * @version     1.4.3
 * @link        http://www.zootemplate.com/zo2
 * @link        https://github.com/cleversoft/zo2
 * @author      ZooTemplate <http://zootemplate.com>
 * @copyright   Copyright (c) 2014 CleverSoft (http://cleversoft.co/)
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
         * Init our framework
         */
        public function onAfterInitialise() {
            include_once __DIR__ . '/framework/includes/bootstrap.php';
            Zo2Factory::ajax();
        }

        /**
         * 
         */
        public function onAfterRender() {
            if (Zo2Factory::isZo2Template()) {
                $app = JFactory::getApplication();
                $body = JResponse::getBody();

                $jinput = JFactory::getApplication()->input;
                $framework = Zo2Factory::getFramework();

                $assets = Zo2Assets::getInstance();
                $body = str_replace('</body>', $assets->generateAssets('js') . '</body>', $body);
                $body = str_replace('</head>', $assets->generateAssets('css') . '</head>', $body);

                /* Apply back to body */
                JResponse::setBody($body);
            }
        }

        public function onContentPrepare($context, &$article, &$params, $page = 0) {
            if (Zo2Factory::isZo2Template()) {
                $framework = Zo2Factory::getFramework();
                $config = Zo2Factory::getTemplate()->params;
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
                }
            }
        }

    }

}

