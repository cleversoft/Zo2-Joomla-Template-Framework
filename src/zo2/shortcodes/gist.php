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

class Gist extends Zo2Shortcode
{
    // set short code tag
    protected $tagname = 'gist';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */
    protected function body()
    {

        // initializing variables for short code
        extract($this->shortcode_atts(array(
                'id' => '',
                'username' => '',
                'url' => ''
            ),
            $this->attrs
        ));

        if (!empty($this->content)) {

            $url = JString::parse_url($this->content);
            $path = $url['path'];
            $info = explode('/', trim($path, '/'));
            $id = $info[1];
            $username = $info[0];

        }

        if (!empty($username)) {

            $gist_url = sprintf('https://gist.github.com/%s/%s.js', $username, $id);
            return '<script src="' . $gist_url . '"></script>';

        }

    }

}
