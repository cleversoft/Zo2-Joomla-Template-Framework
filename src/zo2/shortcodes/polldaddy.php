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

Zo2Framework::import2('core.Zo2shortcode');

class Polldaddy extends ZO2Shortcode
{
    protected $tagname = 'polldaddy';

    /**
     * Overwrites the parent method
     * @return string the embed HTML
     */

    protected function body()
    {
        // initializing variables for short code
        extract(shortcode_atts(array(
                'survey' => null,
                'link_text' => 'Take Our Survey',
                'poll' => 'empty',
                'rating' => 'empty',
                'unique_id' => null,
                'item_id' => null,
                'title' => null,
                'permalink' => null,
                'cb' => 0,
                'type' => 'button',
                'body' => '',
                'button' => '',
                'text_color' => '000000',
                'back_color' => 'FFFFFF',
                'align' => '',
                'style' => '',
                'width' => 200,
                'height' => floor(200 * 3 / 4),
                'delay' => 100,
                'visit' => 'single',
                'domain' => '',
                'id' => ''
            ),
            $this->attrs
        ));

        if (intval($poll) > 0) {

            $poll = intval($poll);
            $poll_url = 'http://polldaddy.com/poll/' . $poll;
            $poll_js = sprintf('%s.polldaddy.com/p/%d.js', 'http://static', $poll);
            $poll_link = '<a href="' . $poll_url . '">Take Our Poll</a>';

            $cb = ($cb == 1 ? '?cb=' . mktime() : false);

            if ($type == 'slider') {

                if (!in_array($visit, array('single', 'multiple')))
                    $visit = 'single';

                $settings = json_encode(array(
                    'type' => 'slider',
                    'embed' => 'poll',
                    'delay' => intval($delay),
                    'visit' => $visit,
                    'id' => intval($poll)
                ));

                return '<script type="text/javascript" charset="UTF-8" src="http://i0.poll.fm/survey.js"></script>
                        <script type="text/javascript" charset="UTF-8">
                            polldaddy.add( ' . $settings . ' );
                        </script>
                        <noscript>' . $poll_link . '</noscript>';
            } else {
                $cb = ($cb == 1 ? '?cb=' . mktime() : false);
                $margins = '';
                $float = '';
                if (in_array($align, array('right', 'left'))) {
                    $float = sprintf('float: %s;', $align);

                    if ($align == 'left')
                        $margins = 'margin: 0px 10px 0px 0px;';
                    elseif ($align == 'right')
                        $margins = 'margin: 0px 0px 0px 10px';
                }
                return '<a name="pd_a_' . $poll . '"></a>
                    <div class="PDS_Poll" id="PDI_container' . $poll . '" style="display:inline-block;' . $float . $margins . '"></div>
                    <div id="PD_superContainer"></div>
                    <script type="text/javascript" charset="UTF-8" src="' . $poll_js . $cb . '"></script>
                    <noscript>' . $poll_link . '</noscript>';

            }

        } else
            return '<!-- no polldaddy -->';
    }
}
