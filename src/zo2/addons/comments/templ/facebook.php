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
defined ('_JEXEC') or die ('resticted aceess');

?>
<div id="fb-root"></div>
<div id="fb-comments">Loading Facebook Comments ...</div>
<script type="text/javascript">
    jQuery(document).ready(function($)
    {
        $('#fb-comments').html('<div class="fb-comments" data-width="'+window.comment_width+'" data-href="<?php echo $url;?>" data-num-posts="20" data-colorscheme="light" data-mobile="auto"></div>');
    });
</script>
<script async type="text/javascript" src="//connect.facebook.net/en_US/all.js#xfbml=1">FB.init();</script>