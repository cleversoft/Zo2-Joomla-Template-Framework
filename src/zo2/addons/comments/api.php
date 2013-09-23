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
/**
 * ZO2Comments Class
 * @package     zo2
 * @subpackage  ZO2Comments
 */
class ZO2Comments
{
    function __construct()
    {
        $this->http = JHttpFactory::getHttp();
    }

    function getFacebookCount($url = "")
    {

        if (empty($url)) {
            $url = JUri::getInstance()->toString();
        }

        $link = 'https://graph.facebook.com/?ids=' . urlencode($url);
        $response = $this->http->get($link);
        $body = $response->body;
        $info = json_decode($body);

        if (!empty($info)) {
            return $info->$url->comments;
        }

        return 0;
    }

    function getGplusCount($url = '')
    {

        if (empty($url)) {
            $url = JUri::getInstance()->toString();
        }

        $link = 'https://apis.google.com/_/widget/render/commentcount?bsv&href=' . urlencode($url);
        $response = $this->http->get($link);

        $body = $response->body;

        $doc = new DOMDocument();
        $doc->loadHTML($body);

        $counter = $doc->getElementById('aggregateCount');
        if ($counter) {
            return $counter->nodeValue;
        }

        return 0;

    }

    function getDisqusCount($url = '')
    {

        $params = Zo2Framework::getParams();

        if ($params->get("disqus_shortname")) {

            $link = 'http://disqus.com/api/3.0/threads/details.json?api_key=oM0LSEGeVxqJb93ctjAohh66F9JFqndGigzWT0HRAenCinuhHNIWCiiDlKXtAYF2&forum=' . $params->get("disqus_shortname") . '&thread:link=' . urlencode($url);
            $response = $this->http->get($link);
            $body = $response->body;

            $json = json_decode($body);

            if (!empty($json)) {
                return $json->response->posts;
            }

        }

        return 0;
    }

    function renderHtml() {

        $params = Zo2Framework::getParams();
        $tab_order = explode(',',$params->get('tab_order', 'facebook,gplus,disqus,k2comment'));
        $url = JUri::getInstance()->toString();
        ?>

        <?php if (!empty($tab_order)) :?>

            <!-- comment-tabs -->
            <script type="text/javascript">
                jQuery(document).ready(function() {
                    window.comment_width = jQuery('#comment-tabs').innerWidth();
                });
            </script>

            <div id="comment-tabs" class="tabbable">

                <a name="comments"></a>
                <ul class="nav nav-tabs nav-justified clearfix">
                    <?php

                    $active = '';
                    foreach ($tab_order as $key => $tab) {
                        $tab = trim($tab);
                        if ($key == 0) {
                            $active = 'class="active"';
                        } else {
                            $active = '';
                        }
                        echo '<li '.$active.'><a href="#'.$tab.'" data-toggle="tab">';
                        echo '<span id="' . $tab . '-label">' . $params->get( $tab . '_label') . '</span>';
                        echo '</a></li>' ;
                    }
                    ?>
                </ul>
                <div class="tab-content">
                    <?php
                    $active = '';
                    foreach ($tab_order as $key => $tab) {
                        if ($key == 0) {
                            $active = 'active';
                        }
                        echo '<div id="'.$tab.'" class="embed-container tab-pane clearfix '.$active .'">';
                        require_once  ZO2_ADMIN_BASE . '/addons/comments/templ/'. $tab . '.php';
                        echo "</div>";
                    }
                    ?>
                </div>

            </div>

            <!-- //comment-tabs -->
        <?php endif; ?>
    <?php

    }


}