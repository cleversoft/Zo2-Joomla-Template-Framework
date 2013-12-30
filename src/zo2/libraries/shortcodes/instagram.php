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
//no direct accees
defined('_JEXEC') or die ('resticted aceess');

Zo2Framework::import2('core.Zo2Shortcode');

class Instagram extends Zo2Shortcode
{
    // set short code tag
    protected $tagname = 'instagram';

    protected $embed = true;

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */

    protected function body()
    {
        // initializing variables for short code
        extract($this->shortcode_atts(array(
                'url' => '',
                'w' => 720,
                'h' => 320,
            ),
            $this->attrs
        ));

        if (!empty($this->content)) {

            $video_json = 'http://api.instagram.com/oembed?url=' . $this->content;
            $http = JHttpFactory::getHttp();
            $response = $http->get($video_json);
            $body = $response->body;
            $info = json_decode($body);
            return '<img class="photo" src="' . $info->url . '" alt="' . $info->title . '" title="' . $info->title . '">';
        }
    }

}
