<?php
/**
 * Zo2 Framework (http://zo2framework.org)
 *
 * @link         http://github.com/aploss/zo2
 * @package      Zo2
 * @author       Hiepvu
 * @copyright    Copyright ( c ) 2008 - 2013 APL Solutions
 * @license      http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
 */
//no direct accees
defined('_JEXEC') or die ('resticted aceess');

Zo2Framework::import2('core.Zo2Shortcode');

class Instagram extends ZO2Shortcode
{
    // set short code tag
    protected $tagname = 'instagram';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */

    protected function body()
    {
        // initializing variables for short code
        extract(shortcode_atts(array(
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
