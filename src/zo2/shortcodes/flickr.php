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

Zo2Framework::import2('core.Zo2Shortcode');

class Flickr extends Zo2Shortcode
{
    // set short code tag
    protected $tagname = 'flickr';

    protected $embed = true;

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */
    protected function body()
    {

        // initializing variables for short code
        extract($this->shortcode_atts(array(
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
        } elseif (!empty($url)) {
            $url = 'http://flickr.com/services/oembed?url=' . $url . '&format=json&maxwidth=' . $w . '&maxheight=' . $h;
        }
        $response = $http->get($url);
        $body = $response->body;
        $info = json_decode($body);
        if (isset($info->html)) {
            return $info->html;
        }

    }

}
