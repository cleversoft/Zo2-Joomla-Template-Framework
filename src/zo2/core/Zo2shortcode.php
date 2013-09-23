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
 * Base class for a Short code
 * @package     zo2
 * @subpackage  ZO2ShortCode
 */
class ZO2ShortCode extends JObject
{
    /**
     * The  short code tag
     * @var string
     */
    protected $tagname = '';
    /**
     * The ShortCode attributes
     * @var array
     */
    protected $attrs = array();
    /**
     * @var string
     */
    protected $content = "";

    /**
     * Construct
     */
    public function __construct() {

    }

    /**
     * Running short code
     */
    public function run()
    {
        if ($this->tagname) {
            add_shortcode($this->tagname, array(&$this, 'content'));
        }
    }

    /**
     * The content of a short code, it is empty content. So this method must be overwritten by a child method
     */
    protected function body(){}

    /**
     * Attempts to convert a ShortCode tag into embed HTML
     * @param array $attrs ShortCode attributes
     * @param string $content the url attempting to be embedded.
     * @return string the embed HTML on success
     */
    public function content($attrs, $content = "")
    {
        $this->attrs = $attrs;
        $this->content = $content;

        if (!is_array($this->attrs)) {
            return '<!-- '.$this->tagname.' tag passed invalid attributes -->';
        }

        return '<div class="embed-container">' . $this->body() . '</div>';
    }

}
