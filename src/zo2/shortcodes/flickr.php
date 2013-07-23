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

Zo2Framework::import2('core.shortcodes');

class Flickr extends ZO2Shortcode
{
    // set short code tag
    protected $tagname = 'flickr';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */
    protected function body()
    {

        // initializing variables for short code
        extract(shortcode_atts(array(
                'id' => '',
                'url' => '',
                'w' => 300,
                'h' => 100,
            ),
            $this->attrs
        ));

        $http = JHttpFactory::getHttp();

        if (!empty($id)) {
//            $response = $http->get('http://api.flickr.com/services/rest/?method=flickr.photos.getInfo&api_key=babacb7f133ab7e95846cedce9b03698&photo_id='.$id.'&format=json');
//            $body = $response->body;
//            $info = json_decode($body);
            //$url = 'http://flickr.com/services/oembed?url=http://www.flickr.com/photo.gne?id='. $id .'&format=json';
        } elseif (!empty($this->content)) {
            $url = 'http://flickr.com/services/oembed?url=' . $this->content . '&format=json&maxwidth=' . $w . '&maxheight=' . $h;
        }

        $response = $http->get($url);
        $body = $response->body;
        $info = json_decode($body);

        if (isset($info->html)) {
            return $info->html;
        }

    }

}
