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

class Gist extends ZO2Shortcode
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
        extract(shortcode_atts(array(
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
