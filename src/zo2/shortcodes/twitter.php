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

class Twitter extends Zo2Shortcode
{
    // set short code tag
    protected $tagname = 'twitter';

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
            ),
            $this->attrs
        ));

        static $bool = false;
        if (!empty($username)) {
            if (!$bool) {
                $bool = true;
                $script = "<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>";
            }
            Zo2Framework::getCurrentDocument()->addCustomTag($script);
            return '<a class="twitter-timeline" href="https://twitter.com/' . $username . '" data-widget-id="' . $id . '">Tweets by @' . $username . '</a>';
        }
    }

}

